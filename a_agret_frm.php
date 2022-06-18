<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Data",
      [ "", Data,
      [ " ", Dia,
      [ brHtml(4) . "Hora ", Hora ] ] ] ),
   $this->Pedir( "Consulta",
      [ "", Consulta, " <b>(informe uma Consulta ou um Paciente)</b>" ] ),
   $this->Pedir( "Paciente", Pessoa_Nome ),
   $this->Pedir( " ",
      [ "Celular ", Pessoa_NumCelular,
      [ "", Pessoa ] ] ),
   $this->Pedir( "Prontuário", Prontuario ),
   $this->Pedir( "Nome" ),
   $this->Pedir( "Celular", NumCelular ),
   $this->Pedir( "Status", TStAgRet ),
   $this->Pedir( "Responsável",
      [ "", Assessor, "<br>(obrigatório se um Status for informado)" ] ),
"</table>
<br>
<table class='tabFormulario'>",
   $this->Cabecalhos( [ "Observações", 'FormCab alinhaMeio', '2' ] ),
   $this->Pedir( "", [ "", Obs, '', 'FormValor alinhaMeio', '2' ] ),
"</table>";
