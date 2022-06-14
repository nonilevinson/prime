/*=========================================================================
  a_medica - Medicamen
=========================================================================*/

//------------------------------------------------------------
Campo_arqMedicamen_Medicamen.prototype = new Lance_CampoCadeia;

function Campo_arqMedicamen_Medicamen()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Medicamen", "Medicamen", "Medicamen", 50, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Medicamen = new Campo_arqMedicamen_Medicamen;

//------------------------------------------------------------
Campo_arqMedicamen_Unidade.prototype = new Lance_CampoHidden;

function Campo_arqMedicamen_Unidade()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Unidade", "Unidade", "Unidade", "arqUnidade", "a_unidad", null, "",51);
}

var Unidade = new Campo_arqMedicamen_Unidade;

//------------------------------------------------------------
Campo_arqMedicamen_Unidade_Unidade.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqMedicamen_Unidade_Unidade()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Unidade_Unidade", "Unidade_Unidade", "Unidade", Unidade, 10, "uuuuuuuuuu", false);
}

var Unidade_Unidade = new Campo_arqMedicamen_Unidade_Unidade;

//------------------------------------------------------------
Campo_arqMedicamen_TrgItLote.prototype = new Lance_CampoNumerico;

function Campo_arqMedicamen_TrgItLote()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "TrgItLote", "TrgItLote", "TrgItLote", 6, "###.##z", true,"", "");
}

var TrgItLote = new Campo_arqMedicamen_TrgItLote;

//------------------------------------------------------------
Campo_arqMedicamen_TrgCMLote.prototype = new Lance_CampoNumerico;

function Campo_arqMedicamen_TrgCMLote()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "TrgCMLote", "TrgCMLote", "TrgCMLote", 6, "###.##z", true,"", "");
}

var TrgCMLote = new Campo_arqMedicamen_TrgCMLote;

//------------------------------------------------------------
Campo_arqMedicamen_Estoque.prototype = new Lance_CampoNumerico;

function Campo_arqMedicamen_Estoque()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Estoque", "Estoque", "Estoque", 6, "###.##z", true,"(", "");
}

var Estoque = new Campo_arqMedicamen_Estoque;

//------------------------------------------------------------
Campo_arqMedicamen_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqMedicamen_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqMedicamen_Ativo;

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqMedicamen_Medicamen.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O medicamento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqMedicamen_Medicamen.prototype.Cabecalho = function()
{
		return( "Medicamento" );
}

Medicamen.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqMedicamen_Unidade.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo = 1" );
		return( "" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqMedicamen_Unidade.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A unidade é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqMedicamen_Unidade_Unidade.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Unidade.Obrigatorio( p_comMsg ) );
}

Unidade_Unidade.TipoCampo |= CAMPO_CHAVE_PAI;
TrgItLote.EhCalculado = true;
TrgItLote.EhTotalizado = true;
TrgCMLote.EhCalculado = true;
TrgCMLote.EhTotalizado = true;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqMedicamen_Estoque.prototype.Calculou = function()
{
{
	return( this.Atribuiu( TrgItLote - TrgCMLote ) );
}
}

Estoque.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqMedicamen_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqMedicamen_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqMedicamen_Unidade.prototype.ExistenciaEspecial = function()
{
	return( ( !Unidade_Unidade.Obrigatorio( false ) || tem(Unidade_Unidade) ) );
}

function IniciarDependencias_arqMedicamen()
{
TrgItLote.CalculosDependentes= [ Estoque ];
TrgCMLote.CalculosDependentes= [ Estoque ];
Unidade_Unidade.ExistenciasDependentes= [ Unidade ];
Unidade_Unidade.ErrosDependentes= [ Unidade ];
Unidade.CamposChave= [ Unidade_Unidade ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqMedicamen";
//------------------------------------------------------------
function ListaDeCampos_arqMedicamen( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Medicamen, Unidade, Unidade_Unidade, TrgItLote, TrgCMLote, Estoque, Ativo ]	);
	IniciarDependencias_arqMedicamen();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqMedicamen( '' );
g_idOperacao = 52;

if( parent.navegacao ) {
var Menu_1 = [ 1,"Lotes","","L",208,"","",1,"","1","a_lote","arqLote","Folhear","Medicamen","?","FilTodos","", "","", 0,9,[],[55]];
var Menu_2 = [ 1,"Consultas","","u",207,"","",1,"","1","a_cmedic","arqCMedica","Folhear","Medicamen","?","NavMedica","", "","", 0,9,[],[54]];
parent.navegacao.MenuPrincQtdOpcoes=2;
}
