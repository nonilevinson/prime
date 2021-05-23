<?php

/*=========================================================================
  a_paragr - ParaGrupo
=========================================================================*/

if( DEF_a_paragr == 1 )
  return;
define( "DEF_a_paragr", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_paragr_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Avisos
//======================================================

class campo_arqParaGrupo_Avisos extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Avisos", "Avisos", "Avisos", EH_CHAVE, "arqAvisos", "arqAvisos.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Avisos_Numero
//======================================================

class campo_arqParaGrupo_Avisos_Numero extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Avisos_Numero", "Avisos_Numero", "Numero", 6, "###.##z", "", "", EH_CHAVE, "Avisos", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "N°" );
	}

}

//======================================================
//	Campo Grupo
//======================================================

class campo_arqParaGrupo_Grupo extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Grupo", "Grupo", "Grupo", EH_CHAVE, "arqGrupo", "arqGrupo.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Grupo_Grupo
//======================================================

class campo_arqParaGrupo_Grupo_Grupo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Grupo_Grupo", "Grupo_Grupo", "Grupo", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Grupo", false );
	}

}

//======================================================
//	Campo Usuario
//======================================================

class campo_arqParaGrupo_Usuario extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Usuario", "Usuario", "Usuario", EH_CHAVE, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Usuário" );
	}

}

//======================================================
//	Campo Usuario_Usuario
//======================================================

class campo_arqParaGrupo_Usuario_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Usuario_Usuario", "Usuario_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Usuario", false );
	}

}

//======================================================
//	Arquivo arqParaGrupo
//======================================================
function listaCampos_arqParaGrupo( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqParaGrupo_Avisos(),
			new campo_arqParaGrupo_Avisos_Numero(),
			new campo_arqParaGrupo_Grupo(),
			new campo_arqParaGrupo_Grupo_Grupo(),
			new campo_arqParaGrupo_Usuario(),
			new campo_arqParaGrupo_Usuario_Usuario() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqParaGrupo extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqParaGrupo",  // Nome Interno do arquivo
			"a_paragr",  // Nome deste arquivo Php que contém o arquivo
			"ParaGrupo",  // Nome do arquivo acentuado-se
			listaCampos_arqParaGrupo( "" ), 15
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Avisos_Numero, Grupo_Grupo, Usuario_Usuario) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Avisos_Numero ) );
			array_push( $vetAux, array( Grupo_Grupo ) );
			array_push( $vetAux, array( Usuario_Usuario ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( Avisos ), array( Grupo ), array( Usuario ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Avisos_Numero ) );
			array_push( $vetAux, array( Grupo_Grupo ) );
			array_push( $vetAux, array( Usuario_Usuario ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Acionar
	//-------------------------------------------------------------
	function AcionarBotao( $p_tecla )
	{
		switch( $p_tecla )
		{
			case _GRAVAR: return( GrupoAtualEm() );
		}
		return( parent::AcionarBotao( $p_tecla ) );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Para' );
	}

}
?>
