/*=========================================================================
  a_clini - Clinica
	usa a_endere
=========================================================================*/

//------------------------------------------------------------
Campo_arqClinica_Clinica.prototype = new Lance_CampoCadeia;

function Campo_arqClinica_Clinica()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Clinica", "Clinica", "Clinica", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Clinica = new Campo_arqClinica_Clinica;

//------------------------------------------------------------
Campo_arqClinica_Razao.prototype = new Lance_CampoCadeia;

function Campo_arqClinica_Razao()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Razao", "Razao", "Razao", 80, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Razao = new Campo_arqClinica_Razao;

//------------------------------------------------------------
Campo_arqClinica_Email.prototype = new Lance_CampoCadeia;

function Campo_arqClinica_Email()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Email", "Email", "Email", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Email = new Campo_arqClinica_Email;

//------------------------------------------------------------
Campo_arqClinica_CNPJ.prototype = new Lance_CampoCadeia;

function Campo_arqClinica_CNPJ()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "CNPJ", "CNPJ", "CNPJ", 14, "##.###.###/####-##", true);
}

var CNPJ = new Campo_arqClinica_CNPJ;

//------------------------------------------------------------
IniciarPrefixos_domEndereco( "Ende_" );

//------------------------------------------------------------
Campo_arqClinica_TiConsulta.prototype = new Lance_CampoHidden;

function Campo_arqClinica_TiConsulta()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "TiConsulta", "TiConsulta", "TiConsulta", "arqTiConsulta", "a_ticons", null, "",60);
}

var TiConsulta = new Campo_arqClinica_TiConsulta;

//------------------------------------------------------------
Campo_arqClinica_TiConsulta_TiConsulta.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqClinica_TiConsulta_TiConsulta()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TiConsulta_TiConsulta", "TiConsulta_TiConsulta", "TiConsulta", TiConsulta, 15, "uxxxxxxxxxxxxxx", false);
}

var TiConsulta_TiConsulta = new Campo_arqClinica_TiConsulta_TiConsulta;

//------------------------------------------------------------
Campo_arqClinica_DataIni.prototype = new Lance_CampoData;

function Campo_arqClinica_DataIni()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataIni", "DataIni", "DataIni", 8, "dd/mm/aaaa", true);
}

var DataIni = new Campo_arqClinica_DataIni;

//------------------------------------------------------------
Campo_arqClinica_DataFim.prototype = new Lance_CampoData;

function Campo_arqClinica_DataFim()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataFim", "DataFim", "DataFim", 8, "dd/mm/aaaa", true);
}

var DataFim = new Campo_arqClinica_DataFim;

//------------------------------------------------------------
Campo_arqClinica_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqClinica_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqClinica_Ativo;

//------------------------------------------------------------
Campo_arqClinica_MaxAgenda.prototype = new Lance_CampoNumerico;

function Campo_arqClinica_MaxAgenda()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "MaxAgenda", "MaxAgenda", "MaxAgenda", 3, "##z", true,"", "");
}

var MaxAgenda = new Campo_arqClinica_MaxAgenda;

//------------------------------------------------------------
Campo_arqClinica_Sigla.prototype = new Lance_CampoCadeia;

function Campo_arqClinica_Sigla()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Sigla", "Sigla", "Sigla", 3, "uuu", false);
}

var Sigla = new Campo_arqClinica_Sigla;

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqClinica_Clinica.prototype.Cabecalho = function()
{
		return( "Cl�nica" );
}

Clinica.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condi��o de erro do campo
//-------------------------------------------------------------
Campo_arqClinica_Email.prototype.TemErro = function()
{
		if( tem(this) && ( !EmailOk( Email ) ) )
	{
		alert( "Email inv�lido" );
		return( true );
	}
	return( Lance_CampoCadeia.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condi��o de erro do campo
//-------------------------------------------------------------
Campo_arqClinica_CNPJ.prototype.TemErro = function()
{
		if( tem(this) && ( !CnpjOk( CNPJ ) ) )
	{
		alert( "CNPJ inv�lido" );
		return( true );
	}
	return( Lance_CampoCadeia.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqClinica_TiConsulta.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O tipo de consulta � obrigat�rio" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqClinica_TiConsulta.prototype.Cabecalho = function()
{
		return( "Tipo Consulta" );
}

//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqClinica_TiConsulta_TiConsulta.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( TiConsulta.Obrigatorio( p_comMsg ) );
}

TiConsulta_TiConsulta.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqClinica_DataIni.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data inicial do per�odo de atividade � obrigat�ria" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condi��o de erro do campo
//-------------------------------------------------------------
Campo_arqClinica_DataFim.prototype.TemErro = function()
{
		if( tem(this) && ( quantosDias( DataFim, DataIni ) < 0 ) )
	{
		alert( "A data final precisa ser posterior a inicial" );
		return( true );
	}
	return( Lance_CampoCadeia.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Express�o para c�lculo do valor do campo
//-------------------------------------------------------------
Campo_arqClinica_Ativo.prototype.Calculou = function()
{
{
		if( !tem( DataFim ) )
	return( this.Atribuiu( 1 ) );
}
{
		if( quantosDias( DataIni, HOJE ) > 0 || quantosDias( DataFim, HOJE ) < 0 )
	return( this.Atribuiu( 0 ) );
}
{
	return( this.Atribuiu( 1 ) );
}
}

//-------------------------------------------------------------
// Cabe�alho para o campo
//-------------------------------------------------------------
Campo_arqClinica_Ativo.prototype.Cabecalho = function()
{
		return( "Ativa?" );
}

Ativo.EhCalculado = true;
//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqClinica_MaxAgenda.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A quantidade de dias dispon�veis para o agendamento � obrigat�rio" );
		return( true );
	}
}

//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_arqClinica_Sigla.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A sigla � obrigat�ria" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_arqClinica_TiConsulta.prototype.ExistenciaEspecial = function()
{
	return( ( !TiConsulta_TiConsulta.Obrigatorio( false ) || tem(TiConsulta_TiConsulta) ) );
}

function IniciarDependencias_arqClinica()
{
DataFim.CalculosDependentes= [ Ativo ];
DataIni.CalculosDependentes= [ Ativo ];
TiConsulta_TiConsulta.ExistenciasDependentes= [ TiConsulta ];
TiConsulta_TiConsulta.ErrosDependentes= [ TiConsulta ];
DataIni.ErrosDependentes= [ DataFim ];
TiConsulta.CamposChave= [ TiConsulta_TiConsulta ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqClinica";
//------------------------------------------------------------
function ListaDeCampos_arqClinica( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Clinica, Razao, Email, CNPJ ], 
		ListaDeCampos_domEndereco( "Ende_" ), 
		[ TiConsulta, TiConsulta_TiConsulta, DataIni, DataFim, Ativo, MaxAgenda, Sigla ]	);
	IniciarDependencias_arqClinica();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqClinica( '' );
g_idOperacao = 31;

if( parent.navegacao ) {
var Menu_1 = [ 1,"Consultas","","l",112,"","",1,"","1","a_consul","arqConsulta","Folhear","Clinica","?","","", "","", 0,22,[],[39]];
var Menu_2 = [ 1,"Ag. Retirada","","g",196,"","",1,"","1","a_agret","arqAgRet","Folhear","Clinica","?","","", "","", 0,22,[],[53]];
var Menu_3 = [ 1,"Mov.Estoque","","q",209,"","",1,"","1","a_movest","arqMovEstoque","Folhear","Clinica","?","","", "","", 0,22,[],[56]];
var Menu_4 = [ 1,"Lotes","","t",210,"","",1,"","1","a_lote","arqLote","Folhear","Clinica","?","","", "","", 0,22,[],[55]];
var Menu_5 = [ 1,"Financeiro","","F",156,"","",1,"","6", "", "", "", "", "", "", "", "", "", 3, 22,[],[33,20,46] ];
var Menu_5_1 = [ 1,"Contas","","C",96,"","",1,"","1","a_conta","arqConta","Folhear","Clinica","?","","", "","", 0,15,[],[33]];
var Menu_5_2 = [ 1,"Contas corrente","","t",150,"","",1,"","1","a_ccor","arqCCor","Folhear","Clinica","?","","", "","", 0,15,[],[20]];
var Menu_5_3 = [ 1,"Recorrentes","","s",152,"","",1,"","1","a_recor","arqRecorrente","Folhear","Clinica","?","","", "","", 0,15,[],[46]];
var Menu_6 = [ 1,"Cadastros Configura��o","","r",256,"","",1,"","6", "", "", "", "", "", "", "", "", "", 6, 22,[],[38,37,41,49,47,35] ];
var Menu_6_1 = [ 1,"Hor�rios/Dura��o","","r",133,"","",1,"","1","a_duraca","arqDuracao","Folhear","Clinica","?","","", "","", 0,20,[],[38]];
var Menu_6_2 = [ 1,"Hor�rios Bloqueados","","q",114,"","",1,"","1","a_horabl","arqHoraBloq","Folhear","Clinica","?","","", "","", 0,20,[],[37]];
var Menu_6_3 = [ 1,"Plant�es","","P",139,"","",1,"","1","a_planta","arqPlantao","Folhear","Clinica","?","","", "","", 0,20,[],[41]];
var Menu_6_4 = [ 1,"Comiss�o Call Center","","n",186,"","",1,"","1","a_comcal","arqComCall","Folhear","Clinica","?","","", "","", 0,20,[],[49]];
var Menu_6_5 = [ 1,"M�dias","","M",171,"","",1,"","1","a_climid","arqCliMidia","Folhear","Clinica","?","","", "","", 0,20,[],[47]];
var Menu_6_6 = [ 1,"Usu�rios Permiss�o","","U",106,"","",1,"","1","a_usucli","arqUsuCli","Folhear","Clinica","?","","", "","", 0,20,[],[35]];
parent.navegacao.MenuPrincQtdOpcoes=6;
}
