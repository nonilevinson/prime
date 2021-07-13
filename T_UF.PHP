<?php

/*=========================================================================
  t_uf - Tabela UF
=========================================================================*/

if( DEF_t_uf == 1 )
  return;
define( "DEF_t_uf", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "t_uf_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabUF
//-------------------------------------------------------------

class tabUF extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabUF", "t_uf", "UF", 2, "uu", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
