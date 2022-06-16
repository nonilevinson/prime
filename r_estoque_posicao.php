<?php

require_once( 'ext_relatorios_colunares.php' );

class RelEstoque extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ 'Relatório de posição de estoque', ' ' ];

		$this->DefinirCabColunas(
			[ "Medicamento",	90, ALINHA_ESQ ],
			[ "Un",				18, ALINHA_CEN ],
			[ "Clínica",		45, ALINHA_ESQ ],
			[ "Estoque",		20, ALINHA_DIR ] );

		$this->DefinirQuebras(
			[ 'QuebraPorMedicamen', SIM, NAO, SIM ] );

		$this->DefinirTotais( "totEstoque", "totClinica" );

		$this->cabPaginaTemCabColunas = true;
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	//	Quebra por Medicamen
	//------------------------------------------------------------------------
	function QuebraPorMedicamen()
	{
		return( $this->regAtual->MEDICAMEN );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorMedicamen()
	{
		$regA = &$this->regAtual;

		$this->quebraMedicamen = $regA->MEDICAMEN;
		$this->valores[ 0 ] = $this->quebraMedicamen;
		$this->valores[ 1 ] = $regA->UNIDADE;
	}

	//------------------------------------------------------------------------
	function PeQuebraPorMedicamen()
	{
		if( $this->ValorTotal( "totClinica" ) > 1 )
		{
			$this->FecharLinhas();
			$this->JuntarColunas( [0,2] );
			$this->valores[ 0 ] = $this->quebraMedicamen;
			$this->valores[ 3 ] = $this->FormatarTotal( "totEstoque", [ 0, '', '', ')' ] );
			$this->ImprimirValorColunas();
			$this->RestaurarColunas();
			$this->FecharLinhas();
		}
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		global $g_debugProcesso;
		$regA = &$this->regAtual;

		$estoque = $regA->TRGITMOV - $regA->TRGCMEDICA;
// if( $g_debugProcesso ) echo '<br><b>GR0 estoque S=</b> '.$estoque;

		if( $estoque != 0 )
		{
			$this->valores[ 2 ] = $regA->CLINICA;
			$this->valores[ 3 ] = formatarNum( $estoque, 0, 0, 0, ')' );
			$this->ImprimirValorColunas();

			$this->AcumularTotal( "totEstoque", $estoque );
			$this->AcumularTotal( "totClinica", 1 );
		}
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $g_debugProcesso, $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );
if( $g_debugProcesso ) echo '<br><b>GR0 entrou no r_estoque_posicao.php</b>';

$proc = new RelEstoque( RETRATO, A4, "Estoque_Posicao.pdf", "", true );

$filtro = substr(
   filtrarPorLig( 'L.Clinica', $parQSelecao->CLINICA ) .
   filtrarPorLig( 'L.Medicamen', $parQSelecao->MEDICAMEN ), 0,-4);

$select = "Select M.Medicamen, L.TrgItMov, L.TrgCMedica, C.Clinica, U.Unidade
	From arqLote L
		join arqClinica	C on C.idPrimario=L.Clinica
		join arqMedicamen	M on M.idPrimario=L.Medicamen
		join arqUnidade	U on U.idPrimario=M.Unidade " .
   ( $filtro ? "Where " . $filtro : "" ) . "
   Order by M.Medicamen, C.Clinica";

$proc->Processar( $select );
