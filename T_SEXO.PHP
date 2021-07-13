<?php

/*=========================================================================
  t_sexo - Tabela Sexo
=========================================================================*/

if( DEF_t_sexo == 1 )
  return;
define( "DEF_t_sexo", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "t_sexo_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabSexo
//-------------------------------------------------------------

class tabSexo extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabSexo", "t_sexo", "Sexo", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
