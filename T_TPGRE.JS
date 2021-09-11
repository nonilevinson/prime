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
var Menu_1 = new Array( 1,"Plano","","P",84,"","",1,"","1","a_plano","arqPlano","Folhear","TPgRec","?","","", "","", 0,10,[],[27]);
var Menu_2 = new Array( 1,"Conta","","C",97,"","",1,"","1","a_conta","arqConta","Folhear","TPgRec","?","","", "","", 0,10,[],[33]);
var Menu_3 = new Array( 1,"Recorrente","","R",153,"","",1,"","1","a_recor","arqRecorrente","Folhear","TPgRec","?","","", "","", 0,10,[],[46]);
parent.navegacao.MenuPrincQtdOpcoes=3;
}
