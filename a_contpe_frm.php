<?php

//----------------------------------------------------------------------------------
function btnCopiar( $p_nome )
{
	return( brHtml(1) . "<button class='btnCopiar' style='vertical-align:top' idCampo='" .
		$p_nome . "'><img src='" . LANCE_GIF . "/copy.png' style='width:13px'></button>" );
}

//----------------------------------------------------------------------------------
function btnWhatsApp()
{
	global $g_debugProcesso, $g_regAtual;
	$teste = false;

	$select = "Select C.Celular
		From arqContPessoa C
		Where C.idPrimario = " . $g_regAtual->IDPRIMARIO;
	$celular  = tiraBrEsq( tiraBr( sql_lerUmRegistro( $select )->CELULAR ) );
	$whatsapp = str_replace( [ "(", ")", ".", "-", " " ], "", $celular );

	if( $teste && $g_debugProcesso )
	{
		echo '<br><b>GR0 arqContPessoa S=</b> '.$select.'<br><b>celular= </b>'.$celular.
			' <b>WhatsApp=</b> '.$whatsapp.' <b>len</b> '.strlen($whatsapp);
	}

	$botao =  "<img src='https://www.swsm.com.br/whatsapp.png' alt='WhatsApp' width='15px' border='0'>";

	if( in_array( strlen( $whatsapp ), [11,12] ) )
	{
		$botao = "<a href='https://wa.me/55" . $whatsapp .
			"' target='_blank'><button type='button' style='vertical-align:middle'>" . $botao . "</button></a>";
	}

	return( [ brHtml(2) . $botao ] );
}
//----------------------------------------------------------------------------------

echo
"<table class='tabFormulario' >";

	if( ultimaLigOpcaoEm( 143 ) )
	{
		echo
		$this->Pedir( "Fornecedor" );
	}
	else
	{
		echo
		$this->Pedir( "Pessoa" );
	}

	echo
	$this->Pedir( "Nome" ),
	$this->Pedir( "Apelido" ),
	$this->Pedir( "Função", Funcao ),
	$this->Pedir( "Celular",
		[ "", Celular, btnWhatsApp() ] ),
	$this->Pedir( "Telefones", Telefone ),
	$this->Pedir( "Email",
		[ "", Email, btnCopiar( "Email" ) ] ),
	$this->Pedir( "Recebe?", RecEmail ),
	$this->Pedir( 'Nascimento',
		[ '', Nascimento,
		[ brHtml(6) . 'Sexo ', Sexo,
		[ brHtml(10) . "Ativo? ", Ativo ] ] ]  ),
	$this->Cabecalhos( [ "Observações", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "", [ "", Obs, "", "FormValor alinhaMeio", "2" ] ),
"</table>";

echo
	javaScriptIni(),  "
	// Os campos View são protegidos contra copia, document.execCommand('copy'),
	// por isso, salvamos o valor REAL de Funcao, usamos o Funcao para forçar o copy
	// e depois restauramos o valor de Funcao

	function copiarDado( p_quem ) {
		let campoCopiado = document.getElementById( p_quem );
		let campoFuncao = document.getElementById('Funcao');
		let valorRealFuncao = campoFuncao.value;
		campoFuncao.value = campoCopiado.value;
		campoFuncao.select();
		campoFuncao.setSelectionRange(0, campoCopiado.value.length);
		let result = document.execCommand('copy');
		campoFuncao.value = valorRealFuncao;
		campoCopiado.focus();
	}

	const buttons = document.getElementsByClassName( 'btnCopiar' );
	for( let i=0; i<buttons.length; i++ )
	{
		let umButton = buttons[i];
		const idCampo = umButton.getAttribute( 'idCampo' );
		umButton.addEventListener( 'click', (event) => {
			copiarDado( idCampo );
			event.preventDefault();
			event.stopPropagation();

			return( false );
		});
	};
	", javaScriptFim();
