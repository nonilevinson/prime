<?php

/*=========================================================================
  a_consul - Consulta
=========================================================================*/

if( DEF_a_consul == 1 )
  return;
define( "DEF_a_consul", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_consul_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Num
//======================================================

class campo_arqConsulta_Num extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Num", "Num", "Num", 6, "###.##z", "", "", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "N°" );
	}

}

//======================================================
//	Campo Clinica
//======================================================

class campo_arqConsulta_Clinica extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Clinica", "Clinica", "Clinica", 0, "arqClinica", "arqClinica.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Clinica_Clinica
//======================================================

class campo_arqConsulta_Clinica_Clinica extends Lance_CampoCadeia
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
//	Campo TStCon
//======================================================

class campo_arqConsulta_TStCon extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TStCon", "TStCon", "TStCon", 0, "tabTStCon", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->TSTCON == 1 )
			return( "StAgendado" );
		if( $g_regAtual->TSTCON == 2 )
			return( "StRecepcao" );
		if( $g_regAtual->TSTCON == 3 )
			return( "StMedico" );
		if( $g_regAtual->TSTCON == 4 )
			return( "StTeste" );
		if( $g_regAtual->TSTCON == 5 )
			return( "StAgAssessor" );
		if( $g_regAtual->TSTCON == 6 )
			return( "StAssessor" );
		if( $g_regAtual->TSTCON == 7 )
			return( "StAtendido" );
		if( $g_regAtual->TSTCON == 8 )
			return( "StLiberado" );
		if( $g_regAtual->TSTCON == 9 )
			return( "StClinicaDesmarcou" );
		if( $g_regAtual->TSTCON == 10 )
			return( "StPacienteDesmarcou" );
		if( $g_regAtual->TSTCON == 11 )
			return( "StMedicoDesmarcou" );
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
//	Campo TiAgenda
//======================================================

class campo_arqConsulta_TiAgenda extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TiAgenda", "TiAgenda", "TiAgenda", 0, "arqTiAgenda", "arqTiAgenda.IdPrimario DESC", LANCE_LIG_SELECAO, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Tipo" );
	}

}

//======================================================
//	Campo TiAgenda_TiAgenda
//======================================================

class campo_arqConsulta_TiAgenda_TiAgenda extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "TiAgenda_TiAgenda", "TiAgenda_TiAgenda", "TiAgenda", 20, "xxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "TiAgenda", false );
	}

}

//======================================================
//	Campo Data
//======================================================

class campo_arqConsulta_Data extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Data", "Data", "Data", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( formatarData( $g_regAtual->DATA ) == HOJE )
			return( "DataHoje" );
		if( quantosDias( formatarData( $g_regAtual->DATA ), HOJE ) > 0 )
			return( "DataFutura" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo Hora
//======================================================

class campo_arqConsulta_Hora extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "Hora", "Hora", "Hora", 4, "hh:mm", 0, 0, false );
	}

}

//======================================================
//	Campo HoraChega
//======================================================

class campo_arqConsulta_HoraChega extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "HoraChega", "HoraChega", "HoraChega", 4, "hh:mm", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Chegou às" );
	}

}

//======================================================
//	Campo Pessoa
//======================================================

class campo_arqConsulta_Pessoa extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Pessoa", "Pessoa", "Pessoa", 0, "arqPessoa", "arqPessoa.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Paciente" );
	}

}

//======================================================
//	Campo Pessoa_Nome
//======================================================

class campo_arqConsulta_Pessoa_Nome extends Lance_CampoCadeia
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

class campo_arqConsulta_Pessoa_NumCelular extends Lance_CampoCadeia
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

class campo_arqConsulta_Prontuario extends Lance_CampoCadeia
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
//	Campo Medico
//======================================================

class campo_arqConsulta_Medico extends Lance_CampoLigado
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

class campo_arqConsulta_Medico_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Medico_Usuario", "Medico_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Medico", false );
	}

}

//======================================================
//	Campo Assessor
//======================================================

class campo_arqConsulta_Assessor extends Lance_CampoLigado
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

class campo_arqConsulta_Assessor_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Assessor_Usuario", "Assessor_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Assessor", false );
	}

}

//======================================================
//	Campo MedicaAtua
//======================================================

class campo_arqConsulta_MedicaAtua extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "MedicaAtua", "MedicaAtua", "MedicaAtua", 10,90, false, false );
	}

}

//======================================================
//	Campo TMotivo
//======================================================

class campo_arqConsulta_TMotivo extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TMotivo", "TMotivo", "TMotivo", 0, "tabTMotivo", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Motivo" );
	}

}

//======================================================
//	Campo TPrograma
//======================================================

class campo_arqConsulta_TPrograma extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "TPrograma", "TPrograma", "TPrograma", 0, "tabTPrograma", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Programa" );
	}

}

//======================================================
//	Campo Conduta
//======================================================

class campo_arqConsulta_Conduta extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Conduta", "Conduta", "Conduta", 10,90, false, false );
	}

}

//======================================================
//	Campo Medicacao
//======================================================

class campo_arqConsulta_Medicacao extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Medicacao", "Medicacao", "Medicacao", 10,90, false, false );
	}

}

//======================================================
//	Campo FormaPg
//======================================================

class campo_arqConsulta_FormaPg extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "FormaPg", "FormaPg", "FormaPg", 0, "arqFormaPg", "arqFormaPg.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Forma Pagto" );
	}

}

//======================================================
//	Campo FormaPg_FormaPg
//======================================================

class campo_arqConsulta_FormaPg_FormaPg extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "FormaPg_FormaPg", "FormaPg_FormaPg", "FormaPg", 30, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "FormaPg", false );
	}

}

//======================================================
//	Campo Obs
//======================================================

class campo_arqConsulta_Obs extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Obs", "Obs", "Obs", 10,80, false, false );
	}

}

//======================================================
//	Campo Valor
//======================================================

class campo_arqConsulta_Valor extends Lance_CampoNumerico
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
//	Arquivo arqConsulta
//======================================================
function listaCampos_arqConsulta( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqConsulta_Num(),
			new campo_arqConsulta_Clinica(),
			new campo_arqConsulta_Clinica_Clinica(),
			new campo_arqConsulta_TStCon(),
			new Lance_CampoCadeia( "TStCon_Chave", "TStCon_Chave", "Chave", 2, "xx", EH_CHAVE, TStCon ),
			new Lance_CampoCadeia( "TStCon_Descritor", "TStCon_Descritor", "Descritor", 18, "xxxxxxxxxxxxxxxxxx", EH_DESCRITOR, TStCon ),
			new campo_arqConsulta_TiAgenda(),
			new campo_arqConsulta_TiAgenda_TiAgenda(),
			new campo_arqConsulta_Data(),
			new campo_arqConsulta_Hora(),
			new campo_arqConsulta_HoraChega(),
			new campo_arqConsulta_Pessoa(),
			new campo_arqConsulta_Pessoa_Nome(),
			new campo_arqConsulta_Pessoa_NumCelular(),
			new campo_arqConsulta_Prontuario(),
			new campo_arqConsulta_Medico(),
			new campo_arqConsulta_Medico_Usuario(),
			new campo_arqConsulta_Assessor(),
			new campo_arqConsulta_Assessor_Usuario(),
			new campo_arqConsulta_MedicaAtua(),
			new campo_arqConsulta_TMotivo(),
			new Lance_CampoCadeia( "TMotivo_Chave", "TMotivo_Chave", "Chave", 1, "x", EH_CHAVE, TMotivo ),
			new Lance_CampoCadeia( "TMotivo_Descritor", "TMotivo_Descritor", "Descritor", 32, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_DESCRITOR, TMotivo ),
			new campo_arqConsulta_TPrograma(),
			new Lance_CampoCadeia( "TPrograma_Chave", "TPrograma_Chave", "Chave", 2, "xx", EH_CHAVE, TPrograma ),
			new Lance_CampoCadeia( "TPrograma_Descritor", "TPrograma_Descritor", "Descritor", 8, "xxxxxxxx", EH_DESCRITOR, TPrograma ),
			new campo_arqConsulta_Conduta(),
			new campo_arqConsulta_Medicacao(),
			new campo_arqConsulta_FormaPg(),
			new campo_arqConsulta_FormaPg_FormaPg(),
			new campo_arqConsulta_Obs(),
			new campo_arqConsulta_Valor() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqConsulta extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqConsulta",  // Nome Interno do arquivo
			"a_consul",  // Nome deste arquivo Php que contém o arquivo
			"Consulta",  // Nome do arquivo acentuado-se
			listaCampos_arqConsulta( "" ), 39
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Num) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Num ) );
			array_push( $vetAux, array( Clinica_Clinica ) );
			array_push( $vetAux, array( TStCon_Descritor ) );
			array_push( $vetAux, array( TiAgenda_TiAgenda ) );
			array_push( $vetAux, array( Data ) );
			array_push( $vetAux, array( Hora ) );
			array_push( $vetAux, array( HoraChega ) );
			array_push( $vetAux, array( Pessoa_Nome ) );
			array_push( $vetAux, array( Pessoa_NumCelular ) );
			array_push( $vetAux, array( Prontuario ) );
			array_push( $vetAux, array( Medico_Usuario ) );
			array_push( $vetAux, array( Assessor_Usuario ) );
			array_push( $vetAux, array( TMotivo_Descritor ) );
			array_push( $vetAux, array( TPrograma_Descritor ) );
			array_push( $vetAux, array( FormaPg_FormaPg ) );
			array_push( $vetAux, array( Valor ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( Clinica ), array( TStCon ), array( TStCon_Chave ), array( TStCon_Descritor ), array( TiAgenda ), array( Pessoa ), array( Medico ), array( Assessor ), array( TMotivo ), array( TMotivo_Chave ), array( TMotivo_Descritor ), array( TPrograma ), array( TPrograma_Chave ), array( TPrograma_Descritor ), array( FormaPg ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Num ) );
			array_push( $vetAux, array( Clinica_Clinica ) );
			array_push( $vetAux, array( TStCon_Descritor ) );
			array_push( $vetAux, array( TiAgenda_TiAgenda ) );
			array_push( $vetAux, array( Data ) );
			array_push( $vetAux, array( Hora ) );
			array_push( $vetAux, array( HoraChega ) );
			array_push( $vetAux, array( Pessoa_Nome ) );
			array_push( $vetAux, array( Pessoa_NumCelular ) );
			array_push( $vetAux, array( Prontuario ) );
			array_push( $vetAux, array( Medico_Usuario ) );
			array_push( $vetAux, array( Assessor_Usuario ) );
			array_push( $vetAux, array( MedicaAtua ) );
			array_push( $vetAux, array( TMotivo_Descritor ) );
			array_push( $vetAux, array( TPrograma_Descritor ) );
			array_push( $vetAux, array( Conduta ) );
			array_push( $vetAux, array( Medicacao ) );
			array_push( $vetAux, array( FormaPg_FormaPg ) );
			array_push( $vetAux, array( Obs ) );
			array_push( $vetAux, array( Valor ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Acionar
	//-------------------------------------------------------------
	function AcionarBotao( $p_tecla )
	{
		switch( $p_tecla )
		{
			case _INS: return( false );
		}
		return( parent::AcionarBotao( $p_tecla ) );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Consultas' );
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
?>
