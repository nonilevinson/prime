<?php

/*=========================================================================
  a_qbaixa - QBaixa
=========================================================================*/

if( DEF_a_qbaixa == 1 )
  return;
define( "DEF_a_qbaixa", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_qbaixa_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo TFPagto
//======================================================

class campo_parQBaixa_TFPagto extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TFPagto", "TFPagto", "TFPagto", 0, "tabTFPagto", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo TDetPg
//======================================================

class campo_parQBaixa_TDetPg extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TDetPg", "TDetPg", "TDetPg", 0, "tabTDetPg", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo CCor
//======================================================

class campo_parQBaixa_CCor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "CCor", "CCor", "CCor", 0, "arqCCor", "arqCCor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo CCor_Banco
//======================================================

class campo_parQBaixa_CCor_Banco extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "CCor_Banco", "CCor_Banco", "Banco", EH_CHAVE, "arqBanco", "arqBanco.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "CCor", false );
	}

}

//======================================================
//	Campo CCor_Banco_Num
//======================================================

class campo_parQBaixa_CCor_Banco_Num extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "CCor_Banco_Num", "CCor_Banco_Num", "Num", 3, "##z", "", "", EH_CHAVE, "CCor_Banco", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "N° Banco" );
	}

}

//======================================================
//	Campo CCor_Banco_Banco
//======================================================

class campo_parQBaixa_CCor_Banco_Banco extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CCor_Banco_Banco", "CCor_Banco_Banco", "Banco", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "CCor_Banco", false );
	}

}

//======================================================
//	Campo CCor_Agencia
//======================================================

class campo_parQBaixa_CCor_Agencia extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CCor_Agencia", "CCor_Agencia", "Agencia", 4, "xxxx", EH_CHAVE, "CCor", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Agência" );
	}

}

//======================================================
//	Campo CCor_Conta
//======================================================

class campo_parQBaixa_CCor_Conta extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CCor_Conta", "CCor_Conta", "Conta", 10, "xxxxxxxxxx", EH_CHAVE, "CCor", false );
	}

}

//======================================================
//	Campo Cheque
//======================================================

class campo_parQBaixa_Cheque extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cheque", "Cheque", "Cheque", 6, "zzz.zzz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo DataPagto
//======================================================

class campo_parQBaixa_DataPagto extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataPagto", "DataPagto", "DataPagto", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo DataComp
//======================================================

class campo_parQBaixa_DataComp extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataComp", "DataComp", "DataComp", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Arquivo parQBaixa
//======================================================
function listaCampos_parQBaixa( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_parQBaixa_TFPagto(),
			new Lance_CampoCadeia( "TFPagto_Chave", "TFPagto_Chave", "Chave", 1, "x", EH_CHAVE, TFPagto ),
			new Lance_CampoCadeia( "TFPagto_Descritor", "TFPagto_Descritor", "Descritor", 8, "xxxxxxxx", EH_DESCRITOR, TFPagto ),
			new campo_parQBaixa_TDetPg(),
			new Lance_CampoCadeia( "TDetPg_Chave", "TDetPg_Chave", "Chave", 1, "x", EH_CHAVE, TDetPg ),
			new Lance_CampoCadeia( "TDetPg_Descritor", "TDetPg_Descritor", "Descritor", 14, "xxxxxxxxxxxxxx", EH_DESCRITOR, TDetPg ),
			new campo_parQBaixa_CCor(),
			new campo_parQBaixa_CCor_Banco(),
			new campo_parQBaixa_CCor_Banco_Num(),
			new campo_parQBaixa_CCor_Banco_Banco(),
			new campo_parQBaixa_CCor_Agencia(),
			new campo_parQBaixa_CCor_Conta(),
			new campo_parQBaixa_Cheque(),
			new campo_parQBaixa_DataPagto(),
			new campo_parQBaixa_DataComp() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class parQBaixa extends Lance_Parametro
{
	function __construct()
	{
		parent::__construct(
			"parQBaixa",  // Nome Interno do arquivo
			"a_qbaixa",  // Nome deste arquivo Php que contém o arquivo
			"QBaixa",  // Nome do arquivo acentuado-se
			listaCampos_parQBaixa( "" ), 40
		);
		$this->temLog = false;
	}

}
?>
