/*=========================================================================
  a_fornec - Fornecedor
	usa a_endere
=========================================================================*/

//------------------------------------------------------------
Campo_arqFornecedor_Nome.prototype = new Lance_CampoCadeia;

function Campo_arqFornecedor_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Nome", "Nome", "Nome", 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Nome = new Campo_arqFornecedor_Nome;

//------------------------------------------------------------
Campo_arqFornecedor_Apelido.prototype = new Lance_CampoCadeia;

function Campo_arqFornecedor_Apelido()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Apelido", "Apelido", "Apelido", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Apelido = new Campo_arqFornecedor_Apelido;

//------------------------------------------------------------
Campo_arqFornecedor_TPFPJ.prototype = new Lance_CampoLigado;

function Campo_arqFornecedor_TPFPJ()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPFPJ", "TPFPJ", "TPFPJ", "tabTPFPJ", "t_tpfpj", null, "",0);
}

var TPFPJ = new Campo_arqFornecedor_TPFPJ;

//------------------------------------------------------------
Campo_arqFornecedor_TPFPJ_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqFornecedor_TPFPJ_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPFPJ_Chave", "TPFPJ_Chave", "TPFPJ", TPFPJ, 1, "u", false);
}

var TPFPJ_Chave = new Campo_arqFornecedor_TPFPJ_Chave;

//------------------------------------------------------------
Campo_arqFornecedor_TPFPJ_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqFornecedor_TPFPJ_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPFPJ_Descritor", "TPFPJ_Descritor", "TPFPJ", TPFPJ, 8, "xxxxxxxx", false);
}

var TPFPJ_Descritor = new Campo_arqFornecedor_TPFPJ_Descritor;

//------------------------------------------------------------
IniciarPrefixos_domEndereco( "Ende_" );

//------------------------------------------------------------
Campo_arqFornecedor_CNPJ.prototype = new Lance_CampoCadeia;

function Campo_arqFornecedor_CNPJ()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "CNPJ", "CNPJ", "CNPJ", 14, "##.###.###/####-##", true);
}

var CNPJ = new Campo_arqFornecedor_CNPJ;

//------------------------------------------------------------
Campo_arqFornecedor_InscEstad.prototype = new Lance_CampoCadeia;

function Campo_arqFornecedor_InscEstad()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "InscEstad", "InscEstad", "InscEstad", 25, "uuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var InscEstad = new Campo_arqFornecedor_InscEstad;

//------------------------------------------------------------
Campo_arqFornecedor_InscMunic.prototype = new Lance_CampoCadeia;

function Campo_arqFornecedor_InscMunic()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "InscMunic", "InscMunic", "InscMunic", 25, "uuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var InscMunic = new Campo_arqFornecedor_InscMunic;

//------------------------------------------------------------
Campo_arqFornecedor_CPF.prototype = new Lance_CampoCadeia;

function Campo_arqFornecedor_CPF()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "CPF", "CPF", "CPF", 11, "###.###.###-##", true);
}

var CPF = new Campo_arqFornecedor_CPF;

//------------------------------------------------------------
Campo_arqFornecedor_Identidade.prototype = new Lance_CampoCadeia;

function Campo_arqFornecedor_Identidade()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Identidade", "Identidade", "Identidade", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Identidade = new Campo_arqFornecedor_Identidade;

//------------------------------------------------------------
Campo_arqFornecedor_Orgao.prototype = new Lance_CampoCadeia;

function Campo_arqFornecedor_Orgao()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Orgao", "Orgao", "Orgao", 20, "uuuuuuuuuuuuuuuuuuuu", false);
}

var Orgao = new Campo_arqFornecedor_Orgao;

//------------------------------------------------------------
Campo_arqFornecedor_Emissao.prototype = new Lance_CampoData;

function Campo_arqFornecedor_Emissao()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Emissao", "Emissao", "Emissao", 8, "dd/mm/aaaa", true);
}

var Emissao = new Campo_arqFornecedor_Emissao;

//------------------------------------------------------------
Campo_arqFornecedor_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqFornecedor_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqFornecedor_Ativo;

//------------------------------------------------------------
Campo_arqFornecedor_Obs.prototype = new Lance_CampoTexto;

function Campo_arqFornecedor_Obs()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Obs", "Obs", "Obs", false);
}

var Obs = new Campo_arqFornecedor_Obs;

//------------------------------------------------------------
Campo_arqFornecedor_Desde.prototype = new Lance_CampoData;

function Campo_arqFornecedor_Desde()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Desde", "Desde", "Desde", 8, "dd/mm/aaaa", true);
}

var Desde = new Campo_arqFornecedor_Desde;

Nome.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqFornecedor_Apelido.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( sugereApelido( Nome ) ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqFornecedor_TPFPJ.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 2 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFornecedor_TPFPJ.prototype.Cabecalho = function()
{
		return( "PF/PJ" );
}

TPFPJ_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPFPJ_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqFornecedor_CNPJ.prototype.TemErro = function()
{
		if( tem(this) && ( !CnpjOk( CNPJ ) ) )
	{
		alert( "CNPJ inválido" );
		return( true );
	}
	return( Lance_CampoData.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqFornecedor_CPF.prototype.TemErro = function()
{
		if( tem(this) && ( !CpfOk( CPF ) ) )
	{
		alert( "CPF inválido" );
		return( true );
	}
	return( Lance_CampoData.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqFornecedor_Orgao.prototype.Existencia = function()
{
	return( tem( Identidade ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqFornecedor_Emissao.prototype.Existencia = function()
{
	return( tem( Identidade ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqFornecedor_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqFornecedor_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqFornecedor_Desde.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( HOJE ) );
}
}

function IniciarDependencias_arqFornecedor()
{
Identidade.ExistenciasDependentes= [ Orgao,Emissao ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqFornecedor";
//------------------------------------------------------------
function ListaDeCampos_arqFornecedor( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Nome, Apelido, TPFPJ, TPFPJ_Chave, TPFPJ_Descritor ], 
		ListaDeCampos_domEndereco( "Ende_" ), 
		[ CNPJ, InscEstad, InscMunic, CPF, Identidade, Orgao, Emissao, Ativo, Obs, Desde ]	);
	IniciarDependencias_arqFornecedor();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqFornecedor( '' );
g_idOperacao = 42;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Contatos","","C",143,"","",1,"","1","a_contpe","arqContPessoa","Folhear","Fornecedor","?","","", "","", 0,11,[],[21]);
var Menu_2 = new Array( 1,"Contas","","t",144,"","",1,"","1","a_conta","arqConta","Folhear","Fornecedor","?","","", "","", 0,11,[],[33]);
var Menu_3 = new Array( 1,"Recorrentes","","R",154,"","",1,"","1","a_recor","arqRecorrente","Folhear","Fornecedor","?","","", "","", 0,11,[],[46]);
var Menu_4 = new Array( 1,"Mov.Estoque","","q",219,"","",1,"","1","a_movest","arqMovEstoque","Folhear","Fornecedor","?","","", "","", 0,11,[],[56]);
parent.navegacao.MenuPrincQtdOpcoes=4;
}
