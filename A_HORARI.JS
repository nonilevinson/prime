/*=========================================================================
  a_horari - Horario
=========================================================================*/

//------------------------------------------------------------
Campo_arqHorario_Usuario.prototype = new Lance_CampoHidden;

function Campo_arqHorario_Usuario()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Usuario", "Usuario", "Usuario", "arqUsuario", "a_usuari", null, "",5);
}

var Usuario = new Campo_arqHorario_Usuario;

//------------------------------------------------------------
Campo_arqHorario_Usuario_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqHorario_Usuario_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Usuario_Usuario", "Usuario_Usuario", "Usuario", Usuario, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Usuario_Usuario = new Campo_arqHorario_Usuario_Usuario;

//------------------------------------------------------------
Campo_arqHorario_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqHorario_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqHorario_Clinica;

//------------------------------------------------------------
Campo_arqHorario_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqHorario_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Clinica_Clinica = new Campo_arqHorario_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqHorario_TDiaSem.prototype = new Lance_CampoLigado;

function Campo_arqHorario_TDiaSem()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TDiaSem", "TDiaSem", "TDiaSem", "tabTDiaSem", "t_tdiase", null, "",0);
}

var TDiaSem = new Campo_arqHorario_TDiaSem;

//------------------------------------------------------------
Campo_arqHorario_TDiaSem_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqHorario_TDiaSem_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TDiaSem_Chave", "TDiaSem_Chave", "TDiaSem", TDiaSem, 1, "u", false);
}

var TDiaSem_Chave = new Campo_arqHorario_TDiaSem_Chave;

//------------------------------------------------------------
Campo_arqHorario_TDiaSem_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqHorario_TDiaSem_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TDiaSem_Descritor", "TDiaSem_Descritor", "TDiaSem", TDiaSem, 8, "xxxxxxxx", false);
}

var TDiaSem_Descritor = new Campo_arqHorario_TDiaSem_Descritor;

//------------------------------------------------------------
Campo_arqHorario_HoraIni.prototype = new Lance_CampoHora;

function Campo_arqHorario_HoraIni()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "HoraIni", "HoraIni", "HoraIni", 4, "hh:mm", true);
}

var HoraIni = new Campo_arqHorario_HoraIni;

//------------------------------------------------------------
Campo_arqHorario_HoraFim.prototype = new Lance_CampoHora;

function Campo_arqHorario_HoraFim()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "HoraFim", "HoraFim", "HoraFim", 4, "hh:mm", true);
}

var HoraFim = new Campo_arqHorario_HoraFim;

//------------------------------------------------------------
Campo_arqHorario_DiaIni.prototype = new Lance_CampoData;

function Campo_arqHorario_DiaIni()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DiaIni", "DiaIni", "DiaIni", 8, "dd/mm/aaaa", true);
}

var DiaIni = new Campo_arqHorario_DiaIni;

//------------------------------------------------------------
Campo_arqHorario_DiaFim.prototype = new Lance_CampoData;

function Campo_arqHorario_DiaFim()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DiaFim", "DiaFim", "DiaFim", 8, "dd/mm/aaaa", true);
}

var DiaFim = new Campo_arqHorario_DiaFim;

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqHorario_Usuario.prototype.Cabecalho = function()
{
		return( "Médico" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqHorario_Usuario_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Usuario.Obrigatorio( p_comMsg ) );
}

Usuario_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqHorario_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A clínica é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqHorario_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqHorario_TDiaSem.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O dia é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqHorario_TDiaSem.prototype.Cabecalho = function()
{
		return( "Dia" );
}

TDiaSem_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TDiaSem_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqHorario_HoraIni.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O inicio é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqHorario_HoraIni.prototype.Cabecalho = function()
{
		return( "Início" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqHorario_HoraFim.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O fim é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqHorario_HoraFim.prototype.TemErro = function()
{
		if( tem(this) && ( HoraFim < HoraIni ) )
	{
		alert( "O fim precisa ser posterior ao inicio" );
		return( true );
	}
	return( Lance_CampoData.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqHorario_HoraFim.prototype.Cabecalho = function()
{
		return( "Fim" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqHorario_DiaIni.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data incial da validade é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqHorario_DiaIni.prototype.Cabecalho = function()
{
		return( "Válido de" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqHorario_DiaFim.prototype.Cabecalho = function()
{
		return( "Até" );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqHorario_Usuario.prototype.ExistenciaEspecial = function()
{
	return( ( !Usuario_Usuario.Obrigatorio( false ) || tem(Usuario_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqHorario_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

function IniciarDependencias_arqHorario()
{
Usuario_Usuario.ExistenciasDependentes= [ Usuario ];
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Usuario_Usuario.ErrosDependentes= [ Usuario ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
HoraIni.ErrosDependentes= [ HoraFim ];
Usuario.CamposChave= [ Usuario_Usuario ];
Clinica.CamposChave= [ Clinica_Clinica ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqHorario";
//------------------------------------------------------------
function ListaDeCampos_arqHorario( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Usuario, Usuario_Usuario, Clinica, Clinica_Clinica, TDiaSem, TDiaSem_Chave, TDiaSem_Descritor, HoraIni, HoraFim, DiaIni, DiaFim ]	);
	IniciarDependencias_arqHorario();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqHorario( '' );
g_idOperacao = 37;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
