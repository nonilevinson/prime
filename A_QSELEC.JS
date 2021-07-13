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
	this.superClass( "Cliente_Nome", "Cliente_Nome", "Nome", Cliente, 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cliente_Nome = new Campo_parQSelecao_Cliente_Nome;

//------------------------------------------------------------
Campo_parQSelecao_Cliente_Prontuario.prototype = new Lance_CampoNumericoLigado;

function Campo_parQSelecao_Cliente_Prontuario()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Cliente_Prontuario", "Cliente_Prontuario", "Prontuario", Cliente, 13, "#.###.###.###.##z", true,"", "");
}

var Cliente_Prontuario = new Campo_parQSelecao_Cliente_Prontuario;

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
Campo_parQSelecao_Cadeia100.prototype = new Lance_CampoCadeia;

function Campo_parQSelecao_Cadeia100()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cadeia100", "Cadeia100", "Cadeia100", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
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
Campo_parQSelecao_Gran13.prototype = new Lance_CampoNumerico;

function Campo_parQSelecao_Gran13()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Gran13", "Gran13", "Gran13", 13, "#.###.###.###.##z", true,"", "");
}

var Gran13 = new Campo_parQSelecao_Gran13;

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
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
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
	this.superClass( "TMov_Descritor", "TMov_Descritor", "TMov", TMov, 14, "xxxxxxxxxxxxxx", false);
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

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parQSelecao_Usuario.prototype.FiltroPai = function()
{
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
			return( "A.Grupo is not null and Medico = 1" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQSelecao_Medico_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Medico.Obrigatorio( p_comMsg ) );
}

Medico_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
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
Campo_parQSelecao_Cliente_Prontuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cliente.Obrigatorio( p_comMsg ) );
}

Cliente_Prontuario.TipoCampo |= CAMPO_CHAVE_PAI;
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
		if( ultimaLigOpcaoEm( 53 ) )
	{
		if( p_comMsg ) alert( "A data é obrigatória" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parQSelecao_DataFim.prototype.Sugeriu = function()
{
{
		if( !tem( DataIni1 ) )
	return( this.AtribuiuSemCritica(  ) );
}
{
		if( quantosDias( DataFim, DataIni ) < 0 )
	return( this.AtribuiuSemCritica( DataIni ) );
}
{
		if( quantosDias( DataFim, DataIni ) > 0 )
	return( this.AtribuiuSemCritica( DataFim ) );
}
		return( true );
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
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parQSelecao_DataFim1.prototype.Sugeriu = function()
{
{
		if( !tem( DataFim1 ) )
	return( this.AtribuiuSemCritica(  ) );
}
{
		if( quantosDias( DataFim1, DataIni1 ) < 0 )
	return( this.AtribuiuSemCritica( DataIni1 ) );
}
{
		if( quantosDias( DataFim1, DataIni1 ) > 0 )
	return( this.AtribuiuSemCritica( DataFim1 ) );
}
		return( true );
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
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parQSelecao_Gran6Fim.prototype.Existencia = function()
{
	return( tem( Gran6 ) );
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
Campo_parQSelecao_Cliente.prototype.ExistenciaEspecial = function()
{
	return( ( !Cliente_Nome.Obrigatorio( false ) || tem(Cliente_Nome) ) && ( !Cliente_Prontuario.Obrigatorio( false ) || tem(Cliente_Prontuario) ) );
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

function IniciarDependencias_parQSelecao()
{
Usuario_Usuario.ExistenciasDependentes= [ Usuario ];
Medico_Usuario.ExistenciasDependentes= [ Medico ];
Cliente_Nome.ExistenciasDependentes= [ Cliente ];
Cliente_Prontuario.ExistenciasDependentes= [ Cliente ];
EmailRemet_Email.ExistenciasDependentes= [ EmailRemet ];
AcaoEmail_Titulo.ExistenciasDependentes= [ AcaoEmail ];
AcaoEmail_Versao.ExistenciasDependentes= [ AcaoEmail ];
DataIni.ExistenciasDependentes= [ DataFim ];
DataIni1.ExistenciasDependentes= [ DataFim1 ];
HoraIni.ExistenciasDependentes= [ HoraFim ];
Gran6.ExistenciasDependentes= [ Gran6Fim ];
Real6.ExistenciasDependentes= [ Real6Fim ];
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Usuario_Usuario.ErrosDependentes= [ Usuario ];
Medico_Usuario.ErrosDependentes= [ Medico ];
Cliente_Prontuario.ErrosDependentes= [ Cliente ];
EmailRemet_Email.ErrosDependentes= [ EmailRemet ];
AcaoEmail_Versao.ErrosDependentes= [ AcaoEmail ];
DataIni.ErrosDependentes= [ DataFim,HoraIni ];
DataIni1.ErrosDependentes= [ DataFim1 ];
HoraIni.ErrosDependentes= [ HoraFim ];
Senha1.ErrosDependentes= [ Senha2 ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Usuario.CamposChave= [ Usuario_Usuario ];
Medico.CamposChave= [ Medico_Usuario ];
Cliente.CamposChave= [ Cliente_Nome,Cliente_Prontuario ];
EmailRemet.CamposChave= [ EmailRemet_Email ];
AcaoEmail.CamposChave= [ AcaoEmail_Titulo,AcaoEmail_Versao ];
Clinica.CamposChave= [ Clinica_Clinica ];
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

		[ Usuario, Usuario_Usuario, Medico, Medico_Usuario, StatusLog, StatusLog_Chave, StatusLog_Descritor, Cliente, Cliente_Nome, Cliente_Prontuario, EmailRemet, EmailRemet_Email, AcaoEmail, AcaoEmail_Titulo, AcaoEmail_Versao, TSimNao, TSimNao_Chave, TSimNao_Descritor, Cadeia100, Logico1, DataIni, DataFim, DataIni1, DataFim1, HoraIni, HoraFim, Gran6, Gran6Fim, Real6, Real6Fim, Gran13, Senha1, Senha2, Clinica, Clinica_Clinica, TStCon, TStCon_Chave, TStCon_Descritor, TMov, TMov_Chave, TMov_Descritor, TPgRec, TPgRec_Chave, TPgRec_Descritor ]	);
	IniciarDependencias_parQSelecao();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_parQSelecao( '' );
g_idOperacao = 6;
parent.navegacao.MenuPrincQtdOpcoes=1;
parent.navegacao.MenuPrincPodeSo1=1;
