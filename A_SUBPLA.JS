/*=========================================================================
  a_subpla - SubPlano
=========================================================================*/

//------------------------------------------------------------
Campo_arqSubPlano_Plano.prototype = new Lance_CampoHidden;

function Campo_arqSubPlano_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Plano", "Plano", "Plano", "arqPlano", "a_plano", null, "",27);
}

var Plano = new Campo_arqSubPlano_Plano;

//------------------------------------------------------------
Campo_arqSubPlano_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_arqSubPlano_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Plano_CodPlano", "Plano_CodPlano", "CodPlano", Plano, 2, "zz", false,"", "");
}

var Plano_CodPlano = new Campo_arqSubPlano_Plano_CodPlano;

//------------------------------------------------------------
Campo_arqSubPlano_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_arqSubPlano_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Plano_Plano", "Plano_Plano", "Plano", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Plano_Plano = new Campo_arqSubPlano_Plano_Plano;

//------------------------------------------------------------
Campo_arqSubPlano_Codigo.prototype = new Lance_CampoCadeia;

function Campo_arqSubPlano_Codigo()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Codigo", "Codigo", "Codigo", 6, "##.##.##", true);
}

var Codigo = new Campo_arqSubPlano_Codigo;

//------------------------------------------------------------
Campo_arqSubPlano_Nome.prototype = new Lance_CampoCadeia;

function Campo_arqSubPlano_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Nome", "Nome", "Nome", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Nome = new Campo_arqSubPlano_Nome;

Plano.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqSubPlano_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Plano.Obrigatorio( p_comMsg ) );
}

Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqSubPlano_Codigo.prototype.Cabecalho = function()
{
		return( "C�digo" );
}

Codigo.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqSubPlano_Nome.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O nome � obrigat�rio" );
		return( true );
	}
}

Nome.TipoCampo |= CAMPO_DESCRITOR;
//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_arqSubPlano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Plano_CodPlano.Obrigatorio( false ) || tem(Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_arqSubPlano_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Plano.Obrigatorio( false ) || tem(Plano) ) );
}

function IniciarDependencias_arqSubPlano()
{
Plano_CodPlano.ExistenciasDependentes= [ Plano ];
Plano.ExistenciasDependentes= [ Plano_Plano ];
Plano_CodPlano.ErrosDependentes= [ Plano ];
Plano.DescritoresDependentes= [ Plano_Plano ];
Plano.CamposChave= [ Plano_CodPlano ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqSubPlano";
//------------------------------------------------------------
function ListaDeCampos_arqSubPlano( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Plano, Plano_CodPlano, Plano_Plano, Codigo, Nome ]	);
	IniciarDependencias_arqSubPlano();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqSubPlano( '' );
g_idOperacao = 28;

if( parent.navegacao ) {
var Menu_1 = [ 1,"Parcelas","","P",102,"","",1,"","1","a_parcel","arqParcela","Folhear","SubPlano","?","","", "","", 0,11,[],[34]];
var Menu_2 = [ 1,"Recorrentes","","R",159,"","",1,"","1","a_recor","arqRecorrente","Folhear","SubPlano","?","","", "","", 0,11,[],[46]];
parent.navegacao.MenuPrincQtdOpcoes=2;
}
