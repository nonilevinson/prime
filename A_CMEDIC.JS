/*=========================================================================
  a_cmedic - CMedica
=========================================================================*/

//------------------------------------------------------------
Campo_arqCMedica_Consulta.prototype = new Lance_CampoHidden;

function Campo_arqCMedica_Consulta()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Consulta", "Consulta", "Consulta", "arqConsulta", "a_consul", null, "",39);
}

var Consulta = new Campo_arqCMedica_Consulta;

//------------------------------------------------------------
Campo_arqCMedica_Consulta_Num.prototype = new Lance_CampoNumericoLigado;

function Campo_arqCMedica_Consulta_Num()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Consulta_Num", "Consulta_Num", "Num", Consulta, 6, "###.##z", true,"", "");
}

var Consulta_Num = new Campo_arqCMedica_Consulta_Num;

//------------------------------------------------------------
Campo_arqCMedica_Medicamen.prototype = new Lance_CampoHidden;

function Campo_arqCMedica_Medicamen()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Medicamen", "Medicamen", "Medicamen", "arqMedicamen", "a_medica", null, "",52);
}

var Medicamen = new Campo_arqCMedica_Medicamen;

//------------------------------------------------------------
Campo_arqCMedica_Medicamen_Medicamen.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCMedica_Medicamen_Medicamen()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Medicamen_Medicamen", "Medicamen_Medicamen", "Medicamen", Medicamen, 50, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Medicamen_Medicamen = new Campo_arqCMedica_Medicamen_Medicamen;

//------------------------------------------------------------
Campo_arqCMedica_UnidadeCal.prototype = new Lance_CampoCadeia;

function Campo_arqCMedica_UnidadeCal()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "UnidadeCal", "UnidadeCal", "UnidadeCal", 10, "uuuuuuuuuu", false);
}

var UnidadeCal = new Campo_arqCMedica_UnidadeCal;

//------------------------------------------------------------
Campo_arqCMedica_Qtd.prototype = new Lance_CampoNumerico;

function Campo_arqCMedica_Qtd()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Qtd", "Qtd", "Qtd", 4, "#.##z", true,"", "");
}

var Qtd = new Campo_arqCMedica_Qtd;

//------------------------------------------------------------
Campo_arqCMedica_Lote.prototype = new Lance_CampoHidden;

function Campo_arqCMedica_Lote()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Lote", "Lote", "Lote", "arqLote", "a_lote", null, "",55);
}

var Lote = new Campo_arqCMedica_Lote;

//------------------------------------------------------------
Campo_arqCMedica_Lote_Medicamen.prototype = new Lance_CampoHidden;

function Campo_arqCMedica_Lote_Medicamen()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Lote_Medicamen", "Lote_Medicamen", "Medicamen", "arqMedicamen", "a_medica", Lote, "",52);
}

var Lote_Medicamen = new Campo_arqCMedica_Lote_Medicamen;

//------------------------------------------------------------
Campo_arqCMedica_Lote_Medicamen_Medicamen.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCMedica_Lote_Medicamen_Medicamen()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Lote_Medicamen_Medicamen", "Lote_Medicamen_Medicamen", "Medicamen", Lote_Medicamen, 50, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Lote_Medicamen_Medicamen = new Campo_arqCMedica_Lote_Medicamen_Medicamen;

//------------------------------------------------------------
Campo_arqCMedica_Lote_Lote.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqCMedica_Lote_Lote()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Lote_Lote", "Lote_Lote", "Lote", Lote, 15, "uuuuuuuuuuuuuuu", false);
}

var Lote_Lote = new Campo_arqCMedica_Lote_Lote;

//------------------------------------------------------------
Campo_arqCMedica_DataSepara.prototype = new Lance_CampoData;

function Campo_arqCMedica_DataSepara()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataSepara", "DataSepara", "DataSepara", 8, "dd/mm/aaaa", true);
}

var DataSepara = new Campo_arqCMedica_DataSepara;

//------------------------------------------------------------
Campo_arqCMedica_QtdEntreg.prototype = new Lance_CampoNumerico;

function Campo_arqCMedica_QtdEntreg()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "QtdEntreg", "QtdEntreg", "QtdEntreg", 4, "#.##z", true,"", "");
}

var QtdEntreg = new Campo_arqCMedica_QtdEntreg;

//------------------------------------------------------------
Campo_arqCMedica_Saldo.prototype = new Lance_CampoNumerico;

function Campo_arqCMedica_Saldo()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Saldo", "Saldo", "Saldo", 4, "#.##z", true,"(", "");
}

var Saldo = new Campo_arqCMedica_Saldo;

//------------------------------------------------------------
Campo_arqCMedica_ObsEntreg.prototype = new Lance_CampoCadeia;

function Campo_arqCMedica_ObsEntreg()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "ObsEntreg", "ObsEntreg", "ObsEntreg", 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var ObsEntreg = new Campo_arqCMedica_ObsEntreg;

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqCMedica_Consulta.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A consulta é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqCMedica_Consulta_Num.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Consulta.Obrigatorio( p_comMsg ) );
}

Consulta_Num.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_arqCMedica_Medicamen.prototype.PosCampo = function()
{
		if( !g_inserindo )
	{
		alt( Lote_Medicamen_Medicamen, Medicamen_Medicamen );
		alt( Lote_Medicamen, Medicamen );
	}
	return( true );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqCMedica_Medicamen.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A medicação  é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqCMedica_Medicamen.prototype.Cabecalho = function()
{
		return( "Medicação" );
}

//-------------------------------------------------------------
// Campos a mais que o ligado traz do pai
//-------------------------------------------------------------
Campo_arqCMedica_Medicamen.prototype.TrazOutrosDoPai = function()
{
	var vetPai = [];
			vetPai[0] = [ "Unidade",
					"A.Medicamen, arqMedicamen.Unidade, arqUnidade",
					"1" ];
		return( vetPai );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqCMedica_Medicamen_Medicamen.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Medicamen.Obrigatorio( p_comMsg ) );
}

Medicamen_Medicamen.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqCMedica_UnidadeCal.prototype.Calculou = function()
{
{
	return( this.Atribuiu( Medicamen_Unidade_Unidade ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqCMedica_UnidadeCal.prototype.Cabecalho = function()
{
		return( "Unidade" );
}

UnidadeCal.EhCalculado = true;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqCMedica_Qtd.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A quantidade é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqCMedica_Qtd.prototype.Cabecalho = function()
{
		return( "Qtd<br>Prescrito" );
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqCMedica_Lote.prototype.FiltroPai = function()
{
		if( g_inserindo || QtdEntreg == 0 )
			return( "A.Ativo = 1 and A.Estoque > 0" );
			return( "A.Estoque > 0" );
}

//-------------------------------------------------------------
// Pré Campo
//-------------------------------------------------------------
Campo_arqCMedica_Lote.prototype.PreCampo = function()
{
		if( g_inserindo )
	{
		alt( Lote_Medicamen_Medicamen, Medicamen_Medicamen );
		alt( Lote_Medicamen, Medicamen );
	}
	return( true );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqCMedica_Lote.prototype.PodeAlterar = function()
{
		if( PodeExecutarOperacao(5) )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqCMedica_Lote_Medicamen.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Lote.Obrigatorio( p_comMsg ) );
}

Lote_Medicamen.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqCMedica_Lote_Medicamen_Medicamen.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Lote.Obrigatorio( p_comMsg ) );
}

Lote_Medicamen_Medicamen.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqCMedica_Lote_Lote.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Lote.Obrigatorio( p_comMsg ) );
}

Lote_Lote.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqCMedica_DataSepara.prototype.PodeAlterar = function()
{
		if( PodeExecutarOperacao(5) )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCMedica_DataSepara.prototype.Existencia = function()
{
	return( tem( Lote_Lote ) );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqCMedica_QtdEntreg.prototype.PodeAlterar = function()
{
		if( PodeExecutarOperacao(5) )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqCMedica_QtdEntreg.prototype.Cabecalho = function()
{
		return( "Qtd Entregue/<br>Separado" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCMedica_QtdEntreg.prototype.Existencia = function()
{
	return( tem( Lote_Lote ) );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqCMedica_Saldo.prototype.Calculou = function()
{
{
	return( this.Atribuiu( Qtd - QtdEntreg ) );
}
}

Saldo.EhCalculado = true;
//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqCMedica_ObsEntreg.prototype.PodeAlterar = function()
{
		if( PodeExecutarOperacao(5) )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqCMedica_ObsEntreg.prototype.Existencia = function()
{
	return( tem( Lote_Lote ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqCMedica_Consulta.prototype.ExistenciaEspecial = function()
{
	return( ( !Consulta_Num.Obrigatorio( false ) || tem(Consulta_Num) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqCMedica_Medicamen.prototype.ExistenciaEspecial = function()
{
	return( ( !Medicamen_Medicamen.Obrigatorio( false ) || tem(Medicamen_Medicamen) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqCMedica_Lote.prototype.ExistenciaEspecial = function()
{
	return( ( !Lote_Medicamen.Obrigatorio( false ) || tem(Lote_Medicamen) ) && ( !Lote_Lote.Obrigatorio( false ) || tem(Lote_Lote) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqCMedica_Lote_Medicamen.prototype.ExistenciaEspecial = function()
{
	return( ( !Lote_Medicamen_Medicamen.Obrigatorio( false ) || tem(Lote_Medicamen_Medicamen) ) );
}

function IniciarDependencias_arqCMedica()
{
Medicamen.CalculosDependentes= [ UnidadeCal ];
QtdEntreg.CalculosDependentes= [ Lote,Saldo ];
Qtd.CalculosDependentes= [ Saldo ];
Consulta_Num.ExistenciasDependentes= [ Consulta ];
Medicamen_Medicamen.ExistenciasDependentes= [ Medicamen ];
Lote_Medicamen.ExistenciasDependentes= [ Lote ];
Lote_Medicamen_Medicamen.ExistenciasDependentes= [ Lote_Medicamen ];
Lote_Lote.ExistenciasDependentes= [ Lote ];
Lote.ExistenciasDependentes= [ DataSepara,QtdEntreg,ObsEntreg ];
Consulta_Num.ErrosDependentes= [ Consulta ];
Medicamen_Medicamen.ErrosDependentes= [ Medicamen ];
Lote_Medicamen_Medicamen.ErrosDependentes= [ Lote_Medicamen ];
Lote_Lote.ErrosDependentes= [ Lote ];
Consulta.CamposChave= [ Consulta_Num ];
Medicamen.CamposChave= [ Medicamen_Medicamen ];
Lote.CamposChave= [ Lote_Medicamen,Lote_Lote ];
Lote_Medicamen.CamposChave= [ Lote_Medicamen_Medicamen ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqCMedica";
var Medicamen_Unidade;
//------------------------------------------------------------
function ListaDeCampos_arqCMedica( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Consulta, Consulta_Num, Medicamen, Medicamen_Medicamen, UnidadeCal, Qtd, Lote, Lote_Medicamen, Lote_Medicamen_Medicamen, Lote_Lote, DataSepara, QtdEntreg, Saldo, ObsEntreg ]	);
	IniciarDependencias_arqCMedica();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqCMedica( '' );
g_idOperacao = 54;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
