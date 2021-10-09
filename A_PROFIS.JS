/*=========================================================================
  a_profis - Profissao
=========================================================================*/

//------------------------------------------------------------
Campo_arqProfissao_Profissao.prototype = new Lance_CampoCadeia;

function Campo_arqProfissao_Profissao()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Profissao", "Profissao", "Profissao", 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Profissao = new Campo_arqProfissao_Profissao;

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqProfissao_Profissao.prototype.Cabecalho = function()
{
		return( "Profissão" );
}

Profissao.TipoCampo |= CAMPO_CHAVE;
function IniciarDependencias_arqProfissao()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqProfissao";
//------------------------------------------------------------
function ListaDeCampos_arqProfissao( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Profissao ]	);
	IniciarDependencias_arqProfissao();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqProfissao( '' );
g_idOperacao = 36;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Pessoas","","P",108,"","",1,"","1","a_pessoa","arqPessoa","Folhear","Profissao","?","","", "","", 0,7,[],[7]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
