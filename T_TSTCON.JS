/*=========================================================================
  t_tstcon - TStCon
	usa a_endere
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TStCon", 2, "uu", true );
var Descritor = new Lance_Campo_TabDescritor( "TStCon", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTStCon";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Consulta","","C",134,"","",1,"","1","a_consul","arqConsulta","Folhear","TStCon","?","","", "","", 0,8,[],[39]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
