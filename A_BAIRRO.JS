/*=========================================================================
  a_bairro - Bairro
=========================================================================*/

//------------------------------------------------------------
Campo_arqBairro_Bairro.prototype = new Lance_CampoCadeia;

function Campo_arqBairro_Bairro()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Bairro", "Bairro", "Bairro", 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Bairro = new Campo_arqBairro_Bairro;

Bairro.TipoCampo |= CAMPO_CHAVE;
function IniciarDependencias_arqBairro()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqBairro";
//------------------------------------------------------------
function ListaDeCampos_arqBairro( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Bairro ]	);
	IniciarDependencias_arqBairro();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqBairro( '' );
g_idOperacao = 1;

if( parent.navegacao ) {
var Menu_1 = [ 1,"Endereço","","E",2,"","",1,"","1","a_endere","domEndereco","Folhear","Bairro","?","","", "","", 0,8,[],[3]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
