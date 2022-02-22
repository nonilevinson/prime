/*=========================================================================
  a_usucco - UsuCCor
=========================================================================*/

//------------------------------------------------------------
Campo_arqUsuCCor_Usuario.prototype = new Lance_CampoHidden;

function Campo_arqUsuCCor_Usuario()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Usuario", "Usuario", "Usuario", "arqUsuario", "a_usuari", null, "",5);
}

var Usuario = new Campo_arqUsuCCor_Usuario;

//------------------------------------------------------------
Campo_arqUsuCCor_Usuario_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqUsuCCor_Usuario_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Usuario_Usuario", "Usuario_Usuario", "Usuario", Usuario, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Usuario_Usuario = new Campo_arqUsuCCor_Usuario_Usuario;

//------------------------------------------------------------
Campo_arqUsuCCor_CCor.prototype = new Lance_CampoHidden;

function Campo_arqUsuCCor_CCor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "CCor", "CCor", "CCor", "arqCCor", "a_ccor", null, "",20);
}

var CCor = new Campo_arqUsuCCor_CCor;

//------------------------------------------------------------
Campo_arqUsuCCor_CCor_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqUsuCCor_CCor_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "CCor_Nome", "CCor_Nome", "Nome", CCor, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var CCor_Nome = new Campo_arqUsuCCor_CCor_Nome;

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqUsuCCor_Usuario.prototype.FiltroPai = function()
{
			return( "A.Grupo is not null" );
}

Usuario.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqUsuCCor_Usuario_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Usuario.Obrigatorio( p_comMsg ) );
}

Usuario_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqUsuCCor_CCor.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo = 1" );
		return( "" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqUsuCCor_CCor.prototype.Cabecalho = function()
{
		return( "Conta corrente" );
}

CCor.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqUsuCCor_CCor_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( CCor.Obrigatorio( p_comMsg ) );
}

CCor_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqUsuCCor_Usuario.prototype.ExistenciaEspecial = function()
{
	return( ( !Usuario_Usuario.Obrigatorio( false ) || tem(Usuario_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqUsuCCor_CCor.prototype.ExistenciaEspecial = function()
{
	return( ( !CCor_Nome.Obrigatorio( false ) || tem(CCor_Nome) ) );
}

function IniciarDependencias_arqUsuCCor()
{
Usuario_Usuario.ExistenciasDependentes= [ Usuario ];
CCor_Nome.ExistenciasDependentes= [ CCor ];
Usuario_Usuario.ErrosDependentes= [ Usuario ];
CCor_Nome.ErrosDependentes= [ CCor ];
Usuario.CamposChave= [ Usuario_Usuario ];
CCor.CamposChave= [ CCor_Nome ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqUsuCCor";
//------------------------------------------------------------
function ListaDeCampos_arqUsuCCor( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Usuario, Usuario_Usuario, CCor, CCor_Nome ]	);
	IniciarDependencias_arqUsuCCor();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqUsuCCor( '' );
g_idOperacao = 59;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
