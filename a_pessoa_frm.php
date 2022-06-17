<?php

include( 'endereco_frm.php' );

//----------------------------------------------------------------------------------
function btnWhats() //* mudei o nome porque ele tamb�m existe em endereco_frm
{
	global $g_debugProcesso, $g_regAtual, $g_ehPaciente;
	$teste = false;

	$select = "Select P.NumCelular as Celular
		From arqPessoa P
		Where P.idPrimario = " . $g_regAtual->IDPRIMARIO;
	$celular = tiraBrEsq( tiraBr( sql_lerUmRegistro( $select )->CELULAR ) );
	$whatsapp = str_replace( [ "(", ")", ".", "-", " " ], "", $celular );

	if( $teste && $g_debugProcesso )
	{
		echo '<br><b>GR0 arqPessoa S=</b> '.$select.'<br><b>celular= </b>'.$celular.
			' <b>WhatsApp=</b> '.$whatsapp.' <b>len</b> '.strlen($whatsapp);
	}

	$botao =  "<img src='https://www.swsm.com.br/whatsapp.png' alt='WhatsApp' width='15px' border='0'>";

	if( strlen( $whatsapp ) == 11 )
	{
		$botao = "<a href='https://wa.me/55" . $whatsapp .
			"' target='_blank'><button type='button' style='vertical-align:middle'>" . $botao . "</button></a>";
	}

	return( [ brHtml(2) . $botao ] );
}
//----------------------------------------------------------------------------------

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Nome" ),
	$this->Pedir( "Apelido",
		[ "", Apelido, brHtml(1) . "(ser� usado em emails para evitar SPAM. <b>N�o use caixa alta</b> em todo o apelido)" ] ),
	$this->Pedir( "Celular",
		[ "", NumCelular, btnWhats() ] ),
	$this->Pedir( "Ativo?",
		[ "", Ativo,
		[ brHtml(4) . "Desde ", Desde,
		[ brHtml(4) . "Prontu�rio ", Prontuario ] ] ] ),
	( GrupoAtualEm() ? $this->Pedir( "QtasComple [0]", QtasComple ) : $this->NaoPedir( QtasComple ) ),
"</table>",

CriarForms(
	[ 'Endere�o', 'E', true ],
	[ 'Pessoa F�sica', 'P', true ],
	[ 'Observa��es', 'O', true ] ),

//* Endere�o
"<table id='E' class='tabFormulario' style='display:none'>",
	$this->Pedir( "Email" ),
	$this->Pedir( "Recebe email?", RecEmail ),
	frmEndereco( "E", "Ende_" ),
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
"<table id='O' class='tabFormulario' style='display:none'>",
	$this->Pedir( "M�dia", Midia ),
	$this->Pedir( "Desmarca��es",
		[ "", QtoDesmar, " (quantas desmarca��es, se cliente, efetuou)" ] ),
	$this->Cabecalhos( [ "Observa��es", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "", [ "", Obs, "", "FormValor alinhaMeio", "2" ] ),
"</table>",

SelecionarForm();
