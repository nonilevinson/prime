<?php

//* Recebe $p_prefixo = Prefixo dos campos em cada arquivo que contém Endereço

//----------------------------------------------------------------------------------
function btnWhatsApp()
{
	global $g_debugProcesso, $g_regAtual, $g_ehPaciente;
	$teste = false;

	$select = "Select F.Ende_DDDCelular || F.Ende_Celular as Celular
		From arqFornecedor F
		Where F.idPrimario = " . $g_regAtual->IDPRIMARIO;
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

function frmEndereco( $p_inicial, $p_prefixo )
{
	global $g_debugProcesso, $g_arquivoAtual, $g_prefixo, $g_ehPaciente;
	$g_ehPaciente = $g_arquivoAtual->nomeArquivo == 'arqPessoa' ? true : false;
// if( $g_debugProcesso ) echo '<br><b>GR0 ARQUIVOATAUL=</b> '.$g_arquivoAtual->nomeArquivo.' <b>g_ehPaciente?</b> '.simNao($g_ehPaciente);

	echo javaScriptSrc( LANCE_JS . 'lance_ajax.js' );

	$prefixo = $g_prefixo;
	$g_prefixo .= $p_prefixo;

	$tela =
		$g_arquivoAtual->Pedir( "CEP",
			[ "", "CEP", [ brHtml(3) . botaoCep(
				$g_prefixo . "CEP",
				"",
				$g_prefixo . "Endereco",
				$g_prefixo . "Bairro_Bairro",
				$g_prefixo . "Cidade_Cidade",
				$g_prefixo . "Cidade_UF",
				'',
				'Buscar Cep' ) .
			"(este serviço depende dos Correios. Caso caia, digite as informações do endereço)" ] ] ) .

		$g_arquivoAtual->Pedir( "Endereço", Endereco ) .
		$g_arquivoAtual->Pedir( "Bairro", Bairro ) .
		$g_arquivoAtual->Pedir( "Estado",
			[ '', Cidade_UF,
			[ brHtml(4) . 'Cidade', Cidade ] ] ) .
		$g_arquivoAtual->Pedir( "Telefones",
			[ "", "DDD",
			[ brHtml(2), Telefone ] ] ) .

		( $g_ehPaciente
			? $g_arquivoAtual->NaoPedirVarios( Celular, WhatsApp )
			: $g_arquivoAtual->Pedir( "Celular",
				[ "", DDDCelular,
				[ brHtml(2), Celular,
				[ brHtml(4) . "WhatsApp? ", WhatsApp, btnWhatsApp() ] ] ] ) );

// echo '<br>tela= '.$tela;
	$g_prefixo = $prefixo;
	return( $tela );
}

