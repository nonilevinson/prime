<?php

/*=========================================================================
  a_usucco - UsuCCor
=========================================================================*/

if( DEF_a_usucco == 1 )
  return;
define( "DEF_a_usucco", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_usucco_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Usuario
//======================================================

class campo_arqUsuCCor_Usuario extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Usuario", "Usuario", "Usuario", EH_CHAVE, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Usuario_Usuario
//======================================================

class campo_arqUsuCCor_Usuario_Usuario extends Lance_CampoCadeia
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
//	Campo CCor
//======================================================

class campo_arqUsuCCor_CCor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "CCor", "CCor", "CCor", EH_CHAVE, "arqCCor", "arqCCor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Conta corrente" );
	}

}

//======================================================
//	Campo CCor_Nome
//======================================================

class campo_arqUsuCCor_CCor_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CCor_Nome", "CCor_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "CCor", false );
	}

}

//======================================================
//	Arquivo arqUsuCCor
//======================================================
function listaCampos_arqUsuCCor( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqUsuCCor_Usuario(),
			new campo_arqUsuCCor_Usuario_Usuario(),
			new campo_arqUsuCCor_CCor(),
			new campo_arqUsuCCor_CCor_Nome() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqUsuCCor extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqUsuCCor",  // Nome Interno do arquivo
			"a_usucco",  // Nome deste arquivo Php que contém o arquivo
			"UsuCCor",  // Nome do arquivo acentuado-se
			listaCampos_arqUsuCCor( "" ), 59
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Usuario_Usuario, CCor_Nome ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Usuario_Usuario ];
			$vetAux[] = [ CCor_Nome ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Usuario ], [ CCor ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Usuario_Usuario ];
			$vetAux[] = [ CCor_Nome ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Usuários e contas correntes' );
	}

	//-------------------------------------------------------------
	// Texto que acompanha o nome do arquivo no cabeçalho
	//-------------------------------------------------------------
	function TxtCabArquivo()
	{
		return( 'exibir_Titulo()' );
	}

}
