<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Início",
      [ "", DataIni,
      [ brHtml(4) . " Fim ", DataFim ] ] ),
   $this->Pedir( "Dia da semana", TDiaSem ),
   $this->Pedir( "Médico", Usuario ),
"</table>";
