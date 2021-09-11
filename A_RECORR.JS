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

//------------------------------------------------------------
Campo_arqRecorrente_TCompete.prototype = new Lance_CampoLigado;

function Campo_arqRecorrente_TCompete()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TCompete", "TCompete", "TCompete", "tabTCompete", "t_tcompe", null, "",0);
}

var TCompete = new Campo_arqRecorrente_TCompete;

//------------------------------------------------------------
Campo_arqRecorrente_TCompete_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqRecorrente_TCompete_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TCompete_Chave", "TCompete_Chave", "TCompete", TCompete, 1, "u", false);
}

var TCompete_Chave = new Campo_arqRecorrente_TCompete_Chave;

//------------------------------------------------------------
Campo_arqRecorrente_TCompete_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqRecorrente_TCompete_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TCompete_Descritor", "TCompete_Descritor", "TCompete", TCompete, 8, "xxxxxxxx", false);
}

var TCompete_Descritor = new Campo_arqRecorrente_TCompete_Descritor;

//------------------------------------------------------------
Campo_arqRecorrente_Venc.prototype = new Lance_CampoNumerico;

function Campo_arqRecorrente_Venc()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Venc", "Venc", "Venc", 2, "zz", false,"", "");
}

var Venc = new Campo_arqRecorrente_Venc;

//------------------------------------------------------------
Campo_arqRecorrente_Antecipa.prototype = new Lance_CampoLogico;

function Campo_arqRecorrente_Antecipa()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Antecipa", "Antecipa", "Antecipa");
}

var Antecipa = new Campo_arqRecorrente_Antecipa;

//------------------------------------------------------------
Campo_arqRecorrente_Valor.prototype = new Lance_CampoNumerico;

function Campo_arqRecorrente_Valor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor", "Valor", "Valor", 8, "###.##z,zz", true,"", "");
}

var Valor = new Campo_arqRecorrente_Valor;

//------------------------------------------------------------
Campo_arqRecorrente_Estimado.prototype = new Lance_CampoLogico;

function Campo_arqRecorrente_Estimado()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Estimado", "Estimado", "Estimado");
}

var Estimado = new Campo_arqRecorrente_Estimado;

//------------------------------------------------------------
Campo_arqRecorrente_TFCobra.prototype = new Lance_CampoLigado;

function Campo_arqRecorrente_TFCobra()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TFCobra", "TFCobra", "TFCobra", "tabTFCobra", "t_tfcobr", null, "",0);
}

var TFCobra = new Campo_arqRecorrente_TFCobra;

//------------------------------------------------------------
Campo_arqRecorrente_TFCobra_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqRecorrente_TFCobra_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFCobra_Chave", "TFCobra_Chave", "TFCobra", TFCobra, 1, "u", false);
}

var TFCobra_Chave = new Campo_arqRecorrente_TFCobra_Chave;

//------------------------------------------------------------
Campo_arqRecorrente_TFCobra_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqRecorrente_TFCobra_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFCobra_Descritor", "TFCobra_Descritor", "TFCobra", TFCobra, 10, "xxxxxxxxxx", false);
}

var TFCobra_Descritor = new Campo_arqRecorrente_TFCobra_Descritor;

//------------------------------------------------------------
Campo_arqRecorrente_Historico.prototype = new Lance_CampoCadeia;

function Campo_arqRecorrente_Historico()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Historico", "Historico", "Historico", 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Historico = new Campo_arqRecorrente_Historico;

//------------------------------------------------------------
Campo_arqRecorrente_SubPlano.prototype = new Lance_CampoHidden;

function Campo_arqRecorrente_SubPlano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlano", "SubPlano", "SubPlano", "arqSubPlano", "a_subpla", null, "",28);
}

var SubPlano = new Campo_arqRecorrente_SubPlano;

//------------------------------------------------------------
Campo_arqRecorrente_SubPlano_Plano.prototype = new Lance_CampoHidden;

function Campo_arqRecorrente_SubPlano_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlano_Plano", "SubPlano_Plano", "Plano", "arqPlano", "a_plano", SubPlano, "",27);
}

var SubPlano_Plano = new Campo_arqRecorrente_SubPlano_Plano;

//------------------------------------------------------------
Campo_arqRecorrente_SubPlano_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_arqRecorrente_SubPlano_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "SubPlano_Plano_CodPlano", "SubPlano_Plano_CodPlano", "CodPlano", SubPlano_Plano, 2, "zz", false,"", "");
}

var SubPlano_Plano_CodPlano = new Campo_arqRecorrente_SubPlano_Plano_CodPlano;

//------------------------------------------------------------
Campo_arqRecorrente_SubPlano_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_arqRecorrente_SubPlano_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlano_Plano_Plano", "SubPlano_Plano_Plano", "Plano", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var SubPlano_Plano_Plano = new Campo_arqRecorrente_SubPlano_Plano_Plano;

//------------------------------------------------------------
Campo_arqRecorrente_SubPlano_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqRecorrente_SubPlano_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "SubPlano_Codigo", "SubPlano_Codigo", "Codigo", SubPlano, 6, "##.##.##", true);
}

var SubPlano_Codigo = new Campo_arqRecorrente_SubPlano_Codigo;

//------------------------------------------------------------
Campo_arqRecorrente_SubPlano_Nome.prototype = new Lance_CampoCadeia;

function Campo_arqRecorrente_SubPlano_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlano_Nome", "SubPlano_Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var SubPlano_Nome = new Campo_arqRecorrente_SubPlano_Nome;

//------------------------------------------------------------
Campo_arqRecorrente_Ativo.prototype = new Lance_CampoLogico;

function Campo_arqRecorrente_Ativo()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Ativo", "Ativo", "Ativo");
}

var Ativo = new Campo_arqRecorrente_Ativo;

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
	return( Lance_CampoLogico.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Pessoa.prototype.Existencia = function()
{
	return( !tem( Fornecedor_Nome ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Pessoa_Nome.prototype.Existencia = function()
{
	return( !tem( Fornecedor_Nome ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Pessoa_NumCelular.prototype.Existencia = function()
{
	return( !tem( Fornecedor_Nome ) );
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
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqRecorrente_TCompete.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A competência é obrigatória" );
		return( true );
	}
}

TCompete_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TCompete_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqRecorrente_Venc.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O dia do vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Antecipa.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqRecorrente_Antecipa.prototype.Cabecalho = function()
{
		return( "Antecipa?" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqRecorrente_Valor.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O valor é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Estimado.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqRecorrente_Estimado.prototype.Cabecalho = function()
{
		return( "Estimado?" );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqRecorrente_TFCobra.prototype.Cabecalho = function()
{
		return( "Cobrança" );
}

TFCobra_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TFCobra_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqRecorrente_Historico.prototype.Cabecalho = function()
{
		return( "Histórico" );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqRecorrente_SubPlano_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlano.Obrigatorio( p_comMsg ) );
}

SubPlano_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqRecorrente_SubPlano_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlano.Obrigatorio( p_comMsg ) );
}

SubPlano_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlano_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqRecorrente_SubPlano_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlano.Obrigatorio( p_comMsg ) );
}

SubPlano_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlano_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqRecorrente_Ativo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqRecorrente_Ativo.prototype.Cabecalho = function()
{
		return( "Ativa?" );
}

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

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqRecorrente_SubPlano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano_Plano.Obrigatorio( false ) || tem(SubPlano_Plano) ) && ( !SubPlano_Codigo.Obrigatorio( false ) || tem(SubPlano_Codigo) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqRecorrente_SubPlano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano_Plano_CodPlano.Obrigatorio( false ) || tem(SubPlano_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqRecorrente_SubPlano_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano_Plano.Obrigatorio( false ) || tem(SubPlano_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqRecorrente_SubPlano_Nome.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano.Obrigatorio( false ) || tem(SubPlano) ) );
}

function IniciarDependencias_arqRecorrente()
{
Pessoa.CalculosDependentes= [ Nome ];
Fornecedor.CalculosDependentes= [ Nome ];
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Fornecedor_Nome.ExistenciasDependentes= [ Fornecedor ];
Fornecedor.ExistenciasDependentes= [ Pessoa,Pessoa_Nome,Pessoa_NumCelular ];
Pessoa_Nome.ExistenciasDependentes= [ Pessoa ];
Pessoa_NumCelular.ExistenciasDependentes= [ Pessoa ];
SubPlano_Plano.ExistenciasDependentes= [ SubPlano,SubPlano_Plano_Plano ];
SubPlano_Plano_CodPlano.ExistenciasDependentes= [ SubPlano_Plano ];
SubPlano_Codigo.ExistenciasDependentes= [ SubPlano ];
SubPlano.ExistenciasDependentes= [ SubPlano_Nome ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Fornecedor_Nome.ErrosDependentes= [ Fornecedor ];
Fornecedor.ErrosDependentes= [ Pessoa ];
Pessoa_NumCelular.ErrosDependentes= [ Pessoa ];
SubPlano_Plano_CodPlano.ErrosDependentes= [ SubPlano_Plano ];
SubPlano_Codigo.ErrosDependentes= [ SubPlano ];
SubPlano_Plano.DescritoresDependentes= [ SubPlano_Plano_Plano ];
SubPlano.DescritoresDependentes= [ SubPlano_Nome ];
Clinica.CamposChave= [ Clinica_Clinica ];
Fornecedor.CamposChave= [ Fornecedor_Nome ];
Pessoa.CamposChave= [ Pessoa_Nome,Pessoa_NumCelular ];
SubPlano.CamposChave= [ SubPlano_Plano,SubPlano_Codigo ];
SubPlano_Plano.CamposChave= [ SubPlano_Plano_CodPlano ];
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

		[ Clinica, Clinica_Clinica, TPgRec, TPgRec_Chave, TPgRec_Descritor, Fornecedor, Fornecedor_Nome, Pessoa, Pessoa_Nome, Pessoa_NumCelular, Nome, TCompete, TCompete_Chave, TCompete_Descritor, Venc, Antecipa, Valor, Estimado, TFCobra, TFCobra_Chave, TFCobra_Descritor, Historico, SubPlano, SubPlano_Plano, SubPlano_Plano_CodPlano, SubPlano_Plano_Plano, SubPlano_Codigo, SubPlano_Nome, Ativo ]	);
	IniciarDependencias_arqRecorrente();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqRecorrente( '' );
g_idOperacao = 46;

if( parent.navegacao ) {
parent.navegacao.MenuPrincQtdOpcoes=0;
}
