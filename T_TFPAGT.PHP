<?php

/*=========================================================================
  t_tfpagt - Tabela TFPagto
=========================================================================*/

if( DEF_t_tfpagt == 1 )
  return;
define( "DEF_t_tfpagt", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "t_tfpagt_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTFPagto
//-------------------------------------------------------------

class tabTFPagto extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTFPagto", "t_tfpagt", "TFPagto", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
