<?php

/*=========================================================================
  a_imgcrm - ImagemCRM
=========================================================================*/

if( DEF_a_imgcrm == 1 )
  return;
define( "DEF_a_imgcrm", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_imgcrm_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo AcaoEmail
//======================================================

class campo_arqImagemCRM_AcaoEmail extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "AcaoEmail", "AcaoEmail", "AcaoEmail", EH_CHAVE, "arqAcaoEmail", "arqAcaoEmail.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo AcaoEmail_Titulo
//======================================================

class campo_arqImagemCRM_AcaoEmail_Titulo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "AcaoEmail_Titulo", "AcaoEmail_Titulo", "Título", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "AcaoEmail", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Assunto do email" );
	}

}

//======================================================
//	Campo AcaoEmail_Versao
//======================================================

class campo_arqImagemCRM_AcaoEmail_Versao extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "AcaoEmail_Versao", "AcaoEmail_Versao", "Versão", 20, "xxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "AcaoEmail", false );
	}

}

//======================================================
//	Campo NumImg
//======================================================

class campo_arqImagemCRM_NumImg extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "NumImg", "NumImg", "NumImg", 2, "#z", "", "", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "N°" );
	}

}

//======================================================
//	Campo Nome
//======================================================

class campo_arqImagemCRM_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Nome", "Nome", "Nome", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Imagem
//======================================================

class campo_arqImagemCRM_Imagem extends Lance_CampoImagem
{
	function __construct()
	{
		parent::__construct( "Imagem", "Imagem", "Imagem", 200,200, "", false );
	}

}

//======================================================
//	Campo Link
//======================================================

class campo_arqImagemCRM_Link extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Link", "Link", "Link", 200, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Arquivo arqImagemCRM
//======================================================
function listaCampos_arqImagemCRM( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqImagemCRM_AcaoEmail(),
			new campo_arqImagemCRM_AcaoEmail_Titulo(),
			new campo_arqImagemCRM_AcaoEmail_Versao(),
			new campo_arqImagemCRM_NumImg(),
			new campo_arqImagemCRM_Nome(),
			new campo_arqImagemCRM_Imagem(),
			new Lance_CampoCadeia( "Imagem_Arquivo", "Imagem_Arquivo", "Descritor", 0, "", EH_DESCRITOR, Imagem ),
			new campo_arqImagemCRM_Link() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqImagemCRM extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqImagemCRM",  // Nome Interno do arquivo
			"a_imgcrm",  // Nome deste arquivo Php que contém o arquivo
			"ImagemCRM",  // Nome do arquivo acentuado-se
			listaCampos_arqImagemCRM( "" ), 11
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( AcaoEmail_Titulo, AcaoEmail_Versao, NumImg) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( AcaoEmail_Titulo ) );
			array_push( $vetAux, array( AcaoEmail_Versao ) );
			array_push( $vetAux, array( NumImg ) );
			array_push( $vetAux, array( Nome ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( AcaoEmail ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( AcaoEmail_Titulo ) );
			array_push( $vetAux, array( AcaoEmail_Versao ) );
			array_push( $vetAux, array( NumImg ) );
			array_push( $vetAux, array( Nome ) );
			array_push( $vetAux, array( Imagem ) );
			array_push( $vetAux, array( Link ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Mensagem
	//-------------------------------------------------------------
	function MensagemBotao( $p_tecla )
	{
		switch( $p_tecla )
		{
			case _SDEL: return( "GrupoAtualEm()" );
		}
		return( parent::MensagemBotao( $p_tecla ) );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Imagens' );
	}

}
?>
