/*=========================================================================
  t_tmov - TMov
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TMov", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TMov", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTMov";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
