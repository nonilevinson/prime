<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Usu�rio",
		[ "", Usuario, "<br>(evite usar espa�os em branco)" ] ),
	$this->Pedir( "Nome" ),
	$this->Pedir( "Email",
		[ "", Email, "<br> (n�o deixe de preencher o email. Com ele, poderemos enviar comunicados)" ] ),
	$this->Pedir( "CRM",
		[ "", CRM, " (se for m�dico)" ] );

	if( $g_acaoAtual == INSERINDO )
	{
		echo
			$this->Pedir( "Senha",
				[ "", Senha, " (at� 20 digitos e de prefer�ncia alfa-num�rica)" . brHtml(1) ] );
	}
	else
		echo $this->NaoPedir( Senha );

	echo
	$this->Pedir( "Grupo de acesso",
		[ "", Grupo, " (obrigat�rio)" ] ),
	$this->Pedir( "Nascimento",
		[ "", Nascimento,
		[ brHtml(4) . "Pode acessar o Portal da Agenda? ", PodeAgenda ] ] ),
	$this->Pedir( "Ativo?",
		[ "", Ativo,
		[ brHtml(4) . "Vers�o ", Versao, "", "", "", "", "FormCalculado" ] ] ),

	$this->Pular1Linha(2),
	$this->Cabecalhos( [ "Emails que receber�", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "Financeiro?", EmailFinan ),
	$this->Pedir( "Acesso ao sistema",
		[ "Di�rio? ", EmailAces,
		[ brHtml(4) . "Semanal? ", EmailAcesS ] ] ),
"</table>
<br>
<table class='tabFormulario'>",
	$this->Cabecalhos( [ "Foto", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "", [ "", Foto, "", "FormValor alinhaMeio", "2" ] ),
"</table>";
