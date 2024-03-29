<?php

/*=========================================================================
  a_recor - Recorrente
=========================================================================*/

if( DEF_a_recor == 1 )
  return;
define( "DEF_a_recor", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_recor_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Clinica
//======================================================

class campo_arqRecorrente_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqRecorrente_Clinica_Clinica extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Clinica_Clinica", "Clinica_Clinica", "Clinica", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Clinica", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Cl�nica" );
	}

}

//======================================================
//	Campo Fornecedor
//======================================================

class campo_arqRecorrente_Fornecedor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Fornecedor", "Fornecedor", "Fornecedor", 0, "arqFornecedor", "arqFornecedor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Fornecedor_Nome
//======================================================

class campo_arqRecorrente_Fornecedor_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Fornecedor_Nome", "Fornecedor_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Fornecedor", false );
	}

}

//======================================================
//	Campo Pessoa
//======================================================

class campo_arqRecorrente_Pessoa extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Pessoa", "Pessoa", "Pessoa", 0, "arqPessoa", "arqPessoa.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Pessoa_Nome
//======================================================

class campo_arqRecorrente_Pessoa_Nome extends Lance_CampoCadeia
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

class campo_arqRecorrente_Pessoa_NumCelular extends Lance_CampoCadeia
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
//	Campo Nome
//======================================================

class campo_arqRecorrente_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Nome", "Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function EhForm()
	{
		global $g_regAtual;
		return( (NAO) );
	}

}

//======================================================
//	Campo TPgRec
//======================================================

class campo_arqRecorrente_TPgRec extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TPgRec", "TPgRec", "TPgRec", 0, "tabTPgRec", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->TPGREC == 2 )
			return( "ContaReceber" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Tipo" );
	}

}

//======================================================
//	Campo TCompete
//======================================================

class campo_arqRecorrente_TCompete extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TCompete", "TCompete", "TCompete", 0, "tabTCompete", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Venc
//======================================================

class campo_arqRecorrente_Venc extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Venc", "Venc", "Venc", 2, "zz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Antecipa
//======================================================

class campo_arqRecorrente_Antecipa extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Antecipa", "Antecipa", "Antecipa", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->ANTECIPA == 1 )
			return( "CorAtivo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Antecipa?" );
	}

}

//======================================================
//	Campo Valor
//======================================================

class campo_arqRecorrente_Valor extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor", "Valor", "Valor", 8, "###.##z,zz", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function PodeTotalizar()
	{
		global $g_regAtual;
		return( (true) );
	}

}

//======================================================
//	Campo Estimado
//======================================================

class campo_arqRecorrente_Estimado extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Estimado", "Estimado", "Estimado", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->ESTIMADO == 1 )
			return( "CorAtivo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Estimado?" );
	}

}

//======================================================
//	Campo TFCobra
//======================================================

class campo_arqRecorrente_TFCobra extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TFCobra", "TFCobra", "TFCobra", 0, "tabTFCobra", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Cobran�a" );
	}

}

//======================================================
//	Campo Historico
//======================================================

class campo_arqRecorrente_Historico extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Historico", "Historico", "Historico", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Hist�rico" );
	}

}

//======================================================
//	Campo SubPlano
//======================================================

class campo_arqRecorrente_SubPlano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SubPlano", "SubPlano", "SubPlano", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, 0, false );
	}

}

//======================================================
//	Campo SubPlano_Plano
//======================================================

class campo_arqRecorrente_SubPlano_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SubPlano_Plano", "SubPlano_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "SubPlano", false );
	}

}

//======================================================
//	Campo SubPlano_Plano_CodPlano
//======================================================

class campo_arqRecorrente_SubPlano_Plano_CodPlano extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "SubPlano_Plano_CodPlano", "SubPlano_Plano_CodPlano", "CodPlano", 2, "zz", "", "", EH_CHAVE, "SubPlano_Plano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "C�digo" );
	}

}

//======================================================
//	Campo SubPlano_Plano_Plano
//======================================================

class campo_arqRecorrente_SubPlano_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlano_Plano_Plano", "SubPlano_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "SubPlano_Plano", false );
	}

}

//======================================================
//	Campo SubPlano_Codigo
//======================================================

class campo_arqRecorrente_SubPlano_Codigo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlano_Codigo", "SubPlano_Codigo", "Codigo", 6, "##.##.##", EH_CHAVE, "SubPlano", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "C�digo" );
	}

}

//======================================================
//	Campo SubPlano_Nome
//======================================================

class campo_arqRecorrente_SubPlano_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlano_Nome", "SubPlano_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "SubPlano", false );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqRecorrente_Ativo extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Ativo", "Ativo", "Ativo", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->ATIVO == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Ativa?" );
	}

}

//======================================================
//	Arquivo arqRecorrente
//======================================================
function listaCampos_arqRecorrente( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqRecorrente_Clinica(),
			new campo_arqRecorrente_Clinica_Clinica(),
			new campo_arqRecorrente_Fornecedor(),
			new campo_arqRecorrente_Fornecedor_Nome(),
			new campo_arqRecorrente_Pessoa(),
			new campo_arqRecorrente_Pessoa_Nome(),
			new campo_arqRecorrente_Pessoa_NumCelular(),
			new campo_arqRecorrente_Nome(),
			new campo_arqRecorrente_TPgRec(),
			new Lance_CampoCadeia( "TPgRec_Chave", "TPgRec_Chave", "Chave", 1, "x", EH_CHAVE, TPgRec ),
			new Lance_CampoCadeia( "TPgRec_Descritor", "TPgRec_Descritor", "Descritor", 7, "xxxxxxx", EH_DESCRITOR, TPgRec ),
			new campo_arqRecorrente_TCompete(),
			new Lance_CampoCadeia( "TCompete_Chave", "TCompete_Chave", "Chave", 1, "x", EH_CHAVE, TCompete ),
			new Lance_CampoCadeia( "TCompete_Descritor", "TCompete_Descritor", "Descritor", 8, "xxxxxxxx", EH_DESCRITOR, TCompete ),
			new campo_arqRecorrente_Venc(),
			new campo_arqRecorrente_Antecipa(),
			new campo_arqRecorrente_Valor(),
			new campo_arqRecorrente_Estimado(),
			new campo_arqRecorrente_TFCobra(),
			new Lance_CampoCadeia( "TFCobra_Chave", "TFCobra_Chave", "Chave", 1, "x", EH_CHAVE, TFCobra ),
			new Lance_CampoCadeia( "TFCobra_Descritor", "TFCobra_Descritor", "Descritor", 10, "xxxxxxxxxx", EH_DESCRITOR, TFCobra ),
			new campo_arqRecorrente_Historico(),
			new campo_arqRecorrente_SubPlano(),
			new campo_arqRecorrente_SubPlano_Plano(),
			new campo_arqRecorrente_SubPlano_Plano_CodPlano(),
			new campo_arqRecorrente_SubPlano_Plano_Plano(),
			new campo_arqRecorrente_SubPlano_Codigo(),
			new campo_arqRecorrente_SubPlano_Nome(),
			new campo_arqRecorrente_Ativo() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqRecorrente extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqRecorrente",  // Nome Interno do arquivo
			"a_recor",  // Nome deste arquivo Php que cont�m o arquivo
			"Recorrente",  // Nome do arquivo acentuado-se
			listaCampos_arqRecorrente( "" ), 46
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave �nica
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [  ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ Nome ];
			$vetAux[] = [ TPgRec_Descritor ];
			$vetAux[] = [ Venc ];
			$vetAux[] = [ Antecipa ];
			$vetAux[] = [ Valor ];
			$vetAux[] = [ Estimado ];
			$vetAux[] = [ TFCobra_Descritor ];
			$vetAux[] = [ Historico ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Clinica ], [ TPgRec ], [ TPgRec_Chave ], [ TPgRec_Descritor ], [ TFCobra ], [ TFCobra_Chave ], [ TFCobra_Descritor ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ Fornecedor_Nome ];
			$vetAux[] = [ Pessoa_Nome ];
			$vetAux[] = [ Pessoa_NumCelular ];
			$vetAux[] = [ TPgRec_Descritor ];
			$vetAux[] = [ TCompete_Descritor ];
			$vetAux[] = [ Venc ];
			$vetAux[] = [ Antecipa ];
			$vetAux[] = [ Valor ];
			$vetAux[] = [ Estimado ];
			$vetAux[] = [ TFCobra_Descritor ];
			$vetAux[] = [ Historico ];
			$vetAux[] = [ SubPlano_Plano_CodPlano ];
			$vetAux[] = [ SubPlano_Plano_Plano ];
			$vetAux[] = [ SubPlano_Codigo ];
			$vetAux[] = [ SubPlano_Nome ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabe�alho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Contas recorrentes' );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: FilTodos  
	//-------------------------------------------------------------
	function FilTodos()
	{
	return( "" . filtrarTodos() . "" );
	}

}
