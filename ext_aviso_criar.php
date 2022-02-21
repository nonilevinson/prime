<?php

//--------------------------------------------------------------------------------------------
function criarParaGrupo( $p_idAvisos, $p_idGrupo=null, $p_idUsuario=null )
{
	global $g_debugProcesso;

	sql_insert( "arqParaGrupo", [
		"idPrimario" => sql_forcarNumerico( sql_NumeroUnico() ),
		"Avisos"     => $p_idAvisos,
		"Grupo"      => $p_idGrupo,
		"Usuario"    => $p_idUsuario ] );
}

//--------------------------------------------------------------------------------------------
function criarAviso( $p_assunto, $p_prioridade, $p_texto, $p_campo='', $p_idUsuario=null, $p_campoGrupo='' )
{
	global $g_debugProcesso, $g_proxAvisos;

	$select = "Select coalesce( max( Numero ), 0 ) + 1 as ProxAviso
			From arqAvisos";
	$g_proxAvisos = sql_lerUmRegistro( $select )->PROXAVISO;
//echo '<br><b>arqAvisos S=</b> '.$select.' <b>prox=</b> '.$g_proxAvisos;
if( $g_debugProcesso ) echo '<br><b>GR0 USU=</b> '.USUARIO_ATUAL;

	$idAvisos = sql_idPrimario();

	sql_insert( "arqAvisos", [
		"idPrimario" => $idAvisos,
		"Numero"     => $g_proxAvisos,
		"Data"       => formatarData( HOJE, 'aaaa/mm/dd' ),
		"Hora"       => formatarHora( AGORA, 'hh:mm:00' ),
		"Quem"       => ValorOuNull( USUARIO_ATUAL, '', false ),
		"Assunto"    => $p_assunto,
		"Prioridade" => $p_prioridade,
		"Texto"      => $p_texto,
		"AvisoPai"   => null ] );

	if( $p_campoGrupo != '' )
	{
		$select = "Select idPrimario
			From arqGrupo
			Where " . $p_campoGrupo . " = 1";
		$regGrupo =sql_lerRegistros( $select );
if( $g_debugProcesso ) echo '<br><b>GR0 ext_aviso_criar arqGrupo S=</b> '.$select;

		foreach( $regGrupo as $umGrupo )
			criarParaGrupo( $idAvisos, $umGrupo->IDPRIMARIO, null );
	}
	elseif( $p_idUsuario && $p_campo == '' )
		criarParaGrupo( $idAvisos, null, $p_idUsuario );
	else
	{
		$select = "Select idPrimario
			From arqUsuario
			Where Ativo = 1" . ( $p_campo != '' ? " and " . $p_campo . " = 1" : "" );
		$regUsuario = sql_lerRegistros( $select );
// if( $g_debugProcesso ) echo '<br><b>regUsuario S=</b> '.$select.' <b>prox=</b> '.$g_proxAvisos;

		foreach( $regUsuario as $umUsuario )
			criarParaGrupo( $idAvisos, null, $umUsuario->IDPRIMARIO );
	}
}
