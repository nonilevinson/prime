<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "In�cio",
      [ "", DataIni,
      [ brHtml(4) . " Fim ", DataFim ] ] ),
   $this->Pedir( "Dia da semana", TDiaSem ),
   $this->Pedir( "M�dico", Usuario ),
"</table>";
