<?php

require_once( 'ext_relatorios_colunares.php' );

class RelEstoque extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ 'Relat�rio de posi��o de estoque ',
         "Em " . formatarData( $this->dataIni ),
         ' ' ];

		$this->DefinirCabColunas(
			[ "Medicamento",	90, ALINHA_ESQ ],
			[ "Un",				18, ALINHA_CEN ],
			[ "Cl�nica",		45, ALINHA_ESQ ],
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
      
      $idMedicamen = $regA->IDMEDICAMEN;
      $idClinica   = $regA->IDCLINICA;

      $select = "Select coalesce( sum( I.QtdCalc), 0) as TrgItMov
         From arqItemMov I
            join arqMovEstoque   M on M.idPrimario=I.MovEstoque
            join arqLote         L on L.idPrimario=I.Lote
         Where M.Data <= '" . $this->dataIni . "' and
            M.Clinica = " . $idClinica . " and 
            L.Medicamen = " . $idMedicamen;
      $umItemMov = sql_lerUmRegistro( $select );
// if( $g_debugProcesso ) echo '<br><b>GR0 Medicamn=</b> '.$regA->MEDICAMEN.' <b>arqItemMov S=</b> '.$select.'<br><b>TrgItMov=</b> '.$umItemMov->TRGITMOV;

      $select = "Select coalesce( sum( C.QtdEntreg ), 0) as TrgQtdEntreg
         From arqCMedica C
            join arqConsulta U on U.idPrimario=C.Consulta
         Where C.DataSepara <= '" . $this->dataIni . "' and
            U.Clinica = " . $idClinica . " and 
            C.Medicamen = " . $idMedicamen;
      $umCMedica = sql_lerUmRegistro( $select );
// if( $g_debugProcesso ) echo '<br><b>GR0 Medicamn=</b> '.$regA->MEDICAMEN.' <b>arqCMedica S=</b> '.$select.'<br><b>TrgQtdEntreg=</b> '.$umCMedica->TRGQTDENTREG;
            
		$estoque = $umItemMov->TRGITMOV - $umCMedica->TRGQTDENTREG;
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
//	Processamento do relat�rio
//------------------------------------------------------------------------
global $g_debugProcesso, $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );
if( $g_debugProcesso ) echo '<br><b>GR0 entrou no r_estoque_posicao_data.php</b>';

$proc = new RelEstoque( RETRATO, A4, "Estoque_Posicao.pdf", "", true );
$proc->dataIni = $parQSelecao->DATAINI;

$filtro = substr(
   filtrarPorLig( 'L.Clinica', $parQSelecao->CLINICA ) .
   filtrarPorLig( 'L.Medicamen', $parQSelecao->MEDICAMEN ), 0,-4);

//* o distinct � porque se j� tem um lote, n�o preciso trazer todos e preciso do arqLote para filtrar por cl�nica
$select = "Select distinct M.idPrimario as idMedicamen, M.Medicamen, C.idPrimario as idClinica, C.Clinica, U.Unidade
	From arqLote L
		join arqClinica	C on C.idPrimario=L.Clinica
		join arqMedicamen	M on M.idPrimario=L.Medicamen
		join arqUnidade	U on U.idPrimario=M.Unidade " .
   ( $filtro ? "Where " . $filtro : "" ) . "
   Order by M.Medicamen, C.Clinica";

$proc->Processar( $select );
