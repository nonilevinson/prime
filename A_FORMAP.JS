/*=========================================================================
  a_formap - FormaPg
=========================================================================*/

//------------------------------------------------------------
Campo_arqFormaPg_FormaPg.prototype = new Lance_CampoCadeia;

function Campo_arqFormaPg_FormaPg()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "FormaPg", "FormaPg", "FormaPg", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var FormaPg = new Campo_arqFormaPg_FormaPg;

//------------------------------------------------------------
Campo_arqFormaPg_PodeEntra.prototype = new Lance_CampoLogico;

function Campo_arqFormaPg_PodeEntra()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "PodeEntra", "PodeEntra", "PodeEntra");
}

var PodeEntra = new Campo_arqFormaPg_PodeEntra;

//------------------------------------------------------------
Campo_arqFormaPg_Dinheiro.prototype = new Lance_CampoLogico;

function Campo_arqFormaPg_Dinheiro()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Dinheiro", "Dinheiro", "Dinheiro");
}

var Dinheiro = new Campo_arqFormaPg_Dinheiro;

//------------------------------------------------------------
Campo_arqFormaPg_Boleto.prototype = new Lance_CampoLogico;

function Campo_arqFormaPg_Boleto()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Boleto", "Boleto", "Boleto");
}

var Boleto = new Campo_arqFormaPg_Boleto;

//------------------------------------------------------------
Campo_arqFormaPg_Cartao.prototype = new Lance_CampoLogico;

function Campo_arqFormaPg_Cartao()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Cartao", "Cartao", "Cartao");
}

var Cartao = new Campo_arqFormaPg_Cartao;

//------------------------------------------------------------
Campo_arqFormaPg_Dias.prototype = new Lance_CampoNumerico;

function Campo_arqFormaPg_Dias()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Dias", "Dias", "Dias", 2, "#z", false,"", "");
}

var Dias = new Campo_arqFormaPg_Dias;

//------------------------------------------------------------
Campo_arqFormaPg_TaxaDeb.prototype = new Lance_CampoNumerico;

function Campo_arqFormaPg_TaxaDeb()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "TaxaDeb", "TaxaDeb", "TaxaDeb", 4, "#z,zz", true,"", "");
}

var TaxaDeb = new Campo_arqFormaPg_TaxaDeb;

//------------------------------------------------------------
Campo_arqFormaPg_Taxa2.prototype = new Lance_CampoNumerico;

function Campo_arqFormaPg_Taxa2()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Taxa2", "Taxa2", "Taxa2", 4, "#z,zz", true,"", "");
}

var Taxa2 = new Campo_arqFormaPg_Taxa2;

//------------------------------------------------------------
Campo_arqFormaPg_Taxa3.prototype = new Lance_CampoNumerico;

function Campo_arqFormaPg_Taxa3()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Taxa3", "Taxa3", "Taxa3", 4, "#z,zz", true,"", "");
}

var Taxa3 = new Campo_arqFormaPg_Taxa3;

//------------------------------------------------------------
Campo_arqFormaPg_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqFormaPg_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqFormaPg_Ativo;

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFormaPg_FormaPg.prototype.Cabecalho = function()
{
		return( "Forma" );
}

FormaPg.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqFormaPg_PodeEntra.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFormaPg_PodeEntra.prototype.Cabecalho = function()
{
		return( "Pode na<br>entrada?" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqFormaPg_Dinheiro.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFormaPg_Dinheiro.prototype.Cabecalho = function()
{
		return( "Dinheiro?" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqFormaPg_Boleto.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFormaPg_Boleto.prototype.Cabecalho = function()
{
		return( "Boleto?" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqFormaPg_Boleto.prototype.Existencia = function()
{
	return( Dinheiro == 0 );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqFormaPg_Cartao.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFormaPg_Cartao.prototype.Cabecalho = function()
{
		return( "Cartão?" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqFormaPg_Cartao.prototype.Existencia = function()
{
	return( ( Dinheiro == 0 ) && ( Boleto == 0 ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqFormaPg_Dias.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqFormaPg_Dias.prototype.TemErro = function()
{
		if( tem(this) && ( Cartao == 1 && Dias == 0 ) )
	{
		alert( "A quantidade de dias é obrigatória para cartões" );
		return( true );
	}
	return( Lance_CampoLogico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFormaPg_TaxaDeb.prototype.Cabecalho = function()
{
		return( "Débito %" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqFormaPg_TaxaDeb.prototype.Existencia = function()
{
	return( ( Dinheiro == 0 ) && ( Boleto == 0 ) );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFormaPg_Taxa2.prototype.Cabecalho = function()
{
		return( "2 vezes %" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqFormaPg_Taxa2.prototype.Existencia = function()
{
	return( ( ( Dinheiro == 0 ) && ( Boleto == 0 ) ) && TaxaDeb == 0 );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFormaPg_Taxa3.prototype.Cabecalho = function()
{
		return( "3 vezes %" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqFormaPg_Taxa3.prototype.Existencia = function()
{
	return( ( ( Dinheiro == 0 ) && ( Boleto == 0 ) ) && TaxaDeb == 0 );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqFormaPg_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFormaPg_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

function IniciarDependencias_arqFormaPg()
{
Dinheiro.ExistenciasDependentes= [ Boleto,Cartao,TaxaDeb,Taxa2,Taxa3 ];
Boleto.ExistenciasDependentes= [ Cartao,TaxaDeb,Taxa2,Taxa3 ];
TaxaDeb.ExistenciasDependentes= [ Taxa2,Taxa3 ];
Cartao.ErrosDependentes= [ Dias ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqFormaPg";
//------------------------------------------------------------
function ListaDeCampos_arqFormaPg( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ FormaPg, PodeEntra, Dinheiro, Boleto, Cartao, Dias, TaxaDeb, Taxa2, Taxa3, Ativo ]	);
	IniciarDependencias_arqFormaPg();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqFormaPg( '' );
g_idOperacao = 44;

if( parent.navegacao ) {
var Menu_1 = [ 1,"Consultas","","C",149,"","",1,"","1","a_consul","arqConsulta","Folhear","FormaPg","?","","", "","", 0,25,[],[39]];
var Menu_2 = [ 1,"Parcelas","","P",185,"","",1,"","1","a_parcel","arqParcela","Folhear","FormaPg","?","","", "","", 0,25,[],[34]];
var Menu_3 = [ 1,"Entradas de tratamentos","","E",204,"","",1,"","1","a_consul","arqConsulta","Folhear","EntraFPg","?","","", "","", 0,25,[],[39]];
var Menu_4 = [ 1,"Saldos de tratamentos","","S",205,"","",1,"","1","a_consul","arqConsulta","Folhear","SaldoFPg","?","","", "","", 0,25,[],[39]];
var Menu_5 = [ 1,"Consultas - saldo entrada","","u",235,"","",1,"","1","a_consul","arqConsulta","Folhear","SdEntrFPg","?","","", "","", 0,25,[],[39]];
var Menu_6 = [ 1,"Consultas","","C",248,"","",1,"","1","a_consul","arqConsulta","Folhear","FormaPg2","?","","", "","", 0,25,[],[39]];
var Menu_7 = [ 1,"Consultas I1","","C",284,"","",1,"","1","a_consul","arqConsulta","Folhear","I1FPg","?","","", "","", 0,25,[],[39]];
var Menu_8 = [ 1,"Consulta I2","","C",285,"","",1,"","1","a_consul","arqConsulta","Folhear","I2FPg","?","","", "","", 0,25,[],[39]];
parent.navegacao.MenuPrincQtdOpcoes=8;
}
