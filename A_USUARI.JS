/*=========================================================================
  a_usuari - Usuario
=========================================================================*/

//------------------------------------------------------------
Campo_arqUsuario_Usuario.prototype = new Lance_CampoCadeia;

function Campo_arqUsuario_Usuario()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Usuario", "Usuario", "Usuario", 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Usuario = new Campo_arqUsuario_Usuario;

//------------------------------------------------------------
Campo_arqUsuario_Nome.prototype = new Lance_CampoCadeia;

function Campo_arqUsuario_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Nome", "Nome", "Nome", 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Nome = new Campo_arqUsuario_Nome;

//------------------------------------------------------------
Campo_arqUsuario_Senha.prototype = new Lance_CampoCadeia;

function Campo_arqUsuario_Senha()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Senha", "Senha", "Senha", 20, "????????????????????", false);
}

var Senha = new Campo_arqUsuario_Senha;

//------------------------------------------------------------
Campo_arqUsuario_Grupo.prototype = new Lance_CampoHidden;

function Campo_arqUsuario_Grupo()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Grupo", "Grupo", "Grupo", "arqGrupo", "a_grupo", null, "",4);
}

var Grupo = new Campo_arqUsuario_Grupo;

//------------------------------------------------------------
Campo_arqUsuario_Grupo_Grupo.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqUsuario_Grupo_Grupo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Grupo_Grupo", "Grupo_Grupo", "Grupo", Grupo, 50, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Grupo_Grupo = new Campo_arqUsuario_Grupo_Grupo;

//------------------------------------------------------------
Campo_arqUsuario_Versao.prototype = new Lance_CampoCadeia;

function Campo_arqUsuario_Versao()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Versao", "Versao", "Versao", 10, "xxxxxxxxxx", false);
}

var Versao = new Campo_arqUsuario_Versao;

//------------------------------------------------------------
Campo_arqUsuario_Email.prototype = new Lance_CampoCadeia;

function Campo_arqUsuario_Email()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Email", "Email", "Email", 70, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Email = new Campo_arqUsuario_Email;

//------------------------------------------------------------
Campo_arqUsuario_CRM.prototype = new Lance_CampoCadeia;

function Campo_arqUsuario_CRM()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "CRM", "CRM", "CRM", 10, "uuuuuuuuuu", false);
}

var CRM = new Campo_arqUsuario_CRM;

//------------------------------------------------------------
Campo_arqUsuario_PodeAgenda.prototype = new Lance_CampoLogico;

function Campo_arqUsuario_PodeAgenda()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "PodeAgenda", "PodeAgenda", "PodeAgenda");
}

var PodeAgenda = new Campo_arqUsuario_PodeAgenda;

//------------------------------------------------------------
Campo_arqUsuario_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqUsuario_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqUsuario_Ativo;

//------------------------------------------------------------
Campo_arqUsuario_Nascimento.prototype = new Lance_CampoData;

function Campo_arqUsuario_Nascimento()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Nascimento", "Nascimento", "Nascimento", 8, "dd/mm/aaaa", true);
}

var Nascimento = new Campo_arqUsuario_Nascimento;

//------------------------------------------------------------
Campo_arqUsuario_Foto.prototype = new Lance_CampoImagem;

function Campo_arqUsuario_Foto()
{
	this.superClass = Lance_CampoImagem;
	this.superClass( "Foto", "Foto", "Foto");
}

var Foto = new Campo_arqUsuario_Foto;

//------------------------------------------------------------
Campo_arqUsuario_EmailAces.prototype = new Lance_CampoLogico;

function Campo_arqUsuario_EmailAces()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "EmailAces", "EmailAces", "EmailAces");
}

var EmailAces = new Campo_arqUsuario_EmailAces;

//------------------------------------------------------------
Campo_arqUsuario_EmailAcesS.prototype = new Lance_CampoLogico;

function Campo_arqUsuario_EmailAcesS()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "EmailAcesS", "EmailAcesS", "EmailAcesS");
}

var EmailAcesS = new Campo_arqUsuario_EmailAcesS;

//------------------------------------------------------------
Campo_arqUsuario_EmailFinan.prototype = new Lance_CampoLogico;

function Campo_arqUsuario_EmailFinan()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "EmailFinan", "EmailFinan", "EmailFinan");
}

var EmailFinan = new Campo_arqUsuario_EmailFinan;

//------------------------------------------------------------
Campo_arqUsuario_EmCMediSep.prototype = new Lance_CampoLogico;

function Campo_arqUsuario_EmCMediSep()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "EmCMediSep", "EmCMediSep", "EmCMediSep");
}

var EmCMediSep = new Campo_arqUsuario_EmCMediSep;

//------------------------------------------------------------
Campo_arqUsuario_Assinatura.prototype = new Lance_CampoImagem;

function Campo_arqUsuario_Assinatura()
{
	this.superClass = Lance_CampoImagem;
	this.superClass( "Assinatura", "Assinatura", "Assinatura");
}

var Assinatura = new Campo_arqUsuario_Assinatura;

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqUsuario_Usuario.prototype.PodeAlterar = function()
{
		if( PodeExecutarOperacao(2) || g_usuarioAtual == g_idRegAtual )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqUsuario_Usuario.prototype.Cabecalho = function()
{
		return( "Usu�rio" );
}

Usuario.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqUsuario_Nome.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O nome do usu�rio � obrigat�rio" );
		return( true );
	}
}

//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqUsuario_Senha.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "Senha � obrigat�ria" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condi��o de erro do campo
//-------------------------------------------------------------
Campo_arqUsuario_Senha.prototype.TemErro = function()
{
		if( tem(this) && ( !SenhaOk( Senha, Usuario ) ) )
	{
		alert( "Senha fraca!" );
		return( true );
	}
	return( Lance_CampoImagem.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqUsuario_Grupo.prototype.PodeAlterar = function()
{
		if( PodeExecutarOperacao(2) )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqUsuario_Grupo.prototype.Obrigatorio = function( p_comMsg )
{
		if( !GrupoAtualEm() )
	{
		if( p_comMsg ) alert( "O grupo de acesso � obrigat�rio" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqUsuario_Grupo_Grupo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Grupo.Obrigatorio( p_comMsg ) );
}

Grupo_Grupo.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_arqUsuario_Versao.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( g_versaoAtual ) );
}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqUsuario_Versao.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condi��o de erro do campo
//-------------------------------------------------------------
Campo_arqUsuario_Email.prototype.TemErro = function()
{
		if( tem(this) && ( !EmailOK( Email ) ) )
	{
		alert( "Email inv�lido" );
		return( true );
	}
	return( Lance_CampoImagem.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_arqUsuario_PodeAgenda.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqUsuario_PodeAgenda.prototype.Cabecalho = function()
{
		return( "Acessa Portal<br>Agenda?" );
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_arqUsuario_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqUsuario_Ativo.prototype.PodeAlterar = function()
{
		if( PodeExecutarOperacao(2) )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqUsuario_Ativo.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "Ativo? � obrigat�rio" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqUsuario_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_arqUsuario_EmailAces.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqUsuario_EmailAces.prototype.PodeAlterar = function()
{
		if( PodeExecutarOperacao(2) || g_usuarioAtual == g_idRegAtual )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_arqUsuario_EmailAcesS.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqUsuario_EmailAcesS.prototype.PodeAlterar = function()
{
		if( PodeExecutarOperacao(2) || g_usuarioAtual == g_idRegAtual )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_arqUsuario_EmailFinan.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqUsuario_EmailFinan.prototype.PodeAlterar = function()
{
		if( PodeExecutarOperacao(2) || g_usuarioAtual == g_idRegAtual )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_arqUsuario_EmCMediSep.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqUsuario_EmCMediSep.prototype.PodeAlterar = function()
{
		if( PodeExecutarOperacao(2) || g_usuarioAtual == g_idRegAtual )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_arqUsuario_Grupo.prototype.ExistenciaEspecial = function()
{
	return( ( !Grupo_Grupo.Obrigatorio( false ) || tem(Grupo_Grupo) ) );
}

function IniciarDependencias_arqUsuario()
{
Grupo_Grupo.ExistenciasDependentes= [ Grupo ];
Usuario.ErrosDependentes= [ Senha ];
Grupo_Grupo.ErrosDependentes= [ Grupo ];
Grupo.CamposChave= [ Grupo_Grupo ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqUsuario";
//------------------------------------------------------------
function ListaDeCampos_arqUsuario( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Usuario, Nome, Senha, Grupo, Grupo_Grupo, Versao, Email, CRM, PodeAgenda, Ativo, Nascimento, Foto, EmailAces, EmailAcesS, EmailFinan, EmCMediSep, Assinatura ]	);
	IniciarDependencias_arqUsuario();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqUsuario( '' );
g_idOperacao = 5;

if( parent.navegacao ) {
var Menu_1 = [ 1,"Consultas","","u",122,"","",1,"","6", "", "", "", "", "", "", "", "", "", 3, 13,[],[39,39,39] ];
var Menu_1_1 = [ 1,"Call Center","","C",173,"","",1,"","1","a_consul","arqConsulta","Folhear","CallCenter","?","","", "","", 0,11,[],[39]];
var Menu_1_2 = [ 1,"M�dico","","M",121,"","",1,"","1","a_consul","arqConsulta","Folhear","Medico","?","","", "","", 0,11,[],[39]];
var Menu_1_3 = [ 1,"Assessor","","s",118,"","",1,"","1","a_consul","arqConsulta","Folhear","Assessor","?","","", "","", 0,11,[],[39]];
var Menu_2 = [ 1,"Plant�es","","P",244,"","",1,"","6", "", "", "", "", "", "", "", "", "", 2, 13,[],[41,37] ];
var Menu_2_1 = [ 1,"Plant�es","","P",140,"","",1,"","1","a_planta","arqPlantao","Folhear","Usuario","?","","", "","", 0,19,[],[41]];
var Menu_2_2 = [ 1,"Hor�rios Bloqueados","","q",243,"","",1,"","1","a_horabl","arqHoraBloq","Folhear","Medico","?","","", "","", 0,19,[],[37]];
var Menu_3 = [ 1,"Retiradas","","d",245,"","",1,"","6", "", "", "", "", "", "", "", "", "", 1, 13,[],[53] ];
var Menu_3_1 = [ 1,"Ag. Retiradas","","d",202,"","",1,"","1","a_agret","arqAgRet","Folhear","Assessor","?","","", "","", 0,13,[],[53]];
var Menu_4 = [ 1,"Configura��es","","C",252,"","",1,"","6", "", "", "", "", "", "", "", "", "", 2, 13,[],[35,59] ];
var Menu_4_1 = [ 1,"Cl�nicas Permiss�o","","l",105,"","",1,"","1","a_usucli","arqUsuCli","Folhear","Usuario","?","","", "","", 0,26,[],[35]];
var Menu_4_2 = [ 1,"Contas correntes Permiss�o","","n",250,"","",1,"","1","a_usucco","arqUsuCCor","Folhear","Usuario","?","","", "","", 0,26,[],[59]];
var Menu_5 = [ 1,"Avisos","","A",67,"","",cnfConfig["AVISO"] == 1,"","6", "", "", "", "", "", "", "", "", "", 3, 13,[],[14,16,15] ];
var Menu_5_1 = [ 1,"Avisos criados","","A",29,"","",1,"","1","a_avisos","arqAvisos","Folhear","Quem","?","","", "","", 0,14,[],[14]];
var Menu_5_2 = [ 1,"Avisos lidos","","v",33,"","",1,"","1","a_lido","arqLido","Folhear","Usuario","?","","", "","", 0,14,[],[16]];
var Menu_5_3 = [ 1,"Para grupo","","P",35,"","",1,"","1","a_paragr","arqParaGrupo","Folhear","Usuario","?","","", "","", 0,14,[],[15]];
var Menu_6 = [ 1,"Emails enviou","","E",23,"","",cnfConfig["EMAIL"] == 1,"","1","a_logema","arqLogEmail","Folhear","Usuario","?","","", "","", 0,13,[],[12]];
var Menu_7 = [ 1,"Alterar senha","","h",68,"","",1,"","1", "a_qselec", "parQSelecao", "Alterar", "", "", "", "", "5^^^p_usuario_senha^^^^^^^^^^^^^^^^^^", "", 0,13,[68],[]];
var Menu_8 = [ 1,"Backup","","k",287,"","",1,"","1","a_consul","arqConsulta","Folhear","BkpAssess","?","","", "","", 0,13,[],[39]];
parent.navegacao.MenuPrincQtdOpcoes=8;
}
