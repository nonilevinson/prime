<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Medicamento", Medicamen ),
   $this->Pedir( "Lote" ),
   $this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Fornecedor" ),
   $this->Pedir( "Datas",
      [ "Fabrica��o ", Fabrica,
      [ brHtml(4) . "Validade ", Validade ] ] ),
   $this->Pedir( "Qtd",
      [ "Movimenta��es ", TrgItMov,
      [ brHtml(4) . "Consultas ", TrgCMedica,
      [ brHtml(4) . "Estoque ", Estoque ] ] ] ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
