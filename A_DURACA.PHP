<?php

/*=========================================================================
  a_duraca - Duracao
=========================================================================*/

if( DEF_a_duraca == 1 )
  return;
define( "DEF_a_duraca", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_duraca_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Usuario
//======================================================

class campo_arqDuracao_Usuario extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Usuario", "Usuario", "Usuario", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Usuario_Usuario
//======================================================

class campo_arqDuracao_Usuario_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Usuario_Usuario", "Usuario_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Usuario", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Usuário" );
	}

}

//======================================================
//	Campo Inicio
//======================================================

class campo_arqDuracao_Inicio extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Inicio", "Inicio", "Inicio", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Início" );
	}

}

//======================================================
//	Campo Duracao
//======================================================

class campo_arqDuracao_Duracao extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Duracao", "Duracao", "Duracao", 2, "#z", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Duração" );
	}

}

//======================================================
//	Campo MaxAgenda
//======================================================

class campo_arqDuracao_MaxAgenda extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "MaxAgenda", "MaxAgenda", "MaxAgenda", 3, "##z", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Max Agenda" );
	}

}

//======================================================
//	Arquivo arqDuracao
//======================================================
function listaCampos_arqDuracao( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqDuracao_Usuario(),
			new campo_arqDuracao_Usuario_Usuario(),
			new campo_arqDuracao_Inicio(),
			new campo_arqDuracao_Duracao(),
			new campo_arqDuracao_MaxAgenda() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqDuracao extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqDuracao",  // Nome Interno do arquivo
			"a_duraca",  // Nome deste arquivo Php que contém o arquivo
			"Duracao",  // Nome do arquivo acentuado-se
			listaCampos_arqDuracao( "" ), 38
		);
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
			array_push( $vetAux, array( Usuario_Usuario ) );
			array_push( $vetAux, array( Inicio ) );
			array_push( $vetAux, array( Duracao ) );
			array_push( $vetAux, array( MaxAgenda ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( Usuario ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Usuario_Usuario ) );
			array_push( $vetAux, array( Inicio ) );
			array_push( $vetAux, array( Duracao ) );
			array_push( $vetAux, array( MaxAgenda ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Duração de uma consulta' );
	}

}
?>
