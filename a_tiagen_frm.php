<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Tipo", TiAgenda ),
   $this->Pedir( "Ativo?", Ativo ),
   $this->Pedir( "Dobro?",
      [ "", DobroTempo, " (usa o dobro do tempo da conuslta?)" ] ),
   $this->Pedir( "Layout Agenda",
      [ "No topo? ", AgTopo,
      [ brHtml(4) . "No formul�rio? ", AgForm ] ] ),
   $this->Pedir( "Campos edit�veis",
      [ "Forma de pagamento e Valor ", Pagamento,
      [ brHtml(4) . "M�dia ", Midia ] ] ),
"</table>";
