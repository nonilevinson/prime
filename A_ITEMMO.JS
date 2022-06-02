/*=========================================================================
  a_itemmo - ItemMov
=========================================================================*/

//------------------------------------------------------------
Campo_arqItemMov_MovEstoque.prototype = new Lance_CampoHidden;

function Campo_arqItemMov_MovEstoque()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "MovEstoque", "MovEstoque", "MovEstoque", "arqMovEstoque", "a_movest", null, "",56);
}

var MovEstoque = new Campo_arqItemMov_MovEstoque;

//------------------------------------------------------------
Campo_arqItemMov_MovEstoque_Num.prototype = new Lance_CampoNumericoLigado;

function Campo_arqItemMov_MovEstoque_Num()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "MovEstoque_Num", "MovEstoque_Num", "Num", MovEstoque, 9, "###.###.##z", true,"", "");
}

var MovEstoque_Num = new Campo_arqItemMov_MovEstoque_Num;

//------------------------------------------------------------
Campo_arqItemMov_Item.prototype = new Lance_CampoNumerico;

function Campo_arqItemMov_Item()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Item", "Item", "Item", 3, "##z", true,"", "");
}

var Item = new Campo_arqItemMov_Item;

//------------------------------------------------------------
Campo_arqItemMov_Lote.prototype = new Lance_CampoHidden;

function Campo_arqItemMov_Lote()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Lote", "Lote", "Lote", "arqLote", "a_lote", null, "",55);
}

var Lote = new Campo_arqItemMov_Lote;

//------------------------------------------------------------
Campo_arqItemMov_Lote_Medicamen.prototype = new Lance_CampoHidden;

function Campo_arqItemMov_Lote_Medicamen()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Lote_Medicamen", "Lote_Medicamen", "Medicamen", "arqMedicamen", "a_medica", Lote, "",52);
}

var Lote_Medicamen = new Campo_arqItemMov_Lote_Medicamen;

//------------------------------------------------------------
Campo_arqItemMov_Lote_Medicamen_Medicamen.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqItemMov_Lote_Medicamen_Medicamen()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Lote_Medicamen_Medicamen", "Lote_Medicamen_Medicamen", "Medicamen", Lote_Medicamen, 50, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Lote_Medicamen_Medicamen = new Campo_arqItemMov_Lote_Medicamen_Medicamen;

//------------------------------------------------------------
Campo_arqItemMov_Lote_Lote.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqItemMov_Lote_Lote()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Lote_Lote", "Lote_Lote", "Lote", Lote, 15, "uuuuuuuuuuuuuuu", false);
}

var Lote_Lote = new Campo_arqItemMov_Lote_Lote;

//------------------------------------------------------------
Campo_arqItemMov_TMov.prototype = new Lance_CampoLigado;

function Campo_arqItemMov_TMov()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TMov", "TMov", "TMov", "tabTMov", "t_tmov", null, "",0);
}

var TMov = new Campo_arqItemMov_TMov;

//------------------------------------------------------------
Campo_arqItemMov_TMov_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqItemMov_TMov_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TMov_Chave", "TMov_Chave", "TMov", TMov, 1, "u", false);
}

var TMov_Chave = new Campo_arqItemMov_TMov_Chave;

//------------------------------------------------------------
Campo_arqItemMov_TMov_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqItemMov_TMov_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TMov_Descritor", "TMov_Descritor", "TMov", TMov, 19, "xxxxxxxxxxxxxxxxxxx", false);
}

var TMov_Descritor = new Campo_arqItemMov_TMov_Descritor;

//------------------------------------------------------------
Campo_arqItemMov_Qtd.prototype = new Lance_CampoNumerico;

function Campo_arqItemMov_Qtd()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Qtd", "Qtd", "Qtd", 4, "#.##z", true,"", "");
}

var Qtd = new Campo_arqItemMov_Qtd;

//------------------------------------------------------------
Campo_arqItemMov_QtdCalc.prototype = new Lance_CampoNumerico;

function Campo_arqItemMov_QtdCalc()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "QtdCalc", "QtdCalc", "QtdCalc", 4, "#.##z", true,"", "");
}

var QtdCalc = new Campo_arqItemMov_QtdCalc;

//------------------------------------------------------------
Campo_arqItemMov_CUnidade.prototype = new Lance_CampoCadeia;

function Campo_arqItemMov_CUnidade()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "CUnidade", "CUnidade", "CUnidade", 10, "uuuuuuuuuu", false);
}

var CUnidade = new Campo_arqItemMov_CUnidade;

//-------------------------------------------------------------
// Campos a mais que o ligado traz do pai
//-------------------------------------------------------------
Campo_arqItemMov_MovEstoque.prototype.TrazOutrosDoPai = function()
{
	var vetPai = [];
			vetPai[0] = [ "Clinica",
					"A.MovEstoque, arqMovEstoque",
					"0" ];
		return( vetPai );
}

MovEstoque.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqItemMov_MovEstoque_Num.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( MovEstoque.Obrigatorio( p_comMsg ) );
}

MovEstoque_Num.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqItemMov_Item.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( maior( "Item+1", 1, MovEstoque ) ) );
}
}

Item.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqItemMov_Lote.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo=1 and (Select M.Clinica From arqMovEstoque M where M.idPrimario="+MovEstoque+")=A.Clinica" );
		return( "" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqItemMov_Lote.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O lote é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqItemMov_Lote_Medicamen.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Lote.Obrigatorio( p_comMsg ) );
}

Lote_Medicamen.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqItemMov_Lote_Medicamen_Medicamen.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Lote.Obrigatorio( p_comMsg ) );
}

Lote_Medicamen_Medicamen.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqItemMov_Lote_Lote.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Lote.Obrigatorio( p_comMsg ) );
}

Lote_Lote.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqItemMov_TMov.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O tipo é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqItemMov_TMov.prototype.Cabecalho = function()
{
		return( "Tipo" );
}

TMov_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TMov_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqItemMov_Qtd.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A quantidade é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqItemMov_QtdCalc.prototype.Calculou = function()
{
{
		if( estaContido( TMov, [ 2 ] ) )
	return( this.Atribuiu( Qtd ) );
}
{
	return( this.Atribuiu( -Qtd ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqItemMov_QtdCalc.prototype.Cabecalho = function()
{
		return( "Qtd" );
}

QtdCalc.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqItemMov_CUnidade.prototype.Calculou = function()
{
{
{
	if( !Lote.ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT Unidade FROM arqUnidade WHERE arqUnidade.IdPrimario=( COALESCE( ( SELECT Unidade FROM arqMedicamen WHERE arqMedicamen.IdPrimario=( COALESCE( ( SELECT Medicamen FROM arqLote WHERE arqLote.IdPrimario=( " + Lote + " ) ), 0 ) ) ), 0 ) )  )" + LANCE_SEPARADOR + this.Prefixo + "CUnidade" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqItemMov_CUnidade.prototype.Cabecalho = function()
{
		return( "Unidade" );
}

CUnidade.EhCalculado = true;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqItemMov_MovEstoque.prototype.ExistenciaEspecial = function()
{
	return( ( !MovEstoque_Num.Obrigatorio( false ) || tem(MovEstoque_Num) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqItemMov_Lote.prototype.ExistenciaEspecial = function()
{
	return( ( !Lote_Medicamen.Obrigatorio( false ) || tem(Lote_Medicamen) ) && ( !Lote_Lote.Obrigatorio( false ) || tem(Lote_Lote) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqItemMov_Lote_Medicamen.prototype.ExistenciaEspecial = function()
{
	return( ( !Lote_Medicamen_Medicamen.Obrigatorio( false ) || tem(Lote_Medicamen_Medicamen) ) );
}

function IniciarDependencias_arqItemMov()
{
TMov.CalculosDependentes= [ QtdCalc ];
Qtd.CalculosDependentes= [ QtdCalc ];
Lote.CalculosDependentes= [ CUnidade ];
MovEstoque_Num.ExistenciasDependentes= [ MovEstoque ];
Lote_Medicamen.ExistenciasDependentes= [ Lote ];
Lote_Medicamen_Medicamen.ExistenciasDependentes= [ Lote_Medicamen ];
Lote_Lote.ExistenciasDependentes= [ Lote ];
MovEstoque_Num.ErrosDependentes= [ MovEstoque ];
Lote_Medicamen_Medicamen.ErrosDependentes= [ Lote_Medicamen ];
Lote_Lote.ErrosDependentes= [ Lote ];
MovEstoque.CamposChave= [ MovEstoque_Num ];
Lote.CamposChave= [ Lote_Medicamen,Lote_Lote ];
Lote_Medicamen.CamposChave= [ Lote_Medicamen_Medicamen ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqItemMov";
var MovEstoque_Clinica;
//------------------------------------------------------------
function ListaDeCampos_arqItemMov( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ MovEstoque, MovEstoque_Num, Item, Lote, Lote_Medicamen, Lote_Medicamen_Medicamen, Lote_Lote, TMov, TMov_Chave, TMov_Descritor, Qtd, QtdCalc, CUnidade ]	);
	IniciarDependencias_arqItemMov();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqItemMov( '' );
g_idOperacao = 57;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
