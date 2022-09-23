<?php

require_once( 'ext_relatorios_colunares.php' );

class RelConsulta extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ "Relação de consultas agendas",
			"em " .  formatarData( $parQSelecao->DATAINI ) . " - " . formatarData( $parQSelecao->DATAINI, 'ddd' ),
			' ' ];

      $this->DefinirCabColunas(
         [ "Nº", 	         18, ALINHA_CEN ],
         [ "Tipo",	      32, ALINHA_ESQ ],
         [ "Hora",         12, ALINHA_CEN ],
         [ "Paciente",     83, ALINHA_ESQ ],
         [ "Celular",	   27, ALINHA_CEN ],
         [ "Prontuário",   25, ALINHA_CEN ],
         [ "Call Center",  30, ALINHA_ESQ ] );

      $this->DefinirQuebras(
         [ 'QuebraPorClinica',	SIM, NAO, SIM ],
			[ 'QuebraPorData',   	SIM, NAO, SIM ] );

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
	}

	//------------------------------------------------------------------------
	function PeQuebraPorClinica()
	{
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
		$this->quebraData = formatarData( $regA->DATA );
		$this->CabQuebra( $this->quebraData . " - " . formatarData( $regA->DATA, 'ddd' ) );
      $this->ImprimirCabColunas();
	}

	//------------------------------------------------------------------------
	function PeQuebraPorData()
	{
   	$this->PeQuebra( $this->quebraData );
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
			cadEsq( $regA->CALLCENTER, 14 ) ];

      $this->ImprimirValorColunas();

		$this->AcumularTotal( "totConsultas", 1 );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelConsulta( RETRATO, A4, 'Consultas_Agendadas.pdf', '', true, .89 );

$select = "Select C.Num as NumConsulta, I.Clinica, C.Data, C.Hora, T.TiAgenda, U.Nome as CallCenter,
		P.Nome, P.Prontuario, P.NumCelular
	From arqConsulta C
		join arqClinica   		I on I.idPrimario=C.Clinica
		join arqTiAgenda  		T on T.idPrimario=C.TiAgenda
		join arqUsuario			U on U.idPrimario=C.CallCenter
		join arqPessoa    		P on P.idPrimario=C.Pessoa
		join arqLanceLogAcesso 	L on L.idQuem=C.idPrimario
	Where " .
		( SQL_VETIDCLINICA ? "C.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
		filtrarPorLig( 'C.Clinica', $parQSelecao->CLINICA ) .
		filtrarPorLig( "C.CallCenter", $parQSelecao->CALLCENTER ) .
		"L.Status = 13 and L.Operacao = 100039 and L.Data = '" . $parQSelecao->DATAINI . "'
	Order by L.Data, I.Clinica, C.Data, U.Nome";

$proc->Processar( $select );
