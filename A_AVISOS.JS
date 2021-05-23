/*=========================================================================
  a_avisos - Avisos
=========================================================================*/

//------------------------------------------------------------
Campo_arqAvisos_Numero.prototype = new Lance_CampoNumerico;

function Campo_arqAvisos_Numero()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Numero", "Numero", "Numero", 6, "###.##z", true,"", "");
}

var Numero = new Campo_arqAvisos_Numero;

//------------------------------------------------------------
Campo_arqAvisos_Data.prototype = new Lance_CampoData;

function Campo_arqAvisos_Data()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Data", "Data", "Data", 8, "dd/mm/aaaa", true);
}

var Data = new Campo_arqAvisos_Data;

//------------------------------------------------------------
Campo_arqAvisos_Hora.prototype = new Lance_CampoHora;

function Campo_arqAvisos_Hora()
{
	this.superClass = Lance_CampoHora;
	this.superClass( "Hora", "Hora", "Hora", 4, "hh:mm", true);
}

var Hora = new Campo_arqAvisos_Hora;

//------------------------------------------------------------
Campo_arqAvisos_Quem.prototype = new Lance_CampoHidden;

function Campo_arqAvisos_Quem()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Quem", "Quem", "Quem", "arqUsuario", "a_usuari", null, "",5);
}

var Quem = new Campo_arqAvisos_Quem;

//------------------------------------------------------------
Campo_arqAvisos_Quem_Usuario.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqAvisos_Quem_Usuario()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Quem_Usuario", "Quem_Usuario", "Usuario", Quem, 40, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Quem_Usuario = new Campo_arqAvisos_Quem_Usuario;

//------------------------------------------------------------
Campo_arqAvisos_Assunto.prototype = new Lance_CampoCadeia;

function Campo_arqAvisos_Assunto()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Assunto", "Assunto", "Assunto", 100, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Assunto = new Campo_arqAvisos_Assunto;

//------------------------------------------------------------
Campo_arqAvisos_Prioridade.prototype = new Lance_CampoLigado;

function Campo_arqAvisos_Prioridade()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Prioridade", "Prioridade", "Prioridade", "tabPrioridade", "t_priori", null, "",0);
}

var Prioridade = new Campo_arqAvisos_Prioridade;

//------------------------------------------------------------
Campo_arqAvisos_Prioridade_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqAvisos_Prioridade_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Prioridade_Chave", "Prioridade_Chave", "Prioridade", Prioridade, 1, "u", false);
}

var Prioridade_Chave = new Campo_arqAvisos_Prioridade_Chave;

//------------------------------------------------------------
Campo_arqAvisos_Prioridade_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqAvisos_Prioridade_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Prioridade_Descritor", "Prioridade_Descritor", "Prioridade", Prioridade, 7, "xxxxxxx", false);
}

var Prioridade_Descritor = new Campo_arqAvisos_Prioridade_Descritor;

//------------------------------------------------------------
Campo_arqAvisos_Texto.prototype = new Lance_CampoTexto;

function Campo_arqAvisos_Texto()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Texto", "Texto", "Texto", true);
}

var Texto = new Campo_arqAvisos_Texto;

//------------------------------------------------------------
Campo_arqAvisos_IdQuem.prototype = new Lance_CampoNumerico;

function Campo_arqAvisos_IdQuem()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "IdQuem", "IdQuem", "IdQuem", 20, "##.###.###.###.###.###.##z", true,"", "");
}

var IdQuem = new Campo_arqAvisos_IdQuem;

//------------------------------------------------------------
Campo_arqAvisos_AvisoPai.prototype = new Lance_CampoHidden;

function Campo_arqAvisos_AvisoPai()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "AvisoPai", "AvisoPai", "AvisoPai", "arqAvisos", "a_avisos", null, "",14);
}

var AvisoPai = new Campo_arqAvisos_AvisoPai;

//------------------------------------------------------------
Campo_arqAvisos_AvisoPai_Numero.prototype = new Lance_CampoNumericoLigado;

function Campo_arqAvisos_AvisoPai_Numero()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "AvisoPai_Numero", "AvisoPai_Numero", "Numero", AvisoPai, 6, "###.##z", true,"", "");
}

var AvisoPai_Numero = new Campo_arqAvisos_AvisoPai_Numero;

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqAvisos_Numero.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( maior( "Numero+1", 1 ) ) );
}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqAvisos_Numero.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqAvisos_Numero.prototype.Cabecalho = function()
{
		return( "N°" );
}

Numero.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqAvisos_Data.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( HOJE ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqAvisos_Data.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "Data é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqAvisos_Data.prototype.TemErro = function()
{
		if( tem(this) && ( Data < HOJE && g_acaoAtual == EM_INCLUSAO ) )
	{
		alert( "A data não pode ser inferior ao dia de hoje" );
		return( true );
	}
	return( Lance_CampoNumericoLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqAvisos_Hora.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( AGORA ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqAvisos_Quem.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( g_usuarioAtual ) );
}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqAvisos_Quem.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqAvisos_Quem_Usuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Quem.Obrigatorio( p_comMsg ) );
}

Quem_Usuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqAvisos_Assunto.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "Assunto é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqAvisos_Prioridade.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 2 ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqAvisos_Prioridade.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "Prioridade é obrigatória" );
		return( true );
	}
}

Prioridade_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
Prioridade_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqAvisos_IdQuem.prototype.Calculou = function()
{
{
{
	if( !Quem.ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT idPrimario FROM arqUsuario WHERE arqUsuario.IdPrimario=( " + Quem + " )  )" + LANCE_SEPARADOR + this.Prefixo + "IdQuem" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
}

IdQuem.EhCalculado = true;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqAvisos_AvisoPai_Numero.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( AvisoPai.Obrigatorio( p_comMsg ) );
}

AvisoPai_Numero.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqAvisos_Quem.prototype.ExistenciaEspecial = function()
{
	return( ( !Quem_Usuario.Obrigatorio( false ) || tem(Quem_Usuario) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqAvisos_AvisoPai.prototype.ExistenciaEspecial = function()
{
	return( ( !AvisoPai_Numero.Obrigatorio( false ) || tem(AvisoPai_Numero) ) );
}

function IniciarDependencias_arqAvisos()
{
Quem.CalculosDependentes= [ IdQuem ];
Quem_Usuario.ExistenciasDependentes= [ Quem ];
AvisoPai_Numero.ExistenciasDependentes= [ AvisoPai ];
Quem_Usuario.ErrosDependentes= [ Quem ];
AvisoPai_Numero.ErrosDependentes= [ AvisoPai ];
Quem.CamposChave= [ Quem_Usuario ];
AvisoPai.CamposChave= [ AvisoPai_Numero ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqAvisos";
//------------------------------------------------------------
function ListaDeCampos_arqAvisos( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Numero, Data, Hora, Quem, Quem_Usuario, Assunto, Prioridade, Prioridade_Chave, Prioridade_Descritor, Texto, IdQuem, AvisoPai, AvisoPai_Numero ]	);
	IniciarDependencias_arqAvisos();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqAvisos( '' );
g_idOperacao = 14;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Para","","P",31,"","",1,"","1","a_paragr","arqParaGrupo","Folhear","Avisos","?","","", "","", 0,9,[],[15]);
var Menu_2 = new Array( 1,"Lidos","","L",34,"","",1,"","1","a_lido","arqLido","Folhear","Avisos","?","","", "","", 0,9,[],[16]);
var Menu_3 = new Array( 1,"Respostas","","R",57,"","",1,"","1","a_avisos","arqAvisos","Folhear","AvisoPai","?","","", "","", 0,9,[],[14]);
parent.navegacao.MenuPrincQtdOpcoes=3;
}
