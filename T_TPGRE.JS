/*=========================================================================
  t_tpgre - TPgRec
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TPgRec", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TPgRec", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTPgRec";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Plano","","P",84,"","",1,"","1","a_plano","arqPlano","Folhear","TPgRec","?","","", "","", 0,5,[],[27]);
var Menu_2 = new Array( 1,"Conta","","C",97,"","",1,"","1","a_conta","arqConta","Folhear","TPgRec","?","","", "","", 0,5,[],[33]);
parent.navegacao.MenuPrincQtdOpcoes=2;
}
