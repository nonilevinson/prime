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
		"<br>Temos alguns v�deos tutoriais do WebFidelidade, que tem o mesmo conceito do seu sistema:<br>
		Criar e programar uma a��o pontual com uma imagem - <a href='" . EMAIL_UMA_IMAGEM . "' target='_blank'><font color='black'>clique aqui</font></a><br>
		Criar e programar uma a��o pontual com um texto e uma imagem - <a href='" . EMAIL_IMAGEM_TEXTO . "' target='_blank'><font color='black'>clique aqui</font></a><br>
		Criar e programar uma a��o autom�tica para aniversariantes - <a href='" . EMAIL_ANIVERSARIANTE . "' target='_blank'><font color='black'>clique aqui</font></a><br>

		<br>Voc� pode criar a a��o pelo sistema ou fora dele. Para criar pelo sistema, deixe o campo \"Tipo da a��o\" como \"Interno\" e digite o texto no<br> campo espec�fico. Se souber escrever a mensagem em c�digo HTML ou se tiver algu�m que o fa�a, informe \"Externo\" no campo<br> \"Tipo da a��o\" e utilize o campo \"Arquivo Externo\" que aparecer�, para publicar o arquivo.<br>
		<br>
		Existem algumas possibilidades de personalizar as mensagens, como colocar o nome do cliente ou seu apelido e vari��es de<br> g�nero de acordo com o sexo. Quando se quiser inserir um dos campos disponiveis, voc� deve usar uma regra b�sica de informar<br> o nome do campo entre [[e]], no texto da mensagem ou no seu t�tulo, exatamente conforme as op��es abaixo.<br>
		<br>
		Nome >> [[NOME]] &nbsp;&nbsp;&nbsp;&nbsp;Apelido >> [[APELIDO]] &nbsp;&nbsp;&nbsp;&nbsp;

		<br>
		Artigo definido em min�sculo: singular &nbsp; \"o ou a\" >> [[_ART_DEF_S_MIN]] &nbsp;&nbsp;&nbsp;&nbsp;plural &nbsp; \"os ou as\" >> [[_ART_DEF_P_MIN]]<br>
		Artigo definido em mai�sculo: singular &nbsp; \"O ou A\" >> [[_ART_DEF_S_MAI]] &nbsp;&nbsp;&nbsp;&nbsp;plural &nbsp; \"Os ou As\" >> [[_ART_DEF_P_MAI]]<br>
		Artigo indefinido em min�sculo: singular &nbsp; \"um ou uma\" >> [[_ART_IND_S_MIN]] &nbsp;&nbsp;&nbsp;&nbsp;plural &nbsp; \"uns ou umas\" >> [[_ART_IND_P_MIN]]<br>
		Artigo indefinido em mai�sculo: singular &nbsp; \"Um ou Uma\" >> [[_ART_IND_S_MAI]] &nbsp;&nbsp;&nbsp;&nbsp;plural &nbsp; \"Uns ou Umas\" >> [[_ART_IND_P_MAI]]<br>
		<br>
		Para ter sauda��o do tipo bom dia ou Bom dia<br>
		Em min�sculas: [[SAUDACAO_MIN]] e em ma��sculas: [[SAUDACAO_MAI]]<br>
		<br>
		Para sauda��es, como por exemplo \"bom dia\" ou \"Bom dia\", use respectivamente [[SAUDACAO_MIN]] e [[SAUDACAO_MAI]].<br>
		O sistema considera de 6h �s 11:59h, dia; das 12h �s 17:59h, tarde e das 19h �s 05:59h, noite.<br>
		<br>
		Para inserir uma imagem, publique-a pelo campo espec�fico na parte de baixo desta tela e use [[IMAGEM]]<br>
		Para inserir mais de uma imagem, ap�s gravar a a��o, no menu de navega��o clique em Imagens e inclua quantas quiser.<br> No texto da a��o use [[IMAGEM_nn]] (nn � o n�mero que voc� informou para a imagem) para cada uma das imagens.<br>
		<br>",
		"FormCab alinhaMeio", "2" ] ),

	$this->Pedir( "Assunto do email",
		[ "", Titulo, "<br>" . brHtml(1) . "<b>Aten��o!!!</b> (para evitar <b>SPAM</b> evite que tenha mais de 50 caracteres e termos de baixa reputa��o (promo��o, imperd�vel, cr�dito, etc),<br>" . brHtml(1) . "n�o use acentos gr�ficos (!, ?) e <b>nunca, nunca use caixa alta em toda uma palavra</b>)" ] ),
	$this->Pedir( "Vers�o",
		[ "", Versao, brHtml(2) . "A informa��o deste campo n�o sair� no email" ] ),
	$this->Pedir( "Ativa? ",
		[ "", Ativo,
		[ brHtml(8) . "Testes enviados ", QtdTeste, brHtml(2) . "(m�ximo de 20)", "", "", "", "FormCalculado" ] ] ),
	$this->Pedir( "Autom�tica?",
		[ "", PadraoAcao, brHtml(2) . "Opcional, se quiser que seja uma a��o automatizada" ] ),
	$this->Pedir( "Template",
		[ "", Template, brHtml(2) . "Opcional. Template � a imagem de fundo da a��o" ] ),

	$this->Pedir( "Tipo da a��o",
		[ "", TipoAcao, brHtml(4) . "Informe se a a��o ter� texto e se este foi criado externamente ao sistema ou n�o" ] ),
"</table>",
"<br/>",

"<table class='tabFormulario'", Display( 'tblNada', $nada /*$tipoAcao == 1*/ ), ">",
	$this->Cabecalhos( [ "Se a a��o tiver texto interno ou externo, este<br>&nbsp;campo aparecer� ap�s a sele��o do Tipo da a��o&nbsp", "FormCab alinhaMeio", "2" ] ),
"</table>",

"<table class='tabFormulario'", Display( 'tblInterno', $interno /*$tipoAcao == 2*/ ), ">",
	$this->Cabecalhos( [ "Texto para a��es feitas no sistema", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "", [ "", Html, "", "FormValor alinhaMeio", "2" ] ),
"</table>",

"<table class='tabFormulario'", Display( 'tblExterno', $externo /*$tipoAcao == 3*/ ), ">",
	$this->Cabecalhos( [ "Arquivo externo", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir(
		"<br>Clique no bot�o Upload, uma janela ser� aberta, clique ".
		" em Procurar, na janela<br/> do sistema operacional ache o arquivo desejado, ".
		"marque-o e clique em Abrir,<br/> o sistema voltar� para a janela de Upload de Arquivo, ".
		"clique agora em Enviar<br/> e o sistema voltar� a tela principal indicando que um arquivo ".
		"foi enviado.<br/> Atente, que o arquivo s� ser� realmente gravado quando voc� clicar em Gravar.&nbsp;",
		Arquivo ),
"</table>
<table><tr><td>&nbsp;</td></tr></table>
<table class='tabFormulario'>",
	$this->Pedir( "Imagem" ),
	$this->Pedir( "Link",
		[ "", Link, "<br>" . brHtml(1) . "(opcional, se quiser um link para a imagem. � preciso <b>usar http://</b> na sintaxe. Por exemplo: http://www.suaempresa.com.br)" ] ),
	$this->Pedir( "Tag Alt",
		[ "", ImagemAlt, "<br>" . brHtml(1) . "(informe um texto para aparecer enquanto a imagem � carregada no email ou o mouse ficar sobre ela.<br>" . brHtml(1) . "Este texto ajudar� a evitar que o email seja qualificado como <b>SPAM</b>)" ] ),
"</table>";
