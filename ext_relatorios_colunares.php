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

}
