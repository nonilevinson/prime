<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Médico", Pessoa ),
   $this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Dia",
      [ "", TDiaSem,
      [ brHtml(4) . "Das ", HoraIni,
      [ " h até às ", HoraFim, " h" ] ] ] ),
   $this->Pedir( "Válido para o período de",
      [ " ", DiaIni,
      [ " até ", DiaFim ] ] ),
"</table>";
