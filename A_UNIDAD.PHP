<?php

/*=========================================================================
  a_unidad - Unidade
=========================================================================*/

if( DEF_a_unidad == 1 )
  return;
define( "DEF_a_unidad", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_unidad_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Unidade
//======================================================

class campo_arqUnidade_Unidade extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Unidade", "Unidade", "Unidade", 10, "xxxxxxxxxx", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqUnidade_Ativo extends Lance_CampoLogico
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
			return( "Ativa?" );
	}

}

//======================================================
//	Arquivo arqUnidade
//======================================================
function listaCampos_arqUnidade( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqUnidade_Unidade(),
			new campo_arqUnidade_Ativo() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqUnidade extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqUnidade",  // Nome Interno do arquivo
			"a_unidad",  // Nome deste arquivo Php que contém o arquivo
			"Unidade",  // Nome do arquivo acentuado-se
			listaCampos_arqUnidade( "" ), 51
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Unidade ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Unidade ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Unidade ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Unidades' );
	}

}
