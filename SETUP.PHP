<?php
	$setup["SISTEMA"] = [
		"NOME"						=> "Sistema de Gestão de Consultas",	// Nome do Sistema
		"SESSAO"						=> "",	// Variáveis de Sessão
		"LOGO_ABERTURA"			=> SISTEMA_DIR . "km.gif",	// Imagem do logotipo do sistema
		"LOGO_PEQUENO" 			=> SISTEMA_DIR . "km.gif",	// Imagem do logotipo pequeno do sistema
		"LOGO_FUNDONORMAL"		=> SISTEMA_DIR . "km.gif",	// Imagem para pano de fundo do sistema
		"LOGO_FUNDONORMAL_POS"	=> "bottom center",	// Posição onde a imagem aparecerá nas telas
		"LOGO_FUNDOSUAVE"			=> SISTEMA_DIR . "km_suave.gif",	// Imagem para pano de fundo suavizado
		"LOGO_FUNDOSUAVE_POS"	=> "bottom center",	// Posição onde a imagem aparecerá nas telas
		"PARAMETRO"			=> "cnfConfig",	// Parâmetro com informações do sistema
		"LATERALPDF"		=> "swsm.com.br" ];	// Texto que aparecerá na lateral dos relatórios

	$setup["BANCO"] = [
		"TIPO"				=> "firebird",	// Tipo
		"NOME"				=> "dado120.fdb",	// Nome
		"LOGINLOCAL"		=> "SYSDBA",	// Login Local
		"SENHALOCAL"		=> "masterkey",	// Senha
		"CAMINHOLOCAL"		=> "",	// Caminho
		"LOGINSERV"			=> "SYSDBA",	// Login para Servidor
		"SENHASERV"			=> "masterkey",	// Senha
		"CAMINHOSERV"		=> "j:/www.swsm.com.br/firebird",	// Caminho
		"ACENTO"				=> "ISO8859_1" ];	// Acentuação do banco

	$txtRodape = '<a href="https://www.swsm.com.br" target="_blank" class="Rodape">&copy; Kogumelo Informática</a>';


	global $g_vetPerfil;
	$g_vetPerfil = [
		[ 'Usuários', 'arqUsuario', 'Usuario', 'Senha', 'Grupo', '', 'Ativo', 'Email', 'Versao', 'principa' ]	];

	$versoes = [
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
		[ "a_clini", "a_endere" ],
		[ "a_pessoa", "a_endere" ],
		[ "a_xconfi", "a_endere" ] ];

include_once( SISTEMA_DIR_ABSOLUTO . 'cores.php' );
include_once( CLIENTE_DIR_ABSOLUTO . 'cores.php' );
require_once( CLIENTE_DIR_ABSOLUTO . 'setup.php' );

