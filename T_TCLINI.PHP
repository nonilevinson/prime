<?php

/*=========================================================================
  t_tclini - Tabela TClinica
=========================================================================*/

if( DEF_t_tclini == 1 )
  return;
define( "DEF_t_tclini", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tclini_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTClinica
//-------------------------------------------------------------

class tabTClinica extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTClinica", "t_tclini", "TClinica", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
