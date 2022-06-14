<?php

/*=========================================================================
  a_medica - Medicamen
=========================================================================*/

if( DEF_a_medica == 1 )
  return;
define( "DEF_a_medica", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_medica_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Medicamen
//======================================================

class campo_arqMedicamen_Medicamen extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Medicamen", "Medicamen", "Medicamen", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Medicamento" );
	}

}

//======================================================
//	Campo Unidade
//======================================================

class campo_arqMedicamen_Unidade extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Unidade", "Unidade", "Unidade", 0, "arqUnidade", "arqUnidade.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Unidade_Unidade
//======================================================

class campo_arqMedicamen_Unidade_Unidade extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Unidade_Unidade", "Unidade_Unidade", "Unidade", 10, "xxxxxxxxxx", EH_CHAVE, "Unidade", false );
	}

}

//======================================================
//	Campo TrgItLote
//======================================================

class campo_arqMedicamen_TrgItLote extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "TrgItLote", "TrgItLote", "TrgItLote", 6, "###.##z", "", "", EH_TOTALIZADO, 0, false );
	}

}

//======================================================
//	Campo TrgCMLote
//======================================================

class campo_arqMedicamen_TrgCMLote extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "TrgCMLote", "TrgCMLote", "TrgCMLote", 6, "###.##z", "", "", EH_TOTALIZADO, 0, false );
	}

}

//======================================================
//	Campo Estoque
//======================================================

class campo_arqMedicamen_Estoque extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Estoque", "Estoque", "Estoque", 6, "###.##z", "(", "", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function PodeTotalizar()
	{
		global $g_regAtual;
		return( (true) );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqMedicamen_Ativo extends Lance_CampoLogico
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
//	Arquivo arqMedicamen
//======================================================
function listaCampos_arqMedicamen( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqMedicamen_Medicamen(),
			new campo_arqMedicamen_Unidade(),
			new campo_arqMedicamen_Unidade_Unidade(),
			new campo_arqMedicamen_TrgItLote(),
			new campo_arqMedicamen_TrgCMLote(),
			new campo_arqMedicamen_Estoque(),
			new campo_arqMedicamen_Ativo() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqMedicamen extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqMedicamen",  // Nome Interno do arquivo
			"a_medica",  // Nome deste arquivo Php que contém o arquivo
			"Medicamen",  // Nome do arquivo acentuado-se
			listaCampos_arqMedicamen( "" ), 52
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Medicamen ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Medicamen ];
			$vetAux[] = [ Unidade_Unidade ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Unidade ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Medicamen ];
			$vetAux[] = [ Unidade_Unidade ];
			$vetAux[] = [ TrgItLote ];
			$vetAux[] = [ TrgCMLote ];
			$vetAux[] = [ Estoque ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Medicamentos' );
	}

}
