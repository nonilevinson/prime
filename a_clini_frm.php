<?php

include( 'endereco_frm.php' );

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Raz�o social", RAzao ),
   $this->Pedir( "Email" ),
   $this->Pedir( "CNPJ" ),
"</table>",

CriarForms(
	[ 'Endere�o', 'E', true ] ),

//* Endere�o
"<table id='E' class='tabFormulario' style='display:none'>",
	frmEndereco( "E", "Ende_" ),
"</table>","</table>";
