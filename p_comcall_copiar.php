<?php

global $g_debugProcesso;
$parQSelecao = lerParametro( 'parQSelecao' );

sql_abrirBD( false );
$msg        = '';
$idConsulta = navegouDe( 'arqConsulta' );

//* op 137 campo HoraChega
sql_update( "arqConsulta", [
      "HoraChega" => $parQSelecao->HORAINI ],
   "idPrimario = " . $idConsulta );

sql_fecharBD();

$teste = false;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
else
   tecleAlgoVolta( 'Chegada registrada.' . $msg . '\nVerifique', true, 2 );