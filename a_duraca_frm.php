<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "V�lido a partir de",
      [ "", Inicio, " (precisa ser um Domingo)" ] ),
   $this->Pedir( "Dura��o de cada consulta",
      [ " ", Duracao, " min (10, 15, 20, 30 ou 60 minutos)" ] ),
   $this->Pedir( "Agendamento dispon�vel para at�",
      [ " ", MaxAgenda, " dias a partir de hoje" ] ),
"</table>";
