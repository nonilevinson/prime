/*=========================================================================
  t_tclini - TClinica
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TClinica", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TClinica", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTClinica";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = [ 1,"TStCon","","T",282,"","",1,"","1","a_tstcon","arqTStCon","Folhear","TClinica","?","","", "","", 0,6,[],[61]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
