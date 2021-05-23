<?php

/*=========================================================================
  a_indexa - IndexAtua
=========================================================================*/

if( DEF_a_indexa == 1 )
  return;
define( "DEF_a_indexa", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_indexa_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Indice
//======================================================

class campo_arqIndexAtua_Indice extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Indice", "Indice", "Indice", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Índice" );
	}

}

//======================================================
//	Campo Data
//======================================================

class campo_arqIndexAtua_Data extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Data", "Data", "Data", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Dias
//======================================================

class campo_arqIndexAtua_Dias extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Dias", "Dias", "Dias", 2, "#z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo DataProx
//======================================================

class campo_arqIndexAtua_DataProx extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataProx", "DataProx", "DataProx", 8, "dd/mm/aaaa", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Próxima" );
	}

}

//======================================================
//	Campo Estatis
//======================================================

class campo_arqIndexAtua_Estatis extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Estatis", "Estatis", "Estatis", 7, "z,zzzzzz", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Estatística" );
	}

}

//======================================================
//	Arquivo arqIndexAtua
//======================================================
function listaCampos_arqIndexAtua( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqIndexAtua_Indice(),
			new campo_arqIndexAtua_Data(),
			new campo_arqIndexAtua_Dias(),
			new campo_arqIndexAtua_DataProx(),
			new campo_arqIndexAtua_Estatis() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqIndexAtua extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqIndexAtua",  // Nome Interno do arquivo
			"a_indexa",  // Nome deste arquivo Php que contém o arquivo
			"IndexAtua",  // Nome do arquivo acentuado-se
			listaCampos_arqIndexAtua( "" ), 29
		);
		$this->temLog = false;
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( ) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Indice ) );
			array_push( $vetAux, array( Data ) );
			array_push( $vetAux, array( Dias ) );
			array_push( $vetAux, array( DataProx ) );
			array_push( $vetAux, array( Estatis ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Indice ) );
			array_push( $vetAux, array( Data ) );
			array_push( $vetAux, array( Dias ) );
			array_push( $vetAux, array( DataProx ) );
			array_push( $vetAux, array( Estatis ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Atualizações de índices' );
	}

}
?>
