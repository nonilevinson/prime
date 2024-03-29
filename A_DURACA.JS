/*=========================================================================
  a_duraca - Duracao
=========================================================================*/

//------------------------------------------------------------
Campo_arqDuracao_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqDuracao_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqDuracao_Clinica;

//------------------------------------------------------------
Campo_arqDuracao_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqDuracao_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Clinica_Clinica = new Campo_arqDuracao_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqDuracao_Inicio.prototype = new Lance_CampoData;

function Campo_arqDuracao_Inicio()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Inicio", "Inicio", "Inicio", 8, "dd/mm/aaaa", true);
}

var Inicio = new Campo_arqDuracao_Inicio;

//------------------------------------------------------------
Campo_arqDuracao_HoraIni.prototype = new Lance_CampoHora;

function Campo_arqDuracao_HoraIni()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "HoraIni", "HoraIni", "HoraIni", 4, "hh:mm", true);
}

var HoraIni = new Campo_arqDuracao_HoraIni;

//------------------------------------------------------------
Campo_arqDuracao_HoraFim.prototype = new Lance_CampoHora;

function Campo_arqDuracao_HoraFim()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "HoraFim", "HoraFim", "HoraFim", 4, "hh:mm", true);
}

var HoraFim = new Campo_arqDuracao_HoraFim;

//------------------------------------------------------------
Campo_arqDuracao_ConsSab.prototype = new Lance_CampoLogico;

function Campo_arqDuracao_ConsSab()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "ConsSab", "ConsSab", "ConsSab");
}

var ConsSab = new Campo_arqDuracao_ConsSab;

//------------------------------------------------------------
Campo_arqDuracao_ConsDom.prototype = new Lance_CampoLogico;

function Campo_arqDuracao_ConsDom()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "ConsDom", "ConsDom", "ConsDom");
}

var ConsDom = new Campo_arqDuracao_ConsDom;

//------------------------------------------------------------
Campo_arqDuracao_Duracao.prototype = new Lance_CampoNumerico;

function Campo_arqDuracao_Duracao()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Duracao", "Duracao", "Duracao", 2, "#z", false,"", "");
}

var Duracao = new Campo_arqDuracao_Duracao;

//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqDuracao_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqDuracao_Inicio.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data do inicio da dura��o � obrigat�ria" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condi��o de erro do campo
//-------------------------------------------------------------
Campo_arqDuracao_Inicio.prototype.TemErro = function()
{
		if( tem(this) && ( diaDaSemana( Inicio ) != 0 ) )
	{
		alert( "O dia incial precisa ser um domingo" );
		return( true );
	}
	return( Lance_CampoNumerico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqDuracao_Inicio.prototype.Cabecalho = function()
{
		return( "In�cio" );
}

//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqDuracao_HoraIni.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O hor�rio inicial � obrigat�rio" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqDuracao_HoraIni.prototype.Cabecalho = function()
{
		return( "In�cio" );
}

//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqDuracao_HoraFim.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O hor�rio final � obrigat�rio" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqDuracao_HoraFim.prototype.Cabecalho = function()
{
		return( "Fim" );
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_arqDuracao_ConsSab.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqDuracao_ConsSab.prototype.Cabecalho = function()
{
		return( "S�bado?" );
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_arqDuracao_ConsDom.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqDuracao_ConsDom.prototype.Cabecalho = function()
{
		return( "Domingo?" );
}

//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqDuracao_Duracao.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A dura��o � obrigat�ria" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condi��o de erro do campo
//-------------------------------------------------------------
Campo_arqDuracao_Duracao.prototype.TemErro = function()
{
		if( tem(this) && ( 60 % Duracao != 0 ) )
	{
		alert( "Dura��o deve ser divisor exato da hora (5, 10, 12, 15, 20, 30 ou 60 min)" );
		return( true );
	}
		if( tem(this) && ( verificarAgendamentos() ) )
	{
		alert( "Existem agendamentos j� marcados" );
		return( true );
	}
	return( Lance_CampoNumerico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqDuracao_Duracao.prototype.Cabecalho = function()
{
		return( "Dura��o" );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_arqDuracao_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

function IniciarDependencias_arqDuracao()
{
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Clinica.CamposChave= [ Clinica_Clinica ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqDuracao";
//------------------------------------------------------------
function ListaDeCampos_arqDuracao( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Clinica, Clinica_Clinica, Inicio, HoraIni, HoraFim, ConsSab, ConsDom, Duracao ]	);
	IniciarDependencias_arqDuracao();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqDuracao( '' );
g_idOperacao = 38;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
