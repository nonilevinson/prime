/*=========================================================================
  a_grparc - GeraParc
=========================================================================*/

//------------------------------------------------------------
Campo_parGeraParc_Clinica.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Clinica()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Clinica", "Clinica", "Clinica", "arqClinica", "a_clini", null, "",31);
}

var Clinica = new Campo_parGeraParc_Clinica;

//------------------------------------------------------------
Campo_parGeraParc_Clinica_Clinica.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Clinica_Clinica()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Clinica_Clinica", "Clinica_Clinica", "Clinica", Clinica, 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Clinica_Clinica = new Campo_parGeraParc_Clinica_Clinica;

//------------------------------------------------------------
Campo_parGeraParc_Fornecedor.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Fornecedor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Fornecedor", "Fornecedor", "Fornecedor", "arqFornecedor", "a_fornec", null, "",42);
}

var Fornecedor = new Campo_parGeraParc_Fornecedor;

//------------------------------------------------------------
Campo_parGeraParc_Fornecedor_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Fornecedor_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Fornecedor_Nome", "Fornecedor_Nome", "Nome", Fornecedor, 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Fornecedor_Nome = new Campo_parGeraParc_Fornecedor_Nome;

//------------------------------------------------------------
Campo_parGeraParc_Pessoa.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Pessoa()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Pessoa", "Pessoa", "Pessoa", "arqPessoa", "a_pessoa", null, "",7);
}

var Pessoa = new Campo_parGeraParc_Pessoa;

//------------------------------------------------------------
Campo_parGeraParc_Pessoa_Nome.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Pessoa_Nome()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_Nome", "Pessoa_Nome", "Nome", Pessoa, 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Pessoa_Nome = new Campo_parGeraParc_Pessoa_Nome;

//------------------------------------------------------------
Campo_parGeraParc_Pessoa_NumCelular.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Pessoa_NumCelular()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Pessoa_NumCelular", "Pessoa_NumCelular", "NumCelular", Pessoa, 11, "(##) #.####.####", true);
}

var Pessoa_NumCelular = new Campo_parGeraParc_Pessoa_NumCelular;

//------------------------------------------------------------
Campo_parGeraParc_Documento.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Documento()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Documento", "Documento", "Documento", 13, "#.###.###.###.##z", true,"", "");
}

var Documento = new Campo_parGeraParc_Documento;

//------------------------------------------------------------
Campo_parGeraParc_TPgRec.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_TPgRec()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TPgRec", "TPgRec", "TPgRec", "tabTPgRec", "t_tpgre", null, "",0);
}

var TPgRec = new Campo_parGeraParc_TPgRec;

//------------------------------------------------------------
Campo_parGeraParc_TPgRec_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_TPgRec_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPgRec_Chave", "TPgRec_Chave", "TPgRec", TPgRec, 1, "u", false);
}

var TPgRec_Chave = new Campo_parGeraParc_TPgRec_Chave;

//------------------------------------------------------------
Campo_parGeraParc_TPgRec_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_TPgRec_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TPgRec_Descritor", "TPgRec_Descritor", "TPgRec", TPgRec, 7, "xxxxxxx", false);
}

var TPgRec_Descritor = new Campo_parGeraParc_TPgRec_Descritor;

//------------------------------------------------------------
Campo_parGeraParc_Emissao.prototype = new Lance_CampoData;

function Campo_parGeraParc_Emissao()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Emissao", "Emissao", "Emissao", 8, "dd/mm/aaaa", true);
}

var Emissao = new Campo_parGeraParc_Emissao;

//------------------------------------------------------------
Campo_parGeraParc_RecEnvia.prototype = new Lance_CampoData;

function Campo_parGeraParc_RecEnvia()
{
	this.superClass = Lance_CampoData;
	this.superClass( "RecEnvia", "RecEnvia", "RecEnvia", 8, "dd/mm/aaaa", true);
}

var RecEnvia = new Campo_parGeraParc_RecEnvia;

//------------------------------------------------------------
Campo_parGeraParc_Compete.prototype = new Lance_CampoData;

function Campo_parGeraParc_Compete()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Compete", "Compete", "Compete", 6, "mm/aaaa", true);
}

var Compete = new Campo_parGeraParc_Compete;

//------------------------------------------------------------
Campo_parGeraParc_Historico.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Historico()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Historico", "Historico", "Historico", 60, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Historico = new Campo_parGeraParc_Historico;

//------------------------------------------------------------
Campo_parGeraParc_Valor.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Valor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor", "Valor", "Valor", 11, "###.###.##z,zz", true,"", "");
}

var Valor = new Campo_parGeraParc_Valor;

//------------------------------------------------------------
Campo_parGeraParc_Estimado.prototype = new Lance_CampoLogico;

function Campo_parGeraParc_Estimado()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Estimado", "Estimado", "Estimado");
}

var Estimado = new Campo_parGeraParc_Estimado;

//------------------------------------------------------------
Campo_parGeraParc_Condicao.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Condicao()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Condicao", "Condicao", "Condicao", 3, "##z", true,"", "");
}

var Condicao = new Campo_parGeraParc_Condicao;

//------------------------------------------------------------
Campo_parGeraParc_Parcelas.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Parcelas()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Parcelas", "Parcelas", "Parcelas", 2, "#z", false,"", "");
}

var Parcelas = new Campo_parGeraParc_Parcelas;

//------------------------------------------------------------
Campo_parGeraParc_Iguais.prototype = new Lance_CampoLogico;

function Campo_parGeraParc_Iguais()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Iguais", "Iguais", "Iguais");
}

var Iguais = new Campo_parGeraParc_Iguais;

//------------------------------------------------------------
Campo_parGeraParc_Intervalo.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Intervalo()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Intervalo", "Intervalo", "Intervalo", 2, "#z", false,"", "");
}

var Intervalo = new Campo_parGeraParc_Intervalo;

//------------------------------------------------------------
Campo_parGeraParc_TFCobra.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_TFCobra()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TFCobra", "TFCobra", "TFCobra", "tabTFCobra", "t_tfcobr", null, "",0);
}

var TFCobra = new Campo_parGeraParc_TFCobra;

//------------------------------------------------------------
Campo_parGeraParc_TFCobra_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_TFCobra_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFCobra_Chave", "TFCobra_Chave", "TFCobra", TFCobra, 1, "u", false);
}

var TFCobra_Chave = new Campo_parGeraParc_TFCobra_Chave;

//------------------------------------------------------------
Campo_parGeraParc_TFCobra_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_TFCobra_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFCobra_Descritor", "TFCobra_Descritor", "TFCobra", TFCobra, 10, "xxxxxxxxxx", false);
}

var TFCobra_Descritor = new Campo_parGeraParc_TFCobra_Descritor;

//------------------------------------------------------------
Campo_parGeraParc_TFPagto.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_TFPagto()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TFPagto", "TFPagto", "TFPagto", "tabTFPagto", "t_tfpagt", null, "",0);
}

var TFPagto = new Campo_parGeraParc_TFPagto;

//------------------------------------------------------------
Campo_parGeraParc_TFPagto_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_TFPagto_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFPagto_Chave", "TFPagto_Chave", "TFPagto", TFPagto, 1, "u", false);
}

var TFPagto_Chave = new Campo_parGeraParc_TFPagto_Chave;

//------------------------------------------------------------
Campo_parGeraParc_TFPagto_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_TFPagto_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TFPagto_Descritor", "TFPagto_Descritor", "TFPagto", TFPagto, 8, "xxxxxxxx", false);
}

var TFPagto_Descritor = new Campo_parGeraParc_TFPagto_Descritor;

//------------------------------------------------------------
Campo_parGeraParc_TDetPg.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_TDetPg()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "TDetPg", "TDetPg", "TDetPg", "tabTDetPg", "t_tdetpg", null, "",0);
}

var TDetPg = new Campo_parGeraParc_TDetPg;

//------------------------------------------------------------
Campo_parGeraParc_TDetPg_Chave.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_TDetPg_Chave()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TDetPg_Chave", "TDetPg_Chave", "TDetPg", TDetPg, 1, "u", false);
}

var TDetPg_Chave = new Campo_parGeraParc_TDetPg_Chave;

//------------------------------------------------------------
Campo_parGeraParc_TDetPg_Descritor.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_TDetPg_Descritor()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "TDetPg_Descritor", "TDetPg_Descritor", "TDetPg", TDetPg, 14, "xxxxxxxxxxxxxx", false);
}

var TDetPg_Descritor = new Campo_parGeraParc_TDetPg_Descritor;

//------------------------------------------------------------
Campo_parGeraParc_CCor.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_CCor()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "CCor", "CCor", "CCor", "arqCCor", "a_ccor", null, "",20);
}

var CCor = new Campo_parGeraParc_CCor;

//------------------------------------------------------------
Campo_parGeraParc_CCor_Banco.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_CCor_Banco()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "CCor_Banco", "CCor_Banco", "Banco", "arqBanco", "a_banco", CCor, "",19);
}

var CCor_Banco = new Campo_parGeraParc_CCor_Banco;

//------------------------------------------------------------
Campo_parGeraParc_CCor_Banco_Num.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraParc_CCor_Banco_Num()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "CCor_Banco_Num", "CCor_Banco_Num", "Num", CCor_Banco, 3, "##z", true,"", "");
}

var CCor_Banco_Num = new Campo_parGeraParc_CCor_Banco_Num;

//------------------------------------------------------------
Campo_parGeraParc_CCor_Banco_Banco.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_CCor_Banco_Banco()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "CCor_Banco_Banco", "CCor_Banco_Banco", "Banco", 50, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var CCor_Banco_Banco = new Campo_parGeraParc_CCor_Banco_Banco;

//------------------------------------------------------------
Campo_parGeraParc_CCor_Agencia.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_CCor_Agencia()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "CCor_Agencia", "CCor_Agencia", "Agencia", CCor, 4, "uuuu", false);
}

var CCor_Agencia = new Campo_parGeraParc_CCor_Agencia;

//------------------------------------------------------------
Campo_parGeraParc_CCor_Conta.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_CCor_Conta()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "CCor_Conta", "CCor_Conta", "Conta", CCor, 10, "uuuuuuuuuu", false);
}

var CCor_Conta = new Campo_parGeraParc_CCor_Conta;

//------------------------------------------------------------
Campo_parGeraParc_Cheque.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Cheque()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Cheque", "Cheque", "Cheque", 6, "zzz.zzz", true,"", "");
}

var Cheque = new Campo_parGeraParc_Cheque;

//------------------------------------------------------------
Campo_parGeraParc_TotValor.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_TotValor()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "TotValor", "TotValor", "TotValor", 11, "###.###.##z,zz", true,"", "");
}

var TotValor = new Campo_parGeraParc_TotValor;

//------------------------------------------------------------
Campo_parGeraParc_Dia1.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Dia1()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Dia1", "Dia1", "Dia1", 3, "##z", true,"", "");
}

var Dia1 = new Campo_parGeraParc_Dia1;

//------------------------------------------------------------
Campo_parGeraParc_Venc1.prototype = new Lance_CampoData;

function Campo_parGeraParc_Venc1()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Venc1", "Venc1", "Venc1", 8, "dd/mm/aaaa", true);
}

var Venc1 = new Campo_parGeraParc_Venc1;

//------------------------------------------------------------
Campo_parGeraParc_Semana1.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Semana1()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Semana1", "Semana1", "Semana1", 13, "uxxxxxxxxxxxx", false);
}

var Semana1 = new Campo_parGeraParc_Semana1;

//------------------------------------------------------------
Campo_parGeraParc_Est1.prototype = new Lance_CampoLogico;

function Campo_parGeraParc_Est1()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Est1", "Est1", "Est1");
}

var Est1 = new Campo_parGeraParc_Est1;

//------------------------------------------------------------
Campo_parGeraParc_Valor1.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Valor1()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor1", "Valor1", "Valor1", 11, "###.###.##z,zz", true,"", "");
}

var Valor1 = new Campo_parGeraParc_Valor1;

//------------------------------------------------------------
Campo_parGeraParc_Perc1.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Perc1()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Perc1", "Perc1", "Perc1", 3, "##z", true,"", "");
}

var Perc1 = new Campo_parGeraParc_Perc1;

//------------------------------------------------------------
Campo_parGeraParc_Pg1.prototype = new Lance_CampoData;

function Campo_parGeraParc_Pg1()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Pg1", "Pg1", "Pg1", 8, "dd/mm/aaaa", true);
}

var Pg1 = new Campo_parGeraParc_Pg1;

//------------------------------------------------------------
Campo_parGeraParc_Cc1.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_Cc1()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Cc1", "Cc1", "Cc1", "arqSubPlano", "a_subpla", null, "",28);
}

var Cc1 = new Campo_parGeraParc_Cc1;

//------------------------------------------------------------
Campo_parGeraParc_Cc1_Plano.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Cc1_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cc1_Plano", "Cc1_Plano", "Plano", "arqPlano", "a_plano", Cc1, "",27);
}

var Cc1_Plano = new Campo_parGeraParc_Cc1_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc1_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraParc_Cc1_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Cc1_Plano_CodPlano", "Cc1_Plano_CodPlano", "CodPlano", Cc1_Plano, 2, "zz", false,"", "");
}

var Cc1_Plano_CodPlano = new Campo_parGeraParc_Cc1_Plano_CodPlano;

//------------------------------------------------------------
Campo_parGeraParc_Cc1_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc1_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc1_Plano_Plano", "Cc1_Plano_Plano", "Plano", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc1_Plano_Plano = new Campo_parGeraParc_Cc1_Plano_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc1_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Cc1_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cc1_Codigo", "Cc1_Codigo", "Codigo", Cc1, 6, "##.##.##", true);
}

var Cc1_Codigo = new Campo_parGeraParc_Cc1_Codigo;

//------------------------------------------------------------
Campo_parGeraParc_Cc1_Nome.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc1_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc1_Nome", "Cc1_Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc1_Nome = new Campo_parGeraParc_Cc1_Nome;

//------------------------------------------------------------
Campo_parGeraParc_Dia2.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Dia2()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Dia2", "Dia2", "Dia2", 3, "##z", true,"", "");
}

var Dia2 = new Campo_parGeraParc_Dia2;

//------------------------------------------------------------
Campo_parGeraParc_Venc2.prototype = new Lance_CampoData;

function Campo_parGeraParc_Venc2()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Venc2", "Venc2", "Venc2", 8, "dd/mm/aaaa", true);
}

var Venc2 = new Campo_parGeraParc_Venc2;

//------------------------------------------------------------
Campo_parGeraParc_Semana2.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Semana2()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Semana2", "Semana2", "Semana2", 13, "uxxxxxxxxxxxx", false);
}

var Semana2 = new Campo_parGeraParc_Semana2;

//------------------------------------------------------------
Campo_parGeraParc_Est2.prototype = new Lance_CampoLogico;

function Campo_parGeraParc_Est2()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Est2", "Est2", "Est2");
}

var Est2 = new Campo_parGeraParc_Est2;

//------------------------------------------------------------
Campo_parGeraParc_Valor2.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Valor2()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor2", "Valor2", "Valor2", 11, "###.###.##z,zz", true,"", "");
}

var Valor2 = new Campo_parGeraParc_Valor2;

//------------------------------------------------------------
Campo_parGeraParc_Perc2.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Perc2()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Perc2", "Perc2", "Perc2", 3, "##z", true,"", "");
}

var Perc2 = new Campo_parGeraParc_Perc2;

//------------------------------------------------------------
Campo_parGeraParc_Pg2.prototype = new Lance_CampoData;

function Campo_parGeraParc_Pg2()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Pg2", "Pg2", "Pg2", 8, "dd/mm/aaaa", true);
}

var Pg2 = new Campo_parGeraParc_Pg2;

//------------------------------------------------------------
Campo_parGeraParc_Cc2.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_Cc2()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Cc2", "Cc2", "Cc2", "arqSubPlano", "a_subpla", null, "",28);
}

var Cc2 = new Campo_parGeraParc_Cc2;

//------------------------------------------------------------
Campo_parGeraParc_Cc2_Plano.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Cc2_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cc2_Plano", "Cc2_Plano", "Plano", "arqPlano", "a_plano", Cc2, "",27);
}

var Cc2_Plano = new Campo_parGeraParc_Cc2_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc2_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraParc_Cc2_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Cc2_Plano_CodPlano", "Cc2_Plano_CodPlano", "CodPlano", Cc2_Plano, 2, "zz", false,"", "");
}

var Cc2_Plano_CodPlano = new Campo_parGeraParc_Cc2_Plano_CodPlano;

//------------------------------------------------------------
Campo_parGeraParc_Cc2_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc2_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc2_Plano_Plano", "Cc2_Plano_Plano", "Plano", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc2_Plano_Plano = new Campo_parGeraParc_Cc2_Plano_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc2_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Cc2_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cc2_Codigo", "Cc2_Codigo", "Codigo", Cc2, 6, "##.##.##", true);
}

var Cc2_Codigo = new Campo_parGeraParc_Cc2_Codigo;

//------------------------------------------------------------
Campo_parGeraParc_Cc2_Nome.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc2_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc2_Nome", "Cc2_Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc2_Nome = new Campo_parGeraParc_Cc2_Nome;

//------------------------------------------------------------
Campo_parGeraParc_Dia3.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Dia3()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Dia3", "Dia3", "Dia3", 3, "##z", true,"", "");
}

var Dia3 = new Campo_parGeraParc_Dia3;

//------------------------------------------------------------
Campo_parGeraParc_Venc3.prototype = new Lance_CampoData;

function Campo_parGeraParc_Venc3()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Venc3", "Venc3", "Venc3", 8, "dd/mm/aaaa", true);
}

var Venc3 = new Campo_parGeraParc_Venc3;

//------------------------------------------------------------
Campo_parGeraParc_Semana3.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Semana3()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Semana3", "Semana3", "Semana3", 13, "uxxxxxxxxxxxx", false);
}

var Semana3 = new Campo_parGeraParc_Semana3;

//------------------------------------------------------------
Campo_parGeraParc_Est3.prototype = new Lance_CampoLogico;

function Campo_parGeraParc_Est3()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Est3", "Est3", "Est3");
}

var Est3 = new Campo_parGeraParc_Est3;

//------------------------------------------------------------
Campo_parGeraParc_Valor3.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Valor3()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor3", "Valor3", "Valor3", 11, "###.###.##z,zz", true,"", "");
}

var Valor3 = new Campo_parGeraParc_Valor3;

//------------------------------------------------------------
Campo_parGeraParc_Perc3.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Perc3()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Perc3", "Perc3", "Perc3", 3, "##z", true,"", "");
}

var Perc3 = new Campo_parGeraParc_Perc3;

//------------------------------------------------------------
Campo_parGeraParc_Pg3.prototype = new Lance_CampoData;

function Campo_parGeraParc_Pg3()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Pg3", "Pg3", "Pg3", 8, "dd/mm/aaaa", true);
}

var Pg3 = new Campo_parGeraParc_Pg3;

//------------------------------------------------------------
Campo_parGeraParc_Cc3.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_Cc3()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Cc3", "Cc3", "Cc3", "arqSubPlano", "a_subpla", null, "",28);
}

var Cc3 = new Campo_parGeraParc_Cc3;

//------------------------------------------------------------
Campo_parGeraParc_Cc3_Plano.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Cc3_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cc3_Plano", "Cc3_Plano", "Plano", "arqPlano", "a_plano", Cc3, "",27);
}

var Cc3_Plano = new Campo_parGeraParc_Cc3_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc3_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraParc_Cc3_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Cc3_Plano_CodPlano", "Cc3_Plano_CodPlano", "CodPlano", Cc3_Plano, 2, "zz", false,"", "");
}

var Cc3_Plano_CodPlano = new Campo_parGeraParc_Cc3_Plano_CodPlano;

//------------------------------------------------------------
Campo_parGeraParc_Cc3_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc3_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc3_Plano_Plano", "Cc3_Plano_Plano", "Plano", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc3_Plano_Plano = new Campo_parGeraParc_Cc3_Plano_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc3_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Cc3_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cc3_Codigo", "Cc3_Codigo", "Codigo", Cc3, 6, "##.##.##", true);
}

var Cc3_Codigo = new Campo_parGeraParc_Cc3_Codigo;

//------------------------------------------------------------
Campo_parGeraParc_Cc3_Nome.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc3_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc3_Nome", "Cc3_Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc3_Nome = new Campo_parGeraParc_Cc3_Nome;

//------------------------------------------------------------
Campo_parGeraParc_Dia4.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Dia4()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Dia4", "Dia4", "Dia4", 3, "##z", true,"", "");
}

var Dia4 = new Campo_parGeraParc_Dia4;

//------------------------------------------------------------
Campo_parGeraParc_Venc4.prototype = new Lance_CampoData;

function Campo_parGeraParc_Venc4()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Venc4", "Venc4", "Venc4", 8, "dd/mm/aaaa", true);
}

var Venc4 = new Campo_parGeraParc_Venc4;

//------------------------------------------------------------
Campo_parGeraParc_Semana4.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Semana4()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Semana4", "Semana4", "Semana4", 13, "uxxxxxxxxxxxx", false);
}

var Semana4 = new Campo_parGeraParc_Semana4;

//------------------------------------------------------------
Campo_parGeraParc_Est4.prototype = new Lance_CampoLogico;

function Campo_parGeraParc_Est4()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Est4", "Est4", "Est4");
}

var Est4 = new Campo_parGeraParc_Est4;

//------------------------------------------------------------
Campo_parGeraParc_Valor4.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Valor4()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor4", "Valor4", "Valor4", 11, "###.###.##z,zz", true,"", "");
}

var Valor4 = new Campo_parGeraParc_Valor4;

//------------------------------------------------------------
Campo_parGeraParc_Perc4.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Perc4()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Perc4", "Perc4", "Perc4", 3, "##z", true,"", "");
}

var Perc4 = new Campo_parGeraParc_Perc4;

//------------------------------------------------------------
Campo_parGeraParc_Pg4.prototype = new Lance_CampoData;

function Campo_parGeraParc_Pg4()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Pg4", "Pg4", "Pg4", 8, "dd/mm/aaaa", true);
}

var Pg4 = new Campo_parGeraParc_Pg4;

//------------------------------------------------------------
Campo_parGeraParc_Cc4.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_Cc4()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Cc4", "Cc4", "Cc4", "arqSubPlano", "a_subpla", null, "",28);
}

var Cc4 = new Campo_parGeraParc_Cc4;

//------------------------------------------------------------
Campo_parGeraParc_Cc4_Plano.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Cc4_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cc4_Plano", "Cc4_Plano", "Plano", "arqPlano", "a_plano", Cc4, "",27);
}

var Cc4_Plano = new Campo_parGeraParc_Cc4_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc4_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraParc_Cc4_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Cc4_Plano_CodPlano", "Cc4_Plano_CodPlano", "CodPlano", Cc4_Plano, 2, "zz", false,"", "");
}

var Cc4_Plano_CodPlano = new Campo_parGeraParc_Cc4_Plano_CodPlano;

//------------------------------------------------------------
Campo_parGeraParc_Cc4_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc4_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc4_Plano_Plano", "Cc4_Plano_Plano", "Plano", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc4_Plano_Plano = new Campo_parGeraParc_Cc4_Plano_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc4_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Cc4_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cc4_Codigo", "Cc4_Codigo", "Codigo", Cc4, 6, "##.##.##", true);
}

var Cc4_Codigo = new Campo_parGeraParc_Cc4_Codigo;

//------------------------------------------------------------
Campo_parGeraParc_Cc4_Nome.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc4_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc4_Nome", "Cc4_Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc4_Nome = new Campo_parGeraParc_Cc4_Nome;

//------------------------------------------------------------
Campo_parGeraParc_Dia5.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Dia5()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Dia5", "Dia5", "Dia5", 3, "##z", true,"", "");
}

var Dia5 = new Campo_parGeraParc_Dia5;

//------------------------------------------------------------
Campo_parGeraParc_Venc5.prototype = new Lance_CampoData;

function Campo_parGeraParc_Venc5()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Venc5", "Venc5", "Venc5", 8, "dd/mm/aaaa", true);
}

var Venc5 = new Campo_parGeraParc_Venc5;

//------------------------------------------------------------
Campo_parGeraParc_Semana5.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Semana5()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Semana5", "Semana5", "Semana5", 13, "uxxxxxxxxxxxx", false);
}

var Semana5 = new Campo_parGeraParc_Semana5;

//------------------------------------------------------------
Campo_parGeraParc_Est5.prototype = new Lance_CampoLogico;

function Campo_parGeraParc_Est5()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Est5", "Est5", "Est5");
}

var Est5 = new Campo_parGeraParc_Est5;

//------------------------------------------------------------
Campo_parGeraParc_Valor5.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Valor5()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor5", "Valor5", "Valor5", 11, "###.###.##z,zz", true,"", "");
}

var Valor5 = new Campo_parGeraParc_Valor5;

//------------------------------------------------------------
Campo_parGeraParc_Perc5.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Perc5()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Perc5", "Perc5", "Perc5", 3, "##z", true,"", "");
}

var Perc5 = new Campo_parGeraParc_Perc5;

//------------------------------------------------------------
Campo_parGeraParc_Pg5.prototype = new Lance_CampoData;

function Campo_parGeraParc_Pg5()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Pg5", "Pg5", "Pg5", 8, "dd/mm/aaaa", true);
}

var Pg5 = new Campo_parGeraParc_Pg5;

//------------------------------------------------------------
Campo_parGeraParc_Cc5.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_Cc5()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Cc5", "Cc5", "Cc5", "arqSubPlano", "a_subpla", null, "",28);
}

var Cc5 = new Campo_parGeraParc_Cc5;

//------------------------------------------------------------
Campo_parGeraParc_Cc5_Plano.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Cc5_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cc5_Plano", "Cc5_Plano", "Plano", "arqPlano", "a_plano", Cc5, "",27);
}

var Cc5_Plano = new Campo_parGeraParc_Cc5_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc5_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraParc_Cc5_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Cc5_Plano_CodPlano", "Cc5_Plano_CodPlano", "CodPlano", Cc5_Plano, 2, "zz", false,"", "");
}

var Cc5_Plano_CodPlano = new Campo_parGeraParc_Cc5_Plano_CodPlano;

//------------------------------------------------------------
Campo_parGeraParc_Cc5_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc5_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc5_Plano_Plano", "Cc5_Plano_Plano", "Plano", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc5_Plano_Plano = new Campo_parGeraParc_Cc5_Plano_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc5_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Cc5_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cc5_Codigo", "Cc5_Codigo", "Codigo", Cc5, 6, "##.##.##", true);
}

var Cc5_Codigo = new Campo_parGeraParc_Cc5_Codigo;

//------------------------------------------------------------
Campo_parGeraParc_Cc5_Nome.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc5_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc5_Nome", "Cc5_Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc5_Nome = new Campo_parGeraParc_Cc5_Nome;

//------------------------------------------------------------
Campo_parGeraParc_Dia6.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Dia6()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Dia6", "Dia6", "Dia6", 3, "##z", true,"", "");
}

var Dia6 = new Campo_parGeraParc_Dia6;

//------------------------------------------------------------
Campo_parGeraParc_Venc6.prototype = new Lance_CampoData;

function Campo_parGeraParc_Venc6()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Venc6", "Venc6", "Venc6", 8, "dd/mm/aaaa", true);
}

var Venc6 = new Campo_parGeraParc_Venc6;

//------------------------------------------------------------
Campo_parGeraParc_Semana6.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Semana6()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Semana6", "Semana6", "Semana6", 13, "uxxxxxxxxxxxx", false);
}

var Semana6 = new Campo_parGeraParc_Semana6;

//------------------------------------------------------------
Campo_parGeraParc_Est6.prototype = new Lance_CampoLogico;

function Campo_parGeraParc_Est6()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Est6", "Est6", "Est6");
}

var Est6 = new Campo_parGeraParc_Est6;

//------------------------------------------------------------
Campo_parGeraParc_Valor6.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Valor6()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor6", "Valor6", "Valor6", 11, "###.###.##z,zz", true,"", "");
}

var Valor6 = new Campo_parGeraParc_Valor6;

//------------------------------------------------------------
Campo_parGeraParc_Perc6.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Perc6()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Perc6", "Perc6", "Perc6", 3, "##z", true,"", "");
}

var Perc6 = new Campo_parGeraParc_Perc6;

//------------------------------------------------------------
Campo_parGeraParc_Pg6.prototype = new Lance_CampoData;

function Campo_parGeraParc_Pg6()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Pg6", "Pg6", "Pg6", 8, "dd/mm/aaaa", true);
}

var Pg6 = new Campo_parGeraParc_Pg6;

//------------------------------------------------------------
Campo_parGeraParc_Cc6.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_Cc6()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Cc6", "Cc6", "Cc6", "arqSubPlano", "a_subpla", null, "",28);
}

var Cc6 = new Campo_parGeraParc_Cc6;

//------------------------------------------------------------
Campo_parGeraParc_Cc6_Plano.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Cc6_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cc6_Plano", "Cc6_Plano", "Plano", "arqPlano", "a_plano", Cc6, "",27);
}

var Cc6_Plano = new Campo_parGeraParc_Cc6_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc6_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraParc_Cc6_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Cc6_Plano_CodPlano", "Cc6_Plano_CodPlano", "CodPlano", Cc6_Plano, 2, "zz", false,"", "");
}

var Cc6_Plano_CodPlano = new Campo_parGeraParc_Cc6_Plano_CodPlano;

//------------------------------------------------------------
Campo_parGeraParc_Cc6_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc6_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc6_Plano_Plano", "Cc6_Plano_Plano", "Plano", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc6_Plano_Plano = new Campo_parGeraParc_Cc6_Plano_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc6_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Cc6_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cc6_Codigo", "Cc6_Codigo", "Codigo", Cc6, 6, "##.##.##", true);
}

var Cc6_Codigo = new Campo_parGeraParc_Cc6_Codigo;

//------------------------------------------------------------
Campo_parGeraParc_Cc6_Nome.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc6_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc6_Nome", "Cc6_Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc6_Nome = new Campo_parGeraParc_Cc6_Nome;

//------------------------------------------------------------
Campo_parGeraParc_Dia7.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Dia7()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Dia7", "Dia7", "Dia7", 3, "##z", true,"", "");
}

var Dia7 = new Campo_parGeraParc_Dia7;

//------------------------------------------------------------
Campo_parGeraParc_Venc7.prototype = new Lance_CampoData;

function Campo_parGeraParc_Venc7()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Venc7", "Venc7", "Venc7", 8, "dd/mm/aaaa", true);
}

var Venc7 = new Campo_parGeraParc_Venc7;

//------------------------------------------------------------
Campo_parGeraParc_Semana7.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Semana7()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Semana7", "Semana7", "Semana7", 13, "uxxxxxxxxxxxx", false);
}

var Semana7 = new Campo_parGeraParc_Semana7;

//------------------------------------------------------------
Campo_parGeraParc_Est7.prototype = new Lance_CampoLogico;

function Campo_parGeraParc_Est7()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Est7", "Est7", "Est7");
}

var Est7 = new Campo_parGeraParc_Est7;

//------------------------------------------------------------
Campo_parGeraParc_Valor7.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Valor7()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor7", "Valor7", "Valor7", 11, "###.###.##z,zz", true,"", "");
}

var Valor7 = new Campo_parGeraParc_Valor7;

//------------------------------------------------------------
Campo_parGeraParc_Perc7.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Perc7()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Perc7", "Perc7", "Perc7", 3, "##z", true,"", "");
}

var Perc7 = new Campo_parGeraParc_Perc7;

//------------------------------------------------------------
Campo_parGeraParc_Pg7.prototype = new Lance_CampoData;

function Campo_parGeraParc_Pg7()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Pg7", "Pg7", "Pg7", 8, "dd/mm/aaaa", true);
}

var Pg7 = new Campo_parGeraParc_Pg7;

//------------------------------------------------------------
Campo_parGeraParc_Cc7.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_Cc7()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Cc7", "Cc7", "Cc7", "arqSubPlano", "a_subpla", null, "",28);
}

var Cc7 = new Campo_parGeraParc_Cc7;

//------------------------------------------------------------
Campo_parGeraParc_Cc7_Plano.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Cc7_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cc7_Plano", "Cc7_Plano", "Plano", "arqPlano", "a_plano", Cc7, "",27);
}

var Cc7_Plano = new Campo_parGeraParc_Cc7_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc7_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraParc_Cc7_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Cc7_Plano_CodPlano", "Cc7_Plano_CodPlano", "CodPlano", Cc7_Plano, 2, "zz", false,"", "");
}

var Cc7_Plano_CodPlano = new Campo_parGeraParc_Cc7_Plano_CodPlano;

//------------------------------------------------------------
Campo_parGeraParc_Cc7_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc7_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc7_Plano_Plano", "Cc7_Plano_Plano", "Plano", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc7_Plano_Plano = new Campo_parGeraParc_Cc7_Plano_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc7_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Cc7_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cc7_Codigo", "Cc7_Codigo", "Codigo", Cc7, 6, "##.##.##", true);
}

var Cc7_Codigo = new Campo_parGeraParc_Cc7_Codigo;

//------------------------------------------------------------
Campo_parGeraParc_Cc7_Nome.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc7_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc7_Nome", "Cc7_Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc7_Nome = new Campo_parGeraParc_Cc7_Nome;

//------------------------------------------------------------
Campo_parGeraParc_Dia8.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Dia8()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Dia8", "Dia8", "Dia8", 3, "##z", true,"", "");
}

var Dia8 = new Campo_parGeraParc_Dia8;

//------------------------------------------------------------
Campo_parGeraParc_Venc8.prototype = new Lance_CampoData;

function Campo_parGeraParc_Venc8()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Venc8", "Venc8", "Venc8", 8, "dd/mm/aaaa", true);
}

var Venc8 = new Campo_parGeraParc_Venc8;

//------------------------------------------------------------
Campo_parGeraParc_Semana8.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Semana8()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Semana8", "Semana8", "Semana8", 13, "uxxxxxxxxxxxx", false);
}

var Semana8 = new Campo_parGeraParc_Semana8;

//------------------------------------------------------------
Campo_parGeraParc_Est8.prototype = new Lance_CampoLogico;

function Campo_parGeraParc_Est8()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Est8", "Est8", "Est8");
}

var Est8 = new Campo_parGeraParc_Est8;

//------------------------------------------------------------
Campo_parGeraParc_Valor8.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Valor8()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor8", "Valor8", "Valor8", 11, "###.###.##z,zz", true,"", "");
}

var Valor8 = new Campo_parGeraParc_Valor8;

//------------------------------------------------------------
Campo_parGeraParc_Perc8.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Perc8()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Perc8", "Perc8", "Perc8", 3, "##z", true,"", "");
}

var Perc8 = new Campo_parGeraParc_Perc8;

//------------------------------------------------------------
Campo_parGeraParc_Pg8.prototype = new Lance_CampoData;

function Campo_parGeraParc_Pg8()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Pg8", "Pg8", "Pg8", 8, "dd/mm/aaaa", true);
}

var Pg8 = new Campo_parGeraParc_Pg8;

//------------------------------------------------------------
Campo_parGeraParc_Cc8.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_Cc8()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Cc8", "Cc8", "Cc8", "arqSubPlano", "a_subpla", null, "",28);
}

var Cc8 = new Campo_parGeraParc_Cc8;

//------------------------------------------------------------
Campo_parGeraParc_Cc8_Plano.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Cc8_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cc8_Plano", "Cc8_Plano", "Plano", "arqPlano", "a_plano", Cc8, "",27);
}

var Cc8_Plano = new Campo_parGeraParc_Cc8_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc8_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraParc_Cc8_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Cc8_Plano_CodPlano", "Cc8_Plano_CodPlano", "CodPlano", Cc8_Plano, 2, "zz", false,"", "");
}

var Cc8_Plano_CodPlano = new Campo_parGeraParc_Cc8_Plano_CodPlano;

//------------------------------------------------------------
Campo_parGeraParc_Cc8_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc8_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc8_Plano_Plano", "Cc8_Plano_Plano", "Plano", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc8_Plano_Plano = new Campo_parGeraParc_Cc8_Plano_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc8_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Cc8_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cc8_Codigo", "Cc8_Codigo", "Codigo", Cc8, 6, "##.##.##", true);
}

var Cc8_Codigo = new Campo_parGeraParc_Cc8_Codigo;

//------------------------------------------------------------
Campo_parGeraParc_Cc8_Nome.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc8_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc8_Nome", "Cc8_Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc8_Nome = new Campo_parGeraParc_Cc8_Nome;

//------------------------------------------------------------
Campo_parGeraParc_Dia9.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Dia9()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Dia9", "Dia9", "Dia9", 3, "##z", true,"", "");
}

var Dia9 = new Campo_parGeraParc_Dia9;

//------------------------------------------------------------
Campo_parGeraParc_Venc9.prototype = new Lance_CampoData;

function Campo_parGeraParc_Venc9()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Venc9", "Venc9", "Venc9", 8, "dd/mm/aaaa", true);
}

var Venc9 = new Campo_parGeraParc_Venc9;

//------------------------------------------------------------
Campo_parGeraParc_Semana9.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Semana9()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Semana9", "Semana9", "Semana9", 13, "uxxxxxxxxxxxx", false);
}

var Semana9 = new Campo_parGeraParc_Semana9;

//------------------------------------------------------------
Campo_parGeraParc_Est9.prototype = new Lance_CampoLogico;

function Campo_parGeraParc_Est9()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Est9", "Est9", "Est9");
}

var Est9 = new Campo_parGeraParc_Est9;

//------------------------------------------------------------
Campo_parGeraParc_Valor9.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Valor9()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor9", "Valor9", "Valor9", 11, "###.###.##z,zz", true,"", "");
}

var Valor9 = new Campo_parGeraParc_Valor9;

//------------------------------------------------------------
Campo_parGeraParc_Perc9.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Perc9()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Perc9", "Perc9", "Perc9", 3, "##z", true,"", "");
}

var Perc9 = new Campo_parGeraParc_Perc9;

//------------------------------------------------------------
Campo_parGeraParc_Pg9.prototype = new Lance_CampoData;

function Campo_parGeraParc_Pg9()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Pg9", "Pg9", "Pg9", 8, "dd/mm/aaaa", true);
}

var Pg9 = new Campo_parGeraParc_Pg9;

//------------------------------------------------------------
Campo_parGeraParc_Cc9.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_Cc9()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Cc9", "Cc9", "Cc9", "arqSubPlano", "a_subpla", null, "",28);
}

var Cc9 = new Campo_parGeraParc_Cc9;

//------------------------------------------------------------
Campo_parGeraParc_Cc9_Plano.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Cc9_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cc9_Plano", "Cc9_Plano", "Plano", "arqPlano", "a_plano", Cc9, "",27);
}

var Cc9_Plano = new Campo_parGeraParc_Cc9_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc9_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraParc_Cc9_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Cc9_Plano_CodPlano", "Cc9_Plano_CodPlano", "CodPlano", Cc9_Plano, 2, "zz", false,"", "");
}

var Cc9_Plano_CodPlano = new Campo_parGeraParc_Cc9_Plano_CodPlano;

//------------------------------------------------------------
Campo_parGeraParc_Cc9_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc9_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc9_Plano_Plano", "Cc9_Plano_Plano", "Plano", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc9_Plano_Plano = new Campo_parGeraParc_Cc9_Plano_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc9_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Cc9_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cc9_Codigo", "Cc9_Codigo", "Codigo", Cc9, 6, "##.##.##", true);
}

var Cc9_Codigo = new Campo_parGeraParc_Cc9_Codigo;

//------------------------------------------------------------
Campo_parGeraParc_Cc9_Nome.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc9_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc9_Nome", "Cc9_Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc9_Nome = new Campo_parGeraParc_Cc9_Nome;

//------------------------------------------------------------
Campo_parGeraParc_Dia10.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Dia10()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Dia10", "Dia10", "Dia10", 3, "##z", true,"", "");
}

var Dia10 = new Campo_parGeraParc_Dia10;

//------------------------------------------------------------
Campo_parGeraParc_Venc10.prototype = new Lance_CampoData;

function Campo_parGeraParc_Venc10()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Venc10", "Venc10", "Venc10", 8, "dd/mm/aaaa", true);
}

var Venc10 = new Campo_parGeraParc_Venc10;

//------------------------------------------------------------
Campo_parGeraParc_Semana10.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Semana10()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Semana10", "Semana10", "Semana10", 13, "uxxxxxxxxxxxx", false);
}

var Semana10 = new Campo_parGeraParc_Semana10;

//------------------------------------------------------------
Campo_parGeraParc_Est10.prototype = new Lance_CampoLogico;

function Campo_parGeraParc_Est10()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Est10", "Est10", "Est10");
}

var Est10 = new Campo_parGeraParc_Est10;

//------------------------------------------------------------
Campo_parGeraParc_Valor10.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Valor10()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor10", "Valor10", "Valor10", 11, "###.###.##z,zz", true,"", "");
}

var Valor10 = new Campo_parGeraParc_Valor10;

//------------------------------------------------------------
Campo_parGeraParc_Perc10.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Perc10()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Perc10", "Perc10", "Perc10", 3, "##z", true,"", "");
}

var Perc10 = new Campo_parGeraParc_Perc10;

//------------------------------------------------------------
Campo_parGeraParc_Pg10.prototype = new Lance_CampoData;

function Campo_parGeraParc_Pg10()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Pg10", "Pg10", "Pg10", 8, "dd/mm/aaaa", true);
}

var Pg10 = new Campo_parGeraParc_Pg10;

//------------------------------------------------------------
Campo_parGeraParc_Cc10.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_Cc10()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Cc10", "Cc10", "Cc10", "arqSubPlano", "a_subpla", null, "",28);
}

var Cc10 = new Campo_parGeraParc_Cc10;

//------------------------------------------------------------
Campo_parGeraParc_Cc10_Plano.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Cc10_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cc10_Plano", "Cc10_Plano", "Plano", "arqPlano", "a_plano", Cc10, "",27);
}

var Cc10_Plano = new Campo_parGeraParc_Cc10_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc10_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraParc_Cc10_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Cc10_Plano_CodPlano", "Cc10_Plano_CodPlano", "CodPlano", Cc10_Plano, 2, "zz", false,"", "");
}

var Cc10_Plano_CodPlano = new Campo_parGeraParc_Cc10_Plano_CodPlano;

//------------------------------------------------------------
Campo_parGeraParc_Cc10_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc10_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc10_Plano_Plano", "Cc10_Plano_Plano", "Plano", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc10_Plano_Plano = new Campo_parGeraParc_Cc10_Plano_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc10_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Cc10_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cc10_Codigo", "Cc10_Codigo", "Codigo", Cc10, 6, "##.##.##", true);
}

var Cc10_Codigo = new Campo_parGeraParc_Cc10_Codigo;

//------------------------------------------------------------
Campo_parGeraParc_Cc10_Nome.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc10_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc10_Nome", "Cc10_Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc10_Nome = new Campo_parGeraParc_Cc10_Nome;

//------------------------------------------------------------
Campo_parGeraParc_Dia11.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Dia11()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Dia11", "Dia11", "Dia11", 3, "##z", true,"", "");
}

var Dia11 = new Campo_parGeraParc_Dia11;

//------------------------------------------------------------
Campo_parGeraParc_Venc11.prototype = new Lance_CampoData;

function Campo_parGeraParc_Venc11()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Venc11", "Venc11", "Venc11", 8, "dd/mm/aaaa", true);
}

var Venc11 = new Campo_parGeraParc_Venc11;

//------------------------------------------------------------
Campo_parGeraParc_Semana11.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Semana11()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Semana11", "Semana11", "Semana11", 13, "uxxxxxxxxxxxx", false);
}

var Semana11 = new Campo_parGeraParc_Semana11;

//------------------------------------------------------------
Campo_parGeraParc_Est11.prototype = new Lance_CampoLogico;

function Campo_parGeraParc_Est11()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Est11", "Est11", "Est11");
}

var Est11 = new Campo_parGeraParc_Est11;

//------------------------------------------------------------
Campo_parGeraParc_Valor11.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Valor11()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor11", "Valor11", "Valor11", 11, "###.###.##z,zz", true,"", "");
}

var Valor11 = new Campo_parGeraParc_Valor11;

//------------------------------------------------------------
Campo_parGeraParc_Perc11.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Perc11()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Perc11", "Perc11", "Perc11", 3, "##z", true,"", "");
}

var Perc11 = new Campo_parGeraParc_Perc11;

//------------------------------------------------------------
Campo_parGeraParc_Pg11.prototype = new Lance_CampoData;

function Campo_parGeraParc_Pg11()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Pg11", "Pg11", "Pg11", 8, "dd/mm/aaaa", true);
}

var Pg11 = new Campo_parGeraParc_Pg11;

//------------------------------------------------------------
Campo_parGeraParc_Cc11.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_Cc11()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Cc11", "Cc11", "Cc11", "arqSubPlano", "a_subpla", null, "",28);
}

var Cc11 = new Campo_parGeraParc_Cc11;

//------------------------------------------------------------
Campo_parGeraParc_Cc11_Plano.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Cc11_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cc11_Plano", "Cc11_Plano", "Plano", "arqPlano", "a_plano", Cc11, "",27);
}

var Cc11_Plano = new Campo_parGeraParc_Cc11_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc11_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraParc_Cc11_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Cc11_Plano_CodPlano", "Cc11_Plano_CodPlano", "CodPlano", Cc11_Plano, 2, "zz", false,"", "");
}

var Cc11_Plano_CodPlano = new Campo_parGeraParc_Cc11_Plano_CodPlano;

//------------------------------------------------------------
Campo_parGeraParc_Cc11_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc11_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc11_Plano_Plano", "Cc11_Plano_Plano", "Plano", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc11_Plano_Plano = new Campo_parGeraParc_Cc11_Plano_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc11_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Cc11_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cc11_Codigo", "Cc11_Codigo", "Codigo", Cc11, 6, "##.##.##", true);
}

var Cc11_Codigo = new Campo_parGeraParc_Cc11_Codigo;

//------------------------------------------------------------
Campo_parGeraParc_Cc11_Nome.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc11_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc11_Nome", "Cc11_Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc11_Nome = new Campo_parGeraParc_Cc11_Nome;

//------------------------------------------------------------
Campo_parGeraParc_Dia12.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Dia12()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Dia12", "Dia12", "Dia12", 3, "##z", true,"", "");
}

var Dia12 = new Campo_parGeraParc_Dia12;

//------------------------------------------------------------
Campo_parGeraParc_Venc12.prototype = new Lance_CampoData;

function Campo_parGeraParc_Venc12()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Venc12", "Venc12", "Venc12", 8, "dd/mm/aaaa", true);
}

var Venc12 = new Campo_parGeraParc_Venc12;

//------------------------------------------------------------
Campo_parGeraParc_Semana12.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Semana12()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Semana12", "Semana12", "Semana12", 13, "uxxxxxxxxxxxx", false);
}

var Semana12 = new Campo_parGeraParc_Semana12;

//------------------------------------------------------------
Campo_parGeraParc_Est12.prototype = new Lance_CampoLogico;

function Campo_parGeraParc_Est12()
{
	this.superClass = Lance_CampoLogico;
	this.superClass( "Est12", "Est12", "Est12");
}

var Est12 = new Campo_parGeraParc_Est12;

//------------------------------------------------------------
Campo_parGeraParc_Valor12.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Valor12()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Valor12", "Valor12", "Valor12", 11, "###.###.##z,zz", true,"", "");
}

var Valor12 = new Campo_parGeraParc_Valor12;

//------------------------------------------------------------
Campo_parGeraParc_Perc12.prototype = new Lance_CampoNumerico;

function Campo_parGeraParc_Perc12()
{
	this.superClass = Lance_CampoNumerico;
	this.superClass( "Perc12", "Perc12", "Perc12", 3, "##z", true,"", "");
}

var Perc12 = new Campo_parGeraParc_Perc12;

//------------------------------------------------------------
Campo_parGeraParc_Pg12.prototype = new Lance_CampoData;

function Campo_parGeraParc_Pg12()
{
	this.superClass = Lance_CampoData;
	this.superClass( "Pg12", "Pg12", "Pg12", 8, "dd/mm/aaaa", true);
}

var Pg12 = new Campo_parGeraParc_Pg12;

//------------------------------------------------------------
Campo_parGeraParc_Cc12.prototype = new Lance_CampoLigado;

function Campo_parGeraParc_Cc12()
{
	this.superClass = Lance_CampoLigado;
	this.superClass( "Cc12", "Cc12", "Cc12", "arqSubPlano", "a_subpla", null, "",28);
}

var Cc12 = new Campo_parGeraParc_Cc12;

//------------------------------------------------------------
Campo_parGeraParc_Cc12_Plano.prototype = new Lance_CampoHidden;

function Campo_parGeraParc_Cc12_Plano()
{
	this.superClass = Lance_CampoHidden;
	this.superClass( "Cc12_Plano", "Cc12_Plano", "Plano", "arqPlano", "a_plano", Cc12, "",27);
}

var Cc12_Plano = new Campo_parGeraParc_Cc12_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc12_Plano_CodPlano.prototype = new Lance_CampoNumericoLigado;

function Campo_parGeraParc_Cc12_Plano_CodPlano()
{
	this.superClass = Lance_CampoNumericoLigado;
	this.superClass( "Cc12_Plano_CodPlano", "Cc12_Plano_CodPlano", "CodPlano", Cc12_Plano, 2, "zz", false,"", "");
}

var Cc12_Plano_CodPlano = new Campo_parGeraParc_Cc12_Plano_CodPlano;

//------------------------------------------------------------
Campo_parGeraParc_Cc12_Plano_Plano.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc12_Plano_Plano()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc12_Plano_Plano", "Cc12_Plano_Plano", "Plano", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc12_Plano_Plano = new Campo_parGeraParc_Cc12_Plano_Plano;

//------------------------------------------------------------
Campo_parGeraParc_Cc12_Codigo.prototype = new Lance_CampoCadeiaLigado;

function Campo_parGeraParc_Cc12_Codigo()
{
	this.superClass = Lance_CampoCadeiaLigado;
	this.superClass( "Cc12_Codigo", "Cc12_Codigo", "Codigo", Cc12, 6, "##.##.##", true);
}

var Cc12_Codigo = new Campo_parGeraParc_Cc12_Codigo;

//------------------------------------------------------------
Campo_parGeraParc_Cc12_Nome.prototype = new Lance_CampoCadeia;

function Campo_parGeraParc_Cc12_Nome()
{
	this.superClass = Lance_CampoCadeia;
	this.superClass( "Cc12_Nome", "Cc12_Nome", "Nome", 30, "uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", false);
}

var Cc12_Nome = new Campo_parGeraParc_Cc12_Nome;

//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parGeraParc_Clinica.prototype.FiltroPai = function()
{
		if( g_temMaisDeUmClinica )
			return( "A.idPrimario in ( " + g_vetIdClinica + " )" );
			return( "A.Ativo = 1" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Clinica.prototype.Obrigatorio = function( p_comMsg )
{
		if( ultimaLigOpcaoEm( 130 ) )
	{
		if( p_comMsg ) alert( "A clínica é obrigatória" );
		return( true );
	}
	return( false );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Clinica_Clinica.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Clinica.Obrigatorio( p_comMsg ) );
}

Clinica_Clinica.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Fornecedor_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Fornecedor.Obrigatorio( p_comMsg ) );
}

Fornecedor_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição de erro do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pessoa.prototype.TemErro = function()
{
		if( !tem( Pessoa_Nome ) && !tem( Fornecedor_Nome ) )
	{
		alert( "Informe um paciente ou um fornecedor" );
		return( true );
	}
	return( Lance_CampoCadeia.prototype.TemErro.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pessoa.prototype.Existencia = function()
{
	return( !tem( Fornecedor_Nome ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pessoa_Nome.prototype.Existencia = function()
{
	return( !tem( Fornecedor_Nome ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pessoa_NumCelular.prototype.Existencia = function()
{
	return( !tem( Fornecedor_Nome ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pessoa_Nome.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_Nome.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pessoa_NumCelular.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Pessoa.Obrigatorio( p_comMsg ) );
}

Pessoa_NumCelular.TipoCampo |= CAMPO_CHAVE_PAI;
TPgRec_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TPgRec_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Emissao.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A data da emissão é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Compete.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( dataMes( Emissao ) + "/" + dataAno( Emissao ) ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Valor.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O valor é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Estimado.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Parcelas.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A quantidade de parcelas é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Iguais.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 1 ) );
}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_parGeraParc_Iguais.prototype.PodeAlterar = function()
{
		if( ( Parcelas > 1 ) )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Intervalo.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Condicao ) );
}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_parGeraParc_Intervalo.prototype.PodeAlterar = function()
{
		if( ( Parcelas > 1 ) )
		return( true );
	return( false );
}

TFCobra_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TFCobra_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_TFPagto.prototype.Existencia = function()
{
	return( tem( TFCobra ) );
}

TFPagto_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TFPagto_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_TDetPg.prototype.Obrigatorio = function( p_comMsg )
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
Campo_parGeraParc_TDetPg.prototype.Existencia = function()
{
	return( tem( TFPagto ) );
}

TDetPg_Chave.TipoCampo |= CAMPO_CHAVE_PAI;
TDetPg_Descritor.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Fitro para selecionar registros do pai
//-------------------------------------------------------------
Campo_parGeraParc_CCor.prototype.FiltroPai = function()
{
			return( "A.Ativo = 1" );
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_CCor.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "A conta corrente é obrigatória" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_CCor.prototype.Existencia = function()
{
	return( TFPagto == 1 && tem( TDetPg ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_CCor_Banco.prototype.Existencia = function()
{
	return( TFPagto == 1 && tem( TDetPg ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_CCor_Banco_Num.prototype.Existencia = function()
{
	return( TFPagto == 1 && tem( TDetPg ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_CCor_Agencia.prototype.Existencia = function()
{
	return( TFPagto == 1 && tem( TDetPg ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_CCor_Conta.prototype.Existencia = function()
{
	return( TFPagto == 1 && tem( TDetPg ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_CCor_Banco.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( CCor.Obrigatorio( p_comMsg ) );
}

CCor_Banco.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_CCor_Banco_Num.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( CCor.Obrigatorio( p_comMsg ) );
}

CCor_Banco_Num.TipoCampo |= CAMPO_CHAVE_PAI;
CCor_Banco_Banco.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_CCor_Agencia.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( CCor.Obrigatorio( p_comMsg ) );
}

CCor_Agencia.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_CCor_Conta.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( CCor.Obrigatorio( p_comMsg ) );
}

CCor_Conta.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Cheque.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O número do cheque é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cheque.prototype.Existencia = function()
{
	return( TFPagto == 1 && TDetPg == 1 );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_parGeraParc_TotValor.prototype.Calculou = function()
{
{
	return( this.Atribuiu( Valor1+Valor2+Valor3+Valor4+Valor5+Valor6+Valor7+Valor8+Valor9+Valor10+Valor11+Valor12 ) );
}
}

TotValor.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia1.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Condicao ) );
}
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc1.prototype.PosCampo = function()
{
	{
		alt( Dia1, quantosDias( Venc1, Emissao ) );
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc1.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( incDia( Emissao, Dia1 ) ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Venc1.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O 1° vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc1.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( Venc1 ) ) )
	{
		return( !confirm( "Esse não é um dia útil. Continua?" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana1.prototype.Calculou = function()
{
{
	return( this.Atribuiu( diaDaSemanaExtenso( Venc1 ) ) );
}
}

Semana1.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est1.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor1.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Valor / Parcelas ) );
}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_parGeraParc_Valor1.prototype.PodeAlterar = function()
{
		if( ( Parcelas > 1 ) )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor1.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( TotValor > Valor ) )
	{
		return( !confirm( "O valor das parcelas ultrapassa o valor da conta" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor1.prototype.Existencia = function()
{
	return( Iguais == false );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc1.prototype.PosCampo = function()
{
		if( Perc1 != Math.round( 100*Valor1/Valor ) )
	{
		alt( Valor1, Valor*Perc1/100 );
	}
	return( true );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc1.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Math.round( 100*Valor1/Valor ) ) );
}
}

//-------------------------------------------------------------
// Campo pode ser alterado?
//-------------------------------------------------------------
Campo_parGeraParc_Perc1.prototype.PodeAlterar = function()
{
		if( ( Parcelas > 1 ) )
		return( true );
	return( false );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc1.prototype.Existencia = function()
{
	return( Iguais == false );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pg1.prototype.Existencia = function()
{
	return( tem( TFPagto ) && TFPagto != 1 );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc1_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc1.Obrigatorio( p_comMsg ) );
}

Cc1_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc1_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc1.Obrigatorio( p_comMsg ) );
}

Cc1_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
Cc1_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc1_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc1.Obrigatorio( p_comMsg ) );
}

Cc1_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
Cc1_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia2.prototype.Sugeriu = function()
{
{
		if( Intervalo > 0 )
	return( this.AtribuiuSemCritica( Dia1 + Intervalo ) );
}
		return( true );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia2.prototype.Existencia = function()
{
	return( Parcelas > 1 );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc2.prototype.PosCampo = function()
{
	{
		alt(Dia2,quantosDias(Venc2,Emissao));
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc2.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( incDia( Emissao, Dia2 ) ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Venc2.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O 2° vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc2.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( Venc2 ) ) )
	{
		return( !confirm( "Esse não é um dia util, confirma?" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc2.prototype.Existencia = function()
{
	return( Parcelas > 1 );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana2.prototype.Calculou = function()
{
{
	return( this.Atribuiu( diaDaSemanaExtenso( Venc2 ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana2.prototype.Existencia = function()
{
	return( tem( Venc2 ) );
}

Semana2.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est2.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est2.prototype.Existencia = function()
{
	return( tem( Venc2 ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor2.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( (Valor-Valor1)/(Parcelas-1) ) );
}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor2.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( TotValor > Valor ) )
	{
		return( !confirm( "O valor das parcelas ultrapassa o valor da conta" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor2.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 1 ) );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc2.prototype.PosCampo = function()
{
		if( Perc2 != Math.round( 100*Valor2/Valor ) )
	{
		alt( Valor2, Valor*Perc2/100 );
	}
	return( true );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc2.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Math.round( 100*Valor2/Valor ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc2.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pg2.prototype.Existencia = function()
{
	return( Parcelas > 1 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc2.prototype.Existencia = function()
{
	return( Parcelas > 1 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc2_Plano.prototype.Existencia = function()
{
	return( Parcelas > 1 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc2_Plano_CodPlano.prototype.Existencia = function()
{
	return( Parcelas > 1 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc2_Codigo.prototype.Existencia = function()
{
	return( Parcelas > 1 );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc2_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc2.Obrigatorio( p_comMsg ) );
}

Cc2_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc2_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc2.Obrigatorio( p_comMsg ) );
}

Cc2_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
Cc2_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc2_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc2.Obrigatorio( p_comMsg ) );
}

Cc2_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
Cc2_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia3.prototype.Sugeriu = function()
{
{
		if( Intervalo > 0 )
	return( this.AtribuiuSemCritica( Dia2 + Intervalo ) );
}
		return( true );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia3.prototype.Existencia = function()
{
	return( Parcelas > 2 );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc3.prototype.PosCampo = function()
{
	{
		alt(Dia3,quantosDias(Venc3,Emissao));
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc3.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( incDia( Emissao, Dia3 ) ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Venc3.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O 3° vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc3.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( Venc3 ) ) )
	{
		return( !confirm( "Esse não é um dia útil. Continua?" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc3.prototype.Existencia = function()
{
	return( Parcelas > 2 );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana3.prototype.Calculou = function()
{
{
	return( this.Atribuiu( diaDaSemanaExtenso( Venc3 ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana3.prototype.Existencia = function()
{
	return( tem( Venc3 ) );
}

Semana3.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est3.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est3.prototype.Existencia = function()
{
	return( tem( Venc3 ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor3.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( (Valor-Valor1-Valor2)/(Parcelas-2) ) );
}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor3.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( TotValor > Valor ) )
	{
		return( !confirm( "O valor das parcelas ultrapassa o valor da conta" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor3.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 2 ) );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc3.prototype.PosCampo = function()
{
		if( Perc3 != Math.round( 100*Valor3/Valor ) )
	{
		alt( Valor3, Valor*Perc3/100 );
	}
	return( true );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc3.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Math.round( 100*Valor3/Valor ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc3.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 2 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pg3.prototype.Existencia = function()
{
	return( Parcelas > 2 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc3.prototype.Existencia = function()
{
	return( Parcelas > 2 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc3_Plano.prototype.Existencia = function()
{
	return( Parcelas > 2 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc3_Plano_CodPlano.prototype.Existencia = function()
{
	return( Parcelas > 2 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc3_Codigo.prototype.Existencia = function()
{
	return( Parcelas > 2 );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc3_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc3.Obrigatorio( p_comMsg ) );
}

Cc3_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc3_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc3.Obrigatorio( p_comMsg ) );
}

Cc3_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
Cc3_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc3_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc3.Obrigatorio( p_comMsg ) );
}

Cc3_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
Cc3_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia4.prototype.Sugeriu = function()
{
{
		if( Intervalo > 0 )
	return( this.AtribuiuSemCritica( Dia3 + Intervalo ) );
}
		return( true );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia4.prototype.Existencia = function()
{
	return( Parcelas > 3 );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc4.prototype.PosCampo = function()
{
	{
		alt(Dia4,quantosDias(Venc4,Emissao));
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc4.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( incDia( Emissao, Dia4 ) ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Venc4.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O 4° vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc4.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( Venc4 ) ) )
	{
		return( !confirm( "Esse não é um dia útil. Continua?" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc4.prototype.Existencia = function()
{
	return( Parcelas > 3 );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana4.prototype.Calculou = function()
{
{
	return( this.Atribuiu( diaDaSemanaExtenso( Venc4 ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana4.prototype.Existencia = function()
{
	return( tem( Venc4 ) );
}

Semana4.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est4.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est4.prototype.Existencia = function()
{
	return( tem( Venc4 ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor4.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( (Valor-Valor1-Valor2-Valor3)/(Parcelas-3) ) );
}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor4.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( TotValor > Valor ) )
	{
		return( !confirm( "O valor das parcelas ultrapassa o valor da conta" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor4.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 3 ) );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc4.prototype.PosCampo = function()
{
		if( Perc4 != Math.round( 100*Valor4/Valor ) )
	{
		alt( Valor4, Valor*Perc4/100 );
	}
	return( true );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc4.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Math.round( 100*Valor4/Valor ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc4.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 3 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pg4.prototype.Existencia = function()
{
	return( Parcelas > 3 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc4.prototype.Existencia = function()
{
	return( Parcelas > 3 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc4_Plano.prototype.Existencia = function()
{
	return( Parcelas > 3 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc4_Plano_CodPlano.prototype.Existencia = function()
{
	return( Parcelas > 3 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc4_Codigo.prototype.Existencia = function()
{
	return( Parcelas > 3 );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc4_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc4.Obrigatorio( p_comMsg ) );
}

Cc4_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc4_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc4.Obrigatorio( p_comMsg ) );
}

Cc4_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
Cc4_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc4_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc4.Obrigatorio( p_comMsg ) );
}

Cc4_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
Cc4_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia5.prototype.Sugeriu = function()
{
{
		if( Intervalo > 0 )
	return( this.AtribuiuSemCritica( Dia4 + Intervalo ) );
}
		return( true );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia5.prototype.Existencia = function()
{
	return( Parcelas > 4 );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc5.prototype.PosCampo = function()
{
	{
		alt(Dia5,quantosDias(Venc5,DiaInterv));
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc5.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( incDia( Emissao, Dia5 ) ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Venc5.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O 5° vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc5.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( Venc5 ) ) )
	{
		return( !confirm( "Esse não é um dia útil. Continua?" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc5.prototype.Existencia = function()
{
	return( Parcelas > 4 );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana5.prototype.Calculou = function()
{
{
	return( this.Atribuiu( diaDaSemanaExtenso( Venc5 ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana5.prototype.Existencia = function()
{
	return( tem( Venc5 ) );
}

Semana5.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est5.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est5.prototype.Existencia = function()
{
	return( tem( Venc5 ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor5.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( (Valor-Valor1-Valor2-Valor3-Valor4)/(Parcelas-4) ) );
}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor5.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( TotValor > Valor ) )
	{
		return( !confirm( "O valor das parcelas ultrapassa o valor da conta" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor5.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 4 ) );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc5.prototype.PosCampo = function()
{
		if( Perc5 != Math.round( 100*Valor5/Valor ) )
	{
		alt( Valor5, Valor*Perc5/100 );
	}
	return( true );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc5.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Math.round( 100*Valor5/Valor ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc5.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 4 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pg5.prototype.Existencia = function()
{
	return( Parcelas > 4 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc5.prototype.Existencia = function()
{
	return( Parcelas > 4 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc5_Plano.prototype.Existencia = function()
{
	return( Parcelas > 4 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc5_Plano_CodPlano.prototype.Existencia = function()
{
	return( Parcelas > 4 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc5_Codigo.prototype.Existencia = function()
{
	return( Parcelas > 4 );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc5_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc5.Obrigatorio( p_comMsg ) );
}

Cc5_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc5_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc5.Obrigatorio( p_comMsg ) );
}

Cc5_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
Cc5_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc5_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc5.Obrigatorio( p_comMsg ) );
}

Cc5_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
Cc5_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia6.prototype.Sugeriu = function()
{
{
		if( Intervalo > 0 )
	return( this.AtribuiuSemCritica( Dia5 + Intervalo ) );
}
		return( true );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia6.prototype.Existencia = function()
{
	return( Parcelas > 5 );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc6.prototype.PosCampo = function()
{
	{
		alt(Dia6,quantosDias(Venc6,Emissao));
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc6.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( incDia( Emissao, Dia6 ) ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Venc6.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O 6° vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc6.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( Venc6 ) ) )
	{
		return( !confirm( "Esse não é um dia útil. Contunia?" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc6.prototype.Existencia = function()
{
	return( Parcelas > 5 );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana6.prototype.Calculou = function()
{
{
	return( this.Atribuiu( diaDaSemanaExtenso( Venc6 ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana6.prototype.Existencia = function()
{
	return( tem( Venc6 ) );
}

Semana6.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est6.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est6.prototype.Existencia = function()
{
	return( tem( Venc6 ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor6.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( (Valor-Valor1-Valor2-Valor3-Valor4-Valor5)/(Parcelas-5) ) );
}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor6.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( TotValor > Valor ) )
	{
		return( !confirm( "O valor das parcelas ultrapassa o valor da conta" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor6.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 5 ) );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc6.prototype.PosCampo = function()
{
		if( Perc6 != Math.round( 100*Valor6/Valor ) )
	{
		alt( Valor6, Valor*Perc6/100 );
	}
	return( true );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc6.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Math.round( 100*Valor6/Valor ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc6.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 5 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pg6.prototype.Existencia = function()
{
	return( Parcelas > 5 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc6.prototype.Existencia = function()
{
	return( Parcelas > 5 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc6_Plano.prototype.Existencia = function()
{
	return( Parcelas > 5 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc6_Plano_CodPlano.prototype.Existencia = function()
{
	return( Parcelas > 5 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc6_Codigo.prototype.Existencia = function()
{
	return( Parcelas > 5 );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc6_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc6.Obrigatorio( p_comMsg ) );
}

Cc6_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc6_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc6.Obrigatorio( p_comMsg ) );
}

Cc6_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
Cc6_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc6_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc6.Obrigatorio( p_comMsg ) );
}

Cc6_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
Cc6_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia7.prototype.Sugeriu = function()
{
{
		if( Intervalo > 0 )
	return( this.AtribuiuSemCritica( Dia6 + Intervalo ) );
}
		return( true );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia7.prototype.Existencia = function()
{
	return( Parcelas > 6 );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc7.prototype.PosCampo = function()
{
	{
		alt(Dia7,quantosDias(Venc7,Emissao));
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc7.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( incDia( Emissao, Dia7 ) ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Venc7.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O 7° vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc7.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( Venc7 ) ) )
	{
		return( !confirm( "Esse não é um útil. Continua?" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc7.prototype.Existencia = function()
{
	return( Parcelas > 6 );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana7.prototype.Calculou = function()
{
{
	return( this.Atribuiu( diaDaSemanaExtenso( Venc7 ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana7.prototype.Existencia = function()
{
	return( tem( Venc7 ) );
}

Semana7.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est7.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est7.prototype.Existencia = function()
{
	return( tem( Venc7 ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor7.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( (Valor-Valor1-Valor2-Valor3-Valor4-Valor5-Valor6)/(Parcelas-6) ) );
}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor7.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( TotValor > Valor ) )
	{
		return( !confirm( "O valor das parcelas ultrapassa o valor da conta" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor7.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 6 ) );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc7.prototype.PosCampo = function()
{
		if( Perc7 != Math.round( 100*Valor7/Valor ) )
	{
		alt( Valor7, Valor*Perc7/100 );
	}
	return( true );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc7.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Math.round( 100*Valor7/Valor ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc7.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 6 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pg7.prototype.Existencia = function()
{
	return( Parcelas > 7 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc7.prototype.Existencia = function()
{
	return( Parcelas > 6 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc7_Plano.prototype.Existencia = function()
{
	return( Parcelas > 6 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc7_Plano_CodPlano.prototype.Existencia = function()
{
	return( Parcelas > 6 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc7_Codigo.prototype.Existencia = function()
{
	return( Parcelas > 6 );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc7_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc7.Obrigatorio( p_comMsg ) );
}

Cc7_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc7_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc7.Obrigatorio( p_comMsg ) );
}

Cc7_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
Cc7_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc7_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc7.Obrigatorio( p_comMsg ) );
}

Cc7_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
Cc7_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia8.prototype.Sugeriu = function()
{
{
		if( Intervalo > 0 )
	return( this.AtribuiuSemCritica( Dia7 + Intervalo ) );
}
		return( true );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia8.prototype.Existencia = function()
{
	return( Parcelas > 7 );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc8.prototype.PosCampo = function()
{
	{
		alt( Dia8, quantosDias( Venc8, Emissao) );
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc8.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( incDia( Emissao, Dia8 ) ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Venc8.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O 8° vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc8.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( Venc8 ) ) )
	{
		return( !confirm( "Esse não é um útil. Continua?" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc8.prototype.Existencia = function()
{
	return( Parcelas > 7 );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana8.prototype.Calculou = function()
{
{
	return( this.Atribuiu( diaDaSemanaExtenso( Venc8 ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana8.prototype.Existencia = function()
{
	return( tem( Venc8 ) );
}

Semana8.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est8.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est8.prototype.Existencia = function()
{
	return( tem( Venc8 ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor8.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( (Valor-Valor1-Valor2-Valor3-Valor4-Valor5-Valor6-Valor7)/(Parcelas-7) ) );
}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor8.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( TotValor > Valor ) )
	{
		return( !confirm( "O valor das parcelas ultrapassa o valor da conta" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor8.prototype.Existencia = function()
{
	return( ( Iguais == false )  &&  ( Parcelas > 7 ) );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc8.prototype.PosCampo = function()
{
		if( Perc8 != Math.round( 100*Valor8/Valor ) )
	{
		alt( Valor8, Valor*Perc8/100 );
	}
	return( true );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc8.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Math.round( 100*Valor8/Valor ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc8.prototype.Existencia = function()
{
	return( ( Iguais == false )  &&  ( Parcelas > 7 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pg8.prototype.Existencia = function()
{
	return( Parcelas > 7 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc8.prototype.Existencia = function()
{
	return( Parcelas > 7 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc8_Plano.prototype.Existencia = function()
{
	return( Parcelas > 7 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc8_Plano_CodPlano.prototype.Existencia = function()
{
	return( Parcelas > 7 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc8_Codigo.prototype.Existencia = function()
{
	return( Parcelas > 7 );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc8_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc8.Obrigatorio( p_comMsg ) );
}

Cc8_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc8_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc8.Obrigatorio( p_comMsg ) );
}

Cc8_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
Cc8_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc8_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc8.Obrigatorio( p_comMsg ) );
}

Cc8_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
Cc8_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia9.prototype.Sugeriu = function()
{
{
		if( Intervalo > 0 )
	return( this.AtribuiuSemCritica( Dia8 + Intervalo ) );
}
		return( true );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia9.prototype.Existencia = function()
{
	return( Parcelas > 8 );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc9.prototype.PosCampo = function()
{
	{
		alt(Dia9,quantosDias(Venc9,Emissao));
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc9.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( incDia( Emissao, Dia9 ) ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Venc9.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O 9° vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc9.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( Venc9 ) ) )
	{
		return( !confirm( "Esse não é um útil. Continua?" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc9.prototype.Existencia = function()
{
	return( Parcelas > 8 );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana9.prototype.Calculou = function()
{
{
	return( this.Atribuiu( diaDaSemanaExtenso( Venc9 ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana9.prototype.Existencia = function()
{
	return( Parcelas > 8 );
}

Semana9.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est9.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est9.prototype.Existencia = function()
{
	return( Parcelas > 8 );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor9.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( (Valor-Valor1-Valor2-Valor3-Valor4-Valor5-Valor6-Valor7-Valor8)/(Parcelas-8) ) );
}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor9.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( TotValor > Valor ) )
	{
		return( !confirm( "O valor das parcelas ultrapassa o valor da conta" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor9.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 8 ) );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc9.prototype.PosCampo = function()
{
		if( Perc9 != Math.round( 100*Valor9/Valor ) )
	{
		alt( Valor9, Valor*Perc9/100 );
	}
	return( true );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc9.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Math.round( 100*Valor9/Valor ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc9.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 8 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pg9.prototype.Existencia = function()
{
	return( Parcelas > 8 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc9.prototype.Existencia = function()
{
	return( Parcelas > 8 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc9_Plano.prototype.Existencia = function()
{
	return( Parcelas > 8 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc9_Plano_CodPlano.prototype.Existencia = function()
{
	return( Parcelas > 8 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc9_Codigo.prototype.Existencia = function()
{
	return( Parcelas > 8 );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc9_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc9.Obrigatorio( p_comMsg ) );
}

Cc9_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc9_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc9.Obrigatorio( p_comMsg ) );
}

Cc9_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
Cc9_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc9_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc9.Obrigatorio( p_comMsg ) );
}

Cc9_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
Cc9_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia10.prototype.Sugeriu = function()
{
{
		if( Intervalo > 0 )
	return( this.AtribuiuSemCritica( Dia9 + Intervalo ) );
}
		return( true );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia10.prototype.Existencia = function()
{
	return( Parcelas > 9 );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc10.prototype.PosCampo = function()
{
	{
		alt(Dia10,quantosDias(Venc10,DiaInterv));
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc10.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( incDia( DiaInterv, Dia10 ) ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Venc10.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O 10° vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc10.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( Venc10 ) ) )
	{
		return( !confirm( "Esse não é um útil. Continua?" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc10.prototype.Existencia = function()
{
	return( Parcelas > 9 );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana10.prototype.Calculou = function()
{
{
	return( this.Atribuiu( diaDaSemanaExtenso( Venc10 ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana10.prototype.Existencia = function()
{
	return( tem( Venc10 ) );
}

Semana10.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est10.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est10.prototype.Existencia = function()
{
	return( tem( Venc10 ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor10.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( (Valor-Valor1-Valor2-Valor3-Valor4-Valor5-Valor6-Valor7-Valor8-Valor9)/(Parcelas-9) ) );
}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor10.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( TotValor > Valor ) )
	{
		return( !confirm( "O valor das parcelas ultrapassa o valor da conta" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor10.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 9 ) );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc10.prototype.PosCampo = function()
{
		if( Perc10 != Math.round( 100*Valor10/Valor ) )
	{
		alt( Valor10, Valor*Perc10/100 );
	}
	return( true );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc10.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Math.round( 100*Valor10/Valor ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc10.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 10 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pg10.prototype.Existencia = function()
{
	return( Parcelas > 9 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc10.prototype.Existencia = function()
{
	return( Parcelas > 9 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc10_Plano.prototype.Existencia = function()
{
	return( Parcelas > 9 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc10_Plano_CodPlano.prototype.Existencia = function()
{
	return( Parcelas > 9 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc10_Codigo.prototype.Existencia = function()
{
	return( Parcelas > 9 );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc10_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc10.Obrigatorio( p_comMsg ) );
}

Cc10_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc10_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc10.Obrigatorio( p_comMsg ) );
}

Cc10_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
Cc10_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc10_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc10.Obrigatorio( p_comMsg ) );
}

Cc10_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
Cc10_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia11.prototype.Sugeriu = function()
{
{
		if( Intervalo > 0 )
	return( this.AtribuiuSemCritica( Dia10 + Intervalo ) );
}
		return( true );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia11.prototype.Existencia = function()
{
	return( Parcelas > 10 );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc11.prototype.PosCampo = function()
{
	{
		alt(Dia11,quantosDias(Venc11,Emissao));
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc11.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( incDia( DiaInterv, Dia11 ) ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Venc11.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O 11° vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc11.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( Venc11 ) ) )
	{
		return( !confirm( "Esse não é um útil. Continua?" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc11.prototype.Existencia = function()
{
	return( Parcelas > 10 );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana11.prototype.Calculou = function()
{
{
	return( this.Atribuiu( diaDaSemanaExtenso( Venc11 ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana11.prototype.Existencia = function()
{
	return( tem( Venc11 ) );
}

Semana11.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est11.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est11.prototype.Existencia = function()
{
	return( tem( Venc11 ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor11.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( (Valor-Valor1-Valor2-Valor3-Valor4-Valor5-Valor6-Valor7-Valor8-Valor9-Valor10)/(Parcelas-10) ) );
}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor11.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( TotValor > Valor ) )
	{
		return( !confirm( "O valor das parcelas ultrapassa o valor da conta" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor11.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 10 ) );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc11.prototype.PosCampo = function()
{
		if( Perc11 != Math.round( 100*Valor11/Valor ) )
	{
		alt( Valor11, Valor*Perc11/100 );
	}
	return( true );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc11.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Math.round( 100*Valor11/Valor ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc11.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 10 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pg11.prototype.Existencia = function()
{
	return( Parcelas > 10 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc11.prototype.Existencia = function()
{
	return( Parcelas > 10 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc11_Plano.prototype.Existencia = function()
{
	return( Parcelas > 10 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc11_Plano_CodPlano.prototype.Existencia = function()
{
	return( Parcelas > 10 );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc11_Codigo.prototype.Existencia = function()
{
	return( Parcelas > 10 );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc11_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc11.Obrigatorio( p_comMsg ) );
}

Cc11_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc11_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc11.Obrigatorio( p_comMsg ) );
}

Cc11_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
Cc11_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc11_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc11.Obrigatorio( p_comMsg ) );
}

Cc11_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
Cc11_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia12.prototype.Sugeriu = function()
{
{
		if( Intervalo > 0 )
	return( this.AtribuiuSemCritica( Dia11 + Intervalo ) );
}
		return( true );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Dia12.prototype.Existencia = function()
{
	return( Parcelas > 10 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc12.prototype.PosCampo = function()
{
	{
		alt(Dia12,quantosDias(Venc12,DiaInterv));
	}
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc12.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( incDia( Emissao, Dia12 ) ) );
}
}

//-------------------------------------------------------------
// Preenchimento do campo é obrigatório?
//-------------------------------------------------------------
Campo_parGeraParc_Venc12.prototype.Obrigatorio = function( p_comMsg )
{
	{
		if( p_comMsg ) alert( "O 12° vencimento é obrigatório" );
		return( true );
	}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc12.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( !ehUtil( Venc12 ) ) )
	{
		return( !confirm( "Esse não é um útil. Continua?" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Venc12.prototype.Existencia = function()
{
	return( Parcelas > 10 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Expressão para cálculo do valor do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana12.prototype.Calculou = function()
{
{
	return( this.Atribuiu( diaDaSemanaExtenso( Venc12 ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Semana12.prototype.Existencia = function()
{
	return( tem( Venc12 ) );
}

Semana12.EhCalculado = true;
//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est12.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( 0 ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Est12.prototype.Existencia = function()
{
	return( tem( Venc12 ) );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor12.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( (Valor-Valor1-Valor2-Valor3-Valor4-Valor5-Valor6-Valor7-Valor8-Valor9-Valor10-Valor11)/(Parcelas-11) ) );
}
}

//-------------------------------------------------------------
// Condição de advertência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor12.prototype.TemAdvertencia = function()
{
		if( tem(this) && ( TotValor > Valor ) )
	{
		return( !confirm( "O valor das parcelas ultrapassa o valor da conta" ) );
	}
	return( Lance_CampoCadeia.prototype.TemAdvertencia.call( this ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Valor12.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 10 && ( tem( TFPagto ) && TFPagto != 1 ) ) );
}

//-------------------------------------------------------------
// Pós Campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc12.prototype.PosCampo = function()
{
		if( Perc12 != Math.round( 100*Valor12/Valor ) )
	{
		alt( Valor12, Valor*Perc12/100 );
	}
	return( true );
}

//-------------------------------------------------------------
// Expressão para valor inicial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc12.prototype.Sugeriu = function()
{
{
	return( this.AtribuiuSemCritica( Math.round( 100*Valor12/Valor ) ) );
}
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Perc12.prototype.Existencia = function()
{
	return( ( Iguais == false ) && ( Parcelas > 10 && ( tem( TFPagto ) && TFPagto != 1 ) ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pg12.prototype.Existencia = function()
{
	return( Parcelas > 11 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc12.prototype.Existencia = function()
{
	return( Parcelas > 10 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc12_Plano.prototype.Existencia = function()
{
	return( Parcelas > 10 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc12_Plano_CodPlano.prototype.Existencia = function()
{
	return( Parcelas > 10 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição de Existência do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc12_Codigo.prototype.Existencia = function()
{
	return( Parcelas > 10 && ( tem( TFPagto ) && TFPagto != 1 ) );
}

//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc12_Plano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc12.Obrigatorio( p_comMsg ) );
}

Cc12_Plano.TipoCampo |= CAMPO_CHAVE_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc12_Plano_CodPlano.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc12.Obrigatorio( p_comMsg ) );
}

Cc12_Plano_CodPlano.TipoCampo |= CAMPO_CHAVE_PAI;
Cc12_Plano_Plano.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição Especial de Obrigatoriedade do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc12_Codigo.prototype.ObrigatorioEspecial = function( p_comMsg )
{
	return( Cc12.Obrigatorio( p_comMsg ) );
}

Cc12_Codigo.TipoCampo |= CAMPO_CHAVE_PAI;
Cc12_Nome.TipoCampo |= CAMPO_DESCRITOR_PAI;
//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Clinica.prototype.ExistenciaEspecial = function()
{
	return( ( !Clinica_Clinica.Obrigatorio( false ) || tem(Clinica_Clinica) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Fornecedor.prototype.ExistenciaEspecial = function()
{
	return( ( !Fornecedor_Nome.Obrigatorio( false ) || tem(Fornecedor_Nome) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Pessoa.prototype.ExistenciaEspecial = function()
{
	return( ( !Pessoa_Nome.Obrigatorio( false ) || tem(Pessoa_Nome) ) && ( !Pessoa_NumCelular.Obrigatorio( false ) || tem(Pessoa_NumCelular) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_CCor.prototype.ExistenciaEspecial = function()
{
	return( ( !CCor_Banco.Obrigatorio( false ) || tem(CCor_Banco) ) && ( !CCor_Agencia.Obrigatorio( false ) || tem(CCor_Agencia) ) && ( !CCor_Conta.Obrigatorio( false ) || tem(CCor_Conta) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_CCor_Banco.prototype.ExistenciaEspecial = function()
{
	return( ( !CCor_Banco_Num.Obrigatorio( false ) || tem(CCor_Banco_Num) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_CCor_Banco_Banco.prototype.ExistenciaEspecial = function()
{
	return( ( !CCor_Banco.Obrigatorio( false ) || tem(CCor_Banco) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc1_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc1_Plano_CodPlano.Obrigatorio( false ) || tem(Cc1_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc1_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc1_Plano.Obrigatorio( false ) || tem(Cc1_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc2_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc2_Plano_CodPlano.Obrigatorio( false ) || tem(Cc2_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc2_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc2_Plano.Obrigatorio( false ) || tem(Cc2_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc3_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc3_Plano_CodPlano.Obrigatorio( false ) || tem(Cc3_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc3_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc3_Plano.Obrigatorio( false ) || tem(Cc3_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc4_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc4_Plano_CodPlano.Obrigatorio( false ) || tem(Cc4_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc4_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc4_Plano.Obrigatorio( false ) || tem(Cc4_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc5_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc5_Plano_CodPlano.Obrigatorio( false ) || tem(Cc5_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc5_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc5_Plano.Obrigatorio( false ) || tem(Cc5_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc6_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc6_Plano_CodPlano.Obrigatorio( false ) || tem(Cc6_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc6_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc6_Plano.Obrigatorio( false ) || tem(Cc6_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc7_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc7_Plano_CodPlano.Obrigatorio( false ) || tem(Cc7_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc7_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc7_Plano.Obrigatorio( false ) || tem(Cc7_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc8_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc8_Plano_CodPlano.Obrigatorio( false ) || tem(Cc8_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc8_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc8_Plano.Obrigatorio( false ) || tem(Cc8_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc9_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc9_Plano_CodPlano.Obrigatorio( false ) || tem(Cc9_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc9_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc9_Plano.Obrigatorio( false ) || tem(Cc9_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc10_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc10_Plano_CodPlano.Obrigatorio( false ) || tem(Cc10_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc10_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc10_Plano.Obrigatorio( false ) || tem(Cc10_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc11_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc11_Plano_CodPlano.Obrigatorio( false ) || tem(Cc11_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc11_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc11_Plano.Obrigatorio( false ) || tem(Cc11_Plano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc12_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc12_Plano_CodPlano.Obrigatorio( false ) || tem(Cc12_Plano_CodPlano) ) );
}

//-------------------------------------------------------------
// Condição de Existência Especial do campo
//-------------------------------------------------------------
Campo_parGeraParc_Cc12_Plano_Plano.prototype.ExistenciaEspecial = function()
{
	return( ( !Cc12_Plano.Obrigatorio( false ) || tem(Cc12_Plano) ) );
}

function IniciarDependencias_parGeraParc()
{
Valor1.CalculosDependentes= [ TotValor ];
Valor2.CalculosDependentes= [ TotValor ];
Valor3.CalculosDependentes= [ TotValor ];
Valor4.CalculosDependentes= [ TotValor ];
Valor5.CalculosDependentes= [ TotValor ];
Valor6.CalculosDependentes= [ TotValor ];
Valor7.CalculosDependentes= [ TotValor ];
Valor8.CalculosDependentes= [ TotValor ];
Valor9.CalculosDependentes= [ TotValor ];
Valor10.CalculosDependentes= [ TotValor ];
Valor11.CalculosDependentes= [ TotValor ];
Valor12.CalculosDependentes= [ TotValor ];
Venc1.CalculosDependentes= [ Semana1 ];
Venc2.CalculosDependentes= [ Semana2 ];
Venc3.CalculosDependentes= [ Semana3 ];
Venc4.CalculosDependentes= [ Semana4 ];
Venc5.CalculosDependentes= [ Semana5 ];
Venc6.CalculosDependentes= [ Semana6 ];
Venc7.CalculosDependentes= [ Semana7 ];
Venc8.CalculosDependentes= [ Semana8 ];
Venc9.CalculosDependentes= [ Semana9 ];
Venc10.CalculosDependentes= [ Semana10 ];
Venc11.CalculosDependentes= [ Semana11 ];
Venc12.CalculosDependentes= [ Semana12 ];
Clinica_Clinica.ExistenciasDependentes= [ Clinica ];
Fornecedor_Nome.ExistenciasDependentes= [ Fornecedor ];
Fornecedor.ExistenciasDependentes= [ Pessoa,Pessoa_Nome,Pessoa_NumCelular ];
Pessoa_Nome.ExistenciasDependentes= [ Pessoa ];
Pessoa_NumCelular.ExistenciasDependentes= [ Pessoa ];
TFCobra.ExistenciasDependentes= [ TFPagto ];
TFPagto.ExistenciasDependentes= [ TDetPg,CCor,CCor_Banco,CCor_Banco_Num,CCor_Agencia,CCor_Conta,Cheque,Pg1,Pg2,Pg3,Pg4,Pg5,Pg6,Pg7,Pg8,Pg9,Pg10,Pg11,Dia12,Venc12,Valor12,Perc12,Pg12,Cc12,Cc12_Plano,Cc12_Plano_CodPlano,Cc12_Codigo ];
TDetPg.ExistenciasDependentes= [ CCor,CCor_Banco,CCor_Banco_Num,CCor_Agencia,CCor_Conta,Cheque ];
CCor_Banco.ExistenciasDependentes= [ CCor,CCor_Banco_Banco ];
CCor_Banco_Num.ExistenciasDependentes= [ CCor_Banco ];
CCor_Agencia.ExistenciasDependentes= [ CCor ];
CCor_Conta.ExistenciasDependentes= [ CCor ];
Iguais.ExistenciasDependentes= [ Valor1,Perc1,Valor2,Perc2,Valor3,Perc3,Valor4,Perc4,Valor5,Perc5,Valor6,Perc6,Valor7,Perc7,Valor8,Perc8,Valor9,Perc9,Valor10,Perc10,Valor11,Perc11,Valor12,Perc12 ];
Cc1_Plano_CodPlano.ExistenciasDependentes= [ Cc1_Plano ];
Cc1_Plano.ExistenciasDependentes= [ Cc1_Plano_Plano ];
Parcelas.ExistenciasDependentes= [ Dia2,Venc2,Valor2,Perc2,Pg2,Cc2,Cc2_Plano,Cc2_Plano_CodPlano,Cc2_Codigo,Dia3,Venc3,Valor3,Perc3,Pg3,Cc3,Cc3_Plano,Cc3_Plano_CodPlano,Cc3_Codigo,Dia4,Venc4,Valor4,Perc4,Pg4,Cc4,Cc4_Plano,Cc4_Plano_CodPlano,Cc4_Codigo,Dia5,Venc5,Valor5,Perc5,Pg5,Cc5,Cc5_Plano,Cc5_Plano_CodPlano,Cc5_Codigo,Dia6,Venc6,Valor6,Perc6,Pg6,Cc6,Cc6_Plano,Cc6_Plano_CodPlano,Cc6_Codigo,Dia7,Venc7,Valor7,Perc7,Pg7,Cc7,Cc7_Plano,Cc7_Plano_CodPlano,Cc7_Codigo,Dia8,Venc8,Valor8,Perc8,Pg8,Cc8,Cc8_Plano,Cc8_Plano_CodPlano,Cc8_Codigo,Dia9,Venc9,Semana9,Est9,Valor9,Perc9,Pg9,Cc9,Cc9_Plano,Cc9_Plano_CodPlano,Cc9_Codigo,Dia10,Venc10,Valor10,Perc10,Pg10,Cc10,Cc10_Plano,Cc10_Plano_CodPlano,Cc10_Codigo,Dia11,Venc11,Valor11,Perc11,Pg11,Cc11,Cc11_Plano,Cc11_Plano_CodPlano,Cc11_Codigo,Dia12,Venc12,Valor12,Perc12,Pg12,Cc12,Cc12_Plano,Cc12_Plano_CodPlano,Cc12_Codigo ];
Venc2.ExistenciasDependentes= [ Semana2,Est2 ];
Cc2_Plano_CodPlano.ExistenciasDependentes= [ Cc2_Plano ];
Cc2_Plano.ExistenciasDependentes= [ Cc2_Plano_Plano ];
Venc3.ExistenciasDependentes= [ Semana3,Est3 ];
Cc3_Plano_CodPlano.ExistenciasDependentes= [ Cc3_Plano ];
Cc3_Plano.ExistenciasDependentes= [ Cc3_Plano_Plano ];
Venc4.ExistenciasDependentes= [ Semana4,Est4 ];
Cc4_Plano_CodPlano.ExistenciasDependentes= [ Cc4_Plano ];
Cc4_Plano.ExistenciasDependentes= [ Cc4_Plano_Plano ];
Venc5.ExistenciasDependentes= [ Semana5,Est5 ];
Cc5_Plano_CodPlano.ExistenciasDependentes= [ Cc5_Plano ];
Cc5_Plano.ExistenciasDependentes= [ Cc5_Plano_Plano ];
Venc6.ExistenciasDependentes= [ Semana6,Est6 ];
Cc6_Plano_CodPlano.ExistenciasDependentes= [ Cc6_Plano ];
Cc6_Plano.ExistenciasDependentes= [ Cc6_Plano_Plano ];
Venc7.ExistenciasDependentes= [ Semana7,Est7 ];
Cc7_Plano_CodPlano.ExistenciasDependentes= [ Cc7_Plano ];
Cc7_Plano.ExistenciasDependentes= [ Cc7_Plano_Plano ];
Venc8.ExistenciasDependentes= [ Semana8,Est8 ];
Cc8_Plano_CodPlano.ExistenciasDependentes= [ Cc8_Plano ];
Cc8_Plano.ExistenciasDependentes= [ Cc8_Plano_Plano ];
Cc9_Plano_CodPlano.ExistenciasDependentes= [ Cc9_Plano ];
Cc9_Plano.ExistenciasDependentes= [ Cc9_Plano_Plano ];
Venc10.ExistenciasDependentes= [ Semana10,Est10 ];
Cc10_Plano_CodPlano.ExistenciasDependentes= [ Cc10_Plano ];
Cc10_Plano.ExistenciasDependentes= [ Cc10_Plano_Plano ];
Venc11.ExistenciasDependentes= [ Semana11,Est11 ];
Cc11_Plano_CodPlano.ExistenciasDependentes= [ Cc11_Plano ];
Cc11_Plano.ExistenciasDependentes= [ Cc11_Plano_Plano ];
Venc12.ExistenciasDependentes= [ Semana12,Est12 ];
Cc12_Plano_CodPlano.ExistenciasDependentes= [ Cc12_Plano ];
Cc12_Plano.ExistenciasDependentes= [ Cc12_Plano_Plano ];
Clinica_Clinica.ErrosDependentes= [ Clinica ];
Fornecedor_Nome.ErrosDependentes= [ Fornecedor ];
Fornecedor.ErrosDependentes= [ Pessoa ];
Pessoa_NumCelular.ErrosDependentes= [ Pessoa ];
CCor_Banco_Num.ErrosDependentes= [ CCor_Banco ];
CCor_Conta.ErrosDependentes= [ CCor ];
Cc1_Plano_CodPlano.ErrosDependentes= [ Cc1_Plano ];
Cc1_Codigo.ErrosDependentes= [ Cc1 ];
Cc2_Plano_CodPlano.ErrosDependentes= [ Cc2_Plano ];
Cc2_Codigo.ErrosDependentes= [ Cc2 ];
Cc3_Plano_CodPlano.ErrosDependentes= [ Cc3_Plano ];
Cc3_Codigo.ErrosDependentes= [ Cc3 ];
Cc4_Plano_CodPlano.ErrosDependentes= [ Cc4_Plano ];
Cc4_Codigo.ErrosDependentes= [ Cc4 ];
Cc5_Plano_CodPlano.ErrosDependentes= [ Cc5_Plano ];
Cc5_Codigo.ErrosDependentes= [ Cc5 ];
Cc6_Plano_CodPlano.ErrosDependentes= [ Cc6_Plano ];
Cc6_Codigo.ErrosDependentes= [ Cc6 ];
Cc7_Plano_CodPlano.ErrosDependentes= [ Cc7_Plano ];
Cc7_Codigo.ErrosDependentes= [ Cc7 ];
Cc8_Plano_CodPlano.ErrosDependentes= [ Cc8_Plano ];
Cc8_Codigo.ErrosDependentes= [ Cc8 ];
Cc9_Plano_CodPlano.ErrosDependentes= [ Cc9_Plano ];
Cc9_Codigo.ErrosDependentes= [ Cc9 ];
Cc10_Plano_CodPlano.ErrosDependentes= [ Cc10_Plano ];
Cc10_Codigo.ErrosDependentes= [ Cc10 ];
Cc11_Plano_CodPlano.ErrosDependentes= [ Cc11_Plano ];
Cc11_Codigo.ErrosDependentes= [ Cc11 ];
Cc12_Plano_CodPlano.ErrosDependentes= [ Cc12_Plano ];
Cc12_Codigo.ErrosDependentes= [ Cc12 ];
TotValor.AdvertenciasDependentes= [ Valor1,Valor2,Valor3,Valor4,Valor5,Valor6,Valor7,Valor8,Valor9,Valor10,Valor11,Valor12 ];
Valor.AdvertenciasDependentes= [ Valor1,Valor2,Valor3,Valor4,Valor5,Valor6,Valor7,Valor8,Valor9,Valor10,Valor11,Valor12 ];
CCor_Banco.DescritoresDependentes= [ CCor_Banco_Banco ];
Cc1_Plano.DescritoresDependentes= [ Cc1_Plano_Plano ];
Cc2_Plano.DescritoresDependentes= [ Cc2_Plano_Plano ];
Cc3_Plano.DescritoresDependentes= [ Cc3_Plano_Plano ];
Cc4_Plano.DescritoresDependentes= [ Cc4_Plano_Plano ];
Cc5_Plano.DescritoresDependentes= [ Cc5_Plano_Plano ];
Cc6_Plano.DescritoresDependentes= [ Cc6_Plano_Plano ];
Cc7_Plano.DescritoresDependentes= [ Cc7_Plano_Plano ];
Cc8_Plano.DescritoresDependentes= [ Cc8_Plano_Plano ];
Cc9_Plano.DescritoresDependentes= [ Cc9_Plano_Plano ];
Cc10_Plano.DescritoresDependentes= [ Cc10_Plano_Plano ];
Cc11_Plano.DescritoresDependentes= [ Cc11_Plano_Plano ];
Cc12_Plano.DescritoresDependentes= [ Cc12_Plano_Plano ];
Clinica.CamposChave= [ Clinica_Clinica ];
Fornecedor.CamposChave= [ Fornecedor_Nome ];
Pessoa.CamposChave= [ Pessoa_Nome,Pessoa_NumCelular ];
CCor.CamposChave= [ CCor_Banco,CCor_Agencia,CCor_Conta ];
CCor_Banco.CamposChave= [ CCor_Banco_Num ];
Cc1_Plano.CamposChave= [ Cc1_Plano_CodPlano ];
Cc2_Plano.CamposChave= [ Cc2_Plano_CodPlano ];
Cc3_Plano.CamposChave= [ Cc3_Plano_CodPlano ];
Cc4_Plano.CamposChave= [ Cc4_Plano_CodPlano ];
Cc5_Plano.CamposChave= [ Cc5_Plano_CodPlano ];
Cc6_Plano.CamposChave= [ Cc6_Plano_CodPlano ];
Cc7_Plano.CamposChave= [ Cc7_Plano_CodPlano ];
Cc8_Plano.CamposChave= [ Cc8_Plano_CodPlano ];
Cc9_Plano.CamposChave= [ Cc9_Plano_CodPlano ];
Cc10_Plano.CamposChave= [ Cc10_Plano_CodPlano ];
Cc11_Plano.CamposChave= [ Cc11_Plano_CodPlano ];
Cc12_Plano.CamposChave= [ Cc12_Plano_CodPlano ];
}


//======================================================
//	Arquivo e seus campos
//======================================================
g_arquivoAtual = "parGeraParc";
//------------------------------------------------------------
function ListaDeCampos_parGeraParc( p_prefixo )
{
	var l_prefixo = g_prefixo;
	g_prefixo += p_prefixo;
	this.Prefixo = g_prefixo;

	var l_lista = new Array();
	l_lista = l_lista.concat(

		[ Clinica, Clinica_Clinica, Fornecedor, Fornecedor_Nome, Pessoa, Pessoa_Nome, Pessoa_NumCelular, Documento, TPgRec, TPgRec_Chave, TPgRec_Descritor, Emissao, RecEnvia, Compete, Historico, Valor, Estimado, Condicao, Parcelas, Iguais, Intervalo, TFCobra, TFCobra_Chave, TFCobra_Descritor, TFPagto, TFPagto_Chave, TFPagto_Descritor, TDetPg, TDetPg_Chave, TDetPg_Descritor, CCor, CCor_Banco, CCor_Banco_Num, CCor_Banco_Banco, CCor_Agencia, CCor_Conta, Cheque, TotValor, Dia1, Venc1, Semana1, Est1, Valor1, Perc1, Pg1, Cc1, Cc1_Plano, Cc1_Plano_CodPlano, Cc1_Plano_Plano, Cc1_Codigo, Cc1_Nome, Dia2, Venc2, Semana2, Est2, Valor2, Perc2, Pg2, Cc2, Cc2_Plano, Cc2_Plano_CodPlano, Cc2_Plano_Plano, Cc2_Codigo, Cc2_Nome, Dia3, Venc3, Semana3, Est3, Valor3, Perc3, Pg3, Cc3, Cc3_Plano, Cc3_Plano_CodPlano, Cc3_Plano_Plano, Cc3_Codigo, Cc3_Nome, Dia4, Venc4, Semana4, Est4, Valor4, Perc4, Pg4, Cc4, Cc4_Plano, Cc4_Plano_CodPlano, Cc4_Plano_Plano, Cc4_Codigo, Cc4_Nome, Dia5, Venc5, Semana5, Est5, Valor5, Perc5, Pg5, Cc5, Cc5_Plano, Cc5_Plano_CodPlano, Cc5_Plano_Plano, Cc5_Codigo, Cc5_Nome, Dia6, Venc6, Semana6, Est6, Valor6, Perc6, Pg6, Cc6, Cc6_Plano, Cc6_Plano_CodPlano, Cc6_Plano_Plano, Cc6_Codigo, Cc6_Nome, Dia7, Venc7, Semana7, Est7, Valor7, Perc7, Pg7, Cc7, Cc7_Plano, Cc7_Plano_CodPlano, Cc7_Plano_Plano, Cc7_Codigo, Cc7_Nome, Dia8, Venc8, Semana8, Est8, Valor8, Perc8, Pg8, Cc8, Cc8_Plano, Cc8_Plano_CodPlano, Cc8_Plano_Plano, Cc8_Codigo, Cc8_Nome, Dia9, Venc9, Semana9, Est9, Valor9, Perc9, Pg9, Cc9, Cc9_Plano, Cc9_Plano_CodPlano, Cc9_Plano_Plano, Cc9_Codigo, Cc9_Nome, Dia10, Venc10, Semana10, Est10, Valor10, Perc10, Pg10, Cc10, Cc10_Plano, Cc10_Plano_CodPlano, Cc10_Plano_Plano, Cc10_Codigo, Cc10_Nome, Dia11, Venc11, Semana11, Est11, Valor11, Perc11, Pg11, Cc11, Cc11_Plano, Cc11_Plano_CodPlano, Cc11_Plano_Plano, Cc11_Codigo, Cc11_Nome, Dia12, Venc12, Semana12, Est12, Valor12, Perc12, Pg12, Cc12, Cc12_Plano, Cc12_Plano_CodPlano, Cc12_Plano_Plano, Cc12_Codigo, Cc12_Nome ]	);
	IniciarDependencias_parGeraParc();
	g_prefixo = l_prefixo;
	return( l_lista );
}

g_arquivoCampos = ListaDeCampos_parGeraParc( '' );
g_idOperacao = 26;
parent.navegacao.MenuPrincQtdOpcoes=1;
parent.navegacao.MenuPrincPodeSo1=1;
