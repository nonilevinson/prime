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
var Menu_1 = new Array( 1,"Pessoa","","P",12,"","",1,"","1","a_pessoa","arqPessoa","Folhear","TPFPJ","?","","", "","", 0,6,[],[7]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
