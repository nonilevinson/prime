/*=========================================================================
  a_unidad - Unidade
=========================================================================*/

//------------------------------------------------------------
Campo_arqUnidade_Unidade.prototype = new Lance_CampoCadeia;

function Campo_arqUnidade_Unidade()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Unidade", "Unidade", "Unidade", 10, "uxxxxxxxxx", false);
}

var Unidade = new Campo_arqUnidade_Unidade;

//------------------------------------------------------------
Campo_arqUnidade_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqUnidade_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqUnidade_Ativo;

Unidade.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqUnidade_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqUnidade_Ativo.prototype.Cabecalho = function()
{
		return( "Ativa?" );
}

function IniciarDependencias_arqUnidade()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqUnidade";
//------------------------------------------------------------
function ListaDeCampos_arqUnidade( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Unidade, Ativo ]	);
	IniciarDependencias_arqUnidade();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqUnidade( '' );
g_idOperacao = 51;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Medicamentos","","M",194,"","",1,"","1","a_medica","arqMedicamen","Folhear","Unidade","?","","", "","", 0,12,[],[52]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
