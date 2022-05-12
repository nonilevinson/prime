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
         [ "Nº", 	         18, ALINHA_CEN ],
         [ "Tipo",	      32, ALINHA_ESQ ],
         [ "Paciente",     83, ALINHA_ESQ ],
         [ "Celular",	   27, ALINHA_CEN ], 
         [ "Prontuário",   25, ALINHA_CEN ],
         [ "Call Center",  30, ALINHA_ESQ ],
         [ "Consulta",     30, ALINHA_DIR ],
         [ "Tratamento",   30, ALINHA_DIR ]
          );

      $this->DefinirQuebras(
         [ 'QuebraPorClinica',   SIM, NAO, SIM ] );

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
         $regA->TIAGENDA,
         formatarHora( $regA->HORA, 'hh:mm' ),
         cadEsq( $regA->NOME, 40 ),
         formatarStr( $regA->NUMCELULAR, '(nn) n.nnnn.nnnn' ),
         $regA->PRONTUARIO,
			cadEsq( $regA->CALLCENTER, 14 )
			 ];

      $this->ImprimirValorColunas();
      
		$this->AcumularTotal( "totConsultas", 1 );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelConsulta( RETRATO, A4, 'Consultas_Relacao.pdf', '', true, .89 );

$filtro = substr(
   ( SQL_VETIDCLINICA ? "C.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
   filtrarPorIntervaloData( 'C.Data', $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
   filtrarPorLig( "C.CallCenter", $parQSelecao->CALLCENTER ) .
	filtrarPorLig( "C.TiAgenda", $parQSelecao->TIAGENDA ) .
	filtrarPorLig( 'C.Clinica', $parQSelecao->CLINICA ), 0, -4 );

$select = "Select L.Clinica, C.Num as NumConsulta, T.TiAgenda, C.Hora, P.Nome, P.Prontuario,
      P.NumCelular, U.Nome as CallCenter
	From arqConsulta C
      join arqClinica   	L on L.idPrimario=C.Clinica
      join arqTiAgenda  	T on T.idPrimario=C.TiAgenda
      join arqPessoa    	P on P.idPrimario=C.Pessoa
		left join arqUsuario	U on U.idPrimario=C.CallCenter
	Where " . $filtro . "
	Order by L.Clinica, C.Num";

$proc->Processar( $select );
