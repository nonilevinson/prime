/*=========================================================================
  a_horabl - HoraBloq
=========================================================================*/

//------------------------------------------------------------
Campo_arqHoraBloq_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqHoraBloq_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqHoraBloq_Clinica;

//------------------------------------------------------------
Campo_arqHoraBloq_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqHoraBloq_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Clinica_Clinica = new Campo_arqHoraBloq_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqHoraBloq_Nome.prototype = new Lance_CampoCadeia;

function Campo_arqHoraBloq_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Nome", "Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Nome = new Campo_arqHoraBloq_Nome;

//------------------------------------------------------------
Campo_arqHoraBloq_DataIni.prototype = new Lance_CampoData;

function Campo_arqHoraBloq_DataIni()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataIni", "DataIni", "DataIni", 8, "dd/mm/aaaa", true);
}

var DataIni = new Campo_arqHoraBloq_DataIni;

//------------------------------------------------------------
Campo_arqHoraBloq_HoraIni.prototype = new Lance_CampoHora;

function Campo_arqHoraBloq_HoraIni()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "HoraIni", "HoraIni", "HoraIni", 4, "hh:mm", true);
}

var HoraIni = new Campo_arqHoraBloq_HoraIni;

//------------------------------------------------------------
Campo_arqHoraBloq_DataFim.prototype = new Lance_CampoData;

function Campo_arqHoraBloq_DataFim()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataFim", "DataFim", "DataFim", 8, "dd/mm/aaaa", true);
}

var DataFim = new Campo_arqHoraBloq_DataFim;

//------------------------------------------------------------
Campo_arqHoraBloq_HoraFim.prototype = new Lance_CampoHora;

function Campo_arqHoraBloq_HoraFim()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "HoraFim", "HoraFim", "HoraFim", 4, "hh:mm", true);
}

var HoraFim = new Campo_arqHoraBloq_HoraFim;

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqHoraBloq_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A clínica é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqHoraBloq_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqHoraBloq_Nome.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O nome é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqHoraBloq_DataIni.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data inicial é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqHoraBloq_DataIni.prototype.Cabecalho = function()
{
		return( "Início" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqHoraBloq_HoraIni.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A hora inicial é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqHoraBloq_HoraIni.prototype.Cabecalho = function()
{
		return( "das" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqHoraBloq_DataFim.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data final é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqHoraBloq_DataFim.prototype.Cabecalho = function()
{
		return( "Final" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqHoraBloq_HoraFim.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A hora final é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqHoraBloq_HoraFim.prototype.TemErro = function()
{
		if( tem(this) && ( HoraFim < HoraIni ) )
	{
		alert( "Final precisa ser posterior a inicial" );
		return( true );
	}
	return( Lance_CampoHora.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqHoraBloq_HoraFim.prototype.Cabecalho = function()
{
		return( "Fim" );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqHoraBloq_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

function IniciarDependencias_arqHoraBloq()
{
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
HoraIni.ErrosDependentes= [ HoraFim ];
Clinica.CamposChave= [ Clinica_Clinica ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqHoraBloq";
//------------------------------------------------------------
function ListaDeCampos_arqHoraBloq( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Clinica, Clinica_Clinica, Nome, DataIni, HoraIni, DataFim, HoraFim ]	);
	IniciarDependencias_arqHoraBloq();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqHoraBloq( '' );
g_idOperacao = 37;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
