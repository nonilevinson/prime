<?php

require_once( 'ext_relatorios_colunares.php' );

class RelParcela extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ "Consultas dispensadas",
			$this->TituloData( "Consultas", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ),
			' ' ];

      $this->DefinirCabColunas(
         [ "Médico", 	   60, ALINHA_ESQ ],
         [ "Consultas",	   25, ALINHA_DIR ],
         [ "Dispensadas",  25, ALINHA_DIR ],
         [ "Taxa %",	      20, ALINHA_DIR ] );

      $this->DefinirQuebras(
         [ 'QuebraPorClinica',   SIM, NAO, SIM ],
         [ 'QuebraPorMedico',    NAO, NAO, SIM ] );

		$this->DefinirTotais( "totConsultas", "totDispensadas" );

		$this->cabPaginaTemCabColunas = false;
		$this->comCodigoRel           = false;
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal, $p_colTotal=0 )
	{
      $consultas   = $this->ValorTotal( "totConsultas" );
      $dispensadas = $this->ValorTotal( "totDispensadas" );
      $taxa        = $dispensadas * 100.00 / $consultas;
      $acima       = $this->declinar < $taxa ? "* " : "";
      
      $this->valores[ 0 ] = $p_cabTotal;
      $this->valores[ 1 ] = formatarNum( $consultas );
      $this->valores[ 2 ] = formatarNum( $dispensadas );
      $this->valores[ 3 ] = $acima . formatarValor( $taxa );
      $this->ImprimirTotalColunas();
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
		      
      $this->WriteLn();
      $this->WriteHtml( "* = Taxa % acima da mínima configurada, que é " . 
         formatarNum( $this->declinar ) );
      $this->WriteLn();
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
	//	Quebra por Medico
	//------------------------------------------------------------------------
	function QuebraPorMedico()
	{
		return( $this->regAtual->MEDICO );
	}

	//------------------------------------------------------------------------

	function PeQuebraPorMedico()
	{
		$regA = &$this->regAtual;
		$this->PeQuebra( $regA->MEDICO );
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;
		$this->AcumularTotal( "totConsultas", $regA->QTASCONSULTAS );
		$this->AcumularTotal( "totDispensadas", $regA->QTASDISPENSADAS );
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
