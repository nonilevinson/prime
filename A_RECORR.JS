/*=========================================================================
  a_recorr - Recorrente
=========================================================================*/

//------------------------------------------------------------
Campo_arqRecorrente_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqRecorrente_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqRecorrente_Clinica;

//------------------------------------------------------------
Campo_arqRecorrente_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqRecorrente_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Clinica_Clinica = new Campo_arqRecorrente_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqRecorrente_TPgRec.prototype = new Lance_CampoLigado;

function Campo_arqRecorrente_TPgRec()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPgRec", "TPgRec", "TPgRec", "tabTPgRec", "t_tpgre", null, "",0);
}

var TPgRec = new Campo_arqRecorrente_TPgRec;

//------------------------------------------------------------
Campo_arqRecorrente_TPgRec_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqRecorrente_TPgRec_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPgRec_Chave", "TPgRec_Chave", "TPgRec", TPgRec, 1, "u", false);
}

var TPgRec_Chave = new Campo_arqRecorrente_TPgRec_Chave;

//------------------------------------------------------------
Campo_arqRecorrente_TPgRec_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqRecorrente_TPgRec_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPgRec_Descritor", "TPgRec_Descritor", "TPgRec", TPgRec, 7, "xxxxxxx", false);
}

var TPgRec_Descritor = new Campo_arqRecorrente_TPgRec_Descritor;

//------------------------------------------------------------
Campo_arqRecorrente_Fornecedor.prototype = new Lance_CampoHidden;

function Campo_arqRecorrente_Fornecedor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Fornecedor", "Fornecedor", "Fornecedor", "arqFornecedor", "a_fornec", null, "",42);
}

var Fornecedor = new Campo_arqRecorrente_Fornecedor;

//------------------------------------------------------------
Campo_arqRecorrente_Fornecedor_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqRecorrente_Fornecedor_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Fornecedor_Nome", "Fornecedor_Nome", "Nome", Fornecedor, 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Fornecedor_Nome = new Campo_arqRecorrente_Fornecedor_Nome;

//------------------------------------------------------------
Campo_arqRecorrente_Pessoa.prototype = new Lance_CampoHidden;

function Campo_arqRecorrente_Pessoa()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Pessoa", "Pessoa", "Pessoa", "arqPessoa", "a_pessoa", null, "",7);
}

var Pessoa = new Campo_arqRecorrente_Pessoa;

//------------------------------------------------------------
Campo_arqRecorrente_Pessoa_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqRecorrente_Pessoa_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_Nome", "Pessoa_Nome", "Nome", Pessoa, 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Pessoa_Nome = new Campo_arqRecorrente_Pessoa_Nome;

//------------------------------------------------------------
Campo_arqRecorrente_Pessoa_NumCelular.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqRecorrente_Pessoa_NumCelular()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_NumCelular", "Pessoa_NumCelular", "NumCelular", Pessoa, 11, "(##) #.####.####", true);
}

var Pessoa_NumCelular = new Campo_arqRecorrente_Pessoa_NumCelular;

//------------------------------------------------------------
Campo_arqRecorrente_Nome.prototype = new Lance_CampoCadeia;

function Campo_arqRecorrente_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Nome", "Nome", "Nome", 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Nome = new Campo_arqRecorrente_Nome;

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqRecorrente_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A clínica é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqRecorrente_TPgRec.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O tipo é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqRecorrente_TPgRec.prototype.Cabecalho = function()
{
		return( "Tipo" );
}

TPgRec_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPgRec_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqRecorrente_Fornecedor.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo = 1" );
		return( "" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Fornecedor_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Fornecedor.Obrigatorio( p_comMsg ) );
}

Fornecedor_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqRecorrente_Pessoa.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo = 1" );
		return( "" );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Pessoa.prototype.TemErro = function()
{
		if( !tem( Pessoa_Nome ) && !tem( Fornecedor_Nome ) )
	{
		alert( "Informe um paciente ou um fornecedor" );
		return( true );
	}
	return( Lance_CampoCadeia.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Pessoa_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Pessoa_NumCelular.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_NumCelular.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Nome.prototype.Calculou = function()
{
{
		if( tem( Pessoa ) )
{
	if( !Pessoa.ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( " + Pessoa + " )  )" + LANCE_SEPARADOR + this.Prefixo + "Nome" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
{
{
	if( !Fornecedor.ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT Nome FROM arqFornecedor WHERE arqFornecedor.IdPrimario=( " + Fornecedor + " )  )" + LANCE_SEPARADOR + this.Prefixo + "Nome" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
}

Nome.EhCalculado = true;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Fornecedor.prototype.ExistenciaEspecial = function()
{
	return( ( !Fornecedor_Nome.Obrigatorio( false ) || tem(Fornecedor_Nome) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Pessoa.prototype.ExistenciaEspecial = function()
{
	return( ( !Pessoa_Nome.Obrigatorio( false ) || tem(Pessoa_Nome) ) && ( !Pessoa_NumCelular.Obrigatorio( false ) || tem(Pessoa_NumCelular) ) );
}

function IniciarDependencias_arqRecorrente()
{
Pessoa.CalculosDependentes= [ Nome ];
Fornecedor.CalculosDependentes= [ Nome ];
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Fornecedor_Nome.ExistenciasDependentes= [ Fornecedor ];
Pessoa_Nome.ExistenciasDependentes= [ Pessoa ];
Pessoa_NumCelular.ExistenciasDependentes= [ Pessoa ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Fornecedor_Nome.ErrosDependentes= [ Fornecedor ];
Fornecedor.ErrosDependentes= [ Pessoa ];
Pessoa_NumCelular.ErrosDependentes= [ Pessoa ];
Clinica.CamposChave= [ Clinica_Clinica ];
Fornecedor.CamposChave= [ Fornecedor_Nome ];
Pessoa.CamposChave= [ Pessoa_Nome,Pessoa_NumCelular ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqRecorrente";
//------------------------------------------------------------
function ListaDeCampos_arqRecorrente( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Clinica, Clinica_Clinica, TPgRec, TPgRec_Chave, TPgRec_Descritor, Fornecedor, Fornecedor_Nome, Pessoa, Pessoa_Nome, Pessoa_NumCelular, Nome ]	);
	IniciarDependencias_arqRecorrente();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqRecorrente( '' );
g_idOperacao = 46;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
