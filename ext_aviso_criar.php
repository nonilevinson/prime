<?php

//==============================================================================
function criarAviso( $p_assunto, $p_prioridade, $p_texto, $p_campo='', $p_idUsuario=null )
{
	global $g_debugProcesso, $g_proxAvisos;

	$select = "Select coalesce( max( Numero ), 0 ) + 1 as ProxAviso
			From arqAvisos";
	$g_proxAvisos = sql_lerUmRegistro( $select )->PROXAVISO;
//echo '<br><b>arqAvisos S=</b> '.$select.' <b>prox=</b> '.$g_proxAvisos;

	$idAvisos = sql_idPrimario();

	sql_insert( "arqAvisos", [
		"idPrimario" => $idAvisos,
		"Numero"     => $g_proxAvisos,
		"Data"       => formatarData( HOJE, 'aaaa/mm/dd' ),
		"Hora"       => formatarHora( AGORA, 'hh:mm:00' ),
		"Quem"       => null,
		"Assunto"    => $p_assunto,
		"Prioridade" => $p_prioridade,
		"Texto"      => $p_texto,
		"AvisoPai"   => null ] );

	if( $p_idUsuario )
	{
		sql_insert( "arqParaGrupo", [
			"idPrimario" => sql_forcarNumerico( sql_NumeroUnico() ),
			"Avisos"     => $idAvisos,
			"Grupo"      => null,
			"Usuario"    => $p_idUsuario ] );
	}
	else
	{
		$select = "Select idPrimario
			From arqUsuario
			Where Ativo = 1" . ( $p_campo != '' ? " and " . $p_campo . " = 1" : "" );
		$regUsuario = sql_lerRegistros( $select );
// if( $g_debugProcesso ) echo '<br><b>regUsuario S=</b> '.$select.' <b>prox=</b> '.$g_proxAvisos;
	}

	foreach( $regUsuario as $umUsuario )
	{
		sql_insert( "arqParaGrupo", [
			"idPrimario" => sql_forcarNumerico( sql_NumeroUnico() ),
			"Avisos"     => $idAvisos,
			"Grupo"      => null,
			"Usuario"    => $umUsuario->IDPRIMARIO ] );
	}
}
