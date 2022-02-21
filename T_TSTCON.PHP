<?php

/*=========================================================================
  t_tstcon - Tabela TStCon
=========================================================================*/

if( DEF_t_tstcon == 1 )
  return;
define( "DEF_t_tstcon", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tstcon_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTStCon
//-------------------------------------------------------------

class tabTStCon extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTStCon", "t_tstcon", "TStCon", 2, "uu", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
