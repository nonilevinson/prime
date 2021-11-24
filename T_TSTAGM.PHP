<?php

/*=========================================================================
  t_tstagm - Tabela TStAgMed
=========================================================================*/

if( DEF_t_tstagm == 1 )
  return;
define( "DEF_t_tstagm", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tstagm_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTStAgMed
//-------------------------------------------------------------

class tabTStAgMed extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTStAgMed", "t_tstagm", "TStAgMed", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
