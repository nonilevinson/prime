<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Medicamento", Medicamen ),
   $this->Pedir( "Unidade" ),
   $this->Pedir( "Estoque",
      [ "Mínimo ", EstoqueMin,
      [ brHtml(4) . "Máximo ", EstoqueMax ] ] ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
