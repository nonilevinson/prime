<?php

require_once( LANCE_PHP_ABSOLUTO . 'lance_permissoes.php' );

sql_abrirBD();
$select = 'select grupo
   from arqGrupo
   where idPrimario=' . navegouDe( 'arqGrupo' );
$grupo = sql_lerUmRegistro( $select )->GRUPO;
sql_fecharBD();

exibirPermissoes( 'grupo', 'arqGrupo', 'Grupo ' . $grupo, 'p_permissoes_gravar' );

