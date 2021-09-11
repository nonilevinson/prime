<?php

require_once( 'ext_relatorios_colunares.php' );

class RelParcela extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		if( $parQSelecao->CCOR )
		{
			$select = "Select C.Agencia, C.Conta, C.Banco_Num as NumBanco, C.Banco_Banco as Banco
				From v_arqCCor C
				Where C.idPrimario = " . $parQSelecao->CCOR;
			$umCCor = sql_lerUmRegistro( $select );
		}

		$this->tituloRelatorio = [ $this->tituloRel,
			( $parQSelecao->DATAINI
				? $this->tituloData . " entre " . formatarData( $parQSelecao->DATAINI ) . " e " .
               ( $parQSelecao->DATAFIM
               ? formatarData( $parQSelecao->DATAFIM )
               : "sem um final estipulado" )
				: "" ) ,
			( $parQSelecao->CCOR
				? "Conta corrente do " . $umCCor->NUMBANCO . " " . $umCCor->BANCO . " Ag. " . $umCCor->AGENCIA .
					" cc " . $umCCor->CONTA
				: "" ),
			' ' ];

      $this->DefinirCabColunas(
         [ "T", 		    4, ALINHA_CEN ],
         [ "Cobrança",	16, ALINHA_ESQ ],
         [ "Pg?",   		 7, ALINHA_CEN ],
         [ "Comp", 		14, ALINHA_CEN ],
         [ "Transação",	17, ALINHA_CEN ],
         [ "Parc",  		10, ALINHA_CEN ],
         [ "Valor",		20, ALINHA_DIR ],
         [ "Pessoa",	   78, ALINHA_ESQ ],
         [ "Histórico",	62, ALINHA_ESQ ] );

		if( $this->consolidado )
		{
         $this->DefinirQuebras(
            [ 'QuebraPorMes',			SIM, NAO, SIM ],
            [ 'QuebraPorVencimento',	SIM, NAO, SIM ] );
		}
		else
		{
         $this->DefinirQuebras(
            [ 'QuebraPorVencimento',	SIM, NAO, SIM ],
            [ 'QuebraPorClinica',		SIM, NAO, SIM ] );
		}

		$this->DefinirTotais( "totQtd", "totValor" );

		$this->cabPaginaTemCabColunas = false;
		$this->comCodigoRel = false;
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal, $p_colTotal=0 )
	{
      $this->JuntarColunas( [0,5,ALINHA_ESQ], [7,8] );
      $this->valores[ 0 ] = $p_cabTotal;
      $this->valores[ 6 ] = $this->FormatarTotal( "totValor", [ 2, 0, 0, ")" ] );
      $this->valores[ 7 ] = ' em ' . $this->FormatarTotal( "totQtd" ) . 'parcelas';
      $this->ImprimirTotalColunas();
      $this->RestaurarColunas();
	}

	//------------------------------------------------------------------------
	function Total()
	{
		$this->MarcarPosicao( 'Total Geral' );
		$this->PeQuebra( 'Total Geral' );

		$this->PDF->Cell( 0, 10, $this->br . "* O vencimento e/ou o valor estao como estimado", SEM_BORDA, PULA_LINHA );
	}

	//------------------------------------------------------------------------
	//	Quebra por Mes
	//------------------------------------------------------------------------
	function QuebraPorMes()
	{
		global $parQSelecao;
		$regA = &$this->regAtual;

		switch( $parQSelecao->TDATA )
		{
			case 1: $this->tData = $regA->DATAPAGTO; break;
			case 2: $this->tData = $regA->VENCIMENTO; break;
		}

		return( substr( $this->tData, 0, 7 ) );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorMes()
	{
		$this->quebraMes = formatarData( $this->tData, 'mmm/aaaa' );
		$this->CabQuebra( $this->quebraMes );
	}

	//------------------------------------------------------------------------
	function PeQuebraPorMes()
	{
		$this->PeQuebra( $this->quebraMes );
		$this->PularLinha( 2 );
	}

	//------------------------------------------------------------------------
	//	Quebra por Vencimento
	//------------------------------------------------------------------------
	function QuebraPorVencimento()
	{
		global $parQSelecao;
		$regA = &$this->regAtual;

		switch( $parQSelecao->TDATA )
		{
			case 1: $this->tData = $regA->DATAPAGTO; $this->quem = "Pagamento: "; break;
			case 2: $this->tData = $regA->VENCIMENTO; $this->quem = "Vencimento: "; break;
		}

		return( $this->tData );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorVencimento()
	{
		$this->quebraVence = formatarData( $this->tData );
		$this->CabQuebra( $this->quem . $this->quebraVence . " - " .
				formatarData( $this->tData, 'ddd' ), $this->quebraVence );

		if( $this->consolidado )
			$this->ImprimirCabColunas();
	}

	//------------------------------------------------------------------------
	function PeQuebraPorVencimento()
	{
		$this->PeQuebra( $this->quebraVence );
		$this->PularLinha( 2 );
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
		$this->PeQuebra( $this->quebraClinica );
		$this->PularLinha( 2 );
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;

		$valor = $regA->IDTPGREC == 1 ? -$regA->VALORLIQ : $regA->VALORLIQ;
		$this->AcumularTotal( "totQtd", 1 );
		$this->AcumularTotal( "totValor", $valor );

      $this->valores = [
         ( $regA->IDTPGREC == 1 ? 'P' : 'R' ),
         $regA->TFCOBRA,
         ( $regA->DATAPAGTO ? "S" : "" ),
         formatarData( $regA->COMPETE, 'mm/aaaa' ),
         formatarNum( $regA->TRANSACAO ),
         $regA->PARCELA . ' /' . $regA->TRGQTDPARC,
         ( $regA->ESTIMADO || $regA->VENCEST ? "* " : "" ) . formatarValor( $valor, 0, 0, ')' ),
         cadEsq( $regA->NOME, 39 ),
         cadEsq( $regA->HISTORICO, 40 ) ];

		$this->ImprimirValorColunas();
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelParcela( RETRATO, A4, 'Parcelas.pdf', '', true, .88 );

$proc->tituloRel = 'Relatório de parcelas';

switch( $parQSelecao->TDATA )
{
	case 1:
		$tipoData = "P.DataPagto";
		$proc->tituloData = "Pagamento";
		break;

	case 2:
		$tipoData = "P.Vencimento";
		$proc->tituloData = "Vencimento";
		break;
}

switch( $parQSelecao->QUITADA )
{
	case 0: $quitadas = ""; break;
	case 1: $quitadas = "P.DataPagto is not null and "; break;
	case 2: $quitadas = "P.DataPagto is null and "; break;
}

$proc->consolidado = $parQSelecao->LOGICO1;

if( $proc->consolidado )
	$order = "extract( year from " . $tipoData . " ), " . "extract( month from " . $tipoData . " )" . ", " .
		$tipoData;
else
	$order = $tipoData . ", L.Clinica";

$select = "Select P.Parcela, P.Vencimento, P.ValorLiq, P.Estimado, P.VencEst, P.DataPagto,
		C.TrgQtdParc, C.Transacao, C.Compete, C.Historico, C.TPgRec as idTPgRec, L.Clinica,
      O.Descritor as TFCobra,
		iif( C.Fornecedor is not null, F.Nome, S.Nome ) as Nome
	From arqParcela P
		join arqConta  			C on C.idPrimario=P.Conta
		join arqClinica 			L on L.idPrimario=C.Clinica
		left join tabTFCobra 	O on O.idPrimario=P.TFCobra
		left join arqFornecedor	F on F.idPrimario=C.Fornecedor
		left join arqPessoa  	S on S.idPrimario=C.Pessoa
	Where " . substr(
      ( SQL_VETIDCLINICA ? "C.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
		filtrarPorLig( 'C.Clinica', $parQSelecao->CLINICA ) .
		filtrarPorLig( 'C.Fornecedor', $parQSelecao->FORNECEDOR ) .
		filtrarPorLig( 'C.Pessoa', $parQSelecao->CLIENTE ) .
		filtrarPorLig( 'C.TPgRec', $parQSelecao->TPGREC ) .
		filtrarPorLig( 'P.TFPagto', $parQSelecao->TFPAGTO ) .
		filtrarPorLig( 'P.TFCobra', $parQSelecao->TFCOBRA ) .
		filtrarPorLig( 'P.CCor', $parQSelecao->CCOR ) .
		filtrarPorLig( 'P.SubPlano', $parQSelecao->SUBPLANO ) .
		filtrarPorIntervaloData( $tipoData, $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
		filtrarPorIntervaloData( 'C.Compete', $parQSelecao->MES, $parQSelecao->MESFIM ) .
		( $quitadas ? $quitadas : '' ), 0, -4 ) .
	" Order by " . $order . ", F.Nome, S.Nome";

$proc->Processar( $select );
