<?php

/*=========================================================================
  a_banco - Banco
=========================================================================*/

if( DEF_a_banco == 1 )
  return;
define( "DEF_a_banco", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_banco_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Num
//======================================================

class campo_arqBanco_Num extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Num", "Num", "Num", 3, "##z", "", "", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "N° Banco" );
	}

}

//======================================================
//	Campo Banco
//======================================================

class campo_arqBanco_Banco extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Banco", "Banco", "Banco", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, 0, false );
	}

}

//======================================================
//	Arquivo arqBanco
//======================================================
function listaCampos_arqBanco( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqBanco_Num(),
			new campo_arqBanco_Banco() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqBanco extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqBanco",  // Nome Interno do arquivo
			"a_banco",  // Nome deste arquivo Php que contém o arquivo
			"Banco",  // Nome do arquivo acentuado-se
			listaCampos_arqBanco( "" ), 19
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Num ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Num ];
			$vetAux[] = [ Banco ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Num ];
			$vetAux[] = [ Banco ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Bancos' );
	}

}
