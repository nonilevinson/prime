<?php

/*=========================================================================
  a_subpla - SubPlano
=========================================================================*/

if( DEF_a_subpla == 1 )
  return;
define( "DEF_a_subpla", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_subpla_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Plano
//======================================================

class campo_arqSubPlano_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Plano", "Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, 0, false );
	}

}

//======================================================
//	Campo Plano_CodPlano
//======================================================

class campo_arqSubPlano_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Plano_CodPlano", "Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Plano_Plano
//======================================================

class campo_arqSubPlano_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Plano_Plano", "Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Plano", false );
	}

}

//======================================================
//	Campo Codigo
//======================================================

class campo_arqSubPlano_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Codigo", "Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Nome
//======================================================

class campo_arqSubPlano_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Nome", "Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, 0, false );
	}

}

//======================================================
//	Arquivo arqSubPlano
//======================================================
function listaCampos_arqSubPlano( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqSubPlano_Plano(),
			new campo_arqSubPlano_Plano_CodPlano(),
			new campo_arqSubPlano_Plano_Plano(),
			new campo_arqSubPlano_Codigo(),
			new campo_arqSubPlano_Nome() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqSubPlano extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqSubPlano",  // Nome Interno do arquivo
			"a_subpla",  // Nome deste arquivo Php que contém o arquivo
			"SubPlano",  // Nome do arquivo acentuado-se
			listaCampos_arqSubPlano( "" ), 28
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Plano_CodPlano, Codigo) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Plano_CodPlano ) );
			array_push( $vetAux, array( Plano_Plano ) );
			array_push( $vetAux, array( Codigo ) );
			array_push( $vetAux, array( Nome ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( Plano ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Plano_CodPlano ) );
			array_push( $vetAux, array( Plano_Plano ) );
			array_push( $vetAux, array( Codigo ) );
			array_push( $vetAux, array( Nome ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Subplanos de contas' );
	}

}
?>
