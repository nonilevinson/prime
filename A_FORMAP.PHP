<?php

/*=========================================================================
  a_formap - FormaPg
=========================================================================*/

if( DEF_a_formap == 1 )
  return;
define( "DEF_a_formap", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_formap_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo FormaPg
//======================================================

class campo_arqFormaPg_FormaPg extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "FormaPg", "FormaPg", "FormaPg", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Forma" );
	}

}

//======================================================
//	Campo PodeEntra
//======================================================

class campo_arqFormaPg_PodeEntra extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "PodeEntra", "PodeEntra", "PodeEntra", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->PODEENTRA == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Pode na<br>entrada?" );
	}

}

//======================================================
//	Campo Dinheiro
//======================================================

class campo_arqFormaPg_Dinheiro extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Dinheiro", "Dinheiro", "Dinheiro", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->DINHEIRO == 1 )
			return( "CorAtivo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Dinheiro?" );
	}

}

//======================================================
//	Campo Boleto
//======================================================

class campo_arqFormaPg_Boleto extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Boleto", "Boleto", "Boleto", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->BOLETO == 1 )
			return( "CorAtivo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Boleto?" );
	}

}

//======================================================
//	Campo Cartao
//======================================================

class campo_arqFormaPg_Cartao extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Cartao", "Cartao", "Cartao", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->CARTAO == 1 )
			return( "CorAtivo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Cartão?" );
	}

}

//======================================================
//	Campo Dias
//======================================================

class campo_arqFormaPg_Dias extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Dias", "Dias", "Dias", 2, "#z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo TaxaDeb
//======================================================

class campo_arqFormaPg_TaxaDeb extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "TaxaDeb", "TaxaDeb", "TaxaDeb", 4, "#z,zz", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Débito %" );
	}

}

//======================================================
//	Campo Taxa2
//======================================================

class campo_arqFormaPg_Taxa2 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Taxa2", "Taxa2", "Taxa2", 4, "#z,zz", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "2 vezes %" );
	}

}

//======================================================
//	Campo Taxa3
//======================================================

class campo_arqFormaPg_Taxa3 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Taxa3", "Taxa3", "Taxa3", 4, "#z,zz", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "3 vezes %" );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqFormaPg_Ativo extends Lance_CampoLogico
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
//	Arquivo arqFormaPg
//======================================================
function listaCampos_arqFormaPg( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqFormaPg_FormaPg(),
			new campo_arqFormaPg_PodeEntra(),
			new campo_arqFormaPg_Dinheiro(),
			new campo_arqFormaPg_Boleto(),
			new campo_arqFormaPg_Cartao(),
			new campo_arqFormaPg_Dias(),
			new campo_arqFormaPg_TaxaDeb(),
			new campo_arqFormaPg_Taxa2(),
			new campo_arqFormaPg_Taxa3(),
			new campo_arqFormaPg_Ativo() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqFormaPg extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqFormaPg",  // Nome Interno do arquivo
			"a_formap",  // Nome deste arquivo Php que contém o arquivo
			"FormaPg",  // Nome do arquivo acentuado-se
			listaCampos_arqFormaPg( "" ), 44
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ FormaPg ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ FormaPg ];
			$vetAux[] = [ PodeEntra ];
			$vetAux[] = [ Dinheiro ];
			$vetAux[] = [ Boleto ];
			$vetAux[] = [ Cartao ];
			$vetAux[] = [ Dias ];
			$vetAux[] = [ TaxaDeb ];
			$vetAux[] = [ Taxa2 ];
			$vetAux[] = [ Taxa3 ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ FormaPg ];
			$vetAux[] = [ PodeEntra ];
			$vetAux[] = [ Dinheiro ];
			$vetAux[] = [ Boleto ];
			$vetAux[] = [ Cartao ];
			$vetAux[] = [ Dias ];
			$vetAux[] = [ TaxaDeb ];
			$vetAux[] = [ Taxa2 ];
			$vetAux[] = [ Taxa3 ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Formas de pagamento de consultas' );
	}

}
