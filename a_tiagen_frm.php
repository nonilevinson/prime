<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Tipo", TiAgenda ),
   $this->Pedir( "Ativo?", Ativo ),
   $this->Pedir( "Dobro?",
      [ "", DobroTempo, " (usa o dobro do tempo da conuslta?)" ] ),
   $this->Pedir( "Campos editáveis",
      [ "Forma de pagamento e Valor ", Pagamento,
      [ " (e obrigatório)" . brHtml(4) . "Mídia ", Midia ] ] ),
"</table>";
