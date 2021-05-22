<?php

//-----------------------------------------------------------------------------
function exibir_Texto()
{
	include_once( 'J:/www.lanceweb.com.br/lanceweb/index_tutorial.php' );

	echo
	javaScriptIni(),
	'parent.Lance_CabFolheamento( "<br><br>Para assistir a um tutorial sobre Usuários e Grupos de Acesso, ' .
		'<a href=\'' . TUTORIAL_USUARIO . '\' target=\'_blank\' rel=\'noopener noreferre external\'>clique aqui</a><br><br>");',
	javaScriptFim();
}
