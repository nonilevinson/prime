/*=========================================================================
  a_banco - Banco
=========================================================================*/

//------------------------------------------------------------
Campo_arqBanco_Num.prototype = new Lance_CampoNumerico;

function Campo_arqBanco_Num()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Num", "Num", "Num", 3, "##z", true,"", "");
}

var Num = new Campo_arqBanco_Num;

//------------------------------------------------------------
Campo_arqBanco_Banco.prototype = new Lance_CampoCadeia;

function Campo_arqBanco_Banco()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Banco", "Banco", "Banco", 50, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Banco = new Campo_arqBanco_Banco;

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqBanco_Num.prototype.Cabecalho = function()
{
		return( "N° Banco" );
}

Num.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqBanco_Banco.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O nome do banco é obrigatório" );
		return( true );
	}
}

Banco.TipoCampo |= CAMPO_DESCRITOR;
function IniciarDependencias_arqBanco()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqBanco";
//------------------------------------------------------------
function ListaDeCampos_arqBanco( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Num, Banco ]	);
	IniciarDependencias_arqBanco();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqBanco( '' );
g_idOperacao = 19;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Contas da empresa","","C",58,"","",1,"","1","a_ccor","arqCCor","Folhear","Banco","?","","", "","", 0,17,[],[20]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
