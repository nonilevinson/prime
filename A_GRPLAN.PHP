<?php

/*=========================================================================
  a_grplan - GeraPlant
=========================================================================*/

if( DEF_a_grplan == 1 )
  return;
define( "DEF_a_grplan", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_grplan_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Clinica
//======================================================

class campo_parGeraPlant_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_parGeraPlant_Clinica_Clinica extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Clinica_Clinica", "Clinica_Clinica", "Clinica", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Clinica", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Clínica" );
	}

}

//======================================================
//	Campo DataIni
//======================================================

class campo_parGeraPlant_DataIni extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataIni", "DataIni", "DataIni", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo DataFim
//======================================================

class campo_parGeraPlant_DataFim extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataFim", "DataFim", "DataFim", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Medico
//======================================================

class campo_parGeraPlant_Medico extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Medico", "Medico", "Medico", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Medico_Usuario
//======================================================

class campo_parGeraPlant_Medico_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Medico_Usuario", "Medico_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Medico", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Usuário" );
	}

}

//======================================================
//	Campo Dom
//======================================================

class campo_parGeraPlant_Dom extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Dom", "Dom", "Dom", "", 0, 0, false );
	}

}

//======================================================
//	Campo Seg
//======================================================

class campo_parGeraPlant_Seg extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Seg", "Seg", "Seg", "", 0, 0, false );
	}

}

//======================================================
//	Campo Ter
//======================================================

class campo_parGeraPlant_Ter extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Ter", "Ter", "Ter", "", 0, 0, false );
	}

}

//======================================================
//	Campo Qua
//======================================================

class campo_parGeraPlant_Qua extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Qua", "Qua", "Qua", "", 0, 0, false );
	}

}

//======================================================
//	Campo Qui
//======================================================

class campo_parGeraPlant_Qui extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Qui", "Qui", "Qui", "", 0, 0, false );
	}

}

//======================================================
//	Campo Sex
//======================================================

class campo_parGeraPlant_Sex extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Sex", "Sex", "Sex", "", 0, 0, false );
	}

}

//======================================================
//	Campo Sab
//======================================================

class campo_parGeraPlant_Sab extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Sab", "Sab", "Sab", "", 0, 0, false );
	}

}

//======================================================
//	Arquivo parGeraPlant
//======================================================
function listaCampos_parGeraPlant( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_parGeraPlant_Clinica(),
			new campo_parGeraPlant_Clinica_Clinica(),
			new campo_parGeraPlant_DataIni(),
			new campo_parGeraPlant_DataFim(),
			new campo_parGeraPlant_Medico(),
			new campo_parGeraPlant_Medico_Usuario(),
			new campo_parGeraPlant_Dom(),
			new campo_parGeraPlant_Seg(),
			new campo_parGeraPlant_Ter(),
			new campo_parGeraPlant_Qua(),
			new campo_parGeraPlant_Qui(),
			new campo_parGeraPlant_Sex(),
			new campo_parGeraPlant_Sab() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class parGeraPlant extends Lance_Parametro
{
	function __construct()
	{
		parent::__construct(
			"parGeraPlant",  // Nome Interno do arquivo
			"a_grplan",  // Nome deste arquivo Php que contém o arquivo
			"GeraPlant",  // Nome do arquivo acentuado-se
			listaCampos_parGeraPlant( "" ), 45
		);
	}

}
?>
