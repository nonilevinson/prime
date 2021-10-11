<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Tipo", TiAgenda ),
   $this->Pedir( "Ativo?", Ativo ),
   $this->Pedir( "Dobro?",
      [ "", DobroTempo, " (usa o dobro do tempo da conuslta?)" ] ),
   $this->Pedir( "Layout Agenda",
      [ "No topo? ", AgTopo,
      [ brHtml(4) . "No formulário? ", AgForm ] ] ),
   $this->Pedir( "Campos editáveis",
      [ "Forma de pagamento e Valor ", Pagamento,
      [ brHtml(4) . "Mídia ", Midia ] ] ),
"</table>";
