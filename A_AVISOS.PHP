<?php

/*=========================================================================
  a_avisos - Avisos
=========================================================================*/

if( DEF_a_avisos == 1 )
  return;
define( "DEF_a_avisos", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_avisos_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Numero
//======================================================

class campo_arqAvisos_Numero extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "Numero", "Numero", "Numero", 6, "###.##z", "", "", EH_CHAVE, 0, false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "N°" );
	}

}

//======================================================
//	Campo Data
//======================================================

class campo_arqAvisos_Data extends Lance_CampoData
{
	function __construct()
	{
		parent::__construct( "Data", "Data", "Data", 8, "dd/mm/aaaa", 0, 0, false );
	}

}

//======================================================
//	Campo Hora
//======================================================

class campo_arqAvisos_Hora extends Lance_CampoHora
{
	function __construct()
	{
		parent::__construct( "Hora", "Hora", "Hora", 4, "hh:mm", 0, 0, false );
	}

}

//======================================================
//	Campo Quem
//======================================================

class campo_arqAvisos_Quem extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Quem", "Quem", "Quem", 0, "arqUsuario", "arqUsuario.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo Quem_Usuario
//======================================================

class campo_arqAvisos_Quem_Usuario extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Quem_Usuario", "Quem_Usuario", "Usuario", 40, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", EH_CHAVE, "Quem", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "Usuário" );
	}

}

//======================================================
//	Campo Assunto
//======================================================

class campo_arqAvisos_Assunto extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Assunto", "Assunto", "Assunto", 100, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Prioridade
//======================================================

class campo_arqAvisos_Prioridade extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "Prioridade", "Prioridade", "Prioridade", 0, "tabPrioridade", "idPrimario", LANCE_LIG_SELECAO, 2, 0, false );
	}

}

//======================================================
//	Campo Texto
//======================================================

class campo_arqAvisos_Texto extends Lance_CampoTexto
{
	function __construct()
	{
		parent::__construct( "Texto", "Texto", "Texto", 18,70, false, true );
	}

}

//======================================================
//	Campo IdQuem
//======================================================

class campo_arqAvisos_IdQuem extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "IdQuem", "IdQuem", "IdQuem", 20, "##.###.###.###.###.###.##z", "", "", EH_CALCULADO, 0, false );
	}

}

//======================================================
//	Campo AvisoPai
//======================================================

class campo_arqAvisos_AvisoPai extends Lance_CampoLigado
{
	function __construct()
	{
		parent::__construct( "AvisoPai", "AvisoPai", "AvisoPai", 0, "arqAvisos", "arqAvisos.IdPrimario DESC", LANCE_LIG_NAVEGARPAI, 1, 0, false );
	}

}

//======================================================
//	Campo AvisoPai_Numero
//======================================================

class campo_arqAvisos_AvisoPai_Numero extends Lance_CampoNumerico
{
	function __construct()
	{
		parent::__construct( "AvisoPai_Numero", "AvisoPai_Numero", "Numero", 6, "###.##z", "", "", EH_CHAVE, "AvisoPai", false );
	}

	//--------------------------------------------------
	function CabecalhoCampo()
	{
		global $g_regAtual;
			return( "N°" );
	}

}

//======================================================
//	Arquivo arqAvisos
//======================================================
function listaCampos_arqAvisos( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(
		[
			new Lance_CampoIdPrimario(),
			new campo_arqAvisos_Numero(),
			new campo_arqAvisos_Data(),
			new campo_arqAvisos_Hora(),
			new campo_arqAvisos_Quem(),
			new campo_arqAvisos_Quem_Usuario(),
			new campo_arqAvisos_Assunto(),
			new campo_arqAvisos_Prioridade(),
			new Lance_CampoCadeia( "Prioridade_Chave", "Prioridade_Chave", "Chave", 1, "x", EH_CHAVE, Prioridade ),
			new Lance_CampoCadeia( "Prioridade_Descritor", "Prioridade_Descritor", "Descritor", 7, "xxxxxxx", EH_DESCRITOR, Prioridade ),
			new campo_arqAvisos_Texto(),
			new campo_arqAvisos_IdQuem(),
			new campo_arqAvisos_AvisoPai(),
			new campo_arqAvisos_AvisoPai_Numero() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

//------------------------------------------------------------
class arqAvisos extends Lance_Arquivo
{
	function __construct()
	{
		parent::__construct(
			"arqAvisos",  // Nome Interno do arquivo
			"a_avisos",  // Nome deste arquivo Php que contém o arquivo
			"Avisos",  // Nome do arquivo acentuado-se
			listaCampos_arqAvisos( "" ), 14
		);
	}

	//-------------------------------------------------------------
	// Campos da Chave Única
	//-------------------------------------------------------------
	function ChaveUnica()
	{
		return( [ Numero ] );
	}

	//-------------------------------------------------------------
	// Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function Folheamento()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Numero ];
			$vetAux[] = [ Data ];
			$vetAux[] = [ Hora ];
			$vetAux[] = [ Quem_Usuario ];
			$vetAux[] = [ Assunto ];
			$vetAux[] = [ Prioridade_Descritor ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Complemento para os Campos Folheaveis do Arquivo
	//-------------------------------------------------------------
	function ComplementoFolheamento()
	{
		return( [ [ Quem ], [ Prioridade ], [ Prioridade_Chave ], [ Prioridade_Descritor ], [ IdQuem ] ] );
	}

	//-------------------------------------------------------------
	// Campos Exportaveis do Arquivo
	//-------------------------------------------------------------
	function Exportacao()
	{
		global $g_acaoAtual;
		$vetAux = [];
			$vetAux[] = [ Numero ];
			$vetAux[] = [ Data ];
			$vetAux[] = [ Hora ];
			$vetAux[] = [ Quem_Usuario ];
			$vetAux[] = [ Assunto ];
			$vetAux[] = [ Prioridade_Descritor ];
			$vetAux[] = [ Texto ];
			$vetAux[] = [ IdQuem ];
			$vetAux[] = [ AvisoPai_Numero ];
		return( $vetAux );
	}

	//-------------------------------------------------------------
	// Mensagem
	//-------------------------------------------------------------
	function MensagemBotao( $p_tecla )
	{
		switch( $p_tecla )
		{
			case _F10: return( "GrupoAtualEm()" );
		}
		return( parent::MensagemBotao( $p_tecla ) );
	}

	//-------------------------------------------------------------
	// Ordenações do Arquivo: PNum      
	//-------------------------------------------------------------
	function PNum()
	{
	return( "Numero DESC" );
	}

	//-------------------------------------------------------------
	// Cabeçalho do arquivo
	//-------------------------------------------------------------
	function NomeCompleto()
	{
		return( 'Avisos internos' );
	}

	//-------------------------------------------------------------
	// Visões do Arquivo: FilTodos  
	//-------------------------------------------------------------
	function FilTodos()
	{
	return( "" . ext_filtrarTodos() . "" );
	}

}
