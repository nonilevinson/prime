<?php

$op = ultimaLigOpcao();

echo 	"<table class='tabFormulario'>";

if( $op == 19 ) //* envio de teste de ação de email
{
	echo
	$this->Pedir( "Destinatário",
		[ "", Cadeia100, "<br>(obrigatório)" ] ),
	$this->Pedir( "Pessoa",
		[ "", Cliente, "<br>" . brHtml(1) . "O teste usará os dados deste cliente para montar a ação. O email <b>NÃO</b> será enviado a ele." ] ),
	$this->Pedir( "Remetente", EmailRemet );
}

if( $op == 28 ) //* relatório log acesso
{
	echo
	$this->Pedir( "Usuário", Usuario ),
	$this->Pedir( "Operação", StatusLog ),
	$this->Pedir( "IdPrimario do registro", Gran13 ),
	$this->Pedir( "Entre as datas",
		[ "", DataIni,
		[ brHtml(1) . "e ", DataFim ] ] ),
	$this->Pedir( "Entre o horário",
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

if( $op == 39 ) //* relatório de avisos lidos
{
	echo
	$this->Pedir( "Entre os avisos",
		[ "", Gran6,
		[ brHtml(1) . "e ", Gran6Fim, "" ] ] ),
	$this->Pedir( "Usuário", Usuario ),
	$this->Pedir( "Entre as datas",
		[ "", DataIni,
		[ brHtml(1) . "e ", DataFim ] ] ),
	$this->Pedir( "Lidos entre",
		[ "", DataIni1,
		[ brHtml(1) . "e ", DataFim1 ] ] );
}

if( $op == 53 ) //* Programar envio de ações
{
	echo
	$this->Cabecalhos( [ "Se quiser enviar para todos os pessoas, deixe os campos da seção Seleção dos pessoas em branco.<br>Prencha somente os campos da seção Dados da ação", "FormCab alinhaMeio", "2" ] ),
	$this->Pular1Linha(2),
	$this->Cabecalhos( [ "Seleção dos pessoas", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "Paciente", Cliente_Nome ),
	$this->Pedir( " ",
		[ "Celular ", Cliente_NumCelular,
		[ "", Cliente ] ] ),
	$this->Pular1Linha(2),
	$this->Cabecalhos( [ "Dados da ação", "FormCab alinhaMeio", "2" ] ),
	$this->Pedir( "Título da ação",
		[ "", AcaoEmail_Titulo, brHtml(2) . "(obrigatório)" ] ),
	$this->Pedir( "Versão da ação",
		[ "", AcaoEmail_Versao,
		[ "", AcaoEmail, brHtml(2) . "(obrigatório)" ] ] ),
	$this->Pedir( "Remetente", EmailRemet ),
	$this->Pedir( "Data para envio",
		[ "", DataIni,
		[ brHtml(4) . "Hora ", HoraIni, brHtml(1) . "(obrigatórios)<br>" .
			brHtml(2) . "(se o envio for hoje, a hora programada precisa ser no mínimo 10 minutos a mais que a hora atual)" ] ] );
}

if( $op == 56 ) //* relatório resumido de ações enviadas
{
	echo
	$this->Pedir( "Título da ação", AcaoEmail_Titulo ),
	$this->Pedir( "Versão da ação",
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
	$this->Pedir( "Clínica", Clinica ),
	$this->Pedir( "Fornecedor" ),
	$this->Pedir( "Paciente", Cliente_Nome ),
	$this->Pedir( " ",
		[ "Celular ", Cliente_NumCelular,
		[ "", Cliente ] ] ),
	$this->Pedir( "Trecho do<br>histórico", Cadeia30 );
}

if( $op == 94 ) //* selecao arqParcela
{
	echo
	$this->Pedir( "Tipo", TPgRec ),
	$this->Pedir( "Clínica", Clinica ),
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
	$this->Pedir( "Clínica", Clinica ),
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
	$this->Pedir( "Clínica", Clinica ),
	$this->Pedir( "Paciente", Cliente_Nome ),
	$this->Pedir( " ",
		[ "Celular ", Cliente_NumCelular,
		[ "", Cliente ] ] ),
	$this->Pedir( "Médico", Medico ),
	$this->Pedir( "Entre",
		[ "", DataIni,
		[ brHtml(1) . "e ", DataFim ] ] );
}

if( $op == 137 ) //* p_consulta_alterar
{
	echo
	$this->Pedir( "Chegada às", HoraIni );
}

if( $op == 138 ) //* p_pessoa_prontuario
{
	echo
	$this->Pedir( "Prontuário Nº", Gran13 );
}

if( $op == 162 ) //* p_recorrente_criar
{
	echo
	$this->Pedir( "Mês do vencimento", MesIni );
}

if( $op == 166 ) //* r_parcela
{
	echo
	$this->Pedir( "Tipo", TPgRec ),
	$this->Pedir( "Tipo da data",
		[ "", TData, " (obrigatório)" ] ),
	$this->Pedir( "Data entre",
		[ "", DataIni,
		[ " (obrigatória) e ", DataFim ] ] ),
	$this->Pedir( "Quitadas?", TSimNao ),
	$this->Pedir( "Forma Cobrança", TFCobra ),
	$this->Pedir( "Forma Pagamento", TFPagto ),
	$this->Pedir( "Clínica", Clinica ),
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
	$this->Pedir( "Competência entre<br>os meses de ",
		[ '', MesIni,
		[ brHtml(2) . 'e ', MesFim ] ] ),
	$this->Pedir( "Consolidado?", Logico1 );
}

if( $op == 170 ) //* r_consulta_dispensada
{
	echo
	$this->Pedir( "Clínica", Clinica ),
	$this->Pedir( "Médico", Medico ),
	$this->Pedir( "Entre",
		[ "", DataIni,
		[ brHtml(1) . "e ", DataFim ] ] );
}

if( $op == 175 ) //* r_consulta_relacao
{
	echo
	$this->Pedir( "Clínica", Clinica ),
	$this->Pedir( "Entre",
		[ "", DataIni,
		[ brHtml(1) . "e ", DataFim ] ] );
}

if( in_array( $op, [189,190] ) ) //* 189: p_comcall_copiar | 190: r_comcall
{
	echo
	$this->Pedir( "Clínica", Clinica ),
	$this->Pedir( "Mês", MesIni ),
	$this->Pedir( "Call Center", Usuario );
}

if( $op == 200 ) //* selecao arqAgRet
{
	echo
	$this->Pedir( "Clínica", Clinica ),
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
