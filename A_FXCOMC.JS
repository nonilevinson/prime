/*=========================================================================
  a_fxcomc - FxComCall
=========================================================================*/

//------------------------------------------------------------
Campo_arqFxComCall_ComCall.prototype = new Lance_CampoHidden;

function Campo_arqFxComCall_ComCall()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "ComCall", "ComCall", "ComCall", "arqComCall", "a_comcal", null, "",49);
}

var ComCall = new Campo_arqFxComCall_ComCall;

//------------------------------------------------------------
Campo_arqFxComCall_ComCall_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqFxComCall_ComCall_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "ComCall_Clinica", "ComCall_Clinica", "Clinica", "arqClinica", "a_clini", ComCall, "",31);
}

var ComCall_Clinica = new Campo_arqFxComCall_ComCall_Clinica;

//------------------------------------------------------------
Campo_arqFxComCall_ComCall_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqFxComCall_ComCall_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "ComCall_Clinica_Clinica", "ComCall_Clinica_Clinica", "Clinica", ComCall_Clinica, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var ComCall_Clinica_Clinica = new Campo_arqFxComCall_ComCall_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqFxComCall_ComCall_Mes.prototype = new Lance_CampoDataLigado;

function Campo_arqFxComCall_ComCall_Mes()
{
	this.superClass = Lance_CampoDataLigado;
	this.superClass( "ComCall_Mes", "ComCall_Mes", "Mes", ComCall, 6, "mm/aaaa", true);
}

var ComCall_Mes = new Campo_arqFxComCall_ComCall_Mes;

//------------------------------------------------------------
Campo_arqFxComCall_Faixa.prototype = new Lance_CampoNumerico;

function Campo_arqFxComCall_Faixa()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Faixa", "Faixa", "Faixa", 2, "#z", false,"", "");
}

var Faixa = new Campo_arqFxComCall_Faixa;

//------------------------------------------------------------
Campo_arqFxComCall_PercAte.prototype = new Lance_CampoNumerico;

function Campo_arqFxComCall_PercAte()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "PercAte", "PercAte", "PercAte", 4, "#z,zz", true,"", "");
}

var PercAte = new Campo_arqFxComCall_PercAte;

//------------------------------------------------------------
Campo_arqFxComCall_Comissao.prototype = new Lance_CampoNumerico;

function Campo_arqFxComCall_Comissao()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Comissao", "Comissao", "Comissao", 4, "#z,zz", true,"", "");
}

var Comissao = new Campo_arqFxComCall_Comissao;

ComCall.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqFxComCall_ComCall_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( ComCall.Obrigatorio( p_comMsg ) );
}

ComCall_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqFxComCall_ComCall_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( ComCall.Obrigatorio( p_comMsg ) );
}

ComCall_Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqFxComCall_ComCall_Mes.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( ComCall.Obrigatorio( p_comMsg ) );
}

ComCall_Mes.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqFxComCall_Faixa.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( maior( "Faixa+1", 1, ComCall ) ) );
}
}

Faixa.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqFxComCall_PercAte.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O percentual entre Contato e Comparecido é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFxComCall_PercAte.prototype.Cabecalho = function()
{
		return( "% Contato/Comparecido" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqFxComCall_Comissao.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O percentual da comissão é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFxComCall_Comissao.prototype.Cabecalho = function()
{
		return( "% Comissão" );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqFxComCall_ComCall.prototype.ExistenciaEspecial = function()
{
	return( ( !ComCall_Clinica.Obrigatorio( false ) || tem(ComCall_Clinica) ) && ( !ComCall_Mes.Obrigatorio( false ) || tem(ComCall_Mes) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqFxComCall_ComCall_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !ComCall_Clinica_Clinica.Obrigatorio( false ) || tem(ComCall_Clinica_Clinica) ) );
}

function IniciarDependencias_arqFxComCall()
{
ComCall_Clinica.ExistenciasDependentes= [ ComCall ];
ComCall_Clinica_Clinica.ExistenciasDependentes= [ ComCall_Clinica ];
ComCall_Mes.ExistenciasDependentes= [ ComCall ];
ComCall_Clinica_Clinica.ErrosDependentes= [ ComCall_Clinica ];
ComCall_Mes.ErrosDependentes= [ ComCall ];
ComCall.CamposChave= [ ComCall_Clinica,ComCall_Mes ];
ComCall_Clinica.CamposChave= [ ComCall_Clinica_Clinica ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqFxComCall";
//------------------------------------------------------------
function ListaDeCampos_arqFxComCall( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ ComCall, ComCall_Clinica, ComCall_Clinica_Clinica, ComCall_Mes, Faixa, PercAte, Comissao ]	);
	IniciarDependencias_arqFxComCall();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqFxComCall( '' );
g_idOperacao = 50;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
