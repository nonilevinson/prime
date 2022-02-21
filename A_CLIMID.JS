/*=========================================================================
  a_climid - CliMidia
=========================================================================*/

//------------------------------------------------------------
Campo_arqCliMidia_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqCliMidia_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqCliMidia_Clinica;

//------------------------------------------------------------
Campo_arqCliMidia_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCliMidia_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Clinica_Clinica = new Campo_arqCliMidia_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqCliMidia_Midia.prototype = new Lance_CampoHidden;

function Campo_arqCliMidia_Midia()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Midia", "Midia", "Midia", "arqMidia", "a_midia", null, "",30);
}

var Midia = new Campo_arqCliMidia_Midia;

//------------------------------------------------------------
Campo_arqCliMidia_Midia_Midia.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCliMidia_Midia_Midia()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Midia_Midia", "Midia_Midia", "Midia", Midia, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Midia_Midia = new Campo_arqCliMidia_Midia_Midia;

//------------------------------------------------------------
Campo_arqCliMidia_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqCliMidia_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqCliMidia_Ativo;

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqCliMidia_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A clínica é obrigatória" );
		return( true );
	}
}

Clinica.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqCliMidia_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqCliMidia_Midia.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A mídia é obrigatória" );
		return( true );
	}
}

Midia.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqCliMidia_Midia_Midia.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Midia.Obrigatorio( p_comMsg ) );
}

Midia_Midia.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqCliMidia_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqCliMidia_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqCliMidia_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqCliMidia_Midia.prototype.ExistenciaEspecial = function()
{
	return( ( !Midia_Midia.Obrigatorio( false ) || tem(Midia_Midia) ) );
}

function IniciarDependencias_arqCliMidia()
{
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Midia_Midia.ExistenciasDependentes= [ Midia ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Midia_Midia.ErrosDependentes= [ Midia ];
Clinica.CamposChave= [ Clinica_Clinica ];
Midia.CamposChave= [ Midia_Midia ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqCliMidia";
//------------------------------------------------------------
function ListaDeCampos_arqCliMidia( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Clinica, Clinica_Clinica, Midia, Midia_Midia, Ativo ]	);
	IniciarDependencias_arqCliMidia();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqCliMidia( '' );
g_idOperacao = 47;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
