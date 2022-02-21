<?php

/*=========================================================================
  a_usucli - UsuCli
=========================================================================*/

if( DEF_a_usucli == 1 )
  return;
define( "DEF_a_usucli", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_usucli_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Usuario
//======================================================

class campo_arqUsuCli_Usuario extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Usuario", "Usuario", "Usuario", EH_CHAVE, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Usuario_Usuario
//======================================================

class campo_arqUsuCli_Usuario_Usuario extends Lance_CampoCadeia
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
//	Campo Clinica
//======================================================

class campo_arqUsuCli_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", EH_CHAVE, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqUsuCli_Clinica_Clinica extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Clinica_Clinica", "Clinica_Clinica", "Clinica", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Clinica", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Clínica" );
	}

}

//======================================================
//	Arquivo arqUsuCli
//======================================================
function listaCampos_arqUsuCli( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqUsuCli_Usuario(),
			new campo_arqUsuCli_Usuario_Usuario(),
			new campo_arqUsuCli_Clinica(),
			new campo_arqUsuCli_Clinica_Clinica() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqUsuCli extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqUsuCli",  // Nome Interno do arquivo
			"a_usucli",  // Nome deste arquivo Php que contém o arquivo
			"UsuCli",  // Nome do arquivo acentuado-se
			listaCampos_arqUsuCli( "" ), 35
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Usuario_Usuario, Clinica_Clinica ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Usuario_Usuario ];
			$vetAux[] = [ Clinica_Clinica ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Usuario ], [ Clinica ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Usuario_Usuario ];
			$vetAux[] = [ Clinica_Clinica ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Usuários e clínicas' );
	}

	//-------------------------------------------------------------
	// Texto que acompanha o nome do arquivo no cabeçalho
	//-------------------------------------------------------------
	function TxtCabArquivo()
	{
		return( 'exibir_Titulo()' );
	}

}
