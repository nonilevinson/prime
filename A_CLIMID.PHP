<?php

/*=========================================================================
  a_climid - CliMidia
=========================================================================*/

if( DEF_a_climid == 1 )
  return;
define( "DEF_a_climid", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_climid_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Clinica
//======================================================

class campo_arqCliMidia_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", EH_CHAVE, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqCliMidia_Clinica_Clinica extends Lance_CampoCadeia
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
//	Campo Midia
//======================================================

class campo_arqCliMidia_Midia extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Midia", "Midia", "Midia", EH_CHAVE, "arqMidia", "arqMidia.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Midia_Midia
//======================================================

class campo_arqCliMidia_Midia_Midia extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Midia_Midia", "Midia_Midia", "Midia", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Midia", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Mídia" );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqCliMidia_Ativo extends Lance_CampoLogico
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
//	Arquivo arqCliMidia
//======================================================
function listaCampos_arqCliMidia( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqCliMidia_Clinica(),
			new campo_arqCliMidia_Clinica_Clinica(),
			new campo_arqCliMidia_Midia(),
			new campo_arqCliMidia_Midia_Midia(),
			new campo_arqCliMidia_Ativo() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqCliMidia extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqCliMidia",  // Nome Interno do arquivo
			"a_climid",  // Nome deste arquivo Php que contém o arquivo
			"CliMidia",  // Nome do arquivo acentuado-se
			listaCampos_arqCliMidia( "" ), 47
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Clinica_Clinica, Midia_Midia ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ Midia_Midia ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Clinica ], [ Midia ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ Midia_Midia ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Mídias / Clínicas' );
	}

}
