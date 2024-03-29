/*=========================================================================
  a_ptrata - PTrata
=========================================================================*/

//------------------------------------------------------------
Campo_arqPTrata_PTrata.prototype = new Lance_CampoCadeia;

function Campo_arqPTrata_PTrata()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "PTrata", "PTrata", "PTrata", 80, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var PTrata = new Campo_arqPTrata_PTrata;

//------------------------------------------------------------
Campo_arqPTrata_Apelido.prototype = new Lance_CampoCadeia;

function Campo_arqPTrata_Apelido()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Apelido", "Apelido", "Apelido", 10, "uuuuuuuuuu", false);
}

var Apelido = new Campo_arqPTrata_Apelido;

//------------------------------------------------------------
Campo_arqPTrata_Valor.prototype = new Lance_CampoNumerico;

function Campo_arqPTrata_Valor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor", "Valor", "Valor", 8, "###.##z,zz", true,"", "");
}

var Valor = new Campo_arqPTrata_Valor;

//------------------------------------------------------------
Campo_arqPTrata_MrgDesc.prototype = new Lance_CampoNumerico;

function Campo_arqPTrata_MrgDesc()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "MrgDesc", "MrgDesc", "MrgDesc", 4, "#z,zz", true,"", "");
}

var MrgDesc = new Campo_arqPTrata_MrgDesc;

//------------------------------------------------------------
Campo_arqPTrata_ValMinimo.prototype = new Lance_CampoNumerico;

function Campo_arqPTrata_ValMinimo()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "ValMinimo", "ValMinimo", "ValMinimo", 8, "###.##z,zz", true,"", "");
}

var ValMinimo = new Campo_arqPTrata_ValMinimo;

//------------------------------------------------------------
Campo_arqPTrata_Complemen.prototype = new Lance_CampoLogico;

function Campo_arqPTrata_Complemen()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Complemen", "Complemen", "Complemen");
}

var Complemen = new Campo_arqPTrata_Complemen;

//------------------------------------------------------------
Campo_arqPTrata_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqPTrata_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqPTrata_Ativo;

//------------------------------------------------------------
Campo_arqPTrata_Tempo.prototype = new Lance_CampoCadeia;

function Campo_arqPTrata_Tempo()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Tempo", "Tempo", "Tempo", 10, "uuuuuuuuuu", false);
}

var Tempo = new Campo_arqPTrata_Tempo;

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqPTrata_PTrata.prototype.Cabecalho = function()
{
		return( "Plano" );
}

PTrata.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_arqPTrata_Apelido.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( cadEsq( PTrata, 10 ) ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqPTrata_Valor.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O valor � obrigat�rio" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqPTrata_MrgDesc.prototype.Cabecalho = function()
{
		return( "% Desconto" );
}

//-------------------------------------------------------------
// Express�o para c�lculo do valor do campo
//-------------------------------------------------------------
Campo_arqPTrata_ValMinimo.prototype.Calculou = function()
{
{
	return( this.Atribuiu( Valor - ( Valor * MrgDesc ) / 100.0 ) );
}
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqPTrata_ValMinimo.prototype.Cabecalho = function()
{
		return( "M�nimo" );
}

ValMinimo.EhCalculado = true;
//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_arqPTrata_Complemen.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqPTrata_Complemen.prototype.Cabecalho = function()
{
		return( "Complementar?" );
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_arqPTrata_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqPTrata_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqPTrata_Tempo.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O tempo � obrigat�rio" );
		return( true );
	}
}

function IniciarDependencias_arqPTrata()
{
Valor.CalculosDependentes= [ ValMinimo ];
MrgDesc.CalculosDependentes= [ ValMinimo ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqPTrata";
//------------------------------------------------------------
function ListaDeCampos_arqPTrata( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ PTrata, Apelido, Valor, MrgDesc, ValMinimo, Complemen, Ativo, Tempo ]	);
	IniciarDependencias_arqPTrata();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqPTrata( '' );
g_idOperacao = 32;

if( parent.navegacao ) {
var Menu_1 = [ 1,"Consultas","","C",174,"","",1,"","1","a_consul","arqConsulta","Folhear","PTrata","?","","", "","", 0,9,[],[39]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
