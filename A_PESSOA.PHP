<?php

/*=========================================================================
  a_pessoa - Pessoa
=========================================================================*/

if( DEF_a_pessoa == 1 )
  return;
define( "DEF_a_pessoa", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "a_pessoa_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Nome
//======================================================

class campo_arqPessoa_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Nome", "Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->QTODESMAR >= G_QTASDESMAR )
			return( "VermelhoFundoEsq" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo Apelido
//======================================================

class campo_arqPessoa_Apelido extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Apelido", "Apelido", "Apelido", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo NumCelular
//======================================================

class campo_arqPessoa_NumCelular extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "NumCelular", "NumCelular", "NumCelular", 11, "(##) #.####.####", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Celular" );
	}

}

//======================================================
//	Campo Prontuario
//======================================================

class campo_arqPessoa_Prontuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Prontuario", "Prontuario", "Prontuario", 9, "xxxxxxxxx", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Prontuário" );
	}

}

//======================================================
//	Campo Nascimento
//======================================================

class campo_arqPessoa_Nascimento extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Nascimento", "Nascimento", "Nascimento", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Idade
//======================================================

class campo_arqPessoa_Idade extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Idade", "Idade", "Idade", 3, "##z", "", "", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Sexo
//======================================================

class campo_arqPessoa_Sexo extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Sexo", "Sexo", "Sexo", 0, "tabSexo", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo EstCivil
//======================================================

class campo_arqPessoa_EstCivil extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "EstCivil", "EstCivil", "EstCivil", 0, "tabEstCivil", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Profissao
//======================================================

class campo_arqPessoa_Profissao extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Profissao", "Profissao", "Profissao", 0, "arqProfissao", "arqProfissao.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Profissao_Profissao
//======================================================

class campo_arqPessoa_Profissao_Profissao extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Profissao_Profissao", "Profissao_Profissao", "Profissao", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Profissao", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Profissão" );
	}

}

//======================================================
//	Campo CPF
//======================================================

class campo_arqPessoa_CPF extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CPF", "CPF", "CPF", 11, "###.###.###-##", 0, 0, false );
	}

}

//======================================================
//	Campo Identidade
//======================================================

class campo_arqPessoa_Identidade extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Identidade", "Identidade", "Identidade", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Orgao
//======================================================

class campo_arqPessoa_Orgao extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Orgao", "Orgao", "Orgão", 20, "xxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Emissao
//======================================================

class campo_arqPessoa_Emissao extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Emissao", "Emissao", "Emissão", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Email
//======================================================

class campo_arqPessoa_Email extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Email", "Email", "Email", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo RecEmail
//======================================================

class campo_arqPessoa_RecEmail extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "RecEmail", "RecEmail", "RecEmail", "", 0, 0, false );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqPessoa_Ativo extends Lance_CampoLogico
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

class campo_arqPessoa_Obs extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Obs", "Obs", "Obs", 10,76, false, false );
	}

}

//======================================================
//	Campo Desde
//======================================================

class campo_arqPessoa_Desde extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Desde", "Desde", "Desde", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo QtoDesmar
//======================================================

class campo_arqPessoa_QtoDesmar extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "QtoDesmar", "QtoDesmar", "QtoDesmar", 2, "#z", "", "F", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->QTODESMAR >= G_QTASDESMAR )
			return( "VermelhoFundoCentro" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Qtas<br>Desmarcações" );
	}

}

//======================================================
//	Campo Midia
//======================================================

class campo_arqPessoa_Midia extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Midia", "Midia", "Midia", 0, "arqMidia", "arqMidia.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Midia_Midia
//======================================================

class campo_arqPessoa_Midia_Midia extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Midia_Midia", "Midia_Midia", "Midia", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Midia", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Mídia" );
	}

}

//======================================================
//	Arquivo arqPessoa
//======================================================
function listaCampos_arqPessoa( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqPessoa_Nome(),
			new campo_arqPessoa_Apelido(),
			new campo_arqPessoa_NumCelular(),
			new campo_arqPessoa_Prontuario() ],
		listaCampos_domEndereco( "Ende_" ),
		[ 
			new campo_arqPessoa_Nascimento(),
			new campo_arqPessoa_Idade(),
			new campo_arqPessoa_Sexo(),
			new Lance_CampoCadeia( "Sexo_Chave", "Sexo_Chave", "Chave", 1, "x", EH_CHAVE, Sexo ),
			new Lance_CampoCadeia( "Sexo_Descritor", "Sexo_Descritor", "Descritor", 9, "xxxxxxxxx", EH_DESCRITOR, Sexo ),
			new campo_arqPessoa_EstCivil(),
			new Lance_CampoCadeia( "EstCivil_Chave", "EstCivil_Chave", "Chave", 1, "x", EH_CHAVE, EstCivil ),
			new Lance_CampoCadeia( "EstCivil_Descritor", "EstCivil_Descritor", "Descritor", 13, "xxxxxxxxxxxxx", EH_DESCRITOR, EstCivil ),
			new campo_arqPessoa_Profissao(),
			new campo_arqPessoa_Profissao_Profissao(),
			new campo_arqPessoa_CPF(),
			new campo_arqPessoa_Identidade(),
			new campo_arqPessoa_Orgao(),
			new campo_arqPessoa_Emissao(),
			new campo_arqPessoa_Email(),
			new campo_arqPessoa_RecEmail(),
			new campo_arqPessoa_Ativo(),
			new campo_arqPessoa_Obs(),
			new campo_arqPessoa_Desde(),
			new campo_arqPessoa_QtoDesmar(),
			new campo_arqPessoa_Midia(),
			new campo_arqPessoa_Midia_Midia() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqPessoa extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqPessoa",  // Nome Interno do arquivo
			"a_pessoa",  // Nome deste arquivo Php que contém o arquivo
			"Pessoa",  // Nome do arquivo acentuado-se
			listaCampos_arqPessoa( "" ), 7
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Nome, NumCelular ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Nome ];
			$vetAux[] = [ NumCelular ];
		if( ultimaLigOpcaoEm( 15,135 ) )
 {
			$vetAux[] = [ Prontuario ];
 }
			$vetAux[] = [ Ativo ];
		if( ultimaLigOpcaoEm( 15,135 ) )
 {
			$vetAux[] = [ QtoDesmar ];
 }
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Nome ];
			$vetAux[] = [ Apelido ];
			$vetAux[] = [ NumCelular ];
			$vetAux[] = [ Prontuario ];
			$vetAux[] = [ Ende_CEP ];
			$vetAux[] = [ Ende_Endereco ];
			$vetAux[] = [ Ende_Bairro_Bairro ];
			$vetAux[] = [ Ende_Cidade_UF_Chave ];
			$vetAux[] = [ Ende_Cidade_Cidade ];
			$vetAux[] = [ Ende_DDD ];
			$vetAux[] = [ Ende_Telefone ];
			$vetAux[] = [ Ende_DDDCelular ];
			$vetAux[] = [ Ende_Celular ];
			$vetAux[] = [ Ende_WhatsApp ];
			$vetAux[] = [ Nascimento ];
			$vetAux[] = [ Idade ];
			$vetAux[] = [ Sexo_Descritor ];
			$vetAux[] = [ EstCivil_Descritor ];
			$vetAux[] = [ Profissao_Profissao ];
			$vetAux[] = [ CPF ];
			$vetAux[] = [ Identidade ];
			$vetAux[] = [ Orgao ];
			$vetAux[] = [ Emissao ];
			$vetAux[] = [ Email ];
			$vetAux[] = [ RecEmail ];
			$vetAux[] = [ Ativo ];
			$vetAux[] = [ Obs ];
			$vetAux[] = [ Desde ];
			$vetAux[] = [ QtoDesmar ];
			$vetAux[] = [ Midia_Midia ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Pacientes' );
	}

}
