<?php

//--------------------------------------------------------------------------------------------
function criarParaGrupo( $p_idAvisos, $p_idGrupo=null, $p_idUsuario=null )
{
	global $g_debugProcesso;

	sql_insert( "arqParaGrupo", [
		"idPrimario" => sql_forcarNumerico( sql_NumeroUnico() ),
		"Avisos"     => $p_idAvisos,
		"Grupo"      => $p_idGrupo,
		"Usuario"    => $p_idUsuario ],1,true,false );
}

//--------------------------------------------------------------------------------------------
function criarAviso( $p_assunto, $p_prioridade, $p_texto, $p_campo='', $p_idClinica=null, 
	$p_idUsuario=null, $p_campoGrupo='' )
{
	global $g_debugProcesso, $g_proxAvisos;
	$idClinica  = $p_idClinica;
	$idUsuario  = $p_idUsuario;
	$campoGrupo = $p_campoGrupo;
if( $g_debugProcesso ) echo '<br><b>GR0 idClinica=</b> '.$idClinica.' <b>idUsuario=</b> '.$idUsuario.' <b>campoGrupo=</b> '.$campoGrupo;

	$select = "Select coalesce( max( Numero ), 0 ) + 1 as ProxAviso
			From arqAvisos";
	$g_proxAvisos = sql_lerUmRegistro( $select )->PROXAVISO;
// if( $g_debugProcesso ) echo '<br><b>arqAvisos S=</b> '.$select.' <b>prox=</b> '.$g_proxAvisos;

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
		"AvisoPai"   => null ],1,true,false );

	if( $campoGrupo != '' && !$idClinica )
	{
		$select = "Select idPrimario
			From arqGrupo
			Where " . $campoGrupo . " = 1";
		$regGrupo =sql_lerRegistros( $select );
// if( $g_debugProcesso ) echo '<br><b>GR0 ext_aviso_criar tem p_campoGrupo e não tem idClinica arqGrupo S=</b> '.$select;

		foreach( $regGrupo as $umGrupo )
			criarParaGrupo( $idAvisos, $umGrupo->IDPRIMARIO, null );
	}
	elseif( $p_idUsuario && $p_campo == '' )
	{
// if( $g_debugProcesso ) echo '<br><b>GR0 entrou quando tem idUsuario e não tem p_campo</b>';

		criarParaGrupo( $idAvisos, null, $p_idUsuario );
	}
	elseif( $campoGrupo != '' && $idClinica )
	{
		$select = "Select U.idPrimario
			From arqUsuCli S
				join arqUsuario	U on U.idPrimario=S.Usuario
				join arqGrpo		G on G.idPrimario=U.Grupo
				join arqClinica	C on C.idPrimario=S.Clinica
			Where G." . $campoGrupo . " = 1 and C.idPrimario in " . SQL_VETIDCLINICA;
		$regUsuCli =sql_lerRegistros( $select );
if( $g_debugProcesso ) echo '<br><b>GR0 ext_aviso_criar TEM p_campoGrupo e TEM idClinica arqGrupo S=</b> '.$select;

		foreach( $regUsuCli as $umUsuario )
			criarParaGrupo( $idAvisos, null, $umUsuario->IDPRIMARIO );
	}
	else
	{
		$select = "Select idPrimario
			From arqUsuario
			Where Ativo = 1" . ( $p_campo != '' ? " and " . $p_campo . " = 1" : "" );
		$regUsuario = sql_lerRegistros( $select );
// if( $g_debugProcesso ) echo '<br><b> SÓ TEM O CAMPO arqUsuario S=</b> '.$select;

		foreach( $regUsuario as $umUsuario )
			criarParaGrupo( $idAvisos, null, $umUsuario->IDPRIMARIO );
	}
}
