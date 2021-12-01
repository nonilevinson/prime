<?php

/*=========================================================================
  a_cmedic - CMedica
=========================================================================*/

if( DEF_a_cmedic == 1 )
  return;
define( "DEF_a_cmedic", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_cmedic_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Consulta
//======================================================

class campo_arqCMedica_Consulta extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Consulta", "Consulta", "Consulta", EH_CHAVE, "arqConsulta", "arqConsulta.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Consulta_Num
//======================================================

class campo_arqCMedica_Consulta_Num extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Consulta_Num", "Consulta_Num", "Num", 6, "###.##z", "", "", EH_CHAVE, "Consulta", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "N°" );
	}

}

//======================================================
//	Campo Medicamen
//======================================================

class campo_arqCMedica_Medicamen extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Medicamen", "Medicamen", "Medicamen", EH_CHAVE, "arqMedicamen", "arqMedicamen.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Medicação" );
	}

	//--------------------------------------------------
	function PegaPai()
	{
		global $g_regAtual;
		$vetPai = array();
			array_push( $vetPai, 
				array( "Unidade", 
					"A.Medicamen, arqMedicamen.Unidade, arqUnidade",
					"1" ) );
		return( $vetPai );
	}

}

//======================================================
//	Campo Medicamen_Medicamen
//======================================================

class campo_arqCMedica_Medicamen_Medicamen extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Medicamen_Medicamen", "Medicamen_Medicamen", "Medicamen", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Medicamen", false );
	}

}

//======================================================
//	Campo UnidadeCal
//======================================================

class campo_arqCMedica_UnidadeCal extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "UnidadeCal", "UnidadeCal", "UnidadeCal", 10, "xxxxxxxxxx", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Unidade" );
	}

}

//======================================================
//	Campo Qtd
//======================================================

class campo_arqCMedica_Qtd extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Qtd", "Qtd", "Qtd", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Arquivo arqCMedica
//======================================================
function listaCampos_arqCMedica( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqCMedica_Consulta(),
			new campo_arqCMedica_Consulta_Num(),
			new campo_arqCMedica_Medicamen(),
			new campo_arqCMedica_Medicamen_Medicamen(),
			new campo_arqCMedica_UnidadeCal(),
			new campo_arqCMedica_Qtd() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqCMedica extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqCMedica",  // Nome Interno do arquivo
			"a_cmedic",  // Nome deste arquivo Php que contém o arquivo
			"CMedica",  // Nome do arquivo acentuado-se
			listaCampos_arqCMedica( "" ), 54
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Consulta_Num, Medicamen_Medicamen) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Consulta_Num ) );
			array_push( $vetAux, array( Medicamen_Medicamen ) );
			array_push( $vetAux, array( UnidadeCal ) );
			array_push( $vetAux, array( Qtd ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( Consulta ), array( Medicamen ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Consulta_Num ) );
			array_push( $vetAux, array( Medicamen_Medicamen ) );
			array_push( $vetAux, array( UnidadeCal ) );
			array_push( $vetAux, array( Qtd ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Medicação da consulta' );
	}

}
?>
