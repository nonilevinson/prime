<?php

include( 'endereco_frm.php' );

echo
"<table class='tabFormulario'>";

if( GrupoAtualEm() )
{
	echo
	$this->Cabecalhos( [ "Grupo 0", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "CPF" ),
	$this->Pedir( "Quantidades<br>mínimas",
		[ "Qtd 1 ", Qtd,
		[ brHtml(4) . "Qtd 2 ", Qtd2, " (esses campos tem relação com os de mesmo nome no WebGestão/Cobrança KM)" ] ] ),
	$this->Pedir( "Email de log de acesso para supervisores",
		[ "Diário? ", LogAcesso,
		[ brHtml(4) . "Semanal? ", LogAcessoS ] ] ),
	$this->Pular1Linha(2);
}
else
{
	echo
	$this->NaoPedirVarios( CPF, LogAcesso, LogAcessoS, Qtd, Qtd2 );
}

echo
	$this->Pedir( "Empresa" ),
	$this->Pedir( "CNPJ" ),
	$this->Pedir( "Email" ),
	$this->Pedir( "Site" ),
	$this->Pular1Linha(2),
"</table>",

CriarForms(
	[ 'Consultas', 'C', true ],
	[ 'Financeiro', 'F', true ],
	[ 'Endereço', 'E', true ] ),

//* Consultas
"<table id='C' class='tabFormulario' style='display:none'>",
	$this->Pedir( "Desmarcações",
		[ "", QtasDesmar, " (quantas desmarcações um paciente pode efetuar)" ] ),
	$this->Pedir( "Declinar",
		[ "", Declinar, " % (qual a taxa percentual mensal que um médico pode declinar de pacientes)" ] ),
"</table>",

//* Financeiro
"<table id='F' class='tabFormulario' style='display:none'>",
	$this->Pedir( "Dia para criação automática<br>das contas recorrentes",
		[ "", RecorDia, " (deixe zero, se não quiser usar a rotina automática)" ] ),
"</table>",

"<table id='E' class='tabFormulario' style='display:none'>",
	frmEndereco( "E", "Ende_" ),
"</table>";

SelecionarForm();
