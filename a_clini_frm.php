<?php

include( 'endereco_frm.php' );

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Raz�o social", Razao ),
   $this->Pedir( "Email" ),
   $this->Pedir( "CNPJ" ),
   $this->Pedir( "Agendamento dispon�vel para at�",
      [ " ", MaxAgenda, " dias a partir de hoje" ] ),
   $this->Pedir( "Per�odo de atividade",
      [ "", DataIni,
      [ " at� ", DataFim ] ] ),
   $this->Pedir( "Ativa?", Ativo ),
"</table>",

CriarForms(
	[ 'Endere�o', 'E', true ] ),

//* Endere�o
"<table id='E' class='tabFormulario' style='display:none'>",
	frmEndereco( "E", "Ende_" ),
"</table>",

SelecionarForm();
