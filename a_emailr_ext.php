<?php

//======================================================================
	require_once( LANCE_PHP_ABSOLUTO . 'lance_enviar_emails_html.php' );

	class EmailPadrao extends Lance_EnviarEmails_HTML
	{
		function Inicio()
		{
			global $g_debugProcesso, $g_supervisores, $g_remetentePadrao;

			if( !$this->ConectouSMTP() )
				return( false );

			$assunto = $this->empresa . " - SWSM - " . $this->funcao . " de email remetente";

			$headers = EmailHeader( "Kogumelo", "info@kogumelo.com.br" );

			$msg = "<html><head><title>" . $assunto .  "</title>
				<style>.destaque{ background-color:#ffff00;color:#000044;font-weight:bold }</style></head>
				<body><center>
				<table cellpadding='3' cellspacing='1' bgcolor='#ffffff' border='1'>
				<tr><td  colspan='2'>" . $assunto . "</td></tr>
				<tr><td >Email novo</td><td>" . $this->emailNovo . "</td></tr>";

			if( $this->funcao == "Alteração" )
				$msg .= "<tr><td >Email velho</td><td>" . $this->emailVelho . "</td></tr>";

			$msg .= "</table>
				<br>Este email só é enviado para os supervisores.
				</center></body></html>";
// if( $g_debugProcesso ) echo '<br>msg= '.$msg;

			$this->PrepararEmail( '', $msg, $g_remetentePadrao );
//			$this->ProcessarMultiEmail( $g_supervisores, $assunto );
//$this->ProcessarEmail( 'noni.levinson@gmail.com', $assunto );

			$this->comSupervisor = false;
			$this->DesconectarSMTP();
		}
	}

//------------------------------------------------------------------------
function avisarEmailRemet( $p_funcao, $p_emailNovo, $p_emailVelho, $p_empresa )
{
	$proc = new EmailPadrao();
	$proc->funcao = $p_funcao;
	$proc->empresa = $p_empresa;
	$proc->emailNovo = $p_emailNovo;
	$proc->emailVelho = $p_emailVelho;

	$proc->Processar();

}

?>
