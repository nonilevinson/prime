<?php

/*=========================================================================
  a_qselec - QSelecao
=========================================================================*/

if( DEF_a_qselec == 1 )
  return;
define( "DEF_a_qselec", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_qselec_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Usuario
//======================================================

class campo_parQSelecao_Usuario extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Usuario", "Usuario", "Usuario", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Usuario_Usuario
//======================================================

class campo_parQSelecao_Usuario_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Usuario_Usuario", "Usuario_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Usuario", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Usuário" );
	}

}

//======================================================
//	Campo Medico
//======================================================

class campo_parQSelecao_Medico extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Medico", "Medico", "Medico", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Medico_Usuario
//======================================================

class campo_parQSelecao_Medico_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Medico_Usuario", "Medico_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Medico", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Usuário" );
	}

}

//======================================================
//	Campo StatusLog
//======================================================

class campo_parQSelecao_StatusLog extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "StatusLog", "StatusLog", "StatusLog", 0, "tabStatusLog", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Cliente
//======================================================

class campo_parQSelecao_Cliente extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cliente", "Cliente", "Cliente", 0, "arqPessoa", "arqPessoa.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Cliente_Nome
//======================================================

class campo_parQSelecao_Cliente_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cliente_Nome", "Cliente_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Cliente", false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->CLIENTE_QTODESMAR >= G_QTASDESMAR )
			return( "VermelhoFundoEsq" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo Cliente_Prontuario
//======================================================

class campo_parQSelecao_Cliente_Prontuario extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cliente_Prontuario", "Cliente_Prontuario", "Prontuario", 13, "#.###.###.###.##z", "", "", EH_CHAVE, "Cliente", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Prontuário" );
	}

}

//======================================================
//	Campo EmailRemet
//======================================================

class campo_parQSelecao_EmailRemet extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "EmailRemet", "EmailRemet", "EmailRemet", 0, "arqEmailRemet", "arqEmailRemet.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo EmailRemet_Email
//======================================================

class campo_parQSelecao_EmailRemet_Email extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "EmailRemet_Email", "EmailRemet_Email", "Email", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "EmailRemet", false );
	}

}

//======================================================
//	Campo AcaoEmail
//======================================================

class campo_parQSelecao_AcaoEmail extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "AcaoEmail", "AcaoEmail", "AcaoEmail", 0, "arqAcaoEmail", "arqAcaoEmail.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function FiltroPai()
	{
		global $g_regAtual;
			return( "PadraoAcao is null" );
	}

}

//======================================================
//	Campo AcaoEmail_Titulo
//======================================================

class campo_parQSelecao_AcaoEmail_Titulo extends Lance_CampoCadeia
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

class campo_parQSelecao_AcaoEmail_Versao extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "AcaoEmail_Versao", "AcaoEmail_Versao", "Versão", 20, "xxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "AcaoEmail", false );
	}

}

//======================================================
//	Campo TSimNao
//======================================================

class campo_parQSelecao_TSimNao extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TSimNao", "TSimNao", "TSimNao", 0, "tabTSimNao", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Cadeia100
//======================================================

class campo_parQSelecao_Cadeia100 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cadeia100", "Cadeia100", "Cadeia100", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Logico1
//======================================================

class campo_parQSelecao_Logico1 extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Logico1", "Logico1", "Logico1", "", 0, 0, false );
	}

}

//======================================================
//	Campo DataIni
//======================================================

class campo_parQSelecao_DataIni extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataIni", "DataIni", "DataIni", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo DataFim
//======================================================

class campo_parQSelecao_DataFim extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataFim", "DataFim", "DataFim", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo DataIni1
//======================================================

class campo_parQSelecao_DataIni1 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataIni1", "DataIni1", "DataIni1", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo DataFim1
//======================================================

class campo_parQSelecao_DataFim1 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataFim1", "DataFim1", "DataFim1", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo HoraIni
//======================================================

class campo_parQSelecao_HoraIni extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "HoraIni", "HoraIni", "HoraIni", 4, "hh:mm", 0, 0, false );
	}

}

//======================================================
//	Campo HoraFim
//======================================================

class campo_parQSelecao_HoraFim extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "HoraFim", "HoraFim", "HoraFim", 4, "hh:mm", 0, 0, false );
	}

}

//======================================================
//	Campo Gran6
//======================================================

class campo_parQSelecao_Gran6 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Gran6", "Gran6", "Gran6", 6, "###.##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Gran6Fim
//======================================================

class campo_parQSelecao_Gran6Fim extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Gran6Fim", "Gran6Fim", "Gran6Fim", 6, "###.##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Real6
//======================================================

class campo_parQSelecao_Real6 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Real6", "Real6", "Real6", 8, "###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Real6Fim
//======================================================

class campo_parQSelecao_Real6Fim extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Real6Fim", "Real6Fim", "Real6Fim", 8, "###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Gran13
//======================================================

class campo_parQSelecao_Gran13 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Gran13", "Gran13", "Gran13", 13, "#.###.###.###.##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Senha1
//======================================================

class campo_parQSelecao_Senha1 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Senha1", "Senha1", "Senha1", 20, "xxxxxxxxxxxxxxxxxxxx", 0, 0, true );
	}

}

//======================================================
//	Campo Senha2
//======================================================

class campo_parQSelecao_Senha2 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Senha2", "Senha2", "Senha2", 20, "xxxxxxxxxxxxxxxxxxxx", 0, 0, true );
	}

}

//======================================================
//	Campo Clinica
//======================================================

class campo_parQSelecao_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_parQSelecao_Clinica_Clinica extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Clinica_Clinica", "Clinica_Clinica", "Clinica", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Clinica", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Clínica" );
	}

}

//======================================================
//	Campo TStCon
//======================================================

class campo_parQSelecao_TStCon extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TStCon", "TStCon", "TStCon", 0, "tabTStCon", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo TMov
//======================================================

class campo_parQSelecao_TMov extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TMov", "TMov", "TMov", 0, "tabTMov", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo TPgRec
//======================================================

class campo_parQSelecao_TPgRec extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TPgRec", "TPgRec", "TPgRec", 0, "tabTPgRec", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Fornecedor
//======================================================

class campo_parQSelecao_Fornecedor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Fornecedor", "Fornecedor", "Fornecedor", 0, "arqFornecedor", "arqFornecedor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Fornecedor_Nome
//======================================================

class campo_parQSelecao_Fornecedor_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Fornecedor_Nome", "Fornecedor_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Fornecedor", false );
	}

}

//======================================================
//	Arquivo parQSelecao
//======================================================
function listaCampos_parQSelecao( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_parQSelecao_Usuario(),
			new campo_parQSelecao_Usuario_Usuario(),
			new campo_parQSelecao_Medico(),
			new campo_parQSelecao_Medico_Usuario(),
			new campo_parQSelecao_StatusLog(),
			new Lance_CampoCadeia( "StatusLog_Chave", "StatusLog_Chave", "Chave", 2, "xx", EH_CHAVE, StatusLog ),
			new Lance_CampoCadeia( "StatusLog_Descritor", "StatusLog_Descritor", "Descritor", 13, "xxxxxxxxxxxxx", EH_DESCRITOR, StatusLog ),
			new campo_parQSelecao_Cliente(),
			new campo_parQSelecao_Cliente_Nome(),
			new campo_parQSelecao_Cliente_Prontuario(),
			new campo_parQSelecao_EmailRemet(),
			new campo_parQSelecao_EmailRemet_Email(),
			new campo_parQSelecao_AcaoEmail(),
			new campo_parQSelecao_AcaoEmail_Titulo(),
			new campo_parQSelecao_AcaoEmail_Versao(),
			new campo_parQSelecao_TSimNao(),
			new Lance_CampoCadeia( "TSimNao_Chave", "TSimNao_Chave", "Chave", 1, "x", EH_CHAVE, TSimNao ),
			new Lance_CampoCadeia( "TSimNao_Descritor", "TSimNao_Descritor", "Descritor", 3, "xxx", EH_DESCRITOR, TSimNao ),
			new campo_parQSelecao_Cadeia100(),
			new campo_parQSelecao_Logico1(),
			new campo_parQSelecao_DataIni(),
			new campo_parQSelecao_DataFim(),
			new campo_parQSelecao_DataIni1(),
			new campo_parQSelecao_DataFim1(),
			new campo_parQSelecao_HoraIni(),
			new campo_parQSelecao_HoraFim(),
			new campo_parQSelecao_Gran6(),
			new campo_parQSelecao_Gran6Fim(),
			new campo_parQSelecao_Real6(),
			new campo_parQSelecao_Real6Fim(),
			new campo_parQSelecao_Gran13(),
			new campo_parQSelecao_Senha1(),
			new campo_parQSelecao_Senha2(),
			new campo_parQSelecao_Clinica(),
			new campo_parQSelecao_Clinica_Clinica(),
			new campo_parQSelecao_TStCon(),
			new Lance_CampoCadeia( "TStCon_Chave", "TStCon_Chave", "Chave", 2, "xx", EH_CHAVE, TStCon ),
			new Lance_CampoCadeia( "TStCon_Descritor", "TStCon_Descritor", "Descritor", 18, "xxxxxxxxxxxxxxxxxx", EH_DESCRITOR, TStCon ),
			new campo_parQSelecao_TMov(),
			new Lance_CampoCadeia( "TMov_Chave", "TMov_Chave", "Chave", 1, "x", EH_CHAVE, TMov ),
			new Lance_CampoCadeia( "TMov_Descritor", "TMov_Descritor", "Descritor", 14, "xxxxxxxxxxxxxx", EH_DESCRITOR, TMov ),
			new campo_parQSelecao_TPgRec(),
			new Lance_CampoCadeia( "TPgRec_Chave", "TPgRec_Chave", "Chave", 1, "x", EH_CHAVE, TPgRec ),
			new Lance_CampoCadeia( "TPgRec_Descritor", "TPgRec_Descritor", "Descritor", 7, "xxxxxxx", EH_DESCRITOR, TPgRec ),
			new campo_parQSelecao_Fornecedor(),
			new campo_parQSelecao_Fornecedor_Nome() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class parQSelecao extends Lance_Parametro
{
	function __construct()
	{
		parent::__construct(
			"parQSelecao",  // Nome Interno do arquivo
			"a_qselec",  // Nome deste arquivo Php que contém o arquivo
			"QSelecao",  // Nome do arquivo acentuado-se
			listaCampos_parQSelecao( "" ), 6
		);
	}

}
?>
