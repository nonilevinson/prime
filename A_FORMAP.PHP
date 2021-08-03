<?php

/*=========================================================================
  a_formap - FormaPg
=========================================================================*/

if( DEF_a_formap == 1 )
  return;
define( "DEF_a_formap", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_formap_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo FormaPg
//======================================================

class campo_arqFormaPg_FormaPg extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "FormaPg", "FormaPg", "FormaPg", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Forma" );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqFormaPg_Ativo extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Ativo", "Ativo", "Ativo", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->ATIVO == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Ativo?" );
	}

}

//======================================================
//	Arquivo arqFormaPg
//======================================================
function listaCampos_arqFormaPg( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqFormaPg_FormaPg(),
			new campo_arqFormaPg_Ativo() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqFormaPg extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqFormaPg",  // Nome Interno do arquivo
			"a_formap",  // Nome deste arquivo Php que contém o arquivo
			"FormaPg",  // Nome do arquivo acentuado-se
			listaCampos_arqFormaPg( "" ), 44
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( FormaPg) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( FormaPg ) );
			array_push( $vetAux, array( Ativo ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( FormaPg ) );
			array_push( $vetAux, array( Ativo ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Formas de pagamento de consultas' );
	}

}
?>
