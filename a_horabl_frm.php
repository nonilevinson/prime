<?php

echo
"<table class='tabFormulario'>",
   $this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Nome" ),
   $this->Pedir( "In�cio",
      [ "", DataIni,
      [ brHtml(4) . "das ", HoraIni, " h" ] ] ),
   $this->Pedir( "Final",
      [ "", DataFim,
      [ brHtml(4) . " �s ", HoraFim, " h" ] ] ),
   $this->Pedir( "M�dico",
      [ "", Medico, " (opcional)" ] ),
"</table>";
