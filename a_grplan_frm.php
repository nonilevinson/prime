<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "In�cio",
      [ "", DataIni,
      [ " (obrigat�rio)" . brHtml(4) . "T�rmino ", DataFim, " (opcional)" ] ] ),
   $this->Pedir( "M�dico", Medico ),
   $this->Pedir( "Domingo?", Dom ),
   $this->Pedir( "Segunda?", Seg ),
   $this->Pedir( "Ter�a?", Ter ),
   $this->Pedir( "Quarta?", Qua ),
   $this->Pedir( "Quinta?", Qui ),
   $this->Pedir( "Sexta?", Sex ),
   $this->Pedir( "S�bado?", Sab ),
"</table>";
