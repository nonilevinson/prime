<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Medicamento", Medicamen ),
   $this->Pedir( "Lote" ),
   $this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Fornecedor" ),
   $this->Pedir( "Datas",
      [ "Fabricação ", Fabrica,
      [ brHtml(4) . "Validade ", Validade ] ] ),
   $this->Pedir( "Qtd",
      [ "Movimentações ", TrgItMov,
      [ brHtml(4) . "Consultas ", TrgCMedica,
      [ brHtml(4) . "Estoque ", Estoque ] ] ] ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
