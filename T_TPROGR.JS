/*=========================================================================
  t_tprogr - TPrograma
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TPrograma", 2, "uu", true );
var Descritor = new Lance_Campo_TabDescritor( "TPrograma", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTPrograma";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Consulta","","C",132,"","",1,"","1","a_consul","arqConsulta","Folhear","TPrograma","?","","", "","", 0,8,[],[39]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
