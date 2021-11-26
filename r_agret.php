<?php

require_once( 'ext_relatorios_colunares.php' );

class RelAgenda extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ "Relatório de agendas de retirada de medicação",
			$this->TituloData( "", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ),
			' ' ];

      $this->DefinirCabColunas(
         [ "Hora",         12, ALINHA_CEN ],
         [ "Consulta",     17, ALINHA_DIR ],
         [ "Prontuário",	18, ALINHA_DIR ],
         [ "Paciente",     83, ALINHA_ESQ ],
         [ "Celular",	   27, ALINHA_CEN ],
         [ "Assessor",   	35, ALINHA_ESQ ],
         [ "Status",   		26, ALINHA_ESQ ] );

      $this->DefinirQuebras(
         [ 'QuebraPorClinica', 	SIM, NAO, SIM ],
         [ 'QuebraPorData', 		SIM, NAO, SIM ] );

		$this->DefinirTotais( "totAgendas" );

		$this->cabPaginaTemCabColunas = false;
		$this->comCodigoRel           = false;
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal, $p_colTotal=0 )
	{
      $totAgendas = $this->ValorTotal( "totAgendas" );
		
		$this->ImprimirTotalEmUmaColuna( $p_cabTotal . ": " . formatarNum( $totAgendas ) . 
			" agenda" . ( $totAgendas > 1 ? "s" : "" ) );
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
	}

	//------------------------------------------------------------------------
	function PeQuebraPorClinica()
	{
		global $g_debugProcesso, $parQSelecao;

   	$this->PeQuebra( "TOTAL DE " . $this->quebraClinica );
		$this->PularLinha( 4 );
	}

	//------------------------------------------------------------------------
	//	Quebra por Data
	//------------------------------------------------------------------------
	function QuebraPorData()
	{
		return( $this->regAtual->DATA );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorData()
	{
		$regA = &$this->regAtual;
		$this->quebraData = formatarData( $regA->DATA) . " - " . formatarData( $regA->DATA, 'ddd' ) ;
		$this->CabQuebra( $this->quebraData );
      $this->ImprimirCabColunas();
	}

	//------------------------------------------------------------------------
	function PeQuebraPorData()
	{
		global $g_debugProcesso, $parQSelecao;

   	$this->PeQuebra( "TOTAL DE " . $this->quebraData );
		$this->PularLinha( 4 );
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;

      $this->valores = [
         formatarHora( $regA->HORA, 'hh:mm' ),
         formatarNum( $regA->NUMCONSULTA ),
         $regA->PRONTUARIO,
			cadEsq( $regA->NOME, 40 ),
         formatarStr( $regA->NUMCELULAR, '(nn) n.nnnn.nnnn' ),
			cadEsq( $regA->ASSESSOR, 30 ),
			$regA->TSTAGRET ];

      $this->ImprimirValorColunas();

		$this->AcumularTotal( "totAgendas", 1 );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelAgenda( RETRATO, A4, 'Agendas_Retirada.pdf', '', true, .93 );

$filtro = substr(
   ( SQL_VETIDCLINICA ? "A.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
	filtrarPorIntervaloData( 'A.Data', $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
   filtrarPorLig( "A.Consulta,arqConsulta.Pessoa", $parQSelecao->CLIENTE ) .
	filtrarPorLig( "A.TStAgRet", $parQSelecao->TSTAGRET ) .
	filtrarPorLig( "A.Assessor", $parQSelecao->ASSESSOR ) .
   filtrarPorLig( 'A.Clinica', $parQSelecao->CLINICA ), 0, -4 );

$select = "Select L.Clinica, C.Num as NumConsulta, A.Data, A.Hora, P.Nome, P.Prontuario,
      P.NumCelular, T.Descritor as TStAgRet, U.Nome as Assessor
	From arqAgRet A
      join arqClinica   		L on L.idPrimario=A.Clinica
		join arqConsulta			C on C.idPrimario=A.Consulta
      join arqPessoa    		P on P.idPrimario=C.Pessoa
      left join tabTStAgRet	T on T.idPrimario=A.TStAgRet
		left join arqUsuario		U on U.idPrimario=A.Assessor
	Where " . $filtro . "
	Order by L.Clinica, A.Data, A.Hora";

$proc->Processar( $select );
