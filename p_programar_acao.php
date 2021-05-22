<?php

include_once( 'm_aviso_email_programado.php' );

global $g_debugProcesso, $g_idLogEmail, $g_assunto;
$parQSelecao = lerParametro( 'parQSelecao' );
sql_abrirBD();

$g_idLogEmail = sql_idPrimario();
$g_assunto = $parQSelecao->ACAOEMAIL;
$dataIni = $parQSelecao->DATAINI;
$horaIni = $parQSelecao->HORAINI;

$select = "Select idPrimario 
	From arqLogEmail
	Where Titulo = " . $g_assunto . " and Data = '" . $dataIni . "' and Hora = '" .
		$horaIni . "'";
$regLogEmail = sql_lerUmRegistro( $select );
//echo '<br>S= '.$select;	
if( $regLogEmail )
{
	TecleAlgoVolta( "Já existe uma programação desta ação para este dia e horário. Modifique suas opções e programe de novo", true, 1 );
}
else
{
	$select = "Select Email From arqEmailRemet Where idPrimario = " . $parQSelecao->EMAILREMET;
	$emailRemet = sql_lerUmRegistro( $select )->EMAIL;

	sql_insert( "arqLogEmail", array(
		"idPrimario" => $g_idLogEmail,
		"Titulo" => $g_assunto,
		"Data" => $dataIni,
		"Hora" => $horaIni,
		"Usuario" => USUARIO_ATUAL,
		"Enviados" => 0,
		"NEnviados" => 0,
		"Lidos" => 0,
		"EmailRemet" => $emailRemet,
		"HoraIni" => null,
		"HoraFim" => null,
		"HoraReenv" => null,
		"Enviou" => 0,
		"Opcao" => 106,
		"Cliente" => ValorOuNull( $parQSelecao->CLIENTE, "", false ) ) );

	// CALCULAR QUANTOS EMAISL SERÃO ENVIADOS
	$selectQtos = "Select count(*) as QtosEmails
		From arqPessoa P
		Where " . 
		filtrarPorLig( 'P.idPrimario', $parQSelecao->CLIENTE ) .
		" P.Email <> '' and P.RecEmail = 1 and P.Ativo = 1";
	$qtosEmails = sql_lerUmRegistro( $selectQtos )->QTOSEMAILS;
//if( $g_debugProcesso ) echo '<br>QTOS= '.$selectQtos.' >> '.$qtosEmails;

	criarTask( '00_' . CLIENTE_PASTA . '_' . $g_idLogEmail, 
		$dataIni, $horaIni, 
		'c:\bat\SWSM_email.bat ' . CLIENTE_PASTA . ' ' . $g_idLogEmail, 
		'noni' );

//echo '<br>CHAMA m_avisoemail_programado.php para '.$g_idLogEmail." \n";
	$g_assunto = CLIENTE_NOME . ": Email programado";
	executarAvisoEmailProgramado( $qtosEmails );

	TecleAlgoVolta( "Programação gravada com previsão de " . formatarNum( $qtosEmails ) . 
		( $qtosEmails > 1 ? "emails" : "email" ) . " a enviar", true, 1 );		
}

sql_fecharBD();
