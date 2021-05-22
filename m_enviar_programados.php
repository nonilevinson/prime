<?php

include_once( 'm_logemail_programado.php' );
include( 'm_acao_cliente.php' );

global $parQSelecao, $g_debugProcesso, $g_programado, $g_idLogEmail, $g_assunto, $g_reenvio;

$parQSelecao = lerParametro( "parQSelecao" );
$g_programado = true;
$g_reenvio = false;

sql_abrirBD( false );

$id = lerInput( 'ID' );

while( true )
{
	$select = "Select first 1 *
		From arqLogEmail L
		Where L.Enviados = 0 and L.Total = 0 and L.HoraIni is null and " . 
			( $id 
				? "L.idPrimario = " . $id 
				: "( L.Data < '" . formatarData( HOJE, 'aaaa/mm/dd' ) . "' or
					( L.Data = '" . formatarData( HOJE, 'aaaa/mm/dd' ) . "' and L.Hora <= '" . AGORA() ."') )" ) . 
		" Order by L.Data, L.Hora";
	$umReg = sql_lerUmRegistro( $select );
//echo '<br><b>m_enviar_programados LOGEMAIL S=</b> '.$select.' IDPRIMARIO= '.$umReg->IDPRIMARIO;

	if( !$umReg )
		break;

	sql_update( "arqLogEmail", array(
			"HoraIni" => AGORA() ),
		"idPrimario=" . $umReg->IDPRIMARIO );
	sql_commit();
	sql_commit();

	$g_idLogEmail = $umReg->IDPRIMARIO; // usado para ao final enviar email ao usuário avisando que a ação foi enviada

	$parQSelecao->ACAOEMAIL		= $umReg->TITULO;
	$parQSelecao->CLIENTE 		= $umReg->CLIENTE;

	$select = "Select idPrimario From arqEmailRemet Where Email = '" . $umReg->EMAILREMET . "'";
	$parQSelecao->EMAILREMET = sql_lerUmRegistro( $select )->IDPRIMARIO;
//echo "<br>arqEmailRemet S= ".$select.' >>parQSelecao->EMAILREMET= '.$parQSelecao->EMAILREMET.'<br>';

	enviarCRM();
	
	$g_assunto = "Emails enviados pelo SWSM";
	executarAvisoEmailProgramado();
}

if( $g_debugProcesso ) echo '<br><br>FIM DO M_ENVIAR_PROGRAMADOS';	

sql_fecharBD();
