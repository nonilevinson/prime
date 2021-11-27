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
	$this->Pedir( "Call center", CallCenter ),
	$this->Pedir( "Valor",
		[ "", Valor,
		[ brHtml(4) . "Forma de pagamento ", FormaPg ] ] ),
	$this->Pedir( " ",
		[ "Conta ", ContaCons, " (o sistema preencherá esse campo)", '','','','FormCalculado' ] ),
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
	$this->Pedir( "Plano de tratamento", PTrata ),
	$this->Pedir( "Valor do tratamento",
		[ "", ValPTrata,
		[ brHtml(4) . "Conta ", ContaPTra, " (o sistema preencherá esse campo)", '','','','FormCalculado' ] ] ),
	
	$this->Cabecalhos( [ "Entrada", 'FormCab alinhaEsq', '2' ] ),
	$this->Pedir( "Forma de pagamento",
		[ "", EntraFPg,
		[ brHtml(4) . "Valor ", EntraVal ] ] ),
	$this->Pedir( "Se boleto e dividiu",
		[ "Parcelas do saldo da entrada ", EntraParc,
		[ brHtml(4) . "Valor das parcelas ", EntraValP,
		[ brHtml(4) . "Total ", EntraTotP ] ] ] ),
	$this->Pedir( "Observações", EntraObs ),
	
	$this->Cabecalhos( [ "Saldo", 'FormCab alinhaEsq', '2' ] ),
	$this->Pedir( "Forma de pagamento",
		[ "", SaldoFPg,
		[ brHtml(4) . "Parcelas ", SaldoParc,
		[ brHtml(4) . "Valor das parcelas ", SaldoVal,
		[ brHtml(4) . "Total ", SaldoTotP ] ] ] ] ),
	$this->Pedir( "Observações", SaldoObs ),
	
	$this->Pular1Linha(2),
	$this->Pedir( "Conduta" ),
"</table>",

"<table id='M' class='tabFormulario' style='display:none'>",
	$this->Pedir( "Medicação<br>Recomendada", Medicacao ),
"</table>",

SelecionarForm();
