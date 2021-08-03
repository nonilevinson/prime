<?php

/*=========================================================================
  a_logema - LogEmail
=========================================================================*/

if( DEF_a_logema == 1 )
  return;
define( "DEF_a_logema", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_logema_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Titulo
//======================================================

class campo_arqLogEmail_Titulo extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Titulo", "Titulo", "Titulo", EH_CHAVE, "arqAcaoEmail", "arqAcaoEmail.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Título" );
	}

}

//======================================================
//	Campo Titulo_Titulo
//======================================================

class campo_arqLogEmail_Titulo_Titulo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Titulo_Titulo", "Titulo_Titulo", "Título", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Titulo", false );
	}

}

//======================================================
//	Campo Titulo_Versao
//======================================================

class campo_arqLogEmail_Titulo_Versao extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Titulo_Versao", "Titulo_Versao", "Versão", 20, "xxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Titulo", false );
	}

}

//======================================================
//	Campo Data
//======================================================

class campo_arqLogEmail_Data extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Data", "Data", "Data", 8, "dd/mm/aaaa", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( formatarData( $g_regAtual->DATA ) == HOJE )
			return( "DiaHoje" );
		if( quantosDias( formatarData( $g_regAtual->DATA ), HOJE ) > 0 )
			return( "DiaFuturo" );
		return( parent::Estilo() );
	}

}

//======================================================
//	Campo Hora
//======================================================

class campo_arqLogEmail_Hora extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "Hora", "Hora", "Hora", 6, "hh:mm:ss", EH_CHAVE, 0, false );
	}

}

//======================================================
//	Campo Usuario
//======================================================

class campo_arqLogEmail_Usuario extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Usuario", "Usuario", "Usuario", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Enviado por" );
	}

}

//======================================================
//	Campo Usuario_Usuario
//======================================================

class campo_arqLogEmail_Usuario_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Usuario_Usuario", "Usuario_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Usuario", false );
	}

}

//======================================================
//	Campo Enviados
//======================================================

class campo_arqLogEmail_Enviados extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Enviados", "Enviados", "Enviados", 6, "###.##z", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function PodeTotalizar()
	{
		global $g_regAtual;
		return( (true) );
	}

}

//======================================================
//	Campo NEnviados
//======================================================

class campo_arqLogEmail_NEnviados extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "NEnviados", "NEnviados", "NEnviados", 6, "###.##z", "", "", 0, 0, false );
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
			return( "Não enviados" );
	}

}

//======================================================
//	Campo Total
//======================================================

class campo_arqLogEmail_Total extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Total", "Total", "Total", 6, "###.##z", "", "", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function PodeTotalizar()
	{
		global $g_regAtual;
		return( (true) );
	}

}

//======================================================
//	Campo Lidos
//======================================================

class campo_arqLogEmail_Lidos extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Lidos", "Lidos", "Lidos", 6, "###.##z", "", "", EH_TOTALIZADO, 0, false );
	}

}

//======================================================
//	Campo PercLidos
//======================================================

class campo_arqLogEmail_PercLidos extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "PercLidos", "PercLidos", "PercLidos", 5, "##z,zz", "", "", EH_CALCULADO, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->PERCLIDOS == 100 )
			return( "CorAtivo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "% Lidos" );
	}

}

//======================================================
//	Campo EmailRemet
//======================================================

class campo_arqLogEmail_EmailRemet extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "EmailRemet", "EmailRemet", "EmailRemet", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo HoraIni
//======================================================

class campo_arqLogEmail_HoraIni extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "HoraIni", "HoraIni", "HoraIni", 6, "hh:mm:ss", 0, 0, false );
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

class campo_arqLogEmail_HoraFim extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "HoraFim", "HoraFim", "HoraFim", 6, "hh:mm:ss", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Final" );
	}

}

//======================================================
//	Campo HoraReenv
//======================================================

class campo_arqLogEmail_HoraReenv extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "HoraReenv", "HoraReenv", "HoraReenv", 6, "hh:mm:ss", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Reenvio" );
	}

}

//======================================================
//	Campo Enviou
//======================================================

class campo_arqLogEmail_Enviou extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "Enviou", "Enviou", "Enviou", "", 0, 0, false );
	}

	//--------------------------------------------------
	function EhForm()
	{
		global $g_regAtual;
		return( (GrupoAtualEm()) );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->ENVIOU == 0 )
			return( "CorInativo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Enviou [0]" );
	}

}

//======================================================
//	Campo Opcao
//======================================================

class campo_arqLogEmail_Opcao extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Opcao", "Opcao", "Opcao", 13, "#.###.###.###.##z", "", "", 0, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Opção [0]" );
	}

}

//======================================================
//	Campo Cliente
//======================================================

class campo_arqLogEmail_Cliente extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Cliente", "Cliente", "Cliente", 0, "arqPessoa", "arqPessoa.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Cliente_Nome
//======================================================

class campo_arqLogEmail_Cliente_Nome extends Lance_CampoCadeia
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

class campo_arqLogEmail_Cliente_NumCelular extends Lance_CampoCadeia
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
//	Arquivo arqLogEmail
//======================================================
function listaCampos_arqLogEmail( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		array(
			new Lance_CampoIdPrimario(),
			new campo_arqLogEmail_Titulo(),
			new campo_arqLogEmail_Titulo_Titulo(),
			new campo_arqLogEmail_Titulo_Versao(),
			new campo_arqLogEmail_Data(),
			new campo_arqLogEmail_Hora(),
			new campo_arqLogEmail_Usuario(),
			new campo_arqLogEmail_Usuario_Usuario(),
			new campo_arqLogEmail_Enviados(),
			new campo_arqLogEmail_NEnviados(),
			new campo_arqLogEmail_Total(),
			new campo_arqLogEmail_Lidos(),
			new campo_arqLogEmail_PercLidos(),
			new campo_arqLogEmail_EmailRemet(),
			new campo_arqLogEmail_HoraIni(),
			new campo_arqLogEmail_HoraFim(),
			new campo_arqLogEmail_HoraReenv(),
			new campo_arqLogEmail_Enviou(),
			new campo_arqLogEmail_Opcao(),
			new campo_arqLogEmail_Cliente(),
			new campo_arqLogEmail_Cliente_Nome(),
			new campo_arqLogEmail_Cliente_NumCelular() )
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqLogEmail extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqLogEmail",  // Nome Interno do arquivo
			"a_logema",  // Nome deste arquivo Php que contém o arquivo
			"LogEmail",  // Nome do arquivo acentuado-se
			listaCampos_arqLogEmail( "" ), 12
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( array( Titulo_Titulo, Titulo_Versao, Data, Hora) );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Titulo_Titulo ) );
			array_push( $vetAux, array( Titulo_Versao ) );
			array_push( $vetAux, array( Data ) );
			array_push( $vetAux, array( Hora ) );
			array_push( $vetAux, array( Usuario_Usuario ) );
			array_push( $vetAux, array( Enviados ) );
			array_push( $vetAux, array( NEnviados ) );
			array_push( $vetAux, array( Total ) );
			array_push( $vetAux, array( Lidos ) );
			array_push( $vetAux, array( PercLidos ) );
			array_push( $vetAux, array( HoraIni ) );
			array_push( $vetAux, array( HoraFim ) );
			array_push( $vetAux, array( HoraReenv ) );
		if( GrupoAtualEm() )
 {
			array_push( $vetAux, array( Enviou ) );
 }
		if( GrupoAtualEm() )
 {
			array_push( $vetAux, array( Opcao ) );
 }
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( array( array( Titulo ), array( Usuario ) ) );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = array();
			array_push( $vetAux, array( Titulo_Titulo ) );
			array_push( $vetAux, array( Titulo_Versao ) );
			array_push( $vetAux, array( Data ) );
			array_push( $vetAux, array( Hora ) );
			array_push( $vetAux, array( Usuario_Usuario ) );
			array_push( $vetAux, array( Enviados ) );
			array_push( $vetAux, array( NEnviados ) );
			array_push( $vetAux, array( Total ) );
			array_push( $vetAux, array( Lidos ) );
			array_push( $vetAux, array( PercLidos ) );
			array_push( $vetAux, array( EmailRemet ) );
			array_push( $vetAux, array( HoraIni ) );
			array_push( $vetAux, array( HoraFim ) );
			array_push( $vetAux, array( HoraReenv ) );
			array_push( $vetAux, array( Enviou ) );
			array_push( $vetAux, array( Opcao ) );
			array_push( $vetAux, array( Cliente_Nome ) );
			array_push( $vetAux, array( Cliente_NumCelular ) );
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Acionar
	//-------------------------------------------------------------
	function AcionarBotao( $p_tecla )
	{
		switch( $p_tecla )
		{
			case _GRAVAR: return( GrupoAtualEm() );
		}
		return( parent::AcionarBotao( $p_tecla ) );
	}

	//-------------------------------------------------------------
	// Ordenações do Arquivo: PDataDesc 
	//-------------------------------------------------------------
	function PDataDesc()
	{
	return( "Data DESC" );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Emails programados e enviados' );
	}

}
?>
