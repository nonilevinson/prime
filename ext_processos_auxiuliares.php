<?php

//===========================================================================================
function criarAviso( $p_assunto, $p_texto, $p_campo )
{
	global $g_debugProcesso, $g_hoje;
	
	sql_abrirBD( false );
	
	$hoje = formatarData( HOJE, 'aaaa/mm/dd');
	
	$select = "Select coalesce( max( Numero ), 0 ) + 1 as ProxAviso
			From arqAvisos";
	$proxAvisos = sql_lerUmRegistro( $select )->PROXAVISO;
//echo '<br>arqAvisos S= '.$select.' > prox= '.$proxAvisos;

	$idAvisos = sql_idPrimario();

	sql_insert( "arqAvisos", [
		"idPrimario" => $idAvisos,
		"Numero"     => $proxAvisos,
		"Data"       => $hoje,
		"Hora"       => AGORA(),
		"Quem"       => null,
		"Assunto"    => $p_assunto,
		"Prioridade" => 1,
		"Texto"      => $p_texto,
		"AvisoPai"   => null ] );

		$select = "Select idPrimario as idUsuario
			From arqUsuario
			Where " . $p_campo . " = 1 and Ativo = 1";
		$regUsuario = sql_lerRegistros( $select );
//if( $g_debugProcesso ) echo '<br><b>arqUsuario S=</b> '.$select.' <b>> prox=</b> '.$proxAvisos;

		foreach( $regUsuario as $umUsuario )
		{
			sql_insert( "arqParaGrupo", [
				"idPrimario" => sql_forcarNumerico( sql_NumeroUnico() ),
				"Avisos"     => $idAvisos,
				"Grupo"      => null,
				"Usuario"    => $umUsuario->IDUSUARIO ] );
		}
	
	sql_fecharBD();
}
