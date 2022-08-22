<?php

require_once( 'ext_relatorios_colunares.php' );

class RelConsulta extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ "Relação de consultas",
			$this->TituloData( "", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ),
			' ' ];

      $this->DefinirCabColunas(
         [ "Nº", 	         17, ALINHA_CEN ],
			[ "Data",         18, ALINHA_CEN ],
         [ "Paciente",     60, ALINHA_ESQ ],
         [ "Prontuário",   24, ALINHA_CEN ],
			[ "Data Bkp",     18, ALINHA_CEN ],
         [ "Assessor",     30, ALINHA_ESQ ],
         [ "Motivo",       79, ALINHA_ESQ ] );

      $this->DefinirQuebras(
         [ 'QuebraPorClinica',   SIM, NAO, SIM ] );

		$this->DefinirTotais( "totConsultas" );

		$this->cabPaginaTemCabColunas = false;
		$this->comCodigoRel           = false;
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal )
	{
      $this->ImprimirTotalEmUmaColuna( $p_cabTotal . ": " . $this->ValorTotal( "totConsultas" ) . " consultas");
	}

	//------------------------------------------------------------------------
	function Total()
	{
		global $g_debugProcesso, $parQSelecao;

		if( !$parQSelecao->CLINICA )
		{
			$this->MarcarPosicao( 'TOTAL GERAL' );
			$this->PeQuebra( 'TOTAL GERAL' );
		}

      $this->deveriaFecharLinhas = 0;
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
      $this->ImprimirCabColunas();
	}

	//------------------------------------------------------------------------
	function PeQuebraPorClinica()
	{
		global $g_debugProcesso, $parQSelecao;

   	$this->PeQuebra( "TOTAL DE " . $this->quebraClinica );
		$this->PularLinha( 4 );
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;

      $this->valores = [
         formatarNum( $regA->NUMCONSULTA ),
         formatarData( $regA->DATA ),
         cadEsq( $regA->NOME, 30 ),
         $regA->PRONTUARIO,
         formatarData( $regA->BKPDATA ),
			cadEsq( $regA->BKPASSESSOR, 14 ),
			$regA->BKPMOTIVO ];
      $this->ImprimirValorColunas();
      
      if( $regA->BKPOBS )
      {
         $this->JuntarColunas( [0,2], [3,6,ALINHA_ESQ] );
         $this->valores[3] = $regA->BKPOBS;
         $this->ImprimirValorColunas();
         $this->RestaurarColunas();
      }

		$this->AcumularTotal( "totConsultas", 1 );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelConsulta( RETRATO, A4, 'Backup_Medicacao.pdf', '', true, .83 );

$filtro = substr( 
   ( SQL_VETIDCLINICA ? "C.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
	filtrarPorLig( 'C.Clinica', $parQSelecao->CLINICA ) .
   filtrarPorIntervaloData( 'C.BkpData', $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
   filtrarPorLig( "C.BkpAssessor", $parQSelecao->CALLCENTER ), 0, -4 );

$select = "Select L.Clinica, C.Num as NumConsulta, P.Nome, P.Prontuario,
      U.Nome as BkpAssessor, C.Data, C.BkpData, B.BkpMotivo, C.BkpObs
	From arqConsulta C
      join arqClinica   L on L.idPrimario=C.Clinica
      join arqBkpMotivo B on B.idPrimario=C.BkpMotivo
      join arqPessoa    P on P.idPrimario=C.Pessoa
		join arqUsuario   U on U.idPrimario=C.BkpAssess
	Where " . $filtro . "
	Order by L.Clinica, C.BkpData, C.Num";

$proc->Processar( $select );
