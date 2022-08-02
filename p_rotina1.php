<?php

global $g_debugProcesso;

// sql_abrirBD( OperacaoAtual() );
sql_abrirBD( false );

sql_executarComando( 'delete from ARQLANCELOGACESSO where STATUS is null;' );
sql_executarComando( 'delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;' );
sql_commit();

sql_fecharBD();

echo '<p style="text-align: center; font-weight: bold; font-size:16px">*** Fim às ' .
   formatarHora( AGORA, 'hh:mm' ) . ' ***</p>';
