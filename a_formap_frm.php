<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Forma", FormaPg ),
   $this->Pedir( "Dinheiro?",
      [ "", Dinheiro,
      [ brHtml(4) . "Cart�o? ", Cartao ] ] ),
   $this->Pedir( "Dias",
      [ "", Dias, " (para dinheiro e transfer�ncias como PIX e TED pode ser zero)" ] ),
   $this->Pedir( "Taxas Adm",
      [ "D�bito ", TaxaDeb,
      [ brHtml(4) . "Duas vezes ", Taxa2,
      [ " %" . brHtml(4) . "Tr�s vezes ", Taxa3, " %" ] ] ] ),
   $this->Pedir( "Ativa?", Ativo ),
"</table>";
