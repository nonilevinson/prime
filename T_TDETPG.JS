/*=========================================================================
  t_tdetpg - TDetPg
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TDetPg", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TDetPg", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTDetPg";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Parcela","","P",104,"","",1,"","1","a_parcel","arqParcela","Folhear","TDetPg","?","","", "","", 0,7,[],[34]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
