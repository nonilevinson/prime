/*=========================================================================
  t_tpfpj - TPFPJ
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TPFPJ", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TPFPJ", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTPFPJ";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = [ 1,"Fornecedor","","F",142,"","",1,"","1","a_fornec","arqFornecedor","Folhear","TPFPJ","?","","", "","", 0,10,[],[42]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
