<?PHP

require_once( 'ext_relatorios_colunares.php' );

class RelEstoque extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ 'Relatório de lotes de medicamentos por validade', 
         $this->TituloData( 'Validade', $parQSelecao->DATAINI, $parQSelecao->DATAFIM ),
         ' ' ];

		$this->DefinirCabColunas(
			[ "Medicamento",	90, ALINHA_ESQ ],
			[ "Unidade",	   20, ALINHA_ESQ ],
			[ "Lote",		   25, ALINHA_ESQ ],
			[ "Fabricação",	20, ALINHA_CEN ],
			[ "Estoque",	   20, ALINHA_DIR ] );

		$this->DefinirQuebras(
         [ 'QuebraPorClinica',   SIM, NAO, SIM ],
         [ 'QuebraPorValidade',  SIM, NAO, SIM ],
			[ 'QuebraPorMedicamen', SIM, NAO, SIM ] );

		$this->DefinirTotais( "totQtd", "totEstoque" );

		$this->cabPaginaTemCabColunas = false;
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal, $p_totalizacao=false )
	{
      $totQtd = $this->ValorTotal( "totQtd" );
      $this->JuntarColunas( [1,3] );
      $this->valores[ 0 ] = $p_cabTotal;
      $this->valores[ 1 ] = formatarNum( $totQtd ) . " lote" . ( $totQtd > 1 ? "s" : "" );
      $this->valores[ 4 ] = $this->FormatarTotal( "totEstoque", [ 0, 0, 0, ")" ] );
      $this->ImprimirTotalColunas();
      $this->RestaurarColunas();
   }

	//------------------------------------------------------------------------
	function Total()
	{
		global $g_debugProcesso, $parQSelecao;

		if( !$parQSelecao->CLINICA )
		{
			$this->MarcarPosicao( 'Total Geral' );
			$this->PeQuebra( 'Total Geral', true );
		}
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
		$this->quebraClinica = $regA->CLINICA;
		$this->CabQuebra( $this->quebraClinica );
	}

	//------------------------------------------------------------------------
	function PeQuebraPorClinica()
	{
		global $g_debugProcesso, $parQSelecao;
		$this->PeQuebra( $this->quebraClinica );
		$this->PularLinha( 4 );
	}

	//------------------------------------------------------------------------
	//	Quebra por Validade
	//------------------------------------------------------------------------
	function QuebraPorValidade()
	{
		return( $this->regAtual->VALIDADE );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorValidade()
	{
		$regA = &$this->regAtual;
		$this->quebraValidade = "Validade: " . formatarData( $regA->VALIDADE );
		$this->CabQuebra( $this->quebraValidade . " - " . formatarData( $regA->VALIDADE, 'ddd' ) );
      $this->ImprimirCabColunas();
	}

	//------------------------------------------------------------------------
	function PeQuebraPorValidade()
	{
		global $g_debugProcesso, $parQSelecao;
		$this->PeQuebra( $this->quebraValidade );
		$this->PularLinha( 4 );
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
/*
		if( $this->ValorTotal( "totQtd" ) > 1 )
		{
			$this->FecharLinhas();
			$this->JuntarColunas( [0,2] );
			$this->valores[ 0 ] = $this->quebraMedicamen;
			$this->valores[ 3 ] = $this->FormatarTotal( "totEstoque", [ 0, '', '', ')' ] );
			$this->ImprimirValorColunas();
			$this->RestaurarColunas();
			$this->FecharLinhas();
		}
*/
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		global $g_debugProcesso;
		$regA = &$this->regAtual;
      $estoque = $regA->ESTOQUE;

      $this->valores[ 2 ] = $regA->LOTE;
      $this->valores[ 3 ] = formatarData( $regA->FABRICA );
      $this->valores[ 4 ] = formatarNum( $estoque, 0, 0, 0, ')' );
      $this->ImprimirValorColunas();

      $this->AcumularTotal( "totQtd", 1 );
      $this->AcumularTotal( "totEstoque", $estoque );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelEstoque( RETRATO, A4, "Lote_Validade.pdf", "", true );

$filtro = substr(
   filtrarPorIntervaloData( "L.Validade", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
   filtrarPorLig( 'L.Clinica', $parQSelecao->CLINICA ) .
   filtrarPorLig( 'L.idPrimario', $parQSelecao->LOTE ) .
   filtrarPorLig( 'L.Medicamen', $parQSelecao->MEDICAMEN ), 0,-4);

$select = "Select M.Medicamen, L.Lote, L.Fabrica, L.Validade, C.Clinica, U.Unidade, L.Estoque
	From arqLote L
		join arqClinica	C on C.idPrimario=L.Clinica
		join arqMedicamen	M on M.idPrimario=L.Medicamen
		join arqUnidade	U on U.idPrimario=M.Unidade " .
   ( $filtro ? "Where " . $filtro : "" ) .
   " Order by C.Clinica, L.Validade, M.Medicamen, L.Lote";

$proc->Processar( $select );
