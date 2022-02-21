<?php

/*=========================================================================
  t_tpfpj - Tabela TPFPJ
=========================================================================*/

if( DEF_t_tpfpj == 1 )
  return;
define( "DEF_t_tpfpj", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tpfpj_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTPFPJ
//-------------------------------------------------------------

class tabTPFPJ extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTPFPJ", "t_tpfpj", "TPFPJ", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
