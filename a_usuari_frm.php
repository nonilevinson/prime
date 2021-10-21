<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Usuário",
		[ "", Usuario, "<br>(evite usar espaços em branco)" ] ),
	$this->Pedir( "Nome" ),
	$this->Pedir( "Email",
		[ "", Email, "<br> (não deixe de preencher o email. Com ele, poderemos enviar comunicados)" ] ),
	$this->Pedir( "CRM",
		[ "", CRM, " (se for médico)" ] );

	if( $g_acaoAtual == INSERINDO )
	{
		echo
			$this->Pedir( "Senha",
				[ "", Senha, " (até 20 digitos e de preferência alfa-numérica)" . brHtml(1) ] );
	}
	else
		echo $this->NaoPedir( Senha );

	echo
	$this->Pedir( "Grupo de acesso",
		[ "", Grupo, " (obrigatório)" ] ),
	$this->Pedir( "Nascimento",
		[ "", Nascimento,
		[ brHtml(4) . "Pode acessar o Portal da Agenda? ", PodeAgenda ] ] ),
	$this->Pedir( "Ativo?",
		[ "", Ativo,
		[ brHtml(4) . "Versão ", Versao, "", "", "", "", "FormCalculado" ] ] ),

	$this->Pular1Linha(2),
	$this->Cabecalhos( [ "Emails que receberá", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "Financeiro?", EmailFinan ),
	$this->Pedir( "Acesso ao sistema",
		[ "Diário? ", EmailAces,
		[ brHtml(4) . "Semanal? ", EmailAcesS ] ] ),
"</table>
<br>
<table class='tabFormulario'>",
	$this->Cabecalhos( [ "Foto", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "", [ "", Foto, "", "FormValor alinhaMeio", "2" ] ),
"</table>";
