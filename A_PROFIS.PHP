<?php

/*=========================================================================
  a_profis - Profissao
=========================================================================*/

if( DEF_a_profis == 1 )
  return;
define( "DEF_a_profis", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_profis_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Profissao
//======================================================

class campo_arqProfissao_Profissao extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Profissao", "Profissao", "Profissao", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Profiss�o" );
	}

}

//======================================================
//	Arquivo arqProfissao
//======================================================
function listaCampos_arqProfissao( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqProfissao_Profissao() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqProfissao extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqProfissao",  // Nome Interno do arquivo
			"a_profis",  // Nome deste arquivo Php que cont�m o arquivo
			"Profissao",  // Nome do arquivo acentuado-se
			listaCampos_arqProfissao( "" ), 36
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave �nica
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Profissao) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Profissao ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Profissao ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabe�alho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Profiss�es' );
	}

}
?>