<?php
	$setup["SISTEMA"] = [
		"NOME"						=> "Sistema de Gest�o de Consultas",	// Nome do Sistema
		"SESSAO"						=> "",	// Vari�veis de Sess�o
		"LOGO_ABERTURA"			=> SISTEMA_DIR . "km.gif",	// Imagem do logotipo do sistema
		"LOGO_PEQUENO" 			=> SISTEMA_DIR . "km.gif",	// Imagem do logotipo pequeno do sistema
		"LOGO_FUNDONORMAL"		=> SISTEMA_DIR . "km.gif",	// Imagem para pano de fundo do sistema
		"LOGO_FUNDONORMAL_POS"	=> "bottom center",	// Posi��o onde a imagem aparecer� nas telas
		"LOGO_FUNDOSUAVE"			=> SISTEMA_DIR . "km_suave.gif",	// Imagem para pano de fundo suavizado
		"LOGO_FUNDOSUAVE_POS"	=> "bottom center",	// Posi��o onde a imagem aparecer� nas telas
		"PARAMETRO"			=> "cnfConfig",	// Par�metro com informa��es do sistema
		"LATERALPDF"		=> "swsm.com.br" ];	// Texto que aparecer� na lateral dos relat�rios

	$setup["BANCO"] = [
		"TIPO"				=> "firebird",	// Tipo
		"NOME"				=> "dado207.fdb",	// Nome
		"LOGINLOCAL"		=> "SYSDBA",	// Login Local
		"SENHALOCAL"		=> "masterkey",	// Senha
		"CAMINHOLOCAL"		=> "",	// Caminho
		"LOGINSERV"			=> "SYSDBA",	// Login para Servidor
		"SENHASERV"			=> "masterkey",	// Senha
		"CAMINHOSERV"		=> "j:/www.swsm.com.br/firebird",	// Caminho
		"ACENTO"				=> "ISO8859_1" ];	// Acentua��o do banco

	$txtRodape = '<a href="https://www.swsm.com.br" target="_blank" class="Rodape">&copy; Kogumelo Inform�tica</a>';


	global $g_vetPerfil;
	$g_vetPerfil = [
		[ 'Usu�rios', 'arqUsuario', 'Usuario', 'Senha', 'Grupo', '', 'Ativo', 'Email', 'Versao', 'principa' ]	];

	$versoes = [
		"2.07"	=> "23/09/2022",
		"2.06"	=> "23/08/2022",
		"2.05"	=> "18/08/2022",
		"2.04"	=> "12/08/2022",
		"2.03"	=> "03/08/2022",
		"2.02"	=> "12/07/2022",
		"2.01"	=> "07/07/2022",
		"2.00"	=> "22/06/2022",
		"1.23"	=> "24/05/2022",
		"1.22"	=> "12/05/2022",
		"1.21"	=> "03/05/2022",
		"1.20"	=> "01/03/2022",
		"1.19"	=> "01/02/2022",
		"1.18"	=> "21/01/2022",
		"1.17"	=> "10/01/2022",
		"1.16"	=> "30/12/2021",
		"1.15"	=> "24/11/2021",
		"1.14"	=> "18/11/2021",
		"1.13"	=> "16/11/2021",
		"1.12"	=> "01/11/2021",
		"1.11"	=> "13/10/2021",
		"1.10"	=> "22/09/2021",
		"1.09"	=> "20/09/2021",
		"1.08"	=> "13/09/2021",
		"1.07"	=> "09/09/2021",
		"1.06"	=> "26/08/2021",
		"1.05"	=> "05/08/2021",
		"1.04"	=> "14/07/2021",
		"1.03"	=> "07/07/2021",
		"1.02"	=> "18/06/2021",
		"1.01"	=> "15/06/2021",
		"1.00"	=> "25/05/2021" ];

	$vetDependencia = [
		[ "a_fornec", "a_endere" ],
		[ "a_xconfi", "a_endere" ],
		[ "a_pessoa", "a_endere" ],
		[ "a_clini", "a_endere" ] ];

include_once( SISTEMA_DIR_ABSOLUTO . 'cores.php' );
include_once( CLIENTE_DIR_ABSOLUTO . 'cores.php' );
require_once( CLIENTE_DIR_ABSOLUTO . 'setup.php' );

