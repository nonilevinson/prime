<?php

/*=========================================================================
  a_tiagen - TiAgenda
=========================================================================*/

if( DEF_a_tiagen == 1 )
  return;
define( "DEF_a_tiagen", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_tiagen_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo TiAgenda
//======================================================

class campo_arqTiAgenda_TiAgenda extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "TiAgenda", "TiAgenda", "TiAgenda", 20, "xxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Tipo" );
	}

}

//======================================================
//	Campo DobroTempo
//======================================================

class campo_arqTiAgenda_DobroTempo extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "DobroTempo", "DobroTempo", "DobroTempo", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->DOBROTEMPO == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Dobro do tempo?" );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqTiAgenda_Ativo extends Lance_CampoLogico
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
//	Arquivo arqTiAgenda
//======================================================
function listaCampos_arqTiAgenda( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqTiAgenda_TiAgenda(),
			new campo_arqTiAgenda_DobroTempo(),
			new campo_arqTiAgenda_Ativo() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqTiAgenda extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqTiAgenda",  // Nome Interno do arquivo
			"a_tiagen",  // Nome deste arquivo Php que contém o arquivo
			"TiAgenda",  // Nome do arquivo acentuado-se
			listaCampos_arqTiAgenda( "" ), 43
		);
		$this->temLog = false;
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( TiAgenda) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( TiAgenda ) );
			array_push( $vetAux, array( DobroTempo ) );
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
			array_push( $vetAux, array( TiAgenda ) );
			array_push( $vetAux, array( DobroTempo ) );
			array_push( $vetAux, array( Ativo ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Tipos de agendas' );
	}

}
?>
