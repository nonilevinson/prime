<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Tipo", TiAgenda ),
   $this->Pedir( "Ordem" ),
   $this->Pedir( "Dobro?",
      [ "", DobroTempo, " (usa o dobro do tempo da conuslta?)" ] ),
   
   $this->Pular1Linha(2),
   $this->Pedir( "Tratamento?",
      [ "", Ativo, " (� mostrado em consultas de Tratamento?)" ] ),
   $this->Pedir( "Complementar?",
      [ "", Complemen, " (� mostrado em consultas Complementares?)" ] ),
   
   $this->Pular1Linha(2),
   $this->Pedir( "Campos edit�veis",
      [ "Forma de pagamento e Valor ", Pagamento,
      [ " (e obrigat�rio)" . brHtml(4) . "M�dia ", Midia ] ] ),
"</table>";
