<?php

require_once( 'ext_email_para_usuario.php' );

class EmailPadrao extends EmailParaUsuario
{
	//------------------------------------------------------------------------
	function Inicio()
	{
		$this->msgEmail .= "
			<tr><td colspan='7' class='centro'>" . $this->tituloEmail . "</td></tr>
			<tr>
				<td class='centro'>Data</td>
				<td class='centro'>Hora</td>
				<td class='centro'>Usuário</td>
				<td class='centro'>Assunto do email</td>
				<td class='centro'>Enviados</td>
				<td class='centro'>Não Enviados</td>
				<td class='centro'>Total</td>
			</tr>";

		parent::Inicio();
	}

	//------------------------------------------------------------------------
	function Fim()
	{
		$regA = &$this->regAtual;

		$this->msgEmail .= "
			<tr>
			<td colspan='4'>Total</td>
				<td class='centro'>" . $this->FormatarTotal( 'totEnviados' ) . "</td>
				<td class='centro'>" . $this->FormatarTotal( 'totNao' ) . "</td>
				<td class='centro'>" . $this->FormatarTotal( 'totTotal' ) . "</td>
			</tr>";

		parent::Fim();
	}

	//------------------------------------------------------------------------
	// Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{
		global $g_debugProcesso;
		$regA = &$this->regAtual;
		$regA->NOME 	= "[[ NOME ]]";
		$regA->APELIDO	= "[[ APELIDO ]]";

		$this->msgEmail .= "
			<tr>
				<td>" . formatarData( $regA->DATA ) . "</td>
				<td>" . formatarHora( $regA->HORA ) . "</td>
				<td>" . $regA->USUARIO . "</td>
				<td>" . $regA->TITULO . "</td>
				<td class='centro'>" . formatarNum( $regA->ENVIADOS ) . "</td>
				<td class='centro'>" . formatarNum( $regA->NENVIADOS ) . "</td>
				<td class='centro'>" . formatarNum( $regA->TOTAL ) . "</td>
			</tr>";

		$this->acumularTotal( 'totEnviados', $regA->ENVIADOS );
		$this->acumularTotal( 'totNao',		 $regA->NENVIADOS );
		$this->acumularTotal( 'totTotal',	 $regA->TOTAL );

		//* ALTERA O CAMPO ENVIOU
		sql_update( "arqLogEmail", [
				"Enviou" => 1 ],
			"idPrimario = " . $regA->IDLOGEMAIL );
	}
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------
global $g_debugProcesso;
$hoje  = formatarData( HOJE, 'aaaa/mm/dd' );
$agora = formatarHora( AGORA, 'hh:mm:00' );

$select = "Select L.Data, L.Hora, A.Titulo, U.Usuario, L.idPrimario as idLogEmail,
		L.Enviados, L.NEnviados, L.Total
	From arqLogEmail L
		join arqAcaoEmail		A on A.idPrimario=L.Titulo
		left join arqUsuario U on U.idPrimario=L.Usuario
	Where  L.Enviou = 0 and
		( ( L.Data = " . $hoje . " and L.Hora <= '" . $agora . "' ) or ( L.Data < " . $hoje . " ) )
	Order by L.Data, L.Hora";
//if( $g_debugProcesso ) echo '<br>S= '.$select;

$proc = new EmailPadrao();

$proc->campoHabilitado = "EmailPed";
$proc->tituloEmail     = CLIENTE_NOME . ": Emails enviados";
$proc->vetTotais       = [ "totEnviados", 'totNao', 'totTotal' ];

$proc->Processar( $select );
