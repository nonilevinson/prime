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
		if( false /*TStAgRet != 3 && ($g_regAtual->TRGQTDM > 0 && $g_regAtual->TRGQTDM == $g_regAtual->TRGQTDMENT)*/ )
			return( "VerdeFundoDir" );
		if( tem( DataRet ) && !tem( TStAgRet ) )
			return( "StAgendado" );
		if( tem( DataRet ) && TStAgRet == 1 )
			return( "StRecepcao" );
		if( tem( DataRet ) && TStAgRet == 2 )
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
//	Campo TiConsulta
//======================================================

class campo_arqConsulta_TiConsulta extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TiConsulta", "TiConsulta", "TiConsulta", 0, "arqTiConsulta", "arqTiConsulta.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->TICONSULTA == 1 )
			return( "Tratamento" );
		if( $g_regAtual->TICONSULTA == 2 )
			return( "Nutricionista" );
		if( $g_regAtual->TICONSULTA == 3 )
			return( "Psicologo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "TiConsulta [0]" );
	}

}

//======================================================
//	Campo TiConsulta_TiConsulta
//======================================================

class campo_arqConsulta_TiConsulta_TiConsulta extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "TiConsulta_TiConsulta", "TiConsulta_TiConsulta", "TiConsulta", 15, "xxxxxxxxxxxxxxx", EH_CHAVE, "TiConsulta", false );
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
		parent::__construct( "TStCon", "TStCon", "TStCon", 0, "arqTStCon", "Ordem ASC ", LANCE_LIG_SELECAO, 1, 0, false );
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
		if( $g_regAtual->TSTCON == 12 )
			return( "StFaltou" );
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
//	Campo TStCon_Status
//======================================================

class campo_arqConsulta_TStCon_Status extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "TStCon_Status", "TStCon_Status", "Status", 20, "xxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "TStCon", false );
	}

}

//======================================================
//	Campo TiAgenda
//======================================================

class campo_arqConsulta_TiAgenda extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TiAgenda", "TiAgenda", "TiAgenda", 0, "arqTiAgenda", "arqTiAgenda.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function FiltroPai()
	{
		global $g_regAtual;
		if( $g_regAtual->TICONSULTA == 1 )
			return( "A.Ativo = 1" );
		if( $g_regAtual->TICONSULTA > 1 )
			return( "A.Complemen = 1" );
		return( "" );
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
//	Campo Cortesia
//======================================================

class campo_arqConsulta_Cortesia extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Cortesia", "Cortesia", "Cortesia", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->CORTESIA == 1 )
			return( "CorAtivo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Cortesia?" );
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
			return( "Forma Pagto<br>Consulta" );
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
//	Campo Valor2
//======================================================

class campo_arqConsulta_Valor2 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor2", "Valor2", "Valor2", 8, "###.##z,zz", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "2° Valor<br>Consulta" );
	}

}

//======================================================
//	Campo FormaPg2
//======================================================

class campo_arqConsulta_FormaPg2 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "FormaPg2", "FormaPg2", "FormaPg2", 0, "arqFormaPg", "arqFormaPg.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "2ª Forma Pagto<br>Consulta" );
	}

}

//======================================================
//	Campo FormaPg2_FormaPg
//======================================================

class campo_arqConsulta_FormaPg2_FormaPg extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "FormaPg2_FormaPg", "FormaPg2_FormaPg", "FormaPg", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "FormaPg2", false );
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
		$vetPai = [];
			$vetPai[]=
				[ "Valor, MrgDesc", 
					"A.PTrata, arqPTrata",
					"0,0" ];
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
		$vetPai = [];
			$vetPai[]=
				[ "Cartao", 
					"A.EntraFPg, arqFormaPg",
					"0" ];
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
//	Campo EntraParcE
//======================================================

class campo_arqConsulta_EntraParcE extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "EntraParcE", "EntraParcE", "EntraParcE", 2, "#z", "", "", 0, 0, false );
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
//	Campo SdEntrFPg
//======================================================

class campo_arqConsulta_SdEntrFPg extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SdEntrFPg", "SdEntrFPg", "SdEntrFPg", 0, "arqFormaPg", "arqFormaPg.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function PegaPai()
	{
		global $g_regAtual;
		$vetPai = [];
			$vetPai[]=
				[ "Cartao", 
					"A.SdEntrFPg, arqFormaPg",
					"0" ];
		return( $vetPai );
	}

}

//======================================================
//	Campo SdEntrFPg_FormaPg
//======================================================

class campo_arqConsulta_SdEntrFPg_FormaPg extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SdEntrFPg_FormaPg", "SdEntrFPg_FormaPg", "FormaPg", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "SdEntrFPg", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Forma" );
	}

}

//======================================================
//	Campo SdVenc1Par
//======================================================

class campo_arqConsulta_SdVenc1Par extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "SdVenc1Par", "SdVenc1Par", "SdVenc1Par", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo SdCond
//======================================================

class campo_arqConsulta_SdCond extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "SdCond", "SdCond", "SdCond", 2, "#z", "", "", 0, 0, false );
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
//	Campo EntraTotal
//======================================================

class campo_arqConsulta_EntraTotal extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "EntraTotal", "EntraTotal", "EntraTotal", 8, "###.##z,zz", "", "", EH_CALCULADO, 0, false );
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
//	Campo SaldoFPg
//======================================================

class campo_arqConsulta_SaldoFPg extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SaldoFPg", "SaldoFPg", "SaldoFPg", 0, "arqFormaPg", "arqFormaPg.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function PegaPai()
	{
		global $g_regAtual;
		$vetPai = [];
			$vetPai[]=
				[ "Cartao", 
					"A.SaldoFPg, arqFormaPg",
					"0" ];
		return( $vetPai );
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
//	Campo SaldoCond
//======================================================

class campo_arqConsulta_SaldoCond extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "SaldoCond", "SaldoCond", "SaldoCond", 2, "#z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo SaldoVal
//======================================================

class campo_arqConsulta_SaldoVal extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "SaldoVal", "SaldoVal", "SaldoVal", 8, "###.##z,zz", "", "", EH_CALCULADO, 0, false );
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
//	Arquivo arqConsulta
//======================================================
function listaCampos_arqConsulta( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqConsulta_Num(),
			new campo_arqConsulta_TiConsulta(),
			new campo_arqConsulta_TiConsulta_TiConsulta(),
			new campo_arqConsulta_Clinica(),
			new campo_arqConsulta_Clinica_Clinica(),
			new campo_arqConsulta_TStCon(),
			new campo_arqConsulta_TStCon_Status(),
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
			new campo_arqConsulta_Cortesia(),
			new campo_arqConsulta_Valor(),
			new campo_arqConsulta_FormaPg(),
			new campo_arqConsulta_FormaPg_FormaPg(),
			new campo_arqConsulta_Valor2(),
			new campo_arqConsulta_FormaPg2(),
			new campo_arqConsulta_FormaPg2_FormaPg(),
			new campo_arqConsulta_PTrata(),
			new campo_arqConsulta_PTrata_PTrata(),
			new campo_arqConsulta_ValPTrata(),
			new campo_arqConsulta_EntraFPg(),
			new campo_arqConsulta_EntraFPg_FormaPg(),
			new campo_arqConsulta_EntraVal(),
			new campo_arqConsulta_EntraParcE(),
			new campo_arqConsulta_EntraParc(),
			new campo_arqConsulta_SdEntrFPg(),
			new campo_arqConsulta_SdEntrFPg_FormaPg(),
			new campo_arqConsulta_SdVenc1Par(),
			new campo_arqConsulta_SdCond(),
			new campo_arqConsulta_EntraValP(),
			new campo_arqConsulta_EntraTotP(),
			new campo_arqConsulta_EntraTotal(),
			new campo_arqConsulta_BoletoMin(),
			new campo_arqConsulta_EntraObs(),
			new campo_arqConsulta_SaldoFPg(),
			new campo_arqConsulta_SaldoFPg_FormaPg(),
			new campo_arqConsulta_SaldoParc(),
			new campo_arqConsulta_SaldoCond(),
			new campo_arqConsulta_SaldoVal(),
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
			new campo_arqConsulta_Saldo() ]
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
		return( [ Num ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Num ];
		if( GrupoAtualEm() )
 {
			$vetAux[] = [ TiConsulta_TiConsulta ];
 }
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ TStCon_Status ];
		if( ultimaLigOpcaoEm( 109,110 ) )
 {
			$vetAux[] = [ TiAgenda_TiAgenda ];
 }
			$vetAux[] = [ Data ];
			$vetAux[] = [ Hora ];
			$vetAux[] = [ HoraChega ];
			$vetAux[] = [ Pessoa_Nome ];
			$vetAux[] = [ Pessoa_NumCelular ];
			$vetAux[] = [ Prontuario ];
			$vetAux[] = [ Medico_Usuario ];
			$vetAux[] = [ Assessor_Usuario ];
			$vetAux[] = [ CallCenter_Usuario ];
		if( ultimaLigOpcaoEm( 109,110 ) )
 {
			$vetAux[] = [ TMotivo_Descritor ];
 }
		if( ultimaLigOpcaoEm( 109,110 ) )
 {
			$vetAux[] = [ Cortesia ];
 }
		if( ultimaLigOpcaoEm( 109,110 ) )
 {
			$vetAux[] = [ Valor2 ];
 }
		if( ultimaLigOpcaoEm( 109,110 ) )
 {
			$vetAux[] = [ FormaPg2_FormaPg ];
 }
		if( ultimaLigOpcaoEm( 109,110 ) )
 {
			$vetAux[] = [ ValPTrata ];
 }
		if( ultimaLigOpcaoEm( 109,110 ) )
 {
			$vetAux[] = [ Saldo ];
 }
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ TiConsulta ], [ Clinica ], [ TStCon ], [ TiAgenda ], [ Pessoa ], [ Medico ], [ Assessor ], [ CallCenter ], [ PTrata ], [ BoletoMin ], [ ContaCons ], [ ContaPTra ], [ TrgQtdM ], [ TrgQtdMEnt ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Num ];
			$vetAux[] = [ TiConsulta_TiConsulta ];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ TStCon_Status ];
			$vetAux[] = [ TiAgenda_TiAgenda ];
			$vetAux[] = [ Data ];
			$vetAux[] = [ Hora ];
			$vetAux[] = [ HoraChega ];
			$vetAux[] = [ Pessoa_Nome ];
			$vetAux[] = [ Pessoa_NumCelular ];
			$vetAux[] = [ Prontuario ];
			$vetAux[] = [ Medico_Usuario ];
			$vetAux[] = [ Assessor_Usuario ];
			$vetAux[] = [ CallCenter_Usuario ];
			$vetAux[] = [ MedicaAtua ];
			$vetAux[] = [ TMotivo_Descritor ];
			$vetAux[] = [ Cortesia ];
			$vetAux[] = [ Valor ];
			$vetAux[] = [ FormaPg_FormaPg ];
			$vetAux[] = [ Valor2 ];
			$vetAux[] = [ FormaPg2_FormaPg ];
			$vetAux[] = [ PTrata_PTrata ];
			$vetAux[] = [ ValPTrata ];
			$vetAux[] = [ EntraFPg_FormaPg ];
			$vetAux[] = [ EntraVal ];
			$vetAux[] = [ EntraParcE ];
			$vetAux[] = [ EntraParc ];
			$vetAux[] = [ SdEntrFPg_FormaPg ];
			$vetAux[] = [ SdVenc1Par ];
			$vetAux[] = [ SdCond ];
			$vetAux[] = [ EntraValP ];
			$vetAux[] = [ EntraTotP ];
			$vetAux[] = [ EntraTotal ];
			$vetAux[] = [ BoletoMin ];
			$vetAux[] = [ EntraObs ];
			$vetAux[] = [ SaldoFPg_FormaPg ];
			$vetAux[] = [ SaldoParc ];
			$vetAux[] = [ SaldoCond ];
			$vetAux[] = [ SaldoVal ];
			$vetAux[] = [ SaldoObs ];
			$vetAux[] = [ Conduta ];
			$vetAux[] = [ Medicacao ];
			$vetAux[] = [ Obs ];
			$vetAux[] = [ ContaCons_Transacao ];
			$vetAux[] = [ ContaPTra_Transacao ];
			$vetAux[] = [ TrgQtdM ];
			$vetAux[] = [ TrgQtdMEnt ];
			$vetAux[] = [ Saldo ];
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
		if( ultimaLigOpcaoEm( 109,110 ) )
		return( 'Consultas de Tratamento' );
		if( ultimaLigOpcaoEm( 265,266 ) )
		return( 'Consultas de Nutricionista' );
		if( ultimaLigOpcaoEm( 267,268 ) )
		return( 'Consultas de Psicólogo' );
		return( parent::NomeCompleto() );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: FilTodas  
	//-------------------------------------------------------------
	function FilTodas()
	{
	return( "" . filtrarTodas() . "" );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: FilSel    
	//-------------------------------------------------------------
	function FilSel()
	{
	return( "" . filtrarSelecao() . "" );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: EhTrata   
	//-------------------------------------------------------------
	function EhTrata()
	{
	return( "A.TiConsulta = 1" );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: EhNutri   
	//-------------------------------------------------------------
	function EhNutri()
	{
	return( "A.TiConsulta = 2" );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: EhPsicolo 
	//-------------------------------------------------------------
	function EhPsicolo()
	{
	return( "A.TiConsulta = 3" );
	}

}
