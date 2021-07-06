/*=========================================================================
  a_clini - Clinica
	usa a_endere
=========================================================================*/

//------------------------------------------------------------
Campo_arqClinica_Clinica.prototype = new Lance_CampoCadeia;

function Campo_arqClinica_Clinica()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Clinica", "Clinica", "Clinica", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Clinica = new Campo_arqClinica_Clinica;

//------------------------------------------------------------
Campo_arqClinica_Razao.prototype = new Lance_CampoCadeia;

function Campo_arqClinica_Razao()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Razao", "Razao", "Razao", 80, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
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

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqClinica_Clinica.prototype.Cabecalho = function()
{
		return( "Clínica" );
}

Clinica.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqClinica_Email.prototype.TemErro = function()
{
		if( tem(this) && ( !EmailOk( Email ) ) )
	{
		alert( "Email inválido" );
		return( true );
	}
	return( Lance_CampoNumerico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqClinica_CNPJ.prototype.TemErro = function()
{
		if( tem(this) && ( !CnpjOk( CNPJ ) ) )
	{
		alert( "CNPJ inválido" );
		return( true );
	}
	return( Lance_CampoNumerico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqClinica_Ativo.prototype.Cabecalho = function()
{
		return( "Ativa?" );
}

function IniciarDependencias_arqClinica()
{
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

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Clinica, Razao, Email, CNPJ ], 
		ListaDeCampos_domEndereco( "Ende_" ), 
		[ Ativo, MaxAgenda ]	);
	IniciarDependencias_arqClinica();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqClinica( '' );
g_idOperacao = 31;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Consultas","","l",112,"","",1,"","1","a_consul","arqConsulta","Folhear","Clinica","?","","", "","", 0,19,[],[39]);
var Menu_2 = new Array( 1,"Contas","","C",96,"","",1,"","1","a_conta","arqConta","Folhear","Clinica","?","","", "","", 0,19,[],[33]);
var Menu_3 = new Array( 1,"Horários/Duração","","r",133,"","",1,"","1","a_duraca","arqDuracao","Folhear","Clinica","?","","", "","", 0,19,[],[38]);
var Menu_4 = new Array( 1,"Horários Bloqueados","","q",114,"","",1,"","1","a_horabl","arqHoraBloq","Folhear","Clinica","?","","", "","", 0,19,[],[37]);
var Menu_5 = new Array( 1,"Usuários Permissão","","U",106,"","",1,"","1","a_usucli","arqUsuCli","Folhear","Clinica","?","","", "","", 0,19,[],[35]);
parent.navegacao.MenuPrincQtdOpcoes=5;
}
