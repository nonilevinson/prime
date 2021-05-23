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
var Menu_1 = new Array( 1,"Pessoa","","P",86,"","",1,"","1","a_pessoa","arqPessoa","Folhear","TPessoa","?","","", "","", 0,6,[],[7]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
