/*=========================================================================
  a_midia - Midia
=========================================================================*/

//------------------------------------------------------------
Campo_arqMidia_Midia.prototype = new Lance_CampoCadeia;

function Campo_arqMidia_Midia()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Midia", "Midia", "Midia", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Midia = new Campo_arqMidia_Midia;

//------------------------------------------------------------
Campo_arqMidia_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqMidia_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqMidia_Ativo;

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqMidia_Midia.prototype.Cabecalho = function()
{
		return( "Mídia" );
}

Midia.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqMidia_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqMidia_Ativo.prototype.Cabecalho = function()
{
		return( "Ativa?" );
}

function IniciarDependencias_arqMidia()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqMidia";
//------------------------------------------------------------
function ListaDeCampos_arqMidia( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Midia, Ativo ]	);
	IniciarDependencias_arqMidia();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqMidia( '' );
g_idOperacao = 30;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
