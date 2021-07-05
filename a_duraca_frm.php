<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Válido a partir de",
      [ "", Inicio, " (precisa ser um Domingo)" ] ),
   $this->Pedir( "Duração de cada consulta",
      [ " ", Duracao, " min (10, 15, 20, 30 ou 60 minutos)" ] ),
   $this->Pedir( "Agendamento disponível para até",
      [ " ", MaxAgenda, " dias a partir de hoje" ] ),
"</table>";
