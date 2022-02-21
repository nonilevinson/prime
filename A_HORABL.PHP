<?php

/*=========================================================================
  a_horabl - HoraBloq
=========================================================================*/

if( DEF_a_horabl == 1 )
  return;
define( "DEF_a_horabl", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_horabl_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Clinica
//======================================================

class campo_arqHoraBloq_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqHoraBloq_Clinica_Clinica extends Lance_CampoCadeia
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
//	Campo Nome
//======================================================

class campo_arqHoraBloq_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Nome", "Nome", "Nome", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo DataIni
//======================================================

class campo_arqHoraBloq_DataIni extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataIni", "DataIni", "DataIni", 8, "dd/mm/aaaa", 0, 0, false );
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

class campo_arqHoraBloq_HoraIni extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "HoraIni", "HoraIni", "HoraIni", 4, "hh:mm", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Das" );
	}

}

//======================================================
//	Campo DataFim
//======================================================

class campo_arqHoraBloq_DataFim extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "DataFim", "DataFim", "DataFim", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Final" );
	}

}

//======================================================
//	Campo HoraFim
//======================================================

class campo_arqHoraBloq_HoraFim extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "HoraFim", "HoraFim", "HoraFim", 4, "hh:mm", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Às" );
	}

}

//======================================================
//	Campo Medico
//======================================================

class campo_arqHoraBloq_Medico extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Medico", "Medico", "Medico", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Médico" );
	}

}

//======================================================
//	Campo Medico_Usuario
//======================================================

class campo_arqHoraBloq_Medico_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Medico_Usuario", "Medico_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Medico", false );
	}

}

//======================================================
//	Arquivo arqHoraBloq
//======================================================
function listaCampos_arqHoraBloq( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqHoraBloq_Clinica(),
			new campo_arqHoraBloq_Clinica_Clinica(),
			new campo_arqHoraBloq_Nome(),
			new campo_arqHoraBloq_DataIni(),
			new campo_arqHoraBloq_HoraIni(),
			new campo_arqHoraBloq_DataFim(),
			new campo_arqHoraBloq_HoraFim(),
			new campo_arqHoraBloq_Medico(),
			new campo_arqHoraBloq_Medico_Usuario() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqHoraBloq extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqHoraBloq",  // Nome Interno do arquivo
			"a_horabl",  // Nome deste arquivo Php que contém o arquivo
			"HoraBloq",  // Nome do arquivo acentuado-se
			listaCampos_arqHoraBloq( "" ), 37
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
			$vetAux[] = [ Nome ];
			$vetAux[] = [ DataIni ];
			$vetAux[] = [ HoraIni ];
			$vetAux[] = [ DataFim ];
			$vetAux[] = [ HoraFim ];
			$vetAux[] = [ Medico_Usuario ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Clinica ], [ Medico ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ Nome ];
			$vetAux[] = [ DataIni ];
			$vetAux[] = [ HoraIni ];
			$vetAux[] = [ DataFim ];
			$vetAux[] = [ HoraFim ];
			$vetAux[] = [ Medico_Usuario ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Horários bloqueados' );
	}

}
