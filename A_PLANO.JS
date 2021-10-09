/*=========================================================================
  a_plano - Plano
=========================================================================*/

//------------------------------------------------------------
Campo_arqPlano_CodPlano.prototype = new Lance_CampoNumerico;

function Campo_arqPlano_CodPlano()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "CodPlano", "CodPlano", "CodPlano", 2, "zz", false,"", "");
}

var CodPlano = new Campo_arqPlano_CodPlano;

//------------------------------------------------------------
Campo_arqPlano_Plano.prototype = new Lance_CampoCadeia;

function Campo_arqPlano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Plano", "Plano", "Plano", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Plano = new Campo_arqPlano_Plano;

//------------------------------------------------------------
Campo_arqPlano_TPgRec.prototype = new Lance_CampoLigado;

function Campo_arqPlano_TPgRec()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPgRec", "TPgRec", "TPgRec", "tabTPgRec", "t_tpgre", null, "",0);
}

var TPgRec = new Campo_arqPlano_TPgRec;

//------------------------------------------------------------
Campo_arqPlano_TPgRec_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPlano_TPgRec_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPgRec_Chave", "TPgRec_Chave", "TPgRec", TPgRec, 1, "u", false);
}

var TPgRec_Chave = new Campo_arqPlano_TPgRec_Chave;

//------------------------------------------------------------
Campo_arqPlano_TPgRec_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPlano_TPgRec_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPgRec_Descritor", "TPgRec_Descritor", "TPgRec", TPgRec, 7, "xxxxxxx", false);
}

var TPgRec_Descritor = new Campo_arqPlano_TPgRec_Descritor;

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqPlano_CodPlano.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( maior( "CodPlano+1", 1 ) ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqPlano_CodPlano.prototype.Cabecalho = function()
{
		return( "Código" );
}

CodPlano.TipoCampo |= CAMPO_CHAVE;
Plano.TipoCampo |= CAMPO_DESCRITOR;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqPlano_TPgRec.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O tipo é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqPlano_TPgRec.prototype.Cabecalho = function()
{
		return( "Tipo" );
}

TPgRec_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPgRec_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
function IniciarDependencias_arqPlano()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqPlano";
//------------------------------------------------------------
function ListaDeCampos_arqPlano( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ CodPlano, Plano, TPgRec, TPgRec_Chave, TPgRec_Descritor ]	);
	IniciarDependencias_arqPlano();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqPlano( '' );
g_idOperacao = 27;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"SubPlanos","","S",85,"","",1,"","1","a_subpla","arqSubPlano","Folhear","Plano","?","","", "","", 0,9,[],[28]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
