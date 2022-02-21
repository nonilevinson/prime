/*=========================================================================
  a_config - Config
=========================================================================*/

//------------------------------------------------------------
Campo_cnfConfig_Email.prototype = new Lance_CampoLogico;

function Campo_cnfConfig_Email()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Email", "Email", "Email");
}

var Email = new Campo_cnfConfig_Email;

//------------------------------------------------------------
Campo_cnfConfig_Aviso.prototype = new Lance_CampoLogico;

function Campo_cnfConfig_Aviso()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Aviso", "Aviso", "Aviso");
}

var Aviso = new Campo_cnfConfig_Aviso;

//------------------------------------------------------------
Campo_cnfConfig_DocMod.prototype = new Lance_CampoLogico;

function Campo_cnfConfig_DocMod()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "DocMod", "DocMod", "DocMod");
}

var DocMod = new Campo_cnfConfig_DocMod;

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_cnfConfig_Email.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_cnfConfig_Aviso.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_cnfConfig_DocMod.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

function IniciarDependencias_cnfConfig()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "cnfConfig";
//------------------------------------------------------------
function ListaDeCampos_cnfConfig( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Email, Aviso, DocMod ]	);
	IniciarDependencias_cnfConfig();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_cnfConfig( '' );
g_idOperacao = 25;
parent.navegacao.MenuPrincQtdOpcoes=0;
parent.navegacao.MenuPrincPodeSo1=1;
