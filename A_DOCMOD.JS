/*=========================================================================
  a_docmod - DocMod
=========================================================================*/

//------------------------------------------------------------
Campo_arqDocMod_Documento.prototype = new Lance_CampoCadeia;

function Campo_arqDocMod_Documento()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Documento", "Documento", "Documento", 50, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Documento = new Campo_arqDocMod_Documento;

//------------------------------------------------------------
Campo_arqDocMod_TArqDoc.prototype = new Lance_CampoLigado;

function Campo_arqDocMod_TArqDoc()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TArqDoc", "TArqDoc", "TArqDoc", "tabTArqDoc", "t_tarqdo", null, "",0);
}

var TArqDoc = new Campo_arqDocMod_TArqDoc;

//------------------------------------------------------------
Campo_arqDocMod_TArqDoc_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqDocMod_TArqDoc_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TArqDoc_Chave", "TArqDoc_Chave", "TArqDoc", TArqDoc, 1, "u", false);
}

var TArqDoc_Chave = new Campo_arqDocMod_TArqDoc_Chave;

//------------------------------------------------------------
Campo_arqDocMod_TArqDoc_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqDocMod_TArqDoc_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TArqDoc_Descritor", "TArqDoc_Descritor", "TArqDoc", TArqDoc, 7, "xxxxxxx", false);
}

var TArqDoc_Descritor = new Campo_arqDocMod_TArqDoc_Descritor;

//------------------------------------------------------------
Campo_arqDocMod_TOrDoc.prototype = new Lance_CampoLigado;

function Campo_arqDocMod_TOrDoc()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TOrDoc", "TOrDoc", "TOrDoc", "tabTOrDoc", "t_tordoc", null, "",0);
}

var TOrDoc = new Campo_arqDocMod_TOrDoc;

//------------------------------------------------------------
Campo_arqDocMod_TOrDoc_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqDocMod_TOrDoc_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TOrDoc_Chave", "TOrDoc_Chave", "TOrDoc", TOrDoc, 1, "u", false);
}

var TOrDoc_Chave = new Campo_arqDocMod_TOrDoc_Chave;

//------------------------------------------------------------
Campo_arqDocMod_TOrDoc_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqDocMod_TOrDoc_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TOrDoc_Descritor", "TOrDoc_Descritor", "TOrDoc", TOrDoc, 15, "xxxxxxxxxxxxxxx", false);
}

var TOrDoc_Descritor = new Campo_arqDocMod_TOrDoc_Descritor;

//------------------------------------------------------------
Campo_arqDocMod_Logo.prototype = new Lance_CampoLogico;

function Campo_arqDocMod_Logo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Logo", "Logo", "Logo");
}

var Logo = new Campo_arqDocMod_Logo;

//------------------------------------------------------------
Campo_arqDocMod_Marca.prototype = new Lance_CampoLogico;

function Campo_arqDocMod_Marca()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Marca", "Marca", "Marca");
}

var Marca = new Campo_arqDocMod_Marca;

//------------------------------------------------------------
Campo_arqDocMod_NomeArq.prototype = new Lance_CampoCadeia;

function Campo_arqDocMod_NomeArq()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "NomeArq", "NomeArq", "NomeArq", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var NomeArq = new Campo_arqDocMod_NomeArq;

//------------------------------------------------------------
Campo_arqDocMod_Rodape.prototype = new Lance_CampoLogico;

function Campo_arqDocMod_Rodape()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Rodape", "Rodape", "Rodape");
}

var Rodape = new Campo_arqDocMod_Rodape;

//------------------------------------------------------------
Campo_arqDocMod_AltRodape.prototype = new Lance_CampoNumerico;

function Campo_arqDocMod_AltRodape()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "AltRodape", "AltRodape", "AltRodape", 2, "#z", false,"", "");
}

var AltRodape = new Campo_arqDocMod_AltRodape;

//------------------------------------------------------------
Campo_arqDocMod_Template.prototype = new Lance_CampoHidden;

function Campo_arqDocMod_Template()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Template", "Template", "Template", "arqTemplate", "a_templa", null, "",8);
}

var Template = new Campo_arqDocMod_Template;

//------------------------------------------------------------
Campo_arqDocMod_Template_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqDocMod_Template_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Template_Nome", "Template_Nome", "Nome", Template, 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Template_Nome = new Campo_arqDocMod_Template_Nome;

//------------------------------------------------------------
Campo_arqDocMod_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqDocMod_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqDocMod_Ativo;

//------------------------------------------------------------
Campo_arqDocMod_Header.prototype = new Lance_CampoArquivo;

function Campo_arqDocMod_Header()
{
	this.superClass = Lance_CampoArquivo;
	this.superClass( "Header", "Header", "Header", 20, "xxxxxxxxxxxxxxxxxxxx", false,false);
}

var Header = new Campo_arqDocMod_Header;

//------------------------------------------------------------
Campo_arqDocMod_Arquivo.prototype = new Lance_CampoArquivo;

function Campo_arqDocMod_Arquivo()
{
	this.superClass = Lance_CampoArquivo;
	this.superClass( "Arquivo", "Arquivo", "Arquivo", 20, "xxxxxxxxxxxxxxxxxxxx", false,false);
}

var Arquivo = new Campo_arqDocMod_Arquivo;

//------------------------------------------------------------
Campo_arqDocMod_Footer.prototype = new Lance_CampoArquivo;

function Campo_arqDocMod_Footer()
{
	this.superClass = Lance_CampoArquivo;
	this.superClass( "Footer", "Footer", "Footer", 20, "xxxxxxxxxxxxxxxxxxxx", false,false);
}

var Footer = new Campo_arqDocMod_Footer;

//------------------------------------------------------------
Campo_arqDocMod_Html.prototype = new Lance_CampoTexto;

function Campo_arqDocMod_Html()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Html", "Html", "Html", true);
}

var Html = new Campo_arqDocMod_Html;

//------------------------------------------------------------
Campo_arqDocMod_Imagem.prototype = new Lance_CampoImagem;

function Campo_arqDocMod_Imagem()
{
	this.superClass = Lance_CampoImagem;
	this.superClass( "Imagem", "Imagem", "Imagem");
}

var Imagem = new Campo_arqDocMod_Imagem;

//------------------------------------------------------------
Campo_arqDocMod_Lista.prototype = new Lance_CampoTexto;

function Campo_arqDocMod_Lista()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Lista", "Lista", "Lista", false);
}

var Lista = new Campo_arqDocMod_Lista;

//------------------------------------------------------------
Campo_arqDocMod_MargemEsq.prototype = new Lance_CampoNumerico;

function Campo_arqDocMod_MargemEsq()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "MargemEsq", "MargemEsq", "MargemEsq", 3, "##z", true,"", "");
}

var MargemEsq = new Campo_arqDocMod_MargemEsq;

//------------------------------------------------------------
Campo_arqDocMod_MargemDir.prototype = new Lance_CampoNumerico;

function Campo_arqDocMod_MargemDir()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "MargemDir", "MargemDir", "MargemDir", 3, "##z", true,"", "");
}

var MargemDir = new Campo_arqDocMod_MargemDir;

//------------------------------------------------------------
Campo_arqDocMod_MargemTop.prototype = new Lance_CampoNumerico;

function Campo_arqDocMod_MargemTop()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "MargemTop", "MargemTop", "MargemTop", 3, "##z", true,"", "");
}

var MargemTop = new Campo_arqDocMod_MargemTop;

//------------------------------------------------------------
Campo_arqDocMod_TPapel.prototype = new Lance_CampoLigado;

function Campo_arqDocMod_TPapel()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPapel", "TPapel", "TPapel", "tabTPapel", "t_tpapel", null, "",0);
}

var TPapel = new Campo_arqDocMod_TPapel;

//------------------------------------------------------------
Campo_arqDocMod_TPapel_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqDocMod_TPapel_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPapel_Chave", "TPapel_Chave", "TPapel", TPapel, 1, "u", false);
}

var TPapel_Chave = new Campo_arqDocMod_TPapel_Chave;

//------------------------------------------------------------
Campo_arqDocMod_TPapel_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqDocMod_TPapel_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPapel_Descritor", "TPapel_Descritor", "TPapel", TPapel, 6, "xxxxxx", false);
}

var TPapel_Descritor = new Campo_arqDocMod_TPapel_Descritor;

//------------------------------------------------------------
Campo_arqDocMod_TOrienta.prototype = new Lance_CampoLigado;

function Campo_arqDocMod_TOrienta()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TOrienta", "TOrienta", "TOrienta", "tabTOrienta", "t_torien", null, "",0);
}

var TOrienta = new Campo_arqDocMod_TOrienta;

//------------------------------------------------------------
Campo_arqDocMod_TOrienta_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqDocMod_TOrienta_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TOrienta_Chave", "TOrienta_Chave", "TOrienta", TOrienta, 1, "u", false);
}

var TOrienta_Chave = new Campo_arqDocMod_TOrienta_Chave;

//------------------------------------------------------------
Campo_arqDocMod_TOrienta_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqDocMod_TOrienta_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TOrienta_Descritor", "TOrienta_Descritor", "TOrienta", TOrienta, 8, "xxxxxxxx", false);
}

var TOrienta_Descritor = new Campo_arqDocMod_TOrienta_Descritor;

Documento.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqDocMod_TArqDoc.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A origem do modelo é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqDocMod_TArqDoc.prototype.Cabecalho = function()
{
		return( "Origem" );
}

TArqDoc_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TArqDoc_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqDocMod_TOrDoc.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O tipo é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqDocMod_TOrDoc.prototype.Cabecalho = function()
{
		return( "Tipo" );
}

TOrDoc_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TOrDoc_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqDocMod_Logo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqDocMod_Logo.prototype.Cabecalho = function()
{
		return( "Logo?" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqDocMod_Marca.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqDocMod_Marca.prototype.Cabecalho = function()
{
		return( "Marca D`água?" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqDocMod_NomeArq.prototype.Existencia = function()
{
	return( Marca == 1 );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqDocMod_Rodape.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqDocMod_Rodape.prototype.Cabecalho = function()
{
		return( "Rodapé?" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqDocMod_Template_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Template.Obrigatorio( p_comMsg ) );
}

Template_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqDocMod_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqDocMod_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

TPapel_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPapel_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
TOrienta_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TOrienta_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqDocMod_Template.prototype.ExistenciaEspecial = function()
{
	return( ( !Template_Nome.Obrigatorio( false ) || tem(Template_Nome) ) );
}

function IniciarDependencias_arqDocMod()
{
Marca.ExistenciasDependentes= [ NomeArq ];
Template_Nome.ExistenciasDependentes= [ Template ];
Template_Nome.ErrosDependentes= [ Template ];
Template.CamposChave= [ Template_Nome ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqDocMod";
//------------------------------------------------------------
function ListaDeCampos_arqDocMod( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Documento, TArqDoc, TArqDoc_Chave, TArqDoc_Descritor, TOrDoc, TOrDoc_Chave, TOrDoc_Descritor, Logo, Marca, NomeArq, Rodape, AltRodape, Template, Template_Nome, Ativo, Header, Arquivo, Footer, Html, Imagem, Lista, MargemEsq, MargemDir, MargemTop, TPapel, TPapel_Chave, TPapel_Descritor, TOrienta, TOrienta_Chave, TOrienta_Descritor ]	);
	IniciarDependencias_arqDocMod();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqDocMod( '' );
g_idOperacao = 22;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
