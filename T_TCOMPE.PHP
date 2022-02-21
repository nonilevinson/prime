<?php

/*=========================================================================
  t_tcompe - Tabela TCompete
=========================================================================*/

if( DEF_t_tcompe == 1 )
  return;
define( "DEF_t_tcompe", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tcompe_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTCompete
//-------------------------------------------------------------

class tabTCompete extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTCompete", "t_tcompe", "TCompete", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
