<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "V�lido a partir de", Inicio ),
   $this->Pedir( "Dura��o de cada homologa��o",
      [ " ", Duracao, " min (1, 2, 3, 4, 5, 6, 10, 12, 15, 20, 30 ou 60 minutos; 0 = n�o atende mais)" ] ),
   $this->Pedir( "Agendamento dispon�vel para at�",
      [ " ", MaxAgenda, " dias a partir de hoje" ] ),
"</table>";
