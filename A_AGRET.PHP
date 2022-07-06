<?php

/*=========================================================================
  a_agret - AgRet
=========================================================================*/

if( DEF_a_agret == 1 )
  return;
define( "DEF_a_agret", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_agret_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Clinica
//======================================================

class campo_arqAgRet_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", EH_CHAVE, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqAgRet_Clinica_Clinica extends Lance_CampoCadeia
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
//	Campo Data
//======================================================

class campo_arqAgRet_Data extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Data", "Data", "Data", 8, "dd/mm/aaaa", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->TSTAGRET == 3 )
			return( "" );
		if( formatarData( $g_regAtual->DATA ) == HOJE )
			return( "DataHoje" );
		if( quantosDias( formatarData( $g_regAtual->DATA ), HOJE ) > 0 )
			return( "DataFutura" );
		if( quantosDias( formatarData( $g_regAtual->DATA ), HOJE ) < 0 && ( in_array( $g_regAtual->TSTAGRET, [1,2] ) || !tem( $g_regAtual->TSTAGRET ) ) )
			return( "DataAtrasada" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo Dia
//======================================================

class campo_arqAgRet_Dia extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Dia", "Dia", "Dia", 15, "xxxxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Dia Semana" );
	}

}

//======================================================
//	Campo Hora
//======================================================

class campo_arqAgRet_Hora extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "Hora", "Hora", "Hora", 4, "hh:mm", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo Consulta
//======================================================

class campo_arqAgRet_Consulta extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Consulta", "Consulta", "Consulta", 0, "arqConsulta", "arqConsulta.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
			return( "ValorAzulNegrito" );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Consulta" );
	}

}

//======================================================
//	Campo Consulta_Num
//======================================================

class campo_arqAgRet_Consulta_Num extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Consulta_Num", "Consulta_Num", "Num", 6, "###.##z", "", "", EH_CHAVE, "Consulta", false );
	}

}

//======================================================
//	Campo Pessoa
//======================================================

class campo_arqAgRet_Pessoa extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Pessoa", "Pessoa", "Pessoa", 0, "arqPessoa", "arqPessoa.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Pessoa_Nome
//======================================================

class campo_arqAgRet_Pessoa_Nome extends Lance_CampoCadeia
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

class campo_arqAgRet_Pessoa_NumCelular extends Lance_CampoCadeia
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
//	Campo Prontuario
//======================================================

class campo_arqAgRet_Prontuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Prontuario", "Prontuario", "Prontuario", 9, "xxxxxxxxx", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Prontuário" );
	}

}

//======================================================
//	Campo Nome
//======================================================

class campo_arqAgRet_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Nome", "Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo NumCelular
//======================================================

class campo_arqAgRet_NumCelular extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "NumCelular", "NumCelular", "NumCelular", 11, "(##) #.####.####", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Celular" );
	}

}

//======================================================
//	Campo TStAgRet
//======================================================

class campo_arqAgRet_TStAgRet extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TStAgRet", "TStAgRet", "TStAgRet", 0, "tabTStAgRet", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->TSTAGRET == 1 )
			return( "StAgRetRecepcao" );
		if( $g_regAtual->TSTAGRET == 2 )
			return( "StAgRetProcesso" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Status" );
	}

}

//======================================================
//	Campo Assessor
//======================================================

class campo_arqAgRet_Assessor extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Assessor", "Assessor", "Assessor", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Assessor" );
	}

}

//======================================================
//	Campo Assessor_Usuario
//======================================================

class campo_arqAgRet_Assessor_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Assessor_Usuario", "Assessor_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Assessor", false );
	}

}

//======================================================
//	Campo Obs
//======================================================

class campo_arqAgRet_Obs extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Obs", "Obs", "Obs", 8,80, false, false );
	}

}

//======================================================
//	Arquivo arqAgRet
//======================================================
function listaCampos_arqAgRet( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqAgRet_Clinica(),
			new campo_arqAgRet_Clinica_Clinica(),
			new campo_arqAgRet_Data(),
			new campo_arqAgRet_Dia(),
			new campo_arqAgRet_Hora(),
			new campo_arqAgRet_Consulta(),
			new campo_arqAgRet_Consulta_Num(),
			new campo_arqAgRet_Pessoa(),
			new campo_arqAgRet_Pessoa_Nome(),
			new campo_arqAgRet_Pessoa_NumCelular(),
			new campo_arqAgRet_Prontuario(),
			new campo_arqAgRet_Nome(),
			new campo_arqAgRet_NumCelular(),
			new campo_arqAgRet_TStAgRet(),
			new Lance_CampoCadeia( "TStAgRet_Chave", "TStAgRet_Chave", "Chave", 1, "x", EH_CHAVE, TStAgRet ),
			new Lance_CampoCadeia( "TStAgRet_Descritor", "TStAgRet_Descritor", "Descritor", 11, "xxxxxxxxxxx", EH_DESCRITOR, TStAgRet ),
			new campo_arqAgRet_Assessor(),
			new campo_arqAgRet_Assessor_Usuario(),
			new campo_arqAgRet_Obs() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqAgRet extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqAgRet",  // Nome Interno do arquivo
			"a_agret",  // Nome deste arquivo Php que contém o arquivo
			"AgRet",  // Nome do arquivo acentuado-se
			listaCampos_arqAgRet( "" ), 53
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Clinica_Clinica, Data, Hora ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ Data ];
			$vetAux[] = [ Dia ];
			$vetAux[] = [ Hora ];
			$vetAux[] = [ Consulta_Num ];
			$vetAux[] = [ Prontuario ];
			$vetAux[] = [ Nome ];
			$vetAux[] = [ NumCelular ];
			$vetAux[] = [ TStAgRet_Descritor ];
			$vetAux[] = [ Assessor_Usuario ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Clinica ], [ Consulta ], [ TStAgRet ], [ TStAgRet_Chave ], [ TStAgRet_Descritor ], [ Assessor ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Clinica_Clinica ];
			$vetAux[] = [ Data ];
			$vetAux[] = [ Dia ];
			$vetAux[] = [ Hora ];
			$vetAux[] = [ Consulta_Num ];
			$vetAux[] = [ Pessoa_Nome ];
			$vetAux[] = [ Pessoa_NumCelular ];
			$vetAux[] = [ Prontuario ];
			$vetAux[] = [ Nome ];
			$vetAux[] = [ NumCelular ];
			$vetAux[] = [ TStAgRet_Descritor ];
			$vetAux[] = [ Assessor_Usuario ];
			$vetAux[] = [ Obs ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Agendas de retirada de medicação' );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: FilTodas  
	//-------------------------------------------------------------
	function FilTodas()
	{
	return( "" . ext_filtrarTodas() . "" );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: FilSel    
	//-------------------------------------------------------------
	function FilSel()
	{
	return( "" . ext_filtrarSelecao() . "" );
	}

}
