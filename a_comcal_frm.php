<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Mês",
      [ "", Mes, " (a partir de)" ] ),
   $this->Pedir( "Faixas", TrgQtoFx ),
"</table>";
