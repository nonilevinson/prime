<?php

	echo
	"<table class='tabFormulario'>",
		$this->Pedir( "Avisos" ),
		$this->Pedir( "Grupo de acesso", Grupo ),
		$this->Pedir( "Usu�rio", Usuario ),
	"</table>";
			
?>