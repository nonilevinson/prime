<?php

include( 'endereco_frm.php' );

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Razão social", Razao ),
   $this->Pedir( "Email" ),
   $this->Pedir( "CNPJ" ),
   $this->Pedir( "Ativa?", Ativo ),
"</table>",

CriarForms(
	[ 'Endereço', 'E', true ] ),

//* Endereço
"<table id='E' class='tabFormulario' style='display:none'>",
   // $this->Pedir( "Ende_Endereco" ),
	frmEndereco( "E", "Ende_" ),
"</table>",

SelecionarForm();
