<?php

/*=========================================================================
  a_qdoc - QDoc
=========================================================================*/

if( DEF_a_qdoc == 1 )
  return;
define( "DEF_a_qdoc", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_qdoc_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo DocMod
//======================================================

class campo_parQDoc_DocMod extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "DocMod", "DocMod", "DocMod", 0, "arqDocMod", "arqDocMod.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo DocMod_Documento
//======================================================

class campo_parQDoc_DocMod_Documento extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "DocMod_Documento", "DocMod_Documento", "Documento", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "DocMod", false );
	}

}

//======================================================
//	Campo Pessoa
//======================================================

class campo_parQDoc_Pessoa extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Pessoa", "Pessoa", "Pessoa", 0, "arqPessoa", "arqPessoa.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Pessoa_Nome
//======================================================

class campo_parQDoc_Pessoa_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Pessoa_Nome", "Pessoa_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Pessoa", false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->PESSOA_QTODESMAR >= G_QTASDESMAR )
			return( "VermelhoFundoEsq" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo Pessoa_NumCelular
//======================================================

class campo_parQDoc_Pessoa_NumCelular extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Pessoa_NumCelular", "Pessoa_NumCelular", "NumCelular", 11, "(##) #.####.####", EH_CHAVE, "Pessoa", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Celular" );
	}

}

//======================================================
//	Campo Cad1
//======================================================

class campo_parQDoc_Cad1 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cad1", "Cad1", "Cad1", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Cad2
//======================================================

class campo_parQDoc_Cad2 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cad2", "Cad2", "Cad2", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Cad3
//======================================================

class campo_parQDoc_Cad3 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cad3", "Cad3", "Cad3", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Cad4
//======================================================

class campo_parQDoc_Cad4 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cad4", "Cad4", "Cad4", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Cad5
//======================================================

class campo_parQDoc_Cad5 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cad5", "Cad5", "Cad5", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Txt1
//======================================================

class campo_parQDoc_Txt1 extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Txt1", "Txt1", "Txt1", 3,80, false, false );
	}

}

//======================================================
//	Campo Txt2
//======================================================

class campo_parQDoc_Txt2 extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Txt2", "Txt2", "Txt2", 3,80, false, false );
	}

}

//======================================================
//	Campo Salvar
//======================================================

class campo_parQDoc_Salvar extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Salvar", "Salvar", "Salvar", "", 0, 0, false );
	}

}

//======================================================
//	Arquivo parQDoc
//======================================================
function listaCampos_parQDoc( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_parQDoc_DocMod(),
			new campo_parQDoc_DocMod_Documento(),
			new campo_parQDoc_Pessoa(),
			new campo_parQDoc_Pessoa_Nome(),
			new campo_parQDoc_Pessoa_NumCelular(),
			new campo_parQDoc_Cad1(),
			new campo_parQDoc_Cad2(),
			new campo_parQDoc_Cad3(),
			new campo_parQDoc_Cad4(),
			new campo_parQDoc_Cad5(),
			new campo_parQDoc_Txt1(),
			new campo_parQDoc_Txt2(),
			new campo_parQDoc_Salvar() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class parQDoc extends Lance_Parametro
{
	function __construct()
	{
		parent::__construct(
			"parQDoc",  // Nome Interno do arquivo
			"a_qdoc",  // Nome deste arquivo Php que contém o arquivo
			"QDoc",  // Nome do arquivo acentuado-se
			listaCampos_parQDoc( "" ), 24
		);
	}

}
?>
