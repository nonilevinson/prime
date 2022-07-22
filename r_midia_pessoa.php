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
			[ 'Prontuário',	 18, ALINHA_CEN ],
			[ 'Nome',			110, ALINHA_ESQ ],
			[ 'Desde',	       19, ALINHA_CEN ],
			[ 'Consulta',      19, ALINHA_CEN ],
			[ 'Valor',      	 16, ALINHA_DIR ],
			[ 'Tratamento',  	 20, ALINHA_DIR ],
			[ 'Total',      	 20, ALINHA_DIR ]
		);

		$this->DefinirQuebras(
			[ 'QuebraPorMidia', 		SIM, NAO, SIM ],
			[ 'QuebraPorClinica',	SIM, NAO, SIM ] );

      $this->DefinirTotais( "totQtd", "totValor", "totValPTrata", "totTotal" );

		$this->cabPaginaTemCabColunas = false;
		$this->comCodigoRel           = false;
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal )
	{
		$totQtd = $this->ValorTotal( "totQtd" );
		
		$this->JuntarColunas( [0,3] );
		$this->valores[ 0 ] = $p_cabTotal . " com " . formatarNum( $totQtd ) . " paciente" . ( $totQtd > 1 ? "s" : "" );
		$this->valores[ 4 ] = $this->FormatarTotal( "totValor", [ 2, '', '', ')' ] );
		$this->valores[ 5 ] = $this->FormatarTotal( "totValPTrata", [ 2, '', '', ')' ] );
		$this->valores[ 6 ] = $this->FormatarTotal( "totTotal", [ 2, '', '', ')' ] );
		$this->ImprimirTotalColunas();
		$this->RestaurarColunas();
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
		$valor     = $regA->VALOR;
		$valPTrata = $regA->VALPTRATA;
		$total     = $valor + $valPTrata;

		$this->valores = [
			$regA->PRONTUARIO,
         cadEsq( $regA->NOME, 52 ),
         formatarData( $regA->DESDE ),
         formatarData( $regA->DATA ),
			formatarValor( $valor ),
			formatarValor( $valPTrata ),
			formatarValor( $total )
		];

		$this->ImprimirValorColunas();

      $this->AcumularTotal( "totQtd", 1 );
      $this->AcumularTotal( "totValor", $valor );
      $this->AcumularTotal( "totValPTrata", $valPTrata );
      $this->AcumularTotal( "totTotal", $total );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelMidia( RETRATO, A4, 'Midias_Pacientes.pdf', '', true, .92 );

$select = "Select distinct M.Midia, L.Clinica, P.Nome, P.Prontuario, P.Desde,
		(C.Valor + C.Valor2) as Valor, C.ValPTrata,
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
			filtrarPorLig( "C.Clinica", $parQSelecao->CLINICA ) .
			( $parQSelecao->MIDIA ? "P.Midia = " . $parQSelecao->MIDIA . " and " : "" ) . "
			P.Midia is not null
		Order by M.Midia, C.Clinica, C.Data, P.Nome";

$proc->Processar( $select );
