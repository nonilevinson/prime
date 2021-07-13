/*=========================================================================
  t_tordoc - TOrDoc
	usa a_endere
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TOrDoc", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TOrDoc", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTOrDoc";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"ModDoc","","M",63,"","",1,"","1","a_docmod","arqDocMod","Folhear","TOrDoc","?","","", "","", 0,6,[],[22]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
