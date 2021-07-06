<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Início",
      [ "", DataIni, " (a partir de)" ] ),
   $this->Pedir( "Dia da semana", TDiaSem ),
   $this->Pedir( "Médico", Usuario ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
