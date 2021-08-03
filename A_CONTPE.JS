/*=========================================================================
  a_contpe - ContPessoa
=========================================================================*/

//------------------------------------------------------------
Campo_arqContPessoa_Fornecedor.prototype = new Lance_CampoHidden;

function Campo_arqContPessoa_Fornecedor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Fornecedor", "Fornecedor", "Fornecedor", "arqFornecedor", "a_fornec", null, "",42);
}

var Fornecedor = new Campo_arqContPessoa_Fornecedor;

//------------------------------------------------------------
Campo_arqContPessoa_Fornecedor_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqContPessoa_Fornecedor_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Fornecedor_Nome", "Fornecedor_Nome", "Nome", Fornecedor, 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Fornecedor_Nome = new Campo_arqContPessoa_Fornecedor_Nome;

//------------------------------------------------------------
Campo_arqContPessoa_Pessoa.prototype = new Lance_CampoHidden;

function Campo_arqContPessoa_Pessoa()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Pessoa", "Pessoa", "Pessoa", "arqPessoa", "a_pessoa", null, "",7);
}

var Pessoa = new Campo_arqContPessoa_Pessoa;

//------------------------------------------------------------
Campo_arqContPessoa_Pessoa_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqContPessoa_Pessoa_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_Nome", "Pessoa_Nome", "Nome", Pessoa, 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Pessoa_Nome = new Campo_arqContPessoa_Pessoa_Nome;

//------------------------------------------------------------
Campo_arqContPessoa_Pessoa_NumCelular.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqContPessoa_Pessoa_NumCelular()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_NumCelular", "Pessoa_NumCelular", "NumCelular", Pessoa, 11, "(##) #.####.####", true);
}

var Pessoa_NumCelular = new Campo_arqContPessoa_Pessoa_NumCelular;

//------------------------------------------------------------
Campo_arqContPessoa_Nome.prototype = new Lance_CampoCadeia;

function Campo_arqContPessoa_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Nome", "Nome", "Nome", 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Nome = new Campo_arqContPessoa_Nome;

//------------------------------------------------------------
Campo_arqContPessoa_Apelido.prototype = new Lance_CampoCadeia;

function Campo_arqContPessoa_Apelido()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Apelido", "Apelido", "Apelido", 20, "uxxxxxxxxxxxxxxxxxxx", false);
}

var Apelido = new Campo_arqContPessoa_Apelido;

//------------------------------------------------------------
Campo_arqContPessoa_Funcao.prototype = new Lance_CampoCadeia;

function Campo_arqContPessoa_Funcao()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Funcao", "Funcao", "Funcao", 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Funcao = new Campo_arqContPessoa_Funcao;

//------------------------------------------------------------
Campo_arqContPessoa_Celular.prototype = new Lance_CampoCadeia;

function Campo_arqContPessoa_Celular()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Celular", "Celular", "Celular", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Celular = new Campo_arqContPessoa_Celular;

//------------------------------------------------------------
Campo_arqContPessoa_Telefone.prototype = new Lance_CampoCadeia;

function Campo_arqContPessoa_Telefone()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Telefone", "Telefone", "Telefone", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Telefone = new Campo_arqContPessoa_Telefone;

//------------------------------------------------------------
Campo_arqContPessoa_Email.prototype = new Lance_CampoCadeia;

function Campo_arqContPessoa_Email()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Email", "Email", "Email", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Email = new Campo_arqContPessoa_Email;

//------------------------------------------------------------
Campo_arqContPessoa_RecEmail.prototype = new Lance_CampoLogico;

function Campo_arqContPessoa_RecEmail()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "RecEmail", "RecEmail", "RecEmail");
}

var RecEmail = new Campo_arqContPessoa_RecEmail;

//------------------------------------------------------------
Campo_arqContPessoa_Nascimento.prototype = new Lance_CampoData;

function Campo_arqContPessoa_Nascimento()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Nascimento", "Nascimento", "Nascimento", 8, "dd/mm/aaaa", true);
}

var Nascimento = new Campo_arqContPessoa_Nascimento;

//------------------------------------------------------------
Campo_arqContPessoa_Sexo.prototype = new Lance_CampoLigado;

function Campo_arqContPessoa_Sexo()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Sexo", "Sexo", "Sexo", "tabSexo", "t_sexo", null, "",0);
}

var Sexo = new Campo_arqContPessoa_Sexo;

//------------------------------------------------------------
Campo_arqContPessoa_Sexo_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqContPessoa_Sexo_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Sexo_Chave", "Sexo_Chave", "Sexo", Sexo, 1, "u", false);
}

var Sexo_Chave = new Campo_arqContPessoa_Sexo_Chave;

//------------------------------------------------------------
Campo_arqContPessoa_Sexo_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqContPessoa_Sexo_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Sexo_Descritor", "Sexo_Descritor", "Sexo", Sexo, 9, "xxxxxxxxx", false);
}

var Sexo_Descritor = new Campo_arqContPessoa_Sexo_Descritor;

//------------------------------------------------------------
Campo_arqContPessoa_Obs.prototype = new Lance_CampoTexto;

function Campo_arqContPessoa_Obs()
{
	this.superClass = Lance_CampoTexto;
	this.superClass( "Obs", "Obs", "Obs", false);
}

var Obs = new Campo_arqContPessoa_Obs;

//------------------------------------------------------------
Campo_arqContPessoa_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqContPessoa_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqContPessoa_Ativo;

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqContPessoa_Fornecedor.prototype.Obrigatorio = function( p_comMsg )
{
		if( ultimaLigOpcaoEm( 143 ) )
	{
		if( p_comMsg ) alert( "O fornecedor é obrigatório" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqContPessoa_Fornecedor_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Fornecedor.Obrigatorio( p_comMsg ) );
}

Fornecedor_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqContPessoa_Pessoa.prototype.Obrigatorio = function( p_comMsg )
{
		if( ultimaLigOpcaoEm( 75 ) )
	{
		if( p_comMsg ) alert( "O paciente é obrigatório" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqContPessoa_Pessoa_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqContPessoa_Pessoa_NumCelular.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_NumCelular.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqContPessoa_Nome.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O nome é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqContPessoa_Apelido.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( sugereApelido( Nome ) ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqContPessoa_Funcao.prototype.Cabecalho = function()
{
		return( "Função" );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqContPessoa_Email.prototype.TemErro = function()
{
		if( tem(this) && ( !EmailOk( Email ) ) )
	{
		alert( "Email inválido" );
		return( true );
	}
	return( Lance_CampoLogico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqContPessoa_RecEmail.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqContPessoa_RecEmail.prototype.Existencia = function()
{
	return( tem( Email ) );
}

Sexo_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
Sexo_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqContPessoa_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqContPessoa_Ativo.prototype.Cabecalho = function()
{
		return( "Ativo?" );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqContPessoa_Fornecedor.prototype.ExistenciaEspecial = function()
{
	return( ( !Fornecedor_Nome.Obrigatorio( false ) || tem(Fornecedor_Nome) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqContPessoa_Pessoa.prototype.ExistenciaEspecial = function()
{
	return( ( !Pessoa_Nome.Obrigatorio( false ) || tem(Pessoa_Nome) ) && ( !Pessoa_NumCelular.Obrigatorio( false ) || tem(Pessoa_NumCelular) ) );
}

function IniciarDependencias_arqContPessoa()
{
Fornecedor_Nome.ExistenciasDependentes= [ Fornecedor ];
Pessoa_Nome.ExistenciasDependentes= [ Pessoa ];
Pessoa_NumCelular.ExistenciasDependentes= [ Pessoa ];
Email.ExistenciasDependentes= [ RecEmail ];
Fornecedor_Nome.ErrosDependentes= [ Fornecedor ];
Pessoa_NumCelular.ErrosDependentes= [ Pessoa ];
Fornecedor.CamposChave= [ Fornecedor_Nome ];
Pessoa.CamposChave= [ Pessoa_Nome,Pessoa_NumCelular ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqContPessoa";
//------------------------------------------------------------
function ListaDeCampos_arqContPessoa( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Fornecedor, Fornecedor_Nome, Pessoa, Pessoa_Nome, Pessoa_NumCelular, Nome, Apelido, Funcao, Celular, Telefone, Email, RecEmail, Nascimento, Sexo, Sexo_Chave, Sexo_Descritor, Obs, Ativo ]	);
	IniciarDependencias_arqContPessoa();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqContPessoa( '' );
g_idOperacao = 21;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
