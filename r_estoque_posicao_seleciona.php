<?php

global $g_debugProcesso;
$parQSelecao = lerParametro( 'parQSelecao' );

if( $parQSelecao->DATAINI )
	require_once( 'r_estoque_posicao_data.php' );
else
	require_once( 'r_estoque_posicao.php' );
