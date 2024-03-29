<?php

/*=========================================================================
  a_midia - Midia
=========================================================================*/

if( DEF_a_midia == 1 )
  return;
define( "DEF_a_midia", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_midia_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Midia
//======================================================

class campo_arqMidia_Midia extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Midia", "Midia", "Midia", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "M�dia" );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqMidia_Ativo extends Lance_CampoLogico
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
			return( "CorInativa" );
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
//	Arquivo arqMidia
//======================================================
function listaCampos_arqMidia( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqMidia_Midia(),
			new campo_arqMidia_Ativo() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqMidia extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqMidia",  // Nome Interno do arquivo
			"a_midia",  // Nome deste arquivo Php que cont�m o arquivo
			"Midia",  // Nome do arquivo acentuado-se
			listaCampos_arqMidia( "" ), 30
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave �nica
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Midia ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Midia ];
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
			$vetAux[] = [ Midia ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabe�alho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'M�dias' );
	}

}
