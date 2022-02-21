<?php

/*=========================================================================
  a_config - Config
=========================================================================*/

if( DEF_a_config == 1 )
  return;
define( "DEF_a_config", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_config_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Email
//======================================================

class campo_cnfConfig_Email extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Email", "Email", "Email", "", 0, 0, false );
	}

}

//======================================================
//	Campo Aviso
//======================================================

class campo_cnfConfig_Aviso extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Aviso", "Aviso", "Aviso", "", 0, 0, false );
	}

}

//======================================================
//	Campo DocMod
//======================================================

class campo_cnfConfig_DocMod extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "DocMod", "DocMod", "DocMod", "", 0, 0, false );
	}

}

//======================================================
//	Arquivo cnfConfig
//======================================================
function listaCampos_cnfConfig( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_cnfConfig_Email(),
			new campo_cnfConfig_Aviso(),
			new campo_cnfConfig_DocMod() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class cnfConfig extends Lance_Configuracao
{
	function __construct()
	{
		parent::__construct(
			"cnfConfig",  // Nome Interno do arquivo
			"a_config",  // Nome deste arquivo Php que contém o arquivo
			"Config",  // Nome do arquivo acentuado-se
			listaCampos_cnfConfig( "" ), 25
		);
		$this->temLog = false;
	}

}
