/*=========================================================================
  a_xconfi - XConfig
	usa a_endere
=========================================================================*/

//------------------------------------------------------------
Campo_cnfXConfig_CPF.prototype = new Lance_CampoCadeia;

function Campo_cnfXConfig_CPF()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "CPF", "CPF", "CPF", 11, "###.###.###-##", true);
}

var CPF = new Campo_cnfXConfig_CPF;

//------------------------------------------------------------
Campo_cnfXConfig_LogAcesso.prototype = new Lance_CampoLogico;

function Campo_cnfXConfig_LogAcesso()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "LogAcesso", "LogAcesso", "LogAcesso");
}

var LogAcesso = new Campo_cnfXConfig_LogAcesso;

//------------------------------------------------------------
Campo_cnfXConfig_LogAcessoS.prototype = new Lance_CampoLogico;

function Campo_cnfXConfig_LogAcessoS()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "LogAcessoS", "LogAcessoS", "LogAcessoS");
}

var LogAcessoS = new Campo_cnfXConfig_LogAcessoS;

//------------------------------------------------------------
Campo_cnfXConfig_Qtd.prototype = new Lance_CampoNumerico;

function Campo_cnfXConfig_Qtd()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Qtd", "Qtd", "Qtd", 6, "###.##z", true,"", "");
}

var Qtd = new Campo_cnfXConfig_Qtd;

//------------------------------------------------------------
Campo_cnfXConfig_Qtd2.prototype = new Lance_CampoNumerico;

function Campo_cnfXConfig_Qtd2()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Qtd2", "Qtd2", "Qtd2", 6, "###.##z", true,"", "");
}

var Qtd2 = new Campo_cnfXConfig_Qtd2;

//------------------------------------------------------------
Campo_cnfXConfig_Empresa.prototype = new Lance_CampoCadeia;

function Campo_cnfXConfig_Empresa()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Empresa", "Empresa", "Empresa", 100, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Empresa = new Campo_cnfXConfig_Empresa;

//------------------------------------------------------------
IniciarPrefixos_domEndereco( "Ende_" );

//------------------------------------------------------------
Campo_cnfXConfig_CNPJ.prototype = new Lance_CampoCadeia;

function Campo_cnfXConfig_CNPJ()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "CNPJ", "CNPJ", "CNPJ", 14, "##.###.###/####-##", true);
}

var CNPJ = new Campo_cnfXConfig_CNPJ;

//------------------------------------------------------------
Campo_cnfXConfig_Email.prototype = new Lance_CampoCadeia;

function Campo_cnfXConfig_Email()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Email", "Email", "Email", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Email = new Campo_cnfXConfig_Email;

//------------------------------------------------------------
Campo_cnfXConfig_Site.prototype = new Lance_CampoCadeia;

function Campo_cnfXConfig_Site()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Site", "Site", "Site", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Site = new Campo_cnfXConfig_Site;

//------------------------------------------------------------
Campo_cnfXConfig_QtasDesmar.prototype = new Lance_CampoNumerico;

function Campo_cnfXConfig_QtasDesmar()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "QtasDesmar", "QtasDesmar", "QtasDesmar", 2, "#z", false,"", "");
}

var QtasDesmar = new Campo_cnfXConfig_QtasDesmar;

//------------------------------------------------------------
Campo_cnfXConfig_Declinar.prototype = new Lance_CampoNumerico;

function Campo_cnfXConfig_Declinar()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Declinar", "Declinar", "Declinar", 2, "#z", false,"", "");
}

var Declinar = new Campo_cnfXConfig_Declinar;

//------------------------------------------------------------
Campo_cnfXConfig_RecorDia.prototype = new Lance_CampoNumerico;

function Campo_cnfXConfig_RecorDia()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "RecorDia", "RecorDia", "RecorDia", 2, "#z", false,"", "");
}

var RecorDia = new Campo_cnfXConfig_RecorDia;

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_cnfXConfig_CPF.prototype.TemErro = function()
{
		if( tem(this) && ( !CpfOk( CPF ) ) )
	{
		alert( "CPF inválido" );
		return( true );
	}
	return( Lance_CampoNumerico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_LogAcesso.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_LogAcessoS.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_cnfXConfig_CNPJ.prototype.TemErro = function()
{
		if( tem(this) && ( !CnpjOk( CNPJ ) ) )
	{
		alert( "CNPJ inválido" );
		return( true );
	}
	return( Lance_CampoNumerico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_cnfXConfig_Email.prototype.TemErro = function()
{
		if( tem(this) && ( !EmailOk( Email ) ) )
	{
		alert( "Email inválido" );
		return( true );
	}
	return( Lance_CampoNumerico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_cnfXConfig_RecorDia.prototype.TemErro = function()
{
		if( tem(this) && ( RecorDia > 31 ) )
	{
		alert( "Dia inválido" );
		return( true );
	}
	return( Lance_CampoNumerico.prototype.TemErro.call( this ) );
}

function IniciarDependencias_cnfXConfig()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "cnfXConfig";
//------------------------------------------------------------
function ListaDeCampos_cnfXConfig( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ CPF, LogAcesso, LogAcessoS, Qtd, Qtd2, Empresa ], 
		ListaDeCampos_domEndereco( "Ende_" ), 
		[ CNPJ, Email, Site, QtasDesmar, Declinar, RecorDia ]	);
	IniciarDependencias_cnfXConfig();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_cnfXConfig( '' );
g_idOperacao = 17;
parent.navegacao.MenuPrincQtdOpcoes=0;
parent.navegacao.MenuPrincPodeSo1=1;
