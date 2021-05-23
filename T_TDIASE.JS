/*=========================================================================
  t_tdiase - TDiaSem
	usa a_endere
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TDiaSem", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TDiaSem", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTDiaSem";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Horario","","H",115,"","",1,"","1","a_horari","arqHorario","Folhear","TDiaSem","?","","", "","", 0,7,[],[38]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
