<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "M�s",
      [ "", Mes, " (a partir de)" ] ),
   $this->Pedir( "Faixas", TrgQtoFx ),
"</table>";
