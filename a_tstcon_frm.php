<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Status" ),
   $this->Pedir( "Ordem",
      [ "", Ordem,
      [ brHtml(4) . "Legenda? ", Legenda, " (Barra no topo da agenda)" ] ] ),
   $this->Pedir( "Cor",
      [ "", Cor,
      [ brHtml(4) . "Fundo ", Fundo ] ] ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
