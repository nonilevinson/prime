<?php

/* Este email é diferente dos outros e não usa o ext_emai ou o ext_email_para_usuario
	Não é enviado email aos aniversariantes do dia, somente aos outros usuários */

require_once( LANCE_PHP_ABSOLUTO . 'lance_enviar_emails_html.php' );

class EmailPadrao extends Lance_EnviarEmails_HTML
{
	//------------------------------------------------------------------------
	function Inicio()
	{
		if( !$this->ConectouSMTP() )
			return( false );

		$this->tituloEmail = CLIENTE_NOME . ": Aniversariantes em " . formatarData( HOJE );

		$this->msgEmail = "
			<style>
				table{ font-family: Arial }
				th{ font-size: 13px; color: #ffffff; background-color: #666666; font-weight: bold; padding:5px }
				td{ font-size: 12px; color: #000000; }
				.regPar{ background-color: #c0c0c0 }
				.regImpar{ background-color: #ffffff }
			</style>
			<table>
			<tr><td colspan='3' align='center' height='30'>Este é um email automático, não responda a ele</td></tr>
			<tr><th colspan='2' align='center'>" . $this->tituloEmail . "</th></tr>
			<tr>
			<th>Nome</th>
			<th>Email</th>
			</tr>";
	}

	//------------------------------------------------------------------------
	function Fim()
	{
		global $g_debugProcesso;
		$regA = &$this->regAtual;

		$this->msgEmail .= "
			<tr><th colspan='2'>Não perca a oportunidade e deseje Parabéns!</th></tr>
			<tr><th colspan='2'>Se quiser utilize o email indicado.</th></tr>
			</table>
			<br>
			<br>
			<table cellSpacing='0' cellPadding='0' border='0'>
			<tr>
				<td style='font-size:7.5pt; font-family:Lucida Sans,sans-serif'>Enviado pelo
					<a href='https://www.swsm.com.br' target='_blank'>
					<img src='https://www.swsm.com.br/swsm_peq.png' align='absbottom' alt='SWSM' title='SWSM' border='0'></a>
					<br>Sistemas Web Sob Medida<br>
				</td>
			</tr>
			</table>";

		$this->PrepararEmail( '', $this->msgEmail, $g_remetentePadrao );

		//* ENVIA PARA OS CONFIGURADOS
		$select = "Select U.Email
			From arqUsuario U
			Where U.Email <> '' and U.Ativo = 1 and U.Grupo is not null and
				(
					cast( extract( day from U.Nascimento ) ||'/'|| extract( month from U.Nascimento as varchar(5) ) !=
					cast( extract( day from '" . $this->hoje . "' ) ||'/'|| extract( month from '" . $this->hoje . "' as varchar(5) )
				)
			Order by U.Usuario";
//if( $g_debugProcesso ) echo '<br>SEL= '. $select;
		$regEmail = sql_lerRegistros( $select );
		foreach( $regEmail as $umEmail )
		{
// if( $g_debugProcesso ) echo '<br>EMAIL= '.$umEmail->EMAIL;
			$this->ProcessarEmail( $umEmail->EMAIL, $this->tituloEmail );
		}
//$this->ProcessarEmail( 'noni@kogumelo.com', $this->tituloEmail );
if( $g_debugProcesso ) echo $this->msgEmail;

		$this->comSupervisor = false;
		$this->DesconectarSMTP();
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;

		$this->msgEmail .= "
			<tr>
				<td>" . $regA->USUARIO . "</td>
				<td>" . $regA->EMAIL . "</td>
			</tr>";

		parent::Basico();
	}
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------
$proc = new EmailPadrao();
$proc->hoje = formatarData( HOJE, 'aaaa/mm/dd' );

$select = "Select U.Usuario, U.Email
	From arqUsuario U
	Where U.Grupo is not null and U.Ativo = 1 and U.Nascimento is not null and
		extract( day from U.Nascimento ) = extract( day from '" . $proc->hoje . "' ) and
		extract( month from U.Nascimento ) = extract( month from '" . $proc->hoje . "' ) and
	Order by U.Usuario";

$proc->Processar( $select );
