<?php

global $g_debugProcesso;
if( $g_debugProcesso ) echo '<br><b>GR0 INÍCIO </b> '.AGORA;

sql_abrirBD( false );

sql_executarComando( 'execute procedure reindexarIndices' );
sql_commit();

sql_fecharBD();

if( $g_debugProcesso ) echo '<br><b>GR0 FIM </b> '.AGORA;
