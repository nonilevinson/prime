<?php

	echo
	"<table class='tabFormulario'>",
		$this->Pedir( "Aviso",
			array( "", Avisos,
			array( brHtml(4) . "Lido em ", Data ) ) ),
		$this->Pedir( "Usu�rio", Usuario ),
		$this->Pedir( "Grupo de acesso", Grupo ),
	"</table>";

?>
