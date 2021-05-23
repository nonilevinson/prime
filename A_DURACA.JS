/*=========================================================================
  a_duraca - Duracao
=========================================================================*/

//------------------------------------------------------------
Campo_arqDuracao_Usuario.prototype = new Lance_CampoHidden;

function Campo_arqDuracao_Usuario()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Usuario", "Usuario", "Usuario", "arqUsuario", "a_usuari", null, "",5);
}

var Usuario = new Campo_arqDuracao_Usuario;

//------------------------------------------------------------
Campo_arqDuracao_Usuario_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqDuracao_Usuario_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Usuario_Usuario", "Usuario_Usuario", "Usuario", Usuario, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Usuario_Usuario = new Campo_arqDuracao_Usuario_Usuario;

//------------------------------------------------------------
Campo_arqDuracao_Inicio.prototype = new Lance_CampoData;

function Campo_arqDuracao_Inicio()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Inicio", "Inicio", "Inicio", 8, "dd/mm/aaaa", true);
}

var Inicio = new Campo_arqDuracao_Inicio;

//------------------------------------------------------------
Campo_arqDuracao_Duracao.prototype = new Lance_CampoNumerico;

function Campo_arqDuracao_Duracao()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Duracao", "Duracao", "Duracao", 2, "#z", false,"", "");
}

var Duracao = new Campo_arqDuracao_Duracao;

//------------------------------------------------------------
Campo_arqDuracao_MaxAgenda.prototype = new Lance_CampoNumerico;

function Campo_arqDuracao_MaxAgenda()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "MaxAgenda", "MaxAgenda", "MaxAgenda", 3, "##z", true,"", "");
}

var MaxAgenda = new Campo_arqDuracao_MaxAgenda;

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqDuracao_Usuario_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Usuario.Obrigatorio( p_comMsg ) );
}

Usuario_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqDuracao_Inicio.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data do inicio da duração é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqDuracao_Inicio.prototype.Cabecalho = function()
{
		return( "Início" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqDuracao_Duracao.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A duração é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqDuracao_Duracao.prototype.TemErro = function()
{
		if( tem(this) && ( 60 % Duracao != 0 ) )
	{
		alert( "Duração deve ser divisor exato da hora (5, 10, 12, 15, 20, 30 ou 60 min)" );
		return( true );
	}
		if( tem(this) && ( verificarAgendamentos() ) )
	{
		alert( "Existem agendamentos já marcados" );
		return( true );
	}
	return( Lance_CampoNumerico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqDuracao_Duracao.prototype.Cabecalho = function()
{
		return( "Duração" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqDuracao_MaxAgenda.prototype.Cabecalho = function()
{
		return( "Max Agenda" );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqDuracao_Usuario.prototype.ExistenciaEspecial = function()
{
	return( ( !Usuario_Usuario.Obrigatorio( false ) || tem(Usuario_Usuario) ) );
}

function IniciarDependencias_arqDuracao()
{
Usuario_Usuario.ExistenciasDependentes= [ Usuario ];
Usuario_Usuario.ErrosDependentes= [ Usuario ];
Usuario.CamposChave= [ Usuario_Usuario ];
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

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Usuario, Usuario_Usuario, Inicio, Duracao, MaxAgenda ]	);
	IniciarDependencias_arqDuracao();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqDuracao( '' );
g_idOperacao = 38;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
