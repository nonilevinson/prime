<?php

/*=========================================================================
  t_tpix - Tabela TPix
=========================================================================*/

if( DEF_t_tpix == 1 )
  return;
define( "DEF_t_tpix", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tpix_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTPix
//-------------------------------------------------------------

class tabTPix extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTPix", "t_tpix", "TPix", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
