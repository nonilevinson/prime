<?php

/*=========================================================================
  a_aemail - AcaoEmail
=========================================================================*/

if( DEF_a_aemail == 1 )
  return;
define( "DEF_a_aemail", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_aemail_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Titulo
//======================================================

class campo_arqAcaoEmail_Titulo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Titulo", "Titulo", "Título", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Assunto do email" );
	}

}

//======================================================
//	Campo Versao
//======================================================

class campo_arqAcaoEmail_Versao extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Versao", "Versao", "Versão", 20, "xxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo TipoAcao
//======================================================

class campo_arqAcaoEmail_TipoAcao extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TipoAcao", "TipoAcao", "TipoAcao", 0, "tabTipoAcao", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Tipo" );
	}

}

//======================================================
//	Campo Template
//======================================================

class campo_arqAcaoEmail_Template extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Template", "Template", "Template", 0, "arqTemplate", "arqTemplate.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Template_Nome
//======================================================

class campo_arqAcaoEmail_Template_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Template_Nome", "Template_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Template", false );
	}

}

//======================================================
//	Campo PadraoAcao
//======================================================

class campo_arqAcaoEmail_PadraoAcao extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "PadraoAcao", "PadraoAcao", "PadraoAcao", 0, "tabPadraoAcao", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Automática?" );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqAcaoEmail_Ativo extends Lance_CampoLogico
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
//	Campo Arquivo
//======================================================

class campo_arqAcaoEmail_Arquivo extends Lance_CampoArquivo
{
	function __construct()
	{
		parent::__construct( "Arquivo", "Arquivo", "Arquivo", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false, false );
	}

}

//======================================================
//	Campo Html
//======================================================

class campo_arqAcaoEmail_Html extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Html", "Html", "Html", 21,80, false, true );
	}

}

//======================================================
//	Campo Imagem
//======================================================

class campo_arqAcaoEmail_Imagem extends Lance_CampoImagem
{
	function __construct()
	{
		parent::__construct( "Imagem", "Imagem", "Imagem", 200,200, "sem_imagem.gif", false );
	}

}

//======================================================
//	Campo Link
//======================================================

class campo_arqAcaoEmail_Link extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Link", "Link", "Link", 200, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo ImagemAlt
//======================================================

class campo_arqAcaoEmail_ImagemAlt extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "ImagemAlt", "ImagemAlt", "ImagemAlt", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo QtdTeste
//======================================================

class campo_arqAcaoEmail_QtdTeste extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "QtdTeste", "QtdTeste", "QtdTeste", 2, "#z", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->QTDTESTE == 10 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Qtd teste" );
	}

}

//======================================================
//	Arquivo arqAcaoEmail
//======================================================
function listaCampos_arqAcaoEmail( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqAcaoEmail_Titulo(),
			new campo_arqAcaoEmail_Versao(),
			new campo_arqAcaoEmail_TipoAcao(),
			new Lance_CampoCadeia( "TipoAcao_Chave", "TipoAcao_Chave", "Chave", 1, "x", EH_CHAVE, TipoAcao ),
			new Lance_CampoCadeia( "TipoAcao_Descritor", "TipoAcao_Descritor", "Descritor", 9, "xxxxxxxxx", EH_DESCRITOR, TipoAcao ),
			new campo_arqAcaoEmail_Template(),
			new campo_arqAcaoEmail_Template_Nome(),
			new campo_arqAcaoEmail_PadraoAcao(),
			new Lance_CampoCadeia( "PadraoAcao_Chave", "PadraoAcao_Chave", "Chave", 1, "x", EH_CHAVE, PadraoAcao ),
			new Lance_CampoCadeia( "PadraoAcao_Descritor", "PadraoAcao_Descritor", "Descritor", 22, "xxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, PadraoAcao ),
			new campo_arqAcaoEmail_Ativo(),
			new campo_arqAcaoEmail_Arquivo(),
			new campo_arqAcaoEmail_Html(),
			new campo_arqAcaoEmail_Imagem(),
			new Lance_CampoCadeia( "Imagem_Arquivo", "Imagem_Arquivo", "Descritor", 0, "", EH_DESCRITOR, Imagem ),
			new campo_arqAcaoEmail_Link(),
			new campo_arqAcaoEmail_ImagemAlt(),
			new campo_arqAcaoEmail_QtdTeste() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqAcaoEmail extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqAcaoEmail",  // Nome Interno do arquivo
			"a_aemail",  // Nome deste arquivo Php que contém o arquivo
			"AcaoEmail",  // Nome do arquivo acentuado-se
			listaCampos_arqAcaoEmail( "" ), 10
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Titulo, Versao ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Titulo ];
			$vetAux[] = [ Versao ];
			$vetAux[] = [ TipoAcao_Descritor ];
			$vetAux[] = [ Template_Nome ];
			$vetAux[] = [ PadraoAcao_Descritor ];
			$vetAux[] = [ Ativo ];
			$vetAux[] = [ QtdTeste ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ TipoAcao ], [ TipoAcao_Chave ], [ TipoAcao_Descritor ], [ Template ], [ PadraoAcao ], [ PadraoAcao_Chave ], [ PadraoAcao_Descritor ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Titulo ];
			$vetAux[] = [ Versao ];
			$vetAux[] = [ TipoAcao_Descritor ];
			$vetAux[] = [ Template_Nome ];
			$vetAux[] = [ PadraoAcao_Descritor ];
			$vetAux[] = [ Ativo ];
			$vetAux[] = [ Arquivo ];
			$vetAux[] = [ Html ];
			$vetAux[] = [ Imagem ];
			$vetAux[] = [ Link ];
			$vetAux[] = [ ImagemAlt ];
			$vetAux[] = [ QtdTeste ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Ações de email' );
	}

}
