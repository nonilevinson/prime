<?php

/*=========================================================================
  a_templa - Template
=========================================================================*/

if( DEF_a_templa == 1 )
  return;
define( "DEF_a_templa", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_templa_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Nome
//======================================================

class campo_arqTemplate_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Nome", "Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo Template
//======================================================

class campo_arqTemplate_Template extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Template", "Template", "Template", 21,80, false, false );
	}

}

//======================================================
//	Arquivo arqTemplate
//======================================================
function listaCampos_arqTemplate( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqTemplate_Nome(),
			new campo_arqTemplate_Template() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqTemplate extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqTemplate",  // Nome Interno do arquivo
			"a_templa",  // Nome deste arquivo Php que contém o arquivo
			"Template",  // Nome do arquivo acentuado-se
			listaCampos_arqTemplate( "" ), 8
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Nome) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Nome ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Nome ) );
			array_push( $vetAux, array( Template ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Templates' );
	}

}
?>
