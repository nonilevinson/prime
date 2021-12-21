/*=========================================================================
  a_lote - Lote
=========================================================================*/

//------------------------------------------------------------
Campo_arqLote_Medicam.prototype = new Lance_CampoHidden;

function Campo_arqLote_Medicam()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Medicam", "Medicam", "Medicam", "arqMedicamen", "a_medica", null, "",52);
}

var Medicam = new Campo_arqLote_Medicam;

//------------------------------------------------------------
Campo_arqLote_Medicam_Medicamen.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqLote_Medicam_Medicamen()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Medicam_Medicamen", "Medicam_Medicamen", "Medicamen", Medicam, 50, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Medicam_Medicamen = new Campo_arqLote_Medicam_Medicamen;

//------------------------------------------------------------
Campo_arqLote_Lote.prototype = new Lance_CampoCadeia;

function Campo_arqLote_Lote()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Lote", "Lote", "Lote", 15, "uuuuuuuuuuuuuuu", false);
}

var Lote = new Campo_arqLote_Lote;

//------------------------------------------------------------
Campo_arqLote_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqLote_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqLote_Clinica;

//------------------------------------------------------------
Campo_arqLote_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqLote_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Clinica_Clinica = new Campo_arqLote_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqLote_Fabrica.prototype = new Lance_CampoData;

function Campo_arqLote_Fabrica()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Fabrica", "Fabrica", "Fabrica", 8, "dd/mm/aaaa", true);
}

var Fabrica = new Campo_arqLote_Fabrica;

//------------------------------------------------------------
Campo_arqLote_Validade.prototype = new Lance_CampoData;

function Campo_arqLote_Validade()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Validade", "Validade", "Validade", 8, "dd/mm/aaaa", true);
}

var Validade = new Campo_arqLote_Validade;

//------------------------------------------------------------
Campo_arqLote_TrgItMov.prototype = new Lance_CampoNumerico;

function Campo_arqLote_TrgItMov()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "TrgItMov", "TrgItMov", "TrgItMov", 4, "#.##z", true,"(", "");
}

var TrgItMov = new Campo_arqLote_TrgItMov;

//------------------------------------------------------------
Campo_arqLote_TrgCMedica.prototype = new Lance_CampoNumerico;

function Campo_arqLote_TrgCMedica()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "TrgCMedica", "TrgCMedica", "TrgCMedica", 4, "#.##z", true,"", "");
}

var TrgCMedica = new Campo_arqLote_TrgCMedica;

//------------------------------------------------------------
Campo_arqLote_Estoque.prototype = new Lance_CampoNumerico;

function Campo_arqLote_Estoque()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Estoque", "Estoque", "Estoque", 4, "#.##z", true,"(", "");
}

var Estoque = new Campo_arqLote_Estoque;

//------------------------------------------------------------
Campo_arqLote_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqLote_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqLote_Ativo;

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqLote_Medicam.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O medicamento é obrigatório" );
		return( true );
	}
}

Medicam.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqLote_Medicam_Medicamen.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Medicam.Obrigatorio( p_comMsg ) );
}

Medicam_Medicamen.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqLote_Lote.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O lote é obrigatório" );
		return( true );
	}
}

Lote.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqLote_Clinica.prototype.FiltroPai = function()
{
		if( g_temMaisDeUmClinica )
			return( "A.idPrimario in ( " + g_vetIdClinica + " )" );
		return( "" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqLote_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A clínica é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqLote_Clinica.prototype.Cabecalho = function()
{
		return( "Clínica" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqLote_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_arqLote_Fabrica.prototype.TemAdvertencia = function()
{
		if( !tem( Fabrica ) )
	{
		return( !confirm( "Não informará a data da fabricação?" ) );
	}
	return( Lance_CampoLogico.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqLote_Fabrica.prototype.Cabecalho = function()
{
		return( "Fabricação" );
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_arqLote_Validade.prototype.TemAdvertencia = function()
{
		if( !tem( Validade ) )
	{
		return( !confirm( "Não informará a validade?" ) );
	}
	return( Lance_CampoLogico.prototype.TemAdvertencia.call( this ) );
}

TrgItMov.EhCalculado = true;
TrgItMov.EhTotalizado = true;
TrgCMedica.EhCalculado = true;
TrgCMedica.EhTotalizado = true;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqLote_Estoque.prototype.Calculou = function()
{
{
	return( this.Atribuiu( TrgItMov - TrgCMedica ) );
}
}

Estoque.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqLote_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqLote_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqLote_Medicam.prototype.ExistenciaEspecial = function()
{
	return( ( !Medicam_Medicamen.Obrigatorio( false ) || tem(Medicam_Medicamen) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqLote_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

function IniciarDependencias_arqLote()
{
TrgItMov.CalculosDependentes= [ Estoque ];
TrgCMedica.CalculosDependentes= [ Estoque ];
Medicam_Medicamen.ExistenciasDependentes= [ Medicam ];
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Medicam_Medicamen.ErrosDependentes= [ Medicam ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Medicam.CamposChave= [ Medicam_Medicamen ];
Clinica.CamposChave= [ Clinica_Clinica ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqLote";
//------------------------------------------------------------
function ListaDeCampos_arqLote( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Medicam, Medicam_Medicamen, Lote, Clinica, Clinica_Clinica, Fabrica, Validade, TrgItMov, TrgCMedica, Estoque, Ativo ]	);
	IniciarDependencias_arqLote();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqLote( '' );
g_idOperacao = 55;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Itens Mov.","","I",213,"","",1,"","1","a_itemmo","arqItemMov","Folhear","Lote","?","","", "","", 0,10,[],[57]);
var Menu_2 = new Array( 1,"Entregue","","g",214,"","",1,"","1","a_cmedic","arqCMedica","Folhear","Lote","?","","", "","", 0,10,[],[54]);
parent.navegacao.MenuPrincQtdOpcoes=2;
}
