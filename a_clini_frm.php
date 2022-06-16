<?php

include( 'endereco_frm.php' );

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Razão social", Razao ),
   $this->Pedir( "Sigla",
      [ "", Sigla, " (será usada no contrato com o paciente)" ] ),
   $this->Pedir( "Email" ),
   $this->Pedir( "CNPJ" ),
   $this->Pedir( "Tipo de consulta",
      [ "", TiConsulta,
      [ brHtml(4) . "Agendamento disponível para até ", MaxAgenda, " dias a partir de hoje" ] ] ),
   $this->Pedir( "Período de atividade",
      [ "", DataIni,
      [ " até ", DataFim, " (opcional)" ] ] ),
   $this->Pedir( "Ativa?", Ativo ),
"</table>",

CriarForms(
	[ 'Endereço', 'E', true ] ),

//* Endereço
"<table id='E' class='tabFormulario' style='display:none'>",
	frmEndereco( "E", "Ende_" ),
"</table>",

SelecionarForm();
