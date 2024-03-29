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

//------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec.prototype = new Lance_CampoHidden;

function Campo_cnfXConfig_SubPlaRRec()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlaRRec", "SubPlaRRec", "SubPlaRRec", "arqSubPlano", "a_subpla", null, "",28);
}

var SubPlaRRec = new Campo_cnfXConfig_SubPlaRRec;

//------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Plano.prototype = new Lance_CampoHidden;

function Campo_cnfXConfig_SubPlaRRec_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlaRRec_Plano", "SubPlaRRec_Plano", "Plano", "arqPlano", "a_plano", SubPlaRRec, "",27);
}

var SubPlaRRec_Plano = new Campo_cnfXConfig_SubPlaRRec_Plano;

//------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_cnfXConfig_SubPlaRRec_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "SubPlaRRec_Plano_CodPlano", "SubPlaRRec_Plano_CodPlano", "CodPlano", SubPlaRRec_Plano, 2, "zz", false,"", "");
}

var SubPlaRRec_Plano_CodPlano = new Campo_cnfXConfig_SubPlaRRec_Plano_CodPlano;

//------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_cnfXConfig_SubPlaRRec_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlaRRec_Plano_Plano", "SubPlaRRec_Plano_Plano", "Plano", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SubPlaRRec_Plano_Plano = new Campo_cnfXConfig_SubPlaRRec_Plano_Plano;

//------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_cnfXConfig_SubPlaRRec_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "SubPlaRRec_Codigo", "SubPlaRRec_Codigo", "Codigo", SubPlaRRec, 6, "##.##.##", true);
}

var SubPlaRRec_Codigo = new Campo_cnfXConfig_SubPlaRRec_Codigo;

//------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Nome.prototype = new Lance_CampoCadeia;

function Campo_cnfXConfig_SubPlaRRec_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlaRRec_Nome", "SubPlaRRec_Nome", "Nome", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SubPlaRRec_Nome = new Campo_cnfXConfig_SubPlaRRec_Nome;

//------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss.prototype = new Lance_CampoHidden;

function Campo_cnfXConfig_SubPlaRAss()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlaRAss", "SubPlaRAss", "SubPlaRAss", "arqSubPlano", "a_subpla", null, "",28);
}

var SubPlaRAss = new Campo_cnfXConfig_SubPlaRAss;

//------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Plano.prototype = new Lance_CampoHidden;

function Campo_cnfXConfig_SubPlaRAss_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlaRAss_Plano", "SubPlaRAss_Plano", "Plano", "arqPlano", "a_plano", SubPlaRAss, "",27);
}

var SubPlaRAss_Plano = new Campo_cnfXConfig_SubPlaRAss_Plano;

//------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_cnfXConfig_SubPlaRAss_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "SubPlaRAss_Plano_CodPlano", "SubPlaRAss_Plano_CodPlano", "CodPlano", SubPlaRAss_Plano, 2, "zz", false,"", "");
}

var SubPlaRAss_Plano_CodPlano = new Campo_cnfXConfig_SubPlaRAss_Plano_CodPlano;

//------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_cnfXConfig_SubPlaRAss_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlaRAss_Plano_Plano", "SubPlaRAss_Plano_Plano", "Plano", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SubPlaRAss_Plano_Plano = new Campo_cnfXConfig_SubPlaRAss_Plano_Plano;

//------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_cnfXConfig_SubPlaRAss_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "SubPlaRAss_Codigo", "SubPlaRAss_Codigo", "Codigo", SubPlaRAss, 6, "##.##.##", true);
}

var SubPlaRAss_Codigo = new Campo_cnfXConfig_SubPlaRAss_Codigo;

//------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Nome.prototype = new Lance_CampoCadeia;

function Campo_cnfXConfig_SubPlaRAss_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlaRAss_Nome", "SubPlaRAss_Nome", "Nome", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SubPlaRAss_Nome = new Campo_cnfXConfig_SubPlaRAss_Nome;

//------------------------------------------------------------
Campo_cnfXConfig_FornRec.prototype = new Lance_CampoHidden;

function Campo_cnfXConfig_FornRec()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "FornRec", "FornRec", "FornRec", "arqFornecedor", "a_fornec", null, "",42);
}

var FornRec = new Campo_cnfXConfig_FornRec;

//------------------------------------------------------------
Campo_cnfXConfig_FornRec_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_cnfXConfig_FornRec_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "FornRec_Nome", "FornRec_Nome", "Nome", FornRec, 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var FornRec_Nome = new Campo_cnfXConfig_FornRec_Nome;

//------------------------------------------------------------
Campo_cnfXConfig_BoletoMin.prototype = new Lance_CampoNumerico;

function Campo_cnfXConfig_BoletoMin()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "BoletoMin", "BoletoMin", "BoletoMin", 8, "###.##z,zz", true,"", "");
}

var BoletoMin = new Campo_cnfXConfig_BoletoMin;

//------------------------------------------------------------
Campo_cnfXConfig_DiasSdEntr.prototype = new Lance_CampoNumerico;

function Campo_cnfXConfig_DiasSdEntr()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "DiasSdEntr", "DiasSdEntr", "DiasSdEntr", 2, "#z", false,"", "");
}

var DiasSdEntr = new Campo_cnfXConfig_DiasSdEntr;

//-------------------------------------------------------------
// Condi��o de erro do campo
//-------------------------------------------------------------
Campo_cnfXConfig_CPF.prototype.TemErro = function()
{
		if( tem(this) && ( !CpfOk( CPF ) ) )
	{
		alert( "CPF inv�lido" );
		return( true );
	}
	return( Lance_CampoNumerico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_LogAcesso.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_LogAcessoS.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Condi��o de erro do campo
//-------------------------------------------------------------
Campo_cnfXConfig_CNPJ.prototype.TemErro = function()
{
		if( tem(this) && ( !CnpjOk( CNPJ ) ) )
	{
		alert( "CNPJ inv�lido" );
		return( true );
	}
	return( Lance_CampoNumerico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condi��o de erro do campo
//-------------------------------------------------------------
Campo_cnfXConfig_Email.prototype.TemErro = function()
{
		if( tem(this) && ( !EmailOk( Email ) ) )
	{
		alert( "Email inv�lido" );
		return( true );
	}
	return( Lance_CampoNumerico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condi��o de erro do campo
//-------------------------------------------------------------
Campo_cnfXConfig_RecorDia.prototype.TemErro = function()
{
		if( tem(this) && ( RecorDia > 31 ) )
	{
		alert( "Dia inv�lido" );
		return( true );
	}
	return( Lance_CampoNumerico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaRRec.Obrigatorio( p_comMsg ) );
}

SubPlaRRec_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaRRec.Obrigatorio( p_comMsg ) );
}

SubPlaRRec_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlaRRec_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaRRec.Obrigatorio( p_comMsg ) );
}

SubPlaRRec_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlaRRec_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaRAss.Obrigatorio( p_comMsg ) );
}

SubPlaRAss_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaRAss.Obrigatorio( p_comMsg ) );
}

SubPlaRAss_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlaRAss_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaRAss.Obrigatorio( p_comMsg ) );
}

SubPlaRAss_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlaRAss_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_cnfXConfig_FornRec.prototype.FiltroPai = function()
{
			return( "A.Ativo = 1" );
}

//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_FornRec_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( FornRec.Obrigatorio( p_comMsg ) );
}

FornRec_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condi��o de erro do campo
//-------------------------------------------------------------
Campo_cnfXConfig_DiasSdEntr.prototype.TemErro = function()
{
		if( tem(this) && ( DiasSdEntr > 30 ) )
	{
		alert( "O valor precisa ser menor do que 30" );
		return( true );
	}
	return( Lance_CampoNumerico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRRec_Plano.Obrigatorio( false ) || tem(SubPlaRRec_Plano) ) && ( !SubPlaRRec_Codigo.Obrigatorio( false ) || tem(SubPlaRRec_Codigo) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRRec_Plano_CodPlano.Obrigatorio( false ) || tem(SubPlaRRec_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRRec_Plano.Obrigatorio( false ) || tem(SubPlaRRec_Plano) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Nome.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRRec.Obrigatorio( false ) || tem(SubPlaRRec) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRAss_Plano.Obrigatorio( false ) || tem(SubPlaRAss_Plano) ) && ( !SubPlaRAss_Codigo.Obrigatorio( false ) || tem(SubPlaRAss_Codigo) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRAss_Plano_CodPlano.Obrigatorio( false ) || tem(SubPlaRAss_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRAss_Plano.Obrigatorio( false ) || tem(SubPlaRAss_Plano) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Nome.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRAss.Obrigatorio( false ) || tem(SubPlaRAss) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_FornRec.prototype.ExistenciaEspecial = function()
{
	return( ( !FornRec_Nome.Obrigatorio( false ) || tem(FornRec_Nome) ) );
}

function IniciarDependencias_cnfXConfig()
{
SubPlaRRec_Plano.ExistenciasDependentes= [ SubPlaRRec,SubPlaRRec_Plano_Plano ];
SubPlaRRec_Plano_CodPlano.ExistenciasDependentes= [ SubPlaRRec_Plano ];
SubPlaRRec_Codigo.ExistenciasDependentes= [ SubPlaRRec ];
SubPlaRRec.ExistenciasDependentes= [ SubPlaRRec_Nome ];
SubPlaRAss_Plano.ExistenciasDependentes= [ SubPlaRAss,SubPlaRAss_Plano_Plano ];
SubPlaRAss_Plano_CodPlano.ExistenciasDependentes= [ SubPlaRAss_Plano ];
SubPlaRAss_Codigo.ExistenciasDependentes= [ SubPlaRAss ];
SubPlaRAss.ExistenciasDependentes= [ SubPlaRAss_Nome ];
FornRec_Nome.ExistenciasDependentes= [ FornRec ];
SubPlaRRec_Plano_CodPlano.ErrosDependentes= [ SubPlaRRec_Plano ];
SubPlaRRec_Codigo.ErrosDependentes= [ SubPlaRRec ];
SubPlaRAss_Plano_CodPlano.ErrosDependentes= [ SubPlaRAss_Plano ];
SubPlaRAss_Codigo.ErrosDependentes= [ SubPlaRAss ];
FornRec_Nome.ErrosDependentes= [ FornRec ];
SubPlaRRec_Plano.DescritoresDependentes= [ SubPlaRRec_Plano_Plano ];
SubPlaRRec.DescritoresDependentes= [ SubPlaRRec_Nome ];
SubPlaRAss_Plano.DescritoresDependentes= [ SubPlaRAss_Plano_Plano ];
SubPlaRAss.DescritoresDependentes= [ SubPlaRAss_Nome ];
SubPlaRRec.CamposChave= [ SubPlaRRec_Plano,SubPlaRRec_Codigo ];
SubPlaRRec_Plano.CamposChave= [ SubPlaRRec_Plano_CodPlano ];
SubPlaRAss.CamposChave= [ SubPlaRAss_Plano,SubPlaRAss_Codigo ];
SubPlaRAss_Plano.CamposChave= [ SubPlaRAss_Plano_CodPlano ];
FornRec.CamposChave= [ FornRec_Nome ];
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

	var l_lista = []
	l_lista = l_lista.concat(

		[ CPF, LogAcesso, LogAcessoS, Qtd, Qtd2, Empresa ], 
		ListaDeCampos_domEndereco( "Ende_" ), 
		[ CNPJ, Email, Site, QtasDesmar, Declinar, RecorDia, SubPlaRRec, SubPlaRRec_Plano, SubPlaRRec_Plano_CodPlano, SubPlaRRec_Plano_Plano, SubPlaRRec_Codigo, SubPlaRRec_Nome, SubPlaRAss, SubPlaRAss_Plano, SubPlaRAss_Plano_CodPlano, SubPlaRAss_Plano_Plano, SubPlaRAss_Codigo, SubPlaRAss_Nome, FornRec, FornRec_Nome, BoletoMin, DiasSdEntr ]	);
	IniciarDependencias_cnfXConfig();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_cnfXConfig( '' );
g_idOperacao = 17;
parent.navegacao.MenuPrincQtdOpcoes=0;
parent.navegacao.MenuPrincPodeSo1=1;
