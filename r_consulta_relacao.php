<?php

require_once( 'ext_relatorios_colunares.php' );

class RelParcela extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ "Relação de consultas",
			$this->TituloData( "Consultas", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ),
			' ' ];

      $this->DefinirCabColunas(
         [ "Nº", 	         60, ALINHA_CEN ],
         [ "Tipo",	      25, ALINHA_ESQ ],
         [ "Hora",         25, ALINHA_CEN ],
         [ "Paciente",     25, ALINHA_ESQ ],
         [ "Prontuário",   25, ALINHA_ESQ ],
         [ "Celular",	   20, ALINHA_ESQ ] );

      $this->DefinirQuebras(
         [ 'QuebraPorClinica',   SIM, NAO, SIM ] );

		$this->DefinirTotais( "totConsultas" );

		$this->cabPaginaTemCabColunas = false;
		// $this->comCodigoRel           = false;
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal, $p_colTotal=0 )
	{
      $this->ImprimirTotalEmUmaColuna( $p_cabTotal . ": " . $this->ValorTotal( "totConsultas" ) . " consultas");
	}

	//------------------------------------------------------------------------
	function Total()
	{
		global $g_debugProcesso, $parQSelecao;
		
		if( !$parQSelecao->CLINICA )
		{
			$this->MarcarPosicao( 'Total Geral' );
			$this->PeQuebra( 'Total Geral' );
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
      $this->ImprimirCabColunas();
	}

	//------------------------------------------------------------------------
	function PeQuebraPorClinica()
	{
		global $g_debugProcesso, $parQSelecao;
		
		if( !$parQSelecao->MEDICO )
			$this->PeQuebra( "Total de " . $this->quebraClinica );
		
		$this->PularLinha( 4 );
	}
   
	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;
		$this->AcumularTotal( "totConsultas", $regA->QTASCONSULTAS );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelParcela( RETRATO, A4, 'Consultas_Dispensadas.pdf', '', true );

sql_abrirBD( false );
$select = "Select X.Declinar
   From cnfXConfig X";
$proc->declinar = sql_lerUmRegistro( $select )->DECLINAR;
sql_fecharBD();

$filtro = substr(
   ( SQL_VETIDCLINICA ? "C.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
   filtrarPorIntervaloData( 'C.Data', $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
   filtrarPorLig( 'C.Clinica', $parQSelecao->CLINICA ) .
   filtrarPorLig( 'C.Medico', $parQSelecao->MEDICO ), 0, -4 );

$select = "Select L.Clinica, U.Nome as Medico, count(C.idPrimario) as QtasConsultas, 0 as QtasDispensadas
	From arqConsulta C
      join arqClinica   L on L.idPrimario=C.Clinica
      join arqUsuario   U on U.idPrimario=C.Medico
	Where " . $filtro . "
	Group by 1,2

   UNION

   Select L.Clinica, U.Nome as Medico, 0 as QtasConsultas, count(C.idPrimario) as QtasDispensadas
      From arqConsulta C
         join arqClinica   L on L.idPrimario=C.Clinica
         join arqUsuario   U on U.idPrimario=C.Medico
      Where C.TStCon = 11 and " . $filtro . "
      Group by 1,2,3

   Order by 1,2";

$proc->Processar( $select );
