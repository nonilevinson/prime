/*=========================================================================
  a_cidade - Cidade
=========================================================================*/

//------------------------------------------------------------
Campo_arqCidade_UF.prototype = new Lance_CampoLigado;

function Campo_arqCidade_UF()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "UF", "UF", "UF", "tabUF", "t_uf", null, "",0);
}

var UF = new Campo_arqCidade_UF;

//------------------------------------------------------------
Campo_arqCidade_UF_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCidade_UF_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "UF_Chave", "UF_Chave", "UF", UF, 2, "uu", false);
}

var UF_Chave = new Campo_arqCidade_UF_Chave;

//------------------------------------------------------------
Campo_arqCidade_UF_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCidade_UF_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "UF_Descritor", "UF_Descritor", "UF", UF, 19, "xxxxxxxxxxxxxxxxxxx", false);
}

var UF_Descritor = new Campo_arqCidade_UF_Descritor;

//------------------------------------------------------------
Campo_arqCidade_Cidade.prototype = new Lance_CampoCadeia;

function Campo_arqCidade_Cidade()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cidade", "Cidade", "Cidade", 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Cidade = new Campo_arqCidade_Cidade;

//------------------------------------------------------------
Campo_arqCidade_DDD.prototype = new Lance_CampoNumerico;

function Campo_arqCidade_DDD()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "DDD", "DDD", "DDD", 2, "#z", false,"", "");
}

var DDD = new Campo_arqCidade_DDD;

UF.TipoCampo |= CAMPO_CHAVE;
UF_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
UF_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
Cidade.TipoCampo |= CAMPO_CHAVE;
function IniciarDependencias_arqCidade()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqCidade";
//------------------------------------------------------------
function ListaDeCampos_arqCidade( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ UF, UF_Chave, UF_Descritor, Cidade, DDD ]	);
	IniciarDependencias_arqCidade();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqCidade( '' );
g_idOperacao = 2;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Endereço","","E",3,"","",1,"","1","a_endere","domEndereco","Folhear","Cidade","?","","", "","", 0,8,[],[3]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
