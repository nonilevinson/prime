<?php

require_once( LANCE_PHP_ABSOLUTO . 'lance_enviar_emails_html.php' );

class EmailParaUsuario extends Lance_EnviarEmails_HTML
{
	//------------------------------------------------------------------------
	function TrocarEstilo()
	{
		$this->estilo = ( $this->estilo == 'regPar' ? 'regImpar' : 'regPar' );
	}

	//------------------------------------------------------------------------
	function Inicio()
	{
		global $g_remetentePadrao, $g_nomeEmail;

		if( !$this->ConectouSMTP() )
			return( false );

		$this->msgEmailIni =
			"<style>
				table{ font-family: Arial }
				th{ font-size: 13px; color: #ffffff; background-color: #666666; font-weight: bold }
				td{ font-size: 12px; color: #000000; }
				.direita{ text-align:right }
				.centro{ text-align:center }
				.regPar{ background-color: #c0c0c0 }
				.regImpar{ background-color: #ffffff }
			</style>
			<table cellpadding='4' border='1' style='border-collapse: collapse'>";

		$this->msgEmailFim = "";
		$this->estilo = 'regImpar';

		$select = "Select Email, NomeEmail
			From arqEmailRemet
			Where Padrao = 1 and Ativo = 1";
		$regEmailRemet  = sql_lerUmRegistro( $select );
		$remetente      = $regEmailRemet->EMAIL;
		$emailRemetente = $remetente != '' ? $remetente : $g_remetentePadrao;
		$emailNome      = $remetente != '' ? $regEmailRemet->NOMEEMAIL : $g_nomeEmail;

		$this->PrepararEmail( '', '', $emailRemetente, $emailNome );
	}

	//------------------------------------------------------------------------
	function Fim()
	{
		global $g_debugProcesso, $g_horaIni, $g_supervisores, $g_nomeSupervisor, $g_rodapeEmail;
		$regA = &$this->regAtual;
		$g_horaIni = AGORA();

		$this->tituloEmail  = "SWSM: " . $this->tituloEmail;
		$this->msgEmailFim .= "</table>" . $g_rodapeEmail;
		$this->txtEmail     = $this->msgEmailIni . $this->msgEmail . $this->msgEmailFim;
if( $g_debugProcesso ) echo '<br><b>GR0 txtEmail=</b><br>'.$this->txtEmail;

		if( $this->campoHabilitado )
		{
			//* usuários cadastrados para receber
			$select = "Select U.Email
			From arqUsuario U
			Where U.Email != '' and U." . $this->campoHabilitado . " = 1 and U.Ativo = 1
				and U.Grupo is not null";
			$emailLog = sql_lerRegistros( $select );
//if( $g_debugProcesso ) echo '<br><b>GR0 arqUsuario S=</b> '.$select;
			$emailLog = sql_lerRegistros( $select );
			$vetEmail = [];

			foreach( $emailLog as $umEmail )
			{
if( $g_debugProcesso ) echo '<br><b>GR0 Envia para=</b> '.$umEmail->EMAIL;
				$vetEmail[] = [ $umEmail->EMAIL, $umEmail->USUARIO ];
			}

$teste = true;
			if( $teste )
			{
				$this->comSupervisor = false;
				echo '<br><center><b><font size="6">ext_email_para_usuario EM TESTE</font></b></center><br>'.$this->txtEmail;
			}
			else
				$this->ProcessarMultiEmail( $vetEmail, $this->tituloEmail );
		}

//$this->ProcessarEmail( 'noni.levinson@gmail.com', "Usuário - " . $this->tituloEmail );

		$this->txtEmailSemRodape = $this->txtEmail . "<br>I=" . $g_horaIni . " F=" . AGORA();

		//* o DesconectarSMTP envia emails aos supervisores
		$this->podeSubstituirHtml = false;
		$this->DesconectarSMTP();

		$this->msgEmail = '';

		if( $g_debugProcesso ) echo '<br><b>FIM EXT_EMAIL_PARA_USUARIO ÀS '.AGORA().'</b>';
	}
}
