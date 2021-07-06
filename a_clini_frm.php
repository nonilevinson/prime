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
	[ 'Horário', 'H', true ],
   [ 'Endereço', 'E', true ] ),

//* Horario
"<table id='H' class='tabFormulario' style='display:none'>",
/*
   $this->Pedir( "Agendamento disponível para até",
      [ " ", MaxAgenda, " dias a partir de hoje" ] ),
*/
   $this->Pedir( "Horário",
      [ "", HoraIni,
      [ " h às ", HoraFim, " h" ] ] ),
   $this->Pedir( "Sábado?", ConsSab ),
   $this->Pedir( "Domingo?", ConsDom ),
"</table>",

//* Endereço
"<table id='E' class='tabFormulario' style='display:none'>",
   // $this->Pedir( "Ende_Endereco" ),
	frmEndereco( "E", "Ende_" ),
"</table>",

SelecionarForm();
