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
Campo_cnfXConfig_CCorRec.prototype = new Lance_CampoHidden;

function Campo_cnfXConfig_CCorRec()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "CCorRec", "CCorRec", "CCorRec", "arqCCor", "a_ccor", null, "",20);
}

var CCorRec = new Campo_cnfXConfig_CCorRec;

//------------------------------------------------------------
Campo_cnfXConfig_CCorRec_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_cnfXConfig_CCorRec_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "CCorRec_Nome", "CCorRec_Nome", "Nome", CCorRec, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var CCorRec_Nome = new Campo_cnfXConfig_CCorRec_Nome;

//------------------------------------------------------------
Campo_cnfXConfig_CCorAss.prototype = new Lance_CampoHidden;

function Campo_cnfXConfig_CCorAss()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "CCorAss", "CCorAss", "CCorAss", "arqCCor", "a_ccor", null, "",20);
}

var CCorAss = new Campo_cnfXConfig_CCorAss;

//------------------------------------------------------------
Campo_cnfXConfig_CCorAss_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_cnfXConfig_CCorAss_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "CCorAss_Nome", "CCorAss_Nome", "Nome", CCorAss, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var CCorAss_Nome = new Campo_cnfXConfig_CCorAss_Nome;

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
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
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
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
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
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
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
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_CCorRec_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( CCorRec.Obrigatorio( p_comMsg ) );
}

CCorRec_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_CCorAss_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( CCorAss.Obrigatorio( p_comMsg ) );
}

CCorAss_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaRRec.Obrigatorio( p_comMsg ) );
}

SubPlaRRec_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaRRec.Obrigatorio( p_comMsg ) );
}

SubPlaRRec_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlaRRec_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaRRec.Obrigatorio( p_comMsg ) );
}

SubPlaRRec_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlaRRec_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaRAss.Obrigatorio( p_comMsg ) );
}

SubPlaRAss_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaRAss.Obrigatorio( p_comMsg ) );
}

SubPlaRAss_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlaRAss_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
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
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_cnfXConfig_FornRec_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( FornRec.Obrigatorio( p_comMsg ) );
}

FornRec_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_CCorRec.prototype.ExistenciaEspecial = function()
{
	return( ( !CCorRec_Nome.Obrigatorio( false ) || tem(CCorRec_Nome) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_CCorAss.prototype.ExistenciaEspecial = function()
{
	return( ( !CCorAss_Nome.Obrigatorio( false ) || tem(CCorAss_Nome) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRRec_Plano.Obrigatorio( false ) || tem(SubPlaRRec_Plano) ) && ( !SubPlaRRec_Codigo.Obrigatorio( false ) || tem(SubPlaRRec_Codigo) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRRec_Plano_CodPlano.Obrigatorio( false ) || tem(SubPlaRRec_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRRec_Plano.Obrigatorio( false ) || tem(SubPlaRRec_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRRec_Nome.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRRec.Obrigatorio( false ) || tem(SubPlaRRec) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRAss_Plano.Obrigatorio( false ) || tem(SubPlaRAss_Plano) ) && ( !SubPlaRAss_Codigo.Obrigatorio( false ) || tem(SubPlaRAss_Codigo) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRAss_Plano_CodPlano.Obrigatorio( false ) || tem(SubPlaRAss_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRAss_Plano.Obrigatorio( false ) || tem(SubPlaRAss_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_SubPlaRAss_Nome.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaRAss.Obrigatorio( false ) || tem(SubPlaRAss) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_cnfXConfig_FornRec.prototype.ExistenciaEspecial = function()
{
	return( ( !FornRec_Nome.Obrigatorio( false ) || tem(FornRec_Nome) ) );
}

function IniciarDependencias_cnfXConfig()
{
CCorRec_Nome.ExistenciasDependentes= [ CCorRec ];
CCorAss_Nome.ExistenciasDependentes= [ CCorAss ];
SubPlaRRec_Plano.ExistenciasDependentes= [ SubPlaRRec,SubPlaRRec_Plano_Plano ];
SubPlaRRec_Plano_CodPlano.ExistenciasDependentes= [ SubPlaRRec_Plano ];
SubPlaRRec_Codigo.ExistenciasDependentes= [ SubPlaRRec ];
SubPlaRRec.ExistenciasDependentes= [ SubPlaRRec_Nome ];
SubPlaRAss_Plano.ExistenciasDependentes= [ SubPlaRAss,SubPlaRAss_Plano_Plano ];
SubPlaRAss_Plano_CodPlano.ExistenciasDependentes= [ SubPlaRAss_Plano ];
SubPlaRAss_Codigo.ExistenciasDependentes= [ SubPlaRAss ];
SubPlaRAss.ExistenciasDependentes= [ SubPlaRAss_Nome ];
FornRec_Nome.ExistenciasDependentes= [ FornRec ];
CCorRec_Nome.ErrosDependentes= [ CCorRec ];
CCorAss_Nome.ErrosDependentes= [ CCorAss ];
SubPlaRRec_Plano_CodPlano.ErrosDependentes= [ SubPlaRRec_Plano ];
SubPlaRRec_Codigo.ErrosDependentes= [ SubPlaRRec ];
SubPlaRAss_Plano_CodPlano.ErrosDependentes= [ SubPlaRAss_Plano ];
SubPlaRAss_Codigo.ErrosDependentes= [ SubPlaRAss ];
FornRec_Nome.ErrosDependentes= [ FornRec ];
SubPlaRRec_Plano.DescritoresDependentes= [ SubPlaRRec_Plano_Plano ];
SubPlaRRec.DescritoresDependentes= [ SubPlaRRec_Nome ];
SubPlaRAss_Plano.DescritoresDependentes= [ SubPlaRAss_Plano_Plano ];
SubPlaRAss.DescritoresDependentes= [ SubPlaRAss_Nome ];
CCorRec.CamposChave= [ CCorRec_Nome ];
CCorAss.CamposChave= [ CCorAss_Nome ];
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

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ CPF, LogAcesso, LogAcessoS, Qtd, Qtd2, Empresa ], 
		ListaDeCampos_domEndereco( "Ende_" ), 
		[ CNPJ, Email, Site, QtasDesmar, Declinar, RecorDia, CCorRec, CCorRec_Nome, CCorAss, CCorAss_Nome, SubPlaRRec, SubPlaRRec_Plano, SubPlaRRec_Plano_CodPlano, SubPlaRRec_Plano_Plano, SubPlaRRec_Codigo, SubPlaRRec_Nome, SubPlaRAss, SubPlaRAss_Plano, SubPlaRAss_Plano_CodPlano, SubPlaRAss_Plano_Plano, SubPlaRAss_Codigo, SubPlaRAss_Nome, FornRec, FornRec_Nome ]	);
	IniciarDependencias_cnfXConfig();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_cnfXConfig( '' );
g_idOperacao = 17;
parent.navegacao.MenuPrincQtdOpcoes=0;
parent.navegacao.MenuPrincPodeSo1=1;
