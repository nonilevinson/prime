<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Válido a partir de", Inicio ),
   $this->Pedir( "Duração de cada homologação",
      [ " ", Duracao, " min (1, 2, 3, 4, 5, 6, 10, 12, 15, 20, 30 ou 60 minutos; 0 = não atende mais)" ] ),
   $this->Pedir( "Agendamento disponível para até",
      [ " ", MaxAgenda, " dias a partir de hoje" ] ),
"</table>";
