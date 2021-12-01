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
	this.superClass( "Qtd", "Qtd", "Qtd", 3, "##z", true,"", "");
}

var Qtd = new Campo_arqCMedica_Qtd;

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

Consulta.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqCMedica_Consulta_Num.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Consulta.Obrigatorio( p_comMsg ) );
}

Consulta_Num.TipoCampo |= CAMPO_CHAVE_PAI;
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
	var vetPai = new Array();
			vetPai[0] = [ "Unidade",
					"A.Medicamen, arqMedicamen.Unidade, arqUnidade",
					"1" ];
		return( vetPai );
}

Medicamen.TipoCampo |= CAMPO_CHAVE;
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

function IniciarDependencias_arqCMedica()
{
Medicamen.CalculosDependentes= [ UnidadeCal ];
Consulta_Num.ExistenciasDependentes= [ Consulta ];
Medicamen_Medicamen.ExistenciasDependentes= [ Medicamen ];
Consulta_Num.ErrosDependentes= [ Consulta ];
Medicamen_Medicamen.ErrosDependentes= [ Medicamen ];
Consulta.CamposChave= [ Consulta_Num ];
Medicamen.CamposChave= [ Medicamen_Medicamen ];
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

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Consulta, Consulta_Num, Medicamen, Medicamen_Medicamen, UnidadeCal, Qtd ]	);
	IniciarDependencias_arqCMedica();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqCMedica( '' );
g_idOperacao = 54;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
