/*=========================================================================
  a_qbaixa - QBaixa
=========================================================================*/

//------------------------------------------------------------
Campo_parQBaixa_TFPagto.prototype = new Lance_CampoLigado;

function Campo_parQBaixa_TFPagto()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TFPagto", "TFPagto", "TFPagto", "tabTFPagto", "t_tfpagt", null, "",0);
}

var TFPagto = new Campo_parQBaixa_TFPagto;

//------------------------------------------------------------
Campo_parQBaixa_TFPagto_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQBaixa_TFPagto_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFPagto_Chave", "TFPagto_Chave", "TFPagto", TFPagto, 1, "u", false);
}

var TFPagto_Chave = new Campo_parQBaixa_TFPagto_Chave;

//------------------------------------------------------------
Campo_parQBaixa_TFPagto_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQBaixa_TFPagto_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFPagto_Descritor", "TFPagto_Descritor", "TFPagto", TFPagto, 8, "xxxxxxxx", false);
}

var TFPagto_Descritor = new Campo_parQBaixa_TFPagto_Descritor;

//------------------------------------------------------------
Campo_parQBaixa_TDetPg.prototype = new Lance_CampoLigado;

function Campo_parQBaixa_TDetPg()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TDetPg", "TDetPg", "TDetPg", "tabTDetPg", "t_tdetpg", null, "",0);
}

var TDetPg = new Campo_parQBaixa_TDetPg;

//------------------------------------------------------------
Campo_parQBaixa_TDetPg_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQBaixa_TDetPg_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TDetPg_Chave", "TDetPg_Chave", "TDetPg", TDetPg, 1, "u", false);
}

var TDetPg_Chave = new Campo_parQBaixa_TDetPg_Chave;

//------------------------------------------------------------
Campo_parQBaixa_TDetPg_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQBaixa_TDetPg_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TDetPg_Descritor", "TDetPg_Descritor", "TDetPg", TDetPg, 14, "xxxxxxxxxxxxxx", false);
}

var TDetPg_Descritor = new Campo_parQBaixa_TDetPg_Descritor;

//------------------------------------------------------------
Campo_parQBaixa_TFCobra.prototype = new Lance_CampoLigado;

function Campo_parQBaixa_TFCobra()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TFCobra", "TFCobra", "TFCobra", "tabTFCobra", "t_tfcobr", null, "",0);
}

var TFCobra = new Campo_parQBaixa_TFCobra;

//------------------------------------------------------------
Campo_parQBaixa_TFCobra_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQBaixa_TFCobra_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFCobra_Chave", "TFCobra_Chave", "TFCobra", TFCobra, 1, "u", false);
}

var TFCobra_Chave = new Campo_parQBaixa_TFCobra_Chave;

//------------------------------------------------------------
Campo_parQBaixa_TFCobra_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQBaixa_TFCobra_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFCobra_Descritor", "TFCobra_Descritor", "TFCobra", TFCobra, 10, "xxxxxxxxxx", false);
}

var TFCobra_Descritor = new Campo_parQBaixa_TFCobra_Descritor;

//------------------------------------------------------------
Campo_parQBaixa_CCor.prototype = new Lance_CampoHidden;

function Campo_parQBaixa_CCor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "CCor", "CCor", "CCor", "arqCCor", "a_ccor", null, "",20);
}

var CCor = new Campo_parQBaixa_CCor;

//------------------------------------------------------------
Campo_parQBaixa_CCor_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQBaixa_CCor_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "CCor_Nome", "CCor_Nome", "Nome", CCor, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var CCor_Nome = new Campo_parQBaixa_CCor_Nome;

//------------------------------------------------------------
Campo_parQBaixa_Cheque.prototype = new Lance_CampoNumerico;

function Campo_parQBaixa_Cheque()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Cheque", "Cheque", "Cheque", 6, "zzz.zzz", true,"", "");
}

var Cheque = new Campo_parQBaixa_Cheque;

//------------------------------------------------------------
Campo_parQBaixa_DataIni.prototype = new Lance_CampoData;

function Campo_parQBaixa_DataIni()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataIni", "DataIni", "DataIni", 8, "dd/mm/aaaa", true);
}

var DataIni = new Campo_parQBaixa_DataIni;

//------------------------------------------------------------
Campo_parQBaixa_DataPagto.prototype = new Lance_CampoData;

function Campo_parQBaixa_DataPagto()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataPagto", "DataPagto", "DataPagto", 8, "dd/mm/aaaa", true);
}

var DataPagto = new Campo_parQBaixa_DataPagto;

//------------------------------------------------------------
Campo_parQBaixa_DataComp.prototype = new Lance_CampoData;

function Campo_parQBaixa_DataComp()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataComp", "DataComp", "DataComp", 8, "dd/mm/aaaa", true);
}

var DataComp = new Campo_parQBaixa_DataComp;

//------------------------------------------------------------
Campo_parQBaixa_Valor.prototype = new Lance_CampoNumerico;

function Campo_parQBaixa_Valor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor", "Valor", "Valor", 8, "###.##z,zz", true,"", "");
}

var Valor = new Campo_parQBaixa_Valor;

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQBaixa_TFPagto.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A forma de pagamento é obrigatória" );
		return( true );
	}
}

TFPagto_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TFPagto_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQBaixa_TDetPg.prototype.Obrigatorio = function( p_comMsg )
{
		if( TFPagto == 1 )
	{
		if( p_comMsg ) alert( "O detalhe do pagamento é obrigatório" );
		return( true );
	}
	return( false );
}

TDetPg_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TDetPg_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
TFCobra_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TFCobra_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQBaixa_CCor.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A conta corrente é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parQBaixa_CCor.prototype.Existencia = function()
{
	return( TFPagto == 1 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parQBaixa_CCor_Nome.prototype.Existencia = function()
{
	return( TFPagto == 1 );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQBaixa_CCor_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( CCor.Obrigatorio( p_comMsg ) );
}

CCor_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQBaixa_Cheque.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O número do cheque é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parQBaixa_Cheque.prototype.Existencia = function()
{
	return( TDetPg == 1 );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQBaixa_DataIni.prototype.Obrigatorio = function( p_comMsg )
{
		if( ultimaLigOpcaoEm( 236 ) )
	{
		if( p_comMsg ) alert( "O vencimento é obrigatório" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQBaixa_DataPagto.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data do pagamento é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parQBaixa_DataPagto.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( DataPagto ) ) )
	{
		return( !confirm( "Esse não é um dia útil. Continua?" ) );
	}
	return( Lance_CampoNumerico.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parQBaixa_DataComp.prototype.Sugeriu = function()
{
{
		if( estaContido( TFPagto, [2,3] ) || estaContido( TDetPg, [2,3,4,5,6] ) )
	return( this.AtribuiuSemCritica( DataPagto ) );
}
		return( true );
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parQBaixa_DataComp.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( DataComp ) ) )
	{
		return( !confirm( "Esse não é um dia útil. Continua?" ) );
	}
	return( Lance_CampoNumerico.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQBaixa_Valor.prototype.Obrigatorio = function( p_comMsg )
{
		if( ultimaLigOpcaoEm( 236 ) )
	{
		if( p_comMsg ) alert( "O valor é obrigatório" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQBaixa_CCor.prototype.ExistenciaEspecial = function()
{
	return( ( !CCor_Nome.Obrigatorio( false ) || tem(CCor_Nome) ) );
}

function IniciarDependencias_parQBaixa()
{
TFPagto.ExistenciasDependentes= [ CCor,CCor_Nome ];
CCor_Nome.ExistenciasDependentes= [ CCor ];
TDetPg.ExistenciasDependentes= [ Cheque ];
CCor_Nome.ErrosDependentes= [ CCor ];
TFPagto.AdvertenciasDependentes= [ TDetPg ];
CCor.CamposChave= [ CCor_Nome ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "parQBaixa";
//------------------------------------------------------------
function ListaDeCampos_parQBaixa( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ TFPagto, TFPagto_Chave, TFPagto_Descritor, TDetPg, TDetPg_Chave, TDetPg_Descritor, TFCobra, TFCobra_Chave, TFCobra_Descritor, CCor, CCor_Nome, Cheque, DataIni, DataPagto, DataComp, Valor ]	);
	IniciarDependencias_parQBaixa();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_parQBaixa( '' );
g_idOperacao = 40;
parent.navegacao.MenuPrincQtdOpcoes=1;
parent.navegacao.MenuPrincPodeSo1=1;
