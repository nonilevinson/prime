<?php

/*=========================================================================
  a_bkpmot - BkpMotivo
=========================================================================*/

if( DEF_a_bkpmot == 1 )
  return;
define( "DEF_a_bkpmot", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_bkpmot_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo BkpMotivo
//======================================================

class campo_arqBkpMotivo_BkpMotivo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "BkpMotivo", "BkpMotivo", "BkpMotivo", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Motivo" );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqBkpMotivo_Ativo extends Lance_CampoLogico
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
//	Arquivo arqBkpMotivo
//======================================================
function listaCampos_arqBkpMotivo( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqBkpMotivo_BkpMotivo(),
			new campo_arqBkpMotivo_Ativo() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqBkpMotivo extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqBkpMotivo",  // Nome Interno do arquivo
			"a_bkpmot",  // Nome deste arquivo Php que contém o arquivo
			"BkpMotivo",  // Nome do arquivo acentuado-se
			listaCampos_arqBkpMotivo( "" ), 62
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ BkpMotivo ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ BkpMotivo ];
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
			$vetAux[] = [ BkpMotivo ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Motivos de backup de medicação' );
	}

}
