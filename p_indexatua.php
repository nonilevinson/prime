<?php

global $g_debugProcesso;
if( $g_debugProcesso ) echo '<br><b>GR0 INÍCIO </b> '.AGORA;

sql_abrirBD( false );

//* Esses ficavam no conversor e me toquei que podem ficar aqui e rodarem sempre pela Task
   sql_executarComando( 'delete from ARQLANCELOGACESSO where STATUS is null;' );
   sql_executarComando( 'delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;' );
   sql_commit();
   sql_executarComando( 'execute procedure reindexartudo;' );
   sql_commit();
   
   sql_executarComando( "update arqPessoa set Prontuario='' where Prontuario is null;" );
   sql_commit();
//* Fim

sql_executarComando( 'execute procedure reindexarIndices' );
sql_commit();

sql_fecharBD();

if( $g_debugProcesso ) echo '<br><b>GR0 FIM </b> '.AGORA;
