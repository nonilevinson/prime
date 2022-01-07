/*=========================================================================
  a_qselec - QSelecao
=========================================================================*/

//------------------------------------------------------------
Campo_parQSelecao_Usuario.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_Usuario()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Usuario", "Usuario", "Usuario", "arqUsuario", "a_usuari", null, "",5);
}

var Usuario = new Campo_parQSelecao_Usuario;

//------------------------------------------------------------
Campo_parQSelecao_Usuario_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_Usuario_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Usuario_Usuario", "Usuario_Usuario", "Usuario", Usuario, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Usuario_Usuario = new Campo_parQSelecao_Usuario_Usuario;

//------------------------------------------------------------
Campo_parQSelecao_Medico.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_Medico()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Medico", "Medico", "Medico", "arqUsuario", "a_usuari", null, "",5);
}

var Medico = new Campo_parQSelecao_Medico;

//------------------------------------------------------------
Campo_parQSelecao_Medico_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_Medico_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Medico_Usuario", "Medico_Usuario", "Usuario", Medico, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Medico_Usuario = new Campo_parQSelecao_Medico_Usuario;

//------------------------------------------------------------
Campo_parQSelecao_Assessor.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_Assessor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Assessor", "Assessor", "Assessor", "arqUsuario", "a_usuari", null, "",5);
}

var Assessor = new Campo_parQSelecao_Assessor;

//------------------------------------------------------------
Campo_parQSelecao_Assessor_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_Assessor_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Assessor_Usuario", "Assessor_Usuario", "Usuario", Assessor, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Assessor_Usuario = new Campo_parQSelecao_Assessor_Usuario;

//------------------------------------------------------------
Campo_parQSelecao_CallCenter.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_CallCenter()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "CallCenter", "CallCenter", "CallCenter", "arqUsuario", "a_usuari", null, "",5);
}

var CallCenter = new Campo_parQSelecao_CallCenter;

//------------------------------------------------------------
Campo_parQSelecao_CallCenter_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_CallCenter_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "CallCenter_Usuario", "CallCenter_Usuario", "Usuario", CallCenter, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var CallCenter_Usuario = new Campo_parQSelecao_CallCenter_Usuario;

//------------------------------------------------------------
Campo_parQSelecao_StatusLog.prototype = new Lance_CampoLigado;

function Campo_parQSelecao_StatusLog()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "StatusLog", "StatusLog", "StatusLog", "tabStatusLog", "t_status", null, "",0);
}

var StatusLog = new Campo_parQSelecao_StatusLog;

//------------------------------------------------------------
Campo_parQSelecao_StatusLog_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_StatusLog_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "StatusLog_Chave", "StatusLog_Chave", "StatusLog", StatusLog, 2, "uu", false);
}

var StatusLog_Chave = new Campo_parQSelecao_StatusLog_Chave;

//------------------------------------------------------------
Campo_parQSelecao_StatusLog_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_StatusLog_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "StatusLog_Descritor", "StatusLog_Descritor", "StatusLog", StatusLog, 13, "xxxxxxxxxxxxx", false);
}

var StatusLog_Descritor = new Campo_parQSelecao_StatusLog_Descritor;

//------------------------------------------------------------
Campo_parQSelecao_Cliente.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_Cliente()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cliente", "Cliente", "Cliente", "arqPessoa", "a_pessoa", null, "",7);
}

var Cliente = new Campo_parQSelecao_Cliente;

//------------------------------------------------------------
Campo_parQSelecao_Cliente_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_Cliente_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cliente_Nome", "Cliente_Nome", "Nome", Cliente, 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Cliente_Nome = new Campo_parQSelecao_Cliente_Nome;

//------------------------------------------------------------
Campo_parQSelecao_Cliente_NumCelular.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_Cliente_NumCelular()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cliente_NumCelular", "Cliente_NumCelular", "NumCelular", Cliente, 11, "(##) #.####.####", true);
}

var Cliente_NumCelular = new Campo_parQSelecao_Cliente_NumCelular;

//------------------------------------------------------------
Campo_parQSelecao_Fornecedor.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_Fornecedor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Fornecedor", "Fornecedor", "Fornecedor", "arqFornecedor", "a_fornec", null, "",42);
}

var Fornecedor = new Campo_parQSelecao_Fornecedor;

//------------------------------------------------------------
Campo_parQSelecao_Fornecedor_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_Fornecedor_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Fornecedor_Nome", "Fornecedor_Nome", "Nome", Fornecedor, 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Fornecedor_Nome = new Campo_parQSelecao_Fornecedor_Nome;

//------------------------------------------------------------
Campo_parQSelecao_EmailRemet.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_EmailRemet()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "EmailRemet", "EmailRemet", "EmailRemet", "arqEmailRemet", "a_emailr", null, "",9);
}

var EmailRemet = new Campo_parQSelecao_EmailRemet;

//------------------------------------------------------------
Campo_parQSelecao_EmailRemet_Email.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_EmailRemet_Email()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "EmailRemet_Email", "EmailRemet_Email", "Email", EmailRemet, 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var EmailRemet_Email = new Campo_parQSelecao_EmailRemet_Email;

//------------------------------------------------------------
Campo_parQSelecao_AcaoEmail.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_AcaoEmail()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "AcaoEmail", "AcaoEmail", "AcaoEmail", "arqAcaoEmail", "a_aemail", null, "",10);
}

var AcaoEmail = new Campo_parQSelecao_AcaoEmail;

//------------------------------------------------------------
Campo_parQSelecao_AcaoEmail_Titulo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_AcaoEmail_Titulo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "AcaoEmail_Titulo", "AcaoEmail_Titulo", "Título", AcaoEmail, 100, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var AcaoEmail_Titulo = new Campo_parQSelecao_AcaoEmail_Titulo;

//------------------------------------------------------------
Campo_parQSelecao_AcaoEmail_Versao.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_AcaoEmail_Versao()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "AcaoEmail_Versao", "AcaoEmail_Versao", "Versão", AcaoEmail, 20, "xxxxxxxxxxxxxxxxxxxx", false);
}

var AcaoEmail_Versao = new Campo_parQSelecao_AcaoEmail_Versao;

//------------------------------------------------------------
Campo_parQSelecao_TSimNao.prototype = new Lance_CampoLigado;

function Campo_parQSelecao_TSimNao()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TSimNao", "TSimNao", "TSimNao", "tabTSimNao", "t_tsimna", null, "",0);
}

var TSimNao = new Campo_parQSelecao_TSimNao;

//------------------------------------------------------------
Campo_parQSelecao_TSimNao_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TSimNao_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TSimNao_Chave", "TSimNao_Chave", "TSimNao", TSimNao, 1, "u", false);
}

var TSimNao_Chave = new Campo_parQSelecao_TSimNao_Chave;

//------------------------------------------------------------
Campo_parQSelecao_TSimNao_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TSimNao_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TSimNao_Descritor", "TSimNao_Descritor", "TSimNao", TSimNao, 3, "xxx", false);
}

var TSimNao_Descritor = new Campo_parQSelecao_TSimNao_Descritor;

//------------------------------------------------------------
Campo_parQSelecao_Cadeia30.prototype = new Lance_CampoCadeia;

function Campo_parQSelecao_Cadeia30()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cadeia30", "Cadeia30", "Cadeia30", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Cadeia30 = new Campo_parQSelecao_Cadeia30;

//------------------------------------------------------------
Campo_parQSelecao_Cadeia100.prototype = new Lance_CampoCadeia;

function Campo_parQSelecao_Cadeia100()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cadeia100", "Cadeia100", "Cadeia100", 100, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Cadeia100 = new Campo_parQSelecao_Cadeia100;

//------------------------------------------------------------
Campo_parQSelecao_Logico1.prototype = new Lance_CampoLogico;

function Campo_parQSelecao_Logico1()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Logico1", "Logico1", "Logico1");
}

var Logico1 = new Campo_parQSelecao_Logico1;

//------------------------------------------------------------
Campo_parQSelecao_DataIni.prototype = new Lance_CampoData;

function Campo_parQSelecao_DataIni()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataIni", "DataIni", "DataIni", 8, "dd/mm/aaaa", true);
}

var DataIni = new Campo_parQSelecao_DataIni;

//------------------------------------------------------------
Campo_parQSelecao_DataFim.prototype = new Lance_CampoData;

function Campo_parQSelecao_DataFim()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataFim", "DataFim", "DataFim", 8, "dd/mm/aaaa", true);
}

var DataFim = new Campo_parQSelecao_DataFim;

//------------------------------------------------------------
Campo_parQSelecao_DataIni1.prototype = new Lance_CampoData;

function Campo_parQSelecao_DataIni1()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataIni1", "DataIni1", "DataIni1", 8, "dd/mm/aaaa", true);
}

var DataIni1 = new Campo_parQSelecao_DataIni1;

//------------------------------------------------------------
Campo_parQSelecao_DataFim1.prototype = new Lance_CampoData;

function Campo_parQSelecao_DataFim1()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataFim1", "DataFim1", "DataFim1", 8, "dd/mm/aaaa", true);
}

var DataFim1 = new Campo_parQSelecao_DataFim1;

//------------------------------------------------------------
Campo_parQSelecao_MesIni.prototype = new Lance_CampoData;

function Campo_parQSelecao_MesIni()
{
	this.superClass = Lance_CampoData;
	this.superClass( "MesIni", "MesIni", "MesIni", 6, "mm/aaaa", true);
}

var MesIni = new Campo_parQSelecao_MesIni;

//------------------------------------------------------------
Campo_parQSelecao_MesFim.prototype = new Lance_CampoData;

function Campo_parQSelecao_MesFim()
{
	this.superClass = Lance_CampoData;
	this.superClass( "MesFim", "MesFim", "MesFim", 6, "mm/aaaa", true);
}

var MesFim = new Campo_parQSelecao_MesFim;

//------------------------------------------------------------
Campo_parQSelecao_HoraIni.prototype = new Lance_CampoHora;

function Campo_parQSelecao_HoraIni()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "HoraIni", "HoraIni", "HoraIni", 4, "hh:mm", true);
}

var HoraIni = new Campo_parQSelecao_HoraIni;

//------------------------------------------------------------
Campo_parQSelecao_HoraFim.prototype = new Lance_CampoHora;

function Campo_parQSelecao_HoraFim()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "HoraFim", "HoraFim", "HoraFim", 4, "hh:mm", true);
}

var HoraFim = new Campo_parQSelecao_HoraFim;

//------------------------------------------------------------
Campo_parQSelecao_Gran6.prototype = new Lance_CampoNumerico;

function Campo_parQSelecao_Gran6()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Gran6", "Gran6", "Gran6", 6, "###.##z", true,"", "");
}

var Gran6 = new Campo_parQSelecao_Gran6;

//------------------------------------------------------------
Campo_parQSelecao_Gran6Fim.prototype = new Lance_CampoNumerico;

function Campo_parQSelecao_Gran6Fim()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Gran6Fim", "Gran6Fim", "Gran6Fim", 6, "###.##z", true,"", "");
}

var Gran6Fim = new Campo_parQSelecao_Gran6Fim;

//------------------------------------------------------------
Campo_parQSelecao_Gran9.prototype = new Lance_CampoNumerico;

function Campo_parQSelecao_Gran9()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Gran9", "Gran9", "Gran9", 9, "###.###.##z", true,"", "");
}

var Gran9 = new Campo_parQSelecao_Gran9;

//------------------------------------------------------------
Campo_parQSelecao_Gran9Fim.prototype = new Lance_CampoNumerico;

function Campo_parQSelecao_Gran9Fim()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Gran9Fim", "Gran9Fim", "Gran9Fim", 9, "###.###.##z", true,"", "");
}

var Gran9Fim = new Campo_parQSelecao_Gran9Fim;

//------------------------------------------------------------
Campo_parQSelecao_Gran13.prototype = new Lance_CampoNumerico;

function Campo_parQSelecao_Gran13()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Gran13", "Gran13", "Gran13", 13, "#.###.###.###.##z", true,"", "");
}

var Gran13 = new Campo_parQSelecao_Gran13;

//------------------------------------------------------------
Campo_parQSelecao_Real6.prototype = new Lance_CampoNumerico;

function Campo_parQSelecao_Real6()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Real6", "Real6", "Real6", 8, "###.##z,zz", true,"", "");
}

var Real6 = new Campo_parQSelecao_Real6;

//------------------------------------------------------------
Campo_parQSelecao_Real6Fim.prototype = new Lance_CampoNumerico;

function Campo_parQSelecao_Real6Fim()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Real6Fim", "Real6Fim", "Real6Fim", 8, "###.##z,zz", true,"", "");
}

var Real6Fim = new Campo_parQSelecao_Real6Fim;

//------------------------------------------------------------
Campo_parQSelecao_Senha1.prototype = new Lance_CampoCadeia;

function Campo_parQSelecao_Senha1()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Senha1", "Senha1", "Senha1", 20, "????????????????????", false);
}

var Senha1 = new Campo_parQSelecao_Senha1;

//------------------------------------------------------------
Campo_parQSelecao_Senha2.prototype = new Lance_CampoCadeia;

function Campo_parQSelecao_Senha2()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Senha2", "Senha2", "Senha2", 20, "????????????????????", false);
}

var Senha2 = new Campo_parQSelecao_Senha2;

//------------------------------------------------------------
Campo_parQSelecao_Clinica.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_parQSelecao_Clinica;

//------------------------------------------------------------
Campo_parQSelecao_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Clinica_Clinica = new Campo_parQSelecao_Clinica_Clinica;

//------------------------------------------------------------
Campo_parQSelecao_TStCon.prototype = new Lance_CampoLigado;

function Campo_parQSelecao_TStCon()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TStCon", "TStCon", "TStCon", "tabTStCon", "t_tstcon", null, "",0);
}

var TStCon = new Campo_parQSelecao_TStCon;

//------------------------------------------------------------
Campo_parQSelecao_TStCon_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TStCon_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TStCon_Chave", "TStCon_Chave", "TStCon", TStCon, 2, "uu", false);
}

var TStCon_Chave = new Campo_parQSelecao_TStCon_Chave;

//------------------------------------------------------------
Campo_parQSelecao_TStCon_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TStCon_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TStCon_Descritor", "TStCon_Descritor", "TStCon", TStCon, 18, "xxxxxxxxxxxxxxxxxx", false);
}

var TStCon_Descritor = new Campo_parQSelecao_TStCon_Descritor;

//------------------------------------------------------------
Campo_parQSelecao_TMov.prototype = new Lance_CampoLigado;

function Campo_parQSelecao_TMov()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TMov", "TMov", "TMov", "tabTMov", "t_tmov", null, "",0);
}

var TMov = new Campo_parQSelecao_TMov;

//------------------------------------------------------------
Campo_parQSelecao_TMov_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TMov_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TMov_Chave", "TMov_Chave", "TMov", TMov, 1, "u", false);
}

var TMov_Chave = new Campo_parQSelecao_TMov_Chave;

//------------------------------------------------------------
Campo_parQSelecao_TMov_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TMov_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TMov_Descritor", "TMov_Descritor", "TMov", TMov, 19, "xxxxxxxxxxxxxxxxxxx", false);
}

var TMov_Descritor = new Campo_parQSelecao_TMov_Descritor;

//------------------------------------------------------------
Campo_parQSelecao_TPgRec.prototype = new Lance_CampoLigado;

function Campo_parQSelecao_TPgRec()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPgRec", "TPgRec", "TPgRec", "tabTPgRec", "t_tpgre", null, "",0);
}

var TPgRec = new Campo_parQSelecao_TPgRec;

//------------------------------------------------------------
Campo_parQSelecao_TPgRec_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TPgRec_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPgRec_Chave", "TPgRec_Chave", "TPgRec", TPgRec, 1, "u", false);
}

var TPgRec_Chave = new Campo_parQSelecao_TPgRec_Chave;

//------------------------------------------------------------
Campo_parQSelecao_TPgRec_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TPgRec_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPgRec_Descritor", "TPgRec_Descritor", "TPgRec", TPgRec, 7, "xxxxxxx", false);
}

var TPgRec_Descritor = new Campo_parQSelecao_TPgRec_Descritor;

//------------------------------------------------------------
Campo_parQSelecao_SubPlano.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_SubPlano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlano", "SubPlano", "SubPlano", "arqSubPlano", "a_subpla", null, "",28);
}

var SubPlano = new Campo_parQSelecao_SubPlano;

//------------------------------------------------------------
Campo_parQSelecao_SubPlano_Plano.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_SubPlano_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlano_Plano", "SubPlano_Plano", "Plano", "arqPlano", "a_plano", SubPlano, "",27);
}

var SubPlano_Plano = new Campo_parQSelecao_SubPlano_Plano;

//------------------------------------------------------------
Campo_parQSelecao_SubPlano_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parQSelecao_SubPlano_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "SubPlano_Plano_CodPlano", "SubPlano_Plano_CodPlano", "CodPlano", SubPlano_Plano, 2, "zz", false,"", "");
}

var SubPlano_Plano_CodPlano = new Campo_parQSelecao_SubPlano_Plano_CodPlano;

//------------------------------------------------------------
Campo_parQSelecao_SubPlano_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parQSelecao_SubPlano_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlano_Plano_Plano", "SubPlano_Plano_Plano", "Plano", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SubPlano_Plano_Plano = new Campo_parQSelecao_SubPlano_Plano_Plano;

//------------------------------------------------------------
Campo_parQSelecao_SubPlano_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_SubPlano_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "SubPlano_Codigo", "SubPlano_Codigo", "Codigo", SubPlano, 6, "##.##.##", true);
}

var SubPlano_Codigo = new Campo_parQSelecao_SubPlano_Codigo;

//------------------------------------------------------------
Campo_parQSelecao_SubPlano_Nome.prototype = new Lance_CampoCadeia;

function Campo_parQSelecao_SubPlano_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlano_Nome", "SubPlano_Nome", "Nome", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SubPlano_Nome = new Campo_parQSelecao_SubPlano_Nome;

//------------------------------------------------------------
Campo_parQSelecao_TData.prototype = new Lance_CampoLigado;

function Campo_parQSelecao_TData()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TData", "TData", "TData", "tabTData", "t_tdata", null, "",0);
}

var TData = new Campo_parQSelecao_TData;

//------------------------------------------------------------
Campo_parQSelecao_TData_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TData_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TData_Chave", "TData_Chave", "TData", TData, 1, "u", false);
}

var TData_Chave = new Campo_parQSelecao_TData_Chave;

//------------------------------------------------------------
Campo_parQSelecao_TData_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TData_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TData_Descritor", "TData_Descritor", "TData", TData, 10, "xxxxxxxxxx", false);
}

var TData_Descritor = new Campo_parQSelecao_TData_Descritor;

//------------------------------------------------------------
Campo_parQSelecao_CCor.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_CCor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "CCor", "CCor", "CCor", "arqCCor", "a_ccor", null, "",20);
}

var CCor = new Campo_parQSelecao_CCor;

//------------------------------------------------------------
Campo_parQSelecao_CCor_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_CCor_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "CCor_Nome", "CCor_Nome", "Nome", CCor, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var CCor_Nome = new Campo_parQSelecao_CCor_Nome;

//------------------------------------------------------------
Campo_parQSelecao_TFCobra.prototype = new Lance_CampoLigado;

function Campo_parQSelecao_TFCobra()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TFCobra", "TFCobra", "TFCobra", "tabTFCobra", "t_tfcobr", null, "",0);
}

var TFCobra = new Campo_parQSelecao_TFCobra;

//------------------------------------------------------------
Campo_parQSelecao_TFCobra_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TFCobra_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFCobra_Chave", "TFCobra_Chave", "TFCobra", TFCobra, 1, "u", false);
}

var TFCobra_Chave = new Campo_parQSelecao_TFCobra_Chave;

//------------------------------------------------------------
Campo_parQSelecao_TFCobra_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TFCobra_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFCobra_Descritor", "TFCobra_Descritor", "TFCobra", TFCobra, 10, "xxxxxxxxxx", false);
}

var TFCobra_Descritor = new Campo_parQSelecao_TFCobra_Descritor;

//------------------------------------------------------------
Campo_parQSelecao_TFPagto.prototype = new Lance_CampoLigado;

function Campo_parQSelecao_TFPagto()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TFPagto", "TFPagto", "TFPagto", "tabTFPagto", "t_tfpagt", null, "",0);
}

var TFPagto = new Campo_parQSelecao_TFPagto;

//------------------------------------------------------------
Campo_parQSelecao_TFPagto_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TFPagto_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFPagto_Chave", "TFPagto_Chave", "TFPagto", TFPagto, 1, "u", false);
}

var TFPagto_Chave = new Campo_parQSelecao_TFPagto_Chave;

//------------------------------------------------------------
Campo_parQSelecao_TFPagto_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TFPagto_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFPagto_Descritor", "TFPagto_Descritor", "TFPagto", TFPagto, 8, "xxxxxxxx", false);
}

var TFPagto_Descritor = new Campo_parQSelecao_TFPagto_Descritor;

//------------------------------------------------------------
Campo_parQSelecao_Consulta.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_Consulta()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Consulta", "Consulta", "Consulta", "arqConsulta", "a_consul", null, "",39);
}

var Consulta = new Campo_parQSelecao_Consulta;

//------------------------------------------------------------
Campo_parQSelecao_Consulta_Num.prototype = new Lance_CampoNumericoLigado;

function Campo_parQSelecao_Consulta_Num()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Consulta_Num", "Consulta_Num", "Num", Consulta, 6, "###.##z", true,"", "");
}

var Consulta_Num = new Campo_parQSelecao_Consulta_Num;

//------------------------------------------------------------
Campo_parQSelecao_TStAgRet.prototype = new Lance_CampoLigado;

function Campo_parQSelecao_TStAgRet()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TStAgRet", "TStAgRet", "TStAgRet", "tabTStAgRet", "t_tstagr", null, "",0);
}

var TStAgRet = new Campo_parQSelecao_TStAgRet;

//------------------------------------------------------------
Campo_parQSelecao_TStAgRet_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TStAgRet_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TStAgRet_Chave", "TStAgRet_Chave", "TStAgRet", TStAgRet, 1, "u", false);
}

var TStAgRet_Chave = new Campo_parQSelecao_TStAgRet_Chave;

//------------------------------------------------------------
Campo_parQSelecao_TStAgRet_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TStAgRet_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TStAgRet_Descritor", "TStAgRet_Descritor", "TStAgRet", TStAgRet, 11, "xxxxxxxxxxx", false);
}

var TStAgRet_Descritor = new Campo_parQSelecao_TStAgRet_Descritor;

//------------------------------------------------------------
Campo_parQSelecao_Medicamen.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_Medicamen()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Medicamen", "Medicamen", "Medicamen", "arqMedicamen", "a_medica", null, "",52);
}

var Medicamen = new Campo_parQSelecao_Medicamen;

//------------------------------------------------------------
Campo_parQSelecao_Medicamen_Medicamen.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_Medicamen_Medicamen()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Medicamen_Medicamen", "Medicamen_Medicamen", "Medicamen", Medicamen, 50, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Medicamen_Medicamen = new Campo_parQSelecao_Medicamen_Medicamen;

//------------------------------------------------------------
Campo_parQSelecao_Lote.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_Lote()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Lote", "Lote", "Lote", "arqLote", "a_lote", null, "",55);
}

var Lote = new Campo_parQSelecao_Lote;

//------------------------------------------------------------
Campo_parQSelecao_Lote_Medicamen.prototype = new Lance_CampoHidden;

function Campo_parQSelecao_Lote_Medicamen()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Lote_Medicamen", "Lote_Medicamen", "Medicamen", "arqMedicamen", "a_medica", Lote, "",52);
}

var Lote_Medicamen = new Campo_parQSelecao_Lote_Medicamen;

//------------------------------------------------------------
Campo_parQSelecao_Lote_Medicamen_Medicamen.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_Lote_Medicamen_Medicamen()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Lote_Medicamen_Medicamen", "Lote_Medicamen_Medicamen", "Medicamen", Lote_Medicamen, 50, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Lote_Medicamen_Medicamen = new Campo_parQSelecao_Lote_Medicamen_Medicamen;

//------------------------------------------------------------
Campo_parQSelecao_Lote_Lote.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_Lote_Lote()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Lote_Lote", "Lote_Lote", "Lote", Lote, 15, "uuuuuuuuuuuuuuu", false);
}

var Lote_Lote = new Campo_parQSelecao_Lote_Lote;

//------------------------------------------------------------
Campo_parQSelecao_TCMedica.prototype = new Lance_CampoLigado;

function Campo_parQSelecao_TCMedica()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TCMedica", "TCMedica", "TCMedica", "tabTCMedica", "t_tcmedi", null, "",0);
}

var TCMedica = new Campo_parQSelecao_TCMedica;

//------------------------------------------------------------
Campo_parQSelecao_TCMedica_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TCMedica_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TCMedica_Chave", "TCMedica_Chave", "TCMedica", TCMedica, 1, "u", false);
}

var TCMedica_Chave = new Campo_parQSelecao_TCMedica_Chave;

//------------------------------------------------------------
Campo_parQSelecao_TCMedica_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQSelecao_TCMedica_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TCMedica_Descritor", "TCMedica_Descritor", "TCMedica", TCMedica, 34, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var TCMedica_Descritor = new Campo_parQSelecao_TCMedica_Descritor;

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parQSelecao_Usuario.prototype.FiltroPai = function()
{
		if( ultimaLigOpcaoEm( 190 ) )
			return( "" + vijCallCenter() + "" );
			return( "A.Grupo is not null" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_Usuario_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Usuario.Obrigatorio( p_comMsg ) );
}

Usuario_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parQSelecao_Medico.prototype.FiltroPai = function()
{
			return( "" + vijMedico() + "" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_Medico_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Medico.Obrigatorio( p_comMsg ) );
}

Medico_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parQSelecao_Assessor.prototype.FiltroPai = function()
{
			return( "" + vijAssessor() + "" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_Assessor_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Assessor.Obrigatorio( p_comMsg ) );
}

Assessor_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parQSelecao_CallCenter.prototype.FiltroPai = function()
{
			return( "" + vijCallCenter() + "" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_CallCenter_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( CallCenter.Obrigatorio( p_comMsg ) );
}

CallCenter_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
StatusLog_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
StatusLog_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_Cliente_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cliente.Obrigatorio( p_comMsg ) );
}

Cliente_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_Cliente_NumCelular.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cliente.Obrigatorio( p_comMsg ) );
}

Cliente_NumCelular.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_Fornecedor_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Fornecedor.Obrigatorio( p_comMsg ) );
}

Fornecedor_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQSelecao_EmailRemet.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O email remetente é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_EmailRemet_Email.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( EmailRemet.Obrigatorio( p_comMsg ) );
}

EmailRemet_Email.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parQSelecao_AcaoEmail.prototype.FiltroPai = function()
{
			return( "PadraoAcao is null" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQSelecao_AcaoEmail.prototype.Obrigatorio = function( p_comMsg )
{
		if( ultimaLigOpcaoEm( 53 ) )
	{
		if( p_comMsg ) alert( "A ação de email é obrigatória" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_AcaoEmail_Titulo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( AcaoEmail.Obrigatorio( p_comMsg ) );
}

AcaoEmail_Titulo.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_AcaoEmail_Versao.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( AcaoEmail.Obrigatorio( p_comMsg ) );
}

AcaoEmail_Versao.TipoCampo |= CAMPO_CHAVE_PAI;
TSimNao_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TSimNao_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQSelecao_Cadeia100.prototype.Obrigatorio = function( p_comMsg )
{
		if( ultimaLigOpcaoEm( 19 ) )
	{
		if( p_comMsg ) alert( "O destinatário é obrigatório" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQSelecao_DataIni.prototype.Obrigatorio = function( p_comMsg )
{
		if( ultimaLigOpcaoEm( 53,155,170,175,203,223,230,233 ) )
	{
		if( p_comMsg ) alert( "A data é obrigatória" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_parQSelecao_DataFim.prototype.TemErro = function()
{
		if( tem(this) && ( quantosDias( DataFim, DataIni ) < 0 ) )
	{
		alert( "A data final precisa ser posterior a inicial" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parQSelecao_DataFim.prototype.Existencia = function()
{
	return( tem( DataIni ) );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_parQSelecao_DataFim1.prototype.TemErro = function()
{
		if( tem(this) && ( quantosDias( DataFim1, DataIni1 ) < 0 ) )
	{
		alert( "A data final precisa ser posterior a inicial" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parQSelecao_DataFim1.prototype.Existencia = function()
{
	return( tem( DataIni1 ) );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQSelecao_MesIni.prototype.Obrigatorio = function( p_comMsg )
{
		if( ultimaLigOpcaoEm( 162,189,190 ) )
	{
		if( p_comMsg ) alert( "O mês é obrigatório" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_parQSelecao_MesFim.prototype.TemErro = function()
{
		if( tem(this) && ( quantosDias( MesFim, MesIni ) < 0 ) )
	{
		alert( "O mês final deve ser posterior ao inicial" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parQSelecao_MesFim.prototype.Existencia = function()
{
	return( tem( MesIni ) );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQSelecao_HoraIni.prototype.Obrigatorio = function( p_comMsg )
{
		if( ultimaLigOpcaoEm( 53,137 ) )
	{
		if( p_comMsg ) alert( "A hora é obrigatória" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_parQSelecao_HoraIni.prototype.TemErro = function()
{
		if( ultimaLigOpcaoEm(53) && quantosDias(DataIni,HOJE)==0 && HoraIni+':00'< incHora(agora(),0,10,0) && !GrupoAtualEm() )
	{
		alert( "Hora inválida" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_parQSelecao_HoraFim.prototype.TemErro = function()
{
		if( tem(this) && ( HoraFim < HoraIni ) )
	{
		alert( "A hora final deve ser igual ou superior a inicial" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parQSelecao_HoraFim.prototype.Existencia = function()
{
	return( tem( HoraIni ) );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_parQSelecao_Gran6Fim.prototype.TemErro = function()
{
		if( tem(this) && ( Gran6Fim < Gran6 ) )
	{
		alert( "Valor inválido" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parQSelecao_Gran6Fim.prototype.Existencia = function()
{
	return( tem( Gran6 ) );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_parQSelecao_Gran9Fim.prototype.TemErro = function()
{
		if( tem(this) && ( Gran9Fim < Gran9 ) )
	{
		alert( "Valor inválido" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parQSelecao_Gran9Fim.prototype.Existencia = function()
{
	return( tem( Gran9 ) );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQSelecao_Gran13.prototype.Obrigatorio = function( p_comMsg )
{
		if( ultimaLigOpcaoEm( 138 ) )
	{
		if( p_comMsg ) alert( "O número do prontuário é obrigatório" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_parQSelecao_Real6Fim.prototype.TemErro = function()
{
		if( tem(this) && ( Real6Fim < Real6 ) )
	{
		alert( "Valor inválido" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parQSelecao_Real6Fim.prototype.Existencia = function()
{
	return( tem( Real6 ) );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQSelecao_Senha1.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A senha é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_parQSelecao_Senha1.prototype.TemErro = function()
{
		if( tem(this) && ( verificaSenha1( Senha1 ) ) )
	{
		alert( "Senha fraca!" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQSelecao_Senha2.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A confirmação da senha é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_parQSelecao_Senha2.prototype.TemErro = function()
{
		if( tem(this) && ( Senha1.toString() != Senha2.toString() ) )
	{
		alert( "A senha foi redigitada de forma diferente" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parQSelecao_Clinica.prototype.FiltroPai = function()
{
		if( !g_podeTodasClinica )
			return( "A.idPrimario in ( " + g_vetIdClinica + " )" );
		return( "" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parQSelecao_Clinica.prototype.Sugeriu = function()
{
{
		if( g_temUmaClinica )
	return( this.AtribuiuSemCritica( g_minhaClinica ) );
}
		return( true );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_parQSelecao_Clinica.prototype.PodeAlterar = function()
{
		if( g_podeTodasClinica || g_temMaisDeUmClinica )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQSelecao_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
		if( ultimaLigOpcaoEm( 189 ) )
	{
		if( p_comMsg ) alert( "A clínica é obrigatória" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
TStCon_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TStCon_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
TMov_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TMov_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
TPgRec_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPgRec_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_SubPlano_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlano.Obrigatorio( p_comMsg ) );
}

SubPlano_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_SubPlano_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlano.Obrigatorio( p_comMsg ) );
}

SubPlano_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlano_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_SubPlano_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlano.Obrigatorio( p_comMsg ) );
}

SubPlano_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlano_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQSelecao_TData.prototype.Obrigatorio = function( p_comMsg )
{
		if( ultimaLigOpcaoEm( 166 ) )
	{
		if( p_comMsg ) alert( "O tipo da data é obrigatório" );
		return( true );
	}
	return( false );
}

TData_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TData_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_CCor_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( CCor.Obrigatorio( p_comMsg ) );
}

CCor_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
TFCobra_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TFCobra_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
TFPagto_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TFPagto_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parQSelecao_Consulta.prototype.FiltroPai = function()
{
		if( g_temMaisDeUmClinica )
			return( "A.Clinica in( " + + g_vetIdClinica + " )" );
		return( "" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_Consulta_Num.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Consulta.Obrigatorio( p_comMsg ) );
}

Consulta_Num.TipoCampo |= CAMPO_CHAVE_PAI;
TStAgRet_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TStAgRet_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_Medicamen_Medicamen.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Medicamen.Obrigatorio( p_comMsg ) );
}

Medicamen_Medicamen.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_Lote_Medicamen.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Lote.Obrigatorio( p_comMsg ) );
}

Lote_Medicamen.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_Lote_Medicamen_Medicamen.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Lote.Obrigatorio( p_comMsg ) );
}

Lote_Medicamen_Medicamen.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_Lote_Lote.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Lote.Obrigatorio( p_comMsg ) );
}

Lote_Lote.TipoCampo |= CAMPO_CHAVE_PAI;
TCMedica_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TCMedica_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_Usuario.prototype.ExistenciaEspecial = function()
{
	return( ( !Usuario_Usuario.Obrigatorio( false ) || tem(Usuario_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_Medico.prototype.ExistenciaEspecial = function()
{
	return( ( !Medico_Usuario.Obrigatorio( false ) || tem(Medico_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_Assessor.prototype.ExistenciaEspecial = function()
{
	return( ( !Assessor_Usuario.Obrigatorio( false ) || tem(Assessor_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_CallCenter.prototype.ExistenciaEspecial = function()
{
	return( ( !CallCenter_Usuario.Obrigatorio( false ) || tem(CallCenter_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_Cliente.prototype.ExistenciaEspecial = function()
{
	return( ( !Cliente_Nome.Obrigatorio( false ) || tem(Cliente_Nome) ) && ( !Cliente_NumCelular.Obrigatorio( false ) || tem(Cliente_NumCelular) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_Fornecedor.prototype.ExistenciaEspecial = function()
{
	return( ( !Fornecedor_Nome.Obrigatorio( false ) || tem(Fornecedor_Nome) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_EmailRemet.prototype.ExistenciaEspecial = function()
{
	return( ( !EmailRemet_Email.Obrigatorio( false ) || tem(EmailRemet_Email) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_AcaoEmail.prototype.ExistenciaEspecial = function()
{
	return( ( !AcaoEmail_Titulo.Obrigatorio( false ) || tem(AcaoEmail_Titulo) ) && ( !AcaoEmail_Versao.Obrigatorio( false ) || tem(AcaoEmail_Versao) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_SubPlano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano_Plano.Obrigatorio( false ) || tem(SubPlano_Plano) ) && ( !SubPlano_Codigo.Obrigatorio( false ) || tem(SubPlano_Codigo) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_SubPlano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano_Plano_CodPlano.Obrigatorio( false ) || tem(SubPlano_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_SubPlano_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano_Plano.Obrigatorio( false ) || tem(SubPlano_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_SubPlano_Nome.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano.Obrigatorio( false ) || tem(SubPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_CCor.prototype.ExistenciaEspecial = function()
{
	return( ( !CCor_Nome.Obrigatorio( false ) || tem(CCor_Nome) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_Consulta.prototype.ExistenciaEspecial = function()
{
	return( ( !Consulta_Num.Obrigatorio( false ) || tem(Consulta_Num) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_Medicamen.prototype.ExistenciaEspecial = function()
{
	return( ( !Medicamen_Medicamen.Obrigatorio( false ) || tem(Medicamen_Medicamen) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_Lote.prototype.ExistenciaEspecial = function()
{
	return( ( !Lote_Medicamen.Obrigatorio( false ) || tem(Lote_Medicamen) ) && ( !Lote_Lote.Obrigatorio( false ) || tem(Lote_Lote) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQSelecao_Lote_Medicamen.prototype.ExistenciaEspecial = function()
{
	return( ( !Lote_Medicamen_Medicamen.Obrigatorio( false ) || tem(Lote_Medicamen_Medicamen) ) );
}

function IniciarDependencias_parQSelecao()
{
Usuario_Usuario.ExistenciasDependentes= [ Usuario ];
Medico_Usuario.ExistenciasDependentes= [ Medico ];
Assessor_Usuario.ExistenciasDependentes= [ Assessor ];
CallCenter_Usuario.ExistenciasDependentes= [ CallCenter ];
Cliente_Nome.ExistenciasDependentes= [ Cliente ];
Cliente_NumCelular.ExistenciasDependentes= [ Cliente ];
Fornecedor_Nome.ExistenciasDependentes= [ Fornecedor ];
EmailRemet_Email.ExistenciasDependentes= [ EmailRemet ];
AcaoEmail_Titulo.ExistenciasDependentes= [ AcaoEmail ];
AcaoEmail_Versao.ExistenciasDependentes= [ AcaoEmail ];
DataIni.ExistenciasDependentes= [ DataFim ];
DataIni1.ExistenciasDependentes= [ DataFim1 ];
MesIni.ExistenciasDependentes= [ MesFim ];
HoraIni.ExistenciasDependentes= [ HoraFim ];
Gran6.ExistenciasDependentes= [ Gran6Fim ];
Gran9.ExistenciasDependentes= [ Gran9Fim ];
Real6.ExistenciasDependentes= [ Real6Fim ];
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
SubPlano_Plano.ExistenciasDependentes= [ SubPlano,SubPlano_Plano_Plano ];
SubPlano_Plano_CodPlano.ExistenciasDependentes= [ SubPlano_Plano ];
SubPlano_Codigo.ExistenciasDependentes= [ SubPlano ];
SubPlano.ExistenciasDependentes= [ SubPlano_Nome ];
CCor_Nome.ExistenciasDependentes= [ CCor ];
Consulta_Num.ExistenciasDependentes= [ Consulta ];
Medicamen_Medicamen.ExistenciasDependentes= [ Medicamen ];
Lote_Medicamen.ExistenciasDependentes= [ Lote ];
Lote_Medicamen_Medicamen.ExistenciasDependentes= [ Lote_Medicamen ];
Lote_Lote.ExistenciasDependentes= [ Lote ];
Usuario_Usuario.ErrosDependentes= [ Usuario ];
Medico_Usuario.ErrosDependentes= [ Medico ];
Assessor_Usuario.ErrosDependentes= [ Assessor ];
CallCenter_Usuario.ErrosDependentes= [ CallCenter ];
Cliente_NumCelular.ErrosDependentes= [ Cliente ];
Fornecedor_Nome.ErrosDependentes= [ Fornecedor ];
EmailRemet_Email.ErrosDependentes= [ EmailRemet ];
AcaoEmail_Versao.ErrosDependentes= [ AcaoEmail ];
DataIni.ErrosDependentes= [ DataFim,HoraIni ];
DataIni1.ErrosDependentes= [ DataFim1 ];
MesIni.ErrosDependentes= [ MesFim ];
HoraIni.ErrosDependentes= [ HoraFim ];
Gran6.ErrosDependentes= [ Gran6Fim ];
Gran9.ErrosDependentes= [ Gran9Fim ];
Real6.ErrosDependentes= [ Real6Fim ];
Senha1.ErrosDependentes= [ Senha2 ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
SubPlano_Plano_CodPlano.ErrosDependentes= [ SubPlano_Plano ];
SubPlano_Codigo.ErrosDependentes= [ SubPlano ];
CCor_Nome.ErrosDependentes= [ CCor ];
Consulta_Num.ErrosDependentes= [ Consulta ];
Medicamen_Medicamen.ErrosDependentes= [ Medicamen ];
Lote_Medicamen_Medicamen.ErrosDependentes= [ Lote_Medicamen ];
Lote_Lote.ErrosDependentes= [ Lote ];
SubPlano_Plano.DescritoresDependentes= [ SubPlano_Plano_Plano ];
SubPlano.DescritoresDependentes= [ SubPlano_Nome ];
Usuario.CamposChave= [ Usuario_Usuario ];
Medico.CamposChave= [ Medico_Usuario ];
Assessor.CamposChave= [ Assessor_Usuario ];
CallCenter.CamposChave= [ CallCenter_Usuario ];
Cliente.CamposChave= [ Cliente_Nome,Cliente_NumCelular ];
Fornecedor.CamposChave= [ Fornecedor_Nome ];
EmailRemet.CamposChave= [ EmailRemet_Email ];
AcaoEmail.CamposChave= [ AcaoEmail_Titulo,AcaoEmail_Versao ];
Clinica.CamposChave= [ Clinica_Clinica ];
SubPlano.CamposChave= [ SubPlano_Plano,SubPlano_Codigo ];
SubPlano_Plano.CamposChave= [ SubPlano_Plano_CodPlano ];
CCor.CamposChave= [ CCor_Nome ];
Consulta.CamposChave= [ Consulta_Num ];
Medicamen.CamposChave= [ Medicamen_Medicamen ];
Lote.CamposChave= [ Lote_Medicamen,Lote_Lote ];
Lote_Medicamen.CamposChave= [ Lote_Medicamen_Medicamen ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "parQSelecao";
//------------------------------------------------------------
function ListaDeCampos_parQSelecao( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Usuario, Usuario_Usuario, Medico, Medico_Usuario, Assessor, Assessor_Usuario, CallCenter, CallCenter_Usuario, StatusLog, StatusLog_Chave, StatusLog_Descritor, Cliente, Cliente_Nome, Cliente_NumCelular, Fornecedor, Fornecedor_Nome, EmailRemet, EmailRemet_Email, AcaoEmail, AcaoEmail_Titulo, AcaoEmail_Versao, TSimNao, TSimNao_Chave, TSimNao_Descritor, Cadeia30, Cadeia100, Logico1, DataIni, DataFim, DataIni1, DataFim1, MesIni, MesFim, HoraIni, HoraFim, Gran6, Gran6Fim, Gran9, Gran9Fim, Gran13, Real6, Real6Fim, Senha1, Senha2, Clinica, Clinica_Clinica, TStCon, TStCon_Chave, TStCon_Descritor, TMov, TMov_Chave, TMov_Descritor, TPgRec, TPgRec_Chave, TPgRec_Descritor, SubPlano, SubPlano_Plano, SubPlano_Plano_CodPlano, SubPlano_Plano_Plano, SubPlano_Codigo, SubPlano_Nome, TData, TData_Chave, TData_Descritor, CCor, CCor_Nome, TFCobra, TFCobra_Chave, TFCobra_Descritor, TFPagto, TFPagto_Chave, TFPagto_Descritor, Consulta, Consulta_Num, TStAgRet, TStAgRet_Chave, TStAgRet_Descritor, Medicamen, Medicamen_Medicamen, Lote, Lote_Medicamen, Lote_Medicamen_Medicamen, Lote_Lote, TCMedica, TCMedica_Chave, TCMedica_Descritor ]	);
	IniciarDependencias_parQSelecao();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_parQSelecao( '' );
g_idOperacao = 6;
parent.navegacao.MenuPrincQtdOpcoes=1;
parent.navegacao.MenuPrincPodeSo1=1;
