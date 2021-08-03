<?php

/*=========================================================================
  a_grparc - GeraParc
=========================================================================*/

if( DEF_a_grparc == 1 )
  return;
define( "DEF_a_grparc", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_grparc_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Clinica
//======================================================

class campo_parGeraParc_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_parGeraParc_Clinica_Clinica extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Clinica_Clinica", "Clinica_Clinica", "Clinica", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Clinica", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Clínica" );
	}

}

//======================================================
//	Campo Fornecedor
//======================================================

class campo_parGeraParc_Fornecedor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Fornecedor", "Fornecedor", "Fornecedor", 0, "arqFornecedor", "arqFornecedor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Fornecedor_Nome
//======================================================

class campo_parGeraParc_Fornecedor_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Fornecedor_Nome", "Fornecedor_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Fornecedor", false );
	}

}

//======================================================
//	Campo Pessoa
//======================================================

class campo_parGeraParc_Pessoa extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Pessoa", "Pessoa", "Pessoa", 0, "arqPessoa", "arqPessoa.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Pessoa_Nome
//======================================================

class campo_parGeraParc_Pessoa_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Pessoa_Nome", "Pessoa_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Pessoa", false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->PESSOA_QTODESMAR >= G_QTASDESMAR )
			return( "VermelhoFundoEsq" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo Pessoa_NumCelular
//======================================================

class campo_parGeraParc_Pessoa_NumCelular extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Pessoa_NumCelular", "Pessoa_NumCelular", "NumCelular", 11, "(##) #.####.####", EH_CHAVE, "Pessoa", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Celular" );
	}

}

//======================================================
//	Campo Documento
//======================================================

class campo_parGeraParc_Documento extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Documento", "Documento", "Documento", 13, "#.###.###.###.##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo TPgRec
//======================================================

class campo_parGeraParc_TPgRec extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TPgRec", "TPgRec", "TPgRec", 0, "tabTPgRec", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Emissao
//======================================================

class campo_parGeraParc_Emissao extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Emissao", "Emissao", "Emissao", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo RecEnvia
//======================================================

class campo_parGeraParc_RecEnvia extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "RecEnvia", "RecEnvia", "RecEnvia", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Compete
//======================================================

class campo_parGeraParc_Compete extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Compete", "Compete", "Compete", 6, "mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Historico
//======================================================

class campo_parGeraParc_Historico extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Historico", "Historico", "Historico", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Valor
//======================================================

class campo_parGeraParc_Valor extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor", "Valor", "Valor", 11, "###.###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Estimado
//======================================================

class campo_parGeraParc_Estimado extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Estimado", "Estimado", "Estimado", "", 0, 0, false );
	}

}

//======================================================
//	Campo Condicao
//======================================================

class campo_parGeraParc_Condicao extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Condicao", "Condicao", "Condicao", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Parcelas
//======================================================

class campo_parGeraParc_Parcelas extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Parcelas", "Parcelas", "Parcelas", 2, "#z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Iguais
//======================================================

class campo_parGeraParc_Iguais extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Iguais", "Iguais", "Iguais", "", 0, 0, false );
	}

}

//======================================================
//	Campo Intervalo
//======================================================

class campo_parGeraParc_Intervalo extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Intervalo", "Intervalo", "Intervalo", 2, "#z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo TFCobra
//======================================================

class campo_parGeraParc_TFCobra extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TFCobra", "TFCobra", "TFCobra", 0, "tabTFCobra", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo TFPagto
//======================================================

class campo_parGeraParc_TFPagto extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TFPagto", "TFPagto", "TFPagto", 0, "tabTFPagto", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo TDetPg
//======================================================

class campo_parGeraParc_TDetPg extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TDetPg", "TDetPg", "TDetPg", 0, "tabTDetPg", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo CCor
//======================================================

class campo_parGeraParc_CCor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "CCor", "CCor", "CCor", 0, "arqCCor", "arqCCor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function FiltroPai()
	{
		global $g_regAtual;
			return( "A.Ativo = 1" );
	}

}

//======================================================
//	Campo CCor_Banco
//======================================================

class campo_parGeraParc_CCor_Banco extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "CCor_Banco", "CCor_Banco", "Banco", EH_CHAVE, "arqBanco", "arqBanco.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "CCor", false );
	}

}

//======================================================
//	Campo CCor_Banco_Num
//======================================================

class campo_parGeraParc_CCor_Banco_Num extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "CCor_Banco_Num", "CCor_Banco_Num", "Num", 3, "##z", "", "", EH_CHAVE, "CCor_Banco", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "N° Banco" );
	}

}

//======================================================
//	Campo CCor_Banco_Banco
//======================================================

class campo_parGeraParc_CCor_Banco_Banco extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CCor_Banco_Banco", "CCor_Banco_Banco", "Banco", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "CCor_Banco", false );
	}

}

//======================================================
//	Campo CCor_Agencia
//======================================================

class campo_parGeraParc_CCor_Agencia extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CCor_Agencia", "CCor_Agencia", "Agencia", 4, "xxxx", EH_CHAVE, "CCor", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Agência" );
	}

}

//======================================================
//	Campo CCor_Conta
//======================================================

class campo_parGeraParc_CCor_Conta extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CCor_Conta", "CCor_Conta", "Conta", 10, "xxxxxxxxxx", EH_CHAVE, "CCor", false );
	}

}

//======================================================
//	Campo Cheque
//======================================================

class campo_parGeraParc_Cheque extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cheque", "Cheque", "Cheque", 6, "zzz.zzz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo TotValor
//======================================================

class campo_parGeraParc_TotValor extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "TotValor", "TotValor", "TotValor", 11, "###.###.##z,zz", "", "", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Dia1
//======================================================

class campo_parGeraParc_Dia1 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Dia1", "Dia1", "Dia1", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Venc1
//======================================================

class campo_parGeraParc_Venc1 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Venc1", "Venc1", "Venc1", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Semana1
//======================================================

class campo_parGeraParc_Semana1 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Semana1", "Semana1", "Semana1", 13, "xxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Est1
//======================================================

class campo_parGeraParc_Est1 extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Est1", "Est1", "Est1", "", 0, 0, false );
	}

}

//======================================================
//	Campo Valor1
//======================================================

class campo_parGeraParc_Valor1 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor1", "Valor1", "Valor1", 11, "###.###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Perc1
//======================================================

class campo_parGeraParc_Perc1 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Perc1", "Perc1", "Perc1", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Pg1
//======================================================

class campo_parGeraParc_Pg1 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Pg1", "Pg1", "Pg1", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Cc1
//======================================================

class campo_parGeraParc_Cc1 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc1", "Cc1", "Cc1", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_SELECAO, 3, 0, false );
	}

}

//======================================================
//	Campo Cc1_Plano
//======================================================

class campo_parGeraParc_Cc1_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc1_Plano", "Cc1_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "Cc1", false );
	}

}

//======================================================
//	Campo Cc1_Plano_CodPlano
//======================================================

class campo_parGeraParc_Cc1_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cc1_Plano_CodPlano", "Cc1_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "Cc1_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc1_Plano_Plano
//======================================================

class campo_parGeraParc_Cc1_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc1_Plano_Plano", "Cc1_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc1_Plano", false );
	}

}

//======================================================
//	Campo Cc1_Codigo
//======================================================

class campo_parGeraParc_Cc1_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc1_Codigo", "Cc1_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "Cc1", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc1_Nome
//======================================================

class campo_parGeraParc_Cc1_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc1_Nome", "Cc1_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc1", false );
	}

}

//======================================================
//	Campo Dia2
//======================================================

class campo_parGeraParc_Dia2 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Dia2", "Dia2", "Dia2", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Venc2
//======================================================

class campo_parGeraParc_Venc2 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Venc2", "Venc2", "Venc2", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Semana2
//======================================================

class campo_parGeraParc_Semana2 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Semana2", "Semana2", "Semana2", 13, "xxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Est2
//======================================================

class campo_parGeraParc_Est2 extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Est2", "Est2", "Est2", "", 0, 0, false );
	}

}

//======================================================
//	Campo Valor2
//======================================================

class campo_parGeraParc_Valor2 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor2", "Valor2", "Valor2", 11, "###.###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Perc2
//======================================================

class campo_parGeraParc_Perc2 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Perc2", "Perc2", "Perc2", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Pg2
//======================================================

class campo_parGeraParc_Pg2 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Pg2", "Pg2", "Pg2", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Cc2
//======================================================

class campo_parGeraParc_Cc2 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc2", "Cc2", "Cc2", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_SELECAO, 3, 0, false );
	}

}

//======================================================
//	Campo Cc2_Plano
//======================================================

class campo_parGeraParc_Cc2_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc2_Plano", "Cc2_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "Cc2", false );
	}

}

//======================================================
//	Campo Cc2_Plano_CodPlano
//======================================================

class campo_parGeraParc_Cc2_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cc2_Plano_CodPlano", "Cc2_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "Cc2_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc2_Plano_Plano
//======================================================

class campo_parGeraParc_Cc2_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc2_Plano_Plano", "Cc2_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc2_Plano", false );
	}

}

//======================================================
//	Campo Cc2_Codigo
//======================================================

class campo_parGeraParc_Cc2_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc2_Codigo", "Cc2_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "Cc2", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc2_Nome
//======================================================

class campo_parGeraParc_Cc2_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc2_Nome", "Cc2_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc2", false );
	}

}

//======================================================
//	Campo Dia3
//======================================================

class campo_parGeraParc_Dia3 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Dia3", "Dia3", "Dia3", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Venc3
//======================================================

class campo_parGeraParc_Venc3 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Venc3", "Venc3", "Venc3", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Semana3
//======================================================

class campo_parGeraParc_Semana3 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Semana3", "Semana3", "Semana3", 13, "xxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Est3
//======================================================

class campo_parGeraParc_Est3 extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Est3", "Est3", "Est3", "", 0, 0, false );
	}

}

//======================================================
//	Campo Valor3
//======================================================

class campo_parGeraParc_Valor3 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor3", "Valor3", "Valor3", 11, "###.###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Perc3
//======================================================

class campo_parGeraParc_Perc3 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Perc3", "Perc3", "Perc3", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Pg3
//======================================================

class campo_parGeraParc_Pg3 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Pg3", "Pg3", "Pg3", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Cc3
//======================================================

class campo_parGeraParc_Cc3 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc3", "Cc3", "Cc3", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_SELECAO, 3, 0, false );
	}

}

//======================================================
//	Campo Cc3_Plano
//======================================================

class campo_parGeraParc_Cc3_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc3_Plano", "Cc3_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "Cc3", false );
	}

}

//======================================================
//	Campo Cc3_Plano_CodPlano
//======================================================

class campo_parGeraParc_Cc3_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cc3_Plano_CodPlano", "Cc3_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "Cc3_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc3_Plano_Plano
//======================================================

class campo_parGeraParc_Cc3_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc3_Plano_Plano", "Cc3_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc3_Plano", false );
	}

}

//======================================================
//	Campo Cc3_Codigo
//======================================================

class campo_parGeraParc_Cc3_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc3_Codigo", "Cc3_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "Cc3", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc3_Nome
//======================================================

class campo_parGeraParc_Cc3_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc3_Nome", "Cc3_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc3", false );
	}

}

//======================================================
//	Campo Dia4
//======================================================

class campo_parGeraParc_Dia4 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Dia4", "Dia4", "Dia4", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Venc4
//======================================================

class campo_parGeraParc_Venc4 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Venc4", "Venc4", "Venc4", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Semana4
//======================================================

class campo_parGeraParc_Semana4 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Semana4", "Semana4", "Semana4", 13, "xxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Est4
//======================================================

class campo_parGeraParc_Est4 extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Est4", "Est4", "Est4", "", 0, 0, false );
	}

}

//======================================================
//	Campo Valor4
//======================================================

class campo_parGeraParc_Valor4 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor4", "Valor4", "Valor4", 11, "###.###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Perc4
//======================================================

class campo_parGeraParc_Perc4 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Perc4", "Perc4", "Perc4", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Pg4
//======================================================

class campo_parGeraParc_Pg4 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Pg4", "Pg4", "Pg4", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Cc4
//======================================================

class campo_parGeraParc_Cc4 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc4", "Cc4", "Cc4", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_SELECAO, 3, 0, false );
	}

}

//======================================================
//	Campo Cc4_Plano
//======================================================

class campo_parGeraParc_Cc4_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc4_Plano", "Cc4_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "Cc4", false );
	}

}

//======================================================
//	Campo Cc4_Plano_CodPlano
//======================================================

class campo_parGeraParc_Cc4_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cc4_Plano_CodPlano", "Cc4_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "Cc4_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc4_Plano_Plano
//======================================================

class campo_parGeraParc_Cc4_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc4_Plano_Plano", "Cc4_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc4_Plano", false );
	}

}

//======================================================
//	Campo Cc4_Codigo
//======================================================

class campo_parGeraParc_Cc4_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc4_Codigo", "Cc4_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "Cc4", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc4_Nome
//======================================================

class campo_parGeraParc_Cc4_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc4_Nome", "Cc4_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc4", false );
	}

}

//======================================================
//	Campo Dia5
//======================================================

class campo_parGeraParc_Dia5 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Dia5", "Dia5", "Dia5", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Venc5
//======================================================

class campo_parGeraParc_Venc5 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Venc5", "Venc5", "Venc5", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Semana5
//======================================================

class campo_parGeraParc_Semana5 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Semana5", "Semana5", "Semana5", 13, "xxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Est5
//======================================================

class campo_parGeraParc_Est5 extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Est5", "Est5", "Est5", "", 0, 0, false );
	}

}

//======================================================
//	Campo Valor5
//======================================================

class campo_parGeraParc_Valor5 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor5", "Valor5", "Valor5", 11, "###.###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Perc5
//======================================================

class campo_parGeraParc_Perc5 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Perc5", "Perc5", "Perc5", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Pg5
//======================================================

class campo_parGeraParc_Pg5 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Pg5", "Pg5", "Pg5", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Cc5
//======================================================

class campo_parGeraParc_Cc5 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc5", "Cc5", "Cc5", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_SELECAO, 3, 0, false );
	}

}

//======================================================
//	Campo Cc5_Plano
//======================================================

class campo_parGeraParc_Cc5_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc5_Plano", "Cc5_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "Cc5", false );
	}

}

//======================================================
//	Campo Cc5_Plano_CodPlano
//======================================================

class campo_parGeraParc_Cc5_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cc5_Plano_CodPlano", "Cc5_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "Cc5_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc5_Plano_Plano
//======================================================

class campo_parGeraParc_Cc5_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc5_Plano_Plano", "Cc5_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc5_Plano", false );
	}

}

//======================================================
//	Campo Cc5_Codigo
//======================================================

class campo_parGeraParc_Cc5_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc5_Codigo", "Cc5_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "Cc5", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc5_Nome
//======================================================

class campo_parGeraParc_Cc5_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc5_Nome", "Cc5_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc5", false );
	}

}

//======================================================
//	Campo Dia6
//======================================================

class campo_parGeraParc_Dia6 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Dia6", "Dia6", "Dia6", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Venc6
//======================================================

class campo_parGeraParc_Venc6 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Venc6", "Venc6", "Venc6", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Semana6
//======================================================

class campo_parGeraParc_Semana6 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Semana6", "Semana6", "Semana6", 13, "xxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Est6
//======================================================

class campo_parGeraParc_Est6 extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Est6", "Est6", "Est6", "", 0, 0, false );
	}

}

//======================================================
//	Campo Valor6
//======================================================

class campo_parGeraParc_Valor6 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor6", "Valor6", "Valor6", 11, "###.###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Perc6
//======================================================

class campo_parGeraParc_Perc6 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Perc6", "Perc6", "Perc6", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Pg6
//======================================================

class campo_parGeraParc_Pg6 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Pg6", "Pg6", "Pg6", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Cc6
//======================================================

class campo_parGeraParc_Cc6 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc6", "Cc6", "Cc6", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_SELECAO, 3, 0, false );
	}

}

//======================================================
//	Campo Cc6_Plano
//======================================================

class campo_parGeraParc_Cc6_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc6_Plano", "Cc6_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "Cc6", false );
	}

}

//======================================================
//	Campo Cc6_Plano_CodPlano
//======================================================

class campo_parGeraParc_Cc6_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cc6_Plano_CodPlano", "Cc6_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "Cc6_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc6_Plano_Plano
//======================================================

class campo_parGeraParc_Cc6_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc6_Plano_Plano", "Cc6_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc6_Plano", false );
	}

}

//======================================================
//	Campo Cc6_Codigo
//======================================================

class campo_parGeraParc_Cc6_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc6_Codigo", "Cc6_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "Cc6", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc6_Nome
//======================================================

class campo_parGeraParc_Cc6_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc6_Nome", "Cc6_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc6", false );
	}

}

//======================================================
//	Campo Dia7
//======================================================

class campo_parGeraParc_Dia7 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Dia7", "Dia7", "Dia7", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Venc7
//======================================================

class campo_parGeraParc_Venc7 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Venc7", "Venc7", "Venc7", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Semana7
//======================================================

class campo_parGeraParc_Semana7 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Semana7", "Semana7", "Semana7", 13, "xxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Est7
//======================================================

class campo_parGeraParc_Est7 extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Est7", "Est7", "Est7", "", 0, 0, false );
	}

}

//======================================================
//	Campo Valor7
//======================================================

class campo_parGeraParc_Valor7 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor7", "Valor7", "Valor7", 11, "###.###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Perc7
//======================================================

class campo_parGeraParc_Perc7 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Perc7", "Perc7", "Perc7", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Pg7
//======================================================

class campo_parGeraParc_Pg7 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Pg7", "Pg7", "Pg7", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Cc7
//======================================================

class campo_parGeraParc_Cc7 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc7", "Cc7", "Cc7", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_SELECAO, 3, 0, false );
	}

}

//======================================================
//	Campo Cc7_Plano
//======================================================

class campo_parGeraParc_Cc7_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc7_Plano", "Cc7_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "Cc7", false );
	}

}

//======================================================
//	Campo Cc7_Plano_CodPlano
//======================================================

class campo_parGeraParc_Cc7_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cc7_Plano_CodPlano", "Cc7_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "Cc7_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc7_Plano_Plano
//======================================================

class campo_parGeraParc_Cc7_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc7_Plano_Plano", "Cc7_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc7_Plano", false );
	}

}

//======================================================
//	Campo Cc7_Codigo
//======================================================

class campo_parGeraParc_Cc7_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc7_Codigo", "Cc7_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "Cc7", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc7_Nome
//======================================================

class campo_parGeraParc_Cc7_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc7_Nome", "Cc7_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc7", false );
	}

}

//======================================================
//	Campo Dia8
//======================================================

class campo_parGeraParc_Dia8 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Dia8", "Dia8", "Dia8", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Venc8
//======================================================

class campo_parGeraParc_Venc8 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Venc8", "Venc8", "Venc8", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Semana8
//======================================================

class campo_parGeraParc_Semana8 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Semana8", "Semana8", "Semana8", 13, "xxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Est8
//======================================================

class campo_parGeraParc_Est8 extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Est8", "Est8", "Est8", "", 0, 0, false );
	}

}

//======================================================
//	Campo Valor8
//======================================================

class campo_parGeraParc_Valor8 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor8", "Valor8", "Valor8", 11, "###.###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Perc8
//======================================================

class campo_parGeraParc_Perc8 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Perc8", "Perc8", "Perc8", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Pg8
//======================================================

class campo_parGeraParc_Pg8 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Pg8", "Pg8", "Pg8", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Cc8
//======================================================

class campo_parGeraParc_Cc8 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc8", "Cc8", "Cc8", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_SELECAO, 3, 0, false );
	}

}

//======================================================
//	Campo Cc8_Plano
//======================================================

class campo_parGeraParc_Cc8_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc8_Plano", "Cc8_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "Cc8", false );
	}

}

//======================================================
//	Campo Cc8_Plano_CodPlano
//======================================================

class campo_parGeraParc_Cc8_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cc8_Plano_CodPlano", "Cc8_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "Cc8_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc8_Plano_Plano
//======================================================

class campo_parGeraParc_Cc8_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc8_Plano_Plano", "Cc8_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc8_Plano", false );
	}

}

//======================================================
//	Campo Cc8_Codigo
//======================================================

class campo_parGeraParc_Cc8_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc8_Codigo", "Cc8_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "Cc8", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc8_Nome
//======================================================

class campo_parGeraParc_Cc8_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc8_Nome", "Cc8_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc8", false );
	}

}

//======================================================
//	Campo Dia9
//======================================================

class campo_parGeraParc_Dia9 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Dia9", "Dia9", "Dia9", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Venc9
//======================================================

class campo_parGeraParc_Venc9 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Venc9", "Venc9", "Venc9", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Semana9
//======================================================

class campo_parGeraParc_Semana9 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Semana9", "Semana9", "Semana9", 13, "xxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Est9
//======================================================

class campo_parGeraParc_Est9 extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Est9", "Est9", "Est9", "", 0, 0, false );
	}

}

//======================================================
//	Campo Valor9
//======================================================

class campo_parGeraParc_Valor9 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor9", "Valor9", "Valor9", 11, "###.###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Perc9
//======================================================

class campo_parGeraParc_Perc9 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Perc9", "Perc9", "Perc9", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Pg9
//======================================================

class campo_parGeraParc_Pg9 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Pg9", "Pg9", "Pg9", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Cc9
//======================================================

class campo_parGeraParc_Cc9 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc9", "Cc9", "Cc9", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_SELECAO, 3, 0, false );
	}

}

//======================================================
//	Campo Cc9_Plano
//======================================================

class campo_parGeraParc_Cc9_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc9_Plano", "Cc9_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "Cc9", false );
	}

}

//======================================================
//	Campo Cc9_Plano_CodPlano
//======================================================

class campo_parGeraParc_Cc9_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cc9_Plano_CodPlano", "Cc9_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "Cc9_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc9_Plano_Plano
//======================================================

class campo_parGeraParc_Cc9_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc9_Plano_Plano", "Cc9_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc9_Plano", false );
	}

}

//======================================================
//	Campo Cc9_Codigo
//======================================================

class campo_parGeraParc_Cc9_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc9_Codigo", "Cc9_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "Cc9", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc9_Nome
//======================================================

class campo_parGeraParc_Cc9_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc9_Nome", "Cc9_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc9", false );
	}

}

//======================================================
//	Campo Dia10
//======================================================

class campo_parGeraParc_Dia10 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Dia10", "Dia10", "Dia10", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Venc10
//======================================================

class campo_parGeraParc_Venc10 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Venc10", "Venc10", "Venc10", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Semana10
//======================================================

class campo_parGeraParc_Semana10 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Semana10", "Semana10", "Semana10", 13, "xxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Est10
//======================================================

class campo_parGeraParc_Est10 extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Est10", "Est10", "Est10", "", 0, 0, false );
	}

}

//======================================================
//	Campo Valor10
//======================================================

class campo_parGeraParc_Valor10 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor10", "Valor10", "Valor10", 11, "###.###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Perc10
//======================================================

class campo_parGeraParc_Perc10 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Perc10", "Perc10", "Perc10", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Pg10
//======================================================

class campo_parGeraParc_Pg10 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Pg10", "Pg10", "Pg10", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Cc10
//======================================================

class campo_parGeraParc_Cc10 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc10", "Cc10", "Cc10", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_SELECAO, 3, 0, false );
	}

}

//======================================================
//	Campo Cc10_Plano
//======================================================

class campo_parGeraParc_Cc10_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc10_Plano", "Cc10_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "Cc10", false );
	}

}

//======================================================
//	Campo Cc10_Plano_CodPlano
//======================================================

class campo_parGeraParc_Cc10_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cc10_Plano_CodPlano", "Cc10_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "Cc10_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc10_Plano_Plano
//======================================================

class campo_parGeraParc_Cc10_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc10_Plano_Plano", "Cc10_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc10_Plano", false );
	}

}

//======================================================
//	Campo Cc10_Codigo
//======================================================

class campo_parGeraParc_Cc10_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc10_Codigo", "Cc10_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "Cc10", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc10_Nome
//======================================================

class campo_parGeraParc_Cc10_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc10_Nome", "Cc10_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc10", false );
	}

}

//======================================================
//	Campo Dia11
//======================================================

class campo_parGeraParc_Dia11 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Dia11", "Dia11", "Dia11", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Venc11
//======================================================

class campo_parGeraParc_Venc11 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Venc11", "Venc11", "Venc11", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Semana11
//======================================================

class campo_parGeraParc_Semana11 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Semana11", "Semana11", "Semana11", 13, "xxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Est11
//======================================================

class campo_parGeraParc_Est11 extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Est11", "Est11", "Est11", "", 0, 0, false );
	}

}

//======================================================
//	Campo Valor11
//======================================================

class campo_parGeraParc_Valor11 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor11", "Valor11", "Valor11", 11, "###.###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Perc11
//======================================================

class campo_parGeraParc_Perc11 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Perc11", "Perc11", "Perc11", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Pg11
//======================================================

class campo_parGeraParc_Pg11 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Pg11", "Pg11", "Pg11", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Cc11
//======================================================

class campo_parGeraParc_Cc11 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc11", "Cc11", "Cc11", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_SELECAO, 3, 0, false );
	}

}

//======================================================
//	Campo Cc11_Plano
//======================================================

class campo_parGeraParc_Cc11_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc11_Plano", "Cc11_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "Cc11", false );
	}

}

//======================================================
//	Campo Cc11_Plano_CodPlano
//======================================================

class campo_parGeraParc_Cc11_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cc11_Plano_CodPlano", "Cc11_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "Cc11_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc11_Plano_Plano
//======================================================

class campo_parGeraParc_Cc11_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc11_Plano_Plano", "Cc11_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc11_Plano", false );
	}

}

//======================================================
//	Campo Cc11_Codigo
//======================================================

class campo_parGeraParc_Cc11_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc11_Codigo", "Cc11_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "Cc11", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc11_Nome
//======================================================

class campo_parGeraParc_Cc11_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc11_Nome", "Cc11_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc11", false );
	}

}

//======================================================
//	Campo Dia12
//======================================================

class campo_parGeraParc_Dia12 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Dia12", "Dia12", "Dia12", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Venc12
//======================================================

class campo_parGeraParc_Venc12 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Venc12", "Venc12", "Venc12", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Semana12
//======================================================

class campo_parGeraParc_Semana12 extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Semana12", "Semana12", "Semana12", 13, "xxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo Est12
//======================================================

class campo_parGeraParc_Est12 extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Est12", "Est12", "Est12", "", 0, 0, false );
	}

}

//======================================================
//	Campo Valor12
//======================================================

class campo_parGeraParc_Valor12 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor12", "Valor12", "Valor12", 11, "###.###.##z,zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Perc12
//======================================================

class campo_parGeraParc_Perc12 extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Perc12", "Perc12", "Perc12", 3, "##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Pg12
//======================================================

class campo_parGeraParc_Pg12 extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Pg12", "Pg12", "Pg12", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Cc12
//======================================================

class campo_parGeraParc_Cc12 extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc12", "Cc12", "Cc12", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_SELECAO, 3, 0, false );
	}

}

//======================================================
//	Campo Cc12_Plano
//======================================================

class campo_parGeraParc_Cc12_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cc12_Plano", "Cc12_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "Cc12", false );
	}

}

//======================================================
//	Campo Cc12_Plano_CodPlano
//======================================================

class campo_parGeraParc_Cc12_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cc12_Plano_CodPlano", "Cc12_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "Cc12_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc12_Plano_Plano
//======================================================

class campo_parGeraParc_Cc12_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc12_Plano_Plano", "Cc12_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc12_Plano", false );
	}

}

//======================================================
//	Campo Cc12_Codigo
//======================================================

class campo_parGeraParc_Cc12_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc12_Codigo", "Cc12_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "Cc12", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Código" );
	}

}

//======================================================
//	Campo Cc12_Nome
//======================================================

class campo_parGeraParc_Cc12_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cc12_Nome", "Cc12_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "Cc12", false );
	}

}

//======================================================
//	Arquivo parGeraParc
//======================================================
function listaCampos_parGeraParc( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_parGeraParc_Clinica(),
			new campo_parGeraParc_Clinica_Clinica(),
			new campo_parGeraParc_Fornecedor(),
			new campo_parGeraParc_Fornecedor_Nome(),
			new campo_parGeraParc_Pessoa(),
			new campo_parGeraParc_Pessoa_Nome(),
			new campo_parGeraParc_Pessoa_NumCelular(),
			new campo_parGeraParc_Documento(),
			new campo_parGeraParc_TPgRec(),
			new Lance_CampoCadeia( "TPgRec_Chave", "TPgRec_Chave", "Chave", 1, "x", EH_CHAVE, TPgRec ),
			new Lance_CampoCadeia( "TPgRec_Descritor", "TPgRec_Descritor", "Descritor", 7, "xxxxxxx", EH_DESCRITOR, TPgRec ),
			new campo_parGeraParc_Emissao(),
			new campo_parGeraParc_RecEnvia(),
			new campo_parGeraParc_Compete(),
			new campo_parGeraParc_Historico(),
			new campo_parGeraParc_Valor(),
			new campo_parGeraParc_Estimado(),
			new campo_parGeraParc_Condicao(),
			new campo_parGeraParc_Parcelas(),
			new campo_parGeraParc_Iguais(),
			new campo_parGeraParc_Intervalo(),
			new campo_parGeraParc_TFCobra(),
			new Lance_CampoCadeia( "TFCobra_Chave", "TFCobra_Chave", "Chave", 1, "x", EH_CHAVE, TFCobra ),
			new Lance_CampoCadeia( "TFCobra_Descritor", "TFCobra_Descritor", "Descritor", 10, "xxxxxxxxxx", EH_DESCRITOR, TFCobra ),
			new campo_parGeraParc_TFPagto(),
			new Lance_CampoCadeia( "TFPagto_Chave", "TFPagto_Chave", "Chave", 1, "x", EH_CHAVE, TFPagto ),
			new Lance_CampoCadeia( "TFPagto_Descritor", "TFPagto_Descritor", "Descritor", 8, "xxxxxxxx", EH_DESCRITOR, TFPagto ),
			new campo_parGeraParc_TDetPg(),
			new Lance_CampoCadeia( "TDetPg_Chave", "TDetPg_Chave", "Chave", 1, "x", EH_CHAVE, TDetPg ),
			new Lance_CampoCadeia( "TDetPg_Descritor", "TDetPg_Descritor", "Descritor", 14, "xxxxxxxxxxxxxx", EH_DESCRITOR, TDetPg ),
			new campo_parGeraParc_CCor(),
			new campo_parGeraParc_CCor_Banco(),
			new campo_parGeraParc_CCor_Banco_Num(),
			new campo_parGeraParc_CCor_Banco_Banco(),
			new campo_parGeraParc_CCor_Agencia(),
			new campo_parGeraParc_CCor_Conta(),
			new campo_parGeraParc_Cheque(),
			new campo_parGeraParc_TotValor(),
			new campo_parGeraParc_Dia1(),
			new campo_parGeraParc_Venc1(),
			new campo_parGeraParc_Semana1(),
			new campo_parGeraParc_Est1(),
			new campo_parGeraParc_Valor1(),
			new campo_parGeraParc_Perc1(),
			new campo_parGeraParc_Pg1(),
			new campo_parGeraParc_Cc1(),
			new campo_parGeraParc_Cc1_Plano(),
			new campo_parGeraParc_Cc1_Plano_CodPlano(),
			new campo_parGeraParc_Cc1_Plano_Plano(),
			new campo_parGeraParc_Cc1_Codigo(),
			new campo_parGeraParc_Cc1_Nome(),
			new campo_parGeraParc_Dia2(),
			new campo_parGeraParc_Venc2(),
			new campo_parGeraParc_Semana2(),
			new campo_parGeraParc_Est2(),
			new campo_parGeraParc_Valor2(),
			new campo_parGeraParc_Perc2(),
			new campo_parGeraParc_Pg2(),
			new campo_parGeraParc_Cc2(),
			new campo_parGeraParc_Cc2_Plano(),
			new campo_parGeraParc_Cc2_Plano_CodPlano(),
			new campo_parGeraParc_Cc2_Plano_Plano(),
			new campo_parGeraParc_Cc2_Codigo(),
			new campo_parGeraParc_Cc2_Nome(),
			new campo_parGeraParc_Dia3(),
			new campo_parGeraParc_Venc3(),
			new campo_parGeraParc_Semana3(),
			new campo_parGeraParc_Est3(),
			new campo_parGeraParc_Valor3(),
			new campo_parGeraParc_Perc3(),
			new campo_parGeraParc_Pg3(),
			new campo_parGeraParc_Cc3(),
			new campo_parGeraParc_Cc3_Plano(),
			new campo_parGeraParc_Cc3_Plano_CodPlano(),
			new campo_parGeraParc_Cc3_Plano_Plano(),
			new campo_parGeraParc_Cc3_Codigo(),
			new campo_parGeraParc_Cc3_Nome(),
			new campo_parGeraParc_Dia4(),
			new campo_parGeraParc_Venc4(),
			new campo_parGeraParc_Semana4(),
			new campo_parGeraParc_Est4(),
			new campo_parGeraParc_Valor4(),
			new campo_parGeraParc_Perc4(),
			new campo_parGeraParc_Pg4(),
			new campo_parGeraParc_Cc4(),
			new campo_parGeraParc_Cc4_Plano(),
			new campo_parGeraParc_Cc4_Plano_CodPlano(),
			new campo_parGeraParc_Cc4_Plano_Plano(),
			new campo_parGeraParc_Cc4_Codigo(),
			new campo_parGeraParc_Cc4_Nome(),
			new campo_parGeraParc_Dia5(),
			new campo_parGeraParc_Venc5(),
			new campo_parGeraParc_Semana5(),
			new campo_parGeraParc_Est5(),
			new campo_parGeraParc_Valor5(),
			new campo_parGeraParc_Perc5(),
			new campo_parGeraParc_Pg5(),
			new campo_parGeraParc_Cc5(),
			new campo_parGeraParc_Cc5_Plano(),
			new campo_parGeraParc_Cc5_Plano_CodPlano(),
			new campo_parGeraParc_Cc5_Plano_Plano(),
			new campo_parGeraParc_Cc5_Codigo(),
			new campo_parGeraParc_Cc5_Nome(),
			new campo_parGeraParc_Dia6(),
			new campo_parGeraParc_Venc6(),
			new campo_parGeraParc_Semana6(),
			new campo_parGeraParc_Est6(),
			new campo_parGeraParc_Valor6(),
			new campo_parGeraParc_Perc6(),
			new campo_parGeraParc_Pg6(),
			new campo_parGeraParc_Cc6(),
			new campo_parGeraParc_Cc6_Plano(),
			new campo_parGeraParc_Cc6_Plano_CodPlano(),
			new campo_parGeraParc_Cc6_Plano_Plano(),
			new campo_parGeraParc_Cc6_Codigo(),
			new campo_parGeraParc_Cc6_Nome(),
			new campo_parGeraParc_Dia7(),
			new campo_parGeraParc_Venc7(),
			new campo_parGeraParc_Semana7(),
			new campo_parGeraParc_Est7(),
			new campo_parGeraParc_Valor7(),
			new campo_parGeraParc_Perc7(),
			new campo_parGeraParc_Pg7(),
			new campo_parGeraParc_Cc7(),
			new campo_parGeraParc_Cc7_Plano(),
			new campo_parGeraParc_Cc7_Plano_CodPlano(),
			new campo_parGeraParc_Cc7_Plano_Plano(),
			new campo_parGeraParc_Cc7_Codigo(),
			new campo_parGeraParc_Cc7_Nome(),
			new campo_parGeraParc_Dia8(),
			new campo_parGeraParc_Venc8(),
			new campo_parGeraParc_Semana8(),
			new campo_parGeraParc_Est8(),
			new campo_parGeraParc_Valor8(),
			new campo_parGeraParc_Perc8(),
			new campo_parGeraParc_Pg8(),
			new campo_parGeraParc_Cc8(),
			new campo_parGeraParc_Cc8_Plano(),
			new campo_parGeraParc_Cc8_Plano_CodPlano(),
			new campo_parGeraParc_Cc8_Plano_Plano(),
			new campo_parGeraParc_Cc8_Codigo(),
			new campo_parGeraParc_Cc8_Nome(),
			new campo_parGeraParc_Dia9(),
			new campo_parGeraParc_Venc9(),
			new campo_parGeraParc_Semana9(),
			new campo_parGeraParc_Est9(),
			new campo_parGeraParc_Valor9(),
			new campo_parGeraParc_Perc9(),
			new campo_parGeraParc_Pg9(),
			new campo_parGeraParc_Cc9(),
			new campo_parGeraParc_Cc9_Plano(),
			new campo_parGeraParc_Cc9_Plano_CodPlano(),
			new campo_parGeraParc_Cc9_Plano_Plano(),
			new campo_parGeraParc_Cc9_Codigo(),
			new campo_parGeraParc_Cc9_Nome(),
			new campo_parGeraParc_Dia10(),
			new campo_parGeraParc_Venc10(),
			new campo_parGeraParc_Semana10(),
			new campo_parGeraParc_Est10(),
			new campo_parGeraParc_Valor10(),
			new campo_parGeraParc_Perc10(),
			new campo_parGeraParc_Pg10(),
			new campo_parGeraParc_Cc10(),
			new campo_parGeraParc_Cc10_Plano(),
			new campo_parGeraParc_Cc10_Plano_CodPlano(),
			new campo_parGeraParc_Cc10_Plano_Plano(),
			new campo_parGeraParc_Cc10_Codigo(),
			new campo_parGeraParc_Cc10_Nome(),
			new campo_parGeraParc_Dia11(),
			new campo_parGeraParc_Venc11(),
			new campo_parGeraParc_Semana11(),
			new campo_parGeraParc_Est11(),
			new campo_parGeraParc_Valor11(),
			new campo_parGeraParc_Perc11(),
			new campo_parGeraParc_Pg11(),
			new campo_parGeraParc_Cc11(),
			new campo_parGeraParc_Cc11_Plano(),
			new campo_parGeraParc_Cc11_Plano_CodPlano(),
			new campo_parGeraParc_Cc11_Plano_Plano(),
			new campo_parGeraParc_Cc11_Codigo(),
			new campo_parGeraParc_Cc11_Nome(),
			new campo_parGeraParc_Dia12(),
			new campo_parGeraParc_Venc12(),
			new campo_parGeraParc_Semana12(),
			new campo_parGeraParc_Est12(),
			new campo_parGeraParc_Valor12(),
			new campo_parGeraParc_Perc12(),
			new campo_parGeraParc_Pg12(),
			new campo_parGeraParc_Cc12(),
			new campo_parGeraParc_Cc12_Plano(),
			new campo_parGeraParc_Cc12_Plano_CodPlano(),
			new campo_parGeraParc_Cc12_Plano_Plano(),
			new campo_parGeraParc_Cc12_Codigo(),
			new campo_parGeraParc_Cc12_Nome() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class parGeraParc extends Lance_Parametro
{
	function __construct()
	{
		parent::__construct(
			"parGeraParc",  // Nome Interno do arquivo
			"a_grparc",  // Nome deste arquivo Php que contém o arquivo
			"GeraParc",  // Nome do arquivo acentuado-se
			listaCampos_parGeraParc( "" ), 26
		);
	}

}
?>
