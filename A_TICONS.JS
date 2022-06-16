/*=========================================================================
  a_ticons - TiConsulta
=========================================================================*/

//------------------------------------------------------------
Campo_arqTiConsulta_TiConsulta.prototype = new Lance_CampoCadeia;

function Campo_arqTiConsulta_TiConsulta()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "TiConsulta", "TiConsulta", "TiConsulta", 15, "uxxxxxxxxxxxxxx", false);
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

	var l_lista = []
	l_lista = l_lista.concat(

		[ TiConsulta, Ativo ]	);
	IniciarDependencias_arqTiConsulta();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqTiConsulta( '' );
g_idOperacao = 60;

if( parent.navegacao ) {
var Menu_1 = [ 1,"Consultas","","C",261,"","",1,"","1","a_consul","arqConsulta","Folhear","TiConsulta","?","","", "","", 0,9,[],[39]];
var Menu_2 = [ 1,"Clínicas","","l",269,"","",1,"","1","a_clini","arqClinica","Folhear","TiConsulta","?","","", "","", 0,9,[],[31]];
parent.navegacao.MenuPrincQtdOpcoes=2;
}
