<?php

/*=========================================================================
  a_endere - Endereco
=========================================================================*/

if( DEF_a_endere == 1 )
  return;
define( "DEF_a_endere", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo CEP
//======================================================

class campo_domEndereco_CEP extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CEP", "CEP", "CEP", 8, "#####-###", 0, 0, false );
	}

}

//======================================================
//	Campo Endereco
//======================================================

class campo_domEndereco_Endereco extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Endereco", "Endereco", "Endereço", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Bairro
//======================================================

class campo_domEndereco_Bairro extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Bairro", "Bairro", "Bairro", 0, "arqBairro", "arqBairro.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Bairro_Bairro
//======================================================

class campo_domEndereco_Bairro_Bairro extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Bairro_Bairro", "Bairro_Bairro", "Bairro", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Bairro", false );
	}

}

//======================================================
//	Campo Cidade
//======================================================

class campo_domEndereco_Cidade extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cidade", "Cidade", "Cidade", 0, "arqCidade", "arqCidade.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Cidade_UF
//======================================================

class campo_domEndereco_Cidade_UF extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cidade_UF", "Cidade_UF", "UF", EH_CHAVE, "tabUF", "idPrimario", LANCE_LIG_SELECAO, 1, "Cidade", false );
	}

}

//======================================================
//	Campo Cidade_Cidade
//======================================================

class campo_domEndereco_Cidade_Cidade extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cidade_Cidade", "Cidade_Cidade", "Cidade", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Cidade", false );
	}

}

//======================================================
//	Campo DDD
//======================================================

class campo_domEndereco_DDD extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "DDD", "DDD", "DDD", 2, "#z", "", "", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Telefone
//======================================================

class campo_domEndereco_Telefone extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Telefone", "Telefone", "Telefone", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo DDDCelular
//======================================================

class campo_domEndereco_DDDCelular extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "DDDCelular", "DDDCelular", "DDDCelular", 2, "#z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Celular
//======================================================

class campo_domEndereco_Celular extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Celular", "Celular", "Celular", 9, "#.####.####", 0, 0, false );
	}

}

//======================================================
//	Campo WhatsApp
//======================================================

class campo_domEndereco_WhatsApp extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "WhatsApp", "WhatsApp", "WhatsApp", "", 0, 0, false );
	}

}

//======================================================
//	Arquivo domEndereco
//======================================================
function listaCampos_domEndereco( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(

		array( 
			new campo_domEndereco_CEP(),
			new campo_domEndereco_Endereco(),
			new campo_domEndereco_Bairro(),
			new campo_domEndereco_Bairro_Bairro(),
			new campo_domEndereco_Cidade(),
			new campo_domEndereco_Cidade_UF(),
			new Lance_CampoCadeia( "Cidade_UF_Chave", "Cidade_UF_Chave", "Chave", 2, "xx", EH_CHAVE, Cidade_UF ),
			new Lance_CampoCadeia( "Cidade_UF_Descritor", "Cidade_UF_Descritor", "Descritor", 19, "xxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, Cidade_UF ),
			new campo_domEndereco_Cidade_Cidade(),
			new campo_domEndereco_DDD(),
			new campo_domEndereco_Telefone(),
			new campo_domEndereco_DDDCelular(),
			new campo_domEndereco_Celular(),
			new campo_domEndereco_WhatsApp() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

?>
