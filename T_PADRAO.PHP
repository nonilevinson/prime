<?php

/*=========================================================================
  t_padrao - Tabela PadraoAcao
=========================================================================*/

if( DEF_t_padrao == 1 )
  return;
define( "DEF_t_padrao", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "t_padrao_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabPadraoAcao
//-------------------------------------------------------------

class tabPadraoAcao extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabPadraoAcao", "t_padrao", "PadraoAcao", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
