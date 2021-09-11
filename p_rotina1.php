<?php

global $g_debugProcesso;

sql_abrirBD( OperacaoAtual() );

$select = "Select RecorDia From cnfXConfig";
$recorDia = sql_lerUmRegistro( $select )->RECORDIA;
if( $g_debugProcesso ) echo '<br><b>GR0 cnfXConfig S=</b> '.$select.' <b>recorDia=</b> '.$recorDia;

$hoje = formatarData( HOJE, 'aaaa/mm/dd');
$diaHoje = dataDia( $hoje );
$ultDia = ultDiaDoMes( $hoje );

if( $g_debugProcesso ) echo '<br><b>GR0 hoje=</b> '.$hoje.' diaHoje= '.$diaHoje.' ult= '.$ultDia;
echo '<br>';

if( $recorDia == $diaHoje || $recorDia > $ultDia || ultimaLigOpcaoEm( 162 ) )
   echo '<br>&nbsp;&nbsp;PODE';
else
   echo '<br>&nbsp;&nbsp;NÃO PODE';
   
sql_fecharBD();
