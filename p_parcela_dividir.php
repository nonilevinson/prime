<?php

global $g_debugProcesso;

sql_abrirBD( OperacaoAtual() );
sql_iniciarTransacao();

$parQBaixa = lerParametro( 'parQBaixa' );
$idParcela = navegouDe( 'arqParcela' );

$select = "Select P.Conta as idConta, P.Parcela, P.Valor, P.ValorLiq, P.SubPlano as idSubPlano
		From arqParcela P
		Where P.idPrimario = " . $idParcela;
$umaParcela    = sql_lerUmRegistro( $select );
$idConta       = $umaParcela->IDCONTA;
$valorAtual    = $umaParcela->VALOR;
$valorLiqAtual = $umaParcela->VALORLIQ;
// if( $g_debugProcesso ) echo '<br><b>GR0 arqParcela S=</b> '.$select.'<br><b>GR0 valor=</b> '.$valor.' <b>parc valor=</b> '.$valorAtual;

if( $valor > $valorAtual )
   tecleAlgo( 'O valor informado é maior que o atual e precisa ser menor', true, 1 );
else
{
   $valor     = $parQBaixa->VALOR;
   $novoValor = $valorAtual - $valor;
if( $g_debugProcesso ) echo '<br><b>GR0 valorAtual=</b> '.$valorAtual.' <b>liqAtual=</b> '.$valorLiqAtual;
  
   if( $valorAtual == $valorLiqAtual )
   {
      $valorLiqUpdate = $valor;
      $novoValorLiq   = $novoValor;
   }
   else
   {
      $taxaLiq        = ( 100 - ( $valorLiqAtual * 100.0 / $valorAtual ) ) / 100.0;
      $valorLiqUpdate = $valor - ( $valor * $taxaLiq );
      $novoValorLiq   = $novoValor - ( $novoValor * $taxaLiq );
if( $g_debugProcesso ) echo '<br><b>GR0 taxa=</b> '.$taxaLiq;
   }
   
   $tFCobra   = ValorOuNull( $parQBaixa->TFCOBRA, '', false );

   sql_update( "arqParcela", [
         "Valor"    => $valor,
         "ValorLiq" => $valorLiqUpdate ],
      "idPrimario = " . $idParcela );

   $select = "Select coalesce( max( P.Parcela ), 0 ) as Num
      From arqParcela P
      Where P.Conta = " . $idConta;
   $proxNum = sql_lerUmRegistro( $select )->NUM + 1;
// if( $g_debugProcesso ) echo '<br><b>GR0 arqParcela NUM S=</b> '.$select.' <b>proxNum=</b> '.$proxNum;

   sql_insert( "arqParcela", [
      "idPrimario" => [ sql_NumeroUnico(), FORCAR_NUMERICO ],
      "Conta"      => $idConta,
      "Parcela"    => $proxNum,
      "Vencimento" => $parQBaixa->DATAINI,
      "VencEst"    => 0,
      "Valor"      => $novoValor,
      "ValorLiq"   => $novoValorLiq,
      "Estimado"   => 0,
      "TFCobra"    => $tFCobra,
      "Emissao"    => null,
      "LinhaDig"   => '',
      "NomePdf"    => '',
      "CCor"       => null,
      "SubPlano"   => $umaParcela->IDSUBPLANO,
      "DataPagto"  => null,
      "DataComp"   => null,
      "TFPagto"    => null,
      "TDetPg"     => null,
      "FormaPg"    => null,
      "Cheque"     => 0,
      "StRetorno"  => '',
      "Remessa"    => 0,
      "DataRem"    => null ] );
}

sql_gravarTransacao();
sql_fecharBD();

$teste = false;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
else
   tecleAlgoVolta( 'Parcela dividida.\nVerifique', true, 2 );
