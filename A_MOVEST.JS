/*=========================================================================
  a_movest - MovEstoque
=========================================================================*/

//------------------------------------------------------------
Campo_arqMovEstoque_Num.prototype = new Lance_CampoNumerico;

function Campo_arqMovEstoque_Num()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Num", "Num", "Num", 9, "###.###.##z", true,"", "");
}

var Num = new Campo_arqMovEstoque_Num;

//------------------------------------------------------------
Campo_arqMovEstoque_Data.prototype = new Lance_CampoData;

function Campo_arqMovEstoque_Data()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Data", "Data", "Data", 8, "dd/mm/aaaa", true);
}

var Data = new Campo_arqMovEstoque_Data;

//------------------------------------------------------------
Campo_arqMovEstoque_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqMovEstoque_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqMovEstoque_Clinica;

//------------------------------------------------------------
Campo_arqMovEstoque_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqMovEstoque_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Clinica_Clinica = new Campo_arqMovEstoque_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqMovEstoque_Fornecedor.prototype = new Lance_CampoHidden;

function Campo_arqMovEstoque_Fornecedor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Fornecedor", "Fornecedor", "Fornecedor", "arqFornecedor", "a_fornec", null, "",42);
}

var Fornecedor = new Campo_arqMovEstoque_Fornecedor;

//------------------------------------------------------------
Campo_arqMovEstoque_Fornecedor_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqMovEstoque_Fornecedor_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Fornecedor_Nome", "Fornecedor_Nome", "Nome", Fornecedor, 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Fornecedor_Nome = new Campo_arqMovEstoque_Fornecedor_Nome;

//------------------------------------------------------------
Campo_arqMovEstoque_NumDoc.prototype = new Lance_CampoNumerico;

function Campo_arqMovEstoque_NumDoc()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "NumDoc", "NumDoc", "NumDoc", 15, "###.###.###.###.##z", true,"", "");
}

var NumDoc = new Campo_arqMovEstoque_NumDoc;

//------------------------------------------------------------
Campo_arqMovEstoque_Obs.prototype = new Lance_CampoTexto;

function Campo_arqMovEstoque_Obs()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Obs", "Obs", "Obs", false);
}

var Obs = new Campo_arqMovEstoque_Obs;

//------------------------------------------------------------
Campo_arqMovEstoque_Fechado.prototype = new Lance_CampoLogico;

function Campo_arqMovEstoque_Fechado()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Fechado", "Fechado", "Fechado");
}

var Fechado = new Campo_arqMovEstoque_Fechado;

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqMovEstoque_Num.prototype.Cabecalho = function()
{
		return( "N°" );
}

Num.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqMovEstoque_Data.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( HOJE ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqMovEstoque_Data.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data do movimento é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqMovEstoque_Clinica.prototype.FiltroPai = function()
{
		if( g_temMaisDeUmClinica )
			return( "A.idPrimario in ( " + g_vetIdClinica + " )" );
		return( "" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqMovEstoque_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A clínica é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqMovEstoque_Clinica.prototype.Cabecalho = function()
{
		return( "Clínica" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqMovEstoque_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqMovEstoque_Fornecedor.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo = 1" );
		return( "" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqMovEstoque_Fornecedor_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Fornecedor.Obrigatorio( p_comMsg ) );
}

Fornecedor_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqMovEstoque_NumDoc.prototype.Existencia = function()
{
	return( tem( Fornecedor_Nome ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqMovEstoque_Fechado.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqMovEstoque_Fechado.prototype.PodeAlterar = function()
{
		if( !g_inserindo )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqMovEstoque_Fechado.prototype.Cabecalho = function()
{
		return( "Fechado?" );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqMovEstoque_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqMovEstoque_Fornecedor.prototype.ExistenciaEspecial = function()
{
	return( ( !Fornecedor_Nome.Obrigatorio( false ) || tem(Fornecedor_Nome) ) );
}

function IniciarDependencias_arqMovEstoque()
{
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Fornecedor_Nome.ExistenciasDependentes= [ Fornecedor ];
Fornecedor.ExistenciasDependentes= [ NumDoc ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Fornecedor_Nome.ErrosDependentes= [ Fornecedor ];
Clinica.CamposChave= [ Clinica_Clinica ];
Fornecedor.CamposChave= [ Fornecedor_Nome ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqMovEstoque";
//------------------------------------------------------------
function ListaDeCampos_arqMovEstoque( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Num, Data, Clinica, Clinica_Clinica, Fornecedor, Fornecedor_Nome, NumDoc, Obs, Fechado ]	);
	IniciarDependencias_arqMovEstoque();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqMovEstoque( '' );
g_idOperacao = 56;

if( parent.navegacao ) {
var Menu_1 = [ 1,"Itens","","I",211,"","",1,"","1","a_itemmo","arqItemMov","Folhear","MovEstoque","?","","", "","", 0,6,[],[57]];
var Menu_2 = [ 1,"Fechar","","F",220,"","",1,"temMarcados()","5","p_movestoque_fechar_abrir","","","","","","", "","", 0,6,[220],[]];
var Menu_3 = [ 1,"Abrir","","A",221,"","",1,"temMarcados()","5","p_movestoque_fechar_abrir","","","","","","", "","", 0,6,[221],[]];
parent.navegacao.MenuPrincQtdOpcoes=3;
}
