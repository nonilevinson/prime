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
		[ "", Apelido, brHtml(1) . "(será usado em emails para evitar SPAM. <b>Não use caixa alta</b> em todo o apelido)" ] ),
   $this->Pedir( "Pessoa",
      [ "", TPFPJ,
      [ brHtml(4) . "Ativo? ", Ativo,
      [ brHtml(4) . "Desde ", Desde ] ] ] ),
"</table>",

CriarForms(
	[ 'Endereço', 'E', true ],
	[ 'Pessoa Jurídica', 'J', $naoPaciente || $todos ],
	[ 'Pessoa Física', 'P', true ],
	[ 'Observações', 'O', true ] ),

//* Endereço
"<table id='E' class='tabFormulario' style='display:none'>",
	frmEndereco( "E", "Ende_" ),
"</table>",

//* Dados Juridica
"<table id='J' class='tabFormulario' style='display:none'>",
	$this->Pedir( "CNPJ" ),
	$this->Pedir( "Inscrição estadual", InscEstad ),
	$this->Pedir( "Inscrição municipal", InscMunic ),
"</table>",

//* Dados Física
"<table id='P' class='tabFormulario' style='display:none'>",
	$this->Pedir( "CPF" ),
	$this->Pedir( "Identidade",
		[ "", Identidade,
		[ brHtml(4) . "Orgão ", Orgao,
		[ brHtml(4) . "Emissão ", Emissao ] ] ] ),
"</table>",

//* Observações
"<table id='O' class='tabFormulario' style='display:none'>",
	$this->Cabecalhos( [ "Observações", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "", [ "", Obs, "", "FormValor alinhaMeio", "2" ] ),
"</table>",

SelecionarForm();
