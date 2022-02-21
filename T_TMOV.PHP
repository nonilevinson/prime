<?php

/*=========================================================================
  t_tmov - Tabela TMov
=========================================================================*/

if( DEF_t_tmov == 1 )
  return;
define( "DEF_t_tmov", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tmov_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTMov
//-------------------------------------------------------------

class tabTMov extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTMov", "t_tmov", "TMov", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
