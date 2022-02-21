/*=========================================================================
  t_tdiase - TDiaSem
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TDiaSem", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TDiaSem", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTDiaSem";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = [ 1,"Plantao","","P",141,"","",1,"","1","a_planta","arqPlantao","Folhear","TDiaSem","?","","", "","", 0,7,[],[41]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
