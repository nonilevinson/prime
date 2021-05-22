<?php

	echo
	"<table class='tabFormulario'>",
		$this->Pedir( "Avisos" ),
		$this->Pedir( "Grupo de acesso", Grupo ),
		$this->Pedir( "Usuário", Usuario ),
	"</table>";
			
?>