<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "In�cio",
      [ "", DataIni, " (a partir de)" ] ),
   $this->Pedir( "Dia da semana", TDiaSem ),
   $this->Pedir( "M�dico", Usuario ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
