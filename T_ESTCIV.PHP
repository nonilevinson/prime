<?php

/*=========================================================================
  t_estciv - Tabela EstCivil
=========================================================================*/

if( DEF_t_estciv == 1 )
  return;
define( "DEF_t_estciv", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_estciv_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabEstCivil
//-------------------------------------------------------------

class tabEstCivil extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabEstCivil", "t_estciv", "EstCivil", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
