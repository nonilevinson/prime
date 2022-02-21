/*=========================================================================
  t_padrao - PadraoAcao
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "PadraoAcao", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "PadraoAcao", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabPadraoAcao";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = [ 1,"AcaoEmail","","A",18,"","",1,"","1","a_aemail","arqAcaoEmail","Folhear","PadraoAcao","?","","", "","", 0,9,[],[10]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
