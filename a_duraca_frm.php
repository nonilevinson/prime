<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "V�lido a partir de",
      [ "", Inicio, " (precisa ser um Domingo)" ] ),
   $this->Pedir( "Hor�rio",
      [ "", HoraIni,
      [ " h �s ", HoraFim, " h" ] ] ),
   $this->Pedir( "S�bado?",
      [ "", ConsSab,
      [ brHtml(4) . "Domingo? ", ConsDom ] ] ),
   $this->Pedir( "Dura��o de cada consulta",
      [ " ", Duracao, " min (10, 15, 20, 30 ou 60 minutos)<br><br><b>Aten��o!!!<br>A op��o [Retorno OSP] acarretar� em um agendamento<br>de um intervalo de consulta e as demais usar�o duas<br>vezes esse mesmo intervalo</b>" ] ),
"</table>";
