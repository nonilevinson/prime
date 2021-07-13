/*=========================================================================
  t_tipoac - TipoAcao
	usa a_endere
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TipoAcao", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TipoAcao", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTipoAcao";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"AcaoEmail","","A",16,"","",1,"","1","a_aemail","arqAcaoEmail","Folhear","TipoAcao","?","","", "","", 0,9,[],[10]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
