/*=========================================================================
  t_tcompe - TCompete
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TCompete", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TCompete", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTCompete";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = [ 1,"Recorrente","","R",157,"","",1,"","1","a_recor","arqRecorrente","Folhear","TCompete","?","","", "","", 0,10,[],[46]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
