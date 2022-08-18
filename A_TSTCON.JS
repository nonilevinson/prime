/*=========================================================================
  a_tstcon - TStCon
=========================================================================*/

//------------------------------------------------------------
Campo_arqTStCon_Status.prototype = new Lance_CampoCadeia;

function Campo_arqTStCon_Status()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Status", "Status", "Status", 20, "uuuuuuuuuuuuuuuuuuuu", false);
}

var Status = new Campo_arqTStCon_Status;

//------------------------------------------------------------
Campo_arqTStCon_Ordem.prototype = new Lance_CampoNumerico;

function Campo_arqTStCon_Ordem()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Ordem", "Ordem", "Ordem", 2, "#z", false,"", "");
}

var Ordem = new Campo_arqTStCon_Ordem;

//------------------------------------------------------------
Campo_arqTStCon_TClinica.prototype = new Lance_CampoLigado;

function Campo_arqTStCon_TClinica()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TClinica", "TClinica", "TClinica", "tabTClinica", "t_tclini", null, "",0);
}

var TClinica = new Campo_arqTStCon_TClinica;

//------------------------------------------------------------
Campo_arqTStCon_TClinica_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqTStCon_TClinica_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TClinica_Chave", "TClinica_Chave", "TClinica", TClinica, 1, "u", false);
}

var TClinica_Chave = new Campo_arqTStCon_TClinica_Chave;

//------------------------------------------------------------
Campo_arqTStCon_TClinica_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqTStCon_TClinica_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TClinica_Descritor", "TClinica_Descritor", "TClinica", TClinica, 12, "xxxxxxxxxxxx", false);
}

var TClinica_Descritor = new Campo_arqTStCon_TClinica_Descritor;

//------------------------------------------------------------
Campo_arqTStCon_Legenda.prototype = new Lance_CampoLogico;

function Campo_arqTStCon_Legenda()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Legenda", "Legenda", "Legenda");
}

var Legenda = new Campo_arqTStCon_Legenda;

//------------------------------------------------------------
Campo_arqTStCon_HoraChe.prototype = new Lance_CampoLogico;

function Campo_arqTStCon_HoraChe()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "HoraChe", "HoraChe", "HoraChe");
}

var HoraChe = new Campo_arqTStCon_HoraChe;

//------------------------------------------------------------
Campo_arqTStCon_ValorObr.prototype = new Lance_CampoLogico;

function Campo_arqTStCon_ValorObr()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "ValorObr", "ValorObr", "ValorObr");
}

var ValorObr = new Campo_arqTStCon_ValorObr;

//------------------------------------------------------------
Campo_arqTStCon_ProntuObr.prototype = new Lance_CampoLogico;

function Campo_arqTStCon_ProntuObr()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "ProntuObr", "ProntuObr", "ProntuObr");
}

var ProntuObr = new Campo_arqTStCon_ProntuObr;

//------------------------------------------------------------
Campo_arqTStCon_EhDesmarca.prototype = new Lance_CampoLogico;

function Campo_arqTStCon_EhDesmarca()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "EhDesmarca", "EhDesmarca", "EhDesmarca");
}

var EhDesmarca = new Campo_arqTStCon_EhDesmarca;

//------------------------------------------------------------
Campo_arqTStCon_EhDesmaPac.prototype = new Lance_CampoLogico;

function Campo_arqTStCon_EhDesmaPac()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "EhDesmaPac", "EhDesmaPac", "EhDesmaPac");
}

var EhDesmaPac = new Campo_arqTStCon_EhDesmaPac;

//------------------------------------------------------------
Campo_arqTStCon_EhFaltou.prototype = new Lance_CampoLogico;

function Campo_arqTStCon_EhFaltou()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "EhFaltou", "EhFaltou", "EhFaltou");
}

var EhFaltou = new Campo_arqTStCon_EhFaltou;

//------------------------------------------------------------
Campo_arqTStCon_Cor.prototype = new Lance_CampoCadeia;

function Campo_arqTStCon_Cor()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cor", "Cor", "Cor", 7, "xxxxxxx", false);
}

var Cor = new Campo_arqTStCon_Cor;

//------------------------------------------------------------
Campo_arqTStCon_Fundo.prototype = new Lance_CampoCadeia;

function Campo_arqTStCon_Fundo()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Fundo", "Fundo", "Fundo", 7, "xxxxxxx", false);
}

var Fundo = new Campo_arqTStCon_Fundo;

//------------------------------------------------------------
Campo_arqTStCon_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqTStCon_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqTStCon_Ativo;

Status.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqTStCon_Ordem.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A ordem é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqTStCon_TClinica.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O tipo da clínica é obrigatorio" );
		return( true );
	}
}

TClinica_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TClinica_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTStCon_HoraChe.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTStCon_ValorObr.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTStCon_ProntuObr.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTStCon_EhDesmarca.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTStCon_EhDesmaPac.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTStCon_EhFaltou.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTStCon_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqTStCon_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

function IniciarDependencias_arqTStCon()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqTStCon";
//------------------------------------------------------------
function ListaDeCampos_arqTStCon( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Status, Ordem, TClinica, TClinica_Chave, TClinica_Descritor, Legenda, HoraChe, ValorObr, ProntuObr, EhDesmarca, EhDesmaPac, EhFaltou, Cor, Fundo, Ativo ]	);
	IniciarDependencias_arqTStCon();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqTStCon( '' );
g_idOperacao = 61;

if( parent.navegacao ) {
var Menu_1 = [ 1,"Consultas","","C",275,"","",1,"","1","a_consul","arqConsulta","Folhear","TStCon","?","","", "","", 0,9,[],[39]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
