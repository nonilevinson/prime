<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Válido a partir de",
      [ "", Inicio, " (precisa ser um Domingo)" ] ),
   $this->Pedir( "Horário",
      [ "", HoraIni,
      [ " h às ", HoraFim, " h" ] ] ),
   $this->Pedir( "Sábado?",
      [ "", ConsSab,
      [ brHtml(4) . "Domingo? ", ConsDom ] ] ),
   $this->Pedir( "Duração de cada consulta",
      [ " ", Duracao, " min (10, 15, 20, 30 ou 60 minutos)" ] ),
"</table>";
