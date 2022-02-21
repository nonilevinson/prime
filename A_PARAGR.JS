/*=========================================================================
  a_paragr - ParaGrupo
=========================================================================*/

//------------------------------------------------------------
Campo_arqParaGrupo_Avisos.prototype = new Lance_CampoHidden;

function Campo_arqParaGrupo_Avisos()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Avisos", "Avisos", "Avisos", "arqAvisos", "a_avisos", null, "",14);
}

var Avisos = new Campo_arqParaGrupo_Avisos;

//------------------------------------------------------------
Campo_arqParaGrupo_Avisos_Numero.prototype = new Lance_CampoNumericoLigado;

function Campo_arqParaGrupo_Avisos_Numero()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Avisos_Numero", "Avisos_Numero", "Numero", Avisos, 6, "###.##z", true,"", "");
}

var Avisos_Numero = new Campo_arqParaGrupo_Avisos_Numero;

//------------------------------------------------------------
Campo_arqParaGrupo_Grupo.prototype = new Lance_CampoHidden;

function Campo_arqParaGrupo_Grupo()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Grupo", "Grupo", "Grupo", "arqGrupo", "a_grupo", null, "",4);
}

var Grupo = new Campo_arqParaGrupo_Grupo;

//------------------------------------------------------------
Campo_arqParaGrupo_Grupo_Grupo.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqParaGrupo_Grupo_Grupo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Grupo_Grupo", "Grupo_Grupo", "Grupo", Grupo, 50, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Grupo_Grupo = new Campo_arqParaGrupo_Grupo_Grupo;

//------------------------------------------------------------
Campo_arqParaGrupo_Usuario.prototype = new Lance_CampoHidden;

function Campo_arqParaGrupo_Usuario()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Usuario", "Usuario", "Usuario", "arqUsuario", "a_usuari", null, "",5);
}

var Usuario = new Campo_arqParaGrupo_Usuario;

//------------------------------------------------------------
Campo_arqParaGrupo_Usuario_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqParaGrupo_Usuario_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Usuario_Usuario", "Usuario_Usuario", "Usuario", Usuario, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Usuario_Usuario = new Campo_arqParaGrupo_Usuario_Usuario;

Avisos.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqParaGrupo_Avisos_Numero.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Avisos.Obrigatorio( p_comMsg ) );
}

Avisos_Numero.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqParaGrupo_Grupo.prototype.Obrigatorio = function( p_comMsg )
{
		if( false )
	{
		if( p_comMsg ) this.MsgObrigatorio();
		return( true );
	}
	return( false );
}

Grupo.ZeroEhValido = TRUE;
Grupo.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqParaGrupo_Grupo_Grupo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Grupo.Obrigatorio( p_comMsg ) );
}

Grupo_Grupo.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqParaGrupo_Usuario.prototype.Obrigatorio = function( p_comMsg )
{
		if( false )
	{
		if( p_comMsg ) this.MsgObrigatorio();
		return( true );
	}
	return( false );
}

Usuario.ZeroEhValido = TRUE;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqParaGrupo_Usuario.prototype.Cabecalho = function()
{
		return( "Usuário" );
}

Usuario.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqParaGrupo_Usuario_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Usuario.Obrigatorio( p_comMsg ) );
}

Usuario_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqParaGrupo_Avisos.prototype.ExistenciaEspecial = function()
{
	return( ( !Avisos_Numero.Obrigatorio( false ) || tem(Avisos_Numero) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqParaGrupo_Grupo.prototype.ExistenciaEspecial = function()
{
	return( ( !Grupo_Grupo.Obrigatorio( false ) || tem(Grupo_Grupo) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqParaGrupo_Usuario.prototype.ExistenciaEspecial = function()
{
	return( ( !Usuario_Usuario.Obrigatorio( false ) || tem(Usuario_Usuario) ) );
}

function IniciarDependencias_arqParaGrupo()
{
Avisos_Numero.ExistenciasDependentes= [ Avisos ];
Grupo_Grupo.ExistenciasDependentes= [ Grupo ];
Usuario_Usuario.ExistenciasDependentes= [ Usuario ];
Avisos_Numero.ErrosDependentes= [ Avisos ];
Grupo_Grupo.ErrosDependentes= [ Grupo ];
Usuario_Usuario.ErrosDependentes= [ Usuario ];
Avisos.CamposChave= [ Avisos_Numero ];
Grupo.CamposChave= [ Grupo_Grupo ];
Usuario.CamposChave= [ Usuario_Usuario ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqParaGrupo";
//------------------------------------------------------------
function ListaDeCampos_arqParaGrupo( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Avisos, Avisos_Numero, Grupo, Grupo_Grupo, Usuario, Usuario_Usuario ]	);
	IniciarDependencias_arqParaGrupo();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqParaGrupo( '' );
g_idOperacao = 15;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
