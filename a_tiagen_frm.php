<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Tipo", TiAgenda ),
   $this->Pedir( "Ativo?", Ativo ),
   $this->Pedir( "Dobro?",
      [ "", DobroTempo, " (usa o dobro do tempo da conuslta?)" ] ),
   $this->Pedir( "Campos edit�veis",
      [ "Forma de pagamento e Valor ", Pagamento,
      [ " (e obrigat�rio)" . brHtml(4) . "M�dia ", Midia ] ] ),
"</table>";
