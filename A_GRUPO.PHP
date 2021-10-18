<?php

/*=========================================================================
  a_grupo - Grupo
=========================================================================*/

if( DEF_a_grupo == 1 )
  return;
define( "DEF_a_grupo", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_grupo_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Grupo
//======================================================

class campo_arqGrupo_Grupo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Grupo", "Grupo", "Grupo", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo CallCenter
//======================================================

class campo_arqGrupo_CallCenter extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "CallCenter", "CallCenter", "CallCenter", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->CALLCENTER == 1 )
			return( "CorAtivo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Call center?" );
	}

}

//======================================================
//	Campo Medico
//======================================================

class campo_arqGrupo_Medico extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Medico", "Medico", "Medico", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->MEDICO == 1 )
			return( "CorAtivo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Médico?" );
	}

}

//======================================================
//	Campo Assessor
//======================================================

class campo_arqGrupo_Assessor extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Assessor", "Assessor", "Assessor", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->ASSESSOR == 1 )
			return( "CorAtivo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Assessor?" );
	}

}

//======================================================
//	Arquivo arqGrupo
//======================================================
function listaCampos_arqGrupo( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqGrupo_Grupo(),
			new campo_arqGrupo_CallCenter(),
			new campo_arqGrupo_Medico(),
			new campo_arqGrupo_Assessor() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqGrupo extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqGrupo",  // Nome Interno do arquivo
			"a_grupo",  // Nome deste arquivo Php que contém o arquivo
			"Grupo",  // Nome do arquivo acentuado-se
			listaCampos_arqGrupo( "" ), 4
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Grupo) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Grupo ) );
			array_push( $vetAux, array( CallCenter ) );
			array_push( $vetAux, array( Medico ) );
			array_push( $vetAux, array( Assessor ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Grupo ) );
			array_push( $vetAux, array( CallCenter ) );
			array_push( $vetAux, array( Medico ) );
			array_push( $vetAux, array( Assessor ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Grupos de acesso' );
	}

	//-------------------------------------------------------------
	// Texto que acompanha o nome do arquivo no cabeçalho
	//-------------------------------------------------------------
	function TxtCabArquivo()
	{
		return( 'exibir_Texto()' );
	}

}
?>
