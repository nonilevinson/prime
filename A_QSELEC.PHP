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
//	Campo Assessor
//======================================================

class campo_parQSelecao_Assessor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Assessor", "Assessor", "Assessor", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Assessor_Usuario
//======================================================

class campo_parQSelecao_Assessor_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Assessor_Usuario", "Assessor_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Assessor", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Usuário" );
	}

}

//======================================================
//	Campo CallCenter
//======================================================

class campo_parQSelecao_CallCenter extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "CallCenter", "CallCenter", "CallCenter", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo CallCenter_Usuario
//======================================================

class campo_parQSelecao_CallCenter_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CallCenter_Usuario", "CallCenter_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "CallCenter", false );
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
//	Campo Cliente_NumCelular
//======================================================

class campo_parQSelecao_Cliente_NumCelular extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cliente_NumCelular", "Cliente_NumCelular", "NumCelular", 11, "(##) #.####.####", EH_CHAVE, "Cliente", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Celular" );
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
//	Campo Cadeia30
//======================================================

class campo_parQSelecao_Cadeia30 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cadeia30", "Cadeia30", "Cadeia30", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
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
//	Campo MesIni
//======================================================

class campo_parQSelecao_MesIni extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "MesIni", "MesIni", "MesIni", 6, "mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo MesFim
//======================================================

class campo_parQSelecao_MesFim extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "MesFim", "MesFim", "MesFim", 6, "mm/aaaa", 0, 0, false );
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
//	Campo Gran9
//======================================================

class campo_parQSelecao_Gran9 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Gran9", "Gran9", "Gran9", 9, "###.###.##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Gran9Fim
//======================================================

class campo_parQSelecao_Gran9Fim extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Gran9Fim", "Gran9Fim", "Gran9Fim", 9, "###.###.##z", "", "", 0, 0, false );
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
//	Campo SubPlano
//======================================================

class campo_parQSelecao_SubPlano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SubPlano", "SubPlano", "SubPlano", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, 0, false );
	}

}

//======================================================
//	Campo SubPlano_Plano
//======================================================

class campo_parQSelecao_SubPlano_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SubPlano_Plano", "SubPlano_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "SubPlano", false );
	}

}

//======================================================
//	Campo SubPlano_Plano_CodPlano
//======================================================

class campo_parQSelecao_SubPlano_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "SubPlano_Plano_CodPlano", "SubPlano_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "SubPlano_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo SubPlano_Plano_Plano
//======================================================

class campo_parQSelecao_SubPlano_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlano_Plano_Plano", "SubPlano_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "SubPlano_Plano", false );
	}

}

//======================================================
//	Campo SubPlano_Codigo
//======================================================

class campo_parQSelecao_SubPlano_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlano_Codigo", "SubPlano_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "SubPlano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo SubPlano_Nome
//======================================================

class campo_parQSelecao_SubPlano_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlano_Nome", "SubPlano_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "SubPlano", false );
	}

}

//======================================================
//	Campo TData
//======================================================

class campo_parQSelecao_TData extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TData", "TData", "TData", 0, "tabTData", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo CCor
//======================================================

class campo_parQSelecao_CCor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "CCor", "CCor", "CCor", 0, "arqCCor", "arqCCor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo CCor_Nome
//======================================================

class campo_parQSelecao_CCor_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CCor_Nome", "CCor_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "CCor", false );
	}

}

//======================================================
//	Campo TFCobra
//======================================================

class campo_parQSelecao_TFCobra extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TFCobra", "TFCobra", "TFCobra", 0, "tabTFCobra", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo TFPagto
//======================================================

class campo_parQSelecao_TFPagto extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TFPagto", "TFPagto", "TFPagto", 0, "tabTFPagto", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Consulta
//======================================================

class campo_parQSelecao_Consulta extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Consulta", "Consulta", "Consulta", 0, "arqConsulta", "arqConsulta.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Consulta_Num
//======================================================

class campo_parQSelecao_Consulta_Num extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Consulta_Num", "Consulta_Num", "Num", 6, "###.##z", "", "", EH_CHAVE, "Consulta", false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( !tem( $g_regAtual->CONSULTA_DATARET ) && $g_regAtual->CONSULTA_TSTAGRET != 3 && ($g_regAtual->CONSULTA_TRGQTDM > 0 && $g_regAtual->CONSULTA_TRGQTDM == $g_regAtual->CONSULTA_TRGQTDMENT) )
			return( "VerdeFundoDir" );
		if( tem( $g_regAtual->CONSULTA_DATARET ) && !tem( $g_regAtual->CONSULTA_TSTAGRET ) )
			return( "StAgendado" );
		if( tem( $g_regAtual->CONSULTA_DATARET ) && $g_regAtual->CONSULTA_TSTAGRET == 1 )
			return( "StRecepcao" );
		if( tem( $g_regAtual->CONSULTA_DATARET ) && $g_regAtual->CONSULTA_TSTAGRET == 2 )
			return( "StAssessor" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "N°" );
	}

}

//======================================================
//	Campo TStAgRet
//======================================================

class campo_parQSelecao_TStAgRet extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TStAgRet", "TStAgRet", "TStAgRet", 0, "tabTStAgRet", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Medicamen
//======================================================

class campo_parQSelecao_Medicamen extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Medicamen", "Medicamen", "Medicamen", 0, "arqMedicamen", "arqMedicamen.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Medicamen_Medicamen
//======================================================

class campo_parQSelecao_Medicamen_Medicamen extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Medicamen_Medicamen", "Medicamen_Medicamen", "Medicamen", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Medicamen", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Medicamento" );
	}

}

//======================================================
//	Campo Lote
//======================================================

class campo_parQSelecao_Lote extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Lote", "Lote", "Lote", 0, "arqLote", "arqLote.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Lote_Medicamen
//======================================================

class campo_parQSelecao_Lote_Medicamen extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Lote_Medicamen", "Lote_Medicamen", "Medicamen", EH_CHAVE, "arqMedicamen", "arqMedicamen.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, "Lote", false );
	}

}

//======================================================
//	Campo Lote_Medicamen_Medicamen
//======================================================

class campo_parQSelecao_Lote_Medicamen_Medicamen extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Lote_Medicamen_Medicamen", "Lote_Medicamen_Medicamen", "Medicamen", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Lote_Medicamen", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Medicamento" );
	}

}

//======================================================
//	Campo Lote_Lote
//======================================================

class campo_parQSelecao_Lote_Lote extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Lote_Lote", "Lote_Lote", "Lote", 15, "xxxxxxxxxxxxxxx", EH_CHAVE, "Lote", false );
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
			new campo_parQSelecao_Assessor(),
			new campo_parQSelecao_Assessor_Usuario(),
			new campo_parQSelecao_CallCenter(),
			new campo_parQSelecao_CallCenter_Usuario(),
			new campo_parQSelecao_StatusLog(),
			new Lance_CampoCadeia( "StatusLog_Chave", "StatusLog_Chave", "Chave", 2, "xx", EH_CHAVE, StatusLog ),
			new Lance_CampoCadeia( "StatusLog_Descritor", "StatusLog_Descritor", "Descritor", 13, "xxxxxxxxxxxxx", EH_DESCRITOR, StatusLog ),
			new campo_parQSelecao_Cliente(),
			new campo_parQSelecao_Cliente_Nome(),
			new campo_parQSelecao_Cliente_NumCelular(),
			new campo_parQSelecao_Fornecedor(),
			new campo_parQSelecao_Fornecedor_Nome(),
			new campo_parQSelecao_EmailRemet(),
			new campo_parQSelecao_EmailRemet_Email(),
			new campo_parQSelecao_AcaoEmail(),
			new campo_parQSelecao_AcaoEmail_Titulo(),
			new campo_parQSelecao_AcaoEmail_Versao(),
			new campo_parQSelecao_TSimNao(),
			new Lance_CampoCadeia( "TSimNao_Chave", "TSimNao_Chave", "Chave", 1, "x", EH_CHAVE, TSimNao ),
			new Lance_CampoCadeia( "TSimNao_Descritor", "TSimNao_Descritor", "Descritor", 3, "xxx", EH_DESCRITOR, TSimNao ),
			new campo_parQSelecao_Cadeia30(),
			new campo_parQSelecao_Cadeia100(),
			new campo_parQSelecao_Logico1(),
			new campo_parQSelecao_DataIni(),
			new campo_parQSelecao_DataFim(),
			new campo_parQSelecao_DataIni1(),
			new campo_parQSelecao_DataFim1(),
			new campo_parQSelecao_MesIni(),
			new campo_parQSelecao_MesFim(),
			new campo_parQSelecao_HoraIni(),
			new campo_parQSelecao_HoraFim(),
			new campo_parQSelecao_Gran6(),
			new campo_parQSelecao_Gran6Fim(),
			new campo_parQSelecao_Gran9(),
			new campo_parQSelecao_Gran9Fim(),
			new campo_parQSelecao_Gran13(),
			new campo_parQSelecao_Real6(),
			new campo_parQSelecao_Real6Fim(),
			new campo_parQSelecao_Senha1(),
			new campo_parQSelecao_Senha2(),
			new campo_parQSelecao_Clinica(),
			new campo_parQSelecao_Clinica_Clinica(),
			new campo_parQSelecao_TStCon(),
			new Lance_CampoCadeia( "TStCon_Chave", "TStCon_Chave", "Chave", 2, "xx", EH_CHAVE, TStCon ),
			new Lance_CampoCadeia( "TStCon_Descritor", "TStCon_Descritor", "Descritor", 18, "xxxxxxxxxxxxxxxxxx", EH_DESCRITOR, TStCon ),
			new campo_parQSelecao_TMov(),
			new Lance_CampoCadeia( "TMov_Chave", "TMov_Chave", "Chave", 1, "x", EH_CHAVE, TMov ),
			new Lance_CampoCadeia( "TMov_Descritor", "TMov_Descritor", "Descritor", 19, "xxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, TMov ),
			new campo_parQSelecao_TPgRec(),
			new Lance_CampoCadeia( "TPgRec_Chave", "TPgRec_Chave", "Chave", 1, "x", EH_CHAVE, TPgRec ),
			new Lance_CampoCadeia( "TPgRec_Descritor", "TPgRec_Descritor", "Descritor", 7, "xxxxxxx", EH_DESCRITOR, TPgRec ),
			new campo_parQSelecao_SubPlano(),
			new campo_parQSelecao_SubPlano_Plano(),
			new campo_parQSelecao_SubPlano_Plano_CodPlano(),
			new campo_parQSelecao_SubPlano_Plano_Plano(),
			new campo_parQSelecao_SubPlano_Codigo(),
			new campo_parQSelecao_SubPlano_Nome(),
			new campo_parQSelecao_TData(),
			new Lance_CampoCadeia( "TData_Chave", "TData_Chave", "Chave", 1, "x", EH_CHAVE, TData ),
			new Lance_CampoCadeia( "TData_Descritor", "TData_Descritor", "Descritor", 10, "xxxxxxxxxx", EH_DESCRITOR, TData ),
			new campo_parQSelecao_CCor(),
			new campo_parQSelecao_CCor_Nome(),
			new campo_parQSelecao_TFCobra(),
			new Lance_CampoCadeia( "TFCobra_Chave", "TFCobra_Chave", "Chave", 1, "x", EH_CHAVE, TFCobra ),
			new Lance_CampoCadeia( "TFCobra_Descritor", "TFCobra_Descritor", "Descritor", 10, "xxxxxxxxxx", EH_DESCRITOR, TFCobra ),
			new campo_parQSelecao_TFPagto(),
			new Lance_CampoCadeia( "TFPagto_Chave", "TFPagto_Chave", "Chave", 1, "x", EH_CHAVE, TFPagto ),
			new Lance_CampoCadeia( "TFPagto_Descritor", "TFPagto_Descritor", "Descritor", 8, "xxxxxxxx", EH_DESCRITOR, TFPagto ),
			new campo_parQSelecao_Consulta(),
			new campo_parQSelecao_Consulta_Num(),
			new campo_parQSelecao_TStAgRet(),
			new Lance_CampoCadeia( "TStAgRet_Chave", "TStAgRet_Chave", "Chave", 1, "x", EH_CHAVE, TStAgRet ),
			new Lance_CampoCadeia( "TStAgRet_Descritor", "TStAgRet_Descritor", "Descritor", 11, "xxxxxxxxxxx", EH_DESCRITOR, TStAgRet ),
			new campo_parQSelecao_Medicamen(),
			new campo_parQSelecao_Medicamen_Medicamen(),
			new campo_parQSelecao_Lote(),
			new campo_parQSelecao_Lote_Medicamen(),
			new campo_parQSelecao_Lote_Medicamen_Medicamen(),
			new campo_parQSelecao_Lote_Lote() )
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
