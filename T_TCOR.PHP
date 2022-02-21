<?php

/*=========================================================================
  t_tcor - Tabela TCor
=========================================================================*/

if( DEF_t_tcor == 1 )
  return;
define( "DEF_t_tcor", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tcor_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTCor
//-------------------------------------------------------------

class tabTCor extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTCor", "t_tcor", "TCor", 4, "uuuu", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
