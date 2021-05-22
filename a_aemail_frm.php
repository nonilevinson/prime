<?php

include_once( 'J:/www.lanceweb.com.br/lanceweb/index_tutorial.php' );

global $g_acaoAtual;
$tipoAcao = $this->ValorAtual( TipoAcao );
$tipoAcao = $tipoAcao == 0 ? 1 : $this->ValorAtual( TipoAcao );
$nada     = $tipoAcao == 1 ? true : false;
$interno  = $tipoAcao == 2 ? true : false;
$externo  = $tipoAcao == 3 ? true : false;

echo
"<table class='tabFormulario'>",
	$this->Cabecalhos( [ "Tutorial", "FormCab alinhaMeio", "2" ] ),
	$this->Cabecalhos( [
		"<br>Temos alguns vídeos tutoriais do WebFidelidade, que tem o mesmo conceito do seu sistema:<br>
		Criar e programar uma ação pontual com uma imagem - <a href='" . EMAIL_UMA_IMAGEM . "' target='_blank'><font color='black'>clique aqui</font></a><br>
		Criar e programar uma ação pontual com um texto e uma imagem - <a href='" . EMAIL_IMAGEM_TEXTO . "' target='_blank'><font color='black'>clique aqui</font></a><br>
		Criar e programar uma ação automática para aniversariantes - <a href='" . EMAIL_ANIVERSARIANTE . "' target='_blank'><font color='black'>clique aqui</font></a><br>

		<br>Você pode criar a ação pelo sistema ou fora dele. Para criar pelo sistema, deixe o campo \"Tipo da ação\" como \"Interno\" e digite o texto no<br> campo específico. Se souber escrever a mensagem em código HTML ou se tiver alguém que o faça, informe \"Externo\" no campo<br> \"Tipo da ação\" e utilize o campo \"Arquivo Externo\" que aparecerá, para publicar o arquivo.<br>
		<br>
		Existem algumas possibilidades de personalizar as mensagens, como colocar o nome do cliente ou seu apelido e varições de<br> gênero de acordo com o sexo. Quando se quiser inserir um dos campos disponiveis, você deve usar uma regra básica de informar<br> o nome do campo entre [[e]], no texto da mensagem ou no seu título, exatamente conforme as opções abaixo.<br>
		<br>
		Nome >> [[NOME]] &nbsp;&nbsp;&nbsp;&nbsp;Apelido >> [[APELIDO]] &nbsp;&nbsp;&nbsp;&nbsp;

		<br>
		Artigo definido em minúsculo: singular &nbsp; \"o ou a\" >> [[_ART_DEF_S_MIN]] &nbsp;&nbsp;&nbsp;&nbsp;plural &nbsp; \"os ou as\" >> [[_ART_DEF_P_MIN]]<br>
		Artigo definido em maiúsculo: singular &nbsp; \"O ou A\" >> [[_ART_DEF_S_MAI]] &nbsp;&nbsp;&nbsp;&nbsp;plural &nbsp; \"Os ou As\" >> [[_ART_DEF_P_MAI]]<br>
		Artigo indefinido em minúsculo: singular &nbsp; \"um ou uma\" >> [[_ART_IND_S_MIN]] &nbsp;&nbsp;&nbsp;&nbsp;plural &nbsp; \"uns ou umas\" >> [[_ART_IND_P_MIN]]<br>
		Artigo indefinido em maiúsculo: singular &nbsp; \"Um ou Uma\" >> [[_ART_IND_S_MAI]] &nbsp;&nbsp;&nbsp;&nbsp;plural &nbsp; \"Uns ou Umas\" >> [[_ART_IND_P_MAI]]<br>
		<br>
		Para ter saudação do tipo bom dia ou Bom dia<br>
		Em minúsculas: [[SAUDACAO_MIN]] e em maíúsculas: [[SAUDACAO_MAI]]<br>
		<br>
		Para saudações, como por exemplo \"bom dia\" ou \"Bom dia\", use respectivamente [[SAUDACAO_MIN]] e [[SAUDACAO_MAI]].<br>
		O sistema considera de 6h às 11:59h, dia; das 12h às 17:59h, tarde e das 19h às 05:59h, noite.<br>
		<br>
		Para inserir uma imagem, publique-a pelo campo específico na parte de baixo desta tela e use [[IMAGEM]]<br>
		Para inserir mais de uma imagem, após gravar a ação, no menu de navegação clique em Imagens e inclua quantas quiser.<br> No texto da ação use [[IMAGEM_nn]] (nn é o número que você informou para a imagem) para cada uma das imagens.<br>
		<br>",
		"FormCab alinhaMeio", "2" ] ),

	$this->Pedir( "Assunto do email",
		[ "", Titulo, "<br>" . brHtml(1) . "<b>Atenção!!!</b> (para evitar <b>SPAM</b> evite que tenha mais de 50 caracteres e termos de baixa reputação (promoção, imperdível, crédito, etc),<br>" . brHtml(1) . "não use acentos gráficos (!, ?) e <b>nunca, nunca use caixa alta em toda uma palavra</b>)" ] ),
	$this->Pedir( "Versão",
		[ "", Versao, brHtml(2) . "A informação deste campo não sairá no email" ] ),
	$this->Pedir( "Ativa? ",
		[ "", Ativo,
		[ brHtml(8) . "Testes enviados ", QtdTeste, brHtml(2) . "(máximo de 20)", "", "", "", "FormCalculado" ] ] ),
	$this->Pedir( "Automática?",
		[ "", PadraoAcao, brHtml(2) . "Opcional, se quiser que seja uma ação automatizada" ] ),
	$this->Pedir( "Template",
		[ "", Template, brHtml(2) . "Opcional. Template é a imagem de fundo da ação" ] ),

	$this->Pedir( "Tipo da ação",
		[ "", TipoAcao, brHtml(4) . "Informe se a ação terá texto e se este foi criado externamente ao sistema ou não" ] ),
"</table>",
"<br/>",

"<table class='tabFormulario'", Display( 'tblNada', $nada /*$tipoAcao == 1*/ ), ">",
	$this->Cabecalhos( [ "Se a ação tiver texto interno ou externo, este<br>&nbsp;campo aparecerá após a seleção do Tipo da ação&nbsp", "FormCab alinhaMeio", "2" ] ),
"</table>",

"<table class='tabFormulario'", Display( 'tblInterno', $interno /*$tipoAcao == 2*/ ), ">",
	$this->Cabecalhos( [ "Texto para ações feitas no sistema", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "", [ "", Html, "", "FormValor alinhaMeio", "2" ] ),
"</table>",

"<table class='tabFormulario'", Display( 'tblExterno', $externo /*$tipoAcao == 3*/ ), ">",
	$this->Cabecalhos( [ "Arquivo externo", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir(
		"<br>Clique no botão Upload, uma janela será aberta, clique ".
		" em Procurar, na janela<br/> do sistema operacional ache o arquivo desejado, ".
		"marque-o e clique em Abrir,<br/> o sistema voltará para a janela de Upload de Arquivo, ".
		"clique agora em Enviar<br/> e o sistema voltará a tela principal indicando que um arquivo ".
		"foi enviado.<br/> Atente, que o arquivo só será realmente gravado quando você clicar em Gravar.&nbsp;",
		Arquivo ),
"</table>
<table><tr><td>&nbsp;</td></tr></table>
<table class='tabFormulario'>",
	$this->Pedir( "Imagem" ),
	$this->Pedir( "Link",
		[ "", Link, "<br>" . brHtml(1) . "(opcional, se quiser um link para a imagem. É preciso <b>usar http://</b> na sintaxe. Por exemplo: http://www.suaempresa.com.br)" ] ),
	$this->Pedir( "Tag Alt",
		[ "", ImagemAlt, "<br>" . brHtml(1) . "(informe um texto para aparecer enquanto a imagem é carregada no email ou o mouse ficar sobre ela.<br>" . brHtml(1) . "Este texto ajudará a evitar que o email seja qualificado como <b>SPAM</b>)" ] ),
"</table>";
