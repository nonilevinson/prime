<?php

/*=========================================================================
  t_tpgre - Tabela TPgRec
=========================================================================*/

if( DEF_t_tpgre == 1 )
  return;
define( "DEF_t_tpgre", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "t_tpgre_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTPgRec
//-------------------------------------------------------------

class tabTPgRec extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTPgRec", "t_tpgre", "TPgRec", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
