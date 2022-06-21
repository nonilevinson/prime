<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Tipo", TiAgenda ),
   $this->Pedir( "Tratamento?", Ativo ),
   $this->Pedir( "Complementar?", Complemen ),
   $this->Pedir( "Dobro?",
      [ "", DobroTempo, " (usa o dobro do tempo da conuslta?)" ] ),
   $this->Pedir( "Campos editáveis",
      [ "Forma de pagamento e Valor ", Pagamento,
      [ " (e obrigatório)" . brHtml(4) . "Mídia ", Midia ] ] ),
"</table>";
