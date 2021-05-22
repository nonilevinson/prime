<?php

require_once( 'ext_email_para_usuario.php' );

class EmailPadrao extends EmailParaUsuario 
{
	//------------------------------------------------------------------------
	function Inicio()
	{ 
		$this->msgEmail .= 
			"<tr><td colspan='7' class='centro'>" . $this->tituloEmail . "</td></tr>
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
		
		$this->msgEmail .= 
			"<tr>
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
		$regA = &$this->regAtual;
		$regA->NOME 	= "[[ NOME ]]";
		$regA->APELIDO	= "[[ APELIDO ]]";

		$this->msgEmail .= 
			"<tr class='" . $this->estilo . "'>
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
		
		$this->estilo = ( $this->estilo == 'regPar' ? 'regImpar' : 'regPar' );
		
		// ALTERA O CAMPO ENVIOU
		$update = "UPdate arqLogEmail set Enviou = 1 Where idPrimario = " . $regA->IDLOGEMAIL;
//echo '<br><br>U= '.$update;
		sql_ExecutarComando( $update );
	}	
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------
global $g_debugProcesso;
$hoje = formatarData( HOJE, 'aaaa/mm/dd' );

$select = "Select L.Data, L.Hora, A.Titulo,
		U.Usuario, L.idPrimario as idLogEmail, L.Enviados, L.NEnviados, L.Total
	From arqLogEmail L
		inner join arqAcaoEmail	A on A.idPrimario=L.Titulo
		left join arqUsuario 	U on U.idPrimario=L.Usuario
	Where  L.Enviou = 0 and
		( ( L.Data = '" . $hoje . "' and L.Hora <= '" . AGORA() . "') or 
			( L.Data < '" . $hoje . "') ) 
	Order by L.Data, L.Hora";
//if( $g_debugProcesso ) echo '<br>S= '.$select;

$proc = new EmailPadrao();

$proc->campoHabilitado = "EmailPed";
$proc->tituloEmail     = CLIENTE_NOME . ": Emails enviados";
$proc->vetTotais       = array( "totEnviados", 'totNao', 'totTotal' );

$proc->Processar( $select );
