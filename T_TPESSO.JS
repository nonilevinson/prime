/*=========================================================================
  t_tpesso - TPessoa
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TPessoa", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TPessoa", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTPessoa";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
