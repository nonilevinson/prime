/*=========================================================================
  a_grupo - Grupo
=========================================================================*/

//------------------------------------------------------------
Campo_arqGrupo_Grupo.prototype = new Lance_CampoCadeia;

function Campo_arqGrupo_Grupo()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Grupo", "Grupo", "Grupo", 50, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Grupo = new Campo_arqGrupo_Grupo;

Grupo.TipoCampo |= CAMPO_CHAVE;
function IniciarDependencias_arqGrupo()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqGrupo";
//------------------------------------------------------------
function ListaDeCampos_arqGrupo( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Grupo ]	);
	IniciarDependencias_arqGrupo();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqGrupo( '' );
g_idOperacao = 4;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Usuários","","U",4,"","",1,"","1","a_usuari","arqUsuario","Folhear","Grupo","?","","", "","", 0,40,[],[5]);
var Menu_2 = new Array( 1,"Criar ou alterar permissões","","C",9,"","",1,"","5","lance_permissoes_criar","","","","","","", "","", 0,40,[9],[]);
var Menu_3 = new Array( 1,"Copiar permissões do ATUAL para marcados","","o",10,"","",1,"","5","lance_permissoes_copiar","","","","","","", "","", 0,40,[10],[]);
var Menu_4 = new Array( 1,"Excluir permissões","","E",11,"","",1,"","5","lance_permissoes_excluir","","","","","","", "","", 0,40,[11],[]);
var Menu_5 = new Array( 1,"Para grupo","","P",32,"","",1,"","1","a_paragr","arqParaGrupo","Folhear","Grupo","?","","", "","", 0,40,[],[15]);
parent.navegacao.MenuPrincQtdOpcoes=5;
}
