<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Status" ),
   $this->Pedir( "Ordem" ),
   $this->Pedir( "Cor",
      [ "", Cor,
      [ brHtml(4) . "Fundo ", Fundo ] ] ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
