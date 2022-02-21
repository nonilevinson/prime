/*=========================================================================
  t_priori - Prioridade
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "Prioridade", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "Prioridade", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabPrioridade";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = [ 1,"Avisos","","A",30,"","",1,"","1","a_avisos","arqAvisos","Folhear","Prioridade","?","","", "","", 0,6,[],[14]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
