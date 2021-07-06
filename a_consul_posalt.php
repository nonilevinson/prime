<?php

global $g_debugProcesso, $g_regAntes, $g_regAtual;

//* o paciente desmarcou
if( $g_regAntes->TSTCON != $g_regAtual->TSTCON && $g_regAtual->TSTCON == 10 )
{
   $idPessoa = $g_regAtual->PESSOA;

   $select = "Select P.QtoDesmar
      From arqPessoa P
      Where P.idPrimario = " . $idPessoa;
   $qtoDesmar = sql_lerUmRegistro( $select )->QTODESMAR;
   $novoQto   = $qtoDesmar + 1;

   sql_update( "arqPessoa", [
         "QtoDesmar" => $novoQto ],
      "idPrimario = " . $idPessoa );

   if( $novoQto >= G_QTASDESMAR )
      tecleAlgoVolta( 'Esse paciente ultrapassou o limite de ' . G_QTASDESMAR . ' desmarcações', true );
}
