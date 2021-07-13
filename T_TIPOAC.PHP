<?php

/*=========================================================================
  t_tipoac - Tabela TipoAcao
=========================================================================*/

if( DEF_t_tipoac == 1 )
  return;
define( "DEF_t_tipoac", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_endere.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "t_tipoac_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//-------------------------------------------------------------
// Tabela tabTipoAcao
//-------------------------------------------------------------

class tabTipoAcao extends Lance_Tabela
{
	function __construct()
	{
		parent::__construct( "tabTipoAcao", "t_tipoac", "TipoAcao", 1, "u", 75, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" );
	}
}
?>
