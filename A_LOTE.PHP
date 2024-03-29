<?php

/*=========================================================================
  a_lote - Lote
=========================================================================*/

if( DEF_a_lote == 1 )
  return;
define( "DEF_a_lote", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_lote_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Medicamen
//======================================================

class campo_arqLote_Medicamen extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Medicamen", "Medicamen", "Medicamen", EH_CHAVE, "arqMedicamen", "arqMedicamen.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Medicamen_Medicamen
//======================================================

class campo_arqLote_Medicamen_Medicamen extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Medicamen_Medicamen", "Medicamen_Medicamen", "Medicamen", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Medicamen", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Medicamento" );
	}

}

//======================================================
//	Campo Lote
//======================================================

class campo_arqLote_Lote extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Lote", "Lote", "Lote", 15, "xxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo Clinica
//======================================================

class campo_arqLote_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Cl�nica" );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqLote_Clinica_Clinica extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Clinica_Clinica", "Clinica_Clinica", "Clinica", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Clinica", false );
	}

}

//======================================================
//	Campo Fornecedor
//======================================================

class campo_arqLote_Fornecedor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Fornecedor", "Fornecedor", "Fornecedor", 0, "arqFornecedor", "arqFornecedor.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Fornecedor_Nome
//======================================================

class campo_arqLote_Fornecedor_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Fornecedor_Nome", "Fornecedor_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Fornecedor", false );
	}

}

//======================================================
//	Campo Fabrica
//======================================================

class campo_arqLote_Fabrica extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Fabrica", "Fabrica", "Fabrica", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Fabrica��o" );
	}

}

//======================================================
//	Campo Validade
//======================================================

class campo_arqLote_Validade extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Validade", "Validade", "Validade", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->ESTOQUE > 0 && quantosDias( formatarData( $g_regAtual->VALIDADE ), HOJE ) < 0 )
			return( "DataAtrasada" );
		if( formatarData( $g_regAtual->VALIDADE ) == HOJE )
			return( "DataHoje" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo TrgItMov
//======================================================

class campo_arqLote_TrgItMov extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "TrgItMov", "TrgItMov", "TrgItMov", 4, "#.##z", "(", "", EH_TOTALIZADO, 0, false );
	}

}

//======================================================
//	Campo TrgCMedica
//======================================================

class campo_arqLote_TrgCMedica extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "TrgCMedica", "TrgCMedica", "TrgCMedica", 4, "#.##z", "", "", EH_TOTALIZADO, 0, false );
	}

}

//======================================================
//	Campo Estoque
//======================================================

class campo_arqLote_Estoque extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Estoque", "Estoque", "Estoque", 4, "#.##z", "(", "", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function PodeTotalizar()
	{
		global $g_regAtual;
		return( (true) );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqLote_Ativo extends Lance_CampoLogico
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
			return( "Ativo?" );
	}

}

//======================================================
//	Arquivo arqLote
//======================================================
function listaCampos_arqLote( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqLote_Medicamen(),
			new campo_arqLote_Medicamen_Medicamen(),
			new campo_arqLote_Lote(),
			new campo_arqLote_Clinica(),
			new campo_arqLote_Clinica_Clinica(),
			new campo_arqLote_Fornecedor(),
			new campo_arqLote_Fornecedor_Nome(),
			new campo_arqLote_Fabrica(),
			new campo_arqLote_Validade(),
			new campo_arqLote_TrgItMov(),
			new campo_arqLote_TrgCMedica(),
			new campo_arqLote_Estoque(),
			new campo_arqLote_Ativo() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqLote extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqLote",  // Nome Interno do arquivo
			"a_lote",  // Nome deste arquivo Php que cont�m o arquivo
			"Lote",  // Nome do arquivo acentuado-se
			listaCampos_arqLote( "" ), 55
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave �nica
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Medicamen_Medicamen, Lote ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Medicamen_Medicamen ];
			$vetAux[] = [ Lote ];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ Fornecedor_Nome ];
			$vetAux[] = [ Fabrica ];
			$vetAux[] = [ Validade ];
			$vetAux[] = [ Estoque ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Medicamen ], [ Clinica ], [ Fornecedor ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Medicamen_Medicamen ];
			$vetAux[] = [ Lote ];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ Fornecedor_Nome ];
			$vetAux[] = [ Fabrica ];
			$vetAux[] = [ Validade ];
			$vetAux[] = [ TrgItMov ];
			$vetAux[] = [ TrgCMedica ];
			$vetAux[] = [ Estoque ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabe�alho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Lotes' );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: FilTodos  
	//-------------------------------------------------------------
	function FilTodos()
	{
	return( "" . filtrarTodos() . "" );
	}

	//-------------------------------------------------------------
	// Vis�es do Arquivo: FilSel    
	//-------------------------------------------------------------
	function FilSel()
	{
	return( "" . filtrarSelecao() . "" );
	}

}
