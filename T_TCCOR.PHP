<?php

/*=========================================================================
  t_tccor - Tabela TCCor
=========================================================================*/

if( DEF_t_tccor == 1 )
  return;
define( "DEF_t_tccor", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "t_tccor_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTCCor
//-------------------------------------------------------------

class tabTCCor extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTCCor", "t_tccor", "TCCor", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
