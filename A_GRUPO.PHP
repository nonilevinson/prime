<?php

/*=========================================================================
  a_grupo - Grupo
=========================================================================*/

if( DEF_a_grupo == 1 )
  return;
define( "DEF_a_grupo", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_grupo_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Grupo
//======================================================

class campo_arqGrupo_Grupo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Grupo", "Grupo", "Grupo", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Arquivo arqGrupo
//======================================================
function listaCampos_arqGrupo( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqGrupo_Grupo() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqGrupo extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqGrupo",  // Nome Interno do arquivo
			"a_grupo",  // Nome deste arquivo Php que contém o arquivo
			"Grupo",  // Nome do arquivo acentuado-se
			listaCampos_arqGrupo( "" ), 4
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Grupo) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Grupo ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Grupo ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Grupos de acesso' );
	}

	//-------------------------------------------------------------
	// Texto que acompanha o nome do arquivo no cabeçalho
	//-------------------------------------------------------------
	function TxtCabArquivo()
	{
		return( 'exibir_Texto()' );
	}

}
?>
