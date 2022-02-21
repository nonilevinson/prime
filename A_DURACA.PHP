<?php

/*=========================================================================
  a_duraca - Duracao
=========================================================================*/

if( DEF_a_duraca == 1 )
  return;
define( "DEF_a_duraca", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_duraca_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Clinica
//======================================================

class campo_arqDuracao_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqDuracao_Clinica_Clinica extends Lance_CampoCadeia
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
//	Campo Inicio
//======================================================

class campo_arqDuracao_Inicio extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Inicio", "Inicio", "Inicio", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Início" );
	}

}

//======================================================
//	Campo HoraIni
//======================================================

class campo_arqDuracao_HoraIni extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "HoraIni", "HoraIni", "HoraIni", 4, "hh:mm", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Início" );
	}

}

//======================================================
//	Campo HoraFim
//======================================================

class campo_arqDuracao_HoraFim extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "HoraFim", "HoraFim", "HoraFim", 4, "hh:mm", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Fim" );
	}

}

//======================================================
//	Campo ConsSab
//======================================================

class campo_arqDuracao_ConsSab extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "ConsSab", "ConsSab", "ConsSab", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Sábado?" );
	}

}

//======================================================
//	Campo ConsDom
//======================================================

class campo_arqDuracao_ConsDom extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "ConsDom", "ConsDom", "ConsDom", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Domingo?" );
	}

}

//======================================================
//	Campo Duracao
//======================================================

class campo_arqDuracao_Duracao extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Duracao", "Duracao", "Duracao", 2, "#z", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Duração" );
	}

}

//======================================================
//	Arquivo arqDuracao
//======================================================
function listaCampos_arqDuracao( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqDuracao_Clinica(),
			new campo_arqDuracao_Clinica_Clinica(),
			new campo_arqDuracao_Inicio(),
			new campo_arqDuracao_HoraIni(),
			new campo_arqDuracao_HoraFim(),
			new campo_arqDuracao_ConsSab(),
			new campo_arqDuracao_ConsDom(),
			new campo_arqDuracao_Duracao() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqDuracao extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqDuracao",  // Nome Interno do arquivo
			"a_duraca",  // Nome deste arquivo Php que contém o arquivo
			"Duracao",  // Nome do arquivo acentuado-se
			listaCampos_arqDuracao( "" ), 38
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
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
			$vetAux[] = [ Inicio ];
			$vetAux[] = [ HoraIni ];
			$vetAux[] = [ HoraFim ];
			$vetAux[] = [ ConsSab ];
			$vetAux[] = [ ConsDom ];
			$vetAux[] = [ Duracao ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Clinica ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ Inicio ];
			$vetAux[] = [ HoraIni ];
			$vetAux[] = [ HoraFim ];
			$vetAux[] = [ ConsSab ];
			$vetAux[] = [ ConsDom ];
			$vetAux[] = [ Duracao ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Duração de uma consulta' );
	}

}
