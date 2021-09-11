<?php

require_once( 'ext_email_para_usuario.php' );

class EmailUsuario extends EmailParaUsuario
{
	//------------------------------------------------------------------------
	function Inicio()
	{
		global $g_qtd;

		$this->msgEmail = "<tr><td colspan='7' align='center'>" . $this->tituloEmail . "</td></tr>";

		parent::Inicio();
	}

	//------------------------------------------------------------------------
	function Fim()
	{
		$regA = &$this->regAtual;

		$balanco = $this->ValorTotal( 'totReceber' ) + $this->ValorTotal('totPagar' );
		$totQtd = $this->ValorTotal( 'totQtdReceber' ) + $this->ValorTotal('totQtdPagar' );

		$this->msgEmail .=
			"<tr><td colspan='7' align='center'>Total Geral</td></tr>
			<tr>
				<td colspan='4'>A receber</td>
				<td align='right'>" . $this->FormatarTotal( 'totReceber', [ 2, '','', ')' ] ) . "</td>
				<td colspan='2'>" . $this->FormatarTotal( 'totQtdReceber' ) . " contas</td>
			</tr>
				<tr>
				<td colspan='4'>A pagar</td>
				<td align='right'>" . $this->FormatarTotal( 'totPagar', [ 2, '','', ')' ] ) . "</td>
				<td colspan='2'>" . $this->FormatarTotal( 'totQtdPagar' ) . " contas</td>
			</tr>
			<tr>
				<td colspan='4'>Balanço</td>
				<td align='right'>" . formatarNum( $balanco , 2, 0, 0, ')' ) . "</td>
				<td colspan='2'>" . formatarNum( $totQtd ) . " contas</td>
			</tr>";

		parent::Fim();
	}

	//------------------------------------------------------------------------
	//	Quebra por Clinica
	//------------------------------------------------------------------------
	function QuebraPorClinica()
	{
		return( $this->regAtual->CLINICA );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorClinica()
	{
		$regA = &$this->regAtual;

		$this->msgEmail .=
			"<tr><td colspan='8' align='center'> " . $regA->CLINICA  . "</td></tr>
			<tr>
			<td>Tipo</td>
			<td>Forma</td>
			<td>Conta</td>
			<td>Vencimento</td>
			<td>Valor</td>
			<td>Nome</td>
			<td>Histórico</td>
			</tr>";
	}

	//------------------------------------------------------------------------
	function PeQuebraPorClinica()
	{
		$balanco = $this->ValorTotal( 'totReceber' ) + $this->ValorTotal('totPagar' );
		$totQtd = $this->ValorTotal( 'totQtdReceber' ) + $this->ValorTotal('totQtdPagar' );

		$this->msgEmail .=
			"<tr>
				<td colspan='4'>A receber</td>
				<td align='right'>" . $this->FormatarTotal( 'totReceber', [ 2, '','', ')' ] ) . "</td>
				<td colspan='2'>" . $this->FormatarTotal( 'totQtdReceber' ) . " contas</td>
			</tr>
			<tr>
				<td colspan='4'>A pagar</td>
				<td align='right'>" . $this->FormatarTotal( 'totPagar', [ 2, '','', ')' ] ) . "</td>
				<td colspan='2'>" . $this->FormatarTotal( 'totQtdPagar' ) . " contas</td>
			</tr>
			<tr>
				<td colspan='4'>Balanço</td>
				<td align='right'>" . formatarNum( $balanco , 2, 0, 0, ')' ) . "</td>
				<td colspan='2'>" . formatarNum( $totQtd ) . " contas</td>
			</tr>
			<tr><td colspan='7'>&nbsp;</td></tr>";
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;
		$valor = $regA->TPGREC == 1 ? -$regA->VALOR : $regA->VALOR;
		$idTPgRev =$regA->IDTPGREC;

		$this->msgEmail .= "
			<tr class='" . $this->estilo . "'>
				<td>" . $regA->TPGREC . "</td>
				<td>" . $regA->TFCOBRA . "</td>
				<td align='right'>" . $regA->TRANSACAO . "</td>
				<td align='right'>" . formatarData( $regA->VENCIMENTO ) . "</td>
				<td align='right'>" . formatarValor( $valor, 0, 0, ')' ) . "</td>
				<td>" . $regA->NOME . "</td>
				<td>" . $regA->HISTORICO . "</td>
			</tr>";

		$this->acumularTotal( 'totReceber', $idTPgRev == 2 ? $regA->VALOR : 0 );
		$this->acumularTotal( 'totPagar',	$idTPgRev == 1 ? -$regA->VALOR : 0 );
		$this->acumularTotal( 'totQtdReceber', $idTPgRev == 2 ? 1 : 0 );
		$this->acumularTotal( 'totQtdPagar', $idTPgRev == 1 ? 1 : 0 );

		$this->estilo = ( $this->estilo == 'regPar' ? 'regImpar' : 'regPar' );
	}
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------

global $g_debugProcesso, $g_qtd, $g_contas;
$proc = new EmailUsuario();

$proc->comSupervisor   = false;
$proc->campoHabilitado = "EmailFinan";
$proc->tituloEmail = $g_qtd . " contas recorrentes de " . CLIENTE_NOME . " criadas  em " . formatarData( HOJE );

$proc->DefinirQuebras( [ 'QuebraPorClinica', SIM, NAO, SIM ] );
$proc->DefinirTotais( 'totReceber', 'totPagar', 'totQtdReceber', 'totQtdPagar' );

sql_abrirBD( false );

$proc->Processar( $g_contas );
// if( $g_debugProcesso ) echo '<br><b>NO m_recorrentes_criadas g_contas=</b> '; print_r( $g_contas );

sql_fecharBD();
