<?php

require_once( 'ext_relatorios_colunares.php' );

class RelConsulta extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ "Extrato de consultas",
			$this->TituloData( "", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ),
			' ' ];

      $this->DefinirCabColunas(
			[ "Data",         19, ALINHA_CEN ],
         [ "Hora",         12, ALINHA_CEN ],
         [ "Nº", 	         18, ALINHA_CEN ],
         [ "Tipo",	      26, ALINHA_ESQ ],
         [ "Tipo",	      44, ALINHA_ESQ ],
         [ "Status",       41, ALINHA_ESQ ],
         [ "Call Center",  32, ALINHA_ESQ ],
         [ "Assessor",     32, ALINHA_ESQ ] );

      $this->DefinirQuebras(
         [ 'QuebraPorClinica',   SIM, NAO, SIM ],
         [ 'QuebraPorPessoa',    SIM, NAO, SIM ] );

		$this->DefinirTotais( "totConsultas" );

		$this->cabPaginaTemCabColunas = false;
		$this->comCodigoRel           = false;
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
	//	Quebra por Pessoa
	//------------------------------------------------------------------------
	function QuebraPorPessoa()
	{
		return( $this->regAtual->NOME );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorPessoa()
	{
		$regA = &$this->regAtual;
		$this->quebraPessoa = $regA->NOME . " - " . $regA->PRONTUARIO;
		$this->CabQuebra( $this->quebraPessoa );
      $this->ImprimirCabColunas();
	}

	//------------------------------------------------------------------------
	function PeQuebraPorPessoa()
	{
		global $g_debugProcesso, $parQSelecao;

   	$this->PeQuebra( "TOTAL DE " . $this->quebraPessoa );
		$this->PularLinha( 4 );
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;

      $this->valores = [
         formatarData( $regA->DATA ),
			formatarHora( $regA->HORA, 'hh:mm' ),
         formatarNum( $regA->NUMCONSULTA ),
         $regA->TICONSULTA,
         $regA->TIAGENDA,
         $regA->STATUS,
			cadEsq( $regA->CALLCENTER, 14 ),
			cadEsq( $regA->ASSESSOR, 14 ) ];

      $this->ImprimirValorColunas();

		$this->AcumularTotal( "totConsultas", 1 );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelConsulta( RETRATO, A4, 'Consultas_Extrato.pdf', '', true, .91 );

$filtro = substr( $compareceram .
   ( SQL_VETIDCLINICA ? "C.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
	filtrarPorLig( 'C.Clinica', $parQSelecao->CLINICA ).
   filtrarPorIntervaloData( 'C.Data', $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
	filtrarPorLig( "C.Pessoa", $parQSelecao->CLIENTE ) .
	filtrarPorLig( "C.TiAgenda", $parQSelecao->TIAGENDA ) .
	filtrarPorLig( "C.TStCon", $parQSelecao->TSTCON ), 0, -4 );

$select = "Select L.Clinica, P.Nome, P.Prontuario, C.Num as NumConsulta, I.TiConsulta, T.TiAgenda, 
      C.Data, C.Hora, S.Status, U.Nome as CallCenter, O.Nome as Assessor
	From arqConsulta C
      join arqTiConsulta   I on I.idPrimario=C.TiConsulta
      join arqTStCon       S on S.idPrimario=C.TStCon
      join arqClinica   	L on L.idPrimario=C.Clinica
      join arqTiAgenda  	T on T.idPrimario=C.TiAgenda
      join arqPessoa    	P on P.idPrimario=C.Pessoa
		left join arqUsuario	U on U.idPrimario=C.CallCenter
		left join arqUsuario	O on O.idPrimario=C.Assessor
	Where " . $filtro . "
	Order by L.Clinica, P.Nome, C.Data, C.Hora";

$proc->Processar( $select );
