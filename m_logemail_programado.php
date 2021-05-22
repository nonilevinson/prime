<?php

require_once( 'ext_email_para_usuario.php' );

class EmailUsuario extends EmailParaUsuario 
{
	//------------------------------------------------------------------------
	function Inicio()
	{
		$this->msgEmail .=
			"<tr><td colspan='7' class='centro'>". CLIENTE_NOME . ": " .
				$this->tituloEmail . "</td></tr>
			<tr>
				<td class='centro'>Data</td>
				<td class='centro'>Hora</td>
				<td class='centro'>Usuário</td>
				<td class='centro'>Título</td>
				<td class='centro'>Enviados</td>
				<td class='centro'>Não Enviados</td>
				<td class='centro'>Total</td>
			</tr>";
		
		parent::Inicio();
	}

	//------------------------------------------------------------------------
	function Fim()
	{
		global $g_reenvio;
		
		if( !$g_reenvio )
			$this->msgEmail .= "<tr><td colspan='7' class='centro'>Se houve algum email não enviado o sistema tentará enviá-lo mais uma vez</td></tr>";
		
		parent::Fim();
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
				<td>" . formatarHora( $regA->HORAINI ) . "</td>
				<td>" . ( $regA->USUARIO ? $regA->USUARIO : "(Master)" ) . "</td>
				<td>" . $regA->TITULO . "</td>
				<td class='centro'>" . formatarNum( $regA->ENVIADOS ) . "</td>
				<td class='centro'>" . formatarNum( $regA->NENVIADOS ) . "</td>
				<td class='centro'>" . formatarNum( $regA->TOTAL ) . "</td>
			</tr>";

		$this->trocarEstilo();
	}
}

function executarAvisoEmailProgramado()
{
	//------------------------------------------------------------------------
	// Declaração do Relatório
	//------------------------------------------------------------------------
	global $g_idLogEmail, $g_assunto;

	$proc = new EmailUsuario();

	$proc->campoHabilitado = "EmailEntre";
	$proc->tituloEmail     = $g_assunto;
	
	$select = "Select L.Data, L.HoraIni, A.Titulo, L.Enviados, L.NEnviados, L.Total, U.Usuario
		From arqLogEmail L
			inner join arqAcaoEmail	A on A.idPrimario=L.Titulo
			left join arqUsuario 	U on U.idPrimario=L.Usuario
		Where L.idPrimario = " . $g_idLogEmail;

	$proc->Processar( $select );
}
