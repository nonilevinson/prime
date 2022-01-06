<?php

require_once( 'ext_relatorios_colunares.php' );

class RelParcela extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ "Medicação prescrita",
			$this->TituloData( "Consultas", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ),
			' ' ];

      $this->DefinirCabColunas(
         [ "Medicamento",      60, ALINHA_ESQ ],
         [ "Qtd\nPrescrita",   20, ALINHA_DIR ],
         [ "Unidade",          20, ALINHA_ESQ ],
         [ "Qtd\nSeparada",    20, ALINHA_DIR ],
         [ "Qtd\nSaldo",	    20, ALINHA_DIR ] );

      $this->DefinirQuebras(
         [ 'QuebraPorClinica',  SIM, NAO, SIM ] );

		$this->DefinirTotais( "totQtd", "totQtdEntreg" );

		$select = "Select M.Medicamen, U.Unidade
			From arqMedicamen M
            join arqUnidade U on U.idPrimario=M.Unidade
			Order by M.Medicamen";
		$this->regMedicam = sql_lerRegistros( $select );

		foreach( $this->regMedicam as $umaMedicamen )
      {
			$this->DefinirTotais( "totQ" . $umaMedicamen->MEDICAMEN );
			$this->DefinirTotais( "totE" . $umaMedicamen->MEDICAMEN );
      }

		$this->cabPaginaTemCabColunas = false;
		$this->DefinirAlturas();
      $this->alturaCabColunas	= 9;
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal, $p_totalizacao=false )
	{
      if( $p_totalizacao )
      {
         $this->ImprimirTotalEmUmaColuna( "Totalização de " . $p_cabTotal );

         foreach( $this->regMedicam as $umaMedicamen )
         {
            if( $this->ValorTotal( "totQ" . $umaMedicamen->MEDICAMEN ) > 0 )
            {
               $totQ = $this->ValorTotal( "totQ" . $umaMedicamen->MEDICAMEN );
               $totE = $this->ValorTotal( "totE" . $umaMedicamen->MEDICAMEN );
               $totS = $totQ - $totE;

               $this->valores[ 0 ] = $umaMedicamen->MEDICAMEN;
               $this->valores[ 1 ] = formatarNum( $totQ );
               $this->valores[ 2 ] = $umaMedicamen->UNIDADE;
               $this->valores[ 3 ] = formatarNum( $totE, 0, 0, 0, ')' );
               $this->valores[ 4 ] = formatarNum( $totS, 0, 0, 0, ')' );
               $this->ImprimirValorColunas();
            }
         }
      }

      $qtd       = $this->ValorTotal( "totQtd" );
      $qtdEntreg = $this->ValorTotal( "totQtdEntreg" );
      $saldo     = $qtd - $qtdEntreg;

      $this->valores[ 0 ] = $p_cabTotal;
      $this->valores[ 1 ] = formatarNum( $qtd );
      $this->valores[ 3 ] = formatarNum( $qtdEntreg, 0, 0, 0, ')' );
      $this->valores[ 4 ] = formatarNum( $saldo, 0, 0, 0, ')' );
      $this->ImprimirTotalColunas();
	}

	//------------------------------------------------------------------------
	function Total()
	{
		global $g_debugProcesso, $parQSelecao;

		if( !$parQSelecao->CLINICA )
		{
			$this->MarcarPosicao( 'Total Geral' );
			$this->PeQuebra( 'Total Geral', true );
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
      
      if( !$parQSelecao->CLINICA )
		   $this->PularLinha( 4 );
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;
      $medicamen = $regA->MEDICAMEN;
      $qtd       = $regA->QTD;
      $qtdEntreg = $regA->QTDENTREG;
      $saldo     = $qtd - $qtdEntreg;

      $this->valores = [
         $medicamen,
         formatarNum( $qtd ),
         $regA->UNIDADE,
         formatarNum( $qtdEntreg, 0, 0, 0, ')' ),
         formatarNum( $saldo, 0, 0, 0, ')' )
      ];

      $this->ImprimirValorColunas();

		$this->AcumularTotal( "totQ" . $medicamen, $qtd );
		$this->AcumularTotal( "totE" . $medicamen, $qtdEntreg );
      $this->AcumularTotal( "totQtd", $qtd );
		$this->AcumularTotal( "totQtdEntreg", $qtdEntreg );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelParcela( RETRATO, A4, 'Medicacao_Prescrita.pdf', '', true );

switch( $parQSelecao->TSIMNAO )
{
   case 0: $saldo = ""; break;
   case 1: $saldo = "M.Qtd = M.QtdEntreg and "; break;
   case 2: $saldo = "M.Qtd != M.QtdEntreg and "; break;
}

$select = "Select L.Clinica, E.Medicamen, M.Qtd, M.QtdEntreg, U.Unidade
   From arqCMedica M
      join arqMedicamen E on E.idPrimario=M.Medicamen
      join arqUnidade   U on U.idPrimario=E.Unidade
      join arqConsulta  C on C.idPrimario=M.Consulta
      join arqClinica   L on L.idPrimario=C.Clinica
   Where " . substr( $saldo .
      ( SQL_VETIDCLINICA ? "C.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
      filtrarPorIntervaloData( 'C.Data', $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
      filtrarPorLig( 'C.Clinica', $parQSelecao->CLINICA ), 0, -4 ) . "
   Order by L.Clinica";

$proc->Processar( $select );
