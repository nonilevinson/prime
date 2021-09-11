<?php

/*=========================================================================
  t_tdata - Tabela TData
=========================================================================*/

if( DEF_t_tdata == 1 )
  return;
define( "DEF_t_tdata", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tdata_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTData
//-------------------------------------------------------------

class tabTData extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTData", "t_tdata", "TData", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
