<?php

global $g_debugProcesso, $parGeraPlant;
$parGeraPlant = lerParametro( 'parGeraPlant' );
sql_abrirBD( OperacaoAtual() );

//======================================================
function gerarPlantao( $p_dia )
{
   global $g_debugProcesso, $parGeraPlant;
   
   sql_insert( "arqPlantao", [
      "idPrimario" => [ sql_NumeroUnico(), FORCAR_NUMERICO ],
      "Clinica"    => $parGeraPlant->CLINICA,
      "DataIni"    => $parGeraPlant->DATAINI,
      "DataFim"    => ValorOuNull( $parGeraPlant->DATAFIM, '', false ),
      "TDiaSem"    => $p_dia,
      "Usuario"    => $parGeraPlant->MEDICO ] );   
}

if( $parGeraPlant->DOM )
   gerarPlantao( 1 );

if( $parGeraPlant->SEG )
   gerarPlantao( 2 );

if( $parGeraPlant->TER )
   gerarPlantao( 3 );

if( $parGeraPlant->QUA )
   gerarPlantao( 4 );

if( $parGeraPlant->QUI )
   gerarPlantao( 5 );

if( $parGeraPlant->SEX )
   gerarPlantao( 6 );

if( $parGeraPlant->SAB )
   gerarPlantao( 7 );

sql_fecharBD();

$teste = false;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
else
   tecleAlgoVolta( 'Plantões criados.\nVerifique', true );