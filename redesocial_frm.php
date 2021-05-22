<?php 

//		Recebe $p_prefixo = Prefixo dos campos em cada arquivo que contém Endereço

function frmRedeSocial( $p_inicial, $p_prefixo )
{
	global $g_arquivoAtual, $g_prefixo;
	
	echo javaScriptSrc( LANCE_JS . 'lance_ajax.js' );
	
	$prefixo = $g_prefixo; 
	$g_prefixo .= $p_prefixo;

	$tela =	
		$g_arquivoAtual->Pedir( "Instagram", Instagram ) .
		$g_arquivoAtual->Pedir( "LinkedIn", LinkedIn ) .
		$g_arquivoAtual->Pedir( "Facebook", Facebook ) .
		$g_arquivoAtual->Pedir( "YouTube", YouTube ) .
		$g_arquivoAtual->Pedir( "Twitter", Twitter ) .
		$g_arquivoAtual->Pedir( "SnapChat", SnapChat ) .
		$g_arquivoAtual->Pedir( "Pinterest", Pinterest );
//echo '<br>'.$tela;
	$g_prefixo = $prefixo;
	return( $tela );
}

