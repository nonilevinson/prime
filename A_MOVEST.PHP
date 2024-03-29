<?php

/*=========================================================================
  a_movest - MovEstoque
=========================================================================*/

if( DEF_a_movest == 1 )
  return;
define( "DEF_a_movest", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_movest_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Num
//======================================================

class campo_arqMovEstoque_Num extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Num", "Num", "Num", 9, "###.###.##z", "", "", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "N�" );
	}

}

//======================================================
//	Campo Data
//======================================================

class campo_arqMovEstoque_Data extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Data", "Data", "Data", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Clinica
//======================================================

class campo_arqMovEstoque_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Cl�nica" );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqMovEstoque_Clinica_Clinica extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Clinica_Clinica", "Clinica_Clinica", "Clinica", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Clinica", false );
	}

}

//======================================================
//	Campo Fornecedor
//======================================================

class campo_arqMovEstoque_Fornecedor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Fornecedor", "Fornecedor", "Fornecedor", 0, "arqFornecedor", "arqFornecedor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Fornecedor_Nome
//======================================================

class campo_arqMovEstoque_Fornecedor_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Fornecedor_Nome", "Fornecedor_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Fornecedor", false );
	}

}

//======================================================
//	Campo NumDoc
//======================================================

class campo_arqMovEstoque_NumDoc extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "NumDoc", "NumDoc", "NumDoc", 15, "###.###.###.###.##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Obs
//======================================================

class campo_arqMovEstoque_Obs extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Obs", "Obs", "Obs", 10,80, false, false );
	}

}

//======================================================
//	Campo Fechado
//======================================================

class campo_arqMovEstoque_Fechado extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Fechado", "Fechado", "Fechado", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->FECHADO == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Fechado?" );
	}

}

//======================================================
//	Arquivo arqMovEstoque
//======================================================
function listaCampos_arqMovEstoque( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqMovEstoque_Num(),
			new campo_arqMovEstoque_Data(),
			new campo_arqMovEstoque_Clinica(),
			new campo_arqMovEstoque_Clinica_Clinica(),
			new campo_arqMovEstoque_Fornecedor(),
			new campo_arqMovEstoque_Fornecedor_Nome(),
			new campo_arqMovEstoque_NumDoc(),
			new campo_arqMovEstoque_Obs(),
			new campo_arqMovEstoque_Fechado() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqMovEstoque extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqMovEstoque",  // Nome Interno do arquivo
			"a_movest",  // Nome deste arquivo Php que cont�m o arquivo
			"MovEstoque",  // Nome do arquivo acentuado-se
			listaCampos_arqMovEstoque( "" ), 56
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave �nica
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Num ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Num ];
			$vetAux[] = [ Data ];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ Fornecedor_Nome ];
			$vetAux[] = [ Fechado ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Clinica ], [ Fornecedor ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Num ];
			$vetAux[] = [ Data ];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ Fornecedor_Nome ];
			$vetAux[] = [ NumDoc ];
			$vetAux[] = [ Obs ];
			$vetAux[] = [ Fechado ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabe�alho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Movimentos de estoque' );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: FilTodos  
	//-------------------------------------------------------------
	function FilTodos()
	{
	return( "" . filtrarTodos() . "" );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: FilSel    
	//-------------------------------------------------------------
	function FilSel()
	{
	return( "" . filtrarSelecao() . "" );
	}

}
