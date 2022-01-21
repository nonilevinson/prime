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
//	Campo RecorDia
//======================================================

class campo_cnfXConfig_RecorDia extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "RecorDia", "RecorDia", "RecorDia", 2, "#z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo CCorRec
//======================================================

class campo_cnfXConfig_CCorRec extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "CCorRec", "CCorRec", "CCorRec", 0, "arqCCor", "arqCCor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo CCorRec_Nome
//======================================================

class campo_cnfXConfig_CCorRec_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CCorRec_Nome", "CCorRec_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "CCorRec", false );
	}

}

//======================================================
//	Campo CCorAss
//======================================================

class campo_cnfXConfig_CCorAss extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "CCorAss", "CCorAss", "CCorAss", 0, "arqCCor", "arqCCor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo CCorAss_Nome
//======================================================

class campo_cnfXConfig_CCorAss_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CCorAss_Nome", "CCorAss_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "CCorAss", false );
	}

}

//======================================================
//	Campo SubPlaRRec
//======================================================

class campo_cnfXConfig_SubPlaRRec extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SubPlaRRec", "SubPlaRRec", "SubPlaRRec", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, 0, false );
	}

}

//======================================================
//	Campo SubPlaRRec_Plano
//======================================================

class campo_cnfXConfig_SubPlaRRec_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SubPlaRRec_Plano", "SubPlaRRec_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "SubPlaRRec", false );
	}

}

//======================================================
//	Campo SubPlaRRec_Plano_CodPlano
//======================================================

class campo_cnfXConfig_SubPlaRRec_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "SubPlaRRec_Plano_CodPlano", "SubPlaRRec_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "SubPlaRRec_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo SubPlaRRec_Plano_Plano
//======================================================

class campo_cnfXConfig_SubPlaRRec_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlaRRec_Plano_Plano", "SubPlaRRec_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "SubPlaRRec_Plano", false );
	}

}

//======================================================
//	Campo SubPlaRRec_Codigo
//======================================================

class campo_cnfXConfig_SubPlaRRec_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlaRRec_Codigo", "SubPlaRRec_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "SubPlaRRec", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo SubPlaRRec_Nome
//======================================================

class campo_cnfXConfig_SubPlaRRec_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlaRRec_Nome", "SubPlaRRec_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "SubPlaRRec", false );
	}

}

//======================================================
//	Campo SubPlaRAss
//======================================================

class campo_cnfXConfig_SubPlaRAss extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SubPlaRAss", "SubPlaRAss", "SubPlaRAss", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, 0, false );
	}

}

//======================================================
//	Campo SubPlaRAss_Plano
//======================================================

class campo_cnfXConfig_SubPlaRAss_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SubPlaRAss_Plano", "SubPlaRAss_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "SubPlaRAss", false );
	}

}

//======================================================
//	Campo SubPlaRAss_Plano_CodPlano
//======================================================

class campo_cnfXConfig_SubPlaRAss_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "SubPlaRAss_Plano_CodPlano", "SubPlaRAss_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "SubPlaRAss_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo SubPlaRAss_Plano_Plano
//======================================================

class campo_cnfXConfig_SubPlaRAss_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlaRAss_Plano_Plano", "SubPlaRAss_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "SubPlaRAss_Plano", false );
	}

}

//======================================================
//	Campo SubPlaRAss_Codigo
//======================================================

class campo_cnfXConfig_SubPlaRAss_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlaRAss_Codigo", "SubPlaRAss_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "SubPlaRAss", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo SubPlaRAss_Nome
//======================================================

class campo_cnfXConfig_SubPlaRAss_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlaRAss_Nome", "SubPlaRAss_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "SubPlaRAss", false );
	}

}

//======================================================
//	Campo FornRec
//======================================================

class campo_cnfXConfig_FornRec extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "FornRec", "FornRec", "FornRec", 0, "arqFornecedor", "arqFornecedor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo FornRec_Nome
//======================================================

class campo_cnfXConfig_FornRec_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "FornRec_Nome", "FornRec_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "FornRec", false );
	}

}

//======================================================
//	Campo BoletoMin
//======================================================

class campo_cnfXConfig_BoletoMin extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "BoletoMin", "BoletoMin", "BoletoMin", 8, "###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo DiasSdEntr
//======================================================

class campo_cnfXConfig_DiasSdEntr extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "DiasSdEntr", "DiasSdEntr", "DiasSdEntr", 2, "#z", "", "", 0, 0, false );
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
			new campo_cnfXConfig_Declinar(),
			new campo_cnfXConfig_RecorDia(),
			new campo_cnfXConfig_CCorRec(),
			new campo_cnfXConfig_CCorRec_Nome(),
			new campo_cnfXConfig_CCorAss(),
			new campo_cnfXConfig_CCorAss_Nome(),
			new campo_cnfXConfig_SubPlaRRec(),
			new campo_cnfXConfig_SubPlaRRec_Plano(),
			new campo_cnfXConfig_SubPlaRRec_Plano_CodPlano(),
			new campo_cnfXConfig_SubPlaRRec_Plano_Plano(),
			new campo_cnfXConfig_SubPlaRRec_Codigo(),
			new campo_cnfXConfig_SubPlaRRec_Nome(),
			new campo_cnfXConfig_SubPlaRAss(),
			new campo_cnfXConfig_SubPlaRAss_Plano(),
			new campo_cnfXConfig_SubPlaRAss_Plano_CodPlano(),
			new campo_cnfXConfig_SubPlaRAss_Plano_Plano(),
			new campo_cnfXConfig_SubPlaRAss_Codigo(),
			new campo_cnfXConfig_SubPlaRAss_Nome(),
			new campo_cnfXConfig_FornRec(),
			new campo_cnfXConfig_FornRec_Nome(),
			new campo_cnfXConfig_BoletoMin(),
			new campo_cnfXConfig_DiasSdEntr() )
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
