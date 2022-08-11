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

		[ Status, Ordem, Cor, Fundo, Ativo ]	);
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
