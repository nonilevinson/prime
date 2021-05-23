<?php

/*=========================================================================
  a_xconfi - XConfig
=========================================================================*/

if( DEF_a_xconfi == 1 )
  return;
define( "DEF_a_xconfi", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "a_xconfi_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo CPF
//======================================================

class campo_cnfXConfig_CPF extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CPF", "CPF", "CPF", 11, "###.###.###-##", 0, 0, false );
	}

}

//======================================================
//	Campo LogAcesso
//======================================================

class campo_cnfXConfig_LogAcesso extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "LogAcesso", "LogAcesso", "LogAcesso", "", 0, 0, false );
	}

}

//======================================================
//	Campo LogAcessoS
//======================================================

class campo_cnfXConfig_LogAcessoS extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "LogAcessoS", "LogAcessoS", "LogAcessoS", "", 0, 0, false );
	}

}

//======================================================
//	Campo Qtd
//======================================================

class campo_cnfXConfig_Qtd extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Qtd", "Qtd", "Qtd", 6, "###.##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Qtd2
//======================================================

class campo_cnfXConfig_Qtd2 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Qtd2", "Qtd2", "Qtd2", 6, "###.##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Empresa
//======================================================

class campo_cnfXConfig_Empresa extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Empresa", "Empresa", "Empresa", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo CNPJ
//======================================================

class campo_cnfXConfig_CNPJ extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CNPJ", "CNPJ", "CNPJ", 14, "##.###.###/####-##", 0, 0, false );
	}

}

//======================================================
//	Campo Email
//======================================================

class campo_cnfXConfig_Email extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Email", "Email", "Email", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Site
//======================================================

class campo_cnfXConfig_Site extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Site", "Site", "Site", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo QtasDesmar
//======================================================

class campo_cnfXConfig_QtasDesmar extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "QtasDesmar", "QtasDesmar", "QtasDesmar", 2, "#z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Declinar
//======================================================

class campo_cnfXConfig_Declinar extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Declinar", "Declinar", "Declinar", 2, "#z", "", "", 0, 0, false );
	}

}

//======================================================
//	Arquivo cnfXConfig
//======================================================
function listaCampos_cnfXConfig( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_cnfXConfig_CPF(),
			new campo_cnfXConfig_LogAcesso(),
			new campo_cnfXConfig_LogAcessoS(),
			new campo_cnfXConfig_Qtd(),
			new campo_cnfXConfig_Qtd2(),
			new campo_cnfXConfig_Empresa() ),
		listaCampos_domEndereco( "Ende_" ),
		array( 
			new campo_cnfXConfig_CNPJ(),
			new campo_cnfXConfig_Email(),
			new campo_cnfXConfig_Site(),
			new campo_cnfXConfig_QtasDesmar(),
			new campo_cnfXConfig_Declinar() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class cnfXConfig extends Lance_Configuracao
{
	function __construct()
	{
		parent::__construct(
			"cnfXConfig",  // Nome Interno do arquivo
			"a_xconfi",  // Nome deste arquivo Php que contém o arquivo
			"XConfig",  // Nome do arquivo acentuado-se
			listaCampos_cnfXConfig( "" ), 17
		);
	}

}
?>
