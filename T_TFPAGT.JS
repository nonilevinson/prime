/*=========================================================================
  t_tfpagt - TFPagto
	usa a_endere
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TFPagto", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TFPagto", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTFPagto";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Parcela","","P",103,"","",1,"","1","a_parcel","arqParcela","Folhear","TFPagto","?","","", "","", 0,7,[],[34]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
