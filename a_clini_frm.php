<?php

include( 'endereco_frm.php' );

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Razão social", RAzao ),
   $this->Pedir( "Email" ),
   $this->Pedir( "CNPJ" ),
"</table>",

CriarForms(
	[ 'Endereço', 'E', true ] ),

//* Endereço
"<table id='E' class='tabFormulario' style='display:none'>",
	frmEndereco( "E", "Ende_" ),
"</table>","</table>";
