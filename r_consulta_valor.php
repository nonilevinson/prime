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
         [ "Tipo",	      32, ALINHA_ESQ ],
         [ "Paciente",     68, ALINHA_ESQ ],
         [ "Celular",	   27, ALINHA_CEN ], 
         [ "Prontuário",   25, ALINHA_CEN ],
         [ "Call Center",  30, ALINHA_ESQ ],
         [ "Consulta",     20, ALINHA_DIR ],
         [ "Tratamento",   22, ALINHA_DIR ]
          );

      $this->DefinirQuebras(
         [ 'QuebraPorClinica',   SIM, NAO, SIM ] );

		$this->DefinirTotais( "totConsultas", "totValor", "totValPTrata" );

		$this->cabPaginaTemCabColunas = false;
		$this->comCodigoRel           = false;
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal )
	{
      $this->JuntarColunas( [0,5,ALINHA_ESQ] );
		$this->valores[ 0 ] = $p_cabTotal . ": " . $this->FormatarTotal( "totConsultas" ) . " consultas";
		$this->valores[ 6 ] = $this->FormatarTotal( "totValor", [ 2, '', '', ')' ] );
		$this->valores[ 7 ] = $this->FormatarTotal( "totValPTrata", [ 2, '', '', ')' ] );
		$this->ImprimirTotalColunas();
		$this->RestaurarColunas();
	}

	//------------------------------------------------------------------------
	function Total()
	{
		global $g_debugProcesso, $parQSelecao;
		
		if( !$parQSelecao->CLINICA )
		{
			$this->MarcarPosicao( 'Total geral' );
			$this->PeQuebra( 'Total geral' );
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
		$valor     = $regA->VALOR;
		$valPTrata = $regA->VALPTRATA;
      
      $this->valores = [
         formatarNum( $regA->NUMCONSULTA ),
         $regA->TIAGENDA,
         cadEsq( $regA->NOME, 35 ),
         formatarStr( $regA->NUMCELULAR, '(nn) n.nnnn.nnnn' ),
         $regA->PRONTUARIO,
			cadEsq( $regA->CALLCENTER, 14 ),
			formatarValor( $valor ),
			formatarValor( $valPTrata ) ];

      $this->ImprimirValorColunas();
      
		$this->AcumularTotal( "totConsultas", 1 );
		$this->AcumularTotal( "totValor", $valor );
		$this->AcumularTotal( "totValPTrata", $valPTrata );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelConsulta( RETRATO, A4, 'Consultas_Relacao.pdf', '', true, .85 );

$filtro = substr(
   ( SQL_VETIDCLINICA ? "C.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
   filtrarPorIntervaloData( 'C.Data', $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
   filtrarPorLig( "C.CallCenter", $parQSelecao->CALLCENTER ) .
	filtrarPorLig( "C.TiAgenda", $parQSelecao->TIAGENDA ) .
	filtrarPorLig( 'C.Clinica', $parQSelecao->CLINICA ), 0, -4 );

$select = "Select L.Clinica, C.Num as NumConsulta, T.TiAgenda, P.Nome, P.Prontuario, P.NumCelular,
		U.Nome as CallCenter, C.Valor, C.ValPTrata
	From arqConsulta C
      join arqClinica   	L on L.idPrimario=C.Clinica
      join arqTiAgenda  	T on T.idPrimario=C.TiAgenda
      join arqPessoa    	P on P.idPrimario=C.Pessoa
		left join arqUsuario	U on U.idPrimario=C.CallCenter
	Where " . $filtro . "
	Order by L.Clinica, C.Num";

$proc->Processar( $select );
