<?php

/*=========================================================================
  a_tstcon - TStCon
=========================================================================*/

if( DEF_a_tstcon == 1 )
  return;
define( "DEF_a_tstcon", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_tstcon_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Status
//======================================================

class campo_arqTStCon_Status extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Status", "Status", "Status", 20, "xxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo Ordem
//======================================================

class campo_arqTStCon_Ordem extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Ordem", "Ordem", "Ordem", 2, "#z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo TClinica
//======================================================

class campo_arqTStCon_TClinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TClinica", "TClinica", "TClinica", 0, "tabTClinica", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Legenda
//======================================================

class campo_arqTStCon_Legenda extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Legenda", "Legenda", "Legenda", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->LEGENDA == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo HoraChe
//======================================================

class campo_arqTStCon_HoraChe extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "HoraChe", "HoraChe", "HoraChe", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->HORACHE == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo EhDesmarca
//======================================================

class campo_arqTStCon_EhDesmarca extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "EhDesmarca", "EhDesmarca", "EhDesmarca", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->EHDESMARCA == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo ValorObr
//======================================================

class campo_arqTStCon_ValorObr extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "ValorObr", "ValorObr", "ValorObr", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->VALOROBR == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo ProntuObr
//======================================================

class campo_arqTStCon_ProntuObr extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "ProntuObr", "ProntuObr", "ProntuObr", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->PRONTUOBR == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo Cor
//======================================================

class campo_arqTStCon_Cor extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cor", "Cor", "Cor", 7, "xxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Fundo
//======================================================

class campo_arqTStCon_Fundo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Fundo", "Fundo", "Fundo", 7, "xxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqTStCon_Ativo extends Lance_CampoLogico
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
//	Arquivo arqTStCon
//======================================================
function listaCampos_arqTStCon( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqTStCon_Status(),
			new campo_arqTStCon_Ordem(),
			new campo_arqTStCon_TClinica(),
			new Lance_CampoCadeia( "TClinica_Chave", "TClinica_Chave", "Chave", 1, "x", EH_CHAVE, TClinica ),
			new Lance_CampoCadeia( "TClinica_Descritor", "TClinica_Descritor", "Descritor", 12, "xxxxxxxxxxxx", EH_DESCRITOR, TClinica ),
			new campo_arqTStCon_Legenda(),
			new campo_arqTStCon_HoraChe(),
			new campo_arqTStCon_EhDesmarca(),
			new campo_arqTStCon_ValorObr(),
			new campo_arqTStCon_ProntuObr(),
			new campo_arqTStCon_Cor(),
			new campo_arqTStCon_Fundo(),
			new campo_arqTStCon_Ativo() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqTStCon extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqTStCon",  // Nome Interno do arquivo
			"a_tstcon",  // Nome deste arquivo Php que contém o arquivo
			"TStCon",  // Nome do arquivo acentuado-se
			listaCampos_arqTStCon( "" ), 61
		);
		$this->temLog = false;
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Status ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Status ];
			$vetAux[] = [ Ordem ];
			$vetAux[] = [ TClinica_Descritor ];
			$vetAux[] = [ Legenda ];
			$vetAux[] = [ HoraChe ];
			$vetAux[] = [ EhDesmarca ];
			$vetAux[] = [ ValorObr ];
			$vetAux[] = [ ProntuObr ];
			$vetAux[] = [ Cor ];
			$vetAux[] = [ Fundo ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ TClinica ], [ TClinica_Chave ], [ TClinica_Descritor ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Status ];
			$vetAux[] = [ Ordem ];
			$vetAux[] = [ TClinica_Descritor ];
			$vetAux[] = [ Legenda ];
			$vetAux[] = [ HoraChe ];
			$vetAux[] = [ EhDesmarca ];
			$vetAux[] = [ ValorObr ];
			$vetAux[] = [ ProntuObr ];
			$vetAux[] = [ Cor ];
			$vetAux[] = [ Fundo ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Ordenações do Arquivo: PorOrdem  
	//-------------------------------------------------------------
	function PorOrdem()
	{
	return( "Ordem ASC" );
	}

	//-------------------------------------------------------------
	// Ordenação Padrão do Arquivo
	//-------------------------------------------------------------
	function OrdemPadrao()
	{
	return( "PorOrdem" );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Status de consultas' );
	}

}
