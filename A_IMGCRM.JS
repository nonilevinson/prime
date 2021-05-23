/*=========================================================================
  a_imgcrm - ImagemCRM
=========================================================================*/

//------------------------------------------------------------
Campo_arqImagemCRM_AcaoEmail.prototype = new Lance_CampoHidden;

function Campo_arqImagemCRM_AcaoEmail()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "AcaoEmail", "AcaoEmail", "AcaoEmail", "arqAcaoEmail", "a_aemail", null, "",10);
}

var AcaoEmail = new Campo_arqImagemCRM_AcaoEmail;

//------------------------------------------------------------
Campo_arqImagemCRM_AcaoEmail_Titulo.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqImagemCRM_AcaoEmail_Titulo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "AcaoEmail_Titulo", "AcaoEmail_Titulo", "Título", AcaoEmail, 100, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var AcaoEmail_Titulo = new Campo_arqImagemCRM_AcaoEmail_Titulo;

//------------------------------------------------------------
Campo_arqImagemCRM_AcaoEmail_Versao.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqImagemCRM_AcaoEmail_Versao()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "AcaoEmail_Versao", "AcaoEmail_Versao", "Versão", AcaoEmail, 20, "xxxxxxxxxxxxxxxxxxxx", false);
}

var AcaoEmail_Versao = new Campo_arqImagemCRM_AcaoEmail_Versao;

//------------------------------------------------------------
Campo_arqImagemCRM_NumImg.prototype = new Lance_CampoNumerico;

function Campo_arqImagemCRM_NumImg()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "NumImg", "NumImg", "NumImg", 2, "#z", false,"", "");
}

var NumImg = new Campo_arqImagemCRM_NumImg;

//------------------------------------------------------------
Campo_arqImagemCRM_Nome.prototype = new Lance_CampoCadeia;

function Campo_arqImagemCRM_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Nome", "Nome", "Nome", 50, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Nome = new Campo_arqImagemCRM_Nome;

//------------------------------------------------------------
Campo_arqImagemCRM_Imagem.prototype = new Lance_CampoImagem;

function Campo_arqImagemCRM_Imagem()
{
	this.superClass = Lance_CampoImagem;
	this.superClass( "Imagem", "Imagem", "Imagem");
}

var Imagem = new Campo_arqImagemCRM_Imagem;

//------------------------------------------------------------
Campo_arqImagemCRM_Link.prototype = new Lance_CampoCadeia;

function Campo_arqImagemCRM_Link()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Link", "Link", "Link", 200, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false,100);
}

var Link = new Campo_arqImagemCRM_Link;

AcaoEmail.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqImagemCRM_AcaoEmail_Titulo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( AcaoEmail.Obrigatorio( p_comMsg ) );
}

AcaoEmail_Titulo.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqImagemCRM_AcaoEmail_Versao.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( AcaoEmail.Obrigatorio( p_comMsg ) );
}

AcaoEmail_Versao.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqImagemCRM_NumImg.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( maior( "NumImg+1", 1, AcaoEmail ) ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqImagemCRM_NumImg.prototype.Cabecalho = function()
{
		return( "N°" );
}

NumImg.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqImagemCRM_AcaoEmail.prototype.ExistenciaEspecial = function()
{
	return( ( !AcaoEmail_Titulo.Obrigatorio( false ) || tem(AcaoEmail_Titulo) ) && ( !AcaoEmail_Versao.Obrigatorio( false ) || tem(AcaoEmail_Versao) ) );
}

function IniciarDependencias_arqImagemCRM()
{
AcaoEmail_Titulo.ExistenciasDependentes= [ AcaoEmail ];
AcaoEmail_Versao.ExistenciasDependentes= [ AcaoEmail ];
AcaoEmail_Versao.ErrosDependentes= [ AcaoEmail ];
AcaoEmail.CamposChave= [ AcaoEmail_Titulo,AcaoEmail_Versao ];
}
	//=========================================================================
	function AcionaTecla( p_tecla )
	{
		switch( p_tecla )
		{
			case _ALT: return( !tem( HoraIni ) || GrupoAtualEm() );
			case _DEL: return( !tem( HoraIni ) || GrupoAtualEm() );
		}
		return( true );
	}
	g_acionaTecla="AcionaTecla";


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqImagemCRM";
//------------------------------------------------------------
function ListaDeCampos_arqImagemCRM( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ AcaoEmail, AcaoEmail_Titulo, AcaoEmail_Versao, NumImg, Nome, Imagem, Link ]	);
	IniciarDependencias_arqImagemCRM();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqImagemCRM( '' );
g_idOperacao = 11;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
