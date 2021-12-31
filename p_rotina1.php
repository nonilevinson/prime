<?php

global $g_debugProcesso;

// sql_abrirBD( OperacaoAtual() );
sql_abrirBD( false );

$select = "Select C.idPrimario as idConta
   From arqConta C
   Where C.TrgValor = 0";
$regConta =sql_lerRegistros( $select );
if( $g_debugProcesso ) echo '<br><b>GR0 arqConta S=</b> '.$select;

foreach( $regConta as $umaConta )
{
   $idConta = $umaConta->IDCONTA;

   sql_update( "arqConsulta", [
         "ContaCons" => null ],
      "ContaCons = " . $idConta );

   sql_executarComando( "delete From arqConta Where idPrimario = " . $idConta );
   commit;      
}



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

if( $g_debugProcesso ) echo '<br><b>FIM p_rotina1 ÀS '.AGORA().'</b>';