<?php

/*=========================================================================
  a_conta - Conta
=========================================================================*/

if( DEF_a_conta == 1 )
  return;
define( "DEF_a_conta", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_conta_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Transacao
//======================================================

class campo_arqConta_Transacao extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Transacao", "Transacao", "Transacao", 6, "###.##z", "", "", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Transação" );
	}

}

//======================================================
//	Campo Clinica
//======================================================

class campo_arqConta_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqConta_Clinica_Clinica extends Lance_CampoCadeia
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
//	Campo TPgRec
//======================================================

class campo_arqConta_TPgRec extends Lance_CampoLigado
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
//	Campo Fornecedor
//======================================================

class campo_arqConta_Fornecedor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Fornecedor", "Fornecedor", "Fornecedor", 0, "arqFornecedor", "arqFornecedor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Fornecedor_Nome
//======================================================

class campo_arqConta_Fornecedor_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Fornecedor_Nome", "Fornecedor_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Fornecedor", false );
	}

}

//======================================================
//	Campo Pessoa
//======================================================

class campo_arqConta_Pessoa extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Pessoa", "Pessoa", "Pessoa", 0, "arqPessoa", "arqPessoa.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Pessoa_Nome
//======================================================

class campo_arqConta_Pessoa_Nome extends Lance_CampoCadeia
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

class campo_arqConta_Pessoa_NumCelular extends Lance_CampoCadeia
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

class campo_arqConta_Nome extends Lance_CampoCadeia
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
//	Campo TrgValor
//======================================================

class campo_arqConta_TrgValor extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "TrgValor", "TrgValor", "TrgValor", 11, "###.###.##z,zz", "", "", EH_TOTALIZADO, 0, false );
	}

	//--------------------------------------------------
	function PodeTotalizar()
	{
		global $g_regAtual;
		return( (true) );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->TRGVALOR == 0 )
			return( "VermelhoFundoCentro" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Bruto" );
	}

}

//======================================================
//	Campo TrgValLiq
//======================================================

class campo_arqConta_TrgValLiq extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "TrgValLiq", "TrgValLiq", "TrgValLiq", 11, "###.###.##z,zz", "", "", EH_TOTALIZADO, 0, false );
	}

	//--------------------------------------------------
	function PodeTotalizar()
	{
		global $g_regAtual;
		return( (true) );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->TRGVALLIQ == 0 )
			return( "VermelhoFundoCentro" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Valor líquido" );
	}

}

//======================================================
//	Campo TrgQtdParc
//======================================================

class campo_arqConta_TrgQtdParc extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "TrgQtdParc", "TrgQtdParc", "TrgQtdParc", 2, "#z", "", "", EH_TOTALIZADO, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Parc" );
	}

}

//======================================================
//	Campo TrgQParcPg
//======================================================

class campo_arqConta_TrgQParcPg extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "TrgQParcPg", "TrgQParcPg", "TrgQParcPg", 2, "#z", "", "", EH_TOTALIZADO, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Pg" );
	}

}

//======================================================
//	Campo ProxVenc
//======================================================

class campo_arqConta_ProxVenc extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "ProxVenc", "ProxVenc", "ProxVenc", 8, "dd/mm/aaaa", EH_TOTALIZADO, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->SALDO == 0 )
			return( "" );
		if( quantosDias( formatarData( $g_regAtual->PROXVENC ), HOJE ) < 0 )
			return( "DataAtrasada" );
		if( formatarData( $g_regAtual->PROXVENC ) == HOJE )
			return( "DataHoje" );
			return( "DataFutura" );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Prox.Venc" );
	}

}

//======================================================
//	Campo TrgPago
//======================================================

class campo_arqConta_TrgPago extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "TrgPago", "TrgPago", "TrgPago", 11, "###.###.##z,zz", "", "", EH_TOTALIZADO, 0, false );
	}

}

//======================================================
//	Campo Saldo
//======================================================

class campo_arqConta_Saldo extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Saldo", "Saldo", "Saldo", 11, "###.###.##z,zz", "", "", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function PodeTotalizar()
	{
		global $g_regAtual;
		return( (true) );
	}

}

//======================================================
//	Campo Documento
//======================================================

class campo_arqConta_Documento extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Documento", "Documento", "Documento", 13, "#.###.###.###.##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Emissao
//======================================================

class campo_arqConta_Emissao extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Emissao", "Emissao", "Emissao", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo RecEnvia
//======================================================

class campo_arqConta_RecEnvia extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "RecEnvia", "RecEnvia", "RecEnvia", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Compete
//======================================================

class campo_arqConta_Compete extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Compete", "Compete", "Compete", 6, "mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Historico
//======================================================

class campo_arqConta_Historico extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Historico", "Historico", "Historico", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Histórico" );
	}

}

//======================================================
//	Campo Arq1
//======================================================

class campo_arqConta_Arq1 extends Lance_CampoArquivo
{
	function __construct()
	{
		parent::__construct( "Arq1", "Arq1", "Arq1", 10, "nnnnnnnnnn", 0, 0, false, false );
	}

}

//======================================================
//	Arquivo arqConta
//======================================================
function listaCampos_arqConta( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqConta_Transacao(),
			new campo_arqConta_Clinica(),
			new campo_arqConta_Clinica_Clinica(),
			new campo_arqConta_TPgRec(),
			new Lance_CampoCadeia( "TPgRec_Chave", "TPgRec_Chave", "Chave", 1, "x", EH_CHAVE, TPgRec ),
			new Lance_CampoCadeia( "TPgRec_Descritor", "TPgRec_Descritor", "Descritor", 7, "xxxxxxx", EH_DESCRITOR, TPgRec ),
			new campo_arqConta_Fornecedor(),
			new campo_arqConta_Fornecedor_Nome(),
			new campo_arqConta_Pessoa(),
			new campo_arqConta_Pessoa_Nome(),
			new campo_arqConta_Pessoa_NumCelular(),
			new campo_arqConta_Nome(),
			new campo_arqConta_TrgValor(),
			new campo_arqConta_TrgValLiq(),
			new campo_arqConta_TrgQtdParc(),
			new campo_arqConta_TrgQParcPg(),
			new campo_arqConta_ProxVenc(),
			new campo_arqConta_TrgPago(),
			new campo_arqConta_Saldo(),
			new campo_arqConta_Documento(),
			new campo_arqConta_Emissao(),
			new campo_arqConta_RecEnvia(),
			new campo_arqConta_Compete(),
			new campo_arqConta_Historico(),
			new campo_arqConta_Arq1() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqConta extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqConta",  // Nome Interno do arquivo
			"a_conta",  // Nome deste arquivo Php que contém o arquivo
			"Conta",  // Nome do arquivo acentuado-se
			listaCampos_arqConta( "" ), 33
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Transacao) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Transacao ) );
			array_push( $vetAux, array( Clinica_Clinica ) );
			array_push( $vetAux, array( TPgRec_Descritor ) );
			array_push( $vetAux, array( Nome ) );
			array_push( $vetAux, array( TrgValor ) );
			array_push( $vetAux, array( TrgValLiq ) );
			array_push( $vetAux, array( TrgQtdParc ) );
			array_push( $vetAux, array( TrgQParcPg ) );
			array_push( $vetAux, array( ProxVenc ) );
			array_push( $vetAux, array( Saldo ) );
			array_push( $vetAux, array( Historico ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( Clinica ), array( TPgRec ), array( TPgRec_Chave ), array( TPgRec_Descritor ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Transacao ) );
			array_push( $vetAux, array( Clinica_Clinica ) );
			array_push( $vetAux, array( TPgRec_Descritor ) );
			array_push( $vetAux, array( Fornecedor_Nome ) );
			array_push( $vetAux, array( Pessoa_Nome ) );
			array_push( $vetAux, array( Pessoa_NumCelular ) );
			array_push( $vetAux, array( TrgValor ) );
			array_push( $vetAux, array( TrgValLiq ) );
			array_push( $vetAux, array( TrgQtdParc ) );
			array_push( $vetAux, array( TrgQParcPg ) );
			array_push( $vetAux, array( ProxVenc ) );
			array_push( $vetAux, array( TrgPago ) );
			array_push( $vetAux, array( Saldo ) );
			array_push( $vetAux, array( Documento ) );
			array_push( $vetAux, array( Emissao ) );
			array_push( $vetAux, array( RecEnvia ) );
			array_push( $vetAux, array( Compete ) );
			array_push( $vetAux, array( Historico ) );
			array_push( $vetAux, array( Arq1 ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Contas' );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: FilSel    
	//-------------------------------------------------------------
	function FilSel()
	{
	return( "" . ext_filtrarSelecao() . "" );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: FilTodas  
	//-------------------------------------------------------------
	function FilTodas()
	{
	return( "" . ext_filtrarTodas() . "" );
	}

}
?>
