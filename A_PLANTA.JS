/*=========================================================================
  a_planta - Plantao
=========================================================================*/

//------------------------------------------------------------
Campo_arqPlantao_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqPlantao_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqPlantao_Clinica;

//------------------------------------------------------------
Campo_arqPlantao_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPlantao_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Clinica_Clinica = new Campo_arqPlantao_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqPlantao_DataIni.prototype = new Lance_CampoData;

function Campo_arqPlantao_DataIni()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataIni", "DataIni", "DataIni", 8, "dd/mm/aaaa", true);
}

var DataIni = new Campo_arqPlantao_DataIni;

//------------------------------------------------------------
Campo_arqPlantao_DataFim.prototype = new Lance_CampoData;

function Campo_arqPlantao_DataFim()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataFim", "DataFim", "DataFim", 8, "dd/mm/aaaa", true);
}

var DataFim = new Campo_arqPlantao_DataFim;

//------------------------------------------------------------
Campo_arqPlantao_TDiaSem.prototype = new Lance_CampoLigado;

function Campo_arqPlantao_TDiaSem()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TDiaSem", "TDiaSem", "TDiaSem", "tabTDiaSem", "t_tdiase", null, "",0);
}

var TDiaSem = new Campo_arqPlantao_TDiaSem;

//------------------------------------------------------------
Campo_arqPlantao_TDiaSem_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPlantao_TDiaSem_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TDiaSem_Chave", "TDiaSem_Chave", "TDiaSem", TDiaSem, 1, "u", false);
}

var TDiaSem_Chave = new Campo_arqPlantao_TDiaSem_Chave;

//------------------------------------------------------------
Campo_arqPlantao_TDiaSem_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPlantao_TDiaSem_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TDiaSem_Descritor", "TDiaSem_Descritor", "TDiaSem", TDiaSem, 8, "xxxxxxxx", false);
}

var TDiaSem_Descritor = new Campo_arqPlantao_TDiaSem_Descritor;

//------------------------------------------------------------
Campo_arqPlantao_Usuario.prototype = new Lance_CampoHidden;

function Campo_arqPlantao_Usuario()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Usuario", "Usuario", "Usuario", "arqUsuario", "a_usuari", null, "",5);
}

var Usuario = new Campo_arqPlantao_Usuario;

//------------------------------------------------------------
Campo_arqPlantao_Usuario_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqPlantao_Usuario_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Usuario_Usuario", "Usuario_Usuario", "Usuario", Usuario, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Usuario_Usuario = new Campo_arqPlantao_Usuario_Usuario;

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqPlantao_Clinica.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo = 1" );
		return( "" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqPlantao_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A clínica é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqPlantao_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqPlantao_DataIni.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data de início do plantão é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqPlantao_DataIni.prototype.Cabecalho = function()
{
		return( "Início" );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqPlantao_DataFim.prototype.TemErro = function()
{
		if( tem(this) && ( quantosDias( DataFim, DataIni ) < 0 ) )
	{
		alert( "A data final precisa ser posterior a inicial" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqPlantao_DataFim.prototype.Cabecalho = function()
{
		return( "Fim" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqPlantao_TDiaSem.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O dia da semana é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqPlantao_TDiaSem.prototype.Cabecalho = function()
{
		return( "Dia" );
}

TDiaSem_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TDiaSem_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqPlantao_Usuario.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Medico = 1 and A.Ativo = 1 and A.Grupo is not null" );
			return( "A.Medico = 1 and A.Grupo is not null" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqPlantao_Usuario.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O médico é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqPlantao_Usuario.prototype.Cabecalho = function()
{
		return( "Médico" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqPlantao_Usuario_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Usuario.Obrigatorio( p_comMsg ) );
}

Usuario_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqPlantao_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqPlantao_Usuario.prototype.ExistenciaEspecial = function()
{
	return( ( !Usuario_Usuario.Obrigatorio( false ) || tem(Usuario_Usuario) ) );
}

function IniciarDependencias_arqPlantao()
{
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Usuario_Usuario.ExistenciasDependentes= [ Usuario ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
DataIni.ErrosDependentes= [ DataFim ];
Usuario_Usuario.ErrosDependentes= [ Usuario ];
Clinica.CamposChave= [ Clinica_Clinica ];
Usuario.CamposChave= [ Usuario_Usuario ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqPlantao";
//------------------------------------------------------------
function ListaDeCampos_arqPlantao( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Clinica, Clinica_Clinica, DataIni, DataFim, TDiaSem, TDiaSem_Chave, TDiaSem_Descritor, Usuario, Usuario_Usuario ]	);
	IniciarDependencias_arqPlantao();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqPlantao( '' );
g_idOperacao = 41;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
