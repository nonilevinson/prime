<?php

/*=========================================================================
  t_tdiase - Tabela TDiaSem
=========================================================================*/

if( DEF_t_tdiase == 1 )
  return;
define( "DEF_t_tdiase", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "t_tdiase_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTDiaSem
//-------------------------------------------------------------

class tabTDiaSem extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTDiaSem", "t_tdiase", "TDiaSem", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
