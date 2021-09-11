
<?php

global $g_debugProcesso, $g_qtd, $g_contas;

//* verifica se o dia de hoje é o mesmo dia do XConfig ou se foi ativado manualmente pelo sistema
sql_abrirBD( false );

$select = "select RecorDia from cnfXConfig";
$recorDia = sql_lerUmRegistro( $select )->RECORDIA;
// if( $g_debugProcesso ) echo '<br><b>GR0 cnfXConfig S=</b> '.$select.' <b>recorDia=</b> '.$recorDia.' <b>HOJE=</b> '.formatarData( HOJE, 'dd' );

sql_fecharBD();

if( $recorDia == formatarData( HOJE, 'dd' ) || ultimaLigOpcaoEm( 162 ) )
{
   $g_qtd = 0;
   $parQSelecao = lerParametro( 'parQSelecao' );

   //* Lê as contas recorrentes ativas
      //* Criação automática pelo rotinas_php.bat do server
      if( $recorDia == formatarData( HOJE, 'dd' ) || ultimaLigOpcaoEm(185) )
      {
            $peloServer    = true;
            $operacaoAtual = 200184;
            $from          = "arqRecorrente R";
            $where         = "R.Ativo = 1 ";
            $mes           = incMes( HOJE, 1 );
      }

      //* Criação manual pelo sistema
      switch( ultimaLigOpcao() )
      {
         case 185:	// opção pelo menu de navegação do arqRecorentes
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

   $select = "select R.*
      From " . $from . "
         join arqCentro	U on U.idPrimario=R.Centro
         join arqPessoa P on P.idPrimario=R.Pessoa
      Where P.Ativo = 1 and " . $where .
      " Order by R.Centro, P.Nome";
// if( $g_debugProcesso ) echo '<br><b>GR0 RECORRENTE S=</b> '.$select;
   $regRecorrentes = sql_lerRegistros( $select );

   $g_contas = [];
   $hoje     = formatarData( HOJE, 'aaaa/mm/dd');

   foreach( $regRecorrentes as $umRecorrente )
   {
      $idRecorrente = $umRecorrente->IDPRIMARIO;

      $idConta    = sql_IdPrimario();
      $contato    = $umRecorrente->CONTATO;
      $valor      = $umRecorrente->VALOR;
      $vencimento = montarData( $umRecorrente->VENC, dataMes( $mes ), dataAno( $mes ), true );

      if( $umRecorrente->ANTECIPA == 1 )
         $vencimento = anteciparData( dataDia( $vencimento ), $vencimento, 2 );
      else
         $vencimento = qualUtil( $vencimento, false );
// if( $g_debugProcesso ) echo '<br><b>GR0 dia=</b> '.diaDaSemana( $vencimento ).' <b>venc=</b> '.$vencimento;

      switch( $umRecorrente->TCOMPETE )
      {
         case 1:  $compete = incDia( $vencimento, -31 ); break;   //* mês anterior
         case 2:  $compete = $vencimento; break; 					   //* mês atual
         case 3:  $compete = incDia( $vencimento, 31 ); break; 	//* próximo mês
         default:	$compete = $vencimento; break;
      }

      $compete = montarData( 1, dataMes( $compete ), dataAno( $compete ), true );
// if( $g_debugProcesso ) echo '<br>GR0 COMPETE=</b> '.$umRecorrente->TCOMPETE.' <b>data=</b> '.$vencimento.' <b>compete=</b> '.$compete;

      if( $umRecorrente->ANTECIPA == 1 )
         $vencimento = anteciparData( dataDia( $vencimento ), $vencimento, 2 );

      //* Descobre o último número de transação do arqContas
      $select = "Select max( Transacao) as Transacao From arqContas";
      $novaTrans = sql_lerUmRegistro( $select )->TRANSACAO + 1;
//if( $g_debugProcesso )echo '<br><b>GR0 S=</b> '.$select.' novaTrans= '.$novaTrans;

      sql_insert( "arqConta", [
         "idPrimario" => $idConta,
         "Transacao"  => $novaTrans,
         "Centro"     => $umRecorrente->CENTRO,
         "TPgRec"     => $umRecorrente->TPGREC,
         "Pessoa"     => $umRecorrente->PESSOA,
         "TrgValor"   => 0,
         "TrgValLiq"  => 0,
         "TrgQParc"   => 0,
         "TrgQParcPg" => 0,
         "ProxVenc"   => null,
         "TrgPago"    => 0,
         "Documento"  => 0,
         "Emissao"    => $hoje,
         "RecEnvia"   => null,
         "Compete"    => $compete,
         "Historico"  => $umRecorrente->HISTORICO,
         "Arq1"       => null ] );

      $g_qtd++;

      //* criar a parcela
      $valor =$umRecorrente->VALOR;

      sql_insert( "arqParcela", [
         "idPrimario"  => sql_forcarNumerico( sql_NumeroUnico() ),
         "Conta"       => $idConta,
         "Parcela"     => 1,
         "Vencimento"  => $vencimento,
         "VencEst"     => 0,
         "Valor"       => $valor,
         "ValorLiq"    => $valor,
         "Estimado"    => $umRecorrente->ESTIMADO,
         "TFCobra"     => $umRecorrente->TFCOBRA,
         "Emissao"     => null,
         "LinhaDig"    => '',
         "NomePdf"     => "",
         "CCor"        => null,
         "SubPlano"    => $umRecorrente->SUBPLANO,
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
         $select = "Select C.Transacao, P.Vencimento, P.Valor, C.Historico, E.Nome, U.Centro,
               T.Descritor as TFCobra, N.idPrimario as idTPgRec, N.Descritor as TPgRec
            From arqParcela P
               join arqConta        C on C.idPrimario=P.Conta
               join tabTPgRec			N on N.idPrimario=C.TPgRec
               join arqCentro  		U on U.idPrimario=C.Centro
               join arqPessoa   	   E on E.idPrimario=C.Pessoa
               left join tabTFCobra T on T.idPrimario=P.TFCobra
            Where C.idPrimario = " . $idConta;
         $g_contas[] = sql_lerUmRegistro( $select );
// if( $g_debugProcesso ) echo '<br><br><b>GR0 P/EMAIL arqParcela S=</b> '.$select.' ';
// if( $g_debugProcesso ) echo '<br><b>GR0 NO p_=</b> '; print_r( $g_contas );
      }
   }
}

sql_gravarTransacao();
sql_fecharBD();

if( ultimaLigOpcao() == 185 )
{
   DesmarcarMarcados( 'arqRecorrente');
   TecleAlgoVolta( "Geradas " . $g_qtd . " contas", true, $volta );
}
elseif( $peloServer )
{
   //* envia email se foi ativado pelo rotinas.php
   require_once( 'm_recorrentes_criadas.php' );
}

if( $g_debugProcesso ) echo '<br><br> FIM DO P_GERAR ÀS '. AGORA();
