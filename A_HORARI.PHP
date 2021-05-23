<?php

/*=========================================================================
  a_horari - Horario
=========================================================================*/

if( DEF_a_horari == 1 )
  return;
define( "DEF_a_horari", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_horari_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Usuario
//======================================================

class campo_arqHorario_Usuario extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Usuario", "Usuario", "Usuario", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Médico" );
	}

}

//======================================================
//	Campo Usuario_Usuario
//======================================================

class campo_arqHorario_Usuario_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Usuario_Usuario", "Usuario_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Usuario", false );
	}

}

//======================================================
//	Campo Clinica
//======================================================

class campo_arqHorario_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqHorario_Clinica_Clinica extends Lance_CampoCadeia
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
//	Campo TDiaSem
//======================================================

class campo_arqHorario_TDiaSem extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TDiaSem", "TDiaSem", "TDiaSem", 0, "tabTDiaSem", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Dia" );
	}

}

//======================================================
//	Campo HoraIni
//======================================================

class campo_arqHorario_HoraIni extends Lance_CampoHora
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

class campo_arqHorario_HoraFim extends Lance_CampoHora
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
//	Campo DiaIni
//======================================================

class campo_arqHorario_DiaIni extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DiaIni", "DiaIni", "DiaIni", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Válido de" );
	}

}

//======================================================
//	Campo DiaFim
//======================================================

class campo_arqHorario_DiaFim extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DiaFim", "DiaFim", "DiaFim", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Até" );
	}

}

//======================================================
//	Arquivo arqHorario
//======================================================
function listaCampos_arqHorario( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqHorario_Usuario(),
			new campo_arqHorario_Usuario_Usuario(),
			new campo_arqHorario_Clinica(),
			new campo_arqHorario_Clinica_Clinica(),
			new campo_arqHorario_TDiaSem(),
			new Lance_CampoCadeia( "TDiaSem_Chave", "TDiaSem_Chave", "Chave", 1, "x", EH_CHAVE, TDiaSem ),
			new Lance_CampoCadeia( "TDiaSem_Descritor", "TDiaSem_Descritor", "Descritor", 8, "xxxxxxxx", EH_DESCRITOR, TDiaSem ),
			new campo_arqHorario_HoraIni(),
			new campo_arqHorario_HoraFim(),
			new campo_arqHorario_DiaIni(),
			new campo_arqHorario_DiaFim() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqHorario extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqHorario",  // Nome Interno do arquivo
			"a_horari",  // Nome deste arquivo Php que contém o arquivo
			"Horario",  // Nome do arquivo acentuado-se
			listaCampos_arqHorario( "" ), 37
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( ) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Usuario_Usuario ) );
			array_push( $vetAux, array( Clinica_Clinica ) );
			array_push( $vetAux, array( TDiaSem_Descritor ) );
			array_push( $vetAux, array( HoraIni ) );
			array_push( $vetAux, array( HoraFim ) );
			array_push( $vetAux, array( DiaIni ) );
			array_push( $vetAux, array( DiaFim ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( Usuario ), array( Clinica ), array( TDiaSem ), array( TDiaSem_Chave ), array( TDiaSem_Descritor ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Usuario_Usuario ) );
			array_push( $vetAux, array( Clinica_Clinica ) );
			array_push( $vetAux, array( TDiaSem_Descritor ) );
			array_push( $vetAux, array( HoraIni ) );
			array_push( $vetAux, array( HoraFim ) );
			array_push( $vetAux, array( DiaIni ) );
			array_push( $vetAux, array( DiaFim ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Horários' );
	}

}
?>
