<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Medicamento", Medicamen ),
   $this->Pedir( "Unidade" ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
