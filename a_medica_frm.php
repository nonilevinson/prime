<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Medicamento", Medicamen ),
   $this->Pedir( "Unidade" ),
   $this->Pedir( "Estoque",
      [ "M�nimo ", EstoqueMin,
      [ brHtml(4) . "M�ximo ", EstoqueMax ] ] ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
