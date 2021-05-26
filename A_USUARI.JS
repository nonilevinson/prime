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
	this.superClass( "Nome", "Nome", "Nome", 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
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
	this.superClass( "Grupo_Grupo", "Grupo_Grupo", "Grupo", Grupo, 50, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
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
Campo_arqUsuario_Medico.prototype = new Lance_CampoLogico;

function Campo_arqUsuario_Medico()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Medico", "Medico", "Medico");
}

var Medico = new Campo_arqUsuario_Medico;

//------------------------------------------------------------
Campo_arqUsuario_CRM.prototype = new Lance_CampoCadeia;

function Campo_arqUsuario_CRM()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "CRM", "CRM", "CRM", 10, "xxxxxxxxxx", false);
}

var CRM = new Campo_arqUsuario_CRM;

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
	return( Lance_CampoLogico.prototype.TemErro.call( this ) );
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
	return( Lance_CampoLogico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqUsuario_Medico.prototype.Cabecalho = function()
{
		return( "M�dico?" );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia do campo
//-------------------------------------------------------------
Campo_arqUsuario_CRM.prototype.Existencia = function()
{
	return( Medico == 1 );
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
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_arqUsuario_Grupo.prototype.ExistenciaEspecial = function()
{
	return( ( !Grupo_Grupo.Obrigatorio( false ) || tem(Grupo_Grupo) ) );
}

function IniciarDependencias_arqUsuario()
{
Grupo_Grupo.ExistenciasDependentes= [ Grupo ];
Medico.ExistenciasDependentes= [ CRM ];
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

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Usuario, Nome, Senha, Grupo, Grupo_Grupo, Versao, Email, Medico, CRM, Ativo, Nascimento, Foto, EmailAces, EmailAcesS ]	);
	IniciarDependencias_arqUsuario();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqUsuario( '' );
g_idOperacao = 5;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Consultas","","u",122,"","",1,"","6", "", "", "", "", "", "", "", "", "", 4, 18,[],[39,39,39,39] );
var Menu_1_1 = new Array( 1,"Assessor","","s",118,"","",1,"","1","a_consul","arqConsulta","Folhear","Assessor","?","","", "","", 0,9,[],[39]);
var Menu_1_2 = new Array( 1,"Marketing","","k",119,"","",1,"","1","a_consul","arqConsulta","Folhear","Mkt","?","","", "","", 0,9,[],[39]);
var Menu_1_3 = new Array( 1,"Recep��o","","p",120,"","",1,"","1","a_consul","arqConsulta","Folhear","Recepcao","?","","", "","", 0,9,[],[39]);
var Menu_1_4 = new Array( 1,"M�dico","","M",121,"","",1,"","1","a_consul","arqConsulta","Folhear","Medico","?","","", "","", 0,9,[],[39]);
var Menu_2 = new Array( 1,"Hor�rios","","o",123,"","",1,"Medico == 1","1","a_horari","arqHorario","Folhear","Usuario","?","","", "","", 0,18,[],[37]);
var Menu_3 = new Array( 1,"Dura��o","","D",124,"","",1,"Medico == 1","1","a_duraca","arqDuracao","Folhear","Usuario","?","","", "","", 0,18,[],[38]);
var Menu_4 = new Array( 1,"Cl�nicas Permiss�o","","l",105,"","",1,"","1","a_usucli","arqUsuCli","Folhear","Usuario","?","","", "","", 0,18,[],[35]);
var Menu_5 = new Array( 1,"Avisos","","A",67,"","",cnfConfig["AVISO"] == 1,"","6", "", "", "", "", "", "", "", "", "", 3, 18,[],[14,16,15] );
var Menu_5_1 = new Array( 1,"Avisos criados","","A",29,"","",1,"","1","a_avisos","arqAvisos","Folhear","Quem","?","","", "","", 0,14,[],[14]);
var Menu_5_2 = new Array( 1,"Avisos lidos","","v",33,"","",1,"","1","a_lido","arqLido","Folhear","Usuario","?","","", "","", 0,14,[],[16]);
var Menu_5_3 = new Array( 1,"Para grupo","","P",35,"","",1,"","1","a_paragr","arqParaGrupo","Folhear","Usuario","?","","", "","", 0,14,[],[15]);
var Menu_6 = new Array( 1,"Emails enviou","","E",23,"","",cnfConfig["EMAIL"] == 1,"","1","a_logema","arqLogEmail","Folhear","Usuario","?","","", "","", 0,18,[],[12]);
var Menu_7 = new Array( 1,"Alterar senha","","h",68,"","",1,"","1", "a_qselec", "parQSelecao", "Alterar", "", "", "", "", "5^^^p_usuario_senha^^^^^^^^^^^^^^^^^^", "", 0,18,[68],[]);
parent.navegacao.MenuPrincQtdOpcoes=7;
}