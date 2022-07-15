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
		$this->ImprimirTotalEmUmaColuna( $p_cabTotal . " com " . $this->FormatarTotal( "totQtd" ) . " pacientes" );
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
		$this->PularLinha( 4 );
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
/*
$select = "with
	p as ( Select P.Prontuario, P.Nome, P.Desde, M.Midia
			From arqPessoa P
				join arqMidia M on M.idPrimario=P.Midia
			Where P.Midia = " . $parQSelecao->MIDIA . "
			Order by P.Nome )
	
	Select P.Nome, C.Data, L.Clinica, P.Midia, P.Prontuario, P.Desde
	From arqConsulta C
		join arqClinica L on L.idPrimario=C.Clinica
		join P on 1=1
	Where " . 
		filtrarPorIntervaloData( "C.Data", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) ."
		C.Pessoa = P.idPessoa
	Order by P.Midia, L.Clinica, P.Nome, C.Data";
*/

$select = "with
	C as ( Select L.Clinica, C.Data
		From arqConsulta C
			join arqClinica 	L on L.idPrimario=C.Clinica
			join arqPessoa 	P on P.idPrimario=C.Pessoa
	Where " . substr(
		( $parQSelecao->MIDIA ? "P.Midia = " . $parQSelecao->MIDIA . " and " : "" ) .
		filtrarPorIntervaloData( "C.Data", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ), 0, -4 ) ."
	rows 1 )
	
	Select P.Prontuario, P.Nome, P.Desde, M.Midia, C.Clinica, C.Data
		From arqPessoa P
			join arqMidia M on M.idPrimario=P.Midia
			join C on 1=1
		Where " .
			( $parQSelecao->MIDIA ? "P.Midia = " . $parQSelecao->MIDIA . " and " : "" ) . "
			P.Midia is not null
		Order by M.Midia, C.Clinica, P.Nome";		

$proc->Processar( $select );
