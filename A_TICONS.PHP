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
		parent::__construct( "TiConsulta", "TiConsulta", "TiConsulta", 20, "xxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Tipo" );
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
//	Campo AgTopo
//======================================================

class campo_arqTiConsulta_AgTopo extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "AgTopo", "AgTopo", "AgTopo", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( AgendaTopo == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo AgForm
//======================================================

class campo_arqTiConsulta_AgForm extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "AgForm", "AgForm", "AgForm", "", 0, 0, false );
	}

}

//======================================================
//	Campo Pagamento
//======================================================

class campo_arqTiConsulta_Pagamento extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Pagamento", "Pagamento", "Pagamento", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->PAGAMENTO == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo Midia
//======================================================

class campo_arqTiConsulta_Midia extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Midia", "Midia", "Midia", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->MIDIA == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
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
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqTiConsulta_TiConsulta(),
			new campo_arqTiConsulta_Ativo(),
			new campo_arqTiConsulta_AgTopo(),
			new campo_arqTiConsulta_AgForm(),
			new campo_arqTiConsulta_Pagamento(),
			new campo_arqTiConsulta_Midia() )
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
			listaCampos_arqTiConsulta( "" ), 47
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( TiConsulta) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( TiConsulta ) );
			array_push( $vetAux, array( Ativo ) );
			array_push( $vetAux, array( AgTopo ) );
			array_push( $vetAux, array( AgForm ) );
			array_push( $vetAux, array( Pagamento ) );
			array_push( $vetAux, array( Midia ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( TiConsulta ) );
			array_push( $vetAux, array( Ativo ) );
			array_push( $vetAux, array( AgTopo ) );
			array_push( $vetAux, array( AgForm ) );
			array_push( $vetAux, array( Pagamento ) );
			array_push( $vetAux, array( Midia ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Tipos de consulta' );
	}

}
?>
