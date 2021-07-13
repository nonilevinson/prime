<?php

/*=========================================================================
  t_tprogr - Tabela TPrograma
=========================================================================*/

if( DEF_t_tprogr == 1 )
  return;
define( "DEF_t_tprogr", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "t_tprogr_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTPrograma
//-------------------------------------------------------------

class tabTPrograma extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTPrograma", "t_tprogr", "TPrograma", 2, "uu", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
