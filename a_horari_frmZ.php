<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "M�dico", Pessoa ),
   $this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Dia",
      [ "", TDiaSem,
      [ brHtml(4) . "Das ", HoraIni,
      [ " h at� �s ", HoraFim, " h" ] ] ] ),
   $this->Pedir( "V�lido para o per�odo de",
      [ " ", DiaIni,
      [ " at� ", DiaFim ] ] ),
"</table>";
