<?php

/*=========================================================================
  a_cidade - Cidade
=========================================================================*/

if( DEF_a_cidade == 1 )
  return;
define( "DEF_a_cidade", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_cidade_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo UF
//======================================================

class campo_arqCidade_UF extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "UF", "UF", "UF", EH_CHAVE, "tabUF", "idPrimario", LANCE_LIG_SELECAO, 1, 0, false );
	}

}

//======================================================
//	Campo Cidade
//======================================================

class campo_arqCidade_Cidade extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cidade", "Cidade", "Cidade", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo DDD
//======================================================

class campo_arqCidade_DDD extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "DDD", "DDD", "DDD", 2, "#z", "", "", 0, 0, false );
	}

}

//======================================================
//	Arquivo arqCidade
//======================================================
function listaCampos_arqCidade( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqCidade_UF(),
			new Lance_CampoCadeia( "UF_Chave", "UF_Chave", "Chave", 2, "xx", EH_CHAVE, UF ),
			new Lance_CampoCadeia( "UF_Descritor", "UF_Descritor", "Descritor", 19, "xxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, UF ),
			new campo_arqCidade_Cidade(),
			new campo_arqCidade_DDD() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqCidade extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqCidade",  // Nome Interno do arquivo
			"a_cidade",  // Nome deste arquivo Php que contém o arquivo
			"Cidade",  // Nome do arquivo acentuado-se
			listaCampos_arqCidade( "" ), 2
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ UF_Chave, Cidade ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ UF_Chave ];
			$vetAux[] = [ Cidade ];
			$vetAux[] = [ DDD ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ UF ], [ UF_Chave ], [ UF_Descritor ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ UF_Chave ];
			$vetAux[] = [ Cidade ];
			$vetAux[] = [ DDD ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Cidades' );
	}

}
