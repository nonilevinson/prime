<?php

/*=========================================================================
  a_redeso - RedeSocial
=========================================================================*/

if( DEF_a_redeso == 1 )
  return;
define( "DEF_a_redeso", 1 );

include_once( SISTEMA_DIR_ABSOLUTO . "a_redeso_ext.php" );
include_once( SISTEMA_DIR_ABSOLUTO . "externo.php" );

//======================================================
//	Campo Facebook
//======================================================

class campo_domRedeSocial_Facebook extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Facebook", "Facebook", "Facebook", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo YouTube
//======================================================

class campo_domRedeSocial_YouTube extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "YouTube", "YouTube", "YouTube", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Instagram
//======================================================

class campo_domRedeSocial_Instagram extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Instagram", "Instagram", "Instagram", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Twitter
//======================================================

class campo_domRedeSocial_Twitter extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Twitter", "Twitter", "Twitter", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo LinkedIn
//======================================================

class campo_domRedeSocial_LinkedIn extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "LinkedIn", "LinkedIn", "LinkedIn", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo SnapChat
//======================================================

class campo_domRedeSocial_SnapChat extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "SnapChat", "SnapChat", "SnapChat", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Campo Pinterest
//======================================================

class campo_domRedeSocial_Pinterest extends Lance_CampoCadeia
{
	function __construct()
	{
		parent::__construct( "Pinterest", "Pinterest", "Pinterest", 80, "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", 0, 0, false );
	}

}

//======================================================
//	Arquivo domRedeSocial
//======================================================
function listaCampos_domRedeSocial( $p_prefixo )
{
	global $g_prefixo;
	$prefixoAnt = $g_prefixo;
	$g_prefixo .= $p_prefixo;
	$lista = array_merge(

		[ 
			new campo_domRedeSocial_Facebook(),
			new campo_domRedeSocial_YouTube(),
			new campo_domRedeSocial_Instagram(),
			new campo_domRedeSocial_Twitter(),
			new campo_domRedeSocial_LinkedIn(),
			new campo_domRedeSocial_SnapChat(),
			new campo_domRedeSocial_Pinterest() ]
	);
	$g_prefixo = $prefixoAnt;
	return( $lista );
}

