/*=========================================================================
  a_itloge - ItLogEmail
=========================================================================*/

//------------------------------------------------------------
Campo_arqItLogEmail_LogEmail.prototype = new Lance_CampoHidden;

function Campo_arqItLogEmail_LogEmail()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "LogEmail", "LogEmail", "LogEmail", "arqLogEmail", "a_logema", null, "",12);
}

var LogEmail = new Campo_arqItLogEmail_LogEmail;

//------------------------------------------------------------
Campo_arqItLogEmail_LogEmail_Titulo.prototype = new Lance_CampoHidden;

function Campo_arqItLogEmail_LogEmail_Titulo()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "LogEmail_Titulo", "LogEmail_Titulo", "Titulo", "arqAcaoEmail", "a_aemail", LogEmail, "",10);
}

var LogEmail_Titulo = new Campo_arqItLogEmail_LogEmail_Titulo;

//------------------------------------------------------------
Campo_arqItLogEmail_LogEmail_Titulo_Titulo.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqItLogEmail_LogEmail_Titulo_Titulo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "LogEmail_Titulo_Titulo", "LogEmail_Titulo_Titulo", "Título", LogEmail_Titulo, 100, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var LogEmail_Titulo_Titulo = new Campo_arqItLogEmail_LogEmail_Titulo_Titulo;

//------------------------------------------------------------
Campo_arqItLogEmail_LogEmail_Titulo_Versao.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqItLogEmail_LogEmail_Titulo_Versao()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "LogEmail_Titulo_Versao", "LogEmail_Titulo_Versao", "Versão", LogEmail_Titulo, 20, "xxxxxxxxxxxxxxxxxxxx", false);
}

var LogEmail_Titulo_Versao = new Campo_arqItLogEmail_LogEmail_Titulo_Versao;

//------------------------------------------------------------
Campo_arqItLogEmail_LogEmail_Data.prototype = new Lance_CampoDataLigado;

function Campo_arqItLogEmail_LogEmail_Data()
{
	this.superClass = Lance_CampoDataLigado;
	this.superClass( "LogEmail_Data", "LogEmail_Data", "Data", LogEmail, 8, "dd/mm/aaaa", true);
}

var LogEmail_Data = new Campo_arqItLogEmail_LogEmail_Data;

//------------------------------------------------------------
Campo_arqItLogEmail_LogEmail_Hora.prototype = new Lance_CampoHoraLigado;

function Campo_arqItLogEmail_LogEmail_Hora()
{
	this.superClass = Lance_CampoHoraLigado;
	this.superClass( "LogEmail_Hora", "LogEmail_Hora", "Hora", LogEmail, 6, "hh:mm:ss", true);
}

var LogEmail_Hora = new Campo_arqItLogEmail_LogEmail_Hora;

//------------------------------------------------------------
Campo_arqItLogEmail_Cliente.prototype = new Lance_CampoHidden;

function Campo_arqItLogEmail_Cliente()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cliente", "Cliente", "Cliente", "arqPessoa", "a_pessoa", null, "",7);
}

var Cliente = new Campo_arqItLogEmail_Cliente;

//------------------------------------------------------------
Campo_arqItLogEmail_Cliente_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqItLogEmail_Cliente_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cliente_Nome", "Cliente_Nome", "Nome", Cliente, 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Cliente_Nome = new Campo_arqItLogEmail_Cliente_Nome;

//------------------------------------------------------------
Campo_arqItLogEmail_Cliente_NumCelular.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqItLogEmail_Cliente_NumCelular()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cliente_NumCelular", "Cliente_NumCelular", "NumCelular", Cliente, 11, "(##) #.####.####", true);
}

var Cliente_NumCelular = new Campo_arqItLogEmail_Cliente_NumCelular;

//------------------------------------------------------------
Campo_arqItLogEmail_Email.prototype = new Lance_CampoCadeia;

function Campo_arqItLogEmail_Email()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Email", "Email", "Email", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Email = new Campo_arqItLogEmail_Email;

//------------------------------------------------------------
Campo_arqItLogEmail_Enviado.prototype = new Lance_CampoLogico;

function Campo_arqItLogEmail_Enviado()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Enviado", "Enviado", "Enviado");
}

var Enviado = new Campo_arqItLogEmail_Enviado;

//------------------------------------------------------------
Campo_arqItLogEmail_Lido.prototype = new Lance_CampoData;

function Campo_arqItLogEmail_Lido()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Lido", "Lido", "Lido", 8, "dd/mm/aaaa", true);
}

var Lido = new Campo_arqItLogEmail_Lido;

//------------------------------------------------------------
Campo_arqItLogEmail_LinkEmp.prototype = new Lance_CampoData;

function Campo_arqItLogEmail_LinkEmp()
{
	this.superClass = Lance_CampoData;
	this.superClass( "LinkEmp", "LinkEmp", "LinkEmp", 8, "dd/mm/aaaa", true);
}

var LinkEmp = new Campo_arqItLogEmail_LinkEmp;

//------------------------------------------------------------
Campo_arqItLogEmail_LinkKm.prototype = new Lance_CampoData;

function Campo_arqItLogEmail_LinkKm()
{
	this.superClass = Lance_CampoData;
	this.superClass( "LinkKm", "LinkKm", "LinkKm", 8, "dd/mm/aaaa", true);
}

var LinkKm = new Campo_arqItLogEmail_LinkKm;

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqItLogEmail_LogEmail.prototype.Cabecalho = function()
{
		return( "Programado" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqItLogEmail_LogEmail_Titulo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( LogEmail.Obrigatorio( p_comMsg ) );
}

LogEmail_Titulo.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqItLogEmail_LogEmail_Titulo_Titulo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( LogEmail.Obrigatorio( p_comMsg ) );
}

LogEmail_Titulo_Titulo.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqItLogEmail_LogEmail_Titulo_Versao.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( LogEmail.Obrigatorio( p_comMsg ) );
}

LogEmail_Titulo_Versao.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqItLogEmail_LogEmail_Data.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( LogEmail.Obrigatorio( p_comMsg ) );
}

LogEmail_Data.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqItLogEmail_LogEmail_Hora.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( LogEmail.Obrigatorio( p_comMsg ) );
}

LogEmail_Hora.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqItLogEmail_Cliente_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cliente.Obrigatorio( p_comMsg ) );
}

Cliente_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqItLogEmail_Cliente_NumCelular.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cliente.Obrigatorio( p_comMsg ) );
}

Cliente_NumCelular.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqItLogEmail_Enviado.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) this.MsgObrigatorio();
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqItLogEmail_Enviado.prototype.Cabecalho = function()
{
		return( "Enviado?" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqItLogEmail_LinkEmp.prototype.Cabecalho = function()
{
		return( "Acessou link" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqItLogEmail_LinkKm.prototype.Cabecalho = function()
{
		return( "Link KM [0]" );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqItLogEmail_LogEmail.prototype.ExistenciaEspecial = function()
{
	return( ( !LogEmail_Titulo.Obrigatorio( false ) || tem(LogEmail_Titulo) ) && ( !LogEmail_Data.Obrigatorio( false ) || tem(LogEmail_Data) ) && ( !LogEmail_Hora.Obrigatorio( false ) || tem(LogEmail_Hora) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqItLogEmail_LogEmail_Titulo.prototype.ExistenciaEspecial = function()
{
	return( ( !LogEmail_Titulo_Titulo.Obrigatorio( false ) || tem(LogEmail_Titulo_Titulo) ) && ( !LogEmail_Titulo_Versao.Obrigatorio( false ) || tem(LogEmail_Titulo_Versao) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqItLogEmail_Cliente.prototype.ExistenciaEspecial = function()
{
	return( ( !Cliente_Nome.Obrigatorio( false ) || tem(Cliente_Nome) ) && ( !Cliente_NumCelular.Obrigatorio( false ) || tem(Cliente_NumCelular) ) );
}

function IniciarDependencias_arqItLogEmail()
{
LogEmail_Titulo.ExistenciasDependentes= [ LogEmail ];
LogEmail_Titulo_Titulo.ExistenciasDependentes= [ LogEmail_Titulo ];
LogEmail_Titulo_Versao.ExistenciasDependentes= [ LogEmail_Titulo ];
LogEmail_Data.ExistenciasDependentes= [ LogEmail ];
LogEmail_Hora.ExistenciasDependentes= [ LogEmail ];
Cliente_Nome.ExistenciasDependentes= [ Cliente ];
Cliente_NumCelular.ExistenciasDependentes= [ Cliente ];
LogEmail_Titulo_Versao.ErrosDependentes= [ LogEmail_Titulo ];
LogEmail_Hora.ErrosDependentes= [ LogEmail ];
Cliente_NumCelular.ErrosDependentes= [ Cliente ];
LogEmail.CamposChave= [ LogEmail_Titulo,LogEmail_Data,LogEmail_Hora ];
LogEmail_Titulo.CamposChave= [ LogEmail_Titulo_Titulo,LogEmail_Titulo_Versao ];
Cliente.CamposChave= [ Cliente_Nome,Cliente_NumCelular ];
}
	//=========================================================================
	function AcionaTecla( p_tecla )
	{
		switch( p_tecla )
		{
			case _ALT: return( ( tem( Usuario ) && g_usuarioAtual == Usuario ) || GrupoAtualEm() );
			case _DEL: return( g_usuarioAtual == Usuario || GrupoAtualEm() );
		}
		return( true );
	}
	g_acionaTecla="AcionaTecla";


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqItLogEmail";
//------------------------------------------------------------
function ListaDeCampos_arqItLogEmail( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ LogEmail, LogEmail_Titulo, LogEmail_Titulo_Titulo, LogEmail_Titulo_Versao, LogEmail_Data, LogEmail_Hora, Cliente, Cliente_Nome, Cliente_NumCelular, Email, Enviado, Lido, LinkEmp, LinkKm ]	);
	IniciarDependencias_arqItLogEmail();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqItLogEmail( '' );
g_idOperacao = 13;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
