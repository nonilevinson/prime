<?php

require_once( 'ext_email_para_usuario.php' );

class EmailUsuario extends EmailParaUsuario 
{
	//------------------------------------------------------------------------
	function Inicio()
	{
		$this->msgEmail .=
			"<tr><th colspan='3' class='centro'>". $this->tituloEmail . "</td></tr>
			<tr>
				<td class='centro'>Data</td>
				<td class='centro'>Hora</td>
				<td class='centro'>T�tulo</td>
			</tr>";
		
		parent::Inicio();
	}

	//------------------------------------------------------------------------
	// Evento B�sico
	//------------------------------------------------------------------------
	function Basico()
	{
		global $g_data, $g_hora, $g_titulo;
		$regA = &$this->regAtual;
		$regA->NOME 	= "[[ NOME ]]";
		$regA->APELIDO	= "[[ APELIDO ]]";
		
		$this->msgEmail .=
			"<tr class='" . $this->estilo . "'>
				<td>" . formatarData( $g_data ) . "</td>
				<td>" . formatarHora( $g_hora ) . "</td>
				<td>" . $g_titulo . "</td>
			</tr>";

		$this->trocarEstilo();
	}
}

function executarAvisoEmail()
{
	//------------------------------------------------------------------------
	// Declara��o do Relat�rio
	//------------------------------------------------------------------------
	global $g_regAtual, $g_assunto;

	$proc = new EmailUsuario();
	$proc->campoHabilitado = "EmailAces";
	$proc->tituloEmail = $g_assunto;

	$select = "Select L.idPrimario
		from arqLogEmail L
		where L.idPrimario = " . $g_regAtual->IDPRIMARIO;

	$proc->Processar( $select );
}
