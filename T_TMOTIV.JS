/*=========================================================================
  t_tmotiv - TMotivo
	usa a_endere
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TMotivo", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TMotivo", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTMotivo";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Consulta","","C",131,"","",1,"","1","a_consul","arqConsulta","Folhear","TMotivo","?","","", "","", 0,8,[],[39]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
