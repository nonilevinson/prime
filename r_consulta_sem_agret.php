<?php

require_once( 'ext_relatorios_colunares.php' );

class RelConsulta extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ "Consultas com medicação separada e sem a retirada",
			$this->TituloData( "Consultas", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ),
			' ' ];

      $this->DefinirCabColunas(
         [ "Consulta",      20, ALINHA_CEN ],
         [ "Paciente",     120, ALINHA_ESQ ],
         [ "Prontuário",    20, ALINHA_CEN ],
         [ "Data\nAgenda",  19, ALINHA_CEN ] );

      $this->DefinirQuebras(
         [ 'QuebraPorClinica',  SIM, NAO, SIM ] );

		$this->DefinirTotais( "totQtd" );

		$this->cabPaginaTemCabColunas = false;
		$this->DefinirAlturas();
      $this->alturaCabColunas	= 9;
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal )
	{
      $qtd = $this->ValorTotal( "totQtd" );
      $this->ImprimirTotalEmUmaColuna( $p_cabTotal . " com " . formatarNum( $qtd ) . " consulta" .
         ( $qtd > 1 ? "s" : "" ) );
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
      
      $this->WriteHtml( "<br>Obs.: Todas as consultas listadas já tem a medicação separada.<br>
         Se a data da agenda estiver em branco é porque ainda não agendaram com o pacinete e " .
         "tendo uma data e esta for passada, quer dizer que o paciente não veio pegar a medicação" );
      $this->writeLn();      
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
		$this->PeQuebra( $this->quebraClinica, true );
		$this->PularLinha( 4 );
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;

      $this->valores = [
         formatarNum( $regA->NUMCONSULTA ),
         cadEsq( $regA->NOME, 58 ),
         $regA->PRONTUARIO,
         formatarData( $regA->DATAAGRET )
      ];

      $this->ImprimirValorColunas();

		$this->AcumularTotal( "totQtd", 1 );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelConsulta( RETRATO, A4, 'Consultas_Sem_Retirada.pdf', '', true );

$select = "Select L.Clinica, C.Num as NumConsulta, P.Nome, P.Prontuario,
      ( Select A.Data
         From ArqAgRet A
         Where A.Consulta = C.iDPrimario and (A.TStAgRet != 3 or A.TStAgRet is null)
      ) as DataAgRet
   From arqConsulta C
      join arqClinica   L on L.idPrimario=C.Clinica
      join arqPessoa    P on P.idPrimario=C.Pessoa
   Where " .
      ( SQL_VETIDCLINICA ? "C.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
      filtrarPorIntervaloData( 'C.Data', $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
      filtrarPorLig( 'C.Clinica', $parQSelecao->CLINICA ) . "
      C.TrgQtdM > 0 and C.Saldo = 0
      and
      ( not exists( Select A.Data
         From arqAgRet A
         Where A.Consulta = C.idPrimario )
         or
         exists( Select A.Data
         From arqAgRet A
         Where A.Consulta = C.idPrimario and ( A.TStAgRet != 3 or A.TStAgRet is null ) )
      )
   Order by L.Clinica, C.Num";

$proc->Processar( $select );
