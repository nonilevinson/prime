/*=========================================================================
  t_tpix - TPix
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TPix", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TPix", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTPix";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"CCor","","C",77,"","",1,"","1","a_ccor","arqCCor","Folhear","TPix1","?","","", "","", 0,4,[],[20]);
var Menu_2 = new Array( 1,"CCor","","C",78,"","",1,"","1","a_ccor","arqCCor","Folhear","TPix2","?","","", "","", 0,4,[],[20]);
var Menu_3 = new Array( 1,"CCor","","C",79,"","",1,"","1","a_ccor","arqCCor","Folhear","TPix3","?","","", "","", 0,4,[],[20]);
var Menu_4 = new Array( 1,"CCor","","C",80,"","",1,"","1","a_ccor","arqCCor","Folhear","TPix4","?","","", "","", 0,4,[],[20]);
var Menu_5 = new Array( 1,"CCor","","C",81,"","",1,"","1","a_ccor","arqCCor","Folhear","TPix5","?","","", "","", 0,4,[],[20]);
parent.navegacao.MenuPrincQtdOpcoes=5;
}
