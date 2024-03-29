<?php

/*=========================================================================
  a_parcel - Parcela
=========================================================================*/

if( DEF_a_parcel == 1 )
  return;
define( "DEF_a_parcel", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_parcel_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Conta
//======================================================

class campo_arqParcela_Conta extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Conta", "Conta", "Conta", EH_CHAVE, "arqConta", "arqConta.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function PegaPai()
	{
		global $g_regAtual;
		$vetPai = [];
			$vetPai[]=
				[ "TPgRec, Clinica, Fornecedor", 
					"A.Conta, arqConta",
					"0,0,0" ];
			$vetPai[]=
				[ "Clinica", 
					"A.Conta, arqConta.Clinica, arqClinica",
					"1" ];
			$vetPai[]=
				[ "Nome", 
					"A.Conta, arqConta.Pessoa, arqPessoa",
					"1" ];
		return( $vetPai );
	}

}

//======================================================
//	Campo Conta_Transacao
//======================================================

class campo_arqParcela_Conta_Transacao extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Conta_Transacao", "Conta_Transacao", "Transacao", 6, "###.##z", "", "", EH_CHAVE, "Conta", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Transa��o" );
	}

}

//======================================================
//	Campo VClinica
//======================================================

class campo_arqParcela_VClinica extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "VClinica", "VClinica", "VClinica", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_VIEW, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
			return( "CadeiaEsqPretoNegrito" );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Cl�nica" );
	}

}

//======================================================
//	Campo VTPgRec
//======================================================

class campo_arqParcela_VTPgRec extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "VTPgRec", "VTPgRec", "VTPgRec", 7, "xxxxxxx", EH_VIEW, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( TipoConta == 'Receber' )
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
//	Campo VPessoa
//======================================================

class campo_arqParcela_VPessoa extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "VPessoa", "VPessoa", "VPessoa", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_VIEW, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Pessoa" );
	}

}

//======================================================
//	Campo Parcela
//======================================================

class campo_arqParcela_Parcela extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Parcela", "Parcela", "Parcela", 2, "#z", "", "", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo Vencimento
//======================================================

class campo_arqParcela_Vencimento extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Vencimento", "Vencimento", "Vencimento", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( tem( $g_regAtual->DATAPAGTO ) )
			return( "" );
		if( quantosDias( formatarData( $g_regAtual->VENCIMENTO ), HOJE ) < 0 )
			return( "DataAtrasada" );
		if( $g_regAtual->VENCEST == 1 )
			return( "DataEstimada" );
		if( formatarData( $g_regAtual->VENCIMENTO ) == HOJE )
			return( "DataHoje" );
			return( "DataFutura" );
	}

}

//======================================================
//	Campo VencEst
//======================================================

class campo_arqParcela_VencEst extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "VencEst", "VencEst", "VencEst", "", 0, 0, false );
	}

}

//======================================================
//	Campo Valor
//======================================================

class campo_arqParcela_Valor extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Valor", "Valor", "Valor", 11, "###.###.##z,zz", "", "", 0, 0, false );
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
		if( $g_regAtual->ESTIMADO == 1 )
			return( "DataHoje" );
			return( "ValorAzulNegrito" );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Bruto" );
	}

}

//======================================================
//	Campo ValorLiq
//======================================================

class campo_arqParcela_ValorLiq extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "ValorLiq", "ValorLiq", "ValorLiq", 11, "###.###.##z,zz", "", "", 0, 0, false );
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
		if( $g_regAtual->ESTIMADO == 1 )
			return( "DataHoje" );
			return( "ValorAzulNegrito" );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "L�quido" );
	}

}

//======================================================
//	Campo Estimado
//======================================================

class campo_arqParcela_Estimado extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Estimado", "Estimado", "Estimado", "", 0, 0, false );
	}

}

//======================================================
//	Campo TFCobra
//======================================================

class campo_arqParcela_TFCobra extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TFCobra", "TFCobra", "TFCobra", 0, "tabTFCobra", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( !tem( $g_regAtual->TFCOBRA ) )
			return( "VermelhoFundoCentro" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Cobran�a" );
	}

}

//======================================================
//	Campo Emissao
//======================================================

class campo_arqParcela_Emissao extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Emissao", "Emissao", "Emissao", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo NumBoleto
//======================================================

class campo_arqParcela_NumBoleto extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "NumBoleto", "NumBoleto", "NumBoleto", 11, "##.###.###.##z", "", "F", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo LinhaDig
//======================================================

class campo_arqParcela_LinhaDig extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "LinhaDig", "LinhaDig", "LinhaDig", 54, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Linha digit�vel" );
	}

}

//======================================================
//	Campo NomePdf
//======================================================

class campo_arqParcela_NomePdf extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "NomePdf", "NomePdf", "NomePdf", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo CCor
//======================================================

class campo_arqParcela_CCor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "CCor", "CCor", "CCor", 0, "arqCCor", "arqCCor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo CCor_Nome
//======================================================

class campo_arqParcela_CCor_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CCor_Nome", "CCor_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "CCor", false );
	}

}

//======================================================
//	Campo SubPlano
//======================================================

class campo_arqParcela_SubPlano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SubPlano", "SubPlano", "SubPlano", 0, "arqSubPlano", "arqSubPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, 0, false );
	}

}

//======================================================
//	Campo SubPlano_Plano
//======================================================

class campo_arqParcela_SubPlano_Plano extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "SubPlano_Plano", "SubPlano_Plano", "Plano", EH_CHAVE, "arqPlano", "arqPlano.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 3, "SubPlano", false );
	}

}

//======================================================
//	Campo SubPlano_Plano_CodPlano
//======================================================

class campo_arqParcela_SubPlano_Plano_CodPlano extends Lance_CampoNumerico
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

class campo_arqParcela_SubPlano_Plano_Plano extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlano_Plano_Plano", "SubPlano_Plano_Plano", "Plano", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "SubPlano_Plano", false );
	}

}

//======================================================
//	Campo SubPlano_Codigo
//======================================================

class campo_arqParcela_SubPlano_Codigo extends Lance_CampoCadeia
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

class campo_arqParcela_SubPlano_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SubPlano_Nome", "SubPlano_Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, "SubPlano", false );
	}

}

//======================================================
//	Campo DataPagto
//======================================================

class campo_arqParcela_DataPagto extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataPagto", "DataPagto", "DataPagto", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Pagamento" );
	}

}

//======================================================
//	Campo DataComp
//======================================================

class campo_arqParcela_DataComp extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataComp", "DataComp", "DataComp", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo TFPagto
//======================================================

class campo_arqParcela_TFPagto extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TFPagto", "TFPagto", "TFPagto", 0, "tabTFPagto", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo TDetPg
//======================================================

class campo_arqParcela_TDetPg extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TDetPg", "TDetPg", "TDetPg", 0, "tabTDetPg", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo FormaPg
//======================================================

class campo_arqParcela_FormaPg extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "FormaPg", "FormaPg", "FormaPg", 0, "arqFormaPg", "arqFormaPg.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo FormaPg_FormaPg
//======================================================

class campo_arqParcela_FormaPg_FormaPg extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "FormaPg_FormaPg", "FormaPg_FormaPg", "FormaPg", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "FormaPg", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Forma" );
	}

}

//======================================================
//	Campo Cheque
//======================================================

class campo_arqParcela_Cheque extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Cheque", "Cheque", "Cheque", 6, "zzz.zzz", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo Arq1
//======================================================

class campo_arqParcela_Arq1 extends Lance_CampoArquivo
{
	function __construct()
	{
		parent::__construct( "Arq1", "Arq1", "Arq1", 10, "nnnnnnnnnn", 0, 0, false, false );
	}

}

//======================================================
//	Campo StRetorno
//======================================================

class campo_arqParcela_StRetorno extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "StRetorno", "StRetorno", "StRetorno", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Remessa
//======================================================

class campo_arqParcela_Remessa extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Remessa", "Remessa", "Remessa", 9, "###.###.##z", "", "", 0, 0, false );
	}

}

//======================================================
//	Campo DataRem
//======================================================

class campo_arqParcela_DataRem extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataRem", "DataRem", "DataRem", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo VHistConta
//======================================================

class campo_arqParcela_VHistConta extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "VHistConta", "VHistConta", "VHistConta", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_VIEW, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Hist�rico Conta" );
	}

}

//======================================================
//	Campo Historico
//======================================================

class campo_arqParcela_Historico extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Historico", "Historico", "Historico", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Hist�rico Parcela" );
	}

}

//======================================================
//	Arquivo arqParcela
//======================================================
function listaCampos_arqParcela( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqParcela_Conta(),
			new campo_arqParcela_Conta_Transacao(),
			new campo_arqParcela_VClinica(),
			new campo_arqParcela_VTPgRec(),
			new campo_arqParcela_VPessoa(),
			new campo_arqParcela_Parcela(),
			new campo_arqParcela_Vencimento(),
			new campo_arqParcela_VencEst(),
			new campo_arqParcela_Valor(),
			new campo_arqParcela_ValorLiq(),
			new campo_arqParcela_Estimado(),
			new campo_arqParcela_TFCobra(),
			new Lance_CampoCadeia( "TFCobra_Chave", "TFCobra_Chave", "Chave", 1, "x", EH_CHAVE, TFCobra ),
			new Lance_CampoCadeia( "TFCobra_Descritor", "TFCobra_Descritor", "Descritor", 10, "xxxxxxxxxx", EH_DESCRITOR, TFCobra ),
			new campo_arqParcela_Emissao(),
			new campo_arqParcela_NumBoleto(),
			new campo_arqParcela_LinhaDig(),
			new campo_arqParcela_NomePdf(),
			new campo_arqParcela_CCor(),
			new campo_arqParcela_CCor_Nome(),
			new campo_arqParcela_SubPlano(),
			new campo_arqParcela_SubPlano_Plano(),
			new campo_arqParcela_SubPlano_Plano_CodPlano(),
			new campo_arqParcela_SubPlano_Plano_Plano(),
			new campo_arqParcela_SubPlano_Codigo(),
			new campo_arqParcela_SubPlano_Nome(),
			new campo_arqParcela_DataPagto(),
			new campo_arqParcela_DataComp(),
			new campo_arqParcela_TFPagto(),
			new Lance_CampoCadeia( "TFPagto_Chave", "TFPagto_Chave", "Chave", 1, "x", EH_CHAVE, TFPagto ),
			new Lance_CampoCadeia( "TFPagto_Descritor", "TFPagto_Descritor", "Descritor", 8, "xxxxxxxx", EH_DESCRITOR, TFPagto ),
			new campo_arqParcela_TDetPg(),
			new Lance_CampoCadeia( "TDetPg_Chave", "TDetPg_Chave", "Chave", 1, "x", EH_CHAVE, TDetPg ),
			new Lance_CampoCadeia( "TDetPg_Descritor", "TDetPg_Descritor", "Descritor", 14, "xxxxxxxxxxxxxx", EH_DESCRITOR, TDetPg ),
			new campo_arqParcela_FormaPg(),
			new campo_arqParcela_FormaPg_FormaPg(),
			new campo_arqParcela_Cheque(),
			new campo_arqParcela_Arq1(),
			new campo_arqParcela_StRetorno(),
			new campo_arqParcela_Remessa(),
			new campo_arqParcela_DataRem(),
			new campo_arqParcela_VHistConta(),
			new campo_arqParcela_Historico() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqParcela extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqParcela",  // Nome Interno do arquivo
			"a_parcel",  // Nome deste arquivo Php que cont�m o arquivo
			"Parcela",  // Nome do arquivo acentuado-se
			listaCampos_arqParcela( "" ), 34
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave �nica
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Conta_Transacao, Parcela ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Conta_Transacao ];
			$vetAux[] = [ VClinica ];
			$vetAux[] = [ VTPgRec ];
			$vetAux[] = [ VPessoa ];
			$vetAux[] = [ Parcela ];
			$vetAux[] = [ Vencimento ];
			$vetAux[] = [ Valor ];
			$vetAux[] = [ ValorLiq ];
			$vetAux[] = [ TFCobra_Descritor ];
			$vetAux[] = [ LinhaDig ];
			$vetAux[] = [ DataPagto ];
			$vetAux[] = [ VHistConta ];
			$vetAux[] = [ Historico ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Conta ], [ VencEst ], [ Estimado ], [ TFCobra ], [ TFCobra_Chave ], [ TFCobra_Descritor ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Conta_Transacao ];
			$vetAux[] = [ VClinica ];
			$vetAux[] = [ VTPgRec ];
			$vetAux[] = [ VPessoa ];
			$vetAux[] = [ Parcela ];
			$vetAux[] = [ Vencimento ];
			$vetAux[] = [ VencEst ];
			$vetAux[] = [ Valor ];
			$vetAux[] = [ ValorLiq ];
			$vetAux[] = [ Estimado ];
			$vetAux[] = [ TFCobra_Descritor ];
			$vetAux[] = [ Emissao ];
			$vetAux[] = [ NumBoleto ];
			$vetAux[] = [ LinhaDig ];
			$vetAux[] = [ NomePdf ];
			$vetAux[] = [ CCor_Nome ];
			$vetAux[] = [ SubPlano_Plano_CodPlano ];
			$vetAux[] = [ SubPlano_Plano_Plano ];
			$vetAux[] = [ SubPlano_Codigo ];
			$vetAux[] = [ SubPlano_Nome ];
			$vetAux[] = [ DataPagto ];
			$vetAux[] = [ DataComp ];
			$vetAux[] = [ TFPagto_Descritor ];
			$vetAux[] = [ TDetPg_Descritor ];
			$vetAux[] = [ FormaPg_FormaPg ];
			$vetAux[] = [ Cheque ];
			$vetAux[] = [ Arq1 ];
			$vetAux[] = [ StRetorno ];
			$vetAux[] = [ Remessa ];
			$vetAux[] = [ DataRem ];
			$vetAux[] = [ VHistConta ];
			$vetAux[] = [ Historico ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabe�alho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Parcelas' );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: FilTodas  
	//-------------------------------------------------------------
	function FilTodas()
	{
	return( "" . filtrarTodas() . "" );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: FilSel    
	//-------------------------------------------------------------
	function FilSel()
	{
	return( "" . filtrarSelecao() . "" );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: EhHoje    
	//-------------------------------------------------------------
	function EhHoje()
	{
	return( "Vencimento = current_date" );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: PgHoje    
	//-------------------------------------------------------------
	function PgHoje()
	{
	return( "" . $this->ContaPg() . "and ". $this->EhHoje() . "" );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: RecHoje   
	//-------------------------------------------------------------
	function RecHoje()
	{
	return( "" . $this->ContaRec() . "and ". $this->EhHoje() . "" );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: PgAtras   
	//-------------------------------------------------------------
	function PgAtras()
	{
	return( "". $this->ContaPg() . " and A.Vencimento < current_date and A.DataPagto is null" );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: RecAtras  
	//-------------------------------------------------------------
	function RecAtras()
	{
	return( "". $this->ContaRec() . " and A.Vencimento < current_date and A.DataPagto is null" );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: PgFuturo  
	//-------------------------------------------------------------
	function PgFuturo()
	{
	return( "". $this->ContaPg() . " and A.Vencimento > current_date and A.DataPagto is null" );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: RecFuturo 
	//-------------------------------------------------------------
	function RecFuturo()
	{
	return( "". $this->ContaRec() . " and A.Vencimento > current_date and A.DataPagto is null" );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: ContaPg   
	//-------------------------------------------------------------
	function ContaPg()
	{
	return( "(Select V.TPgRec From arqConta V Where V.idPrimario=A.Conta)=1" );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: ContaRec  
	//-------------------------------------------------------------
	function ContaRec()
	{
	return( "(Select V.TPgRec From arqConta V Where V.idPrimario=A.Conta)=2" );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: PagoNeg   
	//-------------------------------------------------------------
	function PagoNeg()
	{
	return( "DataPagto is null" );
	}

}
