<?php

/*=========================================================================
  a_bairro - Bairro
=========================================================================*/

if( DEF_a_bairro == 1 )
  return;
define( "DEF_a_bairro", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_bairro_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Bairro
//======================================================

class campo_arqBairro_Bairro extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Bairro", "Bairro", "Bairro", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Arquivo arqBairro
//======================================================
function listaCampos_arqBairro( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqBairro_Bairro() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqBairro extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqBairro",  // Nome Interno do arquivo
			"a_bairro",  // Nome deste arquivo Php que contém o arquivo
			"Bairro",  // Nome do arquivo acentuado-se
			listaCampos_arqBairro( "" ), 1
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Bairro ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Bairro ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Bairro ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Bairros' );
	}

}
