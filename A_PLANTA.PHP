<?php

/*=========================================================================
  a_planta - Plantao
=========================================================================*/

if( DEF_a_planta == 1 )
  return;
define( "DEF_a_planta", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_planta_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Clinica
//======================================================

class campo_arqPlantao_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqPlantao_Clinica_Clinica extends Lance_CampoCadeia
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
//	Campo DataIni
//======================================================

class campo_arqPlantao_DataIni extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataIni", "DataIni", "DataIni", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Início" );
	}

}

//======================================================
//	Campo DataFim
//======================================================

class campo_arqPlantao_DataFim extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataFim", "DataFim", "DataFim", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Fim" );
	}

}

//======================================================
//	Campo TDiaSem
//======================================================

class campo_arqPlantao_TDiaSem extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TDiaSem", "TDiaSem", "TDiaSem", 0, "tabTDiaSem", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Dia" );
	}

}

//======================================================
//	Campo Usuario
//======================================================

class campo_arqPlantao_Usuario extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Usuario", "Usuario", "Usuario", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Médico" );
	}

}

//======================================================
//	Campo Usuario_Usuario
//======================================================

class campo_arqPlantao_Usuario_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Usuario_Usuario", "Usuario_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Usuario", false );
	}

}

//======================================================
//	Arquivo arqPlantao
//======================================================
function listaCampos_arqPlantao( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqPlantao_Clinica(),
			new campo_arqPlantao_Clinica_Clinica(),
			new campo_arqPlantao_DataIni(),
			new campo_arqPlantao_DataFim(),
			new campo_arqPlantao_TDiaSem(),
			new Lance_CampoCadeia( "TDiaSem_Chave", "TDiaSem_Chave", "Chave", 1, "x", EH_CHAVE, TDiaSem ),
			new Lance_CampoCadeia( "TDiaSem_Descritor", "TDiaSem_Descritor", "Descritor", 8, "xxxxxxxx", EH_DESCRITOR, TDiaSem ),
			new campo_arqPlantao_Usuario(),
			new campo_arqPlantao_Usuario_Usuario() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqPlantao extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqPlantao",  // Nome Interno do arquivo
			"a_planta",  // Nome deste arquivo Php que contém o arquivo
			"Plantao",  // Nome do arquivo acentuado-se
			listaCampos_arqPlantao( "" ), 41
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
			array_push( $vetAux, array( Clinica_Clinica ) );
			array_push( $vetAux, array( DataIni ) );
			array_push( $vetAux, array( DataFim ) );
			array_push( $vetAux, array( TDiaSem_Descritor ) );
			array_push( $vetAux, array( Usuario_Usuario ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( Clinica ), array( TDiaSem ), array( TDiaSem_Chave ), array( TDiaSem_Descritor ), array( Usuario ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Clinica_Clinica ) );
			array_push( $vetAux, array( DataIni ) );
			array_push( $vetAux, array( DataFim ) );
			array_push( $vetAux, array( TDiaSem_Descritor ) );
			array_push( $vetAux, array( Usuario_Usuario ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Plantão' );
	}

}
?>
