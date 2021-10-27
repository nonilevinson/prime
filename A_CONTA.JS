/*=========================================================================
  a_conta - Conta
=========================================================================*/

//------------------------------------------------------------
Campo_arqConta_Transacao.prototype = new Lance_CampoNumerico;

function Campo_arqConta_Transacao()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Transacao", "Transacao", "Transacao", 6, "###.##z", true,"", "");
}

var Transacao = new Campo_arqConta_Transacao;

//------------------------------------------------------------
Campo_arqConta_Clinica.prototype = new Lance_CampoHidden;

function Campo_arqConta_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_arqConta_Clinica;

//------------------------------------------------------------
Campo_arqConta_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConta_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Clinica_Clinica = new Campo_arqConta_Clinica_Clinica;

//------------------------------------------------------------
Campo_arqConta_TPgRec.prototype = new Lance_CampoLigado;

function Campo_arqConta_TPgRec()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPgRec", "TPgRec", "TPgRec", "tabTPgRec", "t_tpgre", null, "",0);
}

var TPgRec = new Campo_arqConta_TPgRec;

//------------------------------------------------------------
Campo_arqConta_TPgRec_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConta_TPgRec_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPgRec_Chave", "TPgRec_Chave", "TPgRec", TPgRec, 1, "u", false);
}

var TPgRec_Chave = new Campo_arqConta_TPgRec_Chave;

//------------------------------------------------------------
Campo_arqConta_TPgRec_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConta_TPgRec_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPgRec_Descritor", "TPgRec_Descritor", "TPgRec", TPgRec, 7, "xxxxxxx", false);
}

var TPgRec_Descritor = new Campo_arqConta_TPgRec_Descritor;

//------------------------------------------------------------
Campo_arqConta_Fornecedor.prototype = new Lance_CampoHidden;

function Campo_arqConta_Fornecedor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Fornecedor", "Fornecedor", "Fornecedor", "arqFornecedor", "a_fornec", null, "",42);
}

var Fornecedor = new Campo_arqConta_Fornecedor;

//------------------------------------------------------------
Campo_arqConta_Fornecedor_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConta_Fornecedor_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Fornecedor_Nome", "Fornecedor_Nome", "Nome", Fornecedor, 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Fornecedor_Nome = new Campo_arqConta_Fornecedor_Nome;

//------------------------------------------------------------
Campo_arqConta_Pessoa.prototype = new Lance_CampoHidden;

function Campo_arqConta_Pessoa()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Pessoa", "Pessoa", "Pessoa", "arqPessoa", "a_pessoa", null, "",7);
}

var Pessoa = new Campo_arqConta_Pessoa;

//------------------------------------------------------------
Campo_arqConta_Pessoa_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConta_Pessoa_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_Nome", "Pessoa_Nome", "Nome", Pessoa, 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Pessoa_Nome = new Campo_arqConta_Pessoa_Nome;

//------------------------------------------------------------
Campo_arqConta_Pessoa_NumCelular.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqConta_Pessoa_NumCelular()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_NumCelular", "Pessoa_NumCelular", "NumCelular", Pessoa, 11, "(##) #.####.####", true);
}

var Pessoa_NumCelular = new Campo_arqConta_Pessoa_NumCelular;

//------------------------------------------------------------
Campo_arqConta_Nome.prototype = new Lance_CampoCadeia;

function Campo_arqConta_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Nome", "Nome", "Nome", 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Nome = new Campo_arqConta_Nome;

//------------------------------------------------------------
Campo_arqConta_TrgValor.prototype = new Lance_CampoNumerico;

function Campo_arqConta_TrgValor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "TrgValor", "TrgValor", "TrgValor", 11, "###.###.##z,zz", true,"", "");
}

var TrgValor = new Campo_arqConta_TrgValor;

//------------------------------------------------------------
Campo_arqConta_TrgValLiq.prototype = new Lance_CampoNumerico;

function Campo_arqConta_TrgValLiq()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "TrgValLiq", "TrgValLiq", "TrgValLiq", 11, "###.###.##z,zz", true,"", "");
}

var TrgValLiq = new Campo_arqConta_TrgValLiq;

//------------------------------------------------------------
Campo_arqConta_TrgQtdParc.prototype = new Lance_CampoNumerico;

function Campo_arqConta_TrgQtdParc()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "TrgQtdParc", "TrgQtdParc", "TrgQtdParc", 2, "#z", false,"", "");
}

var TrgQtdParc = new Campo_arqConta_TrgQtdParc;

//------------------------------------------------------------
Campo_arqConta_TrgQParcPg.prototype = new Lance_CampoNumerico;

function Campo_arqConta_TrgQParcPg()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "TrgQParcPg", "TrgQParcPg", "TrgQParcPg", 2, "#z", false,"", "");
}

var TrgQParcPg = new Campo_arqConta_TrgQParcPg;

//------------------------------------------------------------
Campo_arqConta_ProxVenc.prototype = new Lance_CampoData;

function Campo_arqConta_ProxVenc()
{
	this.superClass = Lance_CampoData;
	this.superClass( "ProxVenc", "ProxVenc", "ProxVenc", 8, "dd/mm/aaaa", true);
}

var ProxVenc = new Campo_arqConta_ProxVenc;

//------------------------------------------------------------
Campo_arqConta_TrgPago.prototype = new Lance_CampoNumerico;

function Campo_arqConta_TrgPago()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "TrgPago", "TrgPago", "TrgPago", 11, "###.###.##z,zz", true,"", "");
}

var TrgPago = new Campo_arqConta_TrgPago;

//------------------------------------------------------------
Campo_arqConta_Saldo.prototype = new Lance_CampoNumerico;

function Campo_arqConta_Saldo()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Saldo", "Saldo", "Saldo", 11, "###.###.##z,zz", true,"", "");
}

var Saldo = new Campo_arqConta_Saldo;

//------------------------------------------------------------
Campo_arqConta_Documento.prototype = new Lance_CampoNumerico;

function Campo_arqConta_Documento()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Documento", "Documento", "Documento", 13, "#.###.###.###.##z", true,"", "");
}

var Documento = new Campo_arqConta_Documento;

//------------------------------------------------------------
Campo_arqConta_Emissao.prototype = new Lance_CampoData;

function Campo_arqConta_Emissao()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Emissao", "Emissao", "Emissao", 8, "dd/mm/aaaa", true);
}

var Emissao = new Campo_arqConta_Emissao;

//------------------------------------------------------------
Campo_arqConta_RecEnvia.prototype = new Lance_CampoData;

function Campo_arqConta_RecEnvia()
{
	this.superClass = Lance_CampoData;
	this.superClass( "RecEnvia", "RecEnvia", "RecEnvia", 8, "dd/mm/aaaa", true);
}

var RecEnvia = new Campo_arqConta_RecEnvia;

//------------------------------------------------------------
Campo_arqConta_Compete.prototype = new Lance_CampoData;

function Campo_arqConta_Compete()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Compete", "Compete", "Compete", 6, "mm/aaaa", true);
}

var Compete = new Campo_arqConta_Compete;

//------------------------------------------------------------
Campo_arqConta_Historico.prototype = new Lance_CampoCadeia;

function Campo_arqConta_Historico()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Historico", "Historico", "Historico", 60, "uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu", false);
}

var Historico = new Campo_arqConta_Historico;

//------------------------------------------------------------
Campo_arqConta_Arq1.prototype = new Lance_CampoArquivo;

function Campo_arqConta_Arq1()
{
	this.superClass = Lance_CampoArquivo;
	this.superClass( "Arq1", "Arq1", "Arq1", 10, "nnnnnnnnnn", false,false);
}

var Arq1 = new Campo_arqConta_Arq1;

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqConta_Transacao.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConta_Transacao.prototype.Cabecalho = function()
{
		return( "Transação" );
}

Transacao.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConta_Clinica.prototype.FiltroPai = function()
{
		if( g_inserindo && g_temMaisDeUmClinica )
			return( "A.Ativo = 1 and A.idPrimario in ( " + g_vetIdClinica + " )" );
		if( g_temMaisDeUmClinica )
			return( "A.idPrimario in ( " + g_vetIdClinica + " )" );
		if( g_inserindo )
			return( "Ativo = 1" );
		return( "" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConta_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A clínica é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConta_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConta_TPgRec.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O tipo da conta é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConta_TPgRec.prototype.Cabecalho = function()
{
		return( "Tipo" );
}

TPgRec_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPgRec_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConta_Fornecedor_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Fornecedor.Obrigatorio( p_comMsg ) );
}

Fornecedor_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqConta_Pessoa.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo = 1" );
		return( "" );
}

//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_arqConta_Pessoa.prototype.TemErro = function()
{
		if( !tem( Pessoa_Nome ) && !tem( Fornecedor_Nome ) )
	{
		alert( "Informe um paciente ou um fornecedor" );
		return( true );
	}
	return( Lance_CampoArquivo.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConta_Pessoa.prototype.Existencia = function()
{
	return( !tem( Fornecedor_Nome ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConta_Pessoa_Nome.prototype.Existencia = function()
{
	return( !tem( Fornecedor_Nome ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqConta_Pessoa_NumCelular.prototype.Existencia = function()
{
	return( !tem( Fornecedor_Nome ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConta_Pessoa_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqConta_Pessoa_NumCelular.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_NumCelular.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqConta_Nome.prototype.Calculou = function()
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
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConta_TrgValor.prototype.Cabecalho = function()
{
		return( "Bruto" );
}

TrgValor.EhCalculado = true;
TrgValor.EhTotalizado = true;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConta_TrgValLiq.prototype.Cabecalho = function()
{
		return( "Valor líquido" );
}

TrgValLiq.EhCalculado = true;
TrgValLiq.EhTotalizado = true;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConta_TrgQtdParc.prototype.Cabecalho = function()
{
		return( "Parc" );
}

TrgQtdParc.EhCalculado = true;
TrgQtdParc.EhTotalizado = true;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConta_TrgQParcPg.prototype.Cabecalho = function()
{
		return( "Pg" );
}

TrgQParcPg.EhCalculado = true;
TrgQParcPg.EhTotalizado = true;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConta_ProxVenc.prototype.Cabecalho = function()
{
		return( "Prox.Venc" );
}

ProxVenc.EhCalculado = true;
ProxVenc.EhTotalizado = true;
TrgPago.EhCalculado = true;
TrgPago.EhTotalizado = true;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqConta_Saldo.prototype.Calculou = function()
{
{
	return( this.Atribuiu( TrgValLiq - TrgPago ) );
}
}

Saldo.EhCalculado = true;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqConta_Emissao.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data da emissão é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqConta_RecEnvia.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Emissao ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqConta_Compete.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( dataMes( Emissao ) + "/" + dataAno( Emissao ) ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqConta_Historico.prototype.Cabecalho = function()
{
		return( "Histórico" );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConta_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConta_Fornecedor.prototype.ExistenciaEspecial = function()
{
	return( ( !Fornecedor_Nome.Obrigatorio( false ) || tem(Fornecedor_Nome) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqConta_Pessoa.prototype.ExistenciaEspecial = function()
{
	return( ( !Pessoa_Nome.Obrigatorio( false ) || tem(Pessoa_Nome) ) && ( !Pessoa_NumCelular.Obrigatorio( false ) || tem(Pessoa_NumCelular) ) );
}

function IniciarDependencias_arqConta()
{
Pessoa.CalculosDependentes= [ Nome ];
Fornecedor.CalculosDependentes= [ Nome ];
TrgValLiq.CalculosDependentes= [ Saldo ];
TrgPago.CalculosDependentes= [ Saldo ];
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Fornecedor_Nome.ExistenciasDependentes= [ Fornecedor ];
Fornecedor.ExistenciasDependentes= [ Pessoa,Pessoa_Nome,Pessoa_NumCelular ];
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
g_arquivoAtual = "arqConta";
//------------------------------------------------------------
function ListaDeCampos_arqConta( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Transacao, Clinica, Clinica_Clinica, TPgRec, TPgRec_Chave, TPgRec_Descritor, Fornecedor, Fornecedor_Nome, Pessoa, Pessoa_Nome, Pessoa_NumCelular, Nome, TrgValor, TrgValLiq, TrgQtdParc, TrgQParcPg, ProxVenc, TrgPago, Saldo, Documento, Emissao, RecEnvia, Compete, Historico, Arq1 ]	);
	IniciarDependencias_arqConta();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqConta( '' );
g_idOperacao = 33;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Parcelas","","P",99,"","",1,"","1","a_parcel","arqParcela","Folhear","Conta","?","","", "","", 0,11,[],[34]);
var Menu_2 = new Array( 1,"Consultas","","u",182,"","",1,"","1","a_consul","arqConsulta","Folhear","ContaCons","?","","", "","", 0,11,[],[39]);
var Menu_3 = new Array( 1,"Tratamentos","","T",183,"","",1,"","1","a_consul","arqConsulta","Folhear","ContaPTra","?","","", "","", 0,11,[],[39]);
parent.navegacao.MenuPrincQtdOpcoes=3;
}
