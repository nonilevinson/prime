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
//	Campo TPessoa
//======================================================

class campo_arqPessoa_TPessoa extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TPessoa", "TPessoa", "TPessoa", 0, "tabTPessoa", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Tipo" );
	}

}

//======================================================
//	Campo TPFPJ
//======================================================

class campo_arqPessoa_TPFPJ extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TPFPJ", "TPFPJ", "TPFPJ", 0, "tabTPFPJ", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "PF/PJ" );
	}

}

//======================================================
//	Campo Prontuario
//======================================================

class campo_arqPessoa_Prontuario extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Prontuario", "Prontuario", "Prontuario", 13, "#.###.###.###.##z", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Prontuário" );
	}

}

//======================================================
//	Campo CNPJ
//======================================================

class campo_arqPessoa_CNPJ extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CNPJ", "CNPJ", "CNPJ", 14, "##.###.###/####-##", 0, 0, false );
	}

}

//======================================================
//	Campo InscEstad
//======================================================

class campo_arqPessoa_InscEstad extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "InscEstad", "InscEstad", "InscEstad", 25, "xxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo InscMunic
//======================================================

class campo_arqPessoa_InscMunic extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "InscMunic", "InscMunic", "InscMunic", 25, "xxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
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
		parent::__construct( "QtoDesmar", "QtoDesmar", "QtoDesmar", 2, "#z", "", "", 0, 0, false );
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
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqPessoa_Nome(),
			new campo_arqPessoa_Apelido(),
			new campo_arqPessoa_TPessoa(),
			new Lance_CampoCadeia( "TPessoa_Chave", "TPessoa_Chave", "Chave", 1, "x", EH_CHAVE, TPessoa ),
			new Lance_CampoCadeia( "TPessoa_Descritor", "TPessoa_Descritor", "Descritor", 10, "xxxxxxxxxx", EH_DESCRITOR, TPessoa ),
			new campo_arqPessoa_TPFPJ(),
			new Lance_CampoCadeia( "TPFPJ_Chave", "TPFPJ_Chave", "Chave", 1, "x", EH_CHAVE, TPFPJ ),
			new Lance_CampoCadeia( "TPFPJ_Descritor", "TPFPJ_Descritor", "Descritor", 8, "xxxxxxxx", EH_DESCRITOR, TPFPJ ),
			new campo_arqPessoa_Prontuario() ),
		listaCampos_domEndereco( "Ende_" ),
		array( 
			new campo_arqPessoa_CNPJ(),
			new campo_arqPessoa_InscEstad(),
			new campo_arqPessoa_InscMunic(),
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
			new campo_arqPessoa_Midia_Midia() )
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
		if( ultimaLigOpcaoEm( 15,136 ) )
 {
			array_push( $vetAux, array( TPessoa_Descritor ) );
 }
		if( ultimaLigOpcaoEm( 15,136 ) )
 {
			array_push( $vetAux, array( TPFPJ_Descritor ) );
 }
		if( ultimaLigOpcaoEm( 15,135 ) )
 {
			array_push( $vetAux, array( Prontuario ) );
 }
			array_push( $vetAux, array( Ativo ) );
		if( ultimaLigOpcaoEm( 15,135 ) )
 {
			array_push( $vetAux, array( QtoDesmar ) );
 }
		return( $vetAux );
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
			array_push( $vetAux, array( TPessoa_Descritor ) );
			array_push( $vetAux, array( TPFPJ_Descritor ) );
			array_push( $vetAux, array( Prontuario ) );
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
			array_push( $vetAux, array( Nascimento ) );
			array_push( $vetAux, array( Idade ) );
			array_push( $vetAux, array( Sexo_Descritor ) );
			array_push( $vetAux, array( EstCivil_Descritor ) );
			array_push( $vetAux, array( Profissao_Profissao ) );
			array_push( $vetAux, array( CPF ) );
			array_push( $vetAux, array( Identidade ) );
			array_push( $vetAux, array( Orgao ) );
			array_push( $vetAux, array( Emissao ) );
			array_push( $vetAux, array( Email ) );
			array_push( $vetAux, array( RecEmail ) );
			array_push( $vetAux, array( Ativo ) );
			array_push( $vetAux, array( Obs ) );
			array_push( $vetAux, array( Desde ) );
			array_push( $vetAux, array( QtoDesmar ) );
			array_push( $vetAux, array( Midia_Midia ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Pessoas' );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: EhPaciente
	//-------------------------------------------------------------
	function EhPaciente()
	{
	return( "TPessoa = 2" );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: NaoPacien 
	//-------------------------------------------------------------
	function NaoPacien()
	{
	return( "TPessoa != 2" );
	}

}
?>
