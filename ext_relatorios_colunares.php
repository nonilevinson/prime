<?php

//require_once( 'externo.php' );
require_once( LANCE_PHP_ABSOLUTO . 'lance_relatorio_pdf_colunar.php' );

class Relatorios extends Lance_RelatorioPDF_Colunar
{
	//------------------------------------------------------------------------
	function DefinirAlturas()
	{
		$this->alturaCabecalho	= 5;
		$this->alturaCabColunas	= 5;
		$this->alturaRodape	= 5;
		$this->alturaTotal	= 5;
		$this->alturaBasico	= 5;
	}

	//------------------------------------------------------------------------
	//	Rotina para fazer imprimir um cabeçalho de quebra genérico
	//------------------------------------------------------------------------
	function CabQuebra( $p_txtCabQuebra, $p_txtMarcacao='' )
	{
		$this->MarcarPosicao( $p_txtMarcacao ? $p_txtMarcacao : $p_txtCabQuebra, $this->nivelQuebra );
		$this->ImprimirTotalEmUmaColuna( $p_txtCabQuebra );
	}

	//------------------------------------------------------------------------
	//	Rotina para fazer imprimir um titulo de datas se DATAINI foi informado
	//------------------------------------------------------------------------
	function TituloData( $p_titulo, $p_dataIni, $p_dataFim=null )
	{
		if( $p_dataIni )
		{
			return( $p_titulo . " entre " . formatarData( $p_dataIni ) . " e " . 
				( $p_dataFim
					? formatarData( $p_dataFim )
					: "sem um final estipulado" )
			);
		}
	}

	//------------------------------------------------------------------------
	//	Rotina para fazer imprimir um titulo com os dados da conta corrente
	//------------------------------------------------------------------------
	function TituloCCor( $p_idCCOr )
	{
		$select = "Select C.Agencia, C.Conta, C.Banco_Num as NumBanco, C.Banco_Banco as Banco
			From v_arqCCor C
			Where C.idPrimario = " . $p_idCCOr;
		$umCCor = sql_lerUmRegistro( $select );
		
		return( "Conta corrente do " . $umCCor->NUMBANCO . " " . $umCCor->BANCO . 
			" Ag. " . $umCCor->AGENCIA . " cc " . $umCCor->CONTA 
		);
	}
}
