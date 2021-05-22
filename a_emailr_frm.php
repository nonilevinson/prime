<?php

	echo
	"<table class='tabFormulario'>",
		$this->Pedir( "Email" ),
		$this->Pedir( "Nome do email", NomeEmail ),
		$this->Pedir( "Padrão?", Padrao ),
		$this->Pedir( "Ativo?", Ativo ),
	"</table>";

?>