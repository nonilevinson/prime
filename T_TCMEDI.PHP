<?php

/*=========================================================================
  t_tcmedi - Tabela TCMedica
=========================================================================*/

if( DEF_t_tcmedi == 1 )
  return;
define( "DEF_t_tcmedi", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_tcmedi_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTCMedica
//-------------------------------------------------------------

class tabTCMedica extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTCMedica", "t_tcmedi", "TCMedica", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
