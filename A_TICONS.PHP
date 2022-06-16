<?php

/*=========================================================================
  a_ticons - TiConsulta
=========================================================================*/

if( DEF_a_ticons == 1 )
  return;
define( "DEF_a_ticons", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_ticons_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo TiConsulta
//======================================================

class campo_arqTiConsulta_TiConsulta extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "TiConsulta", "TiConsulta", "TiConsulta", 15, "xxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqTiConsulta_Ativo extends Lance_CampoLogico
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
//	Arquivo arqTiConsulta
//======================================================
function listaCampos_arqTiConsulta( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqTiConsulta_TiConsulta(),
			new campo_arqTiConsulta_Ativo() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqTiConsulta extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqTiConsulta",  // Nome Interno do arquivo
			"a_ticons",  // Nome deste arquivo Php que contém o arquivo
			"TiConsulta",  // Nome do arquivo acentuado-se
			listaCampos_arqTiConsulta( "" ), 60
		);
		$this->temLog = false;
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ TiConsulta ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ TiConsulta ];
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
			$vetAux[] = [ TiConsulta ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Tipos de consultas' );
	}

}
