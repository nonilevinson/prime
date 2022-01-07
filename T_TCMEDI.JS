/*=========================================================================
  t_tcmedi - TCMedica
=========================================================================*/

//======================================================
//	Tabela e seus Itens
//======================================================
var Chave = new Lance_Campo_TabChave( "TCMedica", 1, "u", true );
var Descritor = new Lance_Campo_TabDescritor( "TCMedica", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
g_arquivoAtual = "tabTCMedica";
g_arquivoCampos = [ Chave, Descritor ];

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
