<?php

include( 'endereco_frm.php' );

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Raz�o social", Razao ),
   $this->Pedir( "Sigla",
      [ "", Sigla, " (ser� usada no contrato com o paciente)" ] ),
   $this->Pedir( "Email" ),
   $this->Pedir( "CNPJ" ),
   $this->Pedir( "Tipo de consulta",
      [ "", TiConsulta,
      [ brHtml(4) . "Agendamento dispon�vel para at� ", MaxAgenda, " dias a partir de hoje" ] ] ),
   $this->Pedir( "Per�odo de atividade",
      [ "", DataIni,
      [ " at� ", DataFim, " (opcional)" ] ] ),
   $this->Pedir( "Ativa?", Ativo ),
"</table>",

CriarForms(
	[ 'Endere�o', 'E', true ] ),

//* Endere�o
"<table id='E' class='tabFormulario' style='display:none'>",
	frmEndereco( "E", "Ende_" ),
"</table>",

SelecionarForm();
