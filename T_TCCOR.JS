/*=========================================================================
  t_tccor - TCCor
	usa a_endere
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TCCor", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TCCor", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTCCor";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = [ 1,"CCor","","C",255,"","",1,"","1","a_ccor","arqCCor","Folhear","TCCor","?","","", "","", 0,4,[],[20]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
