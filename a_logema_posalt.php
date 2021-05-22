<?php

include_once( 'm_aviso_email_programado_excluido_alterado.php' );

global $g_debugProcesso, $g_regAntes, $g_regAtual, $g_assunto, $g_data, $g_hora, $g_titulo, 
	$g_ehPosAlt;

/* incluido em 13/02/2015 para cada base gerenciar a sua própria task de envio */
if( $g_regAtual->DATA != $g_regAntes->DATA  ||  $g_regAtual->HORA != $g_regAntes->HORA )
{
	$g_ehPosAlt = true;
	include_once( 'a_logema_posdel.php' );
	include_once( 'a_logema_posins.php' );
}

/* fim gerenciar task */

if( $g_regAntes->DATA != $g_regAtual->DATA || $g_regAntes->HORA != $g_regAtual->HORA ||
	$g_regAntes->TITULO_TITULO != $g_regAtual->TITULO_TITULO )
{
	$g_data = $g_regAtual->DATA;
	$g_hora = $g_regAtual->HORA;
	$g_titulo = $g_regAtual->TITULO_TITULO;

	//echo '<br>CHAMA m_avisoemail_programado_excluido_alterado.php';
	$g_assunto = "Programação alterada no SWSM";
	executarAvisoEmail();
}

?>