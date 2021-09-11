<?php

global $g_debugProcesso, $g_qtd, $g_contas;

//* verifica se o dia de hoje é o mesmo dia do XConfig ou se foi ativado manualmente pelo sistema
sql_abrirBD( false );

$select = "Select RecorDia From cnfXConfig";
$recorDia = sql_lerUmRegistro( $select )->RECORDIA;
// if( $g_debugProcesso ) echo '<br><b>GR0 cnfXConfig S=</b> '.$select.' <b>recorDia=</b> '.$recorDia;

$hoje    = formatarData( HOJE, 'aaaa/mm/dd');
$diaHoje = dataDia( $hoje );
$ultDia  = ultDiaDoMes( $hoje );
// if( $g_debugProcesso ) echo '<br><b>GR0 hoje=</b> '.$hoje.' <b>diaHoje=</b> '.$diaHoje.' <b>ult=</b> '.$ultDia;

sql_fecharBD();

if( $recorDia == $diaHoje || $recorDia > $ultDia || ultimaLigOpcaoEm( 162 ) )
{
   $g_qtd = 0;
   $parQSelecao = lerParametro( 'parQSelecao' );

   //* Criação automática pelo rotinas_php.bat do server
   if( $recorDia == formatarData( HOJE, 'dd' ) || ultimaLigOpcaoEm(163) )
   {
         $peloServer    = true;
         $operacaoAtual = 200163;
         $from          = "arqRecorrente R";
         $where         = "R.Ativo = 1 ";
         $mes           = incMes( HOJE, 1 );
   }

   //* Criação manual pelo sistema
   switch( ultimaLigOpcao() )
   {
      case 162:	//* opção pelo menu de navegação do arqRecorentes
         $peloServer    = false;
         $operacaoAtual = OperacaoAtual();
         $from          = FromMarcados( 'arqRecorrente', 'R' );
         $where         = WhereMarcados() . " and R.Ativo = 1";
         $mes           = $parQSelecao->MESINI;
         $volta         = 2;
         break;
   }

   sql_abrirBD( $operacaoAtual );
   sql_iniciarTransacao();

   $select = "Select R.*
      From " . $from . "
         join arqClinica         U on U.idPrimario=R.Clinica
         left join arqFornecedor F on F.idPrimario=R.Fornecedor
         left join arqPessoa     P on P.idPrimario=R.Pessoa
      Where ( P.Ativo = 1 or F.Ativo = 1 ) and " . $where . "
      Order by R.Clinica, F.Nome, P.Nome";
// if( $g_debugProcesso ) echo '<br><b>GR0 arqRecorrente S=</b> '.$select;
   $regRecorrentes = sql_lerRegistros( $select );

   $g_contas = [];

   foreach( $regRecorrentes as $umaRecorrente )
   {
      $idRecorrente = $umaRecorrente->IDPRIMARIO;
      $idConta      = sql_IdPrimario();
      $valor        = $umaRecorrente->VALOR;
      $vencimento   = montarData( $umaRecorrente->VENC, dataMes( $mes ), dataAno( $mes ), true );

      if( $umaRecorrente->ANTECIPA == 1 )
         $vencimento = anteciparData( dataDia( $vencimento ), $vencimento, 2 );
      else
         $vencimento = qualUtil( $vencimento, false );
// if( $g_debugProcesso ) echo '<br><b>GR0 dia=</b> '.diaDaSemana( $vencimento ).' <b>venc=</b> '.$vencimento;

      switch( $umaRecorrente->TCOMPETE )
      {
         case 1:  $compete = incDia( $vencimento, -31 ); break;   //* mês anterior
         case 2:  $compete = $vencimento; break; 					   //* mês atual
         case 3:  $compete = incDia( $vencimento, 31 ); break; 	//* próximo mês
         default:	$compete = $vencimento; break;
      }

      $compete = montarData( 1, dataMes( $compete ), dataAno( $compete ), true );
// if( $g_debugProcesso ) echo '<br>GR0 COMPETE=</b> '.$umaRecorrente->TCOMPETE.' <b>data=</b> '.$vencimento.' <b>compete=</b> '.$compete;

      if( $umaRecorrente->ANTECIPA == 1 )
         $vencimento = anteciparData( dataDia( $vencimento ), $vencimento, 2 );

      //* Descobre o último número de transação do arqContas
      $select = "Select max( Transacao) as Transacao From arqContas";
      $novaTrans = sql_lerUmRegistro( $select )->TRANSACAO + 1;
//if( $g_debugProcesso )echo '<br><b>GR0 S=</b> '.$select.' novaTrans= '.$novaTrans;

      sql_insert( "arqConta", [
         "idPrimario" => $idConta,
         "Transacao"  => $novaTrans,
         "Clinica"    => $umaRecorrente->CLINICA,
         "TPgRec"     => $umaRecorrente->TPGREC,
         "Fornecedor" => ValorOuNull( $umaRecorrente->FORNECEDOR, '', false ),
         "Pessoa"     => ValorOuNull( $umaRecorrente->PESSOA, '', false ),
         "TrgValor"   => 0,
         "TrgValLiq"  => 0,
         "TrgQtdParc" => 0,
         "TrgQParcPg" => 0,
         "ProxVenc"   => null,
         "TrgPago"    => 0,
         "Documento"  => 0,
         "Emissao"    => $hoje,
         "RecEnvia"   => null,
         "Compete"    => $compete,
         "Historico"  => $umaRecorrente->HISTORICO,
         "Arq1"       => null ] );

      $g_qtd++;

      //* criar a parcela
      $valor =$umaRecorrente->VALOR;

      sql_insert( "arqParcela", [
         "idPrimario"  => sql_forcarNumerico( sql_NumeroUnico() ),
         "Conta"       => $idConta,
         "Parcela"     => 1,
         "Vencimento"  => $vencimento,
         "VencEst"     => 0,
         "Valor"       => $valor,
         "ValorLiq"    => $valor,
         "Estimado"    => $umaRecorrente->ESTIMADO,
         "TFCobra"     => $umaRecorrente->TFCOBRA,
         "Emissao"     => null,
         "LinhaDig"    => '',
         "NomePdf"     => "",
         "CCor"        => null,
         "SubPlano"    => $umaRecorrente->SUBPLANO,
         "DataPagto"   => null,
         "DataComp"    => null,
         "TFPagto"     => null,
         "TDetPg"      => null,
         "Cheque"      => 0,
         "Arq1"        => null,
         "StRetorno"   => '',
         "Remessa"     => 0,
         "DataRem"     => null ] );


      if( $peloServer )
      {
         //* prepara vetor para ter os dados que irão no email
         $select = "Select C.Transacao, P.Vencimento, P.Valor, C.Historico, U.Clinica,
               T.Descritor as TFCobra, N.idPrimario as idTPgRec, N.Descritor as TPgRec,
               iif( C.Fornecedor is not null, F.Nome, E.Nome ) as Nome
            From arqParcela P
               join arqConta           C on C.idPrimario=P.Conta
               join tabTPgRec			   N on N.idPrimario=C.TPgRec
               join arqClinica  		   U on U.idPrimario=C.Clinica
               left join tabTFCobra    T on T.idPrimario=P.TFCobra
               left join arqFornecedor F on F.idPrimario=C.Fornecedor
               left join arqPessoa     E on E.idPrimario=C.Pessoa
            Where C.idPrimario = " . $idConta;
         $g_contas[] = sql_lerUmRegistro( $select );
// if( $g_debugProcesso ) echo '<br><br><b>GR0 P/EMAIL arqParcela S=</b> '.$select.' ';
// if( $g_debugProcesso ) echo '<br><b>GR0 NO p_recorrente_criar g_contas=</b> '; print_r( $g_contas );
      }
   }
}

sql_gravarTransacao();
sql_fecharBD();

$teste = false;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
else
{
   if( ultimaLigOpcao() == 162 )
   {
      DesmarcarMarcados( 'arqRecorrente');
      TecleAlgoVolta( "Geradas " . $g_qtd . " contas", true, $volta );
   }
   elseif( $peloServer )
   {
      //* envia email se foi ativado pelo rotinas.php
      require_once( 'm_recorrentes_criadas.php' );
   }
}

if( $g_debugProcesso ) echo '<br><br> Fim do p_recorrente_criar às '. AGORA();
