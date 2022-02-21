<?php

/*=========================================================================
  t_torien - Tabela TOrienta
=========================================================================*/

if( DEF_t_torien == 1 )
  return;
define( "DEF_t_torien", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_torien_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTOrienta
//-------------------------------------------------------------

class tabTOrienta extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTOrienta", "t_torien", "TOrienta", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
