<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Tipo", TiAgenda ),
   $this->Pedir( "Ordem" ),
   $this->Pedir( "Dobro?",
      [ "", DobroTempo, " (usa o dobro do tempo da conuslta?)" ] ),
   
   $this->Pular1Linha(2),
   $this->Pedir( "Tratamento?",
      [ "", Ativo, " (é mostrado em consultas de Tratamento?)" ] ),
   $this->Pedir( "Complementar?",
      [ "", Complemen, " (é mostrado em consultas Complementares?)" ] ),
   
   $this->Pular1Linha(2),
   $this->Pedir( "Campos editáveis",
      [ "Forma de pagamento e Valor ", Pagamento,
      [ " (e obrigatório)" . brHtml(4) . "Mídia ", Midia ] ] ),
"</table>";
