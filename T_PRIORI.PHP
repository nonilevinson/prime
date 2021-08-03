<?php

/*=========================================================================
  t_priori - Tabela Prioridade
=========================================================================*/

if( DEF_t_priori == 1 )
  return;
define( "DEF_t_priori", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_priori_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabPrioridade
//-------------------------------------------------------------

class tabPrioridade extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabPrioridade", "t_priori", "Prioridade", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
