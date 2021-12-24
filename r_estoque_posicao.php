<?PHP

require_once( 'ext_relatorios_colunares.php' );

class RelEstoque extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ 'Relatório de posição de estoque', ' ' ];

		$this->DefinirCabColunas(
			[ "Insumo", 		90, ALINHA_ESQ ],
			[ "Un",				18, ALINHA_CEN ],
			[ "Almoxarifado",	45, ALINHA_ESQ ],
			[ "Estoque",		20, ALINHA_DIR ] );

		$this->DefinirQuebras(
			[ 'QuebraPorInsumo', SIM, NAO, SIM ] );

		$this->DefinirTotais( "totEstoque", "totQtdAlmoxari" );

		$this->cabPaginaTemCabColunas = true;
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	//	Quebra por Insumo
	//------------------------------------------------------------------------
	function QuebraPorInsumo()
	{
		return( $this->regAtual->INSUMO );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorInsumo()
	{
		$regA = &$this->regAtual;

		$this->quebraInsumo = $regA->INSUMO;
		$this->valores[ 0 ] = $this->quebraInsumo;
		$this->valores[ 1 ] = $regA->UNIDADE;
	}

	//------------------------------------------------------------------------
	function PeQuebraPorInsumo()
	{
		if( $this->ValorTotal( "totQtdAlmoxari" ) > 1 )
		{
			$this->FecharLinhas();
			$this->JuntarColunas( [0,2] );
			$this->valores[ 0 ] = $this->quebraInsumo;
			$this->valores[ 3 ] = $this->FormatarTotal( "totEstoque", [ 2, '', '', ')' ] );
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

		$estoque = $regA->TRGITMOV - $regA->TRGTRASAI + $regA->TRGTRAENT;
// if( $g_debugProcesso ) echo '<br><b>GR0 estoque S=</b> '.$estoque;

		if( $estoque != 0 )
		{
			$this->valores[ 2 ] = $regA->ALMOXARI;
			$this->valores[ 3 ] = formatarValor( $estoque, '', '', ')' );
			$this->ImprimirValorColunas();

			$this->AcumularTotal( "totEstoque", $estoque );
			$this->AcumularTotal( "totQtdAlmoxari", 1 );
		}
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelEstoque( RETRATO, A4, "Estoque_Posicao.pdf", "", true );

$filtro = substr(
   filtrarPorLig( 'A.idPrimario', $parQSelecao->ALMOXARI ) .
   filtrarPorLig( 'I.TInsumo', $parQSelecao->TINSUMO ) .
   filtrarPorLig( 'I.idPrimario', $parQSelecao->INSUMO ), 0,-4);

$select = "Select I.Insumo, E.TrgItMov, E.TrgTraSai, E.TrgTraEnt, A.Almoxari, U.Unidade
	From arqEstoque E
		join arqAlmoxari		A on A.idPrimario=E.Almoxari
		join arqInsumo 		I on I.idPrimario=E.Insumo
		left join arqUnidade	U on U.idPrimario=I.Unidade " .
   ( $filtro ? "Where " . $filtro : "" ) .
   " Order by I.Insumo, A.Almoxari";

$proc->Processar( $select );
