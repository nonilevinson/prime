/*=========================================================================
  a_parcel - Parcela
=========================================================================*/

//------------------------------------------------------------
Campo_arqParcela_Conta.prototype = new Lance_CampoHidden;

function Campo_arqParcela_Conta()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Conta", "Conta", "Conta", "arqConta", "a_conta", null, "",33);
}

var Conta = new Campo_arqParcela_Conta;

//------------------------------------------------------------
Campo_arqParcela_Conta_Transacao.prototype = new Lance_CampoNumericoLigado;

function Campo_arqParcela_Conta_Transacao()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Conta_Transacao", "Conta_Transacao", "Transacao", Conta, 6, "###.##z", true,"", "");
}

var Conta_Transacao = new Campo_arqParcela_Conta_Transacao;

//------------------------------------------------------------
Campo_arqParcela_ClinicaCal.prototype = new Lance_CampoCadeia;

function Campo_arqParcela_ClinicaCal()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "ClinicaCal", "ClinicaCal", "ClinicaCal", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var ClinicaCal = new Campo_arqParcela_ClinicaCal;

//------------------------------------------------------------
Campo_arqParcela_TPgRecCal.prototype = new Lance_CampoCadeia;

function Campo_arqParcela_TPgRecCal()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "TPgRecCal", "TPgRecCal", "TPgRecCal", 7, "uxxxxxx", false);
}

var TPgRecCal = new Campo_arqParcela_TPgRecCal;

//------------------------------------------------------------
Campo_arqParcela_PessoaCal.prototype = new Lance_CampoCadeia;

function Campo_arqParcela_PessoaCal()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "PessoaCal", "PessoaCal", "PessoaCal", 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var PessoaCal = new Campo_arqParcela_PessoaCal;

//------------------------------------------------------------
Campo_arqParcela_Parcela.prototype = new Lance_CampoNumerico;

function Campo_arqParcela_Parcela()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Parcela", "Parcela", "Parcela", 2, "#z", false,"", "");
}

var Parcela = new Campo_arqParcela_Parcela;

//------------------------------------------------------------
Campo_arqParcela_Vencimento.prototype = new Lance_CampoData;

function Campo_arqParcela_Vencimento()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Vencimento", "Vencimento", "Vencimento", 8, "dd/mm/aaaa", true);
}

var Vencimento = new Campo_arqParcela_Vencimento;

//------------------------------------------------------------
Campo_arqParcela_VencEst.prototype = new Lance_CampoLogico;

function Campo_arqParcela_VencEst()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "VencEst", "VencEst", "VencEst");
}

var VencEst = new Campo_arqParcela_VencEst;

//------------------------------------------------------------
Campo_arqParcela_Valor.prototype = new Lance_CampoNumerico;

function Campo_arqParcela_Valor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor", "Valor", "Valor", 11, "###.###.##z,zz", true,"", "");
}

var Valor = new Campo_arqParcela_Valor;

//------------------------------------------------------------
Campo_arqParcela_ValorLiq.prototype = new Lance_CampoNumerico;

function Campo_arqParcela_ValorLiq()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "ValorLiq", "ValorLiq", "ValorLiq", 11, "###.###.##z,zz", true,"", "");
}

var ValorLiq = new Campo_arqParcela_ValorLiq;

//------------------------------------------------------------
Campo_arqParcela_Estimado.prototype = new Lance_CampoLogico;

function Campo_arqParcela_Estimado()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Estimado", "Estimado", "Estimado");
}

var Estimado = new Campo_arqParcela_Estimado;

//------------------------------------------------------------
Campo_arqParcela_TFCobra.prototype = new Lance_CampoLigado;

function Campo_arqParcela_TFCobra()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TFCobra", "TFCobra", "TFCobra", "tabTFCobra", "t_tfcobr", null, "",0);
}

var TFCobra = new Campo_arqParcela_TFCobra;

//------------------------------------------------------------
Campo_arqParcela_TFCobra_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqParcela_TFCobra_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFCobra_Chave", "TFCobra_Chave", "TFCobra", TFCobra, 1, "u", false);
}

var TFCobra_Chave = new Campo_arqParcela_TFCobra_Chave;

//------------------------------------------------------------
Campo_arqParcela_TFCobra_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqParcela_TFCobra_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFCobra_Descritor", "TFCobra_Descritor", "TFCobra", TFCobra, 10, "xxxxxxxxxx", false);
}

var TFCobra_Descritor = new Campo_arqParcela_TFCobra_Descritor;

//------------------------------------------------------------
Campo_arqParcela_Emissao.prototype = new Lance_CampoData;

function Campo_arqParcela_Emissao()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Emissao", "Emissao", "Emissao", 8, "dd/mm/aaaa", true);
}

var Emissao = new Campo_arqParcela_Emissao;

//------------------------------------------------------------
Campo_arqParcela_NumBoleto.prototype = new Lance_CampoNumerico;

function Campo_arqParcela_NumBoleto()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "NumBoleto", "NumBoleto", "NumBoleto", 11, "##.###.###.##z", true,"", "F");
}

var NumBoleto = new Campo_arqParcela_NumBoleto;

//------------------------------------------------------------
Campo_arqParcela_LinhaDig.prototype = new Lance_CampoCadeia;

function Campo_arqParcela_LinhaDig()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "LinhaDig", "LinhaDig", "LinhaDig", 54, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var LinhaDig = new Campo_arqParcela_LinhaDig;

//------------------------------------------------------------
Campo_arqParcela_NomePdf.prototype = new Lance_CampoCadeia;

function Campo_arqParcela_NomePdf()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "NomePdf", "NomePdf", "NomePdf", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var NomePdf = new Campo_arqParcela_NomePdf;

//------------------------------------------------------------
Campo_arqParcela_CCor.prototype = new Lance_CampoHidden;

function Campo_arqParcela_CCor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "CCor", "CCor", "CCor", "arqCCor", "a_ccor", null, "",20);
}

var CCor = new Campo_arqParcela_CCor;

//------------------------------------------------------------
Campo_arqParcela_CCor_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqParcela_CCor_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "CCor_Nome", "CCor_Nome", "Nome", CCor, 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var CCor_Nome = new Campo_arqParcela_CCor_Nome;

//------------------------------------------------------------
Campo_arqParcela_SubPlano.prototype = new Lance_CampoHidden;

function Campo_arqParcela_SubPlano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlano", "SubPlano", "SubPlano", "arqSubPlano", "a_subpla", null, "",28);
}

var SubPlano = new Campo_arqParcela_SubPlano;

//------------------------------------------------------------
Campo_arqParcela_SubPlano_Plano.prototype = new Lance_CampoHidden;

function Campo_arqParcela_SubPlano_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "SubPlano_Plano", "SubPlano_Plano", "Plano", "arqPlano", "a_plano", SubPlano, "",27);
}

var SubPlano_Plano = new Campo_arqParcela_SubPlano_Plano;

//------------------------------------------------------------
Campo_arqParcela_SubPlano_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_arqParcela_SubPlano_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "SubPlano_Plano_CodPlano", "SubPlano_Plano_CodPlano", "CodPlano", SubPlano_Plano, 2, "zz", false,"", "");
}

var SubPlano_Plano_CodPlano = new Campo_arqParcela_SubPlano_Plano_CodPlano;

//------------------------------------------------------------
Campo_arqParcela_SubPlano_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_arqParcela_SubPlano_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlano_Plano_Plano", "SubPlano_Plano_Plano", "Plano", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var SubPlano_Plano_Plano = new Campo_arqParcela_SubPlano_Plano_Plano;

//------------------------------------------------------------
Campo_arqParcela_SubPlano_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqParcela_SubPlano_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "SubPlano_Codigo", "SubPlano_Codigo", "Codigo", SubPlano, 6, "##.##.##", true);
}

var SubPlano_Codigo = new Campo_arqParcela_SubPlano_Codigo;

//------------------------------------------------------------
Campo_arqParcela_SubPlano_Nome.prototype = new Lance_CampoCadeia;

function Campo_arqParcela_SubPlano_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "SubPlano_Nome", "SubPlano_Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var SubPlano_Nome = new Campo_arqParcela_SubPlano_Nome;

//------------------------------------------------------------
Campo_arqParcela_DataPagto.prototype = new Lance_CampoData;

function Campo_arqParcela_DataPagto()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataPagto", "DataPagto", "DataPagto", 8, "dd/mm/aaaa", true);
}

var DataPagto = new Campo_arqParcela_DataPagto;

//------------------------------------------------------------
Campo_arqParcela_DataComp.prototype = new Lance_CampoData;

function Campo_arqParcela_DataComp()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataComp", "DataComp", "DataComp", 8, "dd/mm/aaaa", true);
}

var DataComp = new Campo_arqParcela_DataComp;

//------------------------------------------------------------
Campo_arqParcela_TFPagto.prototype = new Lance_CampoLigado;

function Campo_arqParcela_TFPagto()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TFPagto", "TFPagto", "TFPagto", "tabTFPagto", "t_tfpagt", null, "",0);
}

var TFPagto = new Campo_arqParcela_TFPagto;

//------------------------------------------------------------
Campo_arqParcela_TFPagto_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqParcela_TFPagto_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFPagto_Chave", "TFPagto_Chave", "TFPagto", TFPagto, 1, "u", false);
}

var TFPagto_Chave = new Campo_arqParcela_TFPagto_Chave;

//------------------------------------------------------------
Campo_arqParcela_TFPagto_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqParcela_TFPagto_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFPagto_Descritor", "TFPagto_Descritor", "TFPagto", TFPagto, 8, "xxxxxxxx", false);
}

var TFPagto_Descritor = new Campo_arqParcela_TFPagto_Descritor;

//------------------------------------------------------------
Campo_arqParcela_TDetPg.prototype = new Lance_CampoLigado;

function Campo_arqParcela_TDetPg()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TDetPg", "TDetPg", "TDetPg", "tabTDetPg", "t_tdetpg", null, "",0);
}

var TDetPg = new Campo_arqParcela_TDetPg;

//------------------------------------------------------------
Campo_arqParcela_TDetPg_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqParcela_TDetPg_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TDetPg_Chave", "TDetPg_Chave", "TDetPg", TDetPg, 1, "u", false);
}

var TDetPg_Chave = new Campo_arqParcela_TDetPg_Chave;

//------------------------------------------------------------
Campo_arqParcela_TDetPg_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_arqParcela_TDetPg_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TDetPg_Descritor", "TDetPg_Descritor", "TDetPg", TDetPg, 14, "xxxxxxxxxxxxxx", false);
}

var TDetPg_Descritor = new Campo_arqParcela_TDetPg_Descritor;

//------------------------------------------------------------
Campo_arqParcela_Cheque.prototype = new Lance_CampoNumerico;

function Campo_arqParcela_Cheque()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Cheque", "Cheque", "Cheque", 6, "zzz.zzz", true,"", "");
}

var Cheque = new Campo_arqParcela_Cheque;

//------------------------------------------------------------
Campo_arqParcela_Arq1.prototype = new Lance_CampoArquivo;

function Campo_arqParcela_Arq1()
{
	this.superClass = Lance_CampoArquivo;
	this.superClass( "Arq1", "Arq1", "Arq1", 10, "nnnnnnnnnn", false,false);
}

var Arq1 = new Campo_arqParcela_Arq1;

//------------------------------------------------------------
Campo_arqParcela_StRetorno.prototype = new Lance_CampoCadeia;

function Campo_arqParcela_StRetorno()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "StRetorno", "StRetorno", "StRetorno", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var StRetorno = new Campo_arqParcela_StRetorno;

//------------------------------------------------------------
Campo_arqParcela_Remessa.prototype = new Lance_CampoNumerico;

function Campo_arqParcela_Remessa()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Remessa", "Remessa", "Remessa", 9, "###.###.##z", true,"", "");
}

var Remessa = new Campo_arqParcela_Remessa;

//------------------------------------------------------------
Campo_arqParcela_DataRem.prototype = new Lance_CampoData;

function Campo_arqParcela_DataRem()
{
	this.superClass = Lance_CampoData;
	this.superClass( "DataRem", "DataRem", "DataRem", 8, "dd/mm/aaaa", true);
}

var DataRem = new Campo_arqParcela_DataRem;

//-------------------------------------------------------------
// Campos a mais que o ligado traz do pai
//-------------------------------------------------------------
Campo_arqParcela_Conta.prototype.TrazOutrosDoPai = function()
{
	var vetPai = new Array();
			vetPai[0] = [ "TPgRec, Clinica, Fornecedor",
					"A.Conta, arqConta",
					"0,0,0" ];
			vetPai[1] = [ "Clinica",
					"A.Conta, arqConta.Clinica, arqClinica",
					"1" ];
			vetPai[2] = [ "Nome",
					"A.Conta, arqConta.Pessoa, arqPessoa",
					"1" ];
		return( vetPai );
}

Conta.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqParcela_Conta_Transacao.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Conta.Obrigatorio( p_comMsg ) );
}

Conta_Transacao.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqParcela_ClinicaCal.prototype.Calculou = function()
{
{
{
	if( !Conta.ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT Clinica FROM arqClinica WHERE arqClinica.IdPrimario=( COALESCE( ( SELECT Clinica FROM arqConta WHERE arqConta.IdPrimario=( " + Conta + " ) ), 0 ) )  )" + LANCE_SEPARADOR + this.Prefixo + "ClinicaCal" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqParcela_ClinicaCal.prototype.Cabecalho = function()
{
		return( "Clínica" );
}

ClinicaCal.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqParcela_TPgRecCal.prototype.Calculou = function()
{
{
	return( this.Atribuiu( Conta_TPgRec ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqParcela_TPgRecCal.prototype.Cabecalho = function()
{
		return( "Tipo" );
}

TPgRecCal.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqParcela_PessoaCal.prototype.Calculou = function()
{
{
		if( tem( Conta_Fornecedor ) )
{
	if( !Conta.ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT Nome FROM arqFornecedor WHERE arqFornecedor.IdPrimario=( COALESCE( ( SELECT Fornecedor FROM arqConta WHERE arqConta.IdPrimario=( " + Conta + " ) ), 0 ) )  )" + LANCE_SEPARADOR + this.Prefixo + "PessoaCal" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
{
{
	if( !Conta.ValorFoiPreenchido() )
		this.Atribuiu( "" );
	else
		g_strConexao += " ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConta WHERE arqConta.IdPrimario=( " + Conta + " ) ), 0 ) )  )" + LANCE_SEPARADOR + this.Prefixo + "PessoaCal" + LANCE_FIM_PARAMETRO;
	return( true );
}
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqParcela_PessoaCal.prototype.Cabecalho = function()
{
		return( "Pessoa" );
}

PessoaCal.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqParcela_Parcela.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( maior( "Parcela+1", 1, Conta ) ) );
}
}

Parcela.TipoCampo |= CAMPO_CHAVE;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqParcela_Vencimento.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_arqParcela_Vencimento.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( Vencimento ) ) )
	{
		return( !confirm( "Este não é um dia útil. Continua?" ) );
	}
		if( tem(this) && ( g_acaoAtual == EM_INCLUSAO  &&  quantosDias( Vencimento, HOJE ) < 0 ) )
	{
		return( !confirm( "Esta data já passou. Continua?" ) );
	}
	return( Lance_CampoData.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqParcela_VencEst.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqParcela_Valor.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O valor é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqParcela_Valor.prototype.Cabecalho = function()
{
		return( "Bruto" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqParcela_ValorLiq.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Valor ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqParcela_ValorLiq.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O valor líquido é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqParcela_ValorLiq.prototype.Cabecalho = function()
{
		return( "Líquido" );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqParcela_Estimado.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqParcela_TFCobra.prototype.Cabecalho = function()
{
		return( "Cobrança" );
}

TFCobra_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TFCobra_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqParcela_Emissao.prototype.Existencia = function()
{
	return( TFCobra == 1 && ( Conta_TPgRec == 2 ) );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_arqParcela_NumBoleto.prototype.Calculou = function()
{
{
		if( tem( Emissao ) )
	return( this.Atribuiu( g_idRegAtual ) );
}
{
	return( this.Atribuiu( 0 ) );
}
}

NumBoleto.EhCalculado = true;
//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqParcela_LinhaDig.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqParcela_LinhaDig.prototype.Cabecalho = function()
{
		return( "Linha digitável" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqParcela_LinhaDig.prototype.Existencia = function()
{
	return( TFCobra == 1 );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqParcela_NomePdf.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqParcela_NomePdf.prototype.Existencia = function()
{
	return( TFCobra == 1 && ( Conta_TPgRec == 2 ) );
}

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_arqParcela_CCor.prototype.FiltroPai = function()
{
		if( g_inserindo )
			return( "A.Ativo == 1" );
			return( "A.Clinica = " + Conta_Clinica + "" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqParcela_CCor.prototype.Obrigatorio = function( p_comMsg )
{
		if( TFPagto == 1 )
	{
		if( p_comMsg ) alert( "O banco, a agência e a conta são obrigatórios" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqParcela_CCor.prototype.Existencia = function()
{
	return( TFPagto == 1 || tem( Emissao ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqParcela_CCor_Nome.prototype.Existencia = function()
{
	return( TFPagto == 1 || tem( Emissao ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqParcela_CCor_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( CCor.Obrigatorio( p_comMsg ) );
}

CCor_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqParcela_SubPlano.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O plano de contas é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqParcela_SubPlano_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlano.Obrigatorio( p_comMsg ) );
}

SubPlano_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqParcela_SubPlano_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlano.Obrigatorio( p_comMsg ) );
}

SubPlano_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlano_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_arqParcela_SubPlano_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( SubPlano.Obrigatorio( p_comMsg ) );
}

SubPlano_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
SubPlano_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Cabeçalho para o campo
//-------------------------------------------------------------
Campo_arqParcela_DataPagto.prototype.Cabecalho = function()
{
		return( "Pagamento" );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqParcela_DataPagto.prototype.Existencia = function()
{
	return( tem( TFPagto ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_arqParcela_DataComp.prototype.Sugeriu = function()
{
{
		if( TFPagto != 1 )
	return( this.AtribuiuSemCritica( DataPagto ) );
}
		return( true );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqParcela_DataComp.prototype.Existencia = function()
{
	return( tem( DataPagto ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqParcela_TFPagto.prototype.Existencia = function()
{
	return( tem( TFCobra ) );
}

TFPagto_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TFPagto_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqParcela_TDetPg.prototype.Obrigatorio = function( p_comMsg )
{
		if( TFPagto == 1 )
	{
		if( p_comMsg ) alert( "O detalhe do pagamento é obrigatório" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqParcela_TDetPg.prototype.Existencia = function()
{
	return( tem( TFCobra ) );
}

TDetPg_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TDetPg_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_arqParcela_Cheque.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O número do cheque é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqParcela_Cheque.prototype.Existencia = function()
{
	return( TDetPg == 1 );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqParcela_StRetorno.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqParcela_StRetorno.prototype.Existencia = function()
{
	return( TFCobra == 1 && ( Conta_TPgRec == 2 ) );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqParcela_Remessa.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqParcela_Remessa.prototype.Existencia = function()
{
	return( TFCobra == 1 && ( Conta_TPgRec == 2 ) );
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_arqParcela_DataRem.prototype.PodeAlterar = function()
{
		if( GrupoAtualEm() )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_arqParcela_DataRem.prototype.Existencia = function()
{
	return( tem( Remessa ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqParcela_Conta.prototype.ExistenciaEspecial = function()
{
	return( ( !Conta_Transacao.Obrigatorio( false ) || tem(Conta_Transacao) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqParcela_CCor.prototype.ExistenciaEspecial = function()
{
	return( ( !CCor_Nome.Obrigatorio( false ) || tem(CCor_Nome) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqParcela_SubPlano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano_Plano.Obrigatorio( false ) || tem(SubPlano_Plano) ) && ( !SubPlano_Codigo.Obrigatorio( false ) || tem(SubPlano_Codigo) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqParcela_SubPlano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano_Plano_CodPlano.Obrigatorio( false ) || tem(SubPlano_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqParcela_SubPlano_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano_Plano.Obrigatorio( false ) || tem(SubPlano_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_arqParcela_SubPlano_Nome.prototype.ExistenciaEspecial = function()
{
	return( ( !SubPlano.Obrigatorio( false ) || tem(SubPlano) ) );
}

function IniciarDependencias_arqParcela()
{
Conta.CalculosDependentes= [ ClinicaCal,TPgRecCal,PessoaCal ];
Emissao.CalculosDependentes= [ NumBoleto ];
Conta_Transacao.ExistenciasDependentes= [ Conta ];
TFCobra.ExistenciasDependentes= [ Emissao,LinhaDig,NomePdf,TFPagto,TDetPg,StRetorno,Remessa ];
Conta.ExistenciasDependentes= [ Emissao,NomePdf,CCor,StRetorno,Remessa ];
TFPagto.ExistenciasDependentes= [ CCor,CCor_Nome,DataPagto,TDetPg ];
Emissao.ExistenciasDependentes= [ CCor,CCor_Nome ];
CCor_Nome.ExistenciasDependentes= [ CCor ];
SubPlano_Plano.ExistenciasDependentes= [ SubPlano,SubPlano_Plano_Plano ];
SubPlano_Plano_CodPlano.ExistenciasDependentes= [ SubPlano_Plano ];
SubPlano_Codigo.ExistenciasDependentes= [ SubPlano ];
SubPlano.ExistenciasDependentes= [ SubPlano_Nome ];
DataPagto.ExistenciasDependentes= [ DataComp ];
TDetPg.ExistenciasDependentes= [ Cheque ];
Remessa.ExistenciasDependentes= [ DataRem ];
Conta_Transacao.ErrosDependentes= [ Conta ];
CCor_Nome.ErrosDependentes= [ CCor ];
SubPlano_Plano_CodPlano.ErrosDependentes= [ SubPlano_Plano ];
SubPlano_Codigo.ErrosDependentes= [ SubPlano ];
SubPlano_Plano.DescritoresDependentes= [ SubPlano_Plano_Plano ];
SubPlano.DescritoresDependentes= [ SubPlano_Nome ];
Conta.CamposChave= [ Conta_Transacao ];
CCor.CamposChave= [ CCor_Nome ];
SubPlano.CamposChave= [ SubPlano_Plano,SubPlano_Codigo ];
SubPlano_Plano.CamposChave= [ SubPlano_Plano_CodPlano ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "arqParcela";
var Conta_TPgRec;
var Conta_Clinica;
var Conta_Fornecedor;
var Conta_Nome;
//------------------------------------------------------------
function ListaDeCampos_arqParcela( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Conta, Conta_Transacao, ClinicaCal, TPgRecCal, PessoaCal, Parcela, Vencimento, VencEst, Valor, ValorLiq, Estimado, TFCobra, TFCobra_Chave, TFCobra_Descritor, Emissao, NumBoleto, LinhaDig, NomePdf, CCor, CCor_Nome, SubPlano, SubPlano_Plano, SubPlano_Plano_CodPlano, SubPlano_Plano_Plano, SubPlano_Codigo, SubPlano_Nome, DataPagto, DataComp, TFPagto, TFPagto_Chave, TFPagto_Descritor, TDetPg, TDetPg_Chave, TDetPg_Descritor, Cheque, Arq1, StRetorno, Remessa, DataRem ]	);
	IniciarDependencias_arqParcela();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_arqParcela( '' );
g_idOperacao = 34;

if( parent.navegacao ) {
var Menu_1 = new Array( 1,"Baixar","","x",129,"","",1,"temMarcados()","1", "a_qbaixa", "parQBaixa", "Alterar", "", "", "", "", "5^^^p_parcela_baixar^^^^^^^^^^^^^^^^^^", "", 0,6,[129],[]);
parent.navegacao.MenuPrincQtdOpcoes=1;
}
