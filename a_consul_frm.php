<?php

global $g_debugProcesso, $g_acaoAtual;

echo
"<table class='tabFormulario'>";

	if( $g_acaoAtual == INSERINDO )
	{
		echo
		$this->NaoPedir( Num ),
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
         [ " h" . brHtml(3) . "Chegada ", HoraChega, " h",'','','','FormCalculado' ] ] ], '', '','', 'FormCalculado' ] );

   echo
	$this->Pedir( "Status",
		[ "", TStCon,
		[ brHtml(4) . "Tipo ", TiAgenda ] ] ),
	$this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Paciente", Pessoa_Nome ),
   $this->Pedir( " ",
      [ "Celular ", Pessoa_NumCelular,
      [ "", Pessoa,
		[ brHtml(4) . "Prontuário ", Prontuario ] ] ] ),
   $this->Pedir( "Médico", Medico ),
   $this->Pedir( "Assessor" ),
	$this->Pedir( "Forma de pagamento", FormaPg ),
"</table>",

CriarForms(
	[ 'Observações', 'O', true ],
	[ 'Atual', 'A', true ],
	[ 'Conduta', 'C', true ],
	[ 'Medicação', 'M', true ] ),

"<table id='O' class='tabFormulario' style='display:none'>",
	$this->Cabecalhos( [ "Observações", 'FormCab alinhaMeio', '2' ] ),
	$this->Pedir( "", [ "", Obs, '', 'FormValor alinhaMeio', '2' ] ),
"</table>",

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
