<?php

/*=========================================================================
  t_tfcobr - Tabela TFCobra
=========================================================================*/

if( DEF_t_tfcobr == 1 )
  return;
define( "DEF_t_tfcobr", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tfcobr_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTFCobra
//-------------------------------------------------------------

class tabTFCobra extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTFCobra", "t_tfcobr", "TFCobra", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
