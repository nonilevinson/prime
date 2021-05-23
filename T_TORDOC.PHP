<?php

/*=========================================================================
  t_tordoc - Tabela TOrDoc
=========================================================================*/

if( DEF_t_tordoc == 1 )
  return;
define( "DEF_t_tordoc", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tordoc_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTOrDoc
//-------------------------------------------------------------

class tabTOrDoc extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTOrDoc", "t_tordoc", "TOrDoc", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
