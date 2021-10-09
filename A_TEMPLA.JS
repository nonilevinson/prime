/*=========================================================================
  a_templa - Template
=========================================================================*/

//------------------------------------------------------------
Campo_arqTemplate_Nome.prototype = new Lance_CampoCadeia;

function Campo_arqTemplate_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Nome", "Nome", "Nome", 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Nome = new Campo_arqTemplate_Nome;

//------------------------------------------------------------
Campo_arqTemplate_Template.prototype = new Lance_CampoTexto;

function Campo_arqTemplate_Template()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Template", "Template", "Template", false);
}

var Template = new Campo_arqTemplate_Template;

Nome.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqTemplate_Template.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "Template é obrigatório" );
		return( true );
	}
}

function IniciarDependencias_arqTemplate()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqTemplate";
//------------------------------------------------------------
function ListaDeCampos_arqTemplate( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Nome, Template ]	);
	IniciarDependencias_arqTemplate();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqTemplate( '' );
g_idOperacao = 8;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Ações de email","","A",17,"","",1,"","1","a_aemail","arqAcaoEmail","Folhear","Template","?","","", "","", 0,21,[],[10]);
var Menu_2 = new Array( 1,"Modelos de documentos","","M",64,"","",cnfConfig["DOCMOD"] == 1,"","1","a_docmod","arqDocMod","Folhear","Template","?","","", "","", 0,21,[],[22]);
parent.navegacao.MenuPrincQtdOpcoes=2;
}
