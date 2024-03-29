/*=========================================================================
  a_indexa - IndexAtua
=========================================================================*/

//------------------------------------------------------------
Campo_arqIndexAtua_Indice.prototype = new Lance_CampoCadeia;

function Campo_arqIndexAtua_Indice()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Indice", "Indice", "Indice", 50, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Indice = new Campo_arqIndexAtua_Indice;

//------------------------------------------------------------
Campo_arqIndexAtua_Data.prototype = new Lance_CampoData;

function Campo_arqIndexAtua_Data()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Data", "Data", "Data", 8, "dd/mm/aaaa", true);
}

var Data = new Campo_arqIndexAtua_Data;

//------------------------------------------------------------
Campo_arqIndexAtua_Dias.prototype = new Lance_CampoNumerico;

function Campo_arqIndexAtua_Dias()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Dias", "Dias", "Dias", 2, "#z", false,"", "");
}

var Dias = new Campo_arqIndexAtua_Dias;

//------------------------------------------------------------
Campo_arqIndexAtua_DataProx.prototype = new Lance_CampoData;

function Campo_arqIndexAtua_DataProx()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataProx", "DataProx", "DataProx", 8, "dd/mm/aaaa", true);
}

var DataProx = new Campo_arqIndexAtua_DataProx;

//------------------------------------------------------------
Campo_arqIndexAtua_Estatis.prototype = new Lance_CampoNumerico;

function Campo_arqIndexAtua_Estatis()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Estatis", "Estatis", "Estatis", 7, "z,zzzzzz", true,"", "");
}

var Estatis = new Campo_arqIndexAtua_Estatis;

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqIndexAtua_Indice.prototype.Cabecalho = function()
{
		return( "�ndice" );
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_arqIndexAtua_Dias.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 15 ) );
}
}

//-------------------------------------------------------------
// Express�o para c�lculo do valor do campo
//-------------------------------------------------------------
Campo_arqIndexAtua_DataProx.prototype.Calculou = function()
{
{
	return( this.Atribuiu( incDia( Data, Dias ) ) );
}
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqIndexAtua_DataProx.prototype.Cabecalho = function()
{
		return( "Pr�xima" );
}

DataProx.EhCalculado = true;
//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqIndexAtua_Estatis.prototype.Cabecalho = function()
{
		return( "Estat�stica" );
}

function IniciarDependencias_arqIndexAtua()
{
Data.CalculosDependentes= [ DataProx ];
Dias.CalculosDependentes= [ DataProx ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqIndexAtua";
//------------------------------------------------------------
function ListaDeCampos_arqIndexAtua( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Indice, Data, Dias, DataProx, Estatis ]	);
	IniciarDependencias_arqIndexAtua();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqIndexAtua( '' );
g_idOperacao = 29;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
