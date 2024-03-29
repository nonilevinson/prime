<?php

/*=========================================================================
  a_itloge - ItLogEmail
=========================================================================*/

if( DEF_a_itloge == 1 )
  return;
define( "DEF_a_itloge", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_itloge_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo LogEmail
//======================================================

class campo_arqItLogEmail_LogEmail extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "LogEmail", "LogEmail", "LogEmail", 0, "arqLogEmail", "arqLogEmail.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Programado" );
	}

}

//======================================================
//	Campo LogEmail_Titulo
//======================================================

class campo_arqItLogEmail_LogEmail_Titulo extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "LogEmail_Titulo", "LogEmail_Titulo", "Titulo", EH_CHAVE, "arqAcaoEmail", "arqAcaoEmail.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, "LogEmail", false );
	}

}

//======================================================
//	Campo LogEmail_Titulo_Titulo
//======================================================

class campo_arqItLogEmail_LogEmail_Titulo_Titulo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "LogEmail_Titulo_Titulo", "LogEmail_Titulo_Titulo", "T�tulo", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "LogEmail_Titulo", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Assunto do email" );
	}

}

//======================================================
//	Campo LogEmail_Titulo_Versao
//======================================================

class campo_arqItLogEmail_LogEmail_Titulo_Versao extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "LogEmail_Titulo_Versao", "LogEmail_Titulo_Versao", "Vers�o", 20, "xxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "LogEmail_Titulo", false );
	}

}

//======================================================
//	Campo LogEmail_Data
//======================================================

class campo_arqItLogEmail_LogEmail_Data extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "LogEmail_Data", "LogEmail_Data", "Data", 8, "dd/mm/aaaa", EH_CHAVE, "LogEmail", false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( formatarData( $g_regAtual->LOGEMAIL_DATA ) == HOJE )
			return( "DiaHoje" );
		if( quantosDias( formatarData( $g_regAtual->LOGEMAIL_DATA ), HOJE ) > 0 )
			return( "DiaFuturo" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo LogEmail_Hora
//======================================================

class campo_arqItLogEmail_LogEmail_Hora extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "LogEmail_Hora", "LogEmail_Hora", "Hora", 6, "hh:mm:ss", EH_CHAVE, "LogEmail", false );
	}

}

//======================================================
//	Campo Cliente
//======================================================

class campo_arqItLogEmail_Cliente extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cliente", "Cliente", "Cliente", 0, "arqPessoa", "arqPessoa.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Cliente_Nome
//======================================================

class campo_arqItLogEmail_Cliente_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cliente_Nome", "Cliente_Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Cliente", false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->CLIENTE_QTODESMAR >= G_QTASDESMAR )
			return( "VermelhoFundoEsq" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo Cliente_NumCelular
//======================================================

class campo_arqItLogEmail_Cliente_NumCelular extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Cliente_NumCelular", "Cliente_NumCelular", "NumCelular", 11, "(##) #.####.####", EH_CHAVE, "Cliente", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Celular" );
	}

}

//======================================================
//	Campo Email
//======================================================

class campo_arqItLogEmail_Email extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Email", "Email", "Email", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Enviado
//======================================================

class campo_arqItLogEmail_Enviado extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Enviado", "Enviado", "Enviado", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->ENVIADO == 0 )
			return( "CorInativo" );
			return( "CorAtivo" );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Enviado?" );
	}

}

//======================================================
//	Campo Lido
//======================================================

class campo_arqItLogEmail_Lido extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Lido", "Lido", "Lido", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo LinkEmp
//======================================================

class campo_arqItLogEmail_LinkEmp extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "LinkEmp", "LinkEmp", "LinkEmp", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Acessou link" );
	}

}

//======================================================
//	Campo LinkKm
//======================================================

class campo_arqItLogEmail_LinkKm extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "LinkKm", "LinkKm", "LinkKm", 8, "dd/mm/aaaa", 0, 0, false );
	}

	//--------------------------------------------------
	function EhForm()
	{
		global $g_regAtual;
		return( (GrupoAtualEm()) );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Link KM [0]" );
	}

}

//======================================================
//	Arquivo arqItLogEmail
//======================================================
function listaCampos_arqItLogEmail( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqItLogEmail_LogEmail(),
			new campo_arqItLogEmail_LogEmail_Titulo(),
			new campo_arqItLogEmail_LogEmail_Titulo_Titulo(),
			new campo_arqItLogEmail_LogEmail_Titulo_Versao(),
			new campo_arqItLogEmail_LogEmail_Data(),
			new campo_arqItLogEmail_LogEmail_Hora(),
			new campo_arqItLogEmail_Cliente(),
			new campo_arqItLogEmail_Cliente_Nome(),
			new campo_arqItLogEmail_Cliente_NumCelular(),
			new campo_arqItLogEmail_Email(),
			new campo_arqItLogEmail_Enviado(),
			new campo_arqItLogEmail_Lido(),
			new campo_arqItLogEmail_LinkEmp(),
			new campo_arqItLogEmail_LinkKm() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqItLogEmail extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqItLogEmail",  // Nome Interno do arquivo
			"a_itloge",  // Nome deste arquivo Php que cont�m o arquivo
			"ItLogEmail",  // Nome do arquivo acentuado-se
			listaCampos_arqItLogEmail( "" ), 13
		);
		$this->temLog = false;
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
			$vetAux[] = [ LogEmail_Titulo_Titulo ];
			$vetAux[] = [ LogEmail_Titulo_Versao ];
			$vetAux[] = [ LogEmail_Data ];
			$vetAux[] = [ LogEmail_Hora ];
			$vetAux[] = [ Cliente_Nome ];
			$vetAux[] = [ Cliente_NumCelular ];
			$vetAux[] = [ Email ];
			$vetAux[] = [ Enviado ];
			$vetAux[] = [ Lido ];
			$vetAux[] = [ LinkEmp ];
		if( GrupoAtualEm() )
 {
			$vetAux[] = [ LinkKm ];
 }
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ LogEmail ], [ Cliente ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ LogEmail_Titulo_Titulo ];
			$vetAux[] = [ LogEmail_Titulo_Versao ];
			$vetAux[] = [ LogEmail_Data ];
			$vetAux[] = [ LogEmail_Hora ];
			$vetAux[] = [ Cliente_Nome ];
			$vetAux[] = [ Cliente_NumCelular ];
			$vetAux[] = [ Email ];
			$vetAux[] = [ Enviado ];
			$vetAux[] = [ Lido ];
			$vetAux[] = [ LinkEmp ];
			$vetAux[] = [ LinkKm ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Acionar
	//-------------------------------------------------------------
	function AcionarBotao( $p_tecla )
	{
		switch( $p_tecla )
		{
			case _SDEL: return( NAO );
		}
		return( parent::AcionarBotao( $p_tecla ) );
	}

	//-------------------------------------------------------------
	// Cabe�alho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Destinat�rios' );
	}

}
