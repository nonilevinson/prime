<?php

require_once( 'ext_relatorios_colunares.php' );

class RelMidia extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
      global $g_debugProcesso, $parQSelecao;

		$this->tituloRelatorio = [ 'Relatório de pacientes por assessores',
         $this->TituloData( "Consultas ", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ),
         ' ' ];

		$this->DefinirCabColunas(
			[ 'Prontuário',	 18, ALINHA_CEN ],
			[ 'Nome',			110, ALINHA_ESQ ],
			[ 'Consulta',      19, ALINHA_CEN ],
			[ 'Valor',      	 16, ALINHA_DIR ],
			[ 'Tratamento',  	 20, ALINHA_DIR ],
			[ 'Total',      	 20, ALINHA_DIR ]
		);

		$this->DefinirQuebras(
			[ 'QuebraPorAssessor', 		SIM, NAO, SIM ],
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
		
		$this->JuntarColunas( [0,2] );
		$this->valores[ 0 ] = $p_cabTotal . " com " . formatarNum( $totQtd ) . " paciente" . ( $totQtd > 1 ? "s" : "" );
		$this->valores[ 3 ] = $this->FormatarTotal( "totValor", [ 2, '', '', ')' ] );
		$this->valores[ 4 ] = $this->FormatarTotal( "totValPTrata", [ 2, '', '', ')' ] );
		$this->valores[ 5 ] = $this->FormatarTotal( "totTotal", [ 2, '', '', ')' ] );
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
	//	Quebra por Assessor
	//------------------------------------------------------------------------
	function QuebraPorAssessor()
	{
		return( $this->regAtual->ASSESSOR );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorAssessor()
	{
		$regA = &$this->regAtual;
		$this->assessor = $regA->ASSESSOR;
		$this->CabQuebra( $this->assessor );
	}

	//------------------------------------------------------------------------
	function PeQuebraPorAssessor()
	{
		$this->PeQuebra( $this->assessor );
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

$proc = new RelMidia( RETRATO, A4, 'Assessores_Pacientes.pdf', '', true, .92 );

switch( $parQSelecao->TSIMNAO )
{
	case 0: $compareceram = ""; break;
	case 1: $compareceram = "C.TStCon = 10 and "; break;
	case 2: $compareceram = "C.TStCon in( 7,8 ) and "; break;
}

$select = "Select distinct U.Nome as Assessor, L.Clinica, P.Nome, P.Prontuario, C.Data,
		(C.Valor + C.Valor2) as Valor, C.ValPTrata
	From arqConsulta C
			join arqClinica 	L on L.idPrimario=C.Clinica
			join arqUsuario	U on U.idPrimario=C.Assessor
			join arqPessoa 	P on P.idPrimario=C.Pessoa
		Where " . substr(  $compareceram .
			filtrarPorIntervaloData( "C.Data", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
			( $parQSelecao->ASSESSOR ? "C.Assessor = " . $parQSelecao->ASSESSOR . " and " : "C.Assessor is not null and" ) .
			filtrarPorLig( "C.Clinica", $parQSelecao->CLINICA ) .
			filtrarPorLig( "C.TStCon", $parQSelecao->TSTCON ), 0, -4 ) . "
		Order by U.Nome, C.Clinica, C.Data, P.Nome";

$proc->Processar( $select );
