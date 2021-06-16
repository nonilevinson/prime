<?php

global $g_debugProcesso, $g_acaoAtual;

echo
"<table class='tabFormulario'>";

	if( $g_acaoAtual == INSERINDO )
	{
		echo
		$this->NaoPedir( Prontuario ),
		$this->Pedir( "Consulta N�",
			[ " ", '',
			[ "(ser� atribuido pelo sistema )" . brHtml(2) . "Data ", Data,
			[ brHtml(2) . "Hora ", Hora,
         [ " h " . brHtml(2) . "Chegada ", HoraChega, " h" ] ] ] ] );

	}
	else
		echo $this->Pedir( "Consulta N�",
         [ '', Num,
         [ brHtml(4) . "Data ", Data,
         [ brHtml(4) . "Hora ", Hora,
         [ " h " . brHtml(2) . "Chegada ", HoraChega, " h" ] ] ], '', '','', 'FormCalculado' ] );

   echo
	$this->Pedir( "Status", TStCon ),
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Paciente", Pessoa ),
   $this->Pedir( "M�dico", Medico ),
   $this->Pedir( "Marketing", Mkt ),
   $this->Pedir( "Assessor" ),
"</table>",

CriarForms(
	[ 'Atual', 'A', true ],
	[ 'Conduta', 'C', true ],
	[ 'Medica��o', 'M', true ] ),

"<table id='A' class='tabFormulario' style='display:none'>",
	$this->Pedir( "Motivo", TMotivo ),
	$this->Pedir( "Medica��o<br>atual", MedicaAtua ),
"</table>",

"<table id='C' class='tabFormulario' style='display:none'>",
	$this->Pedir( "Programa de tratamento", TPrograma ),
	$this->Pedir( "Conduta" ),
"</table>",

"<table id='M' class='tabFormulario' style='display:none'>",
	$this->Pedir( "Medica��o<br>Recomendada", Medicacao ),
"</table>",

SelecionarForm();
