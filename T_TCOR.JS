/*=========================================================================
  t_tcor - TCor
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TCor", 4, "uuuu", true );
var Descritor = new Lance_Campo_TabDescritor( "TCor", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTCor";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
