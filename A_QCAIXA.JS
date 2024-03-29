/*=========================================================================
  a_qcaixa - QCaixa
=========================================================================*/

//------------------------------------------------------------
Campo_parQCaixa_Clinica.prototype = new Lance_CampoHidden;

function Campo_parQCaixa_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_parQCaixa_Clinica;

//------------------------------------------------------------
Campo_parQCaixa_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQCaixa_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Clinica_Clinica = new Campo_parQCaixa_Clinica_Clinica;

//------------------------------------------------------------
Campo_parQCaixa_Fornecedor.prototype = new Lance_CampoHidden;

function Campo_parQCaixa_Fornecedor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Fornecedor", "Fornecedor", "Fornecedor", "arqFornecedor", "a_fornec", null, "",42);
}

var Fornecedor = new Campo_parQCaixa_Fornecedor;

//------------------------------------------------------------
Campo_parQCaixa_Fornecedor_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQCaixa_Fornecedor_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Fornecedor_Nome", "Fornecedor_Nome", "Nome", Fornecedor, 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Fornecedor_Nome = new Campo_parQCaixa_Fornecedor_Nome;

//------------------------------------------------------------
Campo_parQCaixa_Pessoa.prototype = new Lance_CampoHidden;

function Campo_parQCaixa_Pessoa()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Pessoa", "Pessoa", "Pessoa", "arqPessoa", "a_pessoa", null, "",7);
}

var Pessoa = new Campo_parQCaixa_Pessoa;

//------------------------------------------------------------
Campo_parQCaixa_Pessoa_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQCaixa_Pessoa_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_Nome", "Pessoa_Nome", "Nome", Pessoa, 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Pessoa_Nome = new Campo_parQCaixa_Pessoa_Nome;

//------------------------------------------------------------
Campo_parQCaixa_Pessoa_NumCelular.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQCaixa_Pessoa_NumCelular()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_NumCelular", "Pessoa_NumCelular", "NumCelular", Pessoa, 11, "(##) #.####.####", true);
}

var Pessoa_NumCelular = new Campo_parQCaixa_Pessoa_NumCelular;

//------------------------------------------------------------
Campo_parQCaixa_Historico.prototype = new Lance_CampoCadeia;

function Campo_parQCaixa_Historico()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Historico", "Historico", "Historico", 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Historico = new Campo_parQCaixa_Historico;

//------------------------------------------------------------
Campo_parQCaixa_Data.prototype = new Lance_CampoData;

function Campo_parQCaixa_Data()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Data", "Data", "Data", 8, "dd/mm/aaaa", true);
}

var Data = new Campo_parQCaixa_Data;

//------------------------------------------------------------
Campo_parQCaixa_Valor.prototype = new Lance_CampoNumerico;

function Campo_parQCaixa_Valor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor", "Valor", "Valor", 11, "###.###.##z,zz", true,"", "");
}

var Valor = new Campo_parQCaixa_Valor;

//------------------------------------------------------------
Campo_parQCaixa_SubPlano.prototype = new Lance_CampoHidden;

function Campo_parQCaixa_SubPlano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlano", "SubPlano", "SubPlano", "arqSubPlano", "a_subpla", null, "",28);
}

var SubPlano = new Campo_parQCaixa_SubPlano;

//------------------------------------------------------------
Campo_parQCaixa_SubPlano_Plano.prototype = new Lance_CampoHidden;

function Campo_parQCaixa_SubPlano_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlano_Plano", "SubPlano_Plano", "Plano", "arqPlano", "a_plano", SubPlano, "",27);
}

var SubPlano_Plano = new Campo_parQCaixa_SubPlano_Plano;

//------------------------------------------------------------
Campo_parQCaixa_SubPlano_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parQCaixa_SubPlano_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "SubPlano_Plano_CodPlano", "SubPlano_Plano_CodPlano", "CodPlano", SubPlano_Plano, 2, "zz", false,"", "");
}

var SubPlano_Plano_CodPlano = new Campo_parQCaixa_SubPlano_Plano_CodPlano;

//------------------------------------------------------------
Campo_parQCaixa_SubPlano_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parQCaixa_SubPlano_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlano_Plano_Plano", "SubPlano_Plano_Plano", "Plano", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SubPlano_Plano_Plano = new Campo_parQCaixa_SubPlano_Plano_Plano;

//------------------------------------------------------------
Campo_parQCaixa_SubPlano_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQCaixa_SubPlano_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "SubPlano_Codigo", "SubPlano_Codigo", "Codigo", SubPlano, 6, "##.##.##", true);
}

var SubPlano_Codigo = new Campo_parQCaixa_SubPlano_Codigo;

//------------------------------------------------------------
Campo_parQCaixa_SubPlano_Nome.prototype = new Lance_CampoCadeia;

function Campo_parQCaixa_SubPlano_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlano_Nome", "SubPlano_Nome", "Nome", 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var SubPlano_Nome = new Campo_parQCaixa_SubPlano_Nome;

//------------------------------------------------------------
Campo_parQCaixa_FormaPg.prototype = new Lance_CampoHidden;

function Campo_parQCaixa_FormaPg()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "FormaPg", "FormaPg", "FormaPg", "arqFormaPg", "a_formap", null, "",44);
}

var FormaPg = new Campo_parQCaixa_FormaPg;

//------------------------------------------------------------
Campo_parQCaixa_FormaPg_FormaPg.prototype = new Lance_CampoCadeiaLigado;

function Campo_parQCaixa_FormaPg_FormaPg()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "FormaPg_FormaPg", "FormaPg_FormaPg", "FormaPg", FormaPg, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var FormaPg_FormaPg = new Campo_parQCaixa_FormaPg_FormaPg;

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parQCaixa_Clinica.prototype.FiltroPai = function()
{
		if( g_temMaisDeUmClinica )
			return( "A.idPrimario in ( " + g_vetIdClinica + " )" );
		return( "" );
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_parQCaixa_Clinica.prototype.Sugeriu = function()
{
{
		if( g_temUmaClinica )
	return( this.AtribuiuSemCritica( g_minhaClinica ) );
}
		return( true );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_parQCaixa_Clinica.prototype.PodeAlterar = function()
{
		if( g_temMaisDeUmClinica || g_podeTodasClinica )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_parQCaixa_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A cl�nica � obrigat�ria" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQCaixa_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parQCaixa_Fornecedor.prototype.FiltroPai = function()
{
			return( "A.Ativo = 1" );
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_parQCaixa_Fornecedor.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( sugereFornecedor() ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_parQCaixa_Fornecedor.prototype.Obrigatorio = function( p_comMsg )
{
		if( ultimaLigOpcaoEm( 176 ) )
	{
		if( p_comMsg ) alert( "O fornecedor � obrigat�rio" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQCaixa_Fornecedor_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Fornecedor.Obrigatorio( p_comMsg ) );
}

Fornecedor_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parQCaixa_Pessoa.prototype.FiltroPai = function()
{
			return( "A.Ativo = 1" );
}

//-------------------------------------------------------------
// Condi��o de erro do campo
//-------------------------------------------------------------
Campo_parQCaixa_Pessoa.prototype.TemErro = function()
{
		if( !tem( Pessoa_Nome ) && !tem( Fornecedor_Nome ) )
	{
		alert( "Informe um paciente ou um fornecedor" );
		return( true );
	}
	return( Lance_CampoCadeiaLigado.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia do campo
//-------------------------------------------------------------
Campo_parQCaixa_Pessoa.prototype.Existencia = function()
{
	return( !tem( Fornecedor_Nome ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia do campo
//-------------------------------------------------------------
Campo_parQCaixa_Pessoa_Nome.prototype.Existencia = function()
{
	return( !tem( Fornecedor_Nome ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia do campo
//-------------------------------------------------------------
Campo_parQCaixa_Pessoa_NumCelular.prototype.Existencia = function()
{
	return( !tem( Fornecedor_Nome ) );
}

//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQCaixa_Pessoa_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQCaixa_Pessoa_NumCelular.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_NumCelular.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_parQCaixa_Historico.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O hist�rico � obrigat�rio" );
		return( true );
	}
}

//-------------------------------------------------------------
// Express�o para valor inicial do campo
//-------------------------------------------------------------
Campo_parQCaixa_Data.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( HOJE ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_parQCaixa_Data.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data � obrigat�ria" );
		return( true );
	}
}

//-------------------------------------------------------------
// Preenchimento do campo � obrigat�rio?
//-------------------------------------------------------------
Campo_parQCaixa_Valor.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O valor � obrigat�rio" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQCaixa_SubPlano_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlano.Obrigatorio( p_comMsg ) );
}

SubPlano_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQCaixa_SubPlano_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlano.Obrigatorio( p_comMsg ) );
}

SubPlano_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlano_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQCaixa_SubPlano_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlano.Obrigatorio( p_comMsg ) );
}

SubPlano_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlano_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condi��o Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parQCaixa_FormaPg_FormaPg.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( FormaPg.Obrigatorio( p_comMsg ) );
}

FormaPg_FormaPg.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_parQCaixa_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_parQCaixa_Fornecedor.prototype.ExistenciaEspecial = function()
{
	return( ( !Fornecedor_Nome.Obrigatorio( false ) || tem(Fornecedor_Nome) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_parQCaixa_Pessoa.prototype.ExistenciaEspecial = function()
{
	return( ( !Pessoa_Nome.Obrigatorio( false ) || tem(Pessoa_Nome) ) && ( !Pessoa_NumCelular.Obrigatorio( false ) || tem(Pessoa_NumCelular) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_parQCaixa_SubPlano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano_Plano.Obrigatorio( false ) || tem(SubPlano_Plano) ) && ( !SubPlano_Codigo.Obrigatorio( false ) || tem(SubPlano_Codigo) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_parQCaixa_SubPlano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano_Plano_CodPlano.Obrigatorio( false ) || tem(SubPlano_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_parQCaixa_SubPlano_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano_Plano.Obrigatorio( false ) || tem(SubPlano_Plano) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_parQCaixa_SubPlano_Nome.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano.Obrigatorio( false ) || tem(SubPlano) ) );
}

//-------------------------------------------------------------
// Condi��o de Exist�ncia Especial do campo
//-------------------------------------------------------------
Campo_parQCaixa_FormaPg.prototype.ExistenciaEspecial = function()
{
	return( ( !FormaPg_FormaPg.Obrigatorio( false ) || tem(FormaPg_FormaPg) ) );
}

function IniciarDependencias_parQCaixa()
{
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Fornecedor_Nome.ExistenciasDependentes= [ Fornecedor ];
Fornecedor.ExistenciasDependentes= [ Pessoa,Pessoa_Nome,Pessoa_NumCelular ];
Pessoa_Nome.ExistenciasDependentes= [ Pessoa ];
Pessoa_NumCelular.ExistenciasDependentes= [ Pessoa ];
SubPlano_Plano.ExistenciasDependentes= [ SubPlano,SubPlano_Plano_Plano ];
SubPlano_Plano_CodPlano.ExistenciasDependentes= [ SubPlano_Plano ];
SubPlano_Codigo.ExistenciasDependentes= [ SubPlano ];
SubPlano.ExistenciasDependentes= [ SubPlano_Nome ];
FormaPg_FormaPg.ExistenciasDependentes= [ FormaPg ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Fornecedor_Nome.ErrosDependentes= [ Fornecedor ];
Fornecedor.ErrosDependentes= [ Pessoa ];
Pessoa_NumCelular.ErrosDependentes= [ Pessoa ];
SubPlano_Plano_CodPlano.ErrosDependentes= [ SubPlano_Plano ];
SubPlano_Codigo.ErrosDependentes= [ SubPlano ];
FormaPg_FormaPg.ErrosDependentes= [ FormaPg ];
SubPlano_Plano.DescritoresDependentes= [ SubPlano_Plano_Plano ];
SubPlano.DescritoresDependentes= [ SubPlano_Nome ];
Clinica.CamposChave= [ Clinica_Clinica ];
Fornecedor.CamposChave= [ Fornecedor_Nome ];
Pessoa.CamposChave= [ Pessoa_Nome,Pessoa_NumCelular ];
SubPlano.CamposChave= [ SubPlano_Plano,SubPlano_Codigo ];
SubPlano_Plano.CamposChave= [ SubPlano_Plano_CodPlano ];
FormaPg.CamposChave= [ FormaPg_FormaPg ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "parQCaixa";
//------------------------------------------------------------
function ListaDeCampos_parQCaixa( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = []
	l_lista = l_lista.concat(

		[ Clinica, Clinica_Clinica, Fornecedor, Fornecedor_Nome, Pessoa, Pessoa_Nome, Pessoa_NumCelular, Historico, Data, Valor, SubPlano, SubPlano_Plano, SubPlano_Plano_CodPlano, SubPlano_Plano_Plano, SubPlano_Codigo, SubPlano_Nome, FormaPg, FormaPg_FormaPg ]	);
	IniciarDependencias_parQCaixa();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_parQCaixa( '' );
g_idOperacao = 48;
parent.navegacao.MenuPrincQtdOpcoes=1;
parent.navegacao.MenuPrincPodeSo1=1;
