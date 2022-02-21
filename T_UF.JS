/*=========================================================================
  t_uf - UF
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "UF", 2, "uu", true );
var Descritor = new Lance_Campo_TabDescritor( "UF", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabUF";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = [ 1,"Cidade","","C",1,"","",1,"","1","a_cidade","arqCidade","Folhear","UF","?","","", "","", 0,6,[],[2]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
