/*=========================================================================
  a_emailr - EmailRemet
=========================================================================*/

//------------------------------------------------------------
Campo_arqEmailRemet_Email.prototype = new Lance_CampoCadeia;

function Campo_arqEmailRemet_Email()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Email", "Email", "Email", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Email = new Campo_arqEmailRemet_Email;

//------------------------------------------------------------
Campo_arqEmailRemet_NomeEmail.prototype = new Lance_CampoCadeia;

function Campo_arqEmailRemet_NomeEmail()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "NomeEmail", "NomeEmail", "NomeEmail", 100, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var NomeEmail = new Campo_arqEmailRemet_NomeEmail;

//------------------------------------------------------------
Campo_arqEmailRemet_Padrao.prototype = new Lance_CampoLogico;

function Campo_arqEmailRemet_Padrao()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Padrao", "Padrao", "Padrão");
}

var Padrao = new Campo_arqEmailRemet_Padrao;

//------------------------------------------------------------
Campo_arqEmailRemet_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqEmailRemet_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqEmailRemet_Ativo;

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqEmailRemet_Email.prototype.TemErro = function()
{
		if( tem(this) && ( !EmailOk( Email ) ) )
	{
		alert( "Email inválido" );
		return( true );
	}
		if( tem(this) && ( !EmailRemetenteOk( Email ) ) )
	{
		alert( "O domínio informado não pode ser usado como remetente" );
		return( true );
	}
	return( Lance_CampoLogico.prototype.TemErro.call( this ) );
}

Email.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqEmailRemet_NomeEmail.prototype.Cabecalho = function()
{
		return( "Nome" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqEmailRemet_Padrao.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqEmailRemet_Padrao.prototype.Cabecalho = function()
{
		return( "Padrão?" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqEmailRemet_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqEmailRemet_Ativo.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "Ativo? é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqEmailRemet_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

function IniciarDependencias_arqEmailRemet()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqEmailRemet";
//------------------------------------------------------------
function ListaDeCampos_arqEmailRemet( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Email, NomeEmail, Padrao, Ativo ]	);
	IniciarDependencias_arqEmailRemet();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqEmailRemet( '' );
g_idOperacao = 9;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
