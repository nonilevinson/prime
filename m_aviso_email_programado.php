<?php

require_once( 'ext_email_para_usuario.php' );

class EmailUsuario extends EmailParaUsuario 
{
	//------------------------------------------------------------------------
	function Inicio()
	{
		$this->msgEmail .=
			"<tr><td colspan='5' class='centro'>". 
				$this->tituloEmail . "</td></tr>
			<tr>
				<td class='centro'>Data</td>
				<td class='centro'>Hora</td>
				<td class='centro'>Usuário</td>
				<td class='centro'>Título</td>" .
				( $this->classificacao ? "<td class='centro'>Classificação</td>" : "" ) .
				"<td class='centro'>Previsão de envio</td>
			</tr>";
		
		parent::Inicio();
	}

	//------------------------------------------------------------------------
	// Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;
		$regA->NOME 	= "[[ NOME ]]";
		$regA->APELIDO	= "[[ APELIDO ]]";
		
		$this->msgEmail .=
			"<tr class='" . $this->estilo . "'>
				<td>" . formatarData( $regA->DATA ) . "</td>
				<td>" . formatarHora( $regA->HORA ) . "</td>
				<td>" . ( $regA->USUARIO ? $regA->USUARIO : "(Master)" ) . "</td>
				<td>" . $regA->TITULO . "</td>
				<td class='centro'>" . formatarNum( $this->qtosEmails ) . "</td>
			</tr>";

		$this->trocarEstilo();
	}
}

function executarAvisoEmailProgramado( $p_qtosEmails )
{
	//------------------------------------------------------------------------
	// Declaração do Relatório
	//------------------------------------------------------------------------
	global $g_idLogEmail, $g_assunto;;

	$proc = new EmailUsuario();
	$proc->campoHabilitado = "EmailAces";
	$proc->tituloEmail = $g_assunto;
	$proc->qtosEmails = $p_qtosEmails;

	$select = "Select L.Data, L.Hora, A.Titulo, U.Usuario
		From arqLogEmail L
			inner join arqAcaoEmail	A on A.idPrimario=L.Titulo
			left join arqUsuario 	U on U.idPrimario=L.Usuario
		Where L.idPrimario = " . $g_idLogEmail;

	$proc->Processar( $select );
}
