<?php

/*=========================================================================
  t_tsimna - Tabela TSimNao
=========================================================================*/

if( DEF_t_tsimna == 1 )
  return;
define( "DEF_t_tsimna", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tsimna_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTSimNao
//-------------------------------------------------------------

class tabTSimNao extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTSimNao", "t_tsimna", "TSimNao", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
