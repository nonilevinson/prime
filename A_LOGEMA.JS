/*=========================================================================
  a_logema - LogEmail
=========================================================================*/

//------------------------------------------------------------
Campo_arqLogEmail_Titulo.prototype = new Lance_CampoHidden;

function Campo_arqLogEmail_Titulo()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Titulo", "Titulo", "Titulo", "arqAcaoEmail", "a_aemail", null, "",10);
}

var Titulo = new Campo_arqLogEmail_Titulo;

//------------------------------------------------------------
Campo_arqLogEmail_Titulo_Titulo.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqLogEmail_Titulo_Titulo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Titulo_Titulo", "Titulo_Titulo", "Título", Titulo, 100, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Titulo_Titulo = new Campo_arqLogEmail_Titulo_Titulo;

//------------------------------------------------------------
Campo_arqLogEmail_Titulo_Versao.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqLogEmail_Titulo_Versao()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Titulo_Versao", "Titulo_Versao", "Versão", Titulo, 20, "xxxxxxxxxxxxxxxxxxxx", false);
}

var Titulo_Versao = new Campo_arqLogEmail_Titulo_Versao;

//------------------------------------------------------------
Campo_arqLogEmail_Data.prototype = new Lance_CampoData;

function Campo_arqLogEmail_Data()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Data", "Data", "Data", 8, "dd/mm/aaaa", true);
}

var Data = new Campo_arqLogEmail_Data;

//------------------------------------------------------------
Campo_arqLogEmail_Hora.prototype = new Lance_CampoHora;

function Campo_arqLogEmail_Hora()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "Hora", "Hora", "Hora", 6, "hh:mm:ss", true);
}

var Hora = new Campo_arqLogEmail_Hora;

//------------------------------------------------------------
Campo_arqLogEmail_Usuario.prototype = new Lance_CampoHidden;

function Campo_arqLogEmail_Usuario()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Usuario", "Usuario", "Usuario", "arqUsuario", "a_usuari", null, "",5);
}

var Usuario = new Campo_arqLogEmail_Usuario;

//------------------------------------------------------------
Campo_arqLogEmail_Usuario_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqLogEmail_Usuario_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Usuario_Usuario", "Usuario_Usuario", "Usuario", Usuario, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Usuario_Usuario = new Campo_arqLogEmail_Usuario_Usuario;

//------------------------------------------------------------
Campo_arqLogEmail_Enviados.prototype = new Lance_CampoNumerico;

function Campo_arqLogEmail_Enviados()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Enviados", "Enviados", "Enviados", 6, "###.##z", true,"", "");
}

var Enviados = new Campo_arqLogEmail_Enviados;

//------------------------------------------------------------
Campo_arqLogEmail_NEnviados.prototype = new Lance_CampoNumerico;

function Campo_arqLogEmail_NEnviados()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "NEnviados", "NEnviados", "NEnviados", 6, "###.##z", true,"", "");
}

var NEnviados = new Campo_arqLogEmail_NEnviados;

//------------------------------------------------------------
Campo_arqLogEmail_Total.prototype = new Lance_CampoNumerico;

function Campo_arqLogEmail_Total()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Total", "Total", "Total", 6, "###.##z", true,"", "");
}

var Total = new Campo_arqLogEmail_Total;

//------------------------------------------------------------
Campo_arqLogEmail_Lidos.prototype = new Lance_CampoNumerico;

function Campo_arqLogEmail_Lidos()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Lidos", "Lidos", "Lidos", 6, "###.##z", true,"", "");
}

var Lidos = new Campo_arqLogEmail_Lidos;

//------------------------------------------------------------
Campo_arqLogEmail_PercLidos.prototype = new Lance_CampoNumerico;

function Campo_arqLogEmail_PercLidos()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "PercLidos", "PercLidos", "PercLidos", 5, "##z,zz", true,"", "");
}

var PercLidos = new Campo_arqLogEmail_PercLidos;

//------------------------------------------------------------
Campo_arqLogEmail_EmailRemet.prototype = new Lance_CampoCadeia;

function Campo_arqLogEmail_EmailRemet()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "EmailRemet", "EmailRemet", "EmailRemet", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var EmailRemet = new Campo_arqLogEmail_EmailRemet;

//------------------------------------------------------------
Campo_arqLogEmail_HoraIni.prototype = new Lance_CampoHora;

function Campo_arqLogEmail_HoraIni()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "HoraIni", "HoraIni", "HoraIni", 6, "hh:mm:ss", true);
}

var HoraIni = new Campo_arqLogEmail_HoraIni;

//------------------------------------------------------------
Campo_arqLogEmail_HoraFim.prototype = new Lance_CampoHora;

function Campo_arqLogEmail_HoraFim()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "HoraFim", "HoraFim", "HoraFim", 6, "hh:mm:ss", true);
}

var HoraFim = new Campo_arqLogEmail_HoraFim;

//------------------------------------------------------------
Campo_arqLogEmail_HoraReenv.prototype = new Lance_CampoHora;

function Campo_arqLogEmail_HoraReenv()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "HoraReenv", "HoraReenv", "HoraReenv", 6, "hh:mm:ss", true);
}

var HoraReenv = new Campo_arqLogEmail_HoraReenv;

//------------------------------------------------------------
Campo_arqLogEmail_Enviou.prototype = new Lance_CampoLogico;

function Campo_arqLogEmail_Enviou()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Enviou", "Enviou", "Enviou");
}

var Enviou = new Campo_arqLogEmail_Enviou;

//------------------------------------------------------------
Campo_arqLogEmail_Opcao.prototype = new Lance_CampoNumerico;

function Campo_arqLogEmail_Opcao()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Opcao", "Opcao", "Opcao", 13, "#.###.###.###.##z", true,"", "");
}

var Opcao = new Campo_arqLogEmail_Opcao;

//------------------------------------------------------------
Campo_arqLogEmail_Cliente.prototype = new Lance_CampoHidden;

function Campo_arqLogEmail_Cliente()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cliente", "Cliente", "Cliente", "arqPessoa", "a_pessoa", null, "",7);
}

var Cliente = new Campo_arqLogEmail_Cliente;

//------------------------------------------------------------
Campo_arqLogEmail_Cliente_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqLogEmail_Cliente_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cliente_Nome", "Cliente_Nome", "Nome", Cliente, 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cliente_Nome = new Campo_arqLogEmail_Cliente_Nome;

//------------------------------------------------------------
Campo_arqLogEmail_Cliente_NumCelular.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqLogEmail_Cliente_NumCelular()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cliente_NumCelular", "Cliente_NumCelular", "NumCelular", Cliente, 11, "(##) #.####.####", true);
}

var Cliente_NumCelular = new Campo_arqLogEmail_Cliente_NumCelular;

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqLogEmail_Titulo.prototype.Cabecalho = function()
{
		return( "Título" );
}

Titulo.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqLogEmail_Titulo_Titulo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Titulo.Obrigatorio( p_comMsg ) );
}

Titulo_Titulo.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqLogEmail_Titulo_Versao.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Titulo.Obrigatorio( p_comMsg ) );
}

Titulo_Versao.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqLogEmail_Data.prototype.TemErro = function()
{
		if( tem(this) && ( !tem( HoraIni ) && quantosDias( HOJE, Data )  >0 ) )
	{
		alert( "Data não pode ser passada" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

Data.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqLogEmail_Hora.prototype.TemErro = function()
{
		if( tem(this) && ( !tem(HoraIni) && quantosDias(Data,HOJE)==0 && Hora+':00'< incHora(agora(),0,10,0) ) )
	{
		alert( "Hora inválida" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

Hora.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqLogEmail_Usuario.prototype.Cabecalho = function()
{
		return( "Enviado por" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqLogEmail_Usuario_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Usuario.Obrigatorio( p_comMsg ) );
}

Usuario_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqLogEmail_Enviados.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqLogEmail_NEnviados.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqLogEmail_NEnviados.prototype.Cabecalho = function()
{
		return( "Não enviados" );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqLogEmail_Total.prototype.Calculou = function()
{
{
	return( this.Atribuiu( Enviados + NEnviados ) );
}
}

Total.EhCalculado = true;
Lidos.EhCalculado = true;
Lidos.EhTotalizado = true;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqLogEmail_PercLidos.prototype.Calculou = function()
{
{
		if( Enviados > 0 )
	return( this.Atribuiu( ( Lidos * 100.0 ) / Enviados ) );
}
{
	return( this.Atribuiu( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqLogEmail_PercLidos.prototype.Cabecalho = function()
{
		return( "% Lidos" );
}

PercLidos.EhCalculado = true;
//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqLogEmail_EmailRemet.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqLogEmail_HoraIni.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqLogEmail_HoraIni.prototype.Cabecalho = function()
{
		return( "Início" );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqLogEmail_HoraFim.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqLogEmail_HoraFim.prototype.Cabecalho = function()
{
		return( "Final" );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqLogEmail_HoraReenv.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqLogEmail_HoraReenv.prototype.Cabecalho = function()
{
		return( "Reenvio" );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqLogEmail_Enviou.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqLogEmail_Enviou.prototype.Cabecalho = function()
{
		return( "Enviou [0]" );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqLogEmail_Opcao.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqLogEmail_Opcao.prototype.Cabecalho = function()
{
		return( "Opção [0]" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqLogEmail_Cliente_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cliente.Obrigatorio( p_comMsg ) );
}

Cliente_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqLogEmail_Cliente_NumCelular.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cliente.Obrigatorio( p_comMsg ) );
}

Cliente_NumCelular.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqLogEmail_Titulo.prototype.ExistenciaEspecial = function()
{
	return( ( !Titulo_Titulo.Obrigatorio( false ) || tem(Titulo_Titulo) ) && ( !Titulo_Versao.Obrigatorio( false ) || tem(Titulo_Versao) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqLogEmail_Usuario.prototype.ExistenciaEspecial = function()
{
	return( ( !Usuario_Usuario.Obrigatorio( false ) || tem(Usuario_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqLogEmail_Cliente.prototype.ExistenciaEspecial = function()
{
	return( ( !Cliente_Nome.Obrigatorio( false ) || tem(Cliente_Nome) ) && ( !Cliente_NumCelular.Obrigatorio( false ) || tem(Cliente_NumCelular) ) );
}

function IniciarDependencias_arqLogEmail()
{
Enviados.CalculosDependentes= [ Total,PercLidos ];
NEnviados.CalculosDependentes= [ Total ];
Lidos.CalculosDependentes= [ PercLidos ];
Titulo_Titulo.ExistenciasDependentes= [ Titulo ];
Titulo_Versao.ExistenciasDependentes= [ Titulo ];
Usuario_Usuario.ExistenciasDependentes= [ Usuario ];
Cliente_Nome.ExistenciasDependentes= [ Cliente ];
Cliente_NumCelular.ExistenciasDependentes= [ Cliente ];
Titulo_Versao.ErrosDependentes= [ Titulo ];
HoraIni.ErrosDependentes= [ Data,Hora ];
Data.ErrosDependentes= [ Hora ];
Usuario_Usuario.ErrosDependentes= [ Usuario ];
Cliente_NumCelular.ErrosDependentes= [ Cliente ];
Titulo.CamposChave= [ Titulo_Titulo,Titulo_Versao ];
Usuario.CamposChave= [ Usuario_Usuario ];
Cliente.CamposChave= [ Cliente_Nome,Cliente_NumCelular ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqLogEmail";
//------------------------------------------------------------
function ListaDeCampos_arqLogEmail( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Titulo, Titulo_Titulo, Titulo_Versao, Data, Hora, Usuario, Usuario_Usuario, Enviados, NEnviados, Total, Lidos, PercLidos, EmailRemet, HoraIni, HoraFim, HoraReenv, Enviou, Opcao, Cliente, Cliente_Nome, Cliente_NumCelular ]	);
	IniciarDependencias_arqLogEmail();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqLogEmail( '' );
g_idOperacao = 12;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Destinatários","","D",24,"","",1,"","1","a_itloge","arqItLogEmail","Folhear","LogEmail","?","","", "","", 0,13,[],[13]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
