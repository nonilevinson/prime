<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Forma", FormaPg ),
   $this->Pedir( "Dinheiro?",
      [ "", Dinheiro,
      [ brHtml(4) . "Cartão? ", Cartao ] ] ),
   $this->Pedir( "Dias",
      [ "", Dias, " (para dinheiro e transferências como PIX e TED pode ser zero)" ] ),
   $this->Pedir( "Taxas Adm",
      [ "Débito ", TaxaDeb,
      [ brHtml(4) . "Duas vezes ", Taxa2,
      [ " %" . brHtml(4) . "Três vezes ", Taxa3, " %" ] ] ] ),
   $this->Pedir( "Ativa?", Ativo ),
"</table>";
