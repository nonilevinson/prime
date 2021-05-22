<?php

include_once( 'm_aviso_email_programado_excluido_alterado.php' );

global $g_debugProcesso, $g_regAntes, $g_assunto, $g_data, $g_hora, $g_titulo, $g_ehPosAlt;

/* incluido em 13/02/2015 para cada base gerenciar a sua própria task de envio
@rem SCHTASKS /?
@rem /Delete								=> criar nova task 
@rem /tn kmescolar_[cliente]_[data]_[hora]_[idprimario]  => nome da task
@rem /f => não pede confirmação
*/

$idLogEmail = $g_regAntes->IDPRIMARIO;

excluirTask( '00_' . CLIENTE_PASTA . '_' . $idLogEmail );

/* fim gerenciar task */

if( !$g_ehPosAlt )
{
	$g_data = $g_regAntes->DATA;
	$g_hora = $g_regAntes->HORA;
	$g_titulo = $g_regAntes->TITULO_TITULO;

//echo '<br>CHAMA m_avisoemail_programado_excluido_alterado.php';
	$g_assunto = "Programação excluída no SWSM";
	executarAvisoEmail();
}

//TecleAlgo( 'x');
