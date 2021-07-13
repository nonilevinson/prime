<?php

include( 'endereco_frm.php' );

$ehPaciente = ultimaLigOpcaoEm( 135 );
$naoPaciente = ultimaLigOpcaoEm( 136 );
$todos  = ultimaLigOpcaoEm( 15 );
// echo '<br><b>OP=</b> '.simNao(ultimaLigOpcaoEm( 15,135 ));

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Nome" ),
	$this->Pedir( "Apelido",
		[ "", Apelido, brHtml(1) . "(ser� usado em emails para evitar SPAM. <b>N�o use caixa alta</b> em todo o apelido)" ] ),
   $this->Pedir( "Pessoa",
      [ "", TPFPJ,
      [ brHtml(4) . "Ativo? ", Ativo,
      [ brHtml(4) . "Desde ", Desde ] ] ] ),
"</table>",

CriarForms(
	[ 'Endere�o', 'E', true ],
	[ 'Pessoa Jur�dica', 'J', $naoPaciente || $todos ],
	[ 'Pessoa F�sica', 'P', true ],
	[ 'Observa��es', 'O', true ] ),

//* Endere�o
"<table id='E' class='tabFormulario' style='display:none'>",
	frmEndereco( "E", "Ende_" ),
"</table>",

//* Dados Juridica
"<table id='J' class='tabFormulario' style='display:none'>",
	$this->Pedir( "CNPJ" ),
	$this->Pedir( "Inscri��o estadual", InscEstad ),
	$this->Pedir( "Inscri��o municipal", InscMunic ),
"</table>",

//* Dados F�sica
"<table id='P' class='tabFormulario' style='display:none'>",
	$this->Pedir( "CPF" ),
	$this->Pedir( "Identidade",
		[ "", Identidade,
		[ brHtml(4) . "Org�o ", Orgao,
		[ brHtml(4) . "Emiss�o ", Emissao ] ] ] ),
"</table>",

//* Observa��es
"<table id='O' class='tabFormulario' style='display:none'>",
	$this->Cabecalhos( [ "Observa��es", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "", [ "", Obs, "", "FormValor alinhaMeio", "2" ] ),
"</table>",

SelecionarForm();
