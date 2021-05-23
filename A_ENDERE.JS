/*=========================================================================
  a_endere - Endereco
=========================================================================*/

//------------------------------------------------------------
Campo_domEndereco_CEP.prototype = new Lance_CampoCadeia;

function Campo_domEndereco_CEP()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "CEP", "CEP", "CEP", 8, "#####-###", true);
}

var CEP = new Campo_domEndereco_CEP;

//------------------------------------------------------------
Campo_domEndereco_Endereco.prototype = new Lance_CampoCadeia;

function Campo_domEndereco_Endereco()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Endereco", "Endereco", "Endereço", 80, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Endereco = new Campo_domEndereco_Endereco;

//------------------------------------------------------------
Campo_domEndereco_Bairro.prototype = new Lance_CampoHidden;

function Campo_domEndereco_Bairro()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Bairro", "Bairro", "Bairro", "arqBairro", "a_bairro", null, "",1);
}

var Bairro = new Campo_domEndereco_Bairro;

//------------------------------------------------------------
Campo_domEndereco_Bairro_Bairro.prototype = new Lance_CampoCadeiaLigado;

function Campo_domEndereco_Bairro_Bairro()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Bairro_Bairro", "Bairro_Bairro", "Bairro", Bairro, 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Bairro_Bairro = new Campo_domEndereco_Bairro_Bairro;

//------------------------------------------------------------
Campo_domEndereco_Cidade.prototype = new Lance_CampoHidden;

function Campo_domEndereco_Cidade()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cidade", "Cidade", "Cidade", "arqCidade", "a_cidade", null, "",2);
}

var Cidade = new Campo_domEndereco_Cidade;

//------------------------------------------------------------
Campo_domEndereco_Cidade_UF.prototype = new Lance_CampoLigado;

function Campo_domEndereco_Cidade_UF()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Cidade_UF", "Cidade_UF", "UF", "tabUF", "t_uf", Cidade, "",0);
}

var Cidade_UF = new Campo_domEndereco_Cidade_UF;

//------------------------------------------------------------
Campo_domEndereco_Cidade_UF_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_domEndereco_Cidade_UF_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cidade_UF_Chave", "Cidade_UF_Chave", "UF", Cidade_UF, 2, "uu", false);
}

var Cidade_UF_Chave = new Campo_domEndereco_Cidade_UF_Chave;

//------------------------------------------------------------
Campo_domEndereco_Cidade_UF_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_domEndereco_Cidade_UF_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cidade_UF_Descritor", "Cidade_UF_Descritor", "UF", Cidade_UF, 19, "xxxxxxxxxxxxxxxxxxx", false);
}

var Cidade_UF_Descritor = new Campo_domEndereco_Cidade_UF_Descritor;

//------------------------------------------------------------
Campo_domEndereco_Cidade_Cidade.prototype = new Lance_CampoCadeiaLigado;

function Campo_domEndereco_Cidade_Cidade()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cidade_Cidade", "Cidade_Cidade", "Cidade", Cidade, 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cidade_Cidade = new Campo_domEndereco_Cidade_Cidade;

//------------------------------------------------------------
Campo_domEndereco_DDD.prototype = new Lance_CampoNumerico;

function Campo_domEndereco_DDD()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "DDD", "DDD", "DDD", 2, "#z", false,"", "");
}

var DDD = new Campo_domEndereco_DDD;

//------------------------------------------------------------
Campo_domEndereco_Telefone.prototype = new Lance_CampoCadeia;

function Campo_domEndereco_Telefone()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Telefone", "Telefone", "Telefone", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Telefone = new Campo_domEndereco_Telefone;

//------------------------------------------------------------
Campo_domEndereco_DDDCelular.prototype = new Lance_CampoNumerico;

function Campo_domEndereco_DDDCelular()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "DDDCelular", "DDDCelular", "DDDCelular", 2, "#z", false,"", "");
}

var DDDCelular = new Campo_domEndereco_DDDCelular;

//------------------------------------------------------------
Campo_domEndereco_Celular.prototype = new Lance_CampoCadeia;

function Campo_domEndereco_Celular()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Celular", "Celular", "Celular", 9, "#.####.####", true);
}

var Celular = new Campo_domEndereco_Celular;

//------------------------------------------------------------
Campo_domEndereco_WhatsApp.prototype = new Lance_CampoLogico;

function Campo_domEndereco_WhatsApp()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "WhatsApp", "WhatsApp", "WhatsApp");
}

var WhatsApp = new Campo_domEndereco_WhatsApp;

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_domEndereco_Bairro_Bairro.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Bairro.Obrigatorio( p_comMsg ) );
}

Bairro_Bairro.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_domEndereco_Cidade_UF.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cidade.Obrigatorio( p_comMsg ) );
}

Cidade_UF.TipoCampo |= CAMPO_CHAVE_PAI;
Cidade_UF_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
Cidade_UF_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_domEndereco_Cidade_Cidade.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cidade.Obrigatorio( p_comMsg ) );
}

Cidade_Cidade.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_domEndereco_DDD.prototype.Calculou = function()
{
{
{
	if( !eval( this.Prefixo + 'Cidade' ).ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT DDD FROM arqCidade WHERE arqCidade.IdPrimario=( " + eval( this.Prefixo + 'Cidade' ).ValorAtual() + " )  )" + LANCE_SEPARADOR + this.Prefixo + "DDD" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_domEndereco_DDD.prototype.Existencia = function()
{
	return( tem( eval( this.Prefixo + 'Cidade' ) ) );
}

DDD.EhCalculado = true;
//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_domEndereco_Celular.prototype.Existencia = function()
{
	return( tem( eval( this.Prefixo + 'DDDCelular' ) ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_domEndereco_WhatsApp.prototype.Existencia = function()
{
	return( tem( eval( this.Prefixo + 'DDDCelular' ) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_domEndereco_Bairro.prototype.ExistenciaEspecial = function()
{
	return( ( !eval( this.Prefixo + 'Bairro_Bairro' ).Obrigatorio( false ) || tem(eval( this.Prefixo + 'Bairro_Bairro' )) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_domEndereco_Cidade.prototype.ExistenciaEspecial = function()
{
	return( ( !eval( this.Prefixo + 'Cidade_UF' ).Obrigatorio( false ) || tem(eval( this.Prefixo + 'Cidade_UF' )) ) && ( !eval( this.Prefixo + 'Cidade_Cidade' ).Obrigatorio( false ) || tem(eval( this.Prefixo + 'Cidade_Cidade' )) ) );
}

function IniciarDependencias_domEndereco()
{
eval( g_prefixo + "Cidade" ).CalculosDependentes= [ eval( g_prefixo + "DDD" ) ];
eval( g_prefixo + "Bairro_Bairro" ).ExistenciasDependentes= [ eval( g_prefixo + "Bairro" ) ];
eval( g_prefixo + "Cidade_UF" ).ExistenciasDependentes= [ eval( g_prefixo + "Cidade" ) ];
eval( g_prefixo + "Cidade_Cidade" ).ExistenciasDependentes= [ eval( g_prefixo + "Cidade" ) ];
eval( g_prefixo + "Cidade" ).ExistenciasDependentes= [ eval( g_prefixo + "DDD" ) ];
eval( g_prefixo + "DDDCelular" ).ExistenciasDependentes= [ eval( g_prefixo + "Celular" ),eval( g_prefixo + "WhatsApp" ) ];
eval( g_prefixo + "Bairro_Bairro" ).ErrosDependentes= [ eval( g_prefixo + "Bairro" ) ];
eval( g_prefixo + "Cidade_Cidade" ).ErrosDependentes= [ eval( g_prefixo + "Cidade" ) ];
eval( g_prefixo + "Bairro" ).CamposChave= [ eval( g_prefixo + "Bairro_Bairro" ) ];
eval( g_prefixo + "Cidade" ).CamposChave= [ eval( g_prefixo + "Cidade_UF" ),eval( g_prefixo + "Cidade_Cidade" ) ];
}

//------------------------------------------------------------
function ListaDeCampos_domEndereco( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ eval( this.Prefixo + 'CEP' ), eval( this.Prefixo + 'Endereco' ), eval( this.Prefixo + 'Bairro' ), eval( this.Prefixo + 'Bairro_Bairro' ), eval( this.Prefixo + 'Cidade' ), eval( this.Prefixo + 'Cidade_UF' ), eval( this.Prefixo + 'Cidade_UF_Chave' ), eval( this.Prefixo + 'Cidade_UF_Descritor' ), eval( this.Prefixo + 'Cidade_Cidade' ), eval( this.Prefixo + 'DDD' ), eval( this.Prefixo + 'Telefone' ), eval( this.Prefixo + 'DDDCelular' ), eval( this.Prefixo + 'Celular' ), eval( this.Prefixo + 'WhatsApp' ) ]	);
	IniciarDependencias_domEndereco();
	g_prefixo = l_prefixo;
	return( l_lista );
}

//------------------------------------------------------------
function IniciarPrefixos_domEndereco( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
eval( g_prefixo + "CEP = new Campo_domEndereco_CEP;" );
eval( g_prefixo + "Endereco = new Campo_domEndereco_Endereco;" );
eval( g_prefixo + "Bairro = new Campo_domEndereco_Bairro;" );
eval( g_prefixo + "Bairro_Bairro = new Campo_domEndereco_Bairro_Bairro;" );
eval( g_prefixo + "Cidade = new Campo_domEndereco_Cidade;" );
eval( g_prefixo + "Cidade_UF = new Campo_domEndereco_Cidade_UF;" );
eval( g_prefixo + "Cidade_UF_Chave = new Campo_domEndereco_Cidade_UF_Chave;" );
eval( g_prefixo + "Cidade_UF_Descritor = new Campo_domEndereco_Cidade_UF_Descritor;" );
eval( g_prefixo + "Cidade_Cidade = new Campo_domEndereco_Cidade_Cidade;" );
eval( g_prefixo + "DDD = new Campo_domEndereco_DDD;" );
eval( g_prefixo + "Telefone = new Campo_domEndereco_Telefone;" );
eval( g_prefixo + "DDDCelular = new Campo_domEndereco_DDDCelular;" );
eval( g_prefixo + "Celular = new Campo_domEndereco_Celular;" );
eval( g_prefixo + "WhatsApp = new Campo_domEndereco_WhatsApp;" );
	g_prefixo = l_prefixo;
}
