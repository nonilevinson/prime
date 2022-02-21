<?php

echo
"<table class='tabFormulario'>",
   $this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Nome" ),
   $this->Pedir( "Início",
      [ "", DataIni,
      [ brHtml(4) . "das ", HoraIni, " h" ] ] ),
   $this->Pedir( "Final",
      [ "", DataFim,
      [ brHtml(4) . " às ", HoraFim, " h" ] ] ),
   $this->Pedir( "Médico",
      [ "", Medico, " (opcional)" ] ),
"</table>";
