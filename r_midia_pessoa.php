<?php

require_once( 'ext_relatorios_colunares.php' );

class RelMidia extends Relatorios
{	
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
      global $g_debugProcesso, $parQSelecao;
      
		$this->tituloRelatorio = [ 'Relatório de pacientes por mídias', 
         $this->TituloData( "Pacientes desde ", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ),
         ' ' ];

		$this->DefinirCabColunas(
			[ 'Prontuário',    18, ALINHA_CEN ],
			[ 'Nome',			130, ALINHA_ESQ ],
			[ 'Desde',	       20, ALINHA_CEN ] );
						
		$this->DefinirQuebras( 
			[ 'QuebraPorMidia', SIM, NAO, SIM ] );

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
	//	Quebra por Aviso
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
		$this->ImprimirCabColunas();
	}
			
	//------------------------------------------------------------------------
	function PeQuebraPorMidia()
	{
		$this->PeQuebra( $this->midia );
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
         formatarData( $regA->DESDE ) ];
					
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

$select = "Select P.Prontuario, P.Nome, M.Midia, P.Desde
	From arqPessoa P
		join arqMidia M on M.idPrimario=P.Midia
	Where " . substr(
      filtrarPorIntervaloData( "P.Desde", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
      filtrarPorLig( "P.Midia", $parQSelecao->MIDIA ), 0, -4 ) ."
   Order by M.Midia, P.Nome";

$proc->Processar( $select );
