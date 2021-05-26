<?php

/*=========================================================================
  a_clini - Clinica
=========================================================================*/

if( DEF_a_clini == 1 )
  return;
define( "DEF_a_clini", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "a_clini_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Clinica
//======================================================

class campo_arqClinica_Clinica extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Cl�nica" );
	}

}

//======================================================
//	Campo Razao
//======================================================

class campo_arqClinica_Razao extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Razao", "Razao", "Razao", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Email
//======================================================

class campo_arqClinica_Email extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Email", "Email", "Email", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo CNPJ
//======================================================

class campo_arqClinica_CNPJ extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CNPJ", "CNPJ", "CNPJ", 14, "##.###.###/####-##", 0, 0, false );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqClinica_Ativo extends Lance_CampoLogico
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
			return( "Ativa?" );
	}

}

//======================================================
//	Arquivo arqClinica
//======================================================
function listaCampos_arqClinica( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqClinica_Clinica(),
			new campo_arqClinica_Razao(),
			new campo_arqClinica_Email(),
			new campo_arqClinica_CNPJ() ),
		listaCampos_domEndereco( "Ende_" ),
		array( 
			new campo_arqClinica_Ativo() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqClinica extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqClinica",  // Nome Interno do arquivo
			"a_clini",  // Nome deste arquivo Php que cont�m o arquivo
			"Clinica",  // Nome do arquivo acentuado-se
			listaCampos_arqClinica( "" ), 31
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave �nica
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Clinica) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Clinica ) );
			array_push( $vetAux, array( Ativo ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Clinica ) );
			array_push( $vetAux, array( Razao ) );
			array_push( $vetAux, array( Email ) );
			array_push( $vetAux, array( CNPJ ) );
			array_push( $vetAux, array( Ende_CEP ) );
			array_push( $vetAux, array( Ende_Endereco ) );
			array_push( $vetAux, array( Ende_Bairro_Bairro ) );
			array_push( $vetAux, array( Ende_Cidade_UF_Chave ) );
			array_push( $vetAux, array( Ende_Cidade_Cidade ) );
			array_push( $vetAux, array( Ende_DDD ) );
			array_push( $vetAux, array( Ende_Telefone ) );
			array_push( $vetAux, array( Ende_DDDCelular ) );
			array_push( $vetAux, array( Ende_Celular ) );
			array_push( $vetAux, array( Ende_WhatsApp ) );
			array_push( $vetAux, array( Ativo ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabe�alho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Cl�nicas' );
	}

}
?>