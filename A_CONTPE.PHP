<?php

/*=========================================================================
  a_contpe - ContPessoa
=========================================================================*/

if( DEF_a_contpe == 1 )
  return;
define( "DEF_a_contpe", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_contpe_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Fornecedor
//======================================================

class campo_arqContPessoa_Fornecedor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Fornecedor", "Fornecedor", "Fornecedor", 0, "arqFornecedor", "arqFornecedor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Fornecedor_Nome
//======================================================

class campo_arqContPessoa_Fornecedor_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Fornecedor_Nome", "Fornecedor_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Fornecedor", false );
	}

}

//======================================================
//	Campo Pessoa
//======================================================

class campo_arqContPessoa_Pessoa extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Pessoa", "Pessoa", "Pessoa", 0, "arqPessoa", "arqPessoa.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Pessoa_Nome
//======================================================

class campo_arqContPessoa_Pessoa_Nome extends Lance_CampoCadeia
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

class campo_arqContPessoa_Pessoa_NumCelular extends Lance_CampoCadeia
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
//	Campo Nome
//======================================================

class campo_arqContPessoa_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Nome", "Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Apelido
//======================================================

class campo_arqContPessoa_Apelido extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Apelido", "Apelido", "Apelido", 20, "xxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Funcao
//======================================================

class campo_arqContPessoa_Funcao extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Funcao", "Funcao", "Funcao", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Fun��o" );
	}

}

//======================================================
//	Campo Celular
//======================================================

class campo_arqContPessoa_Celular extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Celular", "Celular", "Celular", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Telefone
//======================================================

class campo_arqContPessoa_Telefone extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Telefone", "Telefone", "Telefone", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Email
//======================================================

class campo_arqContPessoa_Email extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Email", "Email", "Email", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo RecEmail
//======================================================

class campo_arqContPessoa_RecEmail extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "RecEmail", "RecEmail", "RecEmail", "", 0, 0, false );
	}

}

//======================================================
//	Campo Nascimento
//======================================================

class campo_arqContPessoa_Nascimento extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Nascimento", "Nascimento", "Nascimento", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Sexo
//======================================================

class campo_arqContPessoa_Sexo extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Sexo", "Sexo", "Sexo", 0, "tabSexo", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Obs
//======================================================

class campo_arqContPessoa_Obs extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Obs", "Obs", "Obs", 10,80, false, false );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqContPessoa_Ativo extends Lance_CampoLogico
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
//	Arquivo arqContPessoa
//======================================================
function listaCampos_arqContPessoa( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqContPessoa_Fornecedor(),
			new campo_arqContPessoa_Fornecedor_Nome(),
			new campo_arqContPessoa_Pessoa(),
			new campo_arqContPessoa_Pessoa_Nome(),
			new campo_arqContPessoa_Pessoa_NumCelular(),
			new campo_arqContPessoa_Nome(),
			new campo_arqContPessoa_Apelido(),
			new campo_arqContPessoa_Funcao(),
			new campo_arqContPessoa_Celular(),
			new campo_arqContPessoa_Telefone(),
			new campo_arqContPessoa_Email(),
			new campo_arqContPessoa_RecEmail(),
			new campo_arqContPessoa_Nascimento(),
			new campo_arqContPessoa_Sexo(),
			new Lance_CampoCadeia( "Sexo_Chave", "Sexo_Chave", "Chave", 1, "x", EH_CHAVE, Sexo ),
			new Lance_CampoCadeia( "Sexo_Descritor", "Sexo_Descritor", "Descritor", 9, "xxxxxxxxx", EH_DESCRITOR, Sexo ),
			new campo_arqContPessoa_Obs(),
			new campo_arqContPessoa_Ativo() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqContPessoa extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqContPessoa",  // Nome Interno do arquivo
			"a_contpe",  // Nome deste arquivo Php que cont�m o arquivo
			"ContPessoa",  // Nome do arquivo acentuado-se
			listaCampos_arqContPessoa( "" ), 21
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave �nica
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [  ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
		if( ultimaLigOpcaoEm( 143 ) )
 {
			$vetAux[] = [ Fornecedor_Nome ];
 }
		if( ultimaLigOpcaoEm( 75 ) )
 {
			$vetAux[] = [ Pessoa_Nome ];
			$vetAux[] = [ Pessoa_NumCelular ];
 }
			$vetAux[] = [ Nome ];
			$vetAux[] = [ Funcao ];
			$vetAux[] = [ Celular ];
			$vetAux[] = [ Telefone ];
			$vetAux[] = [ Email ];
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
			$vetAux[] = [ Fornecedor_Nome ];
			$vetAux[] = [ Pessoa_Nome ];
			$vetAux[] = [ Pessoa_NumCelular ];
			$vetAux[] = [ Nome ];
			$vetAux[] = [ Apelido ];
			$vetAux[] = [ Funcao ];
			$vetAux[] = [ Celular ];
			$vetAux[] = [ Telefone ];
			$vetAux[] = [ Email ];
			$vetAux[] = [ RecEmail ];
			$vetAux[] = [ Nascimento ];
			$vetAux[] = [ Sexo_Descritor ];
			$vetAux[] = [ Obs ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabe�alho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Contatos' );
	}

}
