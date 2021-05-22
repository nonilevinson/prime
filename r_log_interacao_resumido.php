<?php

require_once( 'ext_relatorios_colunares.php' );

class RelLog extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ "Interações no sistema",
			$parQSelecao->MESINI ? "entre " . formatarData( $parQSelecao->MESINI, 'mm/aaaa' ) . " e "  .
				formatarData( $parQSelecao->MESFIM, 'mm/aaaa' ) : "", " " ];

		$this->DefinirCabColunas(
			[ "Mes/Ano",      25, ALINHA_CEN ],
			[ "Interações",   30, ALINHA_DIR ] );

		$this->DefinirQuebras(
			[ 'QuebraPorAno',	SIM, NAO, SIM ] );

      $this->cabPaginaTemCabColunas = false;

		$this->DefinirTotais( "totInteracao" );
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal )
	{
		$total = $this->ValorTotal( "totInteracao" );

		$this->valores[ 0 ] = $p_cabTotal;
		$this->valores[ 1 ] = $this->FormatarTotal( "totInteracao" );
		$this->ImprimirTotalColunas();
	}

	//------------------------------------------------------------------------
	function Total()
	{
		$this->MarcarPosicao( 'Total Geral' );
		$this->PeQuebra( "Total Geral" );
	}

	//------------------------------------------------------------------------
	//	Quebra por MesAno
	//------------------------------------------------------------------------
	function QuebraPorAno()
	{
		return( $this->regAtual->ANO );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorAno()
	{
		$regA = &$this->regAtual;
		$this->quebraAno = $regA->ANO;
		$this->CabQuebra( $this->quebraAno );
		$this->ImprimirCabColunas();
	}

	//------------------------------------------------------------------------
	function PeQuebraPorAno()
	{
		$this->PeQuebra( $this->quebraAno );
      $this->PularLinha(4);
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;
      $qtd  = $regA->QTD;

		$this->valores = [
			formatarStr( $regA->MESANO, 'xx/xxxx' ),
			formatarNum( $qtd ) ];

		$this->ImprimirValorColunas();

		$this->AcumularTotal( "totInteracao", $qtd );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $g_debugProcesso, $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelLog( RETRATO, A4, 'Interacoes.pdf', '', true );

$mesFim = dataUltDiaDoMes( $parQSelecao->MESFIM );

$select = "Select extract( year from L.Data) as Ano,
      lpad( extract( month from L.Data), 2, 0) || extract( year from L.Data) as MesAno,
      count(*) as Qtd
   From arqLanceLogAcesso L
   Where L.Data >= '" . $parQSelecao->MESINI . "' and
      L.Data <=  '" . $mesFim . "' and
      ( L.Login not like '%Noni%' and L.Login not like '%Kogut%' and L.Login != 'null' )
   Group by 1,2";

$proc->Processar( $select );
