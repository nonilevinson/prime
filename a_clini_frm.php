<?php

include( 'endereco_frm.php' );

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Raz�o social", Razao ),
   $this->Pedir( "Email" ),
   $this->Pedir( "CNPJ" ),
   $this->Pedir( "Ativa?", Ativo ),
"</table>",

CriarForms(
	[ 'Hor�rio', 'H', true ],
   [ 'Endere�o', 'E', true ] ),

//* Horario
"<table id='H' class='tabFormulario' style='display:none'>",
/*
   $this->Pedir( "Agendamento dispon�vel para at�",
      [ " ", MaxAgenda, " dias a partir de hoje" ] ),
*/
   $this->Pedir( "Hor�rio",
      [ "", HoraIni,
      [ " h �s ", HoraFim, " h" ] ] ),
   $this->Pedir( "S�bado?", ConsSab ),
   $this->Pedir( "Domingo?", ConsDom ),
"</table>",

//* Endere�o
"<table id='E' class='tabFormulario' style='display:none'>",
   // $this->Pedir( "Ende_Endereco" ),
	frmEndereco( "E", "Ende_" ),
"</table>",

SelecionarForm();
