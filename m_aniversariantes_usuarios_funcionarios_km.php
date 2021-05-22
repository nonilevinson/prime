<?php

// Este email é diferente de todos os outros e não usa o ext_emai ou o ext_email_para_usuario

require_once( LANCE_PHP_ABSOLUTO . 'lance_enviar_emails_html.php' );

class EmailPadrao extends Lance_EnviarEmails_HTML
{
	//------------------------------------------------------------------------
	function Inicio()
	{
		if( !$this->ConectouSMTP() )
			return( false );

		$regA = &$this->regAtual;
		
		$this->msgEmail = 
			"<center>
			<a href='https://www.swsm.com.br' target='_blank'>
			<IMG src='https://www.swsm.com.br/parabens.png' alt='Parabéns' border='0' valign='top'></a>
			</center>";			
	}
	
	//------------------------------------------------------------------------
	function Fim()
	{
		$this->comSupervisor = false;
		$this->DesconectarSMTP();
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		global $g_debugProcesso, $g_remetentePadrao;
		$regA = &$this->regAtual;
if( $g_debugProcesso ) echo $this->msgEmail;

		$this->PrepararEmail( '', $this->msgEmail, $g_remetentePadrao );

//if( $g_debugProcesso ) echo '<br><b>EMAIL DO USUARIO=</b> '. $regA->EMAIL;
		$this->ProcessarEmail( $regA->EMAIL, "Parabéns, " . $regA->USUARIO );
//		$this->ProcessarEmail( 'noni@kogumelo.com', "Parabéns, - " . CLIENTE_NOME . ' - ' .$regA->USUARIO );
	}	
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------
$proc = new EmailPadrao();

sql_abrirBD( false );

$select = "Select U.Email, U.Usuario, extract( day from U.Nascimento )
	From arqUsuario U
	Where extract( day from U.Nascimento ) = " . dataDia( HOJE ) . " and
		extract( month from U.Nascimento ) = " . dataMes( HOJE ) . " and
		U.Nascimento is not null and U.Ativo = 1 and U.Email <> '' 
	Order by U.Usuario";

sql_fecharBD();

$proc->Processar( $select );
