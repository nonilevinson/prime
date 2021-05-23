/*=========================================================================
  t_estciv - EstCivil
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "EstCivil", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "EstCivil", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabEstCivil";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Pessoa","","P",14,"","",1,"","1","a_pessoa","arqPessoa","Folhear","EstCivil","?","","", "","", 0,6,[],[7]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
