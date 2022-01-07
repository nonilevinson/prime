<?php

require_once( 'ext_email_para_usuario.php' );

class EmailUsuario extends EmailParaUsuario
{
	//------------------------------------------------------------------------
	function Inicio()
	{
		$this->msgEmail = "<tr><td colspan='10' class='centro'>" . $this->tituloEmail . "</td></tr>";

		parent::Inicio();
	}

	//------------------------------------------------------------------------
	function Fim()
	{
		$this->PeQuebra( "Total Geral" );
		parent::Fim();
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal )
	{
		if( $p_cabTotal )
			$this->msgEmail .= "<tr><td colspan='10' class='centro'> " . $p_cabTotal . "</td></tr>";

		$totReceber    = $this->ValorTotal( 'totReceber' );
		$totPagar      = $this->ValorTotal('totPagar' );
		$balanco       = $totReceber + $totPagar;
		$totQtdReceber = $this->ValorTotal( 'totQtdReceber' );
		$totQtdPagar   = $this->ValorTotal( 'totQtdPagar' );
		$totQtd        = $totQtdReceber + $totQtdPagar;

		$this->msgEmail .= "
			<tr>
				<td colspan='6'>A receber</td>
				<td align='right'>" . formatarValor( $totReceber ) . "</td>
				<td colspan='2'>" . formatarNum( $totQtdReceber ) . " parcelas</td>
				</tr>
				<tr>
				<td colspan='6'>A pagar</td>
				<td align='right'>" . formatarValor( $totPagar, 2, '', '(' ) . "</td>
				<td colspan='2'>" . formatarNum( $totQtdPagar ) . " parcelas</td>
				</tr>
				<tr>
				<td colspan='6'>Balanço</td>
				<td align='right'>" . formatarValor( $balanco, 2, 0, ')' ) . "</td>
				<td colspan='2'>" . formatarNum( $totQtd ) . " parcelas</td>
			</tr>
			<tr><td colspan='10'>&nbsp;</td></tr>";
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

		$this->msgEmail .= "
			<tr><td colspan='8' align='center'> " . $regA->CLINICA  . "</td></tr>
			<tr>
				<td class='centro'>Tipo</td>
				<td class='centro'>Forma</td>
				<td class='centro'>Pago?</td>
				<td class='centro'>Comp</td>
				<td class='centro'>Transação</td>
				<td class='centro'>Parcela</td>
				<td class='centro'>Valor</td>
				<td class='centro'>Pessoa</td>
				<td class='centro'>Histórico</td>
			</tr>";

	}

	//------------------------------------------------------------------------
	function PeQuebraPorClinica()
	{
		$this->PeQuebra();
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;
		$tPgRec = $regA->IDTPGREC;
		$valor = $tPgRec == 1 ? -$regA->VALORLIQ : $regA->VALORLIQ;

		$this->msgEmail .= "
			<tr>
				<td  class='centro'>" . formatarData( $regA->VENCIMENTO ) . "</td>
				<td>" . $regA->TPGREC . "</td>
				<td>" . $regA->TFCOBRA . "</td>
				<td align='right'>" . formatarData( $regA->COMPETE, 'mm/aaaa' ) . "</td>
				<td align='right'>" . $regA->TRANSACAO . "</td>
				<td class='centro'>" . $regA->PARCELA . '/' . $regA->TRGQTDPARC . "</td>
				<td align='right'>" . formatarValor( $valor, 0, 0, ')' ) . "</td>
				<td>" . $regA->NOME . "</td>
				<td>" . $regA->HISTORICO . "</td>
			</tr>";

		$this->acumularTotal( 'totReceber', $tPgRec == 2 ? $valor : 0 );
		$this->acumularTotal( 'totPagar',	$tPgRec == 1 ? $valor : 0 );
		$this->acumularTotal( 'totQtdReceber', $tPgRec == 2 ? 1 : 0 );
		$this->acumularTotal( 'totQtdPagar', $tPgRec == 1 ? 1 : 0 );
	}
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------
global $g_debugProcesso;

$ehUtil = ehUtil( HOJE );
if( $g_debugProcesso ) echo '<br><b>ehUtil=</b> '.simNao($ehUtil).' - '.HOJE;

if( $ehUtil )
{
	$proc = new EmailUsuario();

	$proc->comSupervisor   = false;
	$proc->campoHabilitado = "EmailFinan";
	$proc->tituloEmail = CLIENTE_NOME . ": Parcelas abertas em " . formatarData( HOJE );

	$proc->DefinirQuebras( [ 'QuebraPorClinica', SIM, NAO, SIM ] );
	$proc->DefinirTotais( 'totReceber', 'totPagar', 'totQtdReceber', 'totQtdPagar' );

	$select = "Select P.Parcela, P.Vencimento, P.ValorLiq, P.DataPagto, T.Descritor as TFCobra, L.Clinica,
			N.idPrimario as idTPgRec, N.Descritor as TPgRec, C.Compete, C.TrgQtdParc, C.Transacao, C.Historico,
			iif( C.Fornecedor is not null, F.Nome, O.Nome ) as Nome
		From arqParcela P
			join arqConta  			C on C.idPrimario=P.Conta
			join arqClinica			L on L.idPrimario=C.Clinica
			left join tabTPgRec		N on N.idPrimario=C.TPgRec
			left join tabTFCobra 	T on T.idPrimario=P.TFCobra
			left join arqFornecedor	F on F.idPrimario=C.Fornecedor
			left join arqPessoa  	O on O.idPrimario=C.Pessoa
		Where P.Vencimento < current_date and P.DataPagto is null
		Order by L.Clinica, P.Vencimento, F.Nome, O.Nome";

	$proc->Processar( $select );
}
