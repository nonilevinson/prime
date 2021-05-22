<?php

require_once( LANCE_PHP_ABSOLUTO . 'lance_relatorio_pdf_wkhtml.php' );
require_once( 'ext_docmod.php' );

class RelDocumento extends Lance_RelatorioPDF_WKHTML
{
	//-----------------------------------------------------------------------
	function Basico()
	{
		SubstituiDadosPessoa( $this->regAtual );
		SubstituiDadosGeral( $this->regAtual );
		$this->ProcessarHtml();
	}
}
