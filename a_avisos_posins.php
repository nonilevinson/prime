<?php

global $g_regAtual;

$idAviso = $g_regAtual->IDPRIMARIO;
		
foreach( $_REQUEST as $umRequest => $valorRequest )
{
	if( strpos( $umRequest, 'grupo_' ) === 0 )
	{
		sql_insert( "arqParaGrupo", array( 
			"idPrimario" => array( sql_NumeroUnico(), FORCAR_NUMERICO ),
			"Avisos" => $idAviso,
			"Grupo" => substr( $umRequest,6 ),
			"Usuario" => null ) );
	}
}

sql_insert( "arqLido", array( 
	"idPrimario" => array( sql_NumeroUnico(), FORCAR_NUMERICO ),
	"Usuario" => USUARIO_ATUAL,
	"Avisos" => $idAviso,
	"Data" => formatarData( HOJE, 'aaaa/mm/dd' ) ) );

?>