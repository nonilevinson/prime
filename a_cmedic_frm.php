<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Consulta" ),
   $this->Pedir( "Medica��o", Medicamen ),
   $this->Pedir( "Unidade", UnidadeCal ),
   $this->Pedir( "Quantidade", Qtd ),
"</table>";
