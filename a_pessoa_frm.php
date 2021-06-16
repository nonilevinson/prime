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
		[ "", Apelido, brHtml(1) . "(ser� usado em emails para evitar SPAM. <b>N�o use caixa alta</b> em todo o apelido)" ] );

	if( $ehPaciente )
	{
		echo
		$this->NaoPedir( TPessoa, 2 ),
		$this->NaoPedir( TPFPJ, 1 ),
		$this->Pedir( "Ativo?",
			[ "", Ativo,
			[ brHtml(4) . "Desde ", Desde,
			[ brHtml(4) . "Prontu�rio ", Prontuario, '','','','','FormCalculado' ] ] ] );
	}
	else
	{
		echo
		$this->NaoPedir( Prontuario ),
		$this->Pedir( "Tipo",
			[ "", TPessoa,
			[ brHtml(4) . "Pessoa ", TPFPJ,
			[ brHtml(4) . "Ativo? ", Ativo,
			[ brHtml(4) . "Desde ", Desde ] ] ] ] );
	}

echo
"</table>",

CriarForms(
	[ 'Endere�o', 'E', true ],
	[ 'Pessoa Jur�dica', 'J', $naoPaciente || $todos ],
	[ 'Pessoa F�sica', 'P', true ],
	[ 'Observa��es', 'O', true ] ),

//* Endere�o
"<table id='E' class='tabFormulario' style='display:none'>",
	$this->Pedir( "Email" ),
	$this->Pedir( "Recebe email?", RecEmail ),
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
	$this->Pedir( "Nascimento",
		[ "", Nascimento,
		[ brHtml(4) . "Idade ", Idade,
		[ brHtml(4) . "Sexo ", Sexo,
		[ brHtml(4) . "Estado civil ", EstCivil ] ] ] ] ),
	$this->Pedir( "Profiss�o", Profissao ),
	$this->Pedir( "CPF" ),
	$this->Pedir( "Identidade",
		[ "", Identidade,
		[ brHtml(4) . "Org�o ", Orgao,
		[ brHtml(4) . "Emiss�o ", Emissao ] ] ] ),
"</table>",

//* Observa��es
"<table id='O' class='tabFormulario' style='display:none'>";

	if( $ehPaciente || $todos )
	{
		echo
		$this->Pedir( "M�dia", Midia ),
		$this->Pedir( "Desmarca��es",
			[ "", QtoDesmar, " (quantas desmarca��es, se cliente, efetuou)" ] );
	}
	else
	{
		echo
		$this->NaoPedirVarios( Midia, QtoDesmar );
	}

	echo
	$this->Cabecalhos( [ "Observa��es", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "", [ "", Obs, "", "FormValor alinhaMeio", "2" ] ),
"</table>",

SelecionarForm();
