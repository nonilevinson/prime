<?php

/*=========================================================================
  t_tpapel - Tabela TPapel
=========================================================================*/

if( DEF_t_tpapel == 1 )
  return;
define( "DEF_t_tpapel", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "t_tpapel_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTPapel
//-------------------------------------------------------------

class tabTPapel extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTPapel", "t_tpapel", "TPapel", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
