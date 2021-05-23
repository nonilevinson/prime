/*=========================================================================
  a_usucli - UsuCli
=========================================================================*/

//------------------------------------------------------------
Campo_arqUsuCli_Usuario.prototype = new Lance_CampoHidden;

function Campo_arqUsuCli_Usuario()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Usuario", "Usuario", "Usuario", "arqUsuario", "a_usuari", null, "",5);
}

var Usuario = new Campo_arqUsuCli_Usuario;

//------------------------------------------------------------
Campo_arqUsuCli_Usuario_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqUsuCli_Usuario_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Usuario_Usuario", "Usuario_Usuario", "Usuario", Usuario, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Usuario_Usuario = new Campo_arqUsuCli_Usuario_Usuario;

//------------------------------------------------------------
Campo_arqUsuCli_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqUsuCli_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqUsuCli_Clinica;

//------------------------------------------------------------
Campo_arqUsuCli_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqUsuCli_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Clinica_Clinica = new Campo_arqUsuCli_Clinica_Clinica;

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqUsuCli_Usuario.prototype.FiltroPai = function()
{
			return( "A.Grupo is not null" );
}

Usuario.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqUsuCli_Usuario_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Usuario.Obrigatorio( p_comMsg ) );
}

Usuario_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqUsuCli_Clinica.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo == 1" );
		return( "" );
}

Clinica.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqUsuCli_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqUsuCli_Usuario.prototype.ExistenciaEspecial = function()
{
	return( ( !Usuario_Usuario.Obrigatorio( false ) || tem(Usuario_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqUsuCli_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

function IniciarDependencias_arqUsuCli()
{
Usuario_Usuario.ExistenciasDependentes= [ Usuario ];
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Usuario_Usuario.ErrosDependentes= [ Usuario ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Usuario.CamposChave= [ Usuario_Usuario ];
Clinica.CamposChave= [ Clinica_Clinica ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqUsuCli";
//------------------------------------------------------------
function ListaDeCampos_arqUsuCli( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Usuario, Usuario_Usuario, Clinica, Clinica_Clinica ]	);
	IniciarDependencias_arqUsuCli();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqUsuCli( '' );
g_idOperacao = 35;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
