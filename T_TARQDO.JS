/*=========================================================================
  t_tarqdo - TArqDoc
	usa a_endere
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TArqDoc", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TArqDoc", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTArqDoc";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"ModDoc","","M",62,"","",1,"","1","a_docmod","arqDocMod","Folhear","TArqDoc","?","","", "","", 0,6,[],[22]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
