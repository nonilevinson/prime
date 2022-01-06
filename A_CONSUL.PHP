<?php

/*=========================================================================
  a_consul - Consulta
=========================================================================*/

if( DEF_a_consul == 1 )
  return;
define( "DEF_a_consul", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_consul_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Num
//======================================================

class campo_arqConsulta_Num extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Num", "Num", "Num", 6, "###.##z", "", "", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( !tem( $g_regAtual->DATARET ) && $g_regAtual->TSTAGRET != 3 && ($g_regAtual->TRGQTDM > 0 && $g_regAtual->TRGQTDM == $g_regAtual->TRGQTDMENT) )
			return( "VerdeFundoDir" );
		if( tem( $g_regAtual->DATARET ) && !tem( $g_regAtual->TSTAGRET ) )
			return( "StAgendado" );
		if( tem( $g_regAtual->DATARET ) && $g_regAtual->TSTAGRET == 1 )
			return( "StRecepcao" );
		if( tem( $g_regAtual->DATARET ) && $g_regAtual->TSTAGRET == 2 )
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
//	Campo Clinica
//======================================================

class campo_arqConsulta_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqConsulta_Clinica_Clinica extends Lance_CampoCadeia
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

class campo_arqConsulta_TStCon extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TStCon", "TStCon", "TStCon", 0, "tabTStCon", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->TSTCON == 1 )
			return( "StAgendado" );
		if( $g_regAtual->TSTCON == 2 )
			return( "StRecepcao" );
		if( $g_regAtual->TSTCON == 3 )
			return( "StMedico" );
		if( $g_regAtual->TSTCON == 4 )
			return( "StTeste" );
		if( $g_regAtual->TSTCON == 5 )
			return( "StAgAssessor" );
		if( $g_regAtual->TSTCON == 6 )
			return( "StAssessor" );
		if( $g_regAtual->TSTCON == 7 )
			return( "StAtendido" );
		if( $g_regAtual->TSTCON == 8 )
			return( "StLiberado" );
		if( $g_regAtual->TSTCON == 9 )
			return( "StClinicaDesmarcou" );
		if( $g_regAtual->TSTCON == 10 )
			return( "StPacienteDesmarcou" );
		if( $g_regAtual->TSTCON == 11 )
			return( "StMedicoDesmarcou" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Status" );
	}

}

//======================================================
//	Campo TiAgenda
//======================================================

class campo_arqConsulta_TiAgenda extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TiAgenda", "TiAgenda", "TiAgenda", 0, "arqTiAgenda", "arqTiAgenda.IdPrimario DESC", LANCE_LIG_SELECAO, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Tipo" );
	}

}

//======================================================
//	Campo TiAgenda_TiAgenda
//======================================================

class campo_arqConsulta_TiAgenda_TiAgenda extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "TiAgenda_TiAgenda", "TiAgenda_TiAgenda", "TiAgenda", 20, "xxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "TiAgenda", false );
	}

}

//======================================================
//	Campo Data
//======================================================

class campo_arqConsulta_Data extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Data", "Data", "Data", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( formatarData( $g_regAtual->DATA ) == HOJE )
			return( "DataHoje" );
		if( quantosDias( formatarData( $g_regAtual->DATA ), HOJE ) > 0 )
			return( "DataFutura" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo Hora
//======================================================

class campo_arqConsulta_Hora extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "Hora", "Hora", "Hora", 4, "hh:mm", 0, 0, false );
	}

}

//======================================================
//	Campo HoraChega
//======================================================

class campo_arqConsulta_HoraChega extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "HoraChega", "HoraChega", "HoraChega", 4, "hh:mm", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Chegou às" );
	}

}

//======================================================
//	Campo Pessoa
//======================================================

class campo_arqConsulta_Pessoa extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Pessoa", "Pessoa", "Pessoa", 0, "arqPessoa", "arqPessoa.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Paciente" );
	}

}

//======================================================
//	Campo Pessoa_Nome
//======================================================

class campo_arqConsulta_Pessoa_Nome extends Lance_CampoCadeia
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

class campo_arqConsulta_Pessoa_NumCelular extends Lance_CampoCadeia
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
//	Campo Prontuario
//======================================================

class campo_arqConsulta_Prontuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Prontuario", "Prontuario", "Prontuario", 9, "xxxxxxxxx", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Prontuário" );
	}

}

//======================================================
//	Campo Medico
//======================================================

class campo_arqConsulta_Medico extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Medico", "Medico", "Medico", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Médico" );
	}

}

//======================================================
//	Campo Medico_Usuario
//======================================================

class campo_arqConsulta_Medico_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Medico_Usuario", "Medico_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Medico", false );
	}

}

//======================================================
//	Campo Assessor
//======================================================

class campo_arqConsulta_Assessor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Assessor", "Assessor", "Assessor", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Assessor" );
	}

}

//======================================================
//	Campo Assessor_Usuario
//======================================================

class campo_arqConsulta_Assessor_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Assessor_Usuario", "Assessor_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Assessor", false );
	}

}

//======================================================
//	Campo CallCenter
//======================================================

class campo_arqConsulta_CallCenter extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "CallCenter", "CallCenter", "CallCenter", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Call center" );
	}

}

//======================================================
//	Campo CallCenter_Usuario
//======================================================

class campo_arqConsulta_CallCenter_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CallCenter_Usuario", "CallCenter_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "CallCenter", false );
	}

}

//======================================================
//	Campo MedicaAtua
//======================================================

class campo_arqConsulta_MedicaAtua extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "MedicaAtua", "MedicaAtua", "MedicaAtua", 10,90, false, false );
	}

}

//======================================================
//	Campo TMotivo
//======================================================

class campo_arqConsulta_TMotivo extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TMotivo", "TMotivo", "TMotivo", 0, "tabTMotivo", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Motivo" );
	}

}

//======================================================
//	Campo FormaPg
//======================================================

class campo_arqConsulta_FormaPg extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "FormaPg", "FormaPg", "FormaPg", 0, "arqFormaPg", "arqFormaPg.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Forma Pagto" );
	}

}

//======================================================
//	Campo FormaPg_FormaPg
//======================================================

class campo_arqConsulta_FormaPg_FormaPg extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "FormaPg_FormaPg", "FormaPg_FormaPg", "FormaPg", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "FormaPg", false );
	}

}

//======================================================
//	Campo Valor
//======================================================

class campo_arqConsulta_Valor extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor", "Valor", "Valor", 8, "###.##z,zz", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function PodeTotalizar()
	{
		global $g_regAtual;
		return( (true) );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Valor<br>Consulta" );
	}

}

//======================================================
//	Campo PTrata
//======================================================

class campo_arqConsulta_PTrata extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "PTrata", "PTrata", "PTrata", 0, "arqPTrata", "arqPTrata.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function PegaPai()
	{
		global $g_regAtual;
		$vetPai = array();
			array_push( $vetPai, 
				array( "Valor, MrgDesc", 
					"A.PTrata, arqPTrata",
					"0,0" ) );
		return( $vetPai );
	}

}

//======================================================
//	Campo PTrata_PTrata
//======================================================

class campo_arqConsulta_PTrata_PTrata extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "PTrata_PTrata", "PTrata_PTrata", "PTrata", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "PTrata", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Plano" );
	}

}

//======================================================
//	Campo ValPTrata
//======================================================

class campo_arqConsulta_ValPTrata extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "ValPTrata", "ValPTrata", "ValPTrata", 8, "###.##z,zz", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function PodeTotalizar()
	{
		global $g_regAtual;
		return( (true) );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Valor<br>Tratamento" );
	}

}

//======================================================
//	Campo EntraFPg
//======================================================

class campo_arqConsulta_EntraFPg extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "EntraFPg", "EntraFPg", "EntraFPg", 0, "arqFormaPg", "arqFormaPg.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function PegaPai()
	{
		global $g_regAtual;
		$vetPai = array();
			array_push( $vetPai, 
				array( "Boleto", 
					"A.EntraFPg, arqFormaPg",
					"0" ) );
		return( $vetPai );
	}

}

//======================================================
//	Campo EntraFPg_FormaPg
//======================================================

class campo_arqConsulta_EntraFPg_FormaPg extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "EntraFPg_FormaPg", "EntraFPg_FormaPg", "FormaPg", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "EntraFPg", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Forma" );
	}

}

//======================================================
//	Campo EntraVal
//======================================================

class campo_arqConsulta_EntraVal extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "EntraVal", "EntraVal", "EntraVal", 8, "###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo EntraParc
//======================================================

class campo_arqConsulta_EntraParc extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "EntraParc", "EntraParc", "EntraParc", 2, "#z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo EntraValP
//======================================================

class campo_arqConsulta_EntraValP extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "EntraValP", "EntraValP", "EntraValP", 8, "###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo EntraTotP
//======================================================

class campo_arqConsulta_EntraTotP extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "EntraTotP", "EntraTotP", "EntraTotP", 8, "###.##z,zz", "", "", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo BoletoMin
//======================================================

class campo_arqConsulta_BoletoMin extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "BoletoMin", "BoletoMin", "BoletoMin", 8, "###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo EntraObs
//======================================================

class campo_arqConsulta_EntraObs extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "EntraObs", "EntraObs", "EntraObs", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo SaldoParc
//======================================================

class campo_arqConsulta_SaldoParc extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "SaldoParc", "SaldoParc", "SaldoParc", 2, "#z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo SaldoVal
//======================================================

class campo_arqConsulta_SaldoVal extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "SaldoVal", "SaldoVal", "SaldoVal", 8, "###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo SaldoTotP
//======================================================

class campo_arqConsulta_SaldoTotP extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "SaldoTotP", "SaldoTotP", "SaldoTotP", 8, "###.##z,zz", "", "", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo SaldoFPg
//======================================================

class campo_arqConsulta_SaldoFPg extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SaldoFPg", "SaldoFPg", "SaldoFPg", 0, "arqFormaPg", "arqFormaPg.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo SaldoFPg_FormaPg
//======================================================

class campo_arqConsulta_SaldoFPg_FormaPg extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SaldoFPg_FormaPg", "SaldoFPg_FormaPg", "FormaPg", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "SaldoFPg", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Forma" );
	}

}

//======================================================
//	Campo SaldoObs
//======================================================

class campo_arqConsulta_SaldoObs extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SaldoObs", "SaldoObs", "SaldoObs", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Conduta
//======================================================

class campo_arqConsulta_Conduta extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Conduta", "Conduta", "Conduta", 10,90, false, false );
	}

}

//======================================================
//	Campo Medicacao
//======================================================

class campo_arqConsulta_Medicacao extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Medicacao", "Medicacao", "Medicacao", 10,90, false, false );
	}

}

//======================================================
//	Campo Obs
//======================================================

class campo_arqConsulta_Obs extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Obs", "Obs", "Obs", 10,80, false, false );
	}

}

//======================================================
//	Campo ContaCons
//======================================================

class campo_arqConsulta_ContaCons extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "ContaCons", "ContaCons", "ContaCons", 0, "arqConta", "arqConta.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo ContaCons_Transacao
//======================================================

class campo_arqConsulta_ContaCons_Transacao extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "ContaCons_Transacao", "ContaCons_Transacao", "Transacao", 6, "###.##z", "", "", EH_CHAVE, "ContaCons", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Transação" );
	}

}

//======================================================
//	Campo ContaPTra
//======================================================

class campo_arqConsulta_ContaPTra extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "ContaPTra", "ContaPTra", "ContaPTra", 0, "arqConta", "arqConta.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo ContaPTra_Transacao
//======================================================

class campo_arqConsulta_ContaPTra_Transacao extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "ContaPTra_Transacao", "ContaPTra_Transacao", "Transacao", 6, "###.##z", "", "", EH_CHAVE, "ContaPTra", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Transação" );
	}

}

//======================================================
//	Campo TrgQtdM
//======================================================

class campo_arqConsulta_TrgQtdM extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "TrgQtdM", "TrgQtdM", "TrgQtdM", 4, "#.##z", "", "", EH_TOTALIZADO, 0, false );
	}

}

//======================================================
//	Campo TrgQtdMEnt
//======================================================

class campo_arqConsulta_TrgQtdMEnt extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "TrgQtdMEnt", "TrgQtdMEnt", "TrgQtdMEnt", 4, "#.##z", "", "", EH_TOTALIZADO, 0, false );
	}

}

//======================================================
//	Campo Saldo
//======================================================

class campo_arqConsulta_Saldo extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Saldo", "Saldo", "Saldo", 4, "#.##z", "(", "", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->TRGQTDM == 0 )
			return( "LaranjaDirBold" );
		if( $g_regAtual->TRGQTDM > 0 && $g_regAtual->TRGQTDM < $g_regAtual->TRGQTDMENT )
			return( "VermelhoFundoCentro" );
		if( $g_regAtual->TRGQTDM > 0 && $g_regAtual->TRGQTDM == $g_regAtual->TRGQTDMENT )
			return( "VerdeFundoDir" );
		if( $g_regAtual->TRGQTDM > 0 && $g_regAtual->TRGQTDM > $g_regAtual->TRGQTDMENT )
			return( "CinzaArdosiaDir" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Saldo<br>Medicamentos" );
	}

}

//======================================================
//	Campo QuemAgRet
//======================================================

class campo_arqConsulta_QuemAgRet extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "QuemAgRet", "QuemAgRet", "QuemAgRet", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo QuemAgRet_Usuario
//======================================================

class campo_arqConsulta_QuemAgRet_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "QuemAgRet_Usuario", "QuemAgRet_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "QuemAgRet", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Usuário" );
	}

}

//======================================================
//	Campo QdoAgRet
//======================================================

class campo_arqConsulta_QdoAgRet extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "QdoAgRet", "QdoAgRet", "QdoAgRet", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo DataRet
//======================================================

class campo_arqConsulta_DataRet extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataRet", "DataRet", "DataRet", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( !tem( $g_regAtual->DATARET ) || ( tem( $g_regAtual->DATARET ) && $g_regAtual->TSTAGRET == 3 ) )
			return( "" );
		if( formatarData( $g_regAtual->DATARET ) == HOJE )
			return( "DataHoje" );
		if( quantosDias( formatarData( $g_regAtual->DATARET ), HOJE ) > 0 )
			return( "DataFutura" );
		if( quantosDias( formatarData( $g_regAtual->DATARET ), HOJE ) < 0 && ( in_array( $g_regAtual->TSTAGRET, [1,2] ) || !tem( $g_regAtual->TSTAGRET ) ) )
			return( "DataAtrasada" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Agenda<br>Retirada" );
	}

}

//======================================================
//	Campo DiaRet
//======================================================

class campo_arqConsulta_DiaRet extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "DiaRet", "DiaRet", "DiaRet", 15, "xxxxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Dia Semana" );
	}

}

//======================================================
//	Campo HoraRet
//======================================================

class campo_arqConsulta_HoraRet extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "HoraRet", "HoraRet", "HoraRet", 4, "hh:mm", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Hora<br>Retirada" );
	}

}

//======================================================
//	Campo TStAgRet
//======================================================

class campo_arqConsulta_TStAgRet extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TStAgRet", "TStAgRet", "TStAgRet", 0, "tabTStAgRet", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->TSTAGRET == 1 )
			return( "StAgRetRecepcao" );
		if( $g_regAtual->TSTAGRET == 2 )
			return( "StAgRetProcesso" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Status<br>Retirada" );
	}

}

//======================================================
//	Campo AssesRet
//======================================================

class campo_arqConsulta_AssesRet extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "AssesRet", "AssesRet", "AssesRet", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Assessor<br>Retirada" );
	}

}

//======================================================
//	Campo AssesRet_Usuario
//======================================================

class campo_arqConsulta_AssesRet_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "AssesRet_Usuario", "AssesRet_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "AssesRet", false );
	}

}

//======================================================
//	Campo ObsRet
//======================================================

class campo_arqConsulta_ObsRet extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "ObsRet", "ObsRet", "ObsRet", 8,80, false, false );
	}

}

//======================================================
//	Arquivo arqConsulta
//======================================================
function listaCampos_arqConsulta( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqConsulta_Num(),
			new campo_arqConsulta_Clinica(),
			new campo_arqConsulta_Clinica_Clinica(),
			new campo_arqConsulta_TStCon(),
			new Lance_CampoCadeia( "TStCon_Chave", "TStCon_Chave", "Chave", 2, "xx", EH_CHAVE, TStCon ),
			new Lance_CampoCadeia( "TStCon_Descritor", "TStCon_Descritor", "Descritor", 18, "xxxxxxxxxxxxxxxxxx", EH_DESCRITOR, TStCon ),
			new campo_arqConsulta_TiAgenda(),
			new campo_arqConsulta_TiAgenda_TiAgenda(),
			new campo_arqConsulta_Data(),
			new campo_arqConsulta_Hora(),
			new campo_arqConsulta_HoraChega(),
			new campo_arqConsulta_Pessoa(),
			new campo_arqConsulta_Pessoa_Nome(),
			new campo_arqConsulta_Pessoa_NumCelular(),
			new campo_arqConsulta_Prontuario(),
			new campo_arqConsulta_Medico(),
			new campo_arqConsulta_Medico_Usuario(),
			new campo_arqConsulta_Assessor(),
			new campo_arqConsulta_Assessor_Usuario(),
			new campo_arqConsulta_CallCenter(),
			new campo_arqConsulta_CallCenter_Usuario(),
			new campo_arqConsulta_MedicaAtua(),
			new campo_arqConsulta_TMotivo(),
			new Lance_CampoCadeia( "TMotivo_Chave", "TMotivo_Chave", "Chave", 1, "x", EH_CHAVE, TMotivo ),
			new Lance_CampoCadeia( "TMotivo_Descritor", "TMotivo_Descritor", "Descritor", 32, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, TMotivo ),
			new campo_arqConsulta_FormaPg(),
			new campo_arqConsulta_FormaPg_FormaPg(),
			new campo_arqConsulta_Valor(),
			new campo_arqConsulta_PTrata(),
			new campo_arqConsulta_PTrata_PTrata(),
			new campo_arqConsulta_ValPTrata(),
			new campo_arqConsulta_EntraFPg(),
			new campo_arqConsulta_EntraFPg_FormaPg(),
			new campo_arqConsulta_EntraVal(),
			new campo_arqConsulta_EntraParc(),
			new campo_arqConsulta_EntraValP(),
			new campo_arqConsulta_EntraTotP(),
			new campo_arqConsulta_BoletoMin(),
			new campo_arqConsulta_EntraObs(),
			new campo_arqConsulta_SaldoParc(),
			new campo_arqConsulta_SaldoVal(),
			new campo_arqConsulta_SaldoTotP(),
			new campo_arqConsulta_SaldoFPg(),
			new campo_arqConsulta_SaldoFPg_FormaPg(),
			new campo_arqConsulta_SaldoObs(),
			new campo_arqConsulta_Conduta(),
			new campo_arqConsulta_Medicacao(),
			new campo_arqConsulta_Obs(),
			new campo_arqConsulta_ContaCons(),
			new campo_arqConsulta_ContaCons_Transacao(),
			new campo_arqConsulta_ContaPTra(),
			new campo_arqConsulta_ContaPTra_Transacao(),
			new campo_arqConsulta_TrgQtdM(),
			new campo_arqConsulta_TrgQtdMEnt(),
			new campo_arqConsulta_Saldo(),
			new campo_arqConsulta_QuemAgRet(),
			new campo_arqConsulta_QuemAgRet_Usuario(),
			new campo_arqConsulta_QdoAgRet(),
			new campo_arqConsulta_DataRet(),
			new campo_arqConsulta_DiaRet(),
			new campo_arqConsulta_HoraRet(),
			new campo_arqConsulta_TStAgRet(),
			new Lance_CampoCadeia( "TStAgRet_Chave", "TStAgRet_Chave", "Chave", 1, "x", EH_CHAVE, TStAgRet ),
			new Lance_CampoCadeia( "TStAgRet_Descritor", "TStAgRet_Descritor", "Descritor", 11, "xxxxxxxxxxx", EH_DESCRITOR, TStAgRet ),
			new campo_arqConsulta_AssesRet(),
			new campo_arqConsulta_AssesRet_Usuario(),
			new campo_arqConsulta_ObsRet() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqConsulta extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqConsulta",  // Nome Interno do arquivo
			"a_consul",  // Nome deste arquivo Php que contém o arquivo
			"Consulta",  // Nome do arquivo acentuado-se
			listaCampos_arqConsulta( "" ), 39
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Num) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Num ) );
			array_push( $vetAux, array( Clinica_Clinica ) );
			array_push( $vetAux, array( TStCon_Descritor ) );
			array_push( $vetAux, array( TiAgenda_TiAgenda ) );
			array_push( $vetAux, array( Data ) );
			array_push( $vetAux, array( Hora ) );
			array_push( $vetAux, array( HoraChega ) );
			array_push( $vetAux, array( Pessoa_Nome ) );
			array_push( $vetAux, array( Pessoa_NumCelular ) );
			array_push( $vetAux, array( Prontuario ) );
			array_push( $vetAux, array( Medico_Usuario ) );
			array_push( $vetAux, array( Assessor_Usuario ) );
			array_push( $vetAux, array( CallCenter_Usuario ) );
			array_push( $vetAux, array( TMotivo_Descritor ) );
			array_push( $vetAux, array( FormaPg_FormaPg ) );
			array_push( $vetAux, array( Valor ) );
			array_push( $vetAux, array( ValPTrata ) );
			array_push( $vetAux, array( Saldo ) );
			array_push( $vetAux, array( DataRet ) );
			array_push( $vetAux, array( DiaRet ) );
			array_push( $vetAux, array( HoraRet ) );
			array_push( $vetAux, array( TStAgRet_Descritor ) );
			array_push( $vetAux, array( AssesRet_Usuario ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( Clinica ), array( TStCon ), array( TStCon_Chave ), array( TStCon_Descritor ), array( TiAgenda ), array( Pessoa ), array( Medico ), array( Assessor ), array( CallCenter ), array( TMotivo ), array( TMotivo_Chave ), array( TMotivo_Descritor ), array( FormaPg ), array( BoletoMin ), array( ContaCons ), array( ContaPTra ), array( TrgQtdM ), array( TrgQtdMEnt ), array( TStAgRet ), array( TStAgRet_Chave ), array( TStAgRet_Descritor ), array( AssesRet ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Num ) );
			array_push( $vetAux, array( Clinica_Clinica ) );
			array_push( $vetAux, array( TStCon_Descritor ) );
			array_push( $vetAux, array( TiAgenda_TiAgenda ) );
			array_push( $vetAux, array( Data ) );
			array_push( $vetAux, array( Hora ) );
			array_push( $vetAux, array( HoraChega ) );
			array_push( $vetAux, array( Pessoa_Nome ) );
			array_push( $vetAux, array( Pessoa_NumCelular ) );
			array_push( $vetAux, array( Prontuario ) );
			array_push( $vetAux, array( Medico_Usuario ) );
			array_push( $vetAux, array( Assessor_Usuario ) );
			array_push( $vetAux, array( CallCenter_Usuario ) );
			array_push( $vetAux, array( MedicaAtua ) );
			array_push( $vetAux, array( TMotivo_Descritor ) );
			array_push( $vetAux, array( FormaPg_FormaPg ) );
			array_push( $vetAux, array( Valor ) );
			array_push( $vetAux, array( PTrata_PTrata ) );
			array_push( $vetAux, array( ValPTrata ) );
			array_push( $vetAux, array( EntraFPg_FormaPg ) );
			array_push( $vetAux, array( EntraVal ) );
			array_push( $vetAux, array( EntraParc ) );
			array_push( $vetAux, array( EntraValP ) );
			array_push( $vetAux, array( EntraTotP ) );
			array_push( $vetAux, array( BoletoMin ) );
			array_push( $vetAux, array( EntraObs ) );
			array_push( $vetAux, array( SaldoParc ) );
			array_push( $vetAux, array( SaldoVal ) );
			array_push( $vetAux, array( SaldoTotP ) );
			array_push( $vetAux, array( SaldoFPg_FormaPg ) );
			array_push( $vetAux, array( SaldoObs ) );
			array_push( $vetAux, array( Conduta ) );
			array_push( $vetAux, array( Medicacao ) );
			array_push( $vetAux, array( Obs ) );
			array_push( $vetAux, array( ContaCons_Transacao ) );
			array_push( $vetAux, array( ContaPTra_Transacao ) );
			array_push( $vetAux, array( TrgQtdM ) );
			array_push( $vetAux, array( TrgQtdMEnt ) );
			array_push( $vetAux, array( Saldo ) );
			array_push( $vetAux, array( QuemAgRet_Usuario ) );
			array_push( $vetAux, array( QdoAgRet ) );
			array_push( $vetAux, array( DataRet ) );
			array_push( $vetAux, array( DiaRet ) );
			array_push( $vetAux, array( HoraRet ) );
			array_push( $vetAux, array( TStAgRet_Descritor ) );
			array_push( $vetAux, array( AssesRet_Usuario ) );
			array_push( $vetAux, array( ObsRet ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Acionar
	//-------------------------------------------------------------
	function AcionarBotao( $p_tecla )
	{
		switch( $p_tecla )
		{
			case _INS: return( GrupoAtualEm() );
			case _SDEL: return( false );
		}
		return( parent::AcionarBotao( $p_tecla ) );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Consultas' );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: FilTodas  
	//-------------------------------------------------------------
	function FilTodas()
	{
	return( "" . ext_filtrarTodas() . "" );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: FilSel    
	//-------------------------------------------------------------
	function FilSel()
	{
	return( "" . ext_filtrarSelecao() . "" );
	}

}
?>
