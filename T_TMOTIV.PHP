<?php

/*=========================================================================
  t_tmotiv - Tabela TMotivo
=========================================================================*/

if( DEF_t_tmotiv == 1 )
  return;
define( "DEF_t_tmotiv", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tmotiv_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTMotivo
//-------------------------------------------------------------

class tabTMotivo extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTMotivo", "t_tmotiv", "TMotivo", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
