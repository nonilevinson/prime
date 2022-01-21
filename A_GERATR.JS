/*=========================================================================
  a_geratr - GeraTransf
=========================================================================*/

//------------------------------------------------------------
Campo_parGeraTransf_Emissao.prototype = new Lance_CampoData;

function Campo_parGeraTransf_Emissao()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Emissao", "Emissao", "Emissao", 8, "dd/mm/aaaa", true);
}

var Emissao = new Campo_parGeraTransf_Emissao;

//------------------------------------------------------------
Campo_parGeraTransf_Vencimento.prototype = new Lance_CampoData;

function Campo_parGeraTransf_Vencimento()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Vencimento", "Vencimento", "Vencimento", 8, "dd/mm/aaaa", true);
}

var Vencimento = new Campo_parGeraTransf_Vencimento;

//------------------------------------------------------------
Campo_parGeraTransf_Valor.prototype = new Lance_CampoNumerico;

function Campo_parGeraTransf_Valor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor", "Valor", "Valor", 8, "###.##z,zz", true,"", "");
}

var Valor = new Campo_parGeraTransf_Valor;

//------------------------------------------------------------
Campo_parGeraTransf_ForneDB.prototype = new Lance_CampoHidden;

function Campo_parGeraTransf_ForneDB()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "ForneDB", "ForneDB", "ForneDB", "arqFornecedor", "a_fornec", null, "",42);
}

var ForneDB = new Campo_parGeraTransf_ForneDB;

//------------------------------------------------------------
Campo_parGeraTransf_ForneDB_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_ForneDB_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "ForneDB_Nome", "ForneDB_Nome", "Nome", ForneDB, 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var ForneDB_Nome = new Campo_parGeraTransf_ForneDB_Nome;

//------------------------------------------------------------
Campo_parGeraTransf_CCorDB.prototype = new Lance_CampoHidden;

function Campo_parGeraTransf_CCorDB()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "CCorDB", "CCorDB", "CCorDB", "arqCCor", "a_ccor", null, "",20);
}

var CCorDB = new Campo_parGeraTransf_CCorDB;

//------------------------------------------------------------
Campo_parGeraTransf_CCorDB_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_CCorDB_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "CCorDB_Nome", "CCorDB_Nome", "Nome", CCorDB, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var CCorDB_Nome = new Campo_parGeraTransf_CCorDB_Nome;

//------------------------------------------------------------
Campo_parGeraTransf_SubPlaDB.prototype = new Lance_CampoHidden;

function Campo_parGeraTransf_SubPlaDB()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlaDB", "SubPlaDB", "SubPlaDB", "arqSubPlano", "a_subpla", null, "",28);
}

var SubPlaDB = new Campo_parGeraTransf_SubPlaDB;

//------------------------------------------------------------
Campo_parGeraTransf_SubPlaDB_Plano.prototype = new Lance_CampoHidden;

function Campo_parGeraTransf_SubPlaDB_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlaDB_Plano", "SubPlaDB_Plano", "Plano", "arqPlano", "a_plano", SubPlaDB, "",27);
}

var SubPlaDB_Plano = new Campo_parGeraTransf_SubPlaDB_Plano;

//------------------------------------------------------------
Campo_parGeraTransf_SubPlaDB_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraTransf_SubPlaDB_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "SubPlaDB_Plano_CodPlano", "SubPlaDB_Plano_CodPlano", "CodPlano", SubPlaDB_Plano, 2, "zz", false,"", "");
}

var SubPlaDB_Plano_CodPlano = new Campo_parGeraTransf_SubPlaDB_Plano_CodPlano;

//------------------------------------------------------------
Campo_parGeraTransf_SubPlaDB_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parGeraTransf_SubPlaDB_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlaDB_Plano_Plano", "SubPlaDB_Plano_Plano", "Plano", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SubPlaDB_Plano_Plano = new Campo_parGeraTransf_SubPlaDB_Plano_Plano;

//------------------------------------------------------------
Campo_parGeraTransf_SubPlaDB_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_SubPlaDB_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "SubPlaDB_Codigo", "SubPlaDB_Codigo", "Codigo", SubPlaDB, 6, "##.##.##", true);
}

var SubPlaDB_Codigo = new Campo_parGeraTransf_SubPlaDB_Codigo;

//------------------------------------------------------------
Campo_parGeraTransf_SubPlaDB_Nome.prototype = new Lance_CampoCadeia;

function Campo_parGeraTransf_SubPlaDB_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlaDB_Nome", "SubPlaDB_Nome", "Nome", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SubPlaDB_Nome = new Campo_parGeraTransf_SubPlaDB_Nome;

//------------------------------------------------------------
Campo_parGeraTransf_HistDB.prototype = new Lance_CampoCadeia;

function Campo_parGeraTransf_HistDB()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "HistDB", "HistDB", "HistDB", 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var HistDB = new Campo_parGeraTransf_HistDB;

//------------------------------------------------------------
Campo_parGeraTransf_TFCobraDB.prototype = new Lance_CampoLigado;

function Campo_parGeraTransf_TFCobraDB()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TFCobraDB", "TFCobraDB", "TFCobraDB", "tabTFCobra", "t_tfcobr", null, "",0);
}

var TFCobraDB = new Campo_parGeraTransf_TFCobraDB;

//------------------------------------------------------------
Campo_parGeraTransf_TFCobraDB_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_TFCobraDB_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFCobraDB_Chave", "TFCobraDB_Chave", "TFCobraDB", TFCobraDB, 1, "u", false);
}

var TFCobraDB_Chave = new Campo_parGeraTransf_TFCobraDB_Chave;

//------------------------------------------------------------
Campo_parGeraTransf_TFCobraDB_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_TFCobraDB_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFCobraDB_Descritor", "TFCobraDB_Descritor", "TFCobraDB", TFCobraDB, 10, "xxxxxxxxxx", false);
}

var TFCobraDB_Descritor = new Campo_parGeraTransf_TFCobraDB_Descritor;

//------------------------------------------------------------
Campo_parGeraTransf_TFPagtoDB.prototype = new Lance_CampoLigado;

function Campo_parGeraTransf_TFPagtoDB()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TFPagtoDB", "TFPagtoDB", "TFPagtoDB", "tabTFPagto", "t_tfpagt", null, "",0);
}

var TFPagtoDB = new Campo_parGeraTransf_TFPagtoDB;

//------------------------------------------------------------
Campo_parGeraTransf_TFPagtoDB_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_TFPagtoDB_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFPagtoDB_Chave", "TFPagtoDB_Chave", "TFPagtoDB", TFPagtoDB, 1, "u", false);
}

var TFPagtoDB_Chave = new Campo_parGeraTransf_TFPagtoDB_Chave;

//------------------------------------------------------------
Campo_parGeraTransf_TFPagtoDB_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_TFPagtoDB_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFPagtoDB_Descritor", "TFPagtoDB_Descritor", "TFPagtoDB", TFPagtoDB, 8, "xxxxxxxx", false);
}

var TFPagtoDB_Descritor = new Campo_parGeraTransf_TFPagtoDB_Descritor;

//------------------------------------------------------------
Campo_parGeraTransf_TDetPgDB.prototype = new Lance_CampoLigado;

function Campo_parGeraTransf_TDetPgDB()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TDetPgDB", "TDetPgDB", "TDetPgDB", "tabTDetPg", "t_tdetpg", null, "",0);
}

var TDetPgDB = new Campo_parGeraTransf_TDetPgDB;

//------------------------------------------------------------
Campo_parGeraTransf_TDetPgDB_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_TDetPgDB_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TDetPgDB_Chave", "TDetPgDB_Chave", "TDetPgDB", TDetPgDB, 1, "u", false);
}

var TDetPgDB_Chave = new Campo_parGeraTransf_TDetPgDB_Chave;

//------------------------------------------------------------
Campo_parGeraTransf_TDetPgDB_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_TDetPgDB_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TDetPgDB_Descritor", "TDetPgDB_Descritor", "TDetPgDB", TDetPgDB, 14, "xxxxxxxxxxxxxx", false);
}

var TDetPgDB_Descritor = new Campo_parGeraTransf_TDetPgDB_Descritor;

//------------------------------------------------------------
Campo_parGeraTransf_ForneCR.prototype = new Lance_CampoHidden;

function Campo_parGeraTransf_ForneCR()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "ForneCR", "ForneCR", "ForneCR", "arqFornecedor", "a_fornec", null, "",42);
}

var ForneCR = new Campo_parGeraTransf_ForneCR;

//------------------------------------------------------------
Campo_parGeraTransf_ForneCR_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_ForneCR_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "ForneCR_Nome", "ForneCR_Nome", "Nome", ForneCR, 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var ForneCR_Nome = new Campo_parGeraTransf_ForneCR_Nome;

//------------------------------------------------------------
Campo_parGeraTransf_CCorCR.prototype = new Lance_CampoHidden;

function Campo_parGeraTransf_CCorCR()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "CCorCR", "CCorCR", "CCorCR", "arqCCor", "a_ccor", null, "",20);
}

var CCorCR = new Campo_parGeraTransf_CCorCR;

//------------------------------------------------------------
Campo_parGeraTransf_CCorCR_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_CCorCR_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "CCorCR_Nome", "CCorCR_Nome", "Nome", CCorCR, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var CCorCR_Nome = new Campo_parGeraTransf_CCorCR_Nome;

//------------------------------------------------------------
Campo_parGeraTransf_SubPlaCR.prototype = new Lance_CampoHidden;

function Campo_parGeraTransf_SubPlaCR()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlaCR", "SubPlaCR", "SubPlaCR", "arqSubPlano", "a_subpla", null, "",28);
}

var SubPlaCR = new Campo_parGeraTransf_SubPlaCR;

//------------------------------------------------------------
Campo_parGeraTransf_SubPlaCR_Plano.prototype = new Lance_CampoHidden;

function Campo_parGeraTransf_SubPlaCR_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlaCR_Plano", "SubPlaCR_Plano", "Plano", "arqPlano", "a_plano", SubPlaCR, "",27);
}

var SubPlaCR_Plano = new Campo_parGeraTransf_SubPlaCR_Plano;

//------------------------------------------------------------
Campo_parGeraTransf_SubPlaCR_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraTransf_SubPlaCR_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "SubPlaCR_Plano_CodPlano", "SubPlaCR_Plano_CodPlano", "CodPlano", SubPlaCR_Plano, 2, "zz", false,"", "");
}

var SubPlaCR_Plano_CodPlano = new Campo_parGeraTransf_SubPlaCR_Plano_CodPlano;

//------------------------------------------------------------
Campo_parGeraTransf_SubPlaCR_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parGeraTransf_SubPlaCR_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlaCR_Plano_Plano", "SubPlaCR_Plano_Plano", "Plano", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SubPlaCR_Plano_Plano = new Campo_parGeraTransf_SubPlaCR_Plano_Plano;

//------------------------------------------------------------
Campo_parGeraTransf_SubPlaCR_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_SubPlaCR_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "SubPlaCR_Codigo", "SubPlaCR_Codigo", "Codigo", SubPlaCR, 6, "##.##.##", true);
}

var SubPlaCR_Codigo = new Campo_parGeraTransf_SubPlaCR_Codigo;

//------------------------------------------------------------
Campo_parGeraTransf_SubPlaCR_Nome.prototype = new Lance_CampoCadeia;

function Campo_parGeraTransf_SubPlaCR_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlaCR_Nome", "SubPlaCR_Nome", "Nome", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SubPlaCR_Nome = new Campo_parGeraTransf_SubPlaCR_Nome;

//------------------------------------------------------------
Campo_parGeraTransf_HistCR.prototype = new Lance_CampoCadeia;

function Campo_parGeraTransf_HistCR()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "HistCR", "HistCR", "HistCR", 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var HistCR = new Campo_parGeraTransf_HistCR;

//------------------------------------------------------------
Campo_parGeraTransf_TFCobraCR.prototype = new Lance_CampoLigado;

function Campo_parGeraTransf_TFCobraCR()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TFCobraCR", "TFCobraCR", "TFCobraCR", "tabTFCobra", "t_tfcobr", null, "",0);
}

var TFCobraCR = new Campo_parGeraTransf_TFCobraCR;

//------------------------------------------------------------
Campo_parGeraTransf_TFCobraCR_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_TFCobraCR_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFCobraCR_Chave", "TFCobraCR_Chave", "TFCobraCR", TFCobraCR, 1, "u", false);
}

var TFCobraCR_Chave = new Campo_parGeraTransf_TFCobraCR_Chave;

//------------------------------------------------------------
Campo_parGeraTransf_TFCobraCR_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_TFCobraCR_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFCobraCR_Descritor", "TFCobraCR_Descritor", "TFCobraCR", TFCobraCR, 10, "xxxxxxxxxx", false);
}

var TFCobraCR_Descritor = new Campo_parGeraTransf_TFCobraCR_Descritor;

//------------------------------------------------------------
Campo_parGeraTransf_TFPagtoCR.prototype = new Lance_CampoLigado;

function Campo_parGeraTransf_TFPagtoCR()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TFPagtoCR", "TFPagtoCR", "TFPagtoCR", "tabTFPagto", "t_tfpagt", null, "",0);
}

var TFPagtoCR = new Campo_parGeraTransf_TFPagtoCR;

//------------------------------------------------------------
Campo_parGeraTransf_TFPagtoCR_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_TFPagtoCR_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFPagtoCR_Chave", "TFPagtoCR_Chave", "TFPagtoCR", TFPagtoCR, 1, "u", false);
}

var TFPagtoCR_Chave = new Campo_parGeraTransf_TFPagtoCR_Chave;

//------------------------------------------------------------
Campo_parGeraTransf_TFPagtoCR_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_TFPagtoCR_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFPagtoCR_Descritor", "TFPagtoCR_Descritor", "TFPagtoCR", TFPagtoCR, 8, "xxxxxxxx", false);
}

var TFPagtoCR_Descritor = new Campo_parGeraTransf_TFPagtoCR_Descritor;

//------------------------------------------------------------
Campo_parGeraTransf_TDetPgCR.prototype = new Lance_CampoLigado;

function Campo_parGeraTransf_TDetPgCR()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TDetPgCR", "TDetPgCR", "TDetPgCR", "tabTDetPg", "t_tdetpg", null, "",0);
}

var TDetPgCR = new Campo_parGeraTransf_TDetPgCR;

//------------------------------------------------------------
Campo_parGeraTransf_TDetPgCR_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_TDetPgCR_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TDetPgCR_Chave", "TDetPgCR_Chave", "TDetPgCR", TDetPgCR, 1, "u", false);
}

var TDetPgCR_Chave = new Campo_parGeraTransf_TDetPgCR_Chave;

//------------------------------------------------------------
Campo_parGeraTransf_TDetPgCR_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraTransf_TDetPgCR_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TDetPgCR_Descritor", "TDetPgCR_Descritor", "TDetPgCR", TDetPgCR, 14, "xxxxxxxxxxxxxx", false);
}

var TDetPgCR_Descritor = new Campo_parGeraTransf_TDetPgCR_Descritor;

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_Emissao.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( HOJE ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraTransf_Emissao.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A emissão é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_Vencimento.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Emissao ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraTransf_Vencimento.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraTransf_Valor.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O valor é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraTransf_ForneDB.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O fornecedor do débito é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraTransf_ForneDB_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( ForneDB.Obrigatorio( p_comMsg ) );
}

ForneDB_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraTransf_CCorDB.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A conta corrente que será debitada é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraTransf_CCorDB_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( CCorDB.Obrigatorio( p_comMsg ) );
}

CCorDB_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaDB.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O subplano de contas é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaDB_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaDB.Obrigatorio( p_comMsg ) );
}

SubPlaDB_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaDB_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaDB.Obrigatorio( p_comMsg ) );
}

SubPlaDB_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlaDB_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaDB_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaDB.Obrigatorio( p_comMsg ) );
}

SubPlaDB_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlaDB_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraTransf_TFCobraDB.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A forma de cobrança do débito é obrigatória" );
		return( true );
	}
}

TFCobraDB_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TFCobraDB_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraTransf_TFPagtoDB.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A forma de pagamento do débito é obrigatória" );
		return( true );
	}
}

TFPagtoDB_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TFPagtoDB_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
TDetPgDB_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TDetPgDB_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_ForneCR.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( ForneDB ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraTransf_ForneCR.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O fornecedor do crédito é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraTransf_ForneCR_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( ForneCR.Obrigatorio( p_comMsg ) );
}

ForneCR_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraTransf_CCorCR.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A conta corrente do crédito é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraTransf_CCorCR_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( CCorCR.Obrigatorio( p_comMsg ) );
}

CCorCR_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaCR.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O subplano de contas é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaCR_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaCR.Obrigatorio( p_comMsg ) );
}

SubPlaCR_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaCR_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaCR.Obrigatorio( p_comMsg ) );
}

SubPlaCR_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlaCR_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaCR_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlaCR.Obrigatorio( p_comMsg ) );
}

SubPlaCR_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlaCR_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraTransf_TFCobraCR.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A forma de cobrança do crédito é obrigatória" );
		return( true );
	}
}

TFCobraCR_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TFCobraCR_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraTransf_TFPagtoCR.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A forma de pagamento do crédito é obrigatória" );
		return( true );
	}
}

TFPagtoCR_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TFPagtoCR_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
TDetPgCR_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TDetPgCR_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_ForneDB.prototype.ExistenciaEspecial = function()
{
	return( ( !ForneDB_Nome.Obrigatorio( false ) || tem(ForneDB_Nome) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_CCorDB.prototype.ExistenciaEspecial = function()
{
	return( ( !CCorDB_Nome.Obrigatorio( false ) || tem(CCorDB_Nome) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaDB.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaDB_Plano.Obrigatorio( false ) || tem(SubPlaDB_Plano) ) && ( !SubPlaDB_Codigo.Obrigatorio( false ) || tem(SubPlaDB_Codigo) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaDB_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaDB_Plano_CodPlano.Obrigatorio( false ) || tem(SubPlaDB_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaDB_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaDB_Plano.Obrigatorio( false ) || tem(SubPlaDB_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaDB_Nome.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaDB.Obrigatorio( false ) || tem(SubPlaDB) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_ForneCR.prototype.ExistenciaEspecial = function()
{
	return( ( !ForneCR_Nome.Obrigatorio( false ) || tem(ForneCR_Nome) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_CCorCR.prototype.ExistenciaEspecial = function()
{
	return( ( !CCorCR_Nome.Obrigatorio( false ) || tem(CCorCR_Nome) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaCR.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaCR_Plano.Obrigatorio( false ) || tem(SubPlaCR_Plano) ) && ( !SubPlaCR_Codigo.Obrigatorio( false ) || tem(SubPlaCR_Codigo) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaCR_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaCR_Plano_CodPlano.Obrigatorio( false ) || tem(SubPlaCR_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaCR_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaCR_Plano.Obrigatorio( false ) || tem(SubPlaCR_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraTransf_SubPlaCR_Nome.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlaCR.Obrigatorio( false ) || tem(SubPlaCR) ) );
}

function IniciarDependencias_parGeraTransf()
{
ForneDB_Nome.ExistenciasDependentes= [ ForneDB ];
CCorDB_Nome.ExistenciasDependentes= [ CCorDB ];
SubPlaDB_Plano.ExistenciasDependentes= [ SubPlaDB,SubPlaDB_Plano_Plano ];
SubPlaDB_Plano_CodPlano.ExistenciasDependentes= [ SubPlaDB_Plano ];
SubPlaDB_Codigo.ExistenciasDependentes= [ SubPlaDB ];
SubPlaDB.ExistenciasDependentes= [ SubPlaDB_Nome ];
ForneCR_Nome.ExistenciasDependentes= [ ForneCR ];
CCorCR_Nome.ExistenciasDependentes= [ CCorCR ];
SubPlaCR_Plano.ExistenciasDependentes= [ SubPlaCR,SubPlaCR_Plano_Plano ];
SubPlaCR_Plano_CodPlano.ExistenciasDependentes= [ SubPlaCR_Plano ];
SubPlaCR_Codigo.ExistenciasDependentes= [ SubPlaCR ];
SubPlaCR.ExistenciasDependentes= [ SubPlaCR_Nome ];
ForneDB_Nome.ErrosDependentes= [ ForneDB ];
CCorDB_Nome.ErrosDependentes= [ CCorDB ];
SubPlaDB_Plano_CodPlano.ErrosDependentes= [ SubPlaDB_Plano ];
SubPlaDB_Codigo.ErrosDependentes= [ SubPlaDB ];
ForneCR_Nome.ErrosDependentes= [ ForneCR ];
CCorCR_Nome.ErrosDependentes= [ CCorCR ];
SubPlaCR_Plano_CodPlano.ErrosDependentes= [ SubPlaCR_Plano ];
SubPlaCR_Codigo.ErrosDependentes= [ SubPlaCR ];
SubPlaDB_Plano.DescritoresDependentes= [ SubPlaDB_Plano_Plano ];
SubPlaDB.DescritoresDependentes= [ SubPlaDB_Nome ];
SubPlaCR_Plano.DescritoresDependentes= [ SubPlaCR_Plano_Plano ];
SubPlaCR.DescritoresDependentes= [ SubPlaCR_Nome ];
ForneDB.CamposChave= [ ForneDB_Nome ];
CCorDB.CamposChave= [ CCorDB_Nome ];
SubPlaDB.CamposChave= [ SubPlaDB_Plano,SubPlaDB_Codigo ];
SubPlaDB_Plano.CamposChave= [ SubPlaDB_Plano_CodPlano ];
ForneCR.CamposChave= [ ForneCR_Nome ];
CCorCR.CamposChave= [ CCorCR_Nome ];
SubPlaCR.CamposChave= [ SubPlaCR_Plano,SubPlaCR_Codigo ];
SubPlaCR_Plano.CamposChave= [ SubPlaCR_Plano_CodPlano ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "parGeraTransf";
//------------------------------------------------------------
function ListaDeCampos_parGeraTransf( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Emissao, Vencimento, Valor, ForneDB, ForneDB_Nome, CCorDB, CCorDB_Nome, SubPlaDB, SubPlaDB_Plano, SubPlaDB_Plano_CodPlano, SubPlaDB_Plano_Plano, SubPlaDB_Codigo, SubPlaDB_Nome, HistDB, TFCobraDB, TFCobraDB_Chave, TFCobraDB_Descritor, TFPagtoDB, TFPagtoDB_Chave, TFPagtoDB_Descritor, TDetPgDB, TDetPgDB_Chave, TDetPgDB_Descritor, ForneCR, ForneCR_Nome, CCorCR, CCorCR_Nome, SubPlaCR, SubPlaCR_Plano, SubPlaCR_Plano_CodPlano, SubPlaCR_Plano_Plano, SubPlaCR_Codigo, SubPlaCR_Nome, HistCR, TFCobraCR, TFCobraCR_Chave, TFCobraCR_Descritor, TFPagtoCR, TFPagtoCR_Chave, TFPagtoCR_Descritor, TDetPgCR, TDetPgCR_Chave, TDetPgCR_Descritor ]	);
	IniciarDependencias_parGeraTransf();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_parGeraTransf( '' );
g_idOperacao = 58;
parent.navegacao.MenuPrincQtdOpcoes=1;
parent.navegacao.MenuPrincPodeSo1=1;
