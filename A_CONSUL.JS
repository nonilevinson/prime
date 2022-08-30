/*=========================================================================
  a_consul - Consulta
=========================================================================*/

//------------------------------------------------------------
Campo_arqConsulta_Num.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_Num()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Num", "Num", "Num", 6, "###.##z", true,"", "");
}

var Num = new Campo_arqConsulta_Num;

//------------------------------------------------------------
Campo_arqConsulta_TiConsulta.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_TiConsulta()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "TiConsulta", "TiConsulta", "TiConsulta", "arqTiConsulta", "a_ticons", null, "",60);
}

var TiConsulta = new Campo_arqConsulta_TiConsulta;

//------------------------------------------------------------
Campo_arqConsulta_TiConsulta_TiConsulta.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_TiConsulta_TiConsulta()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TiConsulta_TiConsulta", "TiConsulta_TiConsulta", "TiConsulta", TiConsulta, 15, "uxxxxxxxxxxxxxx", false);
}

var TiConsulta_TiConsulta = new Campo_arqConsulta_TiConsulta_TiConsulta;

//------------------------------------------------------------
Campo_arqConsulta_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqConsulta_Clinica;

//------------------------------------------------------------
Campo_arqConsulta_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Clinica_Clinica = new Campo_arqConsulta_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqConsulta_TStCon.prototype = new Lance_CampoLigado;

function Campo_arqConsulta_TStCon()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TStCon", "TStCon", "TStCon", "arqTStCon", "a_tstcon", null, "Ordem ASC ",61);
}

var TStCon = new Campo_arqConsulta_TStCon;

//------------------------------------------------------------
Campo_arqConsulta_TStCon_Status.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_TStCon_Status()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TStCon_Status", "TStCon_Status", "Status", TStCon, 20, "uuuuuuuuuuuuuuuuuuuu", false);
}

var TStCon_Status = new Campo_arqConsulta_TStCon_Status;

//------------------------------------------------------------
Campo_arqConsulta_TiAgenda.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_TiAgenda()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "TiAgenda", "TiAgenda", "TiAgenda", "arqTiAgenda", "a_tiagen", null, "",43);
}

var TiAgenda = new Campo_arqConsulta_TiAgenda;

//------------------------------------------------------------
Campo_arqConsulta_TiAgenda_TiAgenda.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_TiAgenda_TiAgenda()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TiAgenda_TiAgenda", "TiAgenda_TiAgenda", "TiAgenda", TiAgenda, 20, "uuuuuuuuuuuuuuuuuuuu", false);
}

var TiAgenda_TiAgenda = new Campo_arqConsulta_TiAgenda_TiAgenda;

//------------------------------------------------------------
Campo_arqConsulta_Data.prototype = new Lance_CampoData;

function Campo_arqConsulta_Data()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Data", "Data", "Data", 8, "dd/mm/aaaa", true);
}

var Data = new Campo_arqConsulta_Data;

//------------------------------------------------------------
Campo_arqConsulta_Hora.prototype = new Lance_CampoHora;

function Campo_arqConsulta_Hora()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "Hora", "Hora", "Hora", 4, "hh:mm", true);
}

var Hora = new Campo_arqConsulta_Hora;

//------------------------------------------------------------
Campo_arqConsulta_HoraChega.prototype = new Lance_CampoHora;

function Campo_arqConsulta_HoraChega()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "HoraChega", "HoraChega", "HoraChega", 4, "hh:mm", true);
}

var HoraChega = new Campo_arqConsulta_HoraChega;

//------------------------------------------------------------
Campo_arqConsulta_Pessoa.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_Pessoa()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Pessoa", "Pessoa", "Pessoa", "arqPessoa", "a_pessoa", null, "",7);
}

var Pessoa = new Campo_arqConsulta_Pessoa;

//------------------------------------------------------------
Campo_arqConsulta_Pessoa_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_Pessoa_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_Nome", "Pessoa_Nome", "Nome", Pessoa, 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Pessoa_Nome = new Campo_arqConsulta_Pessoa_Nome;

//------------------------------------------------------------
Campo_arqConsulta_Pessoa_NumCelular.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_Pessoa_NumCelular()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_NumCelular", "Pessoa_NumCelular", "NumCelular", Pessoa, 11, "(##) #.####.####", true);
}

var Pessoa_NumCelular = new Campo_arqConsulta_Pessoa_NumCelular;

//------------------------------------------------------------
Campo_arqConsulta_Prontuario.prototype = new Lance_CampoCadeia;

function Campo_arqConsulta_Prontuario()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Prontuario", "Prontuario", "Prontuario", 9, "uuuuuuuuu", false);
}

var Prontuario = new Campo_arqConsulta_Prontuario;

//------------------------------------------------------------
Campo_arqConsulta_Medico.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_Medico()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Medico", "Medico", "Medico", "arqUsuario", "a_usuari", null, "",5);
}

var Medico = new Campo_arqConsulta_Medico;

//------------------------------------------------------------
Campo_arqConsulta_Medico_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_Medico_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Medico_Usuario", "Medico_Usuario", "Usuario", Medico, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Medico_Usuario = new Campo_arqConsulta_Medico_Usuario;

//------------------------------------------------------------
Campo_arqConsulta_Assessor.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_Assessor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Assessor", "Assessor", "Assessor", "arqUsuario", "a_usuari", null, "",5);
}

var Assessor = new Campo_arqConsulta_Assessor;

//------------------------------------------------------------
Campo_arqConsulta_Assessor_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_Assessor_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Assessor_Usuario", "Assessor_Usuario", "Usuario", Assessor, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Assessor_Usuario = new Campo_arqConsulta_Assessor_Usuario;

//------------------------------------------------------------
Campo_arqConsulta_CallCenter.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_CallCenter()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "CallCenter", "CallCenter", "CallCenter", "arqUsuario", "a_usuari", null, "",5);
}

var CallCenter = new Campo_arqConsulta_CallCenter;

//------------------------------------------------------------
Campo_arqConsulta_CallCenter_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_CallCenter_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "CallCenter_Usuario", "CallCenter_Usuario", "Usuario", CallCenter, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var CallCenter_Usuario = new Campo_arqConsulta_CallCenter_Usuario;

//------------------------------------------------------------
Campo_arqConsulta_MedicaAtua.prototype = new Lance_CampoTexto;

function Campo_arqConsulta_MedicaAtua()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "MedicaAtua", "MedicaAtua", "MedicaAtua", false);
}

var MedicaAtua = new Campo_arqConsulta_MedicaAtua;

//------------------------------------------------------------
Campo_arqConsulta_TMotivo.prototype = new Lance_CampoLigado;

function Campo_arqConsulta_TMotivo()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TMotivo", "TMotivo", "TMotivo", "tabTMotivo", "t_tmotiv", null, "",0);
}

var TMotivo = new Campo_arqConsulta_TMotivo;

//------------------------------------------------------------
Campo_arqConsulta_TMotivo_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_TMotivo_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TMotivo_Chave", "TMotivo_Chave", "TMotivo", TMotivo, 1, "u", false);
}

var TMotivo_Chave = new Campo_arqConsulta_TMotivo_Chave;

//------------------------------------------------------------
Campo_arqConsulta_TMotivo_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_TMotivo_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TMotivo_Descritor", "TMotivo_Descritor", "TMotivo", TMotivo, 32, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var TMotivo_Descritor = new Campo_arqConsulta_TMotivo_Descritor;

//------------------------------------------------------------
Campo_arqConsulta_Cortesia.prototype = new Lance_CampoLogico;

function Campo_arqConsulta_Cortesia()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Cortesia", "Cortesia", "Cortesia");
}

var Cortesia = new Campo_arqConsulta_Cortesia;

//------------------------------------------------------------
Campo_arqConsulta_Valor.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_Valor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor", "Valor", "Valor", 8, "###.##z,zz", true,"", "");
}

var Valor = new Campo_arqConsulta_Valor;

//------------------------------------------------------------
Campo_arqConsulta_FormaPg.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_FormaPg()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "FormaPg", "FormaPg", "FormaPg", "arqFormaPg", "a_formap", null, "",44);
}

var FormaPg = new Campo_arqConsulta_FormaPg;

//------------------------------------------------------------
Campo_arqConsulta_FormaPg_FormaPg.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_FormaPg_FormaPg()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "FormaPg_FormaPg", "FormaPg_FormaPg", "FormaPg", FormaPg, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var FormaPg_FormaPg = new Campo_arqConsulta_FormaPg_FormaPg;

//------------------------------------------------------------
Campo_arqConsulta_Valor2.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_Valor2()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor2", "Valor2", "Valor2", 8, "###.##z,zz", true,"", "");
}

var Valor2 = new Campo_arqConsulta_Valor2;

//------------------------------------------------------------
Campo_arqConsulta_FormaPg2.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_FormaPg2()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "FormaPg2", "FormaPg2", "FormaPg2", "arqFormaPg", "a_formap", null, "",44);
}

var FormaPg2 = new Campo_arqConsulta_FormaPg2;

//------------------------------------------------------------
Campo_arqConsulta_FormaPg2_FormaPg.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_FormaPg2_FormaPg()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "FormaPg2_FormaPg", "FormaPg2_FormaPg", "FormaPg", FormaPg2, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var FormaPg2_FormaPg = new Campo_arqConsulta_FormaPg2_FormaPg;

//------------------------------------------------------------
Campo_arqConsulta_PTrata.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_PTrata()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "PTrata", "PTrata", "PTrata", "arqPTrata", "a_ptrata", null, "",32);
}

var PTrata = new Campo_arqConsulta_PTrata;

//------------------------------------------------------------
Campo_arqConsulta_PTrata_PTrata.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_PTrata_PTrata()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "PTrata_PTrata", "PTrata_PTrata", "PTrata", PTrata, 80, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var PTrata_PTrata = new Campo_arqConsulta_PTrata_PTrata;

//------------------------------------------------------------
Campo_arqConsulta_ValPTrata.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_ValPTrata()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "ValPTrata", "ValPTrata", "ValPTrata", 8, "###.##z,zz", true,"", "");
}

var ValPTrata = new Campo_arqConsulta_ValPTrata;

//------------------------------------------------------------
Campo_arqConsulta_EntraFPg.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_EntraFPg()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "EntraFPg", "EntraFPg", "EntraFPg", "arqFormaPg", "a_formap", null, "",44);
}

var EntraFPg = new Campo_arqConsulta_EntraFPg;

//------------------------------------------------------------
Campo_arqConsulta_EntraFPg_FormaPg.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_EntraFPg_FormaPg()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "EntraFPg_FormaPg", "EntraFPg_FormaPg", "FormaPg", EntraFPg, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var EntraFPg_FormaPg = new Campo_arqConsulta_EntraFPg_FormaPg;

//------------------------------------------------------------
Campo_arqConsulta_EntraVal.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_EntraVal()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "EntraVal", "EntraVal", "EntraVal", 8, "###.##z,zz", true,"", "");
}

var EntraVal = new Campo_arqConsulta_EntraVal;

//------------------------------------------------------------
Campo_arqConsulta_EntraParcE.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_EntraParcE()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "EntraParcE", "EntraParcE", "EntraParcE", 2, "#z", false,"", "");
}

var EntraParcE = new Campo_arqConsulta_EntraParcE;

//------------------------------------------------------------
Campo_arqConsulta_EntraTotP.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_EntraTotP()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "EntraTotP", "EntraTotP", "EntraTotP", 8, "###.##z,zz", true,"", "");
}

var EntraTotP = new Campo_arqConsulta_EntraTotP;

//------------------------------------------------------------
Campo_arqConsulta_SdEntrFPg.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_SdEntrFPg()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SdEntrFPg", "SdEntrFPg", "SdEntrFPg", "arqFormaPg", "a_formap", null, "",44);
}

var SdEntrFPg = new Campo_arqConsulta_SdEntrFPg;

//------------------------------------------------------------
Campo_arqConsulta_SdEntrFPg_FormaPg.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_SdEntrFPg_FormaPg()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "SdEntrFPg_FormaPg", "SdEntrFPg_FormaPg", "FormaPg", SdEntrFPg, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SdEntrFPg_FormaPg = new Campo_arqConsulta_SdEntrFPg_FormaPg;

//------------------------------------------------------------
Campo_arqConsulta_EntraParc.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_EntraParc()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "EntraParc", "EntraParc", "EntraParc", 2, "#z", false,"", "");
}

var EntraParc = new Campo_arqConsulta_EntraParc;

//------------------------------------------------------------
Campo_arqConsulta_EntraTotal.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_EntraTotal()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "EntraTotal", "EntraTotal", "EntraTotal", 8, "###.##z,zz", true,"", "");
}

var EntraTotal = new Campo_arqConsulta_EntraTotal;

//------------------------------------------------------------
Campo_arqConsulta_BoletoMin.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_BoletoMin()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "BoletoMin", "BoletoMin", "BoletoMin", 8, "###.##z,zz", true,"", "");
}

var BoletoMin = new Campo_arqConsulta_BoletoMin;

//------------------------------------------------------------
Campo_arqConsulta_EntraObs.prototype = new Lance_CampoCadeia;

function Campo_arqConsulta_EntraObs()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "EntraObs", "EntraObs", "EntraObs", 100, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var EntraObs = new Campo_arqConsulta_EntraObs;

//------------------------------------------------------------
Campo_arqConsulta_I1Valor.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_I1Valor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "I1Valor", "I1Valor", "I1Valor", 8, "###.##z,zz", true,"", "");
}

var I1Valor = new Campo_arqConsulta_I1Valor;

//------------------------------------------------------------
Campo_arqConsulta_I1FPg.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_I1FPg()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "I1FPg", "I1FPg", "I1FPg", "arqFormaPg", "a_formap", null, "",44);
}

var I1FPg = new Campo_arqConsulta_I1FPg;

//------------------------------------------------------------
Campo_arqConsulta_I1FPg_FormaPg.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_I1FPg_FormaPg()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "I1FPg_FormaPg", "I1FPg_FormaPg", "FormaPg", I1FPg, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var I1FPg_FormaPg = new Campo_arqConsulta_I1FPg_FormaPg;

//------------------------------------------------------------
Campo_arqConsulta_I1Parc.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_I1Parc()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "I1Parc", "I1Parc", "I1Parc", 2, "#z", false,"", "");
}

var I1Parc = new Campo_arqConsulta_I1Parc;

//------------------------------------------------------------
Campo_arqConsulta_I2Valor.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_I2Valor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "I2Valor", "I2Valor", "I2Valor", 8, "###.##z,zz", true,"", "");
}

var I2Valor = new Campo_arqConsulta_I2Valor;

//------------------------------------------------------------
Campo_arqConsulta_I2FPg.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_I2FPg()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "I2FPg", "I2FPg", "I2FPg", "arqFormaPg", "a_formap", null, "",44);
}

var I2FPg = new Campo_arqConsulta_I2FPg;

//------------------------------------------------------------
Campo_arqConsulta_I2FPg_FormaPg.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_I2FPg_FormaPg()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "I2FPg_FormaPg", "I2FPg_FormaPg", "FormaPg", I2FPg, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var I2FPg_FormaPg = new Campo_arqConsulta_I2FPg_FormaPg;

//------------------------------------------------------------
Campo_arqConsulta_I2Parc.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_I2Parc()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "I2Parc", "I2Parc", "I2Parc", 2, "#z", false,"", "");
}

var I2Parc = new Campo_arqConsulta_I2Parc;

//------------------------------------------------------------
Campo_arqConsulta_SubTotal.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_SubTotal()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "SubTotal", "SubTotal", "SubTotal", 8, "###.##z,zz", true,"", "");
}

var SubTotal = new Campo_arqConsulta_SubTotal;

//------------------------------------------------------------
Campo_arqConsulta_SubSaldo.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_SubSaldo()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "SubSaldo", "SubSaldo", "SubSaldo", 8, "###.##z,zz", true,"", "");
}

var SubSaldo = new Campo_arqConsulta_SubSaldo;

//------------------------------------------------------------
Campo_arqConsulta_SaldoValor.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_SaldoValor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "SaldoValor", "SaldoValor", "SaldoValor", 8, "###.##z,zz", true,"", "");
}

var SaldoValor = new Campo_arqConsulta_SaldoValor;

//------------------------------------------------------------
Campo_arqConsulta_SaldoFPg.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_SaldoFPg()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SaldoFPg", "SaldoFPg", "SaldoFPg", "arqFormaPg", "a_formap", null, "",44);
}

var SaldoFPg = new Campo_arqConsulta_SaldoFPg;

//------------------------------------------------------------
Campo_arqConsulta_SaldoFPg_FormaPg.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_SaldoFPg_FormaPg()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "SaldoFPg_FormaPg", "SaldoFPg_FormaPg", "FormaPg", SaldoFPg, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SaldoFPg_FormaPg = new Campo_arqConsulta_SaldoFPg_FormaPg;

//------------------------------------------------------------
Campo_arqConsulta_SaldoParc.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_SaldoParc()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "SaldoParc", "SaldoParc", "SaldoParc", 2, "#z", false,"", "");
}

var SaldoParc = new Campo_arqConsulta_SaldoParc;

//------------------------------------------------------------
Campo_arqConsulta_SaldoObs.prototype = new Lance_CampoCadeia;

function Campo_arqConsulta_SaldoObs()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SaldoObs", "SaldoObs", "SaldoObs", 100, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SaldoObs = new Campo_arqConsulta_SaldoObs;

//------------------------------------------------------------
Campo_arqConsulta_Conduta.prototype = new Lance_CampoTexto;

function Campo_arqConsulta_Conduta()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Conduta", "Conduta", "Conduta", false);
}

var Conduta = new Campo_arqConsulta_Conduta;

//------------------------------------------------------------
Campo_arqConsulta_Medicacao.prototype = new Lance_CampoTexto;

function Campo_arqConsulta_Medicacao()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Medicacao", "Medicacao", "Medicacao", false);
}

var Medicacao = new Campo_arqConsulta_Medicacao;

//------------------------------------------------------------
Campo_arqConsulta_Obs.prototype = new Lance_CampoTexto;

function Campo_arqConsulta_Obs()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Obs", "Obs", "Obs", false);
}

var Obs = new Campo_arqConsulta_Obs;

//------------------------------------------------------------
Campo_arqConsulta_ContaCons.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_ContaCons()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "ContaCons", "ContaCons", "ContaCons", "arqConta", "a_conta", null, "",33);
}

var ContaCons = new Campo_arqConsulta_ContaCons;

//------------------------------------------------------------
Campo_arqConsulta_ContaCons_Transacao.prototype = new Lance_CampoNumericoLigado;

function Campo_arqConsulta_ContaCons_Transacao()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "ContaCons_Transacao", "ContaCons_Transacao", "Transacao", ContaCons, 6, "###.##z", true,"", "");
}

var ContaCons_Transacao = new Campo_arqConsulta_ContaCons_Transacao;

//------------------------------------------------------------
Campo_arqConsulta_ContaPTra.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_ContaPTra()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "ContaPTra", "ContaPTra", "ContaPTra", "arqConta", "a_conta", null, "",33);
}

var ContaPTra = new Campo_arqConsulta_ContaPTra;

//------------------------------------------------------------
Campo_arqConsulta_ContaPTra_Transacao.prototype = new Lance_CampoNumericoLigado;

function Campo_arqConsulta_ContaPTra_Transacao()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "ContaPTra_Transacao", "ContaPTra_Transacao", "Transacao", ContaPTra, 6, "###.##z", true,"", "");
}

var ContaPTra_Transacao = new Campo_arqConsulta_ContaPTra_Transacao;

//------------------------------------------------------------
Campo_arqConsulta_TrgQtdM.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_TrgQtdM()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "TrgQtdM", "TrgQtdM", "TrgQtdM", 4, "#.##z", true,"", "");
}

var TrgQtdM = new Campo_arqConsulta_TrgQtdM;

//------------------------------------------------------------
Campo_arqConsulta_TrgQtdMEnt.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_TrgQtdMEnt()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "TrgQtdMEnt", "TrgQtdMEnt", "TrgQtdMEnt", 4, "#.##z", true,"", "");
}

var TrgQtdMEnt = new Campo_arqConsulta_TrgQtdMEnt;

//------------------------------------------------------------
Campo_arqConsulta_Saldo.prototype = new Lance_CampoNumerico;

function Campo_arqConsulta_Saldo()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Saldo", "Saldo", "Saldo", 4, "#.##z", true,"(", "");
}

var Saldo = new Campo_arqConsulta_Saldo;

//------------------------------------------------------------
Campo_arqConsulta_BkpData.prototype = new Lance_CampoData;

function Campo_arqConsulta_BkpData()
{
	this.superClass = Lance_CampoData;
	this.superClass( "BkpData", "BkpData", "BkpData", 8, "dd/mm/aaaa", true);
}

var BkpData = new Campo_arqConsulta_BkpData;

//------------------------------------------------------------
Campo_arqConsulta_BkpAssess.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_BkpAssess()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "BkpAssess", "BkpAssess", "BkpAssess", "arqUsuario", "a_usuari", null, "",5);
}

var BkpAssess = new Campo_arqConsulta_BkpAssess;

//------------------------------------------------------------
Campo_arqConsulta_BkpAssess_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_BkpAssess_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "BkpAssess_Usuario", "BkpAssess_Usuario", "Usuario", BkpAssess, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var BkpAssess_Usuario = new Campo_arqConsulta_BkpAssess_Usuario;

//------------------------------------------------------------
Campo_arqConsulta_BkpMotivo.prototype = new Lance_CampoHidden;

function Campo_arqConsulta_BkpMotivo()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "BkpMotivo", "BkpMotivo", "BkpMotivo", "arqBkpMotivo", "a_bkpmot", null, "",62);
}

var BkpMotivo = new Campo_arqConsulta_BkpMotivo;

//------------------------------------------------------------
Campo_arqConsulta_BkpMotivo_BkpMotivo.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConsulta_BkpMotivo_BkpMotivo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "BkpMotivo_BkpMotivo", "BkpMotivo_BkpMotivo", "BkpMotivo", BkpMotivo, 50, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var BkpMotivo_BkpMotivo = new Campo_arqConsulta_BkpMotivo_BkpMotivo;

//------------------------------------------------------------
Campo_arqConsulta_BkpObs.prototype = new Lance_CampoCadeia;

function Campo_arqConsulta_BkpObs()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "BkpObs", "BkpObs", "BkpObs", 80, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var BkpObs = new Campo_arqConsulta_BkpObs;

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqConsulta_Num.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Num.prototype.Cabecalho = function()
{
		return( "N°" );
}

Num.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqConsulta_TiConsulta.prototype.Sugeriu = function()
{
{
		if( ultimaLigOpcaoEm( 109,110 ) )
	return( this.AtribuiuSemCritica( 1 ) );
}
{
		if( ultimaLigOpcaoEm( 265,266 ) )
	return( this.AtribuiuSemCritica( 2 ) );
}
{
		if( ultimaLigOpcaoEm( 267,268 ) )
	return( this.AtribuiuSemCritica( 3 ) );
}
		return( true );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_TiConsulta.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O tipo da consulta é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_TiConsulta.prototype.Cabecalho = function()
{
		return( "TiConsulta [0]" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_TiConsulta_TiConsulta.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( TiConsulta.Obrigatorio( p_comMsg ) );
}

TiConsulta_TiConsulta.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_Clinica.prototype.FiltroPai = function()
{
		if( g_temMaisDeUmClinica )
			return( "A.idPrimario in ( " + g_vetIdClinica + " )" );
		return( "" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A clínica é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqConsulta_TStCon.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_TStCon.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O sttaus é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_TStCon.prototype.Cabecalho = function()
{
		return( "Status" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_TStCon_Status.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( TStCon.Obrigatorio( p_comMsg ) );
}

TStCon_Status.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_TiAgenda.prototype.FiltroPai = function()
{
		if( TiConsulta == 1 )
			return( "A.Ativo = 1" );
		if( TiConsulta > 1 )
			return( "A.Complemen = 1" );
		return( "" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_TiAgenda.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O tipo é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_TiAgenda.prototype.Cabecalho = function()
{
		return( "Tipo" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_TiAgenda_TiAgenda.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( TiAgenda.Obrigatorio( p_comMsg ) );
}

TiAgenda_TiAgenda.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_Data.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data da consulta é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_Hora.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O horário da consulta é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqConsulta_HoraChega.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_HoraChega.prototype.Cabecalho = function()
{
		return( "Chegou às" );
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_Pessoa.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.QtoDesmar < " + g_qtasDesmar + "" );
		return( "" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_Pessoa.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O paciente é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Pessoa.prototype.Cabecalho = function()
{
		return( "Paciente" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_Pessoa_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_Pessoa_NumCelular.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_NumCelular.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqConsulta_Prontuario.prototype.Calculou = function()
{
{
{
	if( !Pessoa.ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT Prontuario FROM arqPessoa WHERE arqPessoa.IdPrimario=( " + Pessoa + " )  )" + LANCE_SEPARADOR + this.Prefixo + "Prontuario" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Prontuario.prototype.Cabecalho = function()
{
		return( "Prontuário" );
}

Prontuario.EhCalculado = true;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_Medico.prototype.FiltroPai = function()
{
			return( "" + vijMedico() + "" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Medico.prototype.Cabecalho = function()
{
		return( "Médico" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_Medico_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Medico.Obrigatorio( p_comMsg ) );
}

Medico_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_Assessor.prototype.FiltroPai = function()
{
			return( "" + vijAssessor() + "" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Assessor.prototype.Cabecalho = function()
{
		return( "Assessor" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_Assessor_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Assessor.Obrigatorio( p_comMsg ) );
}

Assessor_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_CallCenter.prototype.FiltroPai = function()
{
			return( "" + vijCallCenter() + "" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_CallCenter.prototype.Cabecalho = function()
{
		return( "Call center" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_CallCenter_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( CallCenter.Obrigatorio( p_comMsg ) );
}

CallCenter_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_TMotivo.prototype.Cabecalho = function()
{
		return( "Motivo" );
}

TMotivo_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TMotivo_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqConsulta_Cortesia.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Cortesia.prototype.Cabecalho = function()
{
		return( "Cortesia?" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Valor.prototype.Cabecalho = function()
{
		return( "Valor<br>Consulta" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_Valor.prototype.Existencia = function()
{
	return( Cortesia == 0 );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_FormaPg.prototype.Cabecalho = function()
{
		return( "Forma Pagto<br>Consulta" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_FormaPg.prototype.Existencia = function()
{
	return( tem( Valor ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_FormaPg_FormaPg.prototype.Existencia = function()
{
	return( tem( Valor ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_FormaPg_FormaPg.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( FormaPg.Obrigatorio( p_comMsg ) );
}

FormaPg_FormaPg.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Valor2.prototype.Cabecalho = function()
{
		return( "2° Valor<br>Consulta" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_Valor2.prototype.Existencia = function()
{
	return( tem( Valor ) );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_FormaPg2.prototype.Cabecalho = function()
{
		return( "2ª Forma Pagto<br>Consulta" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_FormaPg2.prototype.Existencia = function()
{
	return( tem( Valor2 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_FormaPg2_FormaPg.prototype.Existencia = function()
{
	return( tem( Valor2 ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_FormaPg2_FormaPg.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( FormaPg2.Obrigatorio( p_comMsg ) );
}

FormaPg2_FormaPg.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_PTrata.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo = 1" );
		return( "" );
}

//-------------------------------------------------------------
// Campos a mais que o ligado traz do pai
//-------------------------------------------------------------
Campo_arqConsulta_PTrata.prototype.TrazOutrosDoPai = function()
{
	var vetPai = [];
			vetPai[0] = [ "Valor, MrgDesc",
					"A.PTrata, arqPTrata",
					"0,0" ];
		return( vetPai );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_PTrata_PTrata.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( PTrata.Obrigatorio( p_comMsg ) );
}

PTrata_PTrata.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Pré Campo
//-------------------------------------------------------------
Campo_arqConsulta_ValPTrata.prototype.PreCampo = function()
{
		if( ValPTrata == 0 )
	{
		alt( ValPTrata, PTrata_Valor );
	}
	return( true );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqConsulta_ValPTrata.prototype.Sugeriu = function()
{
{
{
	if( !PTrata.ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT Valor FROM arqPTrata WHERE arqPTrata.IdPrimario=( " + PTrata + " )  )" + LANCE_SEPARADOR + this.Prefixo + "ValPTrata" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_ValPTrata.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O valor do tratamento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqConsulta_ValPTrata.prototype.TemErro = function()
{
		if( tem(this) && ( ValPTrata < ( PTrata_Valor - (PTrata_Valor * PTrata_MrgDesc ) / 100.0 ) ) )
	{
		alert( "Valor inválido! Está abaixo da margem de desconto permitida" );
		return( true );
	}
	return( Lance_CampoCadeia.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_ValPTrata.prototype.Cabecalho = function()
{
		return( "Valor<br>Tratamento" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_ValPTrata.prototype.Existencia = function()
{
	return( tem( PTrata_PTrata ) );
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_EntraFPg.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo = 1 and A.PodeEntra = 1" );
			return( "A.PodeEntra = 1" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_EntraFPg.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A forma de pagamento da entrada é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Campos a mais que o ligado traz do pai
//-------------------------------------------------------------
Campo_arqConsulta_EntraFPg.prototype.TrazOutrosDoPai = function()
{
	var vetPai = [];
			vetPai[0] = [ "Cartao",
					"A.EntraFPg, arqFormaPg",
					"0" ];
		return( vetPai );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_EntraFPg.prototype.Existencia = function()
{
	return( tem( EntraVal ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_EntraFPg_FormaPg.prototype.Existencia = function()
{
	return( tem( EntraVal ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_EntraFPg_FormaPg.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( EntraFPg.Obrigatorio( p_comMsg ) );
}

EntraFPg_FormaPg.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_EntraVal.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O valor da entrada é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqConsulta_EntraVal.prototype.TemErro = function()
{
		if( tem(this) && ( EntraVal > ValPTrata ) )
	{
		alert( "Valor inválido" );
		return( true );
	}
	return( Lance_CampoCadeia.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_EntraVal.prototype.Existencia = function()
{
	return( tem( PTrata_PTrata ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_EntraParcE.prototype.Existencia = function()
{
	return( EntraFPg_Cartao == 1 );
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_SdEntrFPg.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo = 1 and A.PodeEntra = 1" );
			return( "A.PodeEntra = 1" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_SdEntrFPg.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A forma de pagamento do saldo da entrada é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Campos a mais que o ligado traz do pai
//-------------------------------------------------------------
Campo_arqConsulta_SdEntrFPg.prototype.TrazOutrosDoPai = function()
{
	var vetPai = [];
			vetPai[0] = [ "Cartao",
					"A.SdEntrFPg, arqFormaPg",
					"0" ];
		return( vetPai );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_SdEntrFPg.prototype.Existencia = function()
{
	return( tem( EntraTotP ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_SdEntrFPg_FormaPg.prototype.Existencia = function()
{
	return( tem( EntraTotP ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_SdEntrFPg_FormaPg.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SdEntrFPg.Obrigatorio( p_comMsg ) );
}

SdEntrFPg_FormaPg.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_arqConsulta_EntraParc.prototype.PosCampo = function()
{
		if( BoletoMin == 0 )
	{
		sugereBoletoMin()
	}
	return( true );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_EntraParc.prototype.Existencia = function()
{
	return( tem( EntraTotP ) );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqConsulta_EntraTotal.prototype.Calculou = function()
{
{
	return( this.Atribuiu( EntraVal + EntraTotP ) );
}
}

EntraTotal.EhCalculado = true;
//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqConsulta_BoletoMin.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_EntraObs.prototype.Existencia = function()
{
	return( tem( EntraFPg_FormaPg ) );
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_I1FPg.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo = 1 and A.PodeEntra = 1" );
			return( "A.PodeEntra = 1" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_I1FPg.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A forma de pagamento é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Campos a mais que o ligado traz do pai
//-------------------------------------------------------------
Campo_arqConsulta_I1FPg.prototype.TrazOutrosDoPai = function()
{
	var vetPai = [];
			vetPai[0] = [ "Cartao",
					"A.I1FPg, arqFormaPg",
					"0" ];
		return( vetPai );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_I1FPg.prototype.Existencia = function()
{
	return( tem( I1Valor ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_I1FPg_FormaPg.prototype.Existencia = function()
{
	return( tem( I1Valor ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_I1FPg_FormaPg.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( I1FPg.Obrigatorio( p_comMsg ) );
}

I1FPg_FormaPg.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_I1Parc.prototype.Existencia = function()
{
	return( I1FPg_Cartao == 1 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_I2Valor.prototype.Existencia = function()
{
	return( ValPTrata > ( EntraVal + EntraTotP + I1Valor ) );
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_I2FPg.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo = 1 and A.PodeEntra = 1" );
			return( "A.PodeEntra = 1" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_I2FPg.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A forma de pagamento é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Campos a mais que o ligado traz do pai
//-------------------------------------------------------------
Campo_arqConsulta_I2FPg.prototype.TrazOutrosDoPai = function()
{
	var vetPai = [];
			vetPai[0] = [ "Cartao",
					"A.I2FPg, arqFormaPg",
					"0" ];
		return( vetPai );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_I2FPg.prototype.Existencia = function()
{
	return( tem( I2Valor ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_I2FPg_FormaPg.prototype.Existencia = function()
{
	return( tem( I2Valor ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_I2FPg_FormaPg.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( I2FPg.Obrigatorio( p_comMsg ) );
}

I2FPg_FormaPg.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_I2Parc.prototype.Existencia = function()
{
	return( I2FPg_Cartao == 1 );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqConsulta_SubTotal.prototype.Calculou = function()
{
{
	return( this.Atribuiu( EntraVal + EntraTotP +I1Valor + I2Valor ) );
}
}

SubTotal.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqConsulta_SubSaldo.prototype.Calculou = function()
{
{
	return( this.Atribuiu( ValPTrata - SubTotal ) );
}
}

SubSaldo.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqConsulta_SaldoValor.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( SubSaldo ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_SaldoValor.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O valor do saldo a pagar é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqConsulta_SaldoValor.prototype.TemErro = function()
{
		if( tem(this) && ( SaldoValor * 1.00 != SubSaldo * 1.00 ) )
	{
		alert( "Valor inválido" );
		return( true );
	}
	return( Lance_CampoCadeia.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_SaldoValor.prototype.Existencia = function()
{
	return( ( tem( PTrata_PTrata ) ) && SubSaldo > 0 );
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_SaldoFPg.prototype.FiltroPai = function()
{
		if( BoletoMin > EntraTotal )
			return( "A.Boleto = 0" );
		return( "" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_SaldoFPg.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A forma de pagamento do saldo devedor é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Campos a mais que o ligado traz do pai
//-------------------------------------------------------------
Campo_arqConsulta_SaldoFPg.prototype.TrazOutrosDoPai = function()
{
	var vetPai = [];
			vetPai[0] = [ "Cartao",
					"A.SaldoFPg, arqFormaPg",
					"0" ];
		return( vetPai );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_SaldoFPg.prototype.Existencia = function()
{
	return( tem( SaldoValor ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_SaldoFPg_FormaPg.prototype.Existencia = function()
{
	return( tem( SaldoValor ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_SaldoFPg_FormaPg.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SaldoFPg.Obrigatorio( p_comMsg ) );
}

SaldoFPg_FormaPg.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_SaldoParc.prototype.Existencia = function()
{
	return( tem( SaldoFPg_FormaPg ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_SaldoObs.prototype.Existencia = function()
{
	return( tem( SaldoFPg_FormaPg ) );
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_ContaCons.prototype.FiltroPai = function()
{
			return( "A.TPgRec = 2" );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqConsulta_ContaCons.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_ContaCons.prototype.Existencia = function()
{
	return( tem( Valor ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_ContaCons_Transacao.prototype.Existencia = function()
{
	return( tem( Valor ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_ContaCons_Transacao.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( ContaCons.Obrigatorio( p_comMsg ) );
}

ContaCons_Transacao.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_ContaPTra.prototype.FiltroPai = function()
{
			return( "A.TPgRec = 2" );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqConsulta_ContaPTra.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_ContaPTra.prototype.Existencia = function()
{
	return( tem( PTrata_PTrata ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_ContaPTra_Transacao.prototype.Existencia = function()
{
	return( tem( PTrata_PTrata ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_ContaPTra_Transacao.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( ContaPTra.Obrigatorio( p_comMsg ) );
}

ContaPTra_Transacao.TipoCampo |= CAMPO_CHAVE_PAI;
TrgQtdM.EhCalculado = true;
TrgQtdM.EhTotalizado = true;
TrgQtdMEnt.EhCalculado = true;
TrgQtdMEnt.EhTotalizado = true;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqConsulta_Saldo.prototype.Calculou = function()
{
{
	return( this.Atribuiu( TrgQtdM - TrgQtdMEnt ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConsulta_Saldo.prototype.Cabecalho = function()
{
		return( "Saldo<br>Medicamentos" );
}

Saldo.EhCalculado = true;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConsulta_BkpAssess.prototype.FiltroPai = function()
{
			return( "" + vijAssessor() + "" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_BkpAssess.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O assesssor que fez o backup é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_BkpAssess.prototype.Existencia = function()
{
	return( tem( BkpData ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_BkpAssess_Usuario.prototype.Existencia = function()
{
	return( tem( BkpData ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_BkpAssess_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( BkpAssess.Obrigatorio( p_comMsg ) );
}

BkpAssess_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConsulta_BkpMotivo.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O motivo é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_BkpMotivo.prototype.Existencia = function()
{
	return( tem( BkpData ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_BkpMotivo_BkpMotivo.prototype.Existencia = function()
{
	return( tem( BkpData ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConsulta_BkpMotivo_BkpMotivo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( BkpMotivo.Obrigatorio( p_comMsg ) );
}

BkpMotivo_BkpMotivo.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConsulta_BkpObs.prototype.Existencia = function()
{
	return( tem( BkpData ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_TiConsulta.prototype.ExistenciaEspecial = function()
{
	return( ( !TiConsulta_TiConsulta.Obrigatorio( false ) || tem(TiConsulta_TiConsulta) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_TiAgenda.prototype.ExistenciaEspecial = function()
{
	return( ( !TiAgenda_TiAgenda.Obrigatorio( false ) || tem(TiAgenda_TiAgenda) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_Pessoa.prototype.ExistenciaEspecial = function()
{
	return( ( !Pessoa_Nome.Obrigatorio( false ) || tem(Pessoa_Nome) ) && ( !Pessoa_NumCelular.Obrigatorio( false ) || tem(Pessoa_NumCelular) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_Medico.prototype.ExistenciaEspecial = function()
{
	return( ( !Medico_Usuario.Obrigatorio( false ) || tem(Medico_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_Assessor.prototype.ExistenciaEspecial = function()
{
	return( ( !Assessor_Usuario.Obrigatorio( false ) || tem(Assessor_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_CallCenter.prototype.ExistenciaEspecial = function()
{
	return( ( !CallCenter_Usuario.Obrigatorio( false ) || tem(CallCenter_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_FormaPg.prototype.ExistenciaEspecial = function()
{
	return( ( !FormaPg_FormaPg.Obrigatorio( false ) || tem(FormaPg_FormaPg) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_FormaPg2.prototype.ExistenciaEspecial = function()
{
	return( ( !FormaPg2_FormaPg.Obrigatorio( false ) || tem(FormaPg2_FormaPg) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_PTrata.prototype.ExistenciaEspecial = function()
{
	return( ( !PTrata_PTrata.Obrigatorio( false ) || tem(PTrata_PTrata) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_EntraFPg.prototype.ExistenciaEspecial = function()
{
	return( ( !EntraFPg_FormaPg.Obrigatorio( false ) || tem(EntraFPg_FormaPg) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_SdEntrFPg.prototype.ExistenciaEspecial = function()
{
	return( ( !SdEntrFPg_FormaPg.Obrigatorio( false ) || tem(SdEntrFPg_FormaPg) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_I1FPg.prototype.ExistenciaEspecial = function()
{
	return( ( !I1FPg_FormaPg.Obrigatorio( false ) || tem(I1FPg_FormaPg) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_I2FPg.prototype.ExistenciaEspecial = function()
{
	return( ( !I2FPg_FormaPg.Obrigatorio( false ) || tem(I2FPg_FormaPg) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_SaldoFPg.prototype.ExistenciaEspecial = function()
{
	return( ( !SaldoFPg_FormaPg.Obrigatorio( false ) || tem(SaldoFPg_FormaPg) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_ContaCons.prototype.ExistenciaEspecial = function()
{
	return( ( !ContaCons_Transacao.Obrigatorio( false ) || tem(ContaCons_Transacao) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_ContaPTra.prototype.ExistenciaEspecial = function()
{
	return( ( !ContaPTra_Transacao.Obrigatorio( false ) || tem(ContaPTra_Transacao) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_BkpAssess.prototype.ExistenciaEspecial = function()
{
	return( ( !BkpAssess_Usuario.Obrigatorio( false ) || tem(BkpAssess_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConsulta_BkpMotivo.prototype.ExistenciaEspecial = function()
{
	return( ( !BkpMotivo_BkpMotivo.Obrigatorio( false ) || tem(BkpMotivo_BkpMotivo) ) );
}

function IniciarDependencias_arqConsulta()
{
Pessoa.CalculosDependentes= [ Prontuario ];
EntraVal.CalculosDependentes= [ EntraTotal,SubTotal ];
EntraTotP.CalculosDependentes= [ EntraTotal,SubTotal ];
I1Valor.CalculosDependentes= [ SubTotal ];
I2Valor.CalculosDependentes= [ SubTotal ];
ValPTrata.CalculosDependentes= [ SubSaldo ];
SubTotal.CalculosDependentes= [ SubSaldo ];
TrgQtdM.CalculosDependentes= [ Saldo ];
TrgQtdMEnt.CalculosDependentes= [ Saldo ];
TiConsulta_TiConsulta.ExistenciasDependentes= [ TiConsulta ];
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
TiAgenda_TiAgenda.ExistenciasDependentes= [ TiAgenda ];
Pessoa_Nome.ExistenciasDependentes= [ Pessoa ];
Pessoa_NumCelular.ExistenciasDependentes= [ Pessoa ];
Medico_Usuario.ExistenciasDependentes= [ Medico ];
Assessor_Usuario.ExistenciasDependentes= [ Assessor ];
CallCenter_Usuario.ExistenciasDependentes= [ CallCenter ];
Cortesia.ExistenciasDependentes= [ Valor ];
Valor.ExistenciasDependentes= [ FormaPg,FormaPg_FormaPg,Valor2,ContaCons,ContaCons_Transacao ];
FormaPg_FormaPg.ExistenciasDependentes= [ FormaPg ];
Valor2.ExistenciasDependentes= [ FormaPg2,FormaPg2_FormaPg ];
FormaPg2_FormaPg.ExistenciasDependentes= [ FormaPg2 ];
PTrata_PTrata.ExistenciasDependentes= [ PTrata ];
PTrata.ExistenciasDependentes= [ ValPTrata,EntraVal,SaldoValor,ContaPTra,ContaPTra_Transacao ];
EntraVal.ExistenciasDependentes= [ EntraFPg,EntraFPg_FormaPg,I2Valor ];
EntraFPg_FormaPg.ExistenciasDependentes= [ EntraFPg ];
EntraFPg.ExistenciasDependentes= [ EntraParcE,EntraObs ];
EntraTotP.ExistenciasDependentes= [ SdEntrFPg,SdEntrFPg_FormaPg,EntraParc,I2Valor ];
SdEntrFPg_FormaPg.ExistenciasDependentes= [ SdEntrFPg ];
I1Valor.ExistenciasDependentes= [ I1FPg,I1FPg_FormaPg,I2Valor ];
I1FPg_FormaPg.ExistenciasDependentes= [ I1FPg ];
I1FPg.ExistenciasDependentes= [ I1Parc ];
ValPTrata.ExistenciasDependentes= [ I2Valor ];
I2Valor.ExistenciasDependentes= [ I2FPg,I2FPg_FormaPg ];
I2FPg_FormaPg.ExistenciasDependentes= [ I2FPg ];
I2FPg.ExistenciasDependentes= [ I2Parc ];
SubSaldo.ExistenciasDependentes= [ SaldoValor ];
BoletoMin.ExistenciasDependentes= [ SaldoFPg ];
EntraTotal.ExistenciasDependentes= [ SaldoFPg ];
SaldoValor.ExistenciasDependentes= [ SaldoFPg,SaldoFPg_FormaPg ];
SaldoFPg_FormaPg.ExistenciasDependentes= [ SaldoFPg ];
SaldoFPg.ExistenciasDependentes= [ SaldoParc,SaldoObs ];
ContaCons_Transacao.ExistenciasDependentes= [ ContaCons ];
ContaPTra_Transacao.ExistenciasDependentes= [ ContaPTra ];
BkpData.ExistenciasDependentes= [ BkpAssess,BkpAssess_Usuario,BkpMotivo,BkpMotivo_BkpMotivo,BkpObs ];
BkpAssess_Usuario.ExistenciasDependentes= [ BkpAssess ];
BkpMotivo_BkpMotivo.ExistenciasDependentes= [ BkpMotivo ];
TiConsulta_TiConsulta.ErrosDependentes= [ TiConsulta ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
TStCon_Status.ErrosDependentes= [ TStCon ];
TiAgenda_TiAgenda.ErrosDependentes= [ TiAgenda ];
Pessoa_NumCelular.ErrosDependentes= [ Pessoa ];
Medico_Usuario.ErrosDependentes= [ Medico ];
Assessor_Usuario.ErrosDependentes= [ Assessor ];
CallCenter_Usuario.ErrosDependentes= [ CallCenter ];
FormaPg_FormaPg.ErrosDependentes= [ FormaPg ];
FormaPg2_FormaPg.ErrosDependentes= [ FormaPg2 ];
PTrata_PTrata.ErrosDependentes= [ PTrata ];
PTrata.ErrosDependentes= [ ValPTrata ];
EntraFPg_FormaPg.ErrosDependentes= [ EntraFPg ];
ValPTrata.ErrosDependentes= [ EntraVal ];
SdEntrFPg_FormaPg.ErrosDependentes= [ SdEntrFPg ];
I1FPg_FormaPg.ErrosDependentes= [ I1FPg ];
I2FPg_FormaPg.ErrosDependentes= [ I2FPg ];
SubSaldo.ErrosDependentes= [ SaldoValor ];
SaldoFPg_FormaPg.ErrosDependentes= [ SaldoFPg ];
ContaCons_Transacao.ErrosDependentes= [ ContaCons ];
ContaPTra_Transacao.ErrosDependentes= [ ContaPTra ];
BkpAssess_Usuario.ErrosDependentes= [ BkpAssess ];
BkpMotivo_BkpMotivo.ErrosDependentes= [ BkpMotivo ];
TiConsulta.CamposChave= [ TiConsulta_TiConsulta ];
Clinica.CamposChave= [ Clinica_Clinica ];
TiAgenda.CamposChave= [ TiAgenda_TiAgenda ];
Pessoa.CamposChave= [ Pessoa_Nome,Pessoa_NumCelular ];
Medico.CamposChave= [ Medico_Usuario ];
Assessor.CamposChave= [ Assessor_Usuario ];
CallCenter.CamposChave= [ CallCenter_Usuario ];
FormaPg.CamposChave= [ FormaPg_FormaPg ];
FormaPg2.CamposChave= [ FormaPg2_FormaPg ];
PTrata.CamposChave= [ PTrata_PTrata ];
EntraFPg.CamposChave= [ EntraFPg_FormaPg ];
SdEntrFPg.CamposChave= [ SdEntrFPg_FormaPg ];
I1FPg.CamposChave= [ I1FPg_FormaPg ];
I2FPg.CamposChave= [ I2FPg_FormaPg ];
SaldoFPg.CamposChave= [ SaldoFPg_FormaPg ];
ContaCons.CamposChave= [ ContaCons_Transacao ];
ContaPTra.CamposChave= [ ContaPTra_Transacao ];
BkpAssess.CamposChave= [ BkpAssess_Usuario ];
BkpMotivo.CamposChave= [ BkpMotivo_BkpMotivo ];
}
	//=========================================================================
	function AcionaTecla( p_tecla )
	{
		switch( p_tecla )
		{
			case _DEL: return( !tem( ContaCons ) && !tem( ContaPTra ) );
		}
		return( true );
	}
	g_acionaTecla="AcionaTecla";


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqConsulta";
var PTrata_Valor;
var PTrata_MrgDesc;
var EntraFPg_Cartao;
var SdEntrFPg_Cartao;
var I1FPg_Cartao;
var I2FPg_Cartao;
var SaldoFPg_Cartao;
//------------------------------------------------------------
function ListaDeCampos_arqConsulta( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Num, TiConsulta, TiConsulta_TiConsulta, Clinica, Clinica_Clinica, TStCon, TStCon_Status, TiAgenda, TiAgenda_TiAgenda, Data, Hora, HoraChega, Pessoa, Pessoa_Nome, Pessoa_NumCelular, Prontuario, Medico, Medico_Usuario, Assessor, Assessor_Usuario, CallCenter, CallCenter_Usuario, MedicaAtua, TMotivo, TMotivo_Chave, TMotivo_Descritor, Cortesia, Valor, FormaPg, FormaPg_FormaPg, Valor2, FormaPg2, FormaPg2_FormaPg, PTrata, PTrata_PTrata, ValPTrata, EntraFPg, EntraFPg_FormaPg, EntraVal, EntraParcE, EntraTotP, SdEntrFPg, SdEntrFPg_FormaPg, EntraParc, EntraTotal, BoletoMin, EntraObs, I1Valor, I1FPg, I1FPg_FormaPg, I1Parc, I2Valor, I2FPg, I2FPg_FormaPg, I2Parc, SubTotal, SubSaldo, SaldoValor, SaldoFPg, SaldoFPg_FormaPg, SaldoParc, SaldoObs, Conduta, Medicacao, Obs, ContaCons, ContaCons_Transacao, ContaPTra, ContaPTra_Transacao, TrgQtdM, TrgQtdMEnt, Saldo, BkpData, BkpAssess, BkpAssess_Usuario, BkpMotivo, BkpMotivo_BkpMotivo, BkpObs ]	);
	IniciarDependencias_arqConsulta();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqConsulta( '' );
g_idOperacao = 39;

if( parent.navegacao ) {
var Menu_1 = [ 1,"Medicação","","d",206,"","",ultimaLigOpcaoEm( 109,110,117,276 ),"","1","a_cmedic","arqCMedica","Folhear","Consulta","?","","", "","", 0,28,[],[54]];
var Menu_2 = [ 1,"Ag. Retirada","","t",197,"","",ultimaLigOpcaoEm( 109,110,117,276 ),"","1","a_agret","arqAgRet","Folhear","Consulta","?","","", "","", 0,28,[],[53]];
var Menu_3 = [ 1,"Gerar Receber Tratamento NAO","","G",184,"","",false /* ultimaLigOpcaoEm( 109,110,117,276 ) */,"tem( PTrata ) && !tem( ContaPTra )","5","p_conta_parcela_gerar_tratamento","","","","","","", "","", 0,28,[184],[]];
var Menu_4 = [ 1,"Contas","","o",240,"","",ultimaLigOpcaoEm( 109,110,117,276 ),"","6", "", "", "", "", "", "", "", "", "", 2, 28,[],[33,33] ];
var Menu_4_1 = [ 1,"Consulta","","u",239,"","",1,"","1","a_conta","arqConta","Folhear","","?","NavCons","", "","", 0,11,[],[33]];
var Menu_4_2 = [ 1,"Tratamentos","","T",241,"","",1,"","1","a_conta","arqConta","Folhear","","?","NavPTrata","", "","", 0,11,[],[33]];
var Menu_5 = [ 1,"Emitir Contrato","","m",191,"","",ultimaLigOpcaoEm( 109,110,117,276 ),"","5","r_consulta_contrato","","","","","","", "","", 0,28,[191],[]];
var Menu_6 = [ 1,"Emitir Observações","","b",277,"","",ultimaLigOpcaoEm( 265,266,267,268,276 ),"","5","r_consulta_obs","","","","","","", "","", 0,28,[277],[]];
var Menu_7 = [ 1,"Avisar Agendar retirada","","A",249,"","",ultimaLigOpcaoEm( 109,110,117,276 ),"temMarcados()","5","p_consulta_avisar_retirar","","","","","","", "","", 0,28,[249],[]];
var Menu_8 = [ 1,"Informar Chegada","","h",137,"","",1,"","1", "a_qselec", "parQSelecao", "Alterar", "", "", "", "", "5^^^p_consulta_alterar^^^^^^^^^^^^^^^^^^", "", 0,28,[137],[]];
parent.navegacao.MenuPrincQtdOpcoes=8;
}
