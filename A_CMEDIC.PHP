<?php

/*=========================================================================
  a_cmedic - CMedica
=========================================================================*/

if( DEF_a_cmedic == 1 )
  return;
define( "DEF_a_cmedic", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_cmedic_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Consulta
//======================================================

class campo_arqCMedica_Consulta extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Consulta", "Consulta", "Consulta", EH_CHAVE, "arqConsulta", "arqConsulta.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Consulta_Num
//======================================================

class campo_arqCMedica_Consulta_Num extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Consulta_Num", "Consulta_Num", "Num", 6, "###.##z", "", "", EH_CHAVE, "Consulta", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "N°" );
	}

}

//======================================================
//	Campo Medicamen
//======================================================

class campo_arqCMedica_Medicamen extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Medicamen", "Medicamen", "Medicamen", EH_CHAVE, "arqMedicamen", "arqMedicamen.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Medicação" );
	}

	//--------------------------------------------------
	function PegaPai()
	{
		global $g_regAtual;
		$vetPai = array();
			array_push( $vetPai, 
				array( "Unidade", 
					"A.Medicamen, arqMedicamen.Unidade, arqUnidade",
					"1" ) );
		return( $vetPai );
	}

}

//======================================================
//	Campo Medicamen_Medicamen
//======================================================

class campo_arqCMedica_Medicamen_Medicamen extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Medicamen_Medicamen", "Medicamen_Medicamen", "Medicamen", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Medicamen", false );
	}

}

//======================================================
//	Campo UnidadeCal
//======================================================

class campo_arqCMedica_UnidadeCal extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "UnidadeCal", "UnidadeCal", "UnidadeCal", 10, "xxxxxxxxxx", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Unidade" );
	}

}

//======================================================
//	Campo Qtd
//======================================================

class campo_arqCMedica_Qtd extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Qtd", "Qtd", "Qtd", 4, "#.##z", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Qtd<br>Prescrito" );
	}

}

//======================================================
//	Campo Lote
//======================================================

class campo_arqCMedica_Lote extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Lote", "Lote", "Lote", 0, "arqLote", "arqLote.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Lote_Medicam
//======================================================

class campo_arqCMedica_Lote_Medicam extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Lote_Medicam", "Lote_Medicam", "Medicam", EH_CHAVE, "arqMedicamen", "arqMedicamen.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, "Lote", false );
	}

}

//======================================================
//	Campo Lote_Medicam_Medicamen
//======================================================

class campo_arqCMedica_Lote_Medicam_Medicamen extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Lote_Medicam_Medicamen", "Lote_Medicam_Medicamen", "Medicamen", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Lote_Medicam", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Medicamento" );
	}

}

//======================================================
//	Campo Lote_Lote
//======================================================

class campo_arqCMedica_Lote_Lote extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Lote_Lote", "Lote_Lote", "Lote", 15, "xxxxxxxxxxxxxxx", EH_CHAVE, "Lote", false );
	}

}

//======================================================
//	Campo DataSepara
//======================================================

class campo_arqCMedica_DataSepara extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataSepara", "DataSepara", "DataSepara", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo QtdEntreg
//======================================================

class campo_arqCMedica_QtdEntreg extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "QtdEntreg", "QtdEntreg", "QtdEntreg", 4, "#.##z", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function PodeTotalizar()
	{
		global $g_regAtual;
		return( (true) );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Qtd<br>Entregue" );
	}

}

//======================================================
//	Campo Saldo
//======================================================

class campo_arqCMedica_Saldo extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Saldo", "Saldo", "Saldo", 4, "#.##z", "(", "", EH_CALCULADO, 0, false );
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
		if( $g_regAtual->SALDO < 0 )
			return( "VermelhoFundoDir" );
		if( $g_regAtual->SALDO > 0 )
			return( "AzulFundoDir" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo ObsEntreg
//======================================================

class campo_arqCMedica_ObsEntreg extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "ObsEntreg", "ObsEntreg", "ObsEntreg", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Arquivo arqCMedica
//======================================================
function listaCampos_arqCMedica( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqCMedica_Consulta(),
			new campo_arqCMedica_Consulta_Num(),
			new campo_arqCMedica_Medicamen(),
			new campo_arqCMedica_Medicamen_Medicamen(),
			new campo_arqCMedica_UnidadeCal(),
			new campo_arqCMedica_Qtd(),
			new campo_arqCMedica_Lote(),
			new campo_arqCMedica_Lote_Medicam(),
			new campo_arqCMedica_Lote_Medicam_Medicamen(),
			new campo_arqCMedica_Lote_Lote(),
			new campo_arqCMedica_DataSepara(),
			new campo_arqCMedica_QtdEntreg(),
			new campo_arqCMedica_Saldo(),
			new campo_arqCMedica_ObsEntreg() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqCMedica extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqCMedica",  // Nome Interno do arquivo
			"a_cmedic",  // Nome deste arquivo Php que contém o arquivo
			"CMedica",  // Nome do arquivo acentuado-se
			listaCampos_arqCMedica( "" ), 54
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Consulta_Num, Medicamen_Medicamen) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Consulta_Num ) );
			array_push( $vetAux, array( Medicamen_Medicamen ) );
			array_push( $vetAux, array( UnidadeCal ) );
			array_push( $vetAux, array( Qtd ) );
			array_push( $vetAux, array( Lote_Medicam_Medicamen ) );
			array_push( $vetAux, array( Lote_Lote ) );
			array_push( $vetAux, array( QtdEntreg ) );
			array_push( $vetAux, array( Saldo ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( Consulta ), array( Medicamen ), array( Lote ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Consulta_Num ) );
			array_push( $vetAux, array( Medicamen_Medicamen ) );
			array_push( $vetAux, array( UnidadeCal ) );
			array_push( $vetAux, array( Qtd ) );
			array_push( $vetAux, array( Lote_Medicam_Medicamen ) );
			array_push( $vetAux, array( Lote_Lote ) );
			array_push( $vetAux, array( DataSepara ) );
			array_push( $vetAux, array( QtdEntreg ) );
			array_push( $vetAux, array( Saldo ) );
			array_push( $vetAux, array( ObsEntreg ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Medicação da consulta' );
	}

}
?>
