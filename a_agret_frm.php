<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Cl�nica", Clinica ),
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
   $this->Pedir( "Prontu�rio", Prontuario ),
   $this->Pedir( "Nome" ),
   $this->Pedir( "Celular", NumCelular ),
   $this->Pedir( "Status", TStAgRet ),
   $this->Pedir( "Respons�vel",
      [ "", Assessor, "<br>(obrigat�rio se um Status for informado)" ] ),
"</table>
<br>
<table class='tabFormulario'>",
   $this->Cabecalhos( [ "Observa��es", 'FormCab alinhaMeio', '2' ] ),
   $this->Pedir( "", [ "", Obs, '', 'FormValor alinhaMeio', '2' ] ),
"</table>";
