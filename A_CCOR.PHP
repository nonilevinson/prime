<?php

/*=========================================================================
  a_ccor - CCor
=========================================================================*/

if( DEF_a_ccor == 1 )
  return;
define( "DEF_a_ccor", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_ccor_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Nome
//======================================================

class campo_arqCCor_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Nome", "Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo Clinica
//======================================================

class campo_arqCCor_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Clínica" );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqCCor_Clinica_Clinica extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Clinica_Clinica", "Clinica_Clinica", "Clinica", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Clinica", false );
	}

}

//======================================================
//	Campo TCCor
//======================================================

class campo_arqCCor_TCCor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TCCor", "TCCor", "TCCor", 0, "tabTCCor", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Tipo" );
	}

}

//======================================================
//	Campo Banco
//======================================================

class campo_arqCCor_Banco extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Banco", "Banco", "Banco", 0, "arqBanco", "arqBanco.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, 0, false );
	}

}

//======================================================
//	Campo Banco_Num
//======================================================

class campo_arqCCor_Banco_Num extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Banco_Num", "Banco_Num", "Num", 3, "##z", "", "", EH_CHAVE, "Banco", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "N° Banco" );
	}

}

//======================================================
//	Campo Banco_Banco
//======================================================

class campo_arqCCor_Banco_Banco extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Banco_Banco", "Banco_Banco", "Banco", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Banco", false );
	}

}

//======================================================
//	Campo Agencia
//======================================================

class campo_arqCCor_Agencia extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Agencia", "Agencia", "Agencia", 4, "xxxx", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Agência" );
	}

}

//======================================================
//	Campo DvAgencia
//======================================================

class campo_arqCCor_DvAgencia extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "DvAgencia", "DvAgencia", "DvAgencia", 1, "x", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "DV" );
	}

}

//======================================================
//	Campo Conta
//======================================================

class campo_arqCCor_Conta extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Conta", "Conta", "Conta", 10, "xxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo DvConta
//======================================================

class campo_arqCCor_DvConta extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "DvConta", "DvConta", "DvConta", 1, "x", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "DV" );
	}

}

//======================================================
//	Campo Carteira
//======================================================

class campo_arqCCor_Carteira extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Carteira", "Carteira", "Carteira", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo CodCedente
//======================================================

class campo_arqCCor_CodCedente extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CodCedente", "CodCedente", "CodCedente", 11, "xxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Multa
//======================================================

class campo_arqCCor_Multa extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Multa", "Multa", "Multa", 5, "##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Juros
//======================================================

class campo_arqCCor_Juros extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Juros", "Juros", "Juros", 5, "##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo CBoleto
//======================================================

class campo_arqCCor_CBoleto extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "CBoleto", "CBoleto", "CBoleto", 5, "##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Instrucoes
//======================================================

class campo_arqCCor_Instrucoes extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Instrucoes", "Instrucoes", "Instrucoes", 7,70, false, false );
	}

}

//======================================================
//	Campo UltRemessa
//======================================================

class campo_arqCCor_UltRemessa extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "UltRemessa", "UltRemessa", "UltRemessa", 6, "###.##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Convenio
//======================================================

class campo_arqCCor_Convenio extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Convenio", "Convenio", "Convenio", 7, "nnnnnnn", 0, 0, false );
	}

}

//======================================================
//	Campo Variacao
//======================================================

class campo_arqCCor_Variacao extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Variacao", "Variacao", "Variacao", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqCCor_Ativo extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Ativo", "Ativo", "Ativo", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Ativa?" );
	}

}

//======================================================
//	Campo TPix1
//======================================================

class campo_arqCCor_TPix1 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TPix1", "TPix1", "TPix1", 0, "tabTPix", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Pix1
//======================================================

class campo_arqCCor_Pix1 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Pix1", "Pix1", "Pix1", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo TPix2
//======================================================

class campo_arqCCor_TPix2 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TPix2", "TPix2", "TPix2", 0, "tabTPix", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Pix2
//======================================================

class campo_arqCCor_Pix2 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Pix2", "Pix2", "Pix2", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo TPix3
//======================================================

class campo_arqCCor_TPix3 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TPix3", "TPix3", "TPix3", 0, "tabTPix", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Pix3
//======================================================

class campo_arqCCor_Pix3 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Pix3", "Pix3", "Pix3", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo TPix4
//======================================================

class campo_arqCCor_TPix4 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TPix4", "TPix4", "TPix4", 0, "tabTPix", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Pix4
//======================================================

class campo_arqCCor_Pix4 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Pix4", "Pix4", "Pix4", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo TPix5
//======================================================

class campo_arqCCor_TPix5 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TPix5", "TPix5", "TPix5", 0, "tabTPix", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Pix5
//======================================================

class campo_arqCCor_Pix5 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Pix5", "Pix5", "Pix5", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Arquivo arqCCor
//======================================================
function listaCampos_arqCCor( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqCCor_Nome(),
			new campo_arqCCor_Clinica(),
			new campo_arqCCor_Clinica_Clinica(),
			new campo_arqCCor_TCCor(),
			new Lance_CampoCadeia( "TCCor_Chave", "TCCor_Chave", "Chave", 1, "x", EH_CHAVE, TCCor ),
			new Lance_CampoCadeia( "TCCor_Descritor", "TCCor_Descritor", "Descritor", 10, "xxxxxxxxxx", EH_DESCRITOR, TCCor ),
			new campo_arqCCor_Banco(),
			new campo_arqCCor_Banco_Num(),
			new campo_arqCCor_Banco_Banco(),
			new campo_arqCCor_Agencia(),
			new campo_arqCCor_DvAgencia(),
			new campo_arqCCor_Conta(),
			new campo_arqCCor_DvConta(),
			new campo_arqCCor_Carteira(),
			new campo_arqCCor_CodCedente(),
			new campo_arqCCor_Multa(),
			new campo_arqCCor_Juros(),
			new campo_arqCCor_CBoleto(),
			new campo_arqCCor_Instrucoes(),
			new campo_arqCCor_UltRemessa(),
			new campo_arqCCor_Convenio(),
			new campo_arqCCor_Variacao(),
			new campo_arqCCor_Ativo(),
			new campo_arqCCor_TPix1(),
			new Lance_CampoCadeia( "TPix1_Chave", "TPix1_Chave", "Chave", 1, "x", EH_CHAVE, TPix1 ),
			new Lance_CampoCadeia( "TPix1_Descritor", "TPix1_Descritor", "Descritor", 9, "xxxxxxxxx", EH_DESCRITOR, TPix1 ),
			new campo_arqCCor_Pix1(),
			new campo_arqCCor_TPix2(),
			new Lance_CampoCadeia( "TPix2_Chave", "TPix2_Chave", "Chave", 1, "x", EH_CHAVE, TPix2 ),
			new Lance_CampoCadeia( "TPix2_Descritor", "TPix2_Descritor", "Descritor", 9, "xxxxxxxxx", EH_DESCRITOR, TPix2 ),
			new campo_arqCCor_Pix2(),
			new campo_arqCCor_TPix3(),
			new Lance_CampoCadeia( "TPix3_Chave", "TPix3_Chave", "Chave", 1, "x", EH_CHAVE, TPix3 ),
			new Lance_CampoCadeia( "TPix3_Descritor", "TPix3_Descritor", "Descritor", 9, "xxxxxxxxx", EH_DESCRITOR, TPix3 ),
			new campo_arqCCor_Pix3(),
			new campo_arqCCor_TPix4(),
			new Lance_CampoCadeia( "TPix4_Chave", "TPix4_Chave", "Chave", 1, "x", EH_CHAVE, TPix4 ),
			new Lance_CampoCadeia( "TPix4_Descritor", "TPix4_Descritor", "Descritor", 9, "xxxxxxxxx", EH_DESCRITOR, TPix4 ),
			new campo_arqCCor_Pix4(),
			new campo_arqCCor_TPix5(),
			new Lance_CampoCadeia( "TPix5_Chave", "TPix5_Chave", "Chave", 1, "x", EH_CHAVE, TPix5 ),
			new Lance_CampoCadeia( "TPix5_Descritor", "TPix5_Descritor", "Descritor", 9, "xxxxxxxxx", EH_DESCRITOR, TPix5 ),
			new campo_arqCCor_Pix5() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqCCor extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqCCor",  // Nome Interno do arquivo
			"a_ccor",  // Nome deste arquivo Php que contém o arquivo
			"CCor",  // Nome do arquivo acentuado-se
			listaCampos_arqCCor( "" ), 20
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Nome ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Nome ];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ TCCor_Descritor ];
			$vetAux[] = [ Banco_Num ];
			$vetAux[] = [ Banco_Banco ];
			$vetAux[] = [ Agencia ];
			$vetAux[] = [ DvAgencia ];
			$vetAux[] = [ Conta ];
			$vetAux[] = [ DvConta ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Clinica ], [ TCCor ], [ TCCor_Chave ], [ TCCor_Descritor ], [ Banco ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Nome ];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ TCCor_Descritor ];
			$vetAux[] = [ Banco_Num ];
			$vetAux[] = [ Banco_Banco ];
			$vetAux[] = [ Agencia ];
			$vetAux[] = [ DvAgencia ];
			$vetAux[] = [ Conta ];
			$vetAux[] = [ DvConta ];
			$vetAux[] = [ Carteira ];
			$vetAux[] = [ CodCedente ];
			$vetAux[] = [ Multa ];
			$vetAux[] = [ Juros ];
			$vetAux[] = [ CBoleto ];
			$vetAux[] = [ Instrucoes ];
			$vetAux[] = [ UltRemessa ];
			$vetAux[] = [ Convenio ];
			$vetAux[] = [ Variacao ];
			$vetAux[] = [ Ativo ];
			$vetAux[] = [ TPix1_Descritor ];
			$vetAux[] = [ Pix1 ];
			$vetAux[] = [ TPix2_Descritor ];
			$vetAux[] = [ Pix2 ];
			$vetAux[] = [ TPix3_Descritor ];
			$vetAux[] = [ Pix3 ];
			$vetAux[] = [ TPix4_Descritor ];
			$vetAux[] = [ Pix4 ];
			$vetAux[] = [ TPix5_Descritor ];
			$vetAux[] = [ Pix5 ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Contas correntes' );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: FilTodos  
	//-------------------------------------------------------------
	function FilTodos()
	{
	return( "" . filtrarTodos() . "" );
	}

}
