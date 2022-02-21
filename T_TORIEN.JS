/*=========================================================================
  t_torien - TOrienta
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TOrienta", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TOrienta", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTOrienta";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = [ 1,"DocMod","","D",70,"","",1,"","1","a_docmod","arqDocMod","Folhear","TOrienta","?","","", "","", 0,6,[],[22]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
