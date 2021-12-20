<?php

/*=========================================================================
  a_movest - MovEstoque
=========================================================================*/

if( DEF_a_movest == 1 )
  return;
define( "DEF_a_movest", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_movest_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Num
//======================================================

class campo_arqMovEstoque_Num extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Num", "Num", "Num", 9, "###.###.##z", "", "", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Nª" );
	}

}

//======================================================
//	Campo Clinica
//======================================================

class campo_arqMovEstoque_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Clínica" );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqMovEstoque_Clinica_Clinica extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Clinica_Clinica", "Clinica_Clinica", "Clinica", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Clinica", false );
	}

}

//======================================================
//	Campo Data
//======================================================

class campo_arqMovEstoque_Data extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Data", "Data", "Data", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo NumDoc
//======================================================

class campo_arqMovEstoque_NumDoc extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "NumDoc", "NumDoc", "NumDoc", 15, "###.###.###.###.##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Obs
//======================================================

class campo_arqMovEstoque_Obs extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Obs", "Obs", "Obs", 10,80, false, false );
	}

}

//======================================================
//	Campo Fechado
//======================================================

class campo_arqMovEstoque_Fechado extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Fechado", "Fechado", "Fechado", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->FECHADO == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Fechado?" );
	}

}

//======================================================
//	Arquivo arqMovEstoque
//======================================================
function listaCampos_arqMovEstoque( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqMovEstoque_Num(),
			new campo_arqMovEstoque_Clinica(),
			new campo_arqMovEstoque_Clinica_Clinica(),
			new campo_arqMovEstoque_Data(),
			new campo_arqMovEstoque_NumDoc(),
			new campo_arqMovEstoque_Obs(),
			new campo_arqMovEstoque_Fechado() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqMovEstoque extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqMovEstoque",  // Nome Interno do arquivo
			"a_movest",  // Nome deste arquivo Php que contém o arquivo
			"MovEstoque",  // Nome do arquivo acentuado-se
			listaCampos_arqMovEstoque( "" ), 56
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Num) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Num ) );
			array_push( $vetAux, array( Clinica_Clinica ) );
			array_push( $vetAux, array( Data ) );
			array_push( $vetAux, array( Fechado ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( Clinica ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Num ) );
			array_push( $vetAux, array( Clinica_Clinica ) );
			array_push( $vetAux, array( Data ) );
			array_push( $vetAux, array( NumDoc ) );
			array_push( $vetAux, array( Obs ) );
			array_push( $vetAux, array( Fechado ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Movimentos de estoque' );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: FilSel    
	//-------------------------------------------------------------
	function FilSel()
	{
	return( "~ . filrarSelecao() . ~" );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: FilTodos  
	//-------------------------------------------------------------
	function FilTodos()
	{
	return( "~ . filtrarTodos() . ~" );
	}

}
?>
