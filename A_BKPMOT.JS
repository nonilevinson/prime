/*=========================================================================
  a_bkpmot - BkpMotivo
=========================================================================*/

//------------------------------------------------------------
Campo_arqBkpMotivo_BkpMotivo.prototype = new Lance_CampoCadeia;

function Campo_arqBkpMotivo_BkpMotivo()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "BkpMotivo", "BkpMotivo", "BkpMotivo", 50, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var BkpMotivo = new Campo_arqBkpMotivo_BkpMotivo;

//------------------------------------------------------------
Campo_arqBkpMotivo_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqBkpMotivo_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqBkpMotivo_Ativo;

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqBkpMotivo_BkpMotivo.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O motivo é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqBkpMotivo_BkpMotivo.prototype.Cabecalho = function()
{
		return( "Motivo" );
}

BkpMotivo.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqBkpMotivo_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqBkpMotivo_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

function IniciarDependencias_arqBkpMotivo()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqBkpMotivo";
//------------------------------------------------------------
function ListaDeCampos_arqBkpMotivo( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ BkpMotivo, Ativo ]	);
	IniciarDependencias_arqBkpMotivo();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqBkpMotivo( '' );
g_idOperacao = 62;

if( parent.navegacao ) {
var Menu_1 = [ 1,"Consultas","","C",288,"","",1,"","1","a_consul","arqConsulta","Folhear","BkpMotivo","?","","", "","", 0,9,[],[39]];
parent.navegacao.MenuPrincQtdOpcoes=1;
}
