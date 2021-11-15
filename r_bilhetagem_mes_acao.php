<?php

require_once( 'ext_relatorios_colunares.php' );

class RelPontos extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ "Bilhetagem resumida de emails enviados",
			$parQSelecao->DATAINI ? "entre " . formatarData( $parQSelecao->DATAINI ) . " e "  .
				formatarData( $parQSelecao->DATAFIM ) : "", " " ];

		$this->DefinirCabColunas(
			[ "Título",			80, ALINHA_ESQ ],
			[ "Enviados",		17, ALINHA_DIR ],
			[ "Ñ enviados",	18, ALINHA_DIR ],
			[ "Total",			17, ALINHA_DIR ] );

		if( $this->porMes )
		{
			$this->DefinirQuebras(
				[ 'QuebraPorMes',	SIM, NAO, SIM ],
				[ 'QuebraPorAcao',	NAO, NAO, SIM, '', '', '', [0], [255] ] );
		}
		else
		{
			$this->DefinirQuebras(
				[ 'QuebraPorAcao',	NAO, NAO, SIM, '', '', '', [0], [255] ] );
		}

		$this->cabPaginaTemCabColunas = false;

		$this->DefinirTotais( "totenviado", "totNenviado", "total" );
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal )
	{
		$total = $this->ValorTotal( "totenviado" ) + $this->ValorTotal( "totNenviado" );

		$this->valores[ 0 ] = $p_cabTotal;
		$this->valores[ 1 ] = $this->FormatarTotal( "totenviado", [ 0, '', '', ')' ] );
		$this->valores[ 2 ] = $this->FormatarTotal( "totNenviado", [ 0, '', '', ')' ] );
		$this->valores[ 3 ] = FormatarNum( $total, 0);
		$this->ImprimirTotalColunas();
	}

	//------------------------------------------------------------------------
	function Inicio()
	{
		if( !$this->porMes )
		{
			$this->MarcarPosicao( 'Resumo Geral' );
			$this->ImprimirCabColunas();
		}
	}

	//------------------------------------------------------------------------
	//	Evento TOTAL
	//------------------------------------------------------------------------
	function Total()
	{
		$this->MarcarPosicao( 'Total Geral' );
		$this->valores[ 0 ] = "Total Geral";
		$this->valores[ 1 ] = $this->FormatarTotal( "totenviado", [ 0, '', '', ')' ] );
		$this->valores[ 2 ] = $this->FormatarTotal( "totNenviado", [ 0, '', '', ')' ] );
		$this->valores[ 3 ] = $this->FormatarTotal( "total", [ 0, '', '', ')' ] );
		$this->ImprimirTotalColunas();
	}

	//------------------------------------------------------------------------
	//	Quebra por Mês
	//------------------------------------------------------------------------
	function QuebraPorMes()
	{
		return( substr( $this->regAtual->DATA, 0, 7 ) );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorMes()
	{
		$regA = &$this->regAtual;
		$this->quebraMes = formatarData( $regA->DATA, 'mm/aaaa' );
		$this->CabQuebra( 'Mês: '. $this->quebraMes . " - " .
				mesExtenso( $this->quebraMes ), $this->quebraMes );
		$this->ImprimirCabColunas();
	}

	//------------------------------------------------------------------------
	function PeQuebraPorMes()
	{
		$this->PeQuebra( $this->quebraMes. " - " . mesExtenso( $this->quebraMes ) );
		$this->PularLinha(3);
	}

	//------------------------------------------------------------------------
	//	Quebra por Acao
	//------------------------------------------------------------------------
	function QuebraPorAcao()
	{
		return( $this->regAtual->TITULO );
	}

	//------------------------------------------------------------------------
	function PeQuebraPorAcao()
	{
		$regA = &$this->regAtual;
		$total = $this->ValorTotal( "totenviado" ) + $this->ValorTotal( "totNenviado" );
		$this->AcumularTotal( "total", $total );
		$this->PeQuebra( $regA->TITULO );
	}

	//------------------------------------------------------------------------
	//	Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;

		$this->AcumularTotal( "totenviado", $regA->ENVIADOS );
		$this->AcumularTotal( "totNenviado", $regA->NENVIADOS );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelPontos( RETRATO, A4, 'Bilhetagem_Mes.pdf', '', true );

$filtro = substr(
	filtrarPorLig( "L.Titulo", $parQSelecao->ACAOEMAIL ) .
	filtrarPorIntervaloData( 'L.Data', $parQSelecao->DATAINI, $parQSelecao->DATAFIM ), 0, -4 );

$maisDeUmMes = formatarData( $parQSelecao->DATAINI, 'mm/aaaa') != formatarData( $parQSelecao->DATAFIM, 'mm/aaaa');

$proc->porMes = true;
$proc->Processar(
	"Select L.Data, L.Enviados, L.NEnviados, L.Total, U.Usuario, A.Titulo
	From arqLogEmail L
		join arqAcaoEmail		A on A.idPrimario=L.Titulo
		left join arqUsuario	U on U.idPrimario=L.Usuario " .
	( $filtro ? ( "Where " . $filtro ) : "" ) .
	" Order by extract( year from L.Data), extract( month from L.Data), A.Titulo", !$maisDeUmMes );

if( $maisDeUmMes )
{
	$proc->porMes = false;
	$proc->Processar(
		"Select L.Data, L.Enviados, L.NEnviados, L.Total, U.Usuario, A.Titulo
		From arqLogEmail L
			join arqAcaoEmail		A on A.idPrimario=L.Titulo
			left join arqUsuario U on U.idPrimario=L.Usuario " .
		( $filtro ? ( "Where " . $filtro ) : "" ) .
		" Order by A.Titulo" );
}
