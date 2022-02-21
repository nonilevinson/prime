<?php

/*=========================================================================
  a_geratr - GeraTransf
=========================================================================*/

if( DEF_a_geratr == 1 )
  return;
define( "DEF_a_geratr", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_geratr_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Emissao
//======================================================

class campo_parGeraTransf_Emissao extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Emissao", "Emissao", "Emissao", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Vencimento
//======================================================

class campo_parGeraTransf_Vencimento extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Vencimento", "Vencimento", "Vencimento", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Valor
//======================================================

class campo_parGeraTransf_Valor extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor", "Valor", "Valor", 8, "###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo ForneDB
//======================================================

class campo_parGeraTransf_ForneDB extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "ForneDB", "ForneDB", "ForneDB", 0, "arqFornecedor", "arqFornecedor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo ForneDB_Nome
//======================================================

class campo_parGeraTransf_ForneDB_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "ForneDB_Nome", "ForneDB_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "ForneDB", false );
	}

}

//======================================================
//	Campo CCorDB
//======================================================

class campo_parGeraTransf_CCorDB extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "CCorDB", "CCorDB", "CCorDB", 0, "arqCCor", "arqCCor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo CCorDB_Nome
//======================================================

class campo_parGeraTransf_CCorDB_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CCorDB_Nome", "CCorDB_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "CCorDB", false );
	}

}

//======================================================
//	Campo SubPlaDB
//======================================================

class campo_parGeraTransf_SubPlaDB extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SubPlaDB", "SubPlaDB", "SubPlaDB", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, 0, false );
	}

}

//======================================================
//	Campo SubPlaDB_Plano
//======================================================

class campo_parGeraTransf_SubPlaDB_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SubPlaDB_Plano", "SubPlaDB_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "SubPlaDB", false );
	}

}

//======================================================
//	Campo SubPlaDB_Plano_CodPlano
//======================================================

class campo_parGeraTransf_SubPlaDB_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "SubPlaDB_Plano_CodPlano", "SubPlaDB_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "SubPlaDB_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo SubPlaDB_Plano_Plano
//======================================================

class campo_parGeraTransf_SubPlaDB_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlaDB_Plano_Plano", "SubPlaDB_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "SubPlaDB_Plano", false );
	}

}

//======================================================
//	Campo SubPlaDB_Codigo
//======================================================

class campo_parGeraTransf_SubPlaDB_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlaDB_Codigo", "SubPlaDB_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "SubPlaDB", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo SubPlaDB_Nome
//======================================================

class campo_parGeraTransf_SubPlaDB_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlaDB_Nome", "SubPlaDB_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "SubPlaDB", false );
	}

}

//======================================================
//	Campo HistDB
//======================================================

class campo_parGeraTransf_HistDB extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "HistDB", "HistDB", "HistDB", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo TFCobraDB
//======================================================

class campo_parGeraTransf_TFCobraDB extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TFCobraDB", "TFCobraDB", "TFCobraDB", 0, "tabTFCobra", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo TFPagtoDB
//======================================================

class campo_parGeraTransf_TFPagtoDB extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TFPagtoDB", "TFPagtoDB", "TFPagtoDB", 0, "tabTFPagto", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo TDetPgDB
//======================================================

class campo_parGeraTransf_TDetPgDB extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TDetPgDB", "TDetPgDB", "TDetPgDB", 0, "tabTDetPg", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo ForneCR
//======================================================

class campo_parGeraTransf_ForneCR extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "ForneCR", "ForneCR", "ForneCR", 0, "arqFornecedor", "arqFornecedor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo ForneCR_Nome
//======================================================

class campo_parGeraTransf_ForneCR_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "ForneCR_Nome", "ForneCR_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "ForneCR", false );
	}

}

//======================================================
//	Campo CCorCR
//======================================================

class campo_parGeraTransf_CCorCR extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "CCorCR", "CCorCR", "CCorCR", 0, "arqCCor", "arqCCor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo CCorCR_Nome
//======================================================

class campo_parGeraTransf_CCorCR_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CCorCR_Nome", "CCorCR_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "CCorCR", false );
	}

}

//======================================================
//	Campo SubPlaCR
//======================================================

class campo_parGeraTransf_SubPlaCR extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SubPlaCR", "SubPlaCR", "SubPlaCR", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, 0, false );
	}

}

//======================================================
//	Campo SubPlaCR_Plano
//======================================================

class campo_parGeraTransf_SubPlaCR_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SubPlaCR_Plano", "SubPlaCR_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "SubPlaCR", false );
	}

}

//======================================================
//	Campo SubPlaCR_Plano_CodPlano
//======================================================

class campo_parGeraTransf_SubPlaCR_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "SubPlaCR_Plano_CodPlano", "SubPlaCR_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "SubPlaCR_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo SubPlaCR_Plano_Plano
//======================================================

class campo_parGeraTransf_SubPlaCR_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlaCR_Plano_Plano", "SubPlaCR_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "SubPlaCR_Plano", false );
	}

}

//======================================================
//	Campo SubPlaCR_Codigo
//======================================================

class campo_parGeraTransf_SubPlaCR_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlaCR_Codigo", "SubPlaCR_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "SubPlaCR", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo SubPlaCR_Nome
//======================================================

class campo_parGeraTransf_SubPlaCR_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlaCR_Nome", "SubPlaCR_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "SubPlaCR", false );
	}

}

//======================================================
//	Campo HistCR
//======================================================

class campo_parGeraTransf_HistCR extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "HistCR", "HistCR", "HistCR", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo TFCobraCR
//======================================================

class campo_parGeraTransf_TFCobraCR extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TFCobraCR", "TFCobraCR", "TFCobraCR", 0, "tabTFCobra", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo TFPagtoCR
//======================================================

class campo_parGeraTransf_TFPagtoCR extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TFPagtoCR", "TFPagtoCR", "TFPagtoCR", 0, "tabTFPagto", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo TDetPgCR
//======================================================

class campo_parGeraTransf_TDetPgCR extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TDetPgCR", "TDetPgCR", "TDetPgCR", 0, "tabTDetPg", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Arquivo parGeraTransf
//======================================================
function listaCampos_parGeraTransf( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_parGeraTransf_Emissao(),
			new campo_parGeraTransf_Vencimento(),
			new campo_parGeraTransf_Valor(),
			new campo_parGeraTransf_ForneDB(),
			new campo_parGeraTransf_ForneDB_Nome(),
			new campo_parGeraTransf_CCorDB(),
			new campo_parGeraTransf_CCorDB_Nome(),
			new campo_parGeraTransf_SubPlaDB(),
			new campo_parGeraTransf_SubPlaDB_Plano(),
			new campo_parGeraTransf_SubPlaDB_Plano_CodPlano(),
			new campo_parGeraTransf_SubPlaDB_Plano_Plano(),
			new campo_parGeraTransf_SubPlaDB_Codigo(),
			new campo_parGeraTransf_SubPlaDB_Nome(),
			new campo_parGeraTransf_HistDB(),
			new campo_parGeraTransf_TFCobraDB(),
			new Lance_CampoCadeia( "TFCobraDB_Chave", "TFCobraDB_Chave", "Chave", 1, "x", EH_CHAVE, TFCobraDB ),
			new Lance_CampoCadeia( "TFCobraDB_Descritor", "TFCobraDB_Descritor", "Descritor", 10, "xxxxxxxxxx", EH_DESCRITOR, TFCobraDB ),
			new campo_parGeraTransf_TFPagtoDB(),
			new Lance_CampoCadeia( "TFPagtoDB_Chave", "TFPagtoDB_Chave", "Chave", 1, "x", EH_CHAVE, TFPagtoDB ),
			new Lance_CampoCadeia( "TFPagtoDB_Descritor", "TFPagtoDB_Descritor", "Descritor", 8, "xxxxxxxx", EH_DESCRITOR, TFPagtoDB ),
			new campo_parGeraTransf_TDetPgDB(),
			new Lance_CampoCadeia( "TDetPgDB_Chave", "TDetPgDB_Chave", "Chave", 1, "x", EH_CHAVE, TDetPgDB ),
			new Lance_CampoCadeia( "TDetPgDB_Descritor", "TDetPgDB_Descritor", "Descritor", 14, "xxxxxxxxxxxxxx", EH_DESCRITOR, TDetPgDB ),
			new campo_parGeraTransf_ForneCR(),
			new campo_parGeraTransf_ForneCR_Nome(),
			new campo_parGeraTransf_CCorCR(),
			new campo_parGeraTransf_CCorCR_Nome(),
			new campo_parGeraTransf_SubPlaCR(),
			new campo_parGeraTransf_SubPlaCR_Plano(),
			new campo_parGeraTransf_SubPlaCR_Plano_CodPlano(),
			new campo_parGeraTransf_SubPlaCR_Plano_Plano(),
			new campo_parGeraTransf_SubPlaCR_Codigo(),
			new campo_parGeraTransf_SubPlaCR_Nome(),
			new campo_parGeraTransf_HistCR(),
			new campo_parGeraTransf_TFCobraCR(),
			new Lance_CampoCadeia( "TFCobraCR_Chave", "TFCobraCR_Chave", "Chave", 1, "x", EH_CHAVE, TFCobraCR ),
			new Lance_CampoCadeia( "TFCobraCR_Descritor", "TFCobraCR_Descritor", "Descritor", 10, "xxxxxxxxxx", EH_DESCRITOR, TFCobraCR ),
			new campo_parGeraTransf_TFPagtoCR(),
			new Lance_CampoCadeia( "TFPagtoCR_Chave", "TFPagtoCR_Chave", "Chave", 1, "x", EH_CHAVE, TFPagtoCR ),
			new Lance_CampoCadeia( "TFPagtoCR_Descritor", "TFPagtoCR_Descritor", "Descritor", 8, "xxxxxxxx", EH_DESCRITOR, TFPagtoCR ),
			new campo_parGeraTransf_TDetPgCR(),
			new Lance_CampoCadeia( "TDetPgCR_Chave", "TDetPgCR_Chave", "Chave", 1, "x", EH_CHAVE, TDetPgCR ),
			new Lance_CampoCadeia( "TDetPgCR_Descritor", "TDetPgCR_Descritor", "Descritor", 14, "xxxxxxxxxxxxxx", EH_DESCRITOR, TDetPgCR ) ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class parGeraTransf extends Lance_Parametro
{
	function __construct()
	{
		parent::__construct(
			"parGeraTransf",  // Nome Interno do arquivo
			"a_geratr",  // Nome deste arquivo Php que contém o arquivo
			"GeraTransf",  // Nome do arquivo acentuado-se
			listaCampos_parGeraTransf( "" ), 58
		);
	}

}
