<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Movimento Nº",
		[ "", MovEstoque,
		[ brHtml(4) . "Item ", Item ] ] ),
	$this->Pedir( "Medicamento", Lote_Medicamen ),
	$this->Pedir( "Lote",
		[ "", Lote_Lote,
		[ "", Lote ] ] ),
	$this->Pedir( "Tipo", TMov ),
	$this->Pedir( "Quantidade",
		[ "", Qtd,
		[ brHtml(4) . "Unidade ", CUnidade ] ] ),
"</table>";
