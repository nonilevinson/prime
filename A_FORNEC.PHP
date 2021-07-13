<?php

/*=========================================================================
  a_fornec - Fornecedor
=========================================================================*/

if( DEF_a_fornec == 1 )
  return;
define( "DEF_a_fornec", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "a_fornec_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Nome
//======================================================

class campo_arqFornecedor_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Nome", "Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo Apelido
//======================================================

class campo_arqFornecedor_Apelido extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Apelido", "Apelido", "Apelido", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo TPFPJ
//======================================================

class campo_arqFornecedor_TPFPJ extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TPFPJ", "TPFPJ", "TPFPJ", 0, "tabTPFPJ", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo CNPJ
//======================================================

class campo_arqFornecedor_CNPJ extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CNPJ", "CNPJ", "CNPJ", 14, "##.###.###/####-##", 0, 0, false );
	}

}

//======================================================
//	Campo InscEstad
//======================================================

class campo_arqFornecedor_InscEstad extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "InscEstad", "InscEstad", "InscEstad", 25, "xxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo InscMunic
//======================================================

class campo_arqFornecedor_InscMunic extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "InscMunic", "InscMunic", "InscMunic", 25, "xxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo CPF
//======================================================

class campo_arqFornecedor_CPF extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CPF", "CPF", "CPF", 11, "###.###.###-##", 0, 0, false );
	}

}

//======================================================
//	Campo Identidade
//======================================================

class campo_arqFornecedor_Identidade extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Identidade", "Identidade", "Identidade", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Orgao
//======================================================

class campo_arqFornecedor_Orgao extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Orgao", "Orgao", "Orgao", 20, "xxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Emissao
//======================================================

class campo_arqFornecedor_Emissao extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Emissao", "Emissao", "Emissao", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqFornecedor_Ativo extends Lance_CampoLogico
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
//	Campo Obs
//======================================================

class campo_arqFornecedor_Obs extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Obs", "Obs", "Obs", 10,76, false, false );
	}

}

//======================================================
//	Campo Desde
//======================================================

class campo_arqFornecedor_Desde extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Desde", "Desde", "Desde", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Arquivo arqFornecedor
//======================================================
function listaCampos_arqFornecedor( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqFornecedor_Nome(),
			new campo_arqFornecedor_Apelido(),
			new campo_arqFornecedor_TPFPJ(),
			new Lance_CampoCadeia( "TPFPJ_Chave", "TPFPJ_Chave", "Chave", 1, "x", EH_CHAVE, TPFPJ ),
			new Lance_CampoCadeia( "TPFPJ_Descritor", "TPFPJ_Descritor", "Descritor", 8, "xxxxxxxx", EH_DESCRITOR, TPFPJ ) ),
		listaCampos_domEndereco( "Ende_" ),
		array( 
			new campo_arqFornecedor_CNPJ(),
			new campo_arqFornecedor_InscEstad(),
			new campo_arqFornecedor_InscMunic(),
			new campo_arqFornecedor_CPF(),
			new campo_arqFornecedor_Identidade(),
			new campo_arqFornecedor_Orgao(),
			new campo_arqFornecedor_Emissao(),
			new campo_arqFornecedor_Ativo(),
			new campo_arqFornecedor_Obs(),
			new campo_arqFornecedor_Desde() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqFornecedor extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqFornecedor",  // Nome Interno do arquivo
			"a_fornec",  // Nome deste arquivo Php que contém o arquivo
			"Fornecedor",  // Nome do arquivo acentuado-se
			listaCampos_arqFornecedor( "" ), 42
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Nome) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Nome ) );
			array_push( $vetAux, array( TPFPJ_Descritor ) );
			array_push( $vetAux, array( Ativo ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( TPFPJ ), array( TPFPJ_Chave ), array( TPFPJ_Descritor ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Nome ) );
			array_push( $vetAux, array( Apelido ) );
			array_push( $vetAux, array( TPFPJ_Descritor ) );
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
			array_push( $vetAux, array( CNPJ ) );
			array_push( $vetAux, array( InscEstad ) );
			array_push( $vetAux, array( InscMunic ) );
			array_push( $vetAux, array( CPF ) );
			array_push( $vetAux, array( Identidade ) );
			array_push( $vetAux, array( Orgao ) );
			array_push( $vetAux, array( Emissao ) );
			array_push( $vetAux, array( Ativo ) );
			array_push( $vetAux, array( Obs ) );
			array_push( $vetAux, array( Desde ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Fornecedores' );
	}

}
?>
