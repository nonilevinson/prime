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

	//--------------------------------------------------
	function PegaPai()
	{
		global $g_regAtual;
		$vetPai = [];
			$vetPai[]=
				[ "Clinica", 
					"A.MovEstoque, arqMovEstoque",
					"0" ];
		return( $vetPai );
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
			return( "N�" );
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
//	Campo Lote_Medicamen
//======================================================

class campo_arqItemMov_Lote_Medicamen extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Lote_Medicamen", "Lote_Medicamen", "Medicamen", EH_CHAVE, "arqMedicamen", "arqMedicamen.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, "Lote", false );
	}

}

//======================================================
//	Campo Lote_Medicamen_Medicamen
//======================================================

class campo_arqItemMov_Lote_Medicamen_Medicamen extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Lote_Medicamen_Medicamen", "Lote_Medicamen_Medicamen", "Medicamen", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Lote_Medicamen", false );
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

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Unidade" );
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
		[
			new Lance_CampoIdPrimario(),
			new campo_arqItemMov_MovEstoque(),
			new campo_arqItemMov_MovEstoque_Num(),
			new campo_arqItemMov_Item(),
			new campo_arqItemMov_Lote(),
			new campo_arqItemMov_Lote_Medicamen(),
			new campo_arqItemMov_Lote_Medicamen_Medicamen(),
			new campo_arqItemMov_Lote_Lote(),
			new campo_arqItemMov_TMov(),
			new Lance_CampoCadeia( "TMov_Chave", "TMov_Chave", "Chave", 1, "x", EH_CHAVE, TMov ),
			new Lance_CampoCadeia( "TMov_Descritor", "TMov_Descritor", "Descritor", 19, "xxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, TMov ),
			new campo_arqItemMov_Qtd(),
			new campo_arqItemMov_QtdCalc(),
			new campo_arqItemMov_CUnidade() ]
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
			"a_itemmo",  // Nome deste arquivo Php que cont�m o arquivo
			"ItemMov",  // Nome do arquivo acentuado-se
			listaCampos_arqItemMov( "" ), 57
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave �nica
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ MovEstoque_Num, Item ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ MovEstoque_Num ];
			$vetAux[] = [ Item ];
			$vetAux[] = [ Lote_Medicamen_Medicamen ];
			$vetAux[] = [ Lote_Lote ];
			$vetAux[] = [ TMov_Descritor ];
			$vetAux[] = [ QtdCalc ];
			$vetAux[] = [ CUnidade ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ MovEstoque ], [ Lote ], [ TMov ], [ TMov_Chave ], [ TMov_Descritor ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ MovEstoque_Num ];
			$vetAux[] = [ Item ];
			$vetAux[] = [ Lote_Medicamen_Medicamen ];
			$vetAux[] = [ Lote_Lote ];
			$vetAux[] = [ TMov_Descritor ];
			$vetAux[] = [ Qtd ];
			$vetAux[] = [ QtdCalc ];
			$vetAux[] = [ CUnidade ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Acionar
	//-------------------------------------------------------------
	function AcionarBotao( $p_tecla )
	{
		switch( $p_tecla )
		{
			case _GRAVAR: return( MovAberto() == '' && ultimaLigOpcaoEm( 211 ) );
		}
		return( parent::AcionarBotao( $p_tecla ) );
	}

	//-------------------------------------------------------------
	// Cabe�alho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Itens' );
	}

}
