<?php

global $g_debugProcesso;

sql_abrirBD( OperacaoAtual() );

$select = "Select P.idPrimario as idPessoa
   From " . FromMarcados( "arqPessoa", "P" ) ."
   Where " . WhereMarcados();
$regPessoa = sql_lerRegistros( $select );

foreach( $regPessoa as $umaPessoa )
{
   $idPessoa = $umaPessoa->IDPESSOA;
   
   sql_update( "arqConsulta", [
         "ContaCons" => null,
         "ContaPTra" => null
         ],
      "Pessoa = " . $idPessoa );
   
   $deleteConta = "delete from arqConta Where Pessoa = " . $idPessoa;
   sql_executarComando( $deleteConta );
   sql_commit();
// if( $g_debugProcesso ) echo '<br><b>GR0 delete arqConta=</b> '.$deleteConta;
   
   $deleteConsulta = "delete from arqConsulta Where Pessoa = " . $idPessoa;
   sql_executarComando( $deleteConsulta );
   sql_commit();
// if( $g_debugProcesso ) echo '<br><b>GR0 delete arqConsulta=</b> '.$deleteConsulta;

   $deletePessoa = "delete from arqPessoa Where idPrimario = " . $idPessoa;
   sql_executarComando( $deletePessoa );
   sql_commit();
// if( $g_debugProcesso ) echo '<br><b>GR0 delete arqConsulta=</b> '.$deletePessoa;
}

sql_fecharBD();

$teste = false;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
else
{
   desmarcarMarcados( "arqPessoa" );
   tecleAlgoVolta( 'As pessoas foram excluidas.\nVerifique', true );
}
