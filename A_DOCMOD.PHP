<?php

/*=========================================================================
  a_docmod - DocMod
=========================================================================*/

if( DEF_a_docmod == 1 )
  return;
define( "DEF_a_docmod", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_docmod_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Documento
//======================================================

class campo_arqDocMod_Documento extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Documento", "Documento", "Documento", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo TArqDoc
//======================================================

class campo_arqDocMod_TArqDoc extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TArqDoc", "TArqDoc", "TArqDoc", 0, "tabTArqDoc", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Origem" );
	}

}

//======================================================
//	Campo TOrDoc
//======================================================

class campo_arqDocMod_TOrDoc extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TOrDoc", "TOrDoc", "TOrDoc", 0, "tabTOrDoc", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Tipo" );
	}

}

//======================================================
//	Campo Logo
//======================================================

class campo_arqDocMod_Logo extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Logo", "Logo", "Logo", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Logo?" );
	}

}

//======================================================
//	Campo Marca
//======================================================

class campo_arqDocMod_Marca extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Marca", "Marca", "Marca", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Marca D`água?" );
	}

}

//======================================================
//	Campo NomeArq
//======================================================

class campo_arqDocMod_NomeArq extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "NomeArq", "NomeArq", "NomeArq", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Rodape
//======================================================

class campo_arqDocMod_Rodape extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Rodape", "Rodape", "Rodape", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Rodapé?" );
	}

}

//======================================================
//	Campo AltRodape
//======================================================

class campo_arqDocMod_AltRodape extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "AltRodape", "AltRodape", "AltRodape", 2, "#z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Template
//======================================================

class campo_arqDocMod_Template extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Template", "Template", "Template", 0, "arqTemplate", "arqTemplate.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Template_Nome
//======================================================

class campo_arqDocMod_Template_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Template_Nome", "Template_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Template", false );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqDocMod_Ativo extends Lance_CampoLogico
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
//	Campo Header
//======================================================

class campo_arqDocMod_Header extends Lance_CampoArquivo
{
	function __construct()
	{
		parent::__construct( "Header", "Header", "Header", 20, "xxxxxxxxxxxxxxxxxxxx", 0, 0, false, false );
	}

}

//======================================================
//	Campo Arquivo
//======================================================

class campo_arqDocMod_Arquivo extends Lance_CampoArquivo
{
	function __construct()
	{
		parent::__construct( "Arquivo", "Arquivo", "Arquivo", 20, "xxxxxxxxxxxxxxxxxxxx", 0, 0, false, false );
	}

}

//======================================================
//	Campo Footer
//======================================================

class campo_arqDocMod_Footer extends Lance_CampoArquivo
{
	function __construct()
	{
		parent::__construct( "Footer", "Footer", "Footer", 20, "xxxxxxxxxxxxxxxxxxxx", 0, 0, false, false );
	}

}

//======================================================
//	Campo Html
//======================================================

class campo_arqDocMod_Html extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Html", "Html", "Html", 21,80, false, true );
	}

}

//======================================================
//	Campo Imagem
//======================================================

class campo_arqDocMod_Imagem extends Lance_CampoImagem
{
	function __construct()
	{
		parent::__construct( "Imagem", "Imagem", "Imagem", 200,200, "sem_imagem.gif", false );
	}

}

//======================================================
//	Campo Lista
//======================================================

class campo_arqDocMod_Lista extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Lista", "Lista", "Lista", 21,80, false, false );
	}

}

//======================================================
//	Campo MargemEsq
//======================================================

class campo_arqDocMod_MargemEsq extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "MargemEsq", "MargemEsq", "MargemEsq", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo MargemDir
//======================================================

class campo_arqDocMod_MargemDir extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "MargemDir", "MargemDir", "MargemDir", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo MargemTop
//======================================================

class campo_arqDocMod_MargemTop extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "MargemTop", "MargemTop", "MargemTop", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo TPapel
//======================================================

class campo_arqDocMod_TPapel extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TPapel", "TPapel", "TPapel", 0, "tabTPapel", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo TOrienta
//======================================================

class campo_arqDocMod_TOrienta extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TOrienta", "TOrienta", "TOrienta", 0, "tabTOrienta", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Arquivo arqDocMod
//======================================================
function listaCampos_arqDocMod( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqDocMod_Documento(),
			new campo_arqDocMod_TArqDoc(),
			new Lance_CampoCadeia( "TArqDoc_Chave", "TArqDoc_Chave", "Chave", 1, "x", EH_CHAVE, TArqDoc ),
			new Lance_CampoCadeia( "TArqDoc_Descritor", "TArqDoc_Descritor", "Descritor", 7, "xxxxxxx", EH_DESCRITOR, TArqDoc ),
			new campo_arqDocMod_TOrDoc(),
			new Lance_CampoCadeia( "TOrDoc_Chave", "TOrDoc_Chave", "Chave", 1, "x", EH_CHAVE, TOrDoc ),
			new Lance_CampoCadeia( "TOrDoc_Descritor", "TOrDoc_Descritor", "Descritor", 15, "xxxxxxxxxxxxxxx", EH_DESCRITOR, TOrDoc ),
			new campo_arqDocMod_Logo(),
			new campo_arqDocMod_Marca(),
			new campo_arqDocMod_NomeArq(),
			new campo_arqDocMod_Rodape(),
			new campo_arqDocMod_AltRodape(),
			new campo_arqDocMod_Template(),
			new campo_arqDocMod_Template_Nome(),
			new campo_arqDocMod_Ativo(),
			new campo_arqDocMod_Header(),
			new campo_arqDocMod_Arquivo(),
			new campo_arqDocMod_Footer(),
			new campo_arqDocMod_Html(),
			new campo_arqDocMod_Imagem(),
			new Lance_CampoCadeia( "Imagem_Arquivo", "Imagem_Arquivo", "Descritor", 0, "", EH_DESCRITOR, Imagem ),
			new campo_arqDocMod_Lista(),
			new campo_arqDocMod_MargemEsq(),
			new campo_arqDocMod_MargemDir(),
			new campo_arqDocMod_MargemTop(),
			new campo_arqDocMod_TPapel(),
			new Lance_CampoCadeia( "TPapel_Chave", "TPapel_Chave", "Chave", 1, "x", EH_CHAVE, TPapel ),
			new Lance_CampoCadeia( "TPapel_Descritor", "TPapel_Descritor", "Descritor", 6, "xxxxxx", EH_DESCRITOR, TPapel ),
			new campo_arqDocMod_TOrienta(),
			new Lance_CampoCadeia( "TOrienta_Chave", "TOrienta_Chave", "Chave", 1, "x", EH_CHAVE, TOrienta ),
			new Lance_CampoCadeia( "TOrienta_Descritor", "TOrienta_Descritor", "Descritor", 8, "xxxxxxxx", EH_DESCRITOR, TOrienta ) )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqDocMod extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqDocMod",  // Nome Interno do arquivo
			"a_docmod",  // Nome deste arquivo Php que contém o arquivo
			"DocMod",  // Nome do arquivo acentuado-se
			listaCampos_arqDocMod( "" ), 22
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Documento) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Documento ) );
			array_push( $vetAux, array( TArqDoc_Descritor ) );
			array_push( $vetAux, array( TOrDoc_Descritor ) );
			array_push( $vetAux, array( Logo ) );
			array_push( $vetAux, array( Marca ) );
			array_push( $vetAux, array( Rodape ) );
			array_push( $vetAux, array( Template_Nome ) );
			array_push( $vetAux, array( Ativo ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( TArqDoc ), array( TArqDoc_Chave ), array( TArqDoc_Descritor ), array( TOrDoc ), array( TOrDoc_Chave ), array( TOrDoc_Descritor ), array( Template ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Documento ) );
			array_push( $vetAux, array( TArqDoc_Descritor ) );
			array_push( $vetAux, array( TOrDoc_Descritor ) );
			array_push( $vetAux, array( Logo ) );
			array_push( $vetAux, array( Marca ) );
			array_push( $vetAux, array( NomeArq ) );
			array_push( $vetAux, array( Rodape ) );
			array_push( $vetAux, array( AltRodape ) );
			array_push( $vetAux, array( Template_Nome ) );
			array_push( $vetAux, array( Ativo ) );
			array_push( $vetAux, array( Header ) );
			array_push( $vetAux, array( Arquivo ) );
			array_push( $vetAux, array( Footer ) );
			array_push( $vetAux, array( Html ) );
			array_push( $vetAux, array( Imagem ) );
			array_push( $vetAux, array( Lista ) );
			array_push( $vetAux, array( MargemEsq ) );
			array_push( $vetAux, array( MargemDir ) );
			array_push( $vetAux, array( MargemTop ) );
			array_push( $vetAux, array( TPapel_Descritor ) );
			array_push( $vetAux, array( TOrienta_Descritor ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Modelos de documentos' );
	}

}
?>
