/*=========================================================================
  a_grupo - Grupo
=========================================================================*/

//------------------------------------------------------------
Campo_arqGrupo_Grupo.prototype = new Lance_CampoCadeia;

function Campo_arqGrupo_Grupo()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Grupo", "Grupo", "Grupo", 50, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Grupo = new Campo_arqGrupo_Grupo;

//------------------------------------------------------------
Campo_arqGrupo_CallCenter.prototype = new Lance_CampoLogico;

function Campo_arqGrupo_CallCenter()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "CallCenter", "CallCenter", "CallCenter");
}

var CallCenter = new Campo_arqGrupo_CallCenter;

//------------------------------------------------------------
Campo_arqGrupo_Medico.prototype = new Lance_CampoLogico;

function Campo_arqGrupo_Medico()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Medico", "Medico", "Medico");
}

var Medico = new Campo_arqGrupo_Medico;

//------------------------------------------------------------
Campo_arqGrupo_Assessor.prototype = new Lance_CampoLogico;

function Campo_arqGrupo_Assessor()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Assessor", "Assessor", "Assessor");
}

var Assessor = new Campo_arqGrupo_Assessor;

Grupo.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqGrupo_CallCenter.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqGrupo_CallCenter.prototype.Cabecalho = function()
{
		return( "Call center?" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqGrupo_Medico.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqGrupo_Medico.prototype.Cabecalho = function()
{
		return( "Médico?" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqGrupo_Assessor.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqGrupo_Assessor.prototype.Cabecalho = function()
{
		return( "Assessor?" );
}

function IniciarDependencias_arqGrupo()
{
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqGrupo";
//------------------------------------------------------------
function ListaDeCampos_arqGrupo( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Grupo, CallCenter, Medico, Assessor ]	);
	IniciarDependencias_arqGrupo();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqGrupo( '' );
g_idOperacao = 4;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Usuários","","U",4,"","",1,"","1","a_usuari","arqUsuario","Folhear","Grupo","?","","", "","", 0,40,[],[5]);
var Menu_2 = new Array( 1,"Criar ou alterar permissões","","C",9,"","",1,"","5","lance_permissoes_criar","","","","","","", "","", 0,40,[9],[]);
var Menu_3 = new Array( 1,"Copiar permissões do ATUAL para marcados","","o",10,"","",1,"","5","lance_permissoes_copiar","","","","","","", "","", 0,40,[10],[]);
var Menu_4 = new Array( 1,"Excluir permissões","","E",11,"","",1,"","5","lance_permissoes_excluir","","","","","","", "","", 0,40,[11],[]);
var Menu_5 = new Array( 1,"Para grupo","","P",32,"","",1,"","1","a_paragr","arqParaGrupo","Folhear","Grupo","?","","", "","", 0,40,[],[15]);
parent.navegacao.MenuPrincQtdOpcoes=5;
}
