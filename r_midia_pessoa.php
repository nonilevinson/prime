<?php

require_once( 'ext_relatorios_colunares.php' );

class RelMidia extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
      global $g_debugProcesso, $parQSelecao;

		$this->tituloRelatorio = [ 'Relatório de pacientes por mídias',
         $this->TituloData( "Consultas ", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ),
         ' ' ];

		$this->DefinirCabColunas(
			[ 'Prontuário',    18, ALINHA_CEN ],
			[ 'Nome',			130, ALINHA_ESQ ],
			[ 'Desde',	       20, ALINHA_CEN ],
			[ 'Consulta',      20, ALINHA_CEN ] );

		$this->DefinirQuebras(
			[ 'QuebraPorMidia', 		SIM, NAO, SIM ],
			[ 'QuebraPorClinica',	SIM, NAO, SIM ] );

      $this->DefinirTotais( "totQtd" );

		$this->cabPaginaTemCabColunas = false;
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal )
	{
		$totQtd = $this->ValorTotal( "totQtd" );
		
		$this->ImprimirTotalEmUmaColuna( $p_cabTotal . " com " . formatarNum( $totQtd ) .
			" paciente" . ( $totQtd > 1 ? "s" : "" ) );
	}

	//------------------------------------------------------------------------
	function Total()
	{
		$this->MarcarPosicao( 'Total Geral' );
		$this->PeQuebra( 'Total Geral' );
	}

	//------------------------------------------------------------------------
	//	Quebra por Midia
	//------------------------------------------------------------------------
	function QuebraPorMidia()
	{
		return( $this->regAtual->MIDIA );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorMidia()
	{
		$regA = &$this->regAtual;
		$this->midia = $regA->MIDIA;
		$this->CabQuebra( $this->midia );
	}

	//------------------------------------------------------------------------
	function PeQuebraPorMidia()
	{
		$this->PeQuebra( $this->midia );
		$this->PularLinha( 8 );
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
		$this->clinica = $regA->CLINICA;
		$this->CabQuebra( $this->clinica );
		$this->ImprimirCabColunas();
	}

	//------------------------------------------------------------------------
	function PeQuebraPorClinica()
	{
		$this->PeQuebra( $this->clinica );
		$this->PularLinha( 4 );
	}

	//------------------------------------------------------------------------
	//	Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;

		// $select = "Select 
		$this->valores = [
			$regA->PRONTUARIO,
         $regA->NOME,
         formatarData( $regA->DESDE ),
         formatarData( $regA->DATA ) ];

		$this->ImprimirValorColunas();

      $this->AcumularTotal( "totQtd", 1 );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelMidia( RETRATO, A4, 'Midias_Pacientes.pdf', '', true );

$select = "Select distinct M.Midia, L.Clinica, P.Nome, P.Prontuario, P.Desde,
		(Select C1.Data
		From arqConsulta C1
		Where " .
			filtrarPorIntervaloData( "C1.Data", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) . "
			C1.Pessoa = P.idPrimario			
			rows 1 )
	From arqConsulta C
			join arqClinica 	L on L.idPrimario=C.Clinica
			join arqPessoa 	P on P.idPrimario=C.Pessoa
			join arqMidia 		M on M.idPrimario=P.Midia
		Where " .			
			filtrarPorIntervaloData( "C.Data", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
			( $parQSelecao->MIDIA ? "P.Midia = " . $parQSelecao->MIDIA . " and " : "" ) . "
			P.Midia is not null
		Order by M.Midia, C.Clinica, C.Data, P.Nome";

$proc->Processar( $select );
