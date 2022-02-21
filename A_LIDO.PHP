<?php

/*=========================================================================
  a_lido - Lido
=========================================================================*/

if( DEF_a_lido == 1 )
  return;
define( "DEF_a_lido", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_lido_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Avisos
//======================================================

class campo_arqLido_Avisos extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Avisos", "Avisos", "Avisos", EH_CHAVE, "arqAvisos", "arqAvisos.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Avisos_Numero
//======================================================

class campo_arqLido_Avisos_Numero extends Lance_CampoNumerico
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
//	Campo Usuario
//======================================================

class campo_arqLido_Usuario extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Usuario", "Usuario", "Usuario", EH_CHAVE, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function PegaPai()
	{
		global $g_regAtual;
		$vetPai = [];
			$vetPai[]=
				[ "Grupo", 
					"A.Usuario, arqUsuario.Grupo, arqGrupo",
					"1" ];
		return( $vetPai );
	}

}

//======================================================
//	Campo Usuario_Usuario
//======================================================

class campo_arqLido_Usuario_Usuario extends Lance_CampoCadeia
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
//	Campo Grupo
//======================================================

class campo_arqLido_Grupo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Grupo", "Grupo", "Grupo", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Data
//======================================================

class campo_arqLido_Data extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Data", "Data", "Data", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Lido em" );
	}

}

//======================================================
//	Arquivo arqLido
//======================================================
function listaCampos_arqLido( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqLido_Avisos(),
			new campo_arqLido_Avisos_Numero(),
			new campo_arqLido_Usuario(),
			new campo_arqLido_Usuario_Usuario(),
			new campo_arqLido_Grupo(),
			new campo_arqLido_Data() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqLido extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqLido",  // Nome Interno do arquivo
			"a_lido",  // Nome deste arquivo Php que contém o arquivo
			"Lido",  // Nome do arquivo acentuado-se
			listaCampos_arqLido( "" ), 16
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Avisos_Numero, Usuario_Usuario ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Avisos_Numero ];
			$vetAux[] = [ Usuario_Usuario ];
			$vetAux[] = [ Grupo ];
			$vetAux[] = [ Data ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Avisos ], [ Usuario ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Avisos_Numero ];
			$vetAux[] = [ Usuario_Usuario ];
			$vetAux[] = [ Grupo ];
			$vetAux[] = [ Data ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Lidos' );
	}

}
