/*=========================================================================
  a_comcal - ComCall
=========================================================================*/

//------------------------------------------------------------
Campo_arqComCall_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqComCall_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqComCall_Clinica;

//------------------------------------------------------------
Campo_arqComCall_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqComCall_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Clinica_Clinica = new Campo_arqComCall_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqComCall_Mes.prototype = new Lance_CampoData;

function Campo_arqComCall_Mes()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Mes", "Mes", "Mes", 4, "mm/aa", true);
}

var Mes = new Campo_arqComCall_Mes;

//------------------------------------------------------------
Campo_arqComCall_TrgQtoFx.prototype = new Lance_CampoNumerico;

function Campo_arqComCall_TrgQtoFx()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "TrgQtoFx", "TrgQtoFx", "TrgQtoFx", 2, "#z", false,"", "");
}

var TrgQtoFx = new Campo_arqComCall_TrgQtoFx;

Clinica.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqComCall_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqComCall_Mes.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O mês é obrigatório" );
		return( true );
	}
}

Mes.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqComCall_TrgQtoFx.prototype.Cabecalho = function()
{
		return( "Qtd Faixas" );
}

TrgQtoFx.EhCalculado = true;
TrgQtoFx.EhTotalizado = true;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqComCall_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

function IniciarDependencias_arqComCall()
{
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Clinica.CamposChave= [ Clinica_Clinica ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqComCall";
//------------------------------------------------------------
function ListaDeCampos_arqComCall( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Clinica, Clinica_Clinica, Mes, TrgQtoFx ]	);
	IniciarDependencias_arqComCall();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqComCall( '' );
g_idOperacao = 49;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Faixas","","F",187,"","",1,"","1","a_fxcomc","arqFxComCall","Folhear","ComCall","?","","", "","", 0,6,[],[50]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
