<?php

global $g_debugProcesso;

sql_abrirBD( OperacaoAtual() );

$select = "Select P.idPrimario as idParcela
   From arqParcela P
   Where P.Vencimento is null";
$regParcela =sql_lerRegistros( $select );

foreach( $regParcela as $umaParcela )
{
   $idParcela = $umaParcela->IDPARCELA;

   $select = "Select L.Data
      From arqLanceLogAcesso L
      Where L.Status = 13 and L.IdQuem = " . $idParcela;
   $data = sql_lerUmRegistro( $select )->DATA;
// if( $g_debugProcesso ) echo '<br><b>GR0 arqLanceLogAcesso S=</b> '.$select.' <b>data=</b> '.$data;

   sql_update( "arqParcela", [
         "Vencimento" => $data
         ],
      "idPrimario = " . $idParcela,1,true );
}

sql_fecharBD();

$teste = false;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';

echo '<p style="text-align: center; font-weight: bold; font-size:16px">*** Fim às ' .
   formatarHora( AGORA, 'hh:mm' ) . ' ***</p>';
