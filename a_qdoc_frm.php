<?php

$op = ultimaLigOpcao();

echo 	"<table class='tabFormulario'>";
//==================================================================================

if( $op == 999 )
{
	echo
	$this->PedirZerando( "Modelo de documento",
		[ "", DocMod, " (obrigatório)" ] );
}

//==================================================================================
echo "</table>";
