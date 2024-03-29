<?php

/*=========================================================================
  a_emailr - EmailRemet
=========================================================================*/

if( DEF_a_emailr == 1 )
  return;
define( "DEF_a_emailr", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_emailr_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Email
//======================================================

class campo_arqEmailRemet_Email extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Email", "Email", "Email", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo NomeEmail
//======================================================

class campo_arqEmailRemet_NomeEmail extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "NomeEmail", "NomeEmail", "NomeEmail", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Nome" );
	}

}

//======================================================
//	Campo Padrao
//======================================================

class campo_arqEmailRemet_Padrao extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Padrao", "Padrao", "Padr�o", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->PADRAO == 1 )
			return( "CorAtivo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Padr�o?" );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqEmailRemet_Ativo extends Lance_CampoLogico
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
//	Arquivo arqEmailRemet
//======================================================
function listaCampos_arqEmailRemet( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqEmailRemet_Email(),
			new campo_arqEmailRemet_NomeEmail(),
			new campo_arqEmailRemet_Padrao(),
			new campo_arqEmailRemet_Ativo() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqEmailRemet extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqEmailRemet",  // Nome Interno do arquivo
			"a_emailr",  // Nome deste arquivo Php que cont�m o arquivo
			"EmailRemet",  // Nome do arquivo acentuado-se
			listaCampos_arqEmailRemet( "" ), 9
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave �nica
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Email ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Email ];
			$vetAux[] = [ NomeEmail ];
			$vetAux[] = [ Padrao ];
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
			$vetAux[] = [ Email ];
			$vetAux[] = [ NomeEmail ];
			$vetAux[] = [ Padrao ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabe�alho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Emails remetentes' );
	}

}
