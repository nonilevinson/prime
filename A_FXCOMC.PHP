<?php

/*=========================================================================
  a_fxcomc - FxComCall
=========================================================================*/

if( DEF_a_fxcomc == 1 )
  return;
define( "DEF_a_fxcomc", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_fxcomc_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo ComCall
//======================================================

class campo_arqFxComCall_ComCall extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "ComCall", "ComCall", "ComCall", EH_CHAVE, "arqComCall", "arqComCall.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo ComCall_Clinica
//======================================================

class campo_arqFxComCall_ComCall_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "ComCall_Clinica", "ComCall_Clinica", "Clinica", EH_CHAVE, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, "ComCall", false );
	}

}

//======================================================
//	Campo ComCall_Clinica_Clinica
//======================================================

class campo_arqFxComCall_ComCall_Clinica_Clinica extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "ComCall_Clinica_Clinica", "ComCall_Clinica_Clinica", "Clinica", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "ComCall_Clinica", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Clínica" );
	}

}

//======================================================
//	Campo ComCall_Mes
//======================================================

class campo_arqFxComCall_ComCall_Mes extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "ComCall_Mes", "ComCall_Mes", "Mes", 4, "mm/aa", EH_CHAVE, "ComCall", false );
	}

}

//======================================================
//	Campo Faixa
//======================================================

class campo_arqFxComCall_Faixa extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Faixa", "Faixa", "Faixa", 2, "#z", "", "", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo PercAte
//======================================================

class campo_arqFxComCall_PercAte extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "PercAte", "PercAte", "PercAte", 4, "#z,zz", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "% Contato/Comparecido" );
	}

}

//======================================================
//	Campo Comissa
//======================================================

class campo_arqFxComCall_Comissa extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Comissa", "Comissa", "Comissa", 4, "#z,zz", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "% Comissão" );
	}

}

//======================================================
//	Arquivo arqFxComCall
//======================================================
function listaCampos_arqFxComCall( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqFxComCall_ComCall(),
			new campo_arqFxComCall_ComCall_Clinica(),
			new campo_arqFxComCall_ComCall_Clinica_Clinica(),
			new campo_arqFxComCall_ComCall_Mes(),
			new campo_arqFxComCall_Faixa(),
			new campo_arqFxComCall_PercAte(),
			new campo_arqFxComCall_Comissa() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqFxComCall extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqFxComCall",  // Nome Interno do arquivo
			"a_fxcomc",  // Nome deste arquivo Php que contém o arquivo
			"FxComCall",  // Nome do arquivo acentuado-se
			listaCampos_arqFxComCall( "" ), 50
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( ComCall_Clinica_Clinica, ComCall_Mes, Faixa) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( ComCall_Clinica_Clinica ) );
			array_push( $vetAux, array( ComCall_Mes ) );
			array_push( $vetAux, array( Faixa ) );
			array_push( $vetAux, array( PercAte ) );
			array_push( $vetAux, array( Comissa ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( ComCall ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( ComCall_Clinica_Clinica ) );
			array_push( $vetAux, array( ComCall_Mes ) );
			array_push( $vetAux, array( Faixa ) );
			array_push( $vetAux, array( PercAte ) );
			array_push( $vetAux, array( Comissa ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Faixas' );
	}

}
?>
