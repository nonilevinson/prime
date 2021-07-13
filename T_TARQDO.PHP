<?php

/*=========================================================================
  t_tarqdo - Tabela TArqDoc
=========================================================================*/

if( DEF_t_tarqdo == 1 )
  return;
define( "DEF_t_tarqdo", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "t_tarqdo_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTArqDoc
//-------------------------------------------------------------

class tabTArqDoc extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTArqDoc", "t_tarqdo", "TArqDoc", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
