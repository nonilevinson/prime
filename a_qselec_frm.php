<?php

$op = ultimaLigOpcao();

echo 	"<table class='tabFormulario'>";

if( $op == 19 ) //* envio de teste de a��o de email
{
	echo
	$this->Pedir( "Destinat�rio",
		[ "", Cadeia100, "<br>(obrigat�rio)" ] ),
	$this->Pedir( "Pessoa",
		[ "", Cliente, "<br>" . brHtml(1) . "O teste usar� os dados deste cliente para montar a a��o. O email <b>N�O</b> ser� enviado a ele." ] ),
	$this->Pedir( "Remetente", EmailRemet );
}

if( $op == 28 ) //* relat�rio log acesso
{
	echo
	$this->Pedir( "Usu�rio", Usuario ),
	$this->Pedir( "Opera��o", StatusLog ),
	$this->Pedir( "IdPrimario do registro", Gran13 ),
	$this->Pedir( "Entre as datas",
		[ "", DataIni,
		[ brHtml(1) . "e ", DataFim ] ] ),
	$this->Pedir( "Entre o hor�rio",
		[ "", HoraIni,
		[ brHtml(1) . "e ", HoraFim ] ] );
}

if( $op == 38 )
{
	echo
	$this->Pedir( "Entre os avisos",
		[ "", Gran6,
		[ brHtml(1) . "e ", Gran6Fim, "" ] ] ),
	$this->Pedir( "Entre as datas",
		[ "", DataIni,
		[ brHtml(1) . "e ", DataFim ] ] );
}

if( $op == 39 ) //* relat�rio de avisos lidos
{
	echo
	$this->Pedir( "Entre os avisos",
		[ "", Gran6,
		[ brHtml(1) . "e ", Gran6Fim, "" ] ] ),
	$this->Pedir( "Usu�rio", Usuario ),
	$this->Pedir( "Entre as datas",
		[ "", DataIni,
		[ brHtml(1) . "e ", DataFim ] ] ),
	$this->Pedir( "Lidos entre",
		[ "", DataIni1,
		[ brHtml(1) . "e ", DataFim1 ] ] );
}

if( $op == 53 ) //* Programar envio de a��es
{
	echo
	$this->Cabecalhos( [ "Se quiser enviar para todos os pessoas, deixe os campos da se��o Sele��o dos pessoas em branco.<br>Prencha somente os campos da se��o Dados da a��o", "FormCab alinhaMeio", "2" ] ),
	$this->Pular1Linha(2),
	$this->Cabecalhos( [ "Sele��o dos pessoas", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "Paciente", Cliente_Nome ),
	$this->Pedir( " ",
		[ "Celular ", Cliente_NumCelular,
		[ "", Cliente ] ] ),
	$this->Pular1Linha(2),
	$this->Cabecalhos( [ "Dados da a��o", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "T�tulo da a��o",
		[ "", AcaoEmail_Titulo, brHtml(2) . "(obrigat�rio)" ] ),
	$this->Pedir( "Vers�o da a��o",
		[ "", AcaoEmail_Versao,
		[ "", AcaoEmail, brHtml(2) . "(obrigat�rio)" ] ] ),
	$this->Pedir( "Remetente", EmailRemet ),
	$this->Pedir( "Data para envio",
		[ "", DataIni,
		[ brHtml(4) . "Hora ", HoraIni, brHtml(1) . "(obrigat�rios)<br>" .
			brHtml(2) . "(se o envio for hoje, a hora programada precisa ser no m�nimo 10 minutos a mais que a hora atual)" ] ] );
}

if( $op == 56 ) //* relat�rio resumido de a��es enviadas
{
	echo
	$this->Pedir( "T�tulo da a��o", AcaoEmail_Titulo ),
	$this->Pedir( "Vers�o da a��o",
		[ "", AcaoEmail_Versao,
		[ "", AcaoEmail ] ] ),
	$this->Pedir( "Entre as datas",
		[ "", DataIni,
		[ brHtml(1) . "e ", DataFim ] ] );
}

if( $op == 68 ) //* alterar senha usuario
{
	sql_abrirBD(false);

	switch( $op )
	{
		case 68:
			$campo     = "Usuario";
			$from      = "arqUsuario";
			$navegouDe = navegouDe( 'arqUsuario' );
			break;
	}

	$select = "Select " . $campo . " as nomeUsuario
		From " . $from .
		" Where idPrimario = " . $navegouDe;
	$nomeUsuario = sql_lerUmRegistro( $select )->NOMEUSUARIO;
//echo '<br><b>S=</b> '.$select.' <b>USU=</b> '.$nomeUsuario;
	sql_fecharBD();
	echo
		javaScriptIni(),
			"var g_nomeUsuario= '", str_replace( "'", "''", $nomeUsuario ), "';",
		javaScriptFim();

	echo
		$this->PedirZerando( "Digite a nova senha", Senha1 ),
		$this->PedirZerando( "Redigite a nova senha", Senha2 );
}

if( in_array( $op, [73,74] ) ) //* r_log_interacao e r_log_interacao_resumido
{
	echo
	$this->Pedir( "Entre",
		[ "", MesIni,
		[ brHtml(1) . "e ", MesFim, "" ] ] );
}

if( $op == 92 ) //* selecao arqConta
{
	echo
	$this->Pedir( "Tipo", TPgRec ),
	$this->Pedir( "Cl�nica", Clinica ),
	$this->Pedir( "Fornecedor" ),
	$this->Pedir( "Paciente", Cliente_Nome ),
	$this->Pedir( " ",
		[ "Celular ", Cliente_NumCelular,
		[ "", Cliente ] ] ),
	$this->Pedir( "Trecho do<br>hist�rico", Cadeia30 );
}

if( $op == 94 ) //* selecao arqParcela
{
	echo
	$this->Pedir( "Tipo", TPgRec ),
	$this->Pedir( "Cl�nica", Clinica ),
	$this->Pedir( "Fornecedor" ),
	$this->Pedir( "Paciente", Cliente_Nome ),
	$this->Pedir( " ",
		[ "Celular ", Cliente_NumCelular,
		[ "", Cliente ] ] ),
	$this->Pedir( "Vencimento entre",
		[ "", DataIni,
		[ brHtml(1) . "e ", DataFim ] ] ),
	$this->Pedir( "Pagamento entre",
		[ "", DataIni1,
		[ brHtml(1) . "e ", DataFim1 ] ] );
}

if( $op == 95 ) //* selecao Hoje arqParcela
{
	echo
	$this->Pedir( "Tipo", TPgRec ),
	$this->Pedir( "Cl�nica", Clinica ),
	$this->Pedir( "Fornecedor" ),
	$this->Pedir( "Paciente", Cliente_Nome ),
	$this->Pedir( " ",
		[ "Celular ", Cliente_NumCelular,
		[ "", Cliente ] ] ),
	$this->Pedir( "Pagamento entre",
		[ "", DataIni1,
		[ brHtml(1) . "e ", DataFim1 ] ] );
}

if( $op == 110 ) //* selecao arqConsulta
{
	echo
	$this->Pedir( "Cl�nica", Clinica ),
	$this->Pedir( "Paciente", Cliente_Nome ),
	$this->Pedir( " ",
		[ "Celular ", Cliente_NumCelular,
		[ "", Cliente ] ] ),
	$this->Pedir( "M�dico", Medico ),
	$this->Pedir( "Entre",
		[ "", DataIni,
		[ brHtml(1) . "e ", DataFim ] ] );
}

if( $op == 137 ) //* p_consulta_alterar
{
	echo
	$this->Pedir( "Chegada �s", HoraIni );
}

if( $op == 138 ) //* p_pessoa_prontuario
{
	echo
	$this->Pedir( "Prontu�rio N�", Gran13 );
}

if( $op == 162 ) //* p_recorrente_criar
{
	echo
	$this->Pedir( "M�s do vencimento", MesIni );
}

if( $op == 166 ) //* r_parcela
{
	echo
	$this->Pedir( "Tipo", TPgRec ),
	$this->Pedir( "Tipo da data",
		[ "", TData, " (obrigat�rio)" ] ),
	$this->Pedir( "Data entre",
		[ "", DataIni,
		[ " (obrigat�ria) e ", DataFim ] ] ),
	$this->Pedir( "Quitadas?", TSimNao ),
	$this->Pedir( "Forma Cobran�a", TFCobra ),
	$this->Pedir( "Forma Pagamento", TFPagto ),
	$this->Pedir( "Cl�nica", Clinica ),
	$this->Pedir( "Fornecedor" ),
	$this->Pedir( "Paciente", Cliente_Nome ),
	$this->Pedir( " ",
		[ "Celular ", Cliente_NumCelular,
		[ "", Cliente ] ] ),
	$this->Pedir( "Conta corrente", CCor ),
   $this->Pedir( "Plano de contas",
      [ "", SubPlano_Plano_CodPlano,
      [ brHtml(2), SubPlano_Plano_Plano,
      [ "", SubPlano_Plano ] ] ] ),
   $this->Pedir( " ",
      [ "", SubPlano_Codigo,
      [ brHtml(2), SubPlano_Nome,
      [ "", SubPlano ] ] ] ),
	$this->Pedir( "Compet�ncia entre<br>os meses de ",
		[ '', MesIni,
		[ brHtml(2) . 'e ', MesFim ] ] ),
	$this->Pedir( "Consolidado?", Logico1 );
}

if( $op == 170 ) //* r_consulta_dispensada
{
	echo
	$this->Pedir( "Cl�nica", Clinica ),
	$this->Pedir( "M�dico", Medico ),
	$this->Pedir( "Entre",
		[ "", DataIni,
		[ brHtml(1) . "e ", DataFim ] ] );
}

if( $op == 175 ) //* r_consulta_relacao
{
	echo
	$this->Pedir( "Cl�nica", Clinica ),
	$this->Pedir( "Entre",
		[ "", DataIni,
		[ brHtml(1) . "e ", DataFim ] ] );
}

if( in_array( $op, [189,190] ) ) //* 189: p_comcall_copiar | 190: r_comcall
{
	echo
	$this->Pedir( "Cl�nica", Clinica ),
	$this->Pedir( "M�s", MesIni ),
	$this->Pedir( "Call Center", Usuario );
}

if( $op == 200 ) //* selecao arqAgRet
{
	echo
	$this->Pedir( "Cl�nica", Clinica ),
	$this->Pedir( "Paciente", Cliente_Nome ),
	$this->Pedir( " ",
		[ "Celular ", Cliente_NumCelular,
		[ "", Cliente ] ] ),
	$this->Pedir( "Status", TStAgRet ),
	$this->Pedir( "Consulta" ),
	$this->Pedir( "Assessor" ),
	$this->Pedir( "Entre",
		[ "", DataIni,
		[ brHtml(1) . "e ", DataFim ] ] );
}

//==================================================================================
echo 	"</table>";
