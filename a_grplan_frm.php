<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Início",
      [ "", DataIni,
      [ " (obrigatório)" . brHtml(4) . "Término ", DataFim, " (opcional)" ] ] ),
   $this->Pedir( "Médico", Medico ),
   $this->Pedir( "Domingo?", Dom ),
   $this->Pedir( "Segunda?", Seg ),
   $this->Pedir( "Terça?", Ter ),
   $this->Pedir( "Quarta?", Qua ),
   $this->Pedir( "Quinta?", Qui ),
   $this->Pedir( "Sexta?", Sex ),
   $this->Pedir( "Sábado?", Sab ),
"</table>";
