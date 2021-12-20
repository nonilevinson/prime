<?php

/*=========================================================================
  a_itemmo - ItemMov
=========================================================================*/

if( DEF_a_itemmo == 1 )
  return;
define( "DEF_a_itemmo", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_itemmo_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo MovEstoque
//======================================================

class campo_arqItemMov_MovEstoque extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "MovEstoque", "MovEstoque", "MovEstoque", EH_CHAVE, "arqMovEstoque", "arqMovEstoque.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo MovEstoque_Num
//======================================================

class campo_arqItemMov_MovEstoque_Num extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "MovEstoque_Num", "MovEstoque_Num", "Num", 9, "###.###.##z", "", "", EH_CHAVE, "MovEstoque", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "N°" );
	}

}

//======================================================
//	Campo Item
//======================================================

class campo_arqItemMov_Item extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Item", "Item", "Item", 3, "##z", "", "", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo Lote
//======================================================

class campo_arqItemMov_Lote extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Lote", "Lote", "Lote", 0, "arqLote", "arqLote.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Lote_Medicam
//======================================================

class campo_arqItemMov_Lote_Medicam extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Lote_Medicam", "Lote_Medicam", "Medicam", EH_CHAVE, "arqMedicamen", "arqMedicamen.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, "Lote", false );
	}

}

//======================================================
//	Campo Lote_Medicam_Medicamen
//======================================================

class campo_arqItemMov_Lote_Medicam_Medicamen extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Lote_Medicam_Medicamen", "Lote_Medicam_Medicamen", "Medicamen", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Lote_Medicam", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Medicamento" );
	}

}

//======================================================
//	Campo Lote_Lote
//======================================================

class campo_arqItemMov_Lote_Lote extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Lote_Lote", "Lote_Lote", "Lote", 15, "xxxxxxxxxxxxxxx", EH_CHAVE, "Lote", false );
	}

}

//======================================================
//	Campo TMov
//======================================================

class campo_arqItemMov_TMov extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TMov", "TMov", "TMov", 0, "tabTMov", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->TMOV == 2 )
			return( "AzulEsq" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Tipo" );
	}

}

//======================================================
//	Campo Qtd
//======================================================

class campo_arqItemMov_Qtd extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Qtd", "Qtd", "Qtd", 4, "#.##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo QtdCalc
//======================================================

class campo_arqItemMov_QtdCalc extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "QtdCalc", "QtdCalc", "QtdCalc", 4, "#.##z", "", "", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function EhForm()
	{
		global $g_regAtual;
		return( (false) );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Qtd" );
	}

}

//======================================================
//	Campo CUnidade
//======================================================

class campo_arqItemMov_CUnidade extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CUnidade", "CUnidade", "CUnidade", 10, "xxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Arquivo arqItemMov
//======================================================
function listaCampos_arqItemMov( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqItemMov_MovEstoque(),
			new campo_arqItemMov_MovEstoque_Num(),
			new campo_arqItemMov_Item(),
			new campo_arqItemMov_Lote(),
			new campo_arqItemMov_Lote_Medicam(),
			new campo_arqItemMov_Lote_Medicam_Medicamen(),
			new campo_arqItemMov_Lote_Lote(),
			new campo_arqItemMov_TMov(),
			new Lance_CampoCadeia( "TMov_Chave", "TMov_Chave", "Chave", 1, "x", EH_CHAVE, TMov ),
			new Lance_CampoCadeia( "TMov_Descritor", "TMov_Descritor", "Descritor", 19, "xxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, TMov ),
			new campo_arqItemMov_Qtd(),
			new campo_arqItemMov_QtdCalc(),
			new campo_arqItemMov_CUnidade() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqItemMov extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqItemMov",  // Nome Interno do arquivo
			"a_itemmo",  // Nome deste arquivo Php que contém o arquivo
			"ItemMov",  // Nome do arquivo acentuado-se
			listaCampos_arqItemMov( "" ), 57
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( MovEstoque_Num, Item) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( MovEstoque_Num ) );
			array_push( $vetAux, array( Item ) );
			array_push( $vetAux, array( Lote_Medicam_Medicamen ) );
			array_push( $vetAux, array( Lote_Lote ) );
			array_push( $vetAux, array( TMov_Descritor ) );
			array_push( $vetAux, array( QtdCalc ) );
			array_push( $vetAux, array( CUnidade ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( MovEstoque ), array( Lote ), array( TMov ), array( TMov_Chave ), array( TMov_Descritor ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( MovEstoque_Num ) );
			array_push( $vetAux, array( Item ) );
			array_push( $vetAux, array( Lote_Medicam_Medicamen ) );
			array_push( $vetAux, array( Lote_Lote ) );
			array_push( $vetAux, array( TMov_Descritor ) );
			array_push( $vetAux, array( Qtd ) );
			array_push( $vetAux, array( QtdCalc ) );
			array_push( $vetAux, array( CUnidade ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Acionar
	//-------------------------------------------------------------
	function AcionarBotao( $p_tecla )
	{
		switch( $p_tecla )
		{
			case _GRAVAR: return( MovAberto() == '' );
		}
		return( parent::AcionarBotao( $p_tecla ) );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Itens' );
	}

}
?>
