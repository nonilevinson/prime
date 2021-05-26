/*=========================================================================
  a_ptrata - PTrata
=========================================================================*/

//------------------------------------------------------------
Campo_arqPTrata_PTrata.prototype = new Lance_CampoCadeia;

function Campo_arqPTrata_PTrata()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "PTrata", "PTrata", "PTrata", 80, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var PTrata = new Campo_arqPTrata_PTrata;

//------------------------------------------------------------
Campo_arqPTrata_Valor.prototype = new Lance_CampoNumerico;

function Campo_arqPTrata_Valor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor", "Valor", "Valor", 8, "###.##z,zz", true,"", "");
}

var Valor = new Campo_arqPTrata_Valor;

//------------------------------------------------------------
Campo_arqPTrata_Descricao.prototype = new Lance_CampoTexto;

function Campo_arqPTrata_Descricao()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Descricao", "Descricao", "Descricao", true);
}

var Descricao = new Campo_arqPTrata_Descricao;

//------------------------------------------------------------
Campo_arqPTrata_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqPTrata_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqPTrata_Ativo;

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqPTrata_PTrata.prototype.Cabecalho = function()
{
		return( "Plano" );
}

PTrata.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqPTrata_Valor.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O valor � obrigat�rio" );
		return( true );
	}
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_arqPTrata_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqPTrata_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

function IniciarDependencias_arqPTrata()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqPTrata";
//------------------------------------------------------------
function ListaDeCampos_arqPTrata( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ PTrata, Valor, Descricao, Ativo ]	);
	IniciarDependencias_arqPTrata();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqPTrata( '' );
g_idOperacao = 32;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}