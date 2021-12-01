<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Consulta" ),
   $this->Pedir( "Medicação", Medicamen ),
   $this->Pedir( "Unidade", UnidadeCal ),
   $this->Pedir( "Quantidade", Qtd ),
"</table>";
