/*=========================================================================
  a_tiagen - TiAgenda
=========================================================================*/

//------------------------------------------------------------
Campo_arqTiAgenda_TiAgenda.prototype = new Lance_CampoCadeia;

function Campo_arqTiAgenda_TiAgenda()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "TiAgenda", "TiAgenda", "TiAgenda", 20, "uuuuuuuuuuuuuuuuuuuu", false);
}

var TiAgenda = new Campo_arqTiAgenda_TiAgenda;

//------------------------------------------------------------
Campo_arqTiAgenda_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqTiAgenda_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqTiAgenda_Ativo;

//------------------------------------------------------------
Campo_arqTiAgenda_Complemen.prototype = new Lance_CampoLogico;

function Campo_arqTiAgenda_Complemen()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Complemen", "Complemen", "Complemen");
}

var Complemen = new Campo_arqTiAgenda_Complemen;

//------------------------------------------------------------
Campo_arqTiAgenda_DobroTempo.prototype = new Lance_CampoLogico;

function Campo_arqTiAgenda_DobroTempo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "DobroTempo", "DobroTempo", "DobroTempo");
}

var DobroTempo = new Campo_arqTiAgenda_DobroTempo;

//------------------------------------------------------------
Campo_arqTiAgenda_Pagamento.prototype = new Lance_CampoLogico;

function Campo_arqTiAgenda_Pagamento()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Pagamento", "Pagamento", "Pagamento");
}

var Pagamento = new Campo_arqTiAgenda_Pagamento;

//------------------------------------------------------------
Campo_arqTiAgenda_Midia.prototype = new Lance_CampoLogico;

function Campo_arqTiAgenda_Midia()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Midia", "Midia", "Midia");
}

var Midia = new Campo_arqTiAgenda_Midia;

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqTiAgenda_TiAgenda.prototype.Cabecalho = function()
{
		return( "Tipo" );
}

TiAgenda.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTiAgenda_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqTiAgenda_Ativo.prototype.Cabecalho = function()
{
		return( "Tratamento?" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTiAgenda_Complemen.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqTiAgenda_Complemen.prototype.Cabecalho = function()
{
		return( "Complementar?" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTiAgenda_DobroTempo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqTiAgenda_DobroTempo.prototype.Cabecalho = function()
{
		return( "Dobro do tempo?" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTiAgenda_Pagamento.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTiAgenda_Midia.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

function IniciarDependencias_arqTiAgenda()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqTiAgenda";
//------------------------------------------------------------
function ListaDeCampos_arqTiAgenda( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ TiAgenda, Ativo, Complemen, DobroTempo, Pagamento, Midia ]	);
	IniciarDependencias_arqTiAgenda();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqTiAgenda( '' );
g_idOperacao = 43;

if( parent.navegacao ) {
var Menu_1 = [ 1,"Consultas","","C",148,"","",1,"","1","a_consul","arqConsulta","Folhear","TiAgenda","?","","", "","", 0,9,[],[39]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
