/*=========================================================================
  t_tmov - TMov
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TMov", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TMov", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTMov";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"ItemMov","","I",212,"","",1,"","1","a_itemmo","arqItemMov","Folhear","TMov","?","","", "","", 0,7,[],[57]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
