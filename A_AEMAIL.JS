/*=========================================================================
  a_aemail - AcaoEmail
=========================================================================*/

//------------------------------------------------------------
Campo_arqAcaoEmail_Titulo.prototype = new Lance_CampoCadeia;

function Campo_arqAcaoEmail_Titulo()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Titulo", "Titulo", "Título", 100, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Titulo = new Campo_arqAcaoEmail_Titulo;

//------------------------------------------------------------
Campo_arqAcaoEmail_Versao.prototype = new Lance_CampoCadeia;

function Campo_arqAcaoEmail_Versao()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Versao", "Versao", "Versão", 20, "xxxxxxxxxxxxxxxxxxxx", false);
}

var Versao = new Campo_arqAcaoEmail_Versao;

//------------------------------------------------------------
Campo_arqAcaoEmail_TipoAcao.prototype = new Lance_CampoLigado;

function Campo_arqAcaoEmail_TipoAcao()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TipoAcao", "TipoAcao", "TipoAcao", "tabTipoAcao", "t_tipoac", null, "",0);
}

var TipoAcao = new Campo_arqAcaoEmail_TipoAcao;

//------------------------------------------------------------
Campo_arqAcaoEmail_TipoAcao_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqAcaoEmail_TipoAcao_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TipoAcao_Chave", "TipoAcao_Chave", "TipoAcao", TipoAcao, 1, "u", false);
}

var TipoAcao_Chave = new Campo_arqAcaoEmail_TipoAcao_Chave;

//------------------------------------------------------------
Campo_arqAcaoEmail_TipoAcao_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqAcaoEmail_TipoAcao_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TipoAcao_Descritor", "TipoAcao_Descritor", "TipoAcao", TipoAcao, 9, "xxxxxxxxx", false);
}

var TipoAcao_Descritor = new Campo_arqAcaoEmail_TipoAcao_Descritor;

//------------------------------------------------------------
Campo_arqAcaoEmail_Template.prototype = new Lance_CampoHidden;

function Campo_arqAcaoEmail_Template()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Template", "Template", "Template", "arqTemplate", "a_templa", null, "",8);
}

var Template = new Campo_arqAcaoEmail_Template;

//------------------------------------------------------------
Campo_arqAcaoEmail_Template_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqAcaoEmail_Template_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Template_Nome", "Template_Nome", "Nome", Template, 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Template_Nome = new Campo_arqAcaoEmail_Template_Nome;

//------------------------------------------------------------
Campo_arqAcaoEmail_PadraoAcao.prototype = new Lance_CampoLigado;

function Campo_arqAcaoEmail_PadraoAcao()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "PadraoAcao", "PadraoAcao", "PadraoAcao", "tabPadraoAcao", "t_padrao", null, "",0);
}

var PadraoAcao = new Campo_arqAcaoEmail_PadraoAcao;

//------------------------------------------------------------
Campo_arqAcaoEmail_PadraoAcao_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqAcaoEmail_PadraoAcao_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "PadraoAcao_Chave", "PadraoAcao_Chave", "PadraoAcao", PadraoAcao, 1, "u", false);
}

var PadraoAcao_Chave = new Campo_arqAcaoEmail_PadraoAcao_Chave;

//------------------------------------------------------------
Campo_arqAcaoEmail_PadraoAcao_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqAcaoEmail_PadraoAcao_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "PadraoAcao_Descritor", "PadraoAcao_Descritor", "PadraoAcao", PadraoAcao, 22, "xxxxxxxxxxxxxxxxxxxxxx", false);
}

var PadraoAcao_Descritor = new Campo_arqAcaoEmail_PadraoAcao_Descritor;

//------------------------------------------------------------
Campo_arqAcaoEmail_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqAcaoEmail_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqAcaoEmail_Ativo;

//------------------------------------------------------------
Campo_arqAcaoEmail_Arquivo.prototype = new Lance_CampoArquivo;

function Campo_arqAcaoEmail_Arquivo()
{
	this.superClass = Lance_CampoArquivo;
	this.superClass( "Arquivo", "Arquivo", "Arquivo", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false,false);
}

var Arquivo = new Campo_arqAcaoEmail_Arquivo;

//------------------------------------------------------------
Campo_arqAcaoEmail_Html.prototype = new Lance_CampoTexto;

function Campo_arqAcaoEmail_Html()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Html", "Html", "Html", true);
}

var Html = new Campo_arqAcaoEmail_Html;

//------------------------------------------------------------
Campo_arqAcaoEmail_Imagem.prototype = new Lance_CampoImagem;

function Campo_arqAcaoEmail_Imagem()
{
	this.superClass = Lance_CampoImagem;
	this.superClass( "Imagem", "Imagem", "Imagem");
}

var Imagem = new Campo_arqAcaoEmail_Imagem;

//------------------------------------------------------------
Campo_arqAcaoEmail_Link.prototype = new Lance_CampoCadeia;

function Campo_arqAcaoEmail_Link()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Link", "Link", "Link", 200, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false,100);
}

var Link = new Campo_arqAcaoEmail_Link;

//------------------------------------------------------------
Campo_arqAcaoEmail_ImagemAlt.prototype = new Lance_CampoCadeia;

function Campo_arqAcaoEmail_ImagemAlt()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "ImagemAlt", "ImagemAlt", "ImagemAlt", 50, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var ImagemAlt = new Campo_arqAcaoEmail_ImagemAlt;

//------------------------------------------------------------
Campo_arqAcaoEmail_QtdTeste.prototype = new Lance_CampoNumerico;

function Campo_arqAcaoEmail_QtdTeste()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "QtdTeste", "QtdTeste", "QtdTeste", 2, "#z", false,"", "");
}

var QtdTeste = new Campo_arqAcaoEmail_QtdTeste;

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_arqAcaoEmail_Titulo.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( Titulo.indexOf( "!") >= 0 || Titulo.indexOf( "?") >= 0 ) )
	{
		return( !confirm( "Houve uso de acentuação gráfica (!,?). Isto pontua o email como SPAM. Continua?" ) );
	}
		if( tem(this) && ( (Titulo+'').length > 50 ) )
	{
		return( !confirm( "O título está com mais de 50 caracteres. Continua?" ) );
	}
	return( Lance_CampoNumerico.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqAcaoEmail_Titulo.prototype.Cabecalho = function()
{
		return( "Assunto do email" );
}

Titulo.TipoCampo |= CAMPO_CHAVE;
Versao.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_arqAcaoEmail_TipoAcao.prototype.PosCampo = function()
{
	{
		TrocarForm(
		  [ TipoAcao == 1, [ 'tblNada'] ],
		  [ TipoAcao == 2, [ 'tblInterno'] ],
		  [ TipoAcao == 3, [ 'tblExterno'] ] );
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqAcaoEmail_TipoAcao.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqAcaoEmail_TipoAcao.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "Tipo da ação é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqAcaoEmail_TipoAcao.prototype.Cabecalho = function()
{
		return( "Tipo" );
}

TipoAcao_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TipoAcao_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqAcaoEmail_Template_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Template.Obrigatorio( p_comMsg ) );
}

Template_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqAcaoEmail_PadraoAcao.prototype.Cabecalho = function()
{
		return( "Automática?" );
}

PadraoAcao_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
PadraoAcao_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqAcaoEmail_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqAcaoEmail_Ativo.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "Ativa? é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqAcaoEmail_Ativo.prototype.Cabecalho = function()
{
		return( "Ativa?" );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqAcaoEmail_QtdTeste.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqAcaoEmail_QtdTeste.prototype.Cabecalho = function()
{
		return( "Qtd teste" );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqAcaoEmail_Template.prototype.ExistenciaEspecial = function()
{
	return( ( !Template_Nome.Obrigatorio( false ) || tem(Template_Nome) ) );
}

function IniciarDependencias_arqAcaoEmail()
{
Template_Nome.ExistenciasDependentes= [ Template ];
Template_Nome.ErrosDependentes= [ Template ];
Template.CamposChave= [ Template_Nome ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqAcaoEmail";
//------------------------------------------------------------
function ListaDeCampos_arqAcaoEmail( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Titulo, Versao, TipoAcao, TipoAcao_Chave, TipoAcao_Descritor, Template, Template_Nome, PadraoAcao, PadraoAcao_Chave, PadraoAcao_Descritor, Ativo, Arquivo, Html, Imagem, Link, ImagemAlt, QtdTeste ]	);
	IniciarDependencias_arqAcaoEmail();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqAcaoEmail( '' );
g_idOperacao = 10;

if( parent.navegacao ) {
var Menu_1 = [ 1,"Emails enviados","","m",22,"","",1,"","1","a_logema","arqLogEmail","Folhear","Titulo","?","","", "","", 0,15,[],[12]];
var Menu_2 = [ 1,"Imagens","","I",21,"","",1,"","1","a_imgcrm","arqImagemCRM","Folhear","AcaoEmail","?","","", "","", 0,15,[],[11]];
var Menu_3 = [ 1,"Envio de teste","","E",19,"","",1,"QtdTeste < 10","1", "a_qselec", "parQSelecao", "Alterar", "", "", "", "", "5^^^m_envio_teste^^^^^^^^^^^^^^^^^^", "", 0,15,[19],[]];
var Menu_4 = [ 1,"Visualizar","","V",20,"","",1,"","5","m_visualizar_acao","","","","","","", "","", 0,15,[20],[]];
parent.navegacao.MenuPrincQtdOpcoes=4;
}
