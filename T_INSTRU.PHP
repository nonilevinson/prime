<?php

/*=========================================================================
  t_instru - Tabela Instrucao
=========================================================================*/

if( DEF_t_instru == 1 )
  return;
define( "DEF_t_instru", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "t_instru_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabInstrucao
//-------------------------------------------------------------

class tabInstrucao extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabInstrucao", "t_instru", "Instrucao", 2, "uu", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
