<?php

	echo
	"<table class='tabFormulario'>",
		$this->Pedir( "Nome" ),
		$this->Cabecalhos( array( "C�dgio HTML para template de emails - fundo dos emails", "FormCab alinhaMeio", "2" ) ),
		$this->Pedir( " ", Template ),
	"</table>";

?>