/*=========================================================================
  t_tfcobr - TFCobra
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TFCobra", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TFCobra", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTFCobra";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Parcela","","P",100,"","",1,"","1","a_parcel","arqParcela","Folhear","TFCobra","?","","", "","", 0,7,[],[34]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
