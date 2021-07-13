/*=========================================================================
  t_tpapel - TPapel
	usa a_endere
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TPapel", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TPapel", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTPapel";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"DocMod","","D",69,"","",1,"","1","a_docmod","arqDocMod","Folhear","TPapel","?","","", "","", 0,6,[],[22]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
