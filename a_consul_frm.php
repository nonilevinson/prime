<?php

global $g_debugProcesso, $g_acaoAtual;

echo
"<table class='tabFormulario'>";

	if( GrupoAtualEm() )
		echo $this->Pedir( "TiConsulta" );
	else
		echo $this->NaoPedir( TiConsulta, 1 );

//* form para TiConsulta = Tratamento
if( ultimaLigOpcaoEm( 109,110,117,276 ) )
{
	if( $g_acaoAtual == INSERINDO )
	{
		echo
		$this->NaoPedir( Num ),
		$this->Pedir( "Consulta N�",
			[ " ", '',
			[ "(ser� atribuido pelo sistema )" . brHtml(2) . "Data ", Data,
			[ brHtml(2) . "Hora ", Hora,
         [ " h " . brHtml(2) . "Chegada ", HoraChega, " h",'','','','FormCalculado' ] ] ] ] );

	}
	else
	{
		echo $this->Pedir( "Consulta N�",
         [ '', Num,
         [ brHtml(4) . "Data ", Data,
         [ brHtml(4) . "Hora ", Hora,
         [ " h" . brHtml(3) . "Chegada ", HoraChega, " h",'','','','FormCalculado' ] ] ], '', '','', 'FormCalculado' ] );
	}
	
   echo
	$this->Pedir( "Status",
		[ "", TStCon,
		[ brHtml(4) . "Tipo ", TiAgenda ] ] ),
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Paciente", Pessoa_Nome ),
   $this->Pedir( " ",
      [ "Celular ", Pessoa_NumCelular,
      [ "", Pessoa,
		[ brHtml(4) . "Prontu�rio ", Prontuario ] ] ] ),
   $this->Pedir( "M�dico", Medico ),
   $this->Pedir( "Assessor" ),
	$this->Pedir( "Call center", CallCenter ),

	$this->Pular1Linha(2),
	$this->Pedir( "Cortesia?", Cortesia ),
	$this->Pedir( "1� Valor",
		[ "", Valor,
		[ brHtml(4) . "Forma de pagamento ", FormaPg ] ] ),
	$this->Pedir( "2� Valor",
		[ "", Valor2,
		[ brHtml(4) . "Forma de pagamento ", FormaPg2 ] ] ),
	$this->Pedir( " ",
		[ "Conta ", ContaCons, " (o sistema preencher� esse campo)", '','','','FormCalculado' ] ),
	
	$this->Pular1Linha(2),
	$this->Pedir( "Medica��o",
	[ "Quantidades: Prescrita ", TrgQtdM,
	[ brHtml(4) . "Separada/Entregue ", TrgQtdMEnt,
	[ brHtml(4) . "Saldo ", Saldo ] ] ] ),
	"</table>",
	
	CriarForms(
		[ 'Observa��es', 'O', true ],
		[ 'Atual', 'A', true ],
		[ 'Conduta', 'C', true ],
		[ 'Medica��o', 'M', true ] ),

	"<table id='O' class='tabFormulario' style='display:none'>",
		$this->Cabecalhos( [ "Observa��es", 'FormCab alinhaMeio', '2' ] ),
		$this->Pedir( "", [ "", Obs, '', 'FormValor alinhaMeio', '2' ] ),
	"</table>",

	"<table id='A' class='tabFormulario' style='display:none'>",
		$this->Pedir( "Motivo", TMotivo ),
		$this->Pedir( "Medica��o<br>atual", MedicaAtua ),
	"</table>",

	//* inicio Conduta
	"<table id='C' class='tabFormulario' style='display:none'>",
		$this->Cabecalhos( [ "Tratamento", 'FormCab alinhaEsq', '2' ] ),
		$this->Pedir( "Plano de tratamento", PTrata ),
		$this->Pedir( "Valor do tratamento",
			[ "", ValPTrata,
			[ brHtml(4) . "Conta ", ContaPTra, " (o sistema preencher� esse campo)", '','','','FormCalculado' ] ] ),

		//* Entrada
		$this->Cabecalhos( [ "Entrada - pago no p�s consulta", "FormCabPrime FundoAzul alinhaEsq", "2" ] ),
		$this->Pedir( "Valor",
			[ "Valor ", EntraVal,		
			[ brHtml(4) . "Forma de pagamento ", EntraFPg,
			[ brHtml(4) . "Parcelas ", EntraParcE,
			[ brHtml(4) . "M�nimo ", BoletoMin, ' (para Saldo por boleto)','','','','FormCalculado' ] ] ] ] ),

		//* se dividiu a entrada
		$this->Pedir( " ",
			[ "Se dividiu a entrada", "", "", "FormCabPrime FundoAzul alinhaEsq" ] ),
		$this->Pedir( " ",
			[ "Valor ", EntraTotP,
			[ brHtml(4) . "Forma de pagamento ", SdEntrFPg,
			[ brHtml(4) . "Parcelas ", EntraParc ] ] ] ),
		$this->Pedir( " ",
			[ "Total ", EntraTotal, "(da Entrada)" ] ),

		$this->Pedir( "Observa��es", EntraObs ),
		
		//* Intermedi�rias
		$this->Cabecalhos( [ "Intermedi�rias - pago no p�s consulta", "FormCabPrime FundoLJ alinhaEsq", "2" ] ),

		$this->Cabecalhos( [ "Saldo - a pagar na retirada da medica��o", "FormCabPrime FundoVerde alinhaEsq", "2" ] ),
		$this->Pedir( "Forma de pagamento",
			[ "", SaldoFPg,
			[ brHtml(4) . "Parcelas ", SaldoParc,
			[ brHtml(4) . "Condi��o ", SaldoCond ] ] ] ),
		$this->Pedir( "Observa��es", SaldoObs ),

		$this->Pular1Linha(2),
		$this->Cabecalhos( [ "Conduta - transcreva o que o m�dico escreveu na ficha do paciente", 'FormCab alinhaMeio', '2' ] ),
		$this->Pedir( "Conduta" ),
	"</table>",
	//* fim Conduta

	"<table id='M' class='tabFormulario' style='display:none'>",
		$this->Cabecalhos( [ "Transcreva o que o m�dico escreveu na ficha do paciente", 'FormCab alinhaMeio', '2' ] ),
		$this->Pedir( "Medica��o<br>Recomendada", Medicacao ),
	"</table>";
}
else //* para nutricionista ou psicologo
{
	if( $g_acaoAtual == INSERINDO )
	{
		echo
		$this->NaoPedir( Num ),
		$this->Pedir( "Consulta N�",
			[ " ", '',
			[ "(ser� atribuido pelo sistema )" . brHtml(2) . "Data ", Data,
			[ brHtml(2) . "Hora ", Hora,
         [ " h " . brHtml(2) . "Chegada ", HoraChega, " h",'','','','FormCalculado' ] ] ] ] );

	}
	else
		echo $this->Pedir( "Consulta N�",
         [ '', Num,
         [ brHtml(4) . "Data ", Data,
         [ brHtml(4) . "Hora ", Hora,
         [ " h" . brHtml(3) . "Chegada ", HoraChega, " h",'','','','FormCalculado' ] ] ], '', '','', 'FormCalculado' ] );

   echo
	$this->Pedir( "Status",
		[ "", TStCon,
		[ brHtml(4) . "Tipo ", TiAgenda ] ] ),
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Paciente", Pessoa_Nome ),
   $this->Pedir( " ",
      [ "Celular ", Pessoa_NumCelular,
      [ "", Pessoa,
		[ brHtml(4) . "Prontu�rio ", Prontuario ] ] ] ),
   $this->Pedir( "M�dico", Medico ),
	$this->Pedir( "Call center", CallCenter ),

	$this->NaoPedirVarios( Assessor, Cortesia, Valor, FormaPg, Valor2, FormaPg2, ContaCons,
		TMotivo, MedicaAtua, PTrata, ValPTrata, ContaPTra, EntraFPg, EntraVal, EntraParcE, BoletoMin,
		EntraParc, SdEntrFPg, EntraValP, EntraTotP, EntraTotal, EntraObs, SaldoFPg,
		SaldoParc, SaldoCond, SaldoObs, Conduta, Medicacao, TrgQtdM, TrgQtdMEnt, Saldo ),
"</table>",

CriarForms(
	[ 'Observa��es', 'O', true ] ),

"<table id='O' class='tabFormulario' style='display:none'>",
	$this->Cabecalhos( [ "Observa��es", 'FormCab alinhaMeio', '2' ] ),
	$this->Pedir( "", [ "", Obs, '', 'FormValor alinhaMeio', '2' ] ),
"</table>";
}

SelecionarForm();
