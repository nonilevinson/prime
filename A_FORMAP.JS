/*=========================================================================
  a_formap - FormaPg
=========================================================================*/

//------------------------------------------------------------
Campo_arqFormaPg_FormaPg.prototype = new Lance_CampoCadeia;

function Campo_arqFormaPg_FormaPg()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "FormaPg", "FormaPg", "FormaPg", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var FormaPg = new Campo_arqFormaPg_FormaPg;

//------------------------------------------------------------
Campo_arqFormaPg_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqFormaPg_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqFormaPg_Ativo;

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFormaPg_FormaPg.prototype.Cabecalho = function()
{
		return( "Forma" );
}

FormaPg.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqFormaPg_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFormaPg_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

function IniciarDependencias_arqFormaPg()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqFormaPg";
//------------------------------------------------------------
function ListaDeCampos_arqFormaPg( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ FormaPg, Ativo ]	);
	IniciarDependencias_arqFormaPg();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqFormaPg( '' );
g_idOperacao = 44;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Consultas","","C",149,"","",1,"","1","a_consul","arqConsulta","Folhear","FormaPg","?","","", "","", 0,9,[],[39]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
