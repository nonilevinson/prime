<?php

global $g_debugProcesso;

// sql_abrirBD( OperacaoAtual() );
// sql_abrirBD( false );

$dia = dataDia( HOJE);
echo '<br>dia= '.$dia;

if( $dia == 15 )
   echo '<br> eh dia 15';
else
   echo '<br>nao eh dia 15';

if( $dia == 16 )
   echo '<br> eh dia 16';
else
   echo '<br>nao eh dia 16';

// sql_fecharBD();

echo '<p style="text-align: center; font-weight: bold; font-size:16px">*** Fim às ' .
   formatarHora( AGORA, 'hh:mm' ) . ' ***</p>';
