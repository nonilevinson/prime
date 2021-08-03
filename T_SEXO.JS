/*=========================================================================
  t_sexo - Sexo
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "Sexo", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "Sexo", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabSexo";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Pessoas","","s",13,"","",1,"","1","a_pessoa","arqPessoa","Folhear","Sexo","?","","", "","", 0,10,[],[7]);
var Menu_2 = new Array( 1,"ContPessoa","","C",76,"","",1,"","1","a_contpe","arqContPessoa","Folhear","Sexo","?","","", "","", 0,10,[],[21]);
parent.navegacao.MenuPrincQtdOpcoes=2;
}
