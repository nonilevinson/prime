/*=========================================================================
  t_tstagr - TStAgRet
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TStAgRet", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TStAgRet", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTStAgRet";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = [ 1,"AgRet","","A",198,"","",1,"","1","a_agret","arqAgRet","Folhear","TStAgRet","?","","", "","", 0,5,[],[53]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
