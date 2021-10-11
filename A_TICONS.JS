/*=========================================================================
  a_ticons - TiConsulta
=========================================================================*/

//------------------------------------------------------------
Campo_arqTiConsulta_TiConsulta.prototype = new Lance_CampoCadeia;

function Campo_arqTiConsulta_TiConsulta()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "TiConsulta", "TiConsulta", "TiConsulta", 20, "uuuuuuuuuuuuuuuuuuuu", false);
}

var TiConsulta = new Campo_arqTiConsulta_TiConsulta;

//------------------------------------------------------------
Campo_arqTiConsulta_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqTiConsulta_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqTiConsulta_Ativo;

//------------------------------------------------------------
Campo_arqTiConsulta_AgTopo.prototype = new Lance_CampoLogico;

function Campo_arqTiConsulta_AgTopo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "AgTopo", "AgTopo", "AgTopo");
}

var AgTopo = new Campo_arqTiConsulta_AgTopo;

//------------------------------------------------------------
Campo_arqTiConsulta_AgForm.prototype = new Lance_CampoLogico;

function Campo_arqTiConsulta_AgForm()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "AgForm", "AgForm", "AgForm");
}

var AgForm = new Campo_arqTiConsulta_AgForm;

//------------------------------------------------------------
Campo_arqTiConsulta_Pagamento.prototype = new Lance_CampoLogico;

function Campo_arqTiConsulta_Pagamento()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Pagamento", "Pagamento", "Pagamento");
}

var Pagamento = new Campo_arqTiConsulta_Pagamento;

//------------------------------------------------------------
Campo_arqTiConsulta_Midia.prototype = new Lance_CampoLogico;

function Campo_arqTiConsulta_Midia()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Midia", "Midia", "Midia");
}

var Midia = new Campo_arqTiConsulta_Midia;

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqTiConsulta_TiConsulta.prototype.Cabecalho = function()
{
		return( "Tipo" );
}

TiConsulta.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTiConsulta_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqTiConsulta_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTiConsulta_AgTopo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTiConsulta_AgForm.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTiConsulta_Pagamento.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqTiConsulta_Midia.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

function IniciarDependencias_arqTiConsulta()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqTiConsulta";
//------------------------------------------------------------
function ListaDeCampos_arqTiConsulta( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ TiConsulta, Ativo, AgTopo, AgForm, Pagamento, Midia ]	);
	IniciarDependencias_arqTiConsulta();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqTiConsulta( '' );
g_idOperacao = 47;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
