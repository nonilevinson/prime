/*=========================================================================
  a_lido - Lido
=========================================================================*/

//------------------------------------------------------------
Campo_arqLido_Avisos.prototype = new Lance_CampoHidden;

function Campo_arqLido_Avisos()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Avisos", "Avisos", "Avisos", "arqAvisos", "a_avisos", null, "",14);
}

var Avisos = new Campo_arqLido_Avisos;

//------------------------------------------------------------
Campo_arqLido_Avisos_Numero.prototype = new Lance_CampoNumericoLigado;

function Campo_arqLido_Avisos_Numero()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Avisos_Numero", "Avisos_Numero", "Numero", Avisos, 6, "###.##z", true,"", "");
}

var Avisos_Numero = new Campo_arqLido_Avisos_Numero;

//------------------------------------------------------------
Campo_arqLido_Usuario.prototype = new Lance_CampoHidden;

function Campo_arqLido_Usuario()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Usuario", "Usuario", "Usuario", "arqUsuario", "a_usuari", null, "",5);
}

var Usuario = new Campo_arqLido_Usuario;

//------------------------------------------------------------
Campo_arqLido_Usuario_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqLido_Usuario_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Usuario_Usuario", "Usuario_Usuario", "Usuario", Usuario, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Usuario_Usuario = new Campo_arqLido_Usuario_Usuario;

//------------------------------------------------------------
Campo_arqLido_Grupo.prototype = new Lance_CampoCadeia;

function Campo_arqLido_Grupo()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Grupo", "Grupo", "Grupo", 50, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Grupo = new Campo_arqLido_Grupo;

//------------------------------------------------------------
Campo_arqLido_Data.prototype = new Lance_CampoData;

function Campo_arqLido_Data()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Data", "Data", "Data", 8, "dd/mm/aaaa", true);
}

var Data = new Campo_arqLido_Data;

Avisos.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqLido_Avisos_Numero.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Avisos.Obrigatorio( p_comMsg ) );
}

Avisos_Numero.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Campos a mais que o ligado traz do pai
//-------------------------------------------------------------
Campo_arqLido_Usuario.prototype.TrazOutrosDoPai = function()
{
	var vetPai = [];
			vetPai[0] = [ "Grupo",
					"A.Usuario, arqUsuario.Grupo, arqGrupo",
					"1" ];
		return( vetPai );
}

Usuario.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqLido_Usuario_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Usuario.Obrigatorio( p_comMsg ) );
}

Usuario_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqLido_Grupo.prototype.Calculou = function()
{
{
{
	if( !Usuario.ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT Grupo FROM arqGrupo WHERE arqGrupo.IdPrimario=( COALESCE( ( SELECT Grupo FROM arqUsuario WHERE arqUsuario.IdPrimario=( " + Usuario + " ) ), 0 ) )  )" + LANCE_SEPARADOR + this.Prefixo + "Grupo" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
}

Grupo.EhCalculado = true;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqLido_Data.prototype.Cabecalho = function()
{
		return( "Lido em" );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqLido_Avisos.prototype.ExistenciaEspecial = function()
{
	return( ( !Avisos_Numero.Obrigatorio( false ) || tem(Avisos_Numero) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqLido_Usuario.prototype.ExistenciaEspecial = function()
{
	return( ( !Usuario_Usuario.Obrigatorio( false ) || tem(Usuario_Usuario) ) );
}

function IniciarDependencias_arqLido()
{
Usuario.CalculosDependentes= [ Grupo ];
Avisos_Numero.ExistenciasDependentes= [ Avisos ];
Usuario_Usuario.ExistenciasDependentes= [ Usuario ];
Avisos_Numero.ErrosDependentes= [ Avisos ];
Usuario_Usuario.ErrosDependentes= [ Usuario ];
Avisos.CamposChave= [ Avisos_Numero ];
Usuario.CamposChave= [ Usuario_Usuario ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqLido";
var Usuario_Grupo;
//------------------------------------------------------------
function ListaDeCampos_arqLido( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Avisos, Avisos_Numero, Usuario, Usuario_Usuario, Grupo, Data ]	);
	IniciarDependencias_arqLido();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqLido( '' );
g_idOperacao = 16;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
