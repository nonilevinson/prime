<?php

global $g_debugProcesso;

// sql_abrirBD( OperacaoAtual() );
sql_abrirBD( false );


sql_executarComando( 'alter trigger ARQCONSULTA_AI_AU inactive;' );
sql_commit();


$select = "Select C.idPrimario as idConta
   From arqConta C
   Where C.TrgValor = 0";
$regConta =sql_lerRegistros( $select );
echo '<br><b>GR0 arqConta S=</b> '.$select;

foreach( $regConta as $umaConta )
{
   $idConta = $umaConta->IDCONTA;

   sql_update( "arqConsulta", [
         "ContaCons" => null ],
      "ContaCons = " . $idConta,1,true );

   $delete = "delete From arqConta Where idPrimario = " . $idConta;
echo '<br><b>GR0 delete S=</b> '.$delete;
   
   sql_executarComando( $delete );
   sql_commit();
}

sql_executarComando( 'alter trigger ARQCONSULTA_AI_AU active;' );
sql_commit();

/*
$select = "Select RecorDia From cnfXConfig";
$recorDia = sql_lerUmRegistro( $select )->RECORDIA;
if( $g_debugProcesso ) echo '<br><b>GR0 cnfXConfig S=</b> '.$select.' <b>recorDia=</b> '.$recorDia;

$hoje = formatarData( HOJE, 'aaaa/mm/dd');
$diaHoje = dataDia( $hoje );
$ultDia = ultDiaDoMes( $hoje );

if( $g_debugProcesso ) echo '<br><b>GR0 hoje=</b> '.$hoje.' diaHoje= '.$diaHoje.' ult= '.$ultDia;
echo '<br>';

if( $recorDia == $diaHoje || $recorDia > $ultDia || ultimaLigOpcaoEm( 162 ) )
   echo '<br>&nbsp;&nbsp;PODE';
else
   echo '<br>&nbsp;&nbsp;NÃO PODE';
*/

sql_fecharBD();

echo '<p style="text-align: center; font-weight: bold; font-size:16px">*** Fim às ' .
   formatarHora( AGORA, 'hh:mm' ) . ' ***</p>';
