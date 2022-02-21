<?php

/*=========================================================================
  a_ptrata - PTrata
=========================================================================*/

if( DEF_a_ptrata == 1 )
  return;
define( "DEF_a_ptrata", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_ptrata_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo PTrata
//======================================================

class campo_arqPTrata_PTrata extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "PTrata", "PTrata", "PTrata", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Plano" );
	}

}

//======================================================
//	Campo Apelido
//======================================================

class campo_arqPTrata_Apelido extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Apelido", "Apelido", "Apelido", 10, "xxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Valor
//======================================================

class campo_arqPTrata_Valor extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor", "Valor", "Valor", 8, "###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo MrgDesc
//======================================================

class campo_arqPTrata_MrgDesc extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "MrgDesc", "MrgDesc", "MrgDesc", 4, "#z,zz", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "% Desconto" );
	}

}

//======================================================
//	Campo ValMinimo
//======================================================

class campo_arqPTrata_ValMinimo extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "ValMinimo", "ValMinimo", "ValMinimo", 8, "###.##z,zz", "", "", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Mínimo" );
	}

}

//======================================================
//	Campo Descricao
//======================================================

class campo_arqPTrata_Descricao extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Descricao", "Descricao", "Descricao", 20,90, false, true );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqPTrata_Ativo extends Lance_CampoLogico
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
//	Campo Tempo
//======================================================

class campo_arqPTrata_Tempo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Tempo", "Tempo", "Tempo", 10, "xxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Arquivo arqPTrata
//======================================================
function listaCampos_arqPTrata( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqPTrata_PTrata(),
			new campo_arqPTrata_Apelido(),
			new campo_arqPTrata_Valor(),
			new campo_arqPTrata_MrgDesc(),
			new campo_arqPTrata_ValMinimo(),
			new campo_arqPTrata_Descricao(),
			new campo_arqPTrata_Ativo(),
			new campo_arqPTrata_Tempo() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqPTrata extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqPTrata",  // Nome Interno do arquivo
			"a_ptrata",  // Nome deste arquivo Php que contém o arquivo
			"PTrata",  // Nome do arquivo acentuado-se
			listaCampos_arqPTrata( "" ), 32
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ PTrata ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ PTrata ];
			$vetAux[] = [ Valor ];
			$vetAux[] = [ MrgDesc ];
			$vetAux[] = [ ValMinimo ];
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
			$vetAux[] = [ PTrata ];
			$vetAux[] = [ Apelido ];
			$vetAux[] = [ Valor ];
			$vetAux[] = [ MrgDesc ];
			$vetAux[] = [ ValMinimo ];
			$vetAux[] = [ Descricao ];
			$vetAux[] = [ Ativo ];
			$vetAux[] = [ Tempo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Planos de tratamento' );
	}

}
