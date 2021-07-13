/*=========================================================================
  a_qdoc - QDoc
=========================================================================*/

//------------------------------------------------------------
Campo_parQDoc_DocMod.prototype = new Lance_CampoHidden;

function Campo_parQDoc_DocMod()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "DocMod", "DocMod", "DocMod", "arqDocMod", "a_docmod", null, "",22);
}

var DocMod = new Campo_parQDoc_DocMod;

//------------------------------------------------------------
Campo_parQDoc_DocMod_Documento.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQDoc_DocMod_Documento()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "DocMod_Documento", "DocMod_Documento", "Documento", DocMod, 50, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var DocMod_Documento = new Campo_parQDoc_DocMod_Documento;

//------------------------------------------------------------
Campo_parQDoc_Pessoa.prototype = new Lance_CampoHidden;

function Campo_parQDoc_Pessoa()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Pessoa", "Pessoa", "Pessoa", "arqPessoa", "a_pessoa", null, "",7);
}

var Pessoa = new Campo_parQDoc_Pessoa;

//------------------------------------------------------------
Campo_parQDoc_Pessoa_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQDoc_Pessoa_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_Nome", "Pessoa_Nome", "Nome", Pessoa, 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Pessoa_Nome = new Campo_parQDoc_Pessoa_Nome;

//------------------------------------------------------------
Campo_parQDoc_Pessoa_Prontuario.prototype = new Lance_CampoNumericoLigado;

function Campo_parQDoc_Pessoa_Prontuario()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Pessoa_Prontuario", "Pessoa_Prontuario", "Prontuario", Pessoa, 13, "#.###.###.###.##z", true,"", "");
}

var Pessoa_Prontuario = new Campo_parQDoc_Pessoa_Prontuario;

//------------------------------------------------------------
Campo_parQDoc_Cad1.prototype = new Lance_CampoCadeia;

function Campo_parQDoc_Cad1()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cad1", "Cad1", "Cad1", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cad1 = new Campo_parQDoc_Cad1;

//------------------------------------------------------------
Campo_parQDoc_Cad2.prototype = new Lance_CampoCadeia;

function Campo_parQDoc_Cad2()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cad2", "Cad2", "Cad2", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cad2 = new Campo_parQDoc_Cad2;

//------------------------------------------------------------
Campo_parQDoc_Cad3.prototype = new Lance_CampoCadeia;

function Campo_parQDoc_Cad3()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cad3", "Cad3", "Cad3", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cad3 = new Campo_parQDoc_Cad3;

//------------------------------------------------------------
Campo_parQDoc_Cad4.prototype = new Lance_CampoCadeia;

function Campo_parQDoc_Cad4()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cad4", "Cad4", "Cad4", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cad4 = new Campo_parQDoc_Cad4;

//------------------------------------------------------------
Campo_parQDoc_Cad5.prototype = new Lance_CampoCadeia;

function Campo_parQDoc_Cad5()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cad5", "Cad5", "Cad5", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cad5 = new Campo_parQDoc_Cad5;

//------------------------------------------------------------
Campo_parQDoc_Txt1.prototype = new Lance_CampoTexto;

function Campo_parQDoc_Txt1()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Txt1", "Txt1", "Txt1", false);
}

var Txt1 = new Campo_parQDoc_Txt1;

//------------------------------------------------------------
Campo_parQDoc_Txt2.prototype = new Lance_CampoTexto;

function Campo_parQDoc_Txt2()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Txt2", "Txt2", "Txt2", false);
}

var Txt2 = new Campo_parQDoc_Txt2;

//------------------------------------------------------------
Campo_parQDoc_Salvar.prototype = new Lance_CampoLogico;

function Campo_parQDoc_Salvar()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Salvar", "Salvar", "Salvar");
}

var Salvar = new Campo_parQDoc_Salvar;

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parQDoc_DocMod.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O modelo é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQDoc_DocMod_Documento.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( DocMod.Obrigatorio( p_comMsg ) );
}

DocMod_Documento.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQDoc_Pessoa_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQDoc_Pessoa_Prontuario.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_Prontuario.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parQDoc_Salvar.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQDoc_DocMod.prototype.ExistenciaEspecial = function()
{
	return( ( !DocMod_Documento.Obrigatorio( false ) || tem(DocMod_Documento) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parQDoc_Pessoa.prototype.ExistenciaEspecial = function()
{
	return( ( !Pessoa_Nome.Obrigatorio( false ) || tem(Pessoa_Nome) ) && ( !Pessoa_Prontuario.Obrigatorio( false ) || tem(Pessoa_Prontuario) ) );
}

function IniciarDependencias_parQDoc()
{
DocMod_Documento.ExistenciasDependentes= [ DocMod ];
Pessoa_Nome.ExistenciasDependentes= [ Pessoa ];
Pessoa_Prontuario.ExistenciasDependentes= [ Pessoa ];
DocMod_Documento.ErrosDependentes= [ DocMod ];
Pessoa_Prontuario.ErrosDependentes= [ Pessoa ];
DocMod.CamposChave= [ DocMod_Documento ];
Pessoa.CamposChave= [ Pessoa_Nome,Pessoa_Prontuario ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "parQDoc";
//------------------------------------------------------------
function ListaDeCampos_parQDoc( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ DocMod, DocMod_Documento, Pessoa, Pessoa_Nome, Pessoa_Prontuario, Cad1, Cad2, Cad3, Cad4, Cad5, Txt1, Txt2, Salvar ]	);
	IniciarDependencias_parQDoc();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_parQDoc( '' );
g_idOperacao = 24;
parent.navegacao.MenuPrincQtdOpcoes=1;
parent.navegacao.MenuPrincPodeSo1=1;
