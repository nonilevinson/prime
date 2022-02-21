<?php

/*=========================================================================
  t_tdetpg - Tabela TDetPg
=========================================================================*/

if( DEF_t_tdetpg == 1 )
  return;
define( "DEF_t_tdetpg", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tdetpg_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTDetPg
//-------------------------------------------------------------

class tabTDetPg extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTDetPg", "t_tdetpg", "TDetPg", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
