<?php

/*=========================================================================
  a_plano - Plano
=========================================================================*/

if( DEF_a_plano == 1 )
  return;
define( "DEF_a_plano", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_plano_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo CodPlano
//======================================================

class campo_arqPlano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "CodPlano", "CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Plano
//======================================================

class campo_arqPlano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Plano", "Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, 0, false );
	}

}

//======================================================
//	Campo TPgRec
//======================================================

class campo_arqPlano_TPgRec extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TPgRec", "TPgRec", "TPgRec", 0, "tabTPgRec", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Tipo" );
	}

}

//======================================================
//	Arquivo arqPlano
//======================================================
function listaCampos_arqPlano( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqPlano_CodPlano(),
			new campo_arqPlano_Plano(),
			new campo_arqPlano_TPgRec(),
			new Lance_CampoCadeia( "TPgRec_Chave", "TPgRec_Chave", "Chave", 1, "x", EH_CHAVE, TPgRec ),
			new Lance_CampoCadeia( "TPgRec_Descritor", "TPgRec_Descritor", "Descritor", 7, "xxxxxxx", EH_DESCRITOR, TPgRec ) ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqPlano extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqPlano",  // Nome Interno do arquivo
			"a_plano",  // Nome deste arquivo Php que contém o arquivo
			"Plano",  // Nome do arquivo acentuado-se
			listaCampos_arqPlano( "" ), 27
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ CodPlano ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ CodPlano ];
			$vetAux[] = [ Plano ];
			$vetAux[] = [ TPgRec_Descritor ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ TPgRec ], [ TPgRec_Chave ], [ TPgRec_Descritor ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ CodPlano ];
			$vetAux[] = [ Plano ];
			$vetAux[] = [ TPgRec_Descritor ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Planos de contas' );
	}

}
