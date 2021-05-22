<?php

include( 'endereco_frm.php' );

echo
"<table class='tabFormulario'>";

if( GrupoAtualEm() )
{
	echo
	$this->Cabecalhos( [ "Grupo 0", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "CPF" ),
	$this->Pedir( "Quantidades<br>m�nimas",
		[ "Qtd 1 ", Qtd1,
		[ brHtml(4) . "Qtd 2 ", Qtd2, " (esses campos tem rela��o com os de mesmo nome no WebGest�o/Cobran�a KM)" ] ] ),
	$this->Pedir( "Email de log de acesso para supervisores",
		[ "Di�rio? ", LogAcesso,
		[ brHtml(4) . "Semanal? ", LogAcessoS ] ] ),
	$this->Pular1Linha(2);
}
else
{
	echo
	$this->NaoPedirVarios( CPF, LogAcesso, LogAcessoS, Qtd1, Qtd2 );
}

echo
	$this->Pedir( "Empresa" ),
	$this->Pedir( "CNPJ" ),
	$this->Pedir( "Email" ),
	$this->Pedir( "Site" ),
"</table>",

CriarForms(
	[ 'Endere�o', 'E', true ] ),

"<table class='tabFormulario'>",
	frmEndereco( "E", "Ende_" ),
"</table>";

SelecionarForm();
