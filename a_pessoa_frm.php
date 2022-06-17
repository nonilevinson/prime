<?php

include( 'endereco_frm.php' );

//----------------------------------------------------------------------------------
function btnWhats() //* mudei o nome porque ele também existe em endereco_frm
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
		[ "", Apelido, brHtml(1) . "(será usado em emails para evitar SPAM. <b>Não use caixa alta</b> em todo o apelido)" ] ),
	$this->Pedir( "Celular",
		[ "", NumCelular, btnWhats() ] ),
	$this->Pedir( "Ativo?",
		[ "", Ativo,
		[ brHtml(4) . "Desde ", Desde,
		[ brHtml(4) . "Prontuário ", Prontuario ] ] ] ),
	( GrupoAtualEm() ? $this->Pedir( "QtasComple [0]", QtasComple ) : $this->NaoPedir( QtasComple ) ),
"</table>",

CriarForms(
	[ 'Endereço', 'E', true ],
	[ 'Pessoa Física', 'P', true ],
	[ 'Observações', 'O', true ] ),

//* Endereço
"<table id='E' class='tabFormulario' style='display:none'>",
	$this->Pedir( "Email" ),
	$this->Pedir( "Recebe email?", RecEmail ),
	frmEndereco( "E", "Ende_" ),
"</table>",

//* Dados Física
"<table id='P' class='tabFormulario' style='display:none'>",
	$this->Pedir( "Nascimento",
		[ "", Nascimento,
		[ brHtml(4) . "Idade ", Idade,
		[ brHtml(4) . "Sexo ", Sexo,
		[ brHtml(4) . "Estado civil ", EstCivil ] ] ] ] ),
	$this->Pedir( "Profissão", Profissao ),
	$this->Pedir( "CPF" ),
	$this->Pedir( "Identidade",
		[ "", Identidade,
		[ brHtml(4) . "Orgão ", Orgao,
		[ brHtml(4) . "Emissão ", Emissao ] ] ] ),
"</table>",

//* Observações
"<table id='O' class='tabFormulario' style='display:none'>",
	$this->Pedir( "Mídia", Midia ),
	$this->Pedir( "Desmarcações",
		[ "", QtoDesmar, " (quantas desmarcações, se cliente, efetuou)" ] ),
	$this->Cabecalhos( [ "Observações", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "", [ "", Obs, "", "FormValor alinhaMeio", "2" ] ),
"</table>",

SelecionarForm();
