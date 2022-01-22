<?php

//---------------------------------------------------------------
function CriarParcela( $idConta, $p_vencimento, $p_valor, $p_formaPg, $p_historico='' )
{
   global $g_debugProcesso, $g_idSubPlano;

   $select = "Select coalesce( max( P.Parcela ), 0 ) as Num
      From arqParcela P
      Where P.Conta = " . $idConta;
   $proxNum = sql_lerUmRegistro( $select )->NUM + 1;
// if( $g_debugProcesso ) echo '<br><b>GR0 arqParcela NUM S=</b> '.$select;

   $select = "Select F.Cartao, F.TaxaDeb, F.Taxa2, F.Taxa3, F.Dias
      From arqFormaPg F
      Where F.idPrimario = " . $p_formaPg;
   $umaFormaPg = sql_lerUmRegistro( $select );

   if( $umaFormaPg->CARTAO ) //* se eh cartao calcula o liquido pela taxa e o vencimento por Dias
   {
      $vencimento = incDia( $p_vencimento, $umaFormaPg->DIAS );
// if( $g_debugProcesso ) echo '<br><b>GR0 vencimento=</b> '.$vencimento;

      if( $umaFormaPg->TAXADEB > 0 )
         $txCartao = $umaFormaPg->TAXADEB;
      elseif( $vezes <= 2 )
         $txCartao = $umaFormaPg->TAXA2;
      else
         $txCartao = $umaFormaPg->TAXA3;

         $valorLiq = $p_valor * ( 100 - $txCartao ) / 100.0;
// if( $g_debugProcesso ) echo '<br><b>GR0 arqFormaPg S=</b> '.$select.'<br><b>vezes=</b> '.$vezes.' <b>txtCartao=</b> '.$txCartao.' <b>valorI=</b> '.$valorI.' <b>valorLiq=</b> '.$valorLiq;
   }
     else
   {
      $vencimento = $p_vencimento;
      $valorLiq = $p_valor;
   }

   sql_insert( "arqParcela", [
      "idPrimario" => [ sql_NumeroUnico(), FORCAR_NUMERICO ],
      "Conta"      => $idConta,
      "Parcela"    => $proxNum,
      "Vencimento" => $vencimento,
      "VencEst"    => 0,
      "Valor"      => $p_valor,
      "ValorLiq"   => $valorLiq,
      "Estimado"   => 0,
      "TFCobra"    => 3,
      "Emissao"    => null,
      "LinhaDig"   => '',
      "NomePdf"    => '',
      "CCor"       => null,
      "SubPlano"   => $g_idSubPlano,
      "DataPagto"  => null,
      "DataComp"   => null,
      "TFPagto"    => 3,
      "TDetPg"     => null,
      "FormaPg"    => $p_formaPg,
      "Cheque"     => 0,
      "StRetorno"  => '',
      "Remessa"    => 0,
      "DataRem"    => null,
      "Historico"  => $p_historico ] );
}
//---------------------------------------------------------------

global $g_debugProcesso, $g_idSubPlano;

sql_abrirBD( OperacaoAtual() );

$hoje     = formatarData( HOJE, 'aaaa/mm/dd' );
$compete    = dataAno( $hoje ) . "/" . dataMes( $hoje ) . "/01";
$idConsulta = navegouDe( 'arqConsulta' );

$select = "Select X.SubPlaRAss
   From cnfXConfig X";
$g_idSubPlano = sql_lerUmRegistro( $select )->SUBPLARASS;

$select = "Select C.Num as NumConsulta, C.Clinica as idClinica, P.idPrimario as idPessoa,
      C.Prontuario, T.PTrata, C.EntraParc, C.SaldoParc, C.EntraFPg, C.SdEntrFPG, C.SaldoFPg,
      C.EntraVal, C.EntraValP, C.SdVenc1Par, (C.SaldoVal * C.SaldoParc) as SaldoValor,
      (Select F.Cartao From arqFormaPg F Where F.idprimario = C.SdEntrFPg) as SdEntrFPgEhCartao
   From arqConsulta C
      join arqPTrata T on T.idPrimario=C.PTrata
      join arqPessoa P on P.idPrimario=C.Pessoa
   Where C.idPrimario = " . $idConsulta;
$umaConsulta = sql_lerUmRegistro( $select );
// if( $g_debugProcesso ) echo '<br><b>GR0 1 arqConsulta S=</b> '.$select;

$idConta = sql_IdPrimario();
$idClinica     = $parGeraParc->CLINICA;
$idPessoa      = $parGeraParc->PESSOA;
$documento     = 0;
$emissao       = $hoje;
$recEnvia      = $hoje;
$compete       = $compete;
$historico     = $parGeraParc->HISTORICO;

$select = "Select coalesce( max( Transacao ), 0 ) as Transacao
   From arqConta";
$proxTransacao = sql_lerUmRegistro( $select )->TRANSACAO + 1;

sql_insert( "arqConta", [
   "idPrimario" => $idConta,
   "Transacao"  => $proxTransacao,
   "Clinica"    => $umaConsulta->IDCLINICA,
   "TPgRec"     => 2,
   "Fornecedor" => null,
   "Pessoa"     => $umaConsulta->IDPESSOA,
   "TrgValor"   => 0,
   "TrgValLiq"  => 0,
   "TrgQtdParc" => 0,
   "TrgQParcPg" => 0,
   "ProxVenc"   => null,
   "TrgPago"    => 0,
   "Documento"  => 0,
   "Emissao"    => $hoje,
   "RecEnvia"   => $hoje,
   "Compete"    => $compete,
   "Historico"  => "C:" . $umaConsulta->NUMCONSULTA . " Pr:" . $umaConsulta->PRONTUARIO . " Tr:" . $umaConsulta->PTRATA,
   "Arq1"       => null ] );

// function CriarParcela( $idConta, $p_vencimento, $p_valor, $p_formaPg, $p_historico='' )
//* entrada
CriarParcela( $idConta, $hoje, $umaConsulta->ENTRAVAL, $umaConsulta->ENTRAFPG, 'Entrada' );

//* saldo da entrada
$entraParc = $umaConsulta->ENTRAPARC;

if( $entraParc > 0 )
{
   if( $umaConsulta->SDENTRFPGEHCARTAO )
   {
      $iFinal       = 1;
      $valorSdEntra = $umaConsulta->ENTRAVALP * $entraParc;
   }
   else
   {
      $iFinal       = $entraParc;
      $valorSdEntra = $umaConsulta->ENTRAVALP;
   }
   
   for( $i=1; $i<=$iFinal; $i++ )
   {
      if( $i == 1 )
         $vencimento = $umaConsulta->SDVENC1PAR;
      else
         $vencimento = incDia( $vencimento, 10 );

      CriarParcela( $idConta, $vencimento, $valorSdEntra, $umaConsulta->SDENTRFPG,
         'Saldo da Entrada' );
   }
}

//* saldo do tratamento
CriarParcela( $idConta, $hoje, $umaConsulta->SALDOVALOR, $umaConsulta->SALDOFPG, 'Saldo do tratamento' );

sql_update( "arqConsulta", [
      "ContaPTra" => $idConta ],
   "idPrimario = " . $idConsulta );

sql_fecharBD();

$teste = false;
if( $teste )
	echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
else
	tecleAlgoVolta( 'Conta e parcelas criadas. Verifique!', true, $g_tecleAlgo );
