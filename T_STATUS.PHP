<?php

/*=========================================================================
  t_status - Tabela StatusLog
=========================================================================*/

if( DEF_t_status == 1 )
  return;
define( "DEF_t_status", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "t_status_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabStatusLog
//-------------------------------------------------------------

class tabStatusLog extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabStatusLog", "t_status", "StatusLog", 2, "uu", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
