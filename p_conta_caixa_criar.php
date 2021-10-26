<?php

global $g_debugProcesso;

sql_abrirBD( OperacaoAtual() );
sql_iniciarTransacao();

$parQCaixa = lerParametro( 'parQCaixa' );
$op        = ultimaLigOpcao();

$select = "Select X.CCorRec, X.CCorAss, X.SubPlaRRec, X.SubPlaRAss
      From cnfXConfig X";
$umXConfig = sql_lerUmRegistro( $select );
if( $g_debugProcesso ) echo '<br><br><b>GR0 cnfXConfig S=</b> '.$select;

switch( ultimaLigOpcao() )
{
   case 176: //* saída recepção
      $cCor     = $umXConfig->CCORREC;
      $subPlano = $parQCaixa->SUBPLANO;
      break;

   case 177: //* entrada recepção
      $cCor     = $umXConfig->CCORREC;
      $subPlano = $umXConfig->SUBPLARREC;
      break;
}
if( $g_debugProcesso ) echo '<br><b>GR0 cCor S=</b> '.$cCor.' <b>subPlano=</b> '.$subPlano;

  


sql_gravarTransacao();
sql_fecharBD();

$teste = true;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
else
   TecleAlgoVolta( 'Lançamento criado', true );
