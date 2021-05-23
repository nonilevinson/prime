<?php

//----------------------------------------------------------

sql_abrirBD( false );

$select = "Select X.QtasDesmar
   From cnfXConfig X";
$umXConfig = sql_lerUmRegistro( $select );

$qtasDesmar = $umXConfig->QTASDESMAR;

define( 'G_QTASDESMAR', $qtasDesmar );

echo
javaScriptIni(),
	'var g_$qtasDesmar = ', $qtasDesmar , ';',
javaScriptFim();
