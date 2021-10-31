<?php

global $g_debugProcesso;

sql_abrirBD( OperacaoAtual() );
sql_iniciarTransacao();

$parQCaixa = lerParametro( 'parQCaixa' );
$op        = ultimaLigOpcao();

$select = "Select X.CCorRec, X.CCorAss, X.SubPlaRRec, X.SubPlaRAss
      From cnfXConfig X";
$umXConfig = sql_lerUmRegistro( $select );
// if( $g_debugProcesso ) echo '<br><br><b>GR0 cnfXConfig S=</b> '.$select;

switch( ultimaLigOpcao() )
{
   case 176: //* saída recepção
      $tPgRec   = 1;
      $cCor     = $umXConfig->CCORREC;
      $subPlano = $parQCaixa->SUBPLANO;
      break;

   case 177: //* entrada recepção
      $tPgRec   = 2;
      $cCor     = $umXConfig->CCORREC;
      $subPlano = $umXConfig->SUBPLARREC;
      break;

   case 180: //* saída assessor
      $tPgRec   = 1;
      $cCor     = $umXConfig->CCORASS;
      $subPlano = $umXConfig->SUBPLARASS;
      break;

   case 181: //* entrada assessor
      $tPgRec   = 2;
      $cCor     = $umXConfig->CCORASS;
      $subPlano = $umXConfig->SUBPLARASS;
      break;
}
if( $g_debugProcesso ) echo '<br><b>GR0 cCor S=</b> '.$cCor.' <b>subPlano=</b> '.$subPlano;

$idConta = sql_IdPrimario();
$data    = $parQCaixa->DATA;
$data1   = formatarData( $data, 'aaaa/mm/dd' );
$compete = dataAno( $data ) . "/" . dataMes( $data ). "/01";

$select = "Select coalesce( max( Transacao ), 0 ) as Transacao
   From arqConta";
$proxTransacao = sql_lerUmRegistro( $select )->TRANSACAO + 1;

sql_insert( "arqConta", [
   "idPrimario" => $idConta,
   "Transacao"  => $proxTransacao,
   "Clinica"    => $parQCaixa->CLINICA,
   "TPgRec"     => $tPgRec,
   "Fornecedor" => ValorOuNull( $parQCaixa->FORNECEDOR, '', false ),
   "Pessoa"     => ValorOuNull( $parQCaixa->PESSOA, '', false ),
   "TrgValor"   => 0,
   "TrgValLiq"  => 0,
   "TrgQtdParc" => 0,
   "TrgQParcPg" => 0,
   "ProxVenc"   => null,
   "TrgPago"    => 0,
   "Documento"  => 0,
   "Emissao"    => $data1,
   "RecEnvia"   => $data1,
   "Compete"    => $compete,
   "Historico"  => $parQCaixa->HISTORICO,
   "Arq1"       => null ] );

sql_insert( "arqParcela", [
   "idPrimario" => [ sql_NumeroUnico(), FORCAR_NUMERICO ],
   "Conta"      => $idConta,
   "Parcela"    => 1,
   "Vencimento" => $data,
   "Vencest"    => 0,
   "Valor"      => $parQCaixa->VALOR,
   "ValorLiq"   => $parQCaixa->VALOR,
   "Estimado"   => 0,
   "TFCobra"    => 3,
   "Emissao"    => null,
   "LinhaDig"   => '',
   "NomePdf"    => '',
   "CCor"       => $cCor,
   "SubPlano"   => $subPlano,
   "DataPagto"  => $data,
   "DataComp"   => $data,
   "TFPagto"    => 2,
   "TDetPg"     => null,
   "FormaPg"    => ValorOuNull( $parQCaixa->FORMAPG, '', false ),
   "Cheque"     => 0,
   "Arq1"       => null,
   "StRetorno"  => '',
   "Remessa"    => 0,
   "DataRem"    => null ] );

sql_gravarTransacao();
sql_fecharBD();

$teste = false;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
else
   TecleAlgoVolta( 'Lançamento criado', true );
