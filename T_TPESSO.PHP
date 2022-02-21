<?php

/*=========================================================================
  t_tpesso - Tabela TPessoa
=========================================================================*/

if( DEF_t_tpesso == 1 )
  return;
define( "DEF_t_tpesso", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tpesso_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTPessoa
//-------------------------------------------------------------

class tabTPessoa extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTPessoa", "t_tpesso", "TPessoa", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
