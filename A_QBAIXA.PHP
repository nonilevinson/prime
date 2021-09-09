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
//	Campo CCor_Nome
//======================================================

class campo_parQBaixa_CCor_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CCor_Nome", "CCor_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "CCor", false );
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
			new campo_parQBaixa_CCor_Nome(),
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
