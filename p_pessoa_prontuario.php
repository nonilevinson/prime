<?php

global $g_debugProcesso;
$parQSelecao = lerParametro( 'parQSelecao' );

sql_abrirBD( false );

$gran13 = $parQSelecao->GRAN13;

$select = "Select P.Nome
   From arqPessoa P
   Where P.Prontuario = " . $gran13 .
   " rows 1";
$umaPessoa = sql_lerUmRegistro( $select );
// if( $g_debugProcesso ) echo '<br><b>GR0 arqPessoa 1 S=</b> '.$select;

if( $umaPessoa )
{
   tecleAlgoVolta( "O prontuário Nº " . formatarNum( $gran13 ) . ", já foi atribuido ao paciente " .
      $umaPessoa->NOME, true );
}
else
{
   sql_update( "arqPessoa", [
         "Prontuario" => $gran13 ],
      "idPrimario = " . navegouDe( 'arqPessoa' ) );

   $select = "Select gen_id( genProntuario, 0 ) as Prontuario
      From cnfXConfig";
   $genProntuario = sql_lerUmRegistro( $select )->PRONTUARIO;

   if( $genProntuario < $gran13 )
      sql_executarComando( 'set generator genProntuario to ' . $gran13 );
}

sql_fecharBD();

$teste = false;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
else
   tecleAlgoVolta( 'O prontuário foi alterado.\nVerifique', true, 2 );
