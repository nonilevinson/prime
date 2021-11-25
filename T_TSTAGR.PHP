<?php

/*=========================================================================
  t_tstagr - Tabela TStAgRet
=========================================================================*/

if( DEF_t_tstagr == 1 )
  return;
define( "DEF_t_tstagr", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "t_tstagr_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTStAgRet
//-------------------------------------------------------------

class tabTStAgRet extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTStAgRet", "t_tstagr", "TStAgRet", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
