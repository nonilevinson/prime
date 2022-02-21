<?php

/*=========================================================================
  a_usuari - Usuario
=========================================================================*/

if( DEF_a_usuari == 1 )
  return;
define( "DEF_a_usuari", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_usuari_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Usuario
//======================================================

class campo_arqUsuario_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Usuario", "Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Usuário" );
	}

}

//======================================================
//	Campo Nome
//======================================================

class campo_arqUsuario_Nome extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Nome", "Nome", "Nome", 60, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Senha
//======================================================

class campo_arqUsuario_Senha extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Senha", "Senha", "Senha", 20, "xxxxxxxxxxxxxxxxxxxx", 0, 0, true );
	}

}

//======================================================
//	Campo Grupo
//======================================================

class campo_arqUsuario_Grupo extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Grupo", "Grupo", "Grupo", 0, "arqGrupo", "arqGrupo.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Grupo_Grupo
//======================================================

class campo_arqUsuario_Grupo_Grupo extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Grupo_Grupo", "Grupo_Grupo", "Grupo", 50, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Grupo", false );
	}

}

//======================================================
//	Campo Versao
//======================================================

class campo_arqUsuario_Versao extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Versao", "Versao", "Versao", 10, "xxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Email
//======================================================

class campo_arqUsuario_Email extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Email", "Email", "Email", 70, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo CRM
//======================================================

class campo_arqUsuario_CRM extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "CRM", "CRM", "CRM", 10, "xxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo PodeAgenda
//======================================================

class campo_arqUsuario_PodeAgenda extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "PodeAgenda", "PodeAgenda", "PodeAgenda", "", 0, 0, false );
	}

	//--------------------------------------------------
	function Estilo()
	{
		global $g_regAtual;
		if( $g_regAtual->PODEAGENDA == 1 )
			return( "CorAtivo" );
		return( parent::Estilo() );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Acessa Portal<br>Agenda?" );
	}

}

//======================================================
//	Campo Ativo
//======================================================

class campo_arqUsuario_Ativo extends Lance_CampoLogico
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
//	Campo Nascimento
//======================================================

class campo_arqUsuario_Nascimento extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Nascimento", "Nascimento", "Nascimento", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Foto
//======================================================

class campo_arqUsuario_Foto extends Lance_CampoImagem
{
	function __construct()
	{
		parent::__construct( "Foto", "Foto", "Foto", 200,200, "sem_imagem.gif", false );
	}

}

//======================================================
//	Campo EmailAces
//======================================================

class campo_arqUsuario_EmailAces extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "EmailAces", "EmailAces", "EmailAces", "", 0, 0, false );
	}

}

//======================================================
//	Campo EmailAcesS
//======================================================

class campo_arqUsuario_EmailAcesS extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "EmailAcesS", "EmailAcesS", "EmailAcesS", "", 0, 0, false );
	}

}

//======================================================
//	Campo EmailFinan
//======================================================

class campo_arqUsuario_EmailFinan extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "EmailFinan", "EmailFinan", "EmailFinan", "", 0, 0, false );
	}

}

//======================================================
//	Campo EmCMediSep
//======================================================

class campo_arqUsuario_EmCMediSep extends Lance_CampoLogico
{
	function __construct()
	{
		parent::__construct( "EmCMediSep", "EmCMediSep", "EmCMediSep", "", 0, 0, false );
	}

}

//======================================================
//	Arquivo arqUsuario
//======================================================
function listaCampos_arqUsuario( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqUsuario_Usuario(),
			new campo_arqUsuario_Nome(),
			new campo_arqUsuario_Senha(),
			new campo_arqUsuario_Grupo(),
			new campo_arqUsuario_Grupo_Grupo(),
			new campo_arqUsuario_Versao(),
			new campo_arqUsuario_Email(),
			new campo_arqUsuario_CRM(),
			new campo_arqUsuario_PodeAgenda(),
			new campo_arqUsuario_Ativo(),
			new campo_arqUsuario_Nascimento(),
			new campo_arqUsuario_Foto(),
			new Lance_CampoCadeia( "Foto_Arquivo", "Foto_Arquivo", "Descritor", 0, "", EH_DESCRITOR, Foto ),
			new campo_arqUsuario_EmailAces(),
			new campo_arqUsuario_EmailAcesS(),
			new campo_arqUsuario_EmailFinan(),
			new campo_arqUsuario_EmCMediSep() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqUsuario extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqUsuario",  // Nome Interno do arquivo
			"a_usuari",  // Nome deste arquivo Php que contém o arquivo
			"Usuario",  // Nome do arquivo acentuado-se
			listaCampos_arqUsuario( "" ), 5
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Usuario ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Usuario ];
			$vetAux[] = [ Nome ];
			$vetAux[] = [ Grupo_Grupo ];
			$vetAux[] = [ Email ];
			$vetAux[] = [ PodeAgenda ];
			$vetAux[] = [ Ativo ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Grupo ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Usuario ];
			$vetAux[] = [ Nome ];
			$vetAux[] = [ Grupo_Grupo ];
			$vetAux[] = [ Versao ];
			$vetAux[] = [ Email ];
			$vetAux[] = [ CRM ];
			$vetAux[] = [ PodeAgenda ];
			$vetAux[] = [ Ativo ];
			$vetAux[] = [ Nascimento ];
			$vetAux[] = [ Foto ];
			$vetAux[] = [ EmailAces ];
			$vetAux[] = [ EmailAcesS ];
			$vetAux[] = [ EmailFinan ];
			$vetAux[] = [ EmCMediSep ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Usuários' );
	}

	//-------------------------------------------------------------
	// Texto que acompanha o nome do arquivo no cabeçalho
	//-------------------------------------------------------------
	function TxtCabArquivo()
	{
		return( 'exibir_Texto()' );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: PodeVer   
	//-------------------------------------------------------------
	function PodeVer()
	{
	return( "". ext_filtrarGrupo() . "" );
	}

}
