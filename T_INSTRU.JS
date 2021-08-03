/*=========================================================================
  t_instru - Instrucao
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "Instrucao", 2, "uu", true );
var Descritor = new Lance_Campo_TabDescritor( "Instrucao", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabInstrucao";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
