<?php

/*=========================================================================
  a_comcal - ComCall
=========================================================================*/

if( DEF_a_comcal == 1 )
  return;
define( "DEF_a_comcal", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_comcal_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Clinica
//======================================================

class campo_arqComCall_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", EH_CHAVE, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqComCall_Clinica_Clinica extends Lance_CampoCadeia
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
//	Campo Mes
//======================================================

class campo_arqComCall_Mes extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Mes", "Mes", "Mes", 4, "mm/aa", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo TrgQtoFx
//======================================================

class campo_arqComCall_TrgQtoFx extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "TrgQtoFx", "TrgQtoFx", "TrgQtoFx", 2, "#z", "", "", EH_TOTALIZADO, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->TRGQTOFX == 0 )
			return( "VermelhoFundoCentro" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Qtd Faixas" );
	}

}

//======================================================
//	Arquivo arqComCall
//======================================================
function listaCampos_arqComCall( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqComCall_Clinica(),
			new campo_arqComCall_Clinica_Clinica(),
			new campo_arqComCall_Mes(),
			new campo_arqComCall_TrgQtoFx() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqComCall extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqComCall",  // Nome Interno do arquivo
			"a_comcal",  // Nome deste arquivo Php que contém o arquivo
			"ComCall",  // Nome do arquivo acentuado-se
			listaCampos_arqComCall( "" ), 49
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Clinica_Clinica, Mes) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Clinica_Clinica ) );
			array_push( $vetAux, array( Mes ) );
			array_push( $vetAux, array( TrgQtoFx ) );
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
			array_push( $vetAux, array( Clinica_Clinica ) );
			array_push( $vetAux, array( Mes ) );
			array_push( $vetAux, array( TrgQtoFx ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Comissões do Call Center' );
	}

}
?>
