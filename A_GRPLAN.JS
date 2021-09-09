/*=========================================================================
  a_grplan - GeraPlant
=========================================================================*/

//------------------------------------------------------------
Campo_parGeraPlant_Clinica.prototype = new Lance_CampoHidden;

function Campo_parGeraPlant_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_parGeraPlant_Clinica;

//------------------------------------------------------------
Campo_parGeraPlant_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraPlant_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Clinica_Clinica = new Campo_parGeraPlant_Clinica_Clinica;

//------------------------------------------------------------
Campo_parGeraPlant_DataIni.prototype = new Lance_CampoData;

function Campo_parGeraPlant_DataIni()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataIni", "DataIni", "DataIni", 8, "dd/mm/aaaa", true);
}

var DataIni = new Campo_parGeraPlant_DataIni;

//------------------------------------------------------------
Campo_parGeraPlant_DataFim.prototype = new Lance_CampoData;

function Campo_parGeraPlant_DataFim()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataFim", "DataFim", "DataFim", 8, "dd/mm/aaaa", true);
}

var DataFim = new Campo_parGeraPlant_DataFim;

//------------------------------------------------------------
Campo_parGeraPlant_Medico.prototype = new Lance_CampoHidden;

function Campo_parGeraPlant_Medico()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Medico", "Medico", "Medico", "arqUsuario", "a_usuari", null, "",5);
}

var Medico = new Campo_parGeraPlant_Medico;

//------------------------------------------------------------
Campo_parGeraPlant_Medico_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraPlant_Medico_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Medico_Usuario", "Medico_Usuario", "Usuario", Medico, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Medico_Usuario = new Campo_parGeraPlant_Medico_Usuario;

//------------------------------------------------------------
Campo_parGeraPlant_Dom.prototype = new Lance_CampoLogico;

function Campo_parGeraPlant_Dom()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Dom", "Dom", "Dom");
}

var Dom = new Campo_parGeraPlant_Dom;

//------------------------------------------------------------
Campo_parGeraPlant_Seg.prototype = new Lance_CampoLogico;

function Campo_parGeraPlant_Seg()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Seg", "Seg", "Seg");
}

var Seg = new Campo_parGeraPlant_Seg;

//------------------------------------------------------------
Campo_parGeraPlant_Ter.prototype = new Lance_CampoLogico;

function Campo_parGeraPlant_Ter()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ter", "Ter", "Ter");
}

var Ter = new Campo_parGeraPlant_Ter;

//------------------------------------------------------------
Campo_parGeraPlant_Qua.prototype = new Lance_CampoLogico;

function Campo_parGeraPlant_Qua()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Qua", "Qua", "Qua");
}

var Qua = new Campo_parGeraPlant_Qua;

//------------------------------------------------------------
Campo_parGeraPlant_Qui.prototype = new Lance_CampoLogico;

function Campo_parGeraPlant_Qui()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Qui", "Qui", "Qui");
}

var Qui = new Campo_parGeraPlant_Qui;

//------------------------------------------------------------
Campo_parGeraPlant_Sex.prototype = new Lance_CampoLogico;

function Campo_parGeraPlant_Sex()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Sex", "Sex", "Sex");
}

var Sex = new Campo_parGeraPlant_Sex;

//------------------------------------------------------------
Campo_parGeraPlant_Sab.prototype = new Lance_CampoLogico;

function Campo_parGeraPlant_Sab()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Sab", "Sab", "Sab");
}

var Sab = new Campo_parGeraPlant_Sab;

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parGeraPlant_Clinica.prototype.FiltroPai = function()
{
		if( g_temMaisDeUmClinica )
			return( "A.idPrimario in( " + g_vetIdClinica + " )" );
		return( "" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraPlant_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraPlant_DataIni.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data incial é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parGeraPlant_Medico.prototype.FiltroPai = function()
{
			return( "A.Medico = 1 and A.Ativo = 1" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraPlant_Medico_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Medico.Obrigatorio( p_comMsg ) );
}

Medico_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraPlant_Dom.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraPlant_Seg.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraPlant_Ter.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraPlant_Qua.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraPlant_Qui.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraPlant_Sex.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraPlant_Sab.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_parGeraPlant_Sab.prototype.TemErro = function()
{
		if( Dom==0 && Seg==0 && Ter==0 && Qua==0 && Qui==0 && Sex==0 && Sab==0 )
	{
		alert( "Informe pelo menos um dia da semana" );
		return( true );
	}
	return( Lance_CampoLogico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraPlant_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraPlant_Medico.prototype.ExistenciaEspecial = function()
{
	return( ( !Medico_Usuario.Obrigatorio( false ) || tem(Medico_Usuario) ) );
}

function IniciarDependencias_parGeraPlant()
{
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Medico_Usuario.ExistenciasDependentes= [ Medico ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Medico_Usuario.ErrosDependentes= [ Medico ];
Dom.ErrosDependentes= [ Sab ];
Seg.ErrosDependentes= [ Sab ];
Ter.ErrosDependentes= [ Sab ];
Qua.ErrosDependentes= [ Sab ];
Qui.ErrosDependentes= [ Sab ];
Sex.ErrosDependentes= [ Sab ];
Clinica.CamposChave= [ Clinica_Clinica ];
Medico.CamposChave= [ Medico_Usuario ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "parGeraPlant";
//------------------------------------------------------------
function ListaDeCampos_parGeraPlant( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Clinica, Clinica_Clinica, DataIni, DataFim, Medico, Medico_Usuario, Dom, Seg, Ter, Qua, Qui, Sex, Sab ]	);
	IniciarDependencias_parGeraPlant();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_parGeraPlant( '' );
g_idOperacao = 45;
parent.navegacao.MenuPrincQtdOpcoes=1;
parent.navegacao.MenuPrincPodeSo1=1;
