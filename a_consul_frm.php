<?php

global $g_debugProcesso, $g_acaoAtual;

echo
"<table class='tabFormulario'>";

	if( $g_acaoAtual == INSERINDO )
	{
		echo
<<<<<<< HEAD
		$this->NaoPedir( Num ),
=======
>>>>>>> bd1922a5fa9011f593b3054dfa9951f4662288ed
		$this->Pedir( "Consulta Nº",
			[ " ", '',
			[ "(será atribuido pelo sistema )" . brHtml(2) . "Data ", Data,
			[ brHtml(2) . "Hora ", Hora,
         [ " h " . brHtml(2) . "Chegada ", HoraChega, " h",'','','','FormCalculado' ] ] ] ] );

	}
	else
		echo $this->Pedir( "Consulta Nº",
         [ '', Num,
         [ brHtml(4) . "Data ", Data,
         [ brHtml(4) . "Hora ", Hora,
         [ " h " . brHtml(2) . "Chegada ", HoraChega, " h",'','','','FormCalculado' ] ] ], '', '','', 'FormCalculado' ] );

   echo
	$this->Pedir( "Status", TStCon ),
	$this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Paciente", Pessoa ),
   $this->Pedir( "Médico", Medico ),
   $this->Pedir( "Marketing", Mkt ),
   $this->Pedir( "Assessor" ),
"</table>",

CriarForms(
	[ 'Atual', 'A', true ],
	[ 'Conduta', 'C', true ],
	[ 'Medicação', 'M', true ] ),

"<table id='A' class='tabFormulario' style='display:none'>",
	$this->Pedir( "Motivo", TMotivo ),
	$this->Pedir( "Medicação<br>atual", MedicaAtua ),
"</table>",

"<table id='C' class='tabFormulario' style='display:none'>",
	$this->Pedir( "Programa de tratamento", TPrograma ),
	$this->Pedir( "Conduta" ),
"</table>",

"<table id='M' class='tabFormulario' style='display:none'>",
	$this->Pedir( "Medicação<br>Recomendada", Medicacao ),
"</table>",

SelecionarForm();
