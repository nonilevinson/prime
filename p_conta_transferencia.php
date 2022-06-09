<?php

//------------------------------------------------------------------
function CriarContaParcela( $p_ccor, $p_tPgRec, $p_idFornecedor, $p_historico, $p_tFCobra,
   $p_subPlano, $p_tFPagto, $p_tDetPg )
{
   global $g_debugProcesso, $g_compete, $g_emissao, $g_vencimento, $g_valor;

   $select = "Select coalesce( max( Transacao ), 0 ) as Num
      From arqConta";
   $proxNum = sql_lerUmRegistro( $select )->NUM + 1;

   $select = "Select C.Clinica as idClinica
      From arqCCor C
      Where C.idPrimario = " . $p_ccor;
   $idClinica = sql_lerUmRegistro( $select )->IDCLINICA;
// if( $g_debugProcesso ) echo '<br><b>GR0 arqCCor S=</b> '.$select.' <b>idClinica=</b> '.$idClinica;

   //* CRIA A CONTA
   $idConta = sql_IdPrimario();

   sql_insert( "arqConta", [
      "idPrimario" => $idConta,
      "Transacao" => $proxNum,
      "Clinica" => $idClinica,
      "TPgRec" => $p_tPgRec,
      "Fornecedor" => $p_idFornecedor,
      "Pessoa"    => null,
      "TrgValor" => 0,
      "TrgValLiq" => 0,
      "TrgQtdParc" => 0,
      "TrgQParcPg" => 0,
      "ProxVenc" => null,
      "TrgPago" => 0,
      "Documento" => 0,
      "Emissao" => $g_emissao,
      "RecEnvia" => $g_emissao,
      "Compete"    => $g_compete,
      "Historico"  => $p_historico ] );

   //* CRIA A PARCELA
   sql_insert( "arqParcela", [
      "idPrimario" => [ sql_NumeroUnico(), FORCAR_NUMERICO ],
      "Conta"      => $idConta,
      "Parcela"    => 1,
      "Vencimento" => $g_vencimento,
      "VencEst"    => 0,
      "Valor"      => $g_valor,
      "ValorLiq"   => $g_valor,
      "Estimado"   => 0,
      "TFCobra"    => $p_tFCobra,
      "Emissao"    => null,
      "LinhaDig"   => '',
      "NomePdf"    => '',
      "CCor"       => $p_ccor,
      "SubPlano"   => null,
      "DataPagto"  => $g_vencimento,
      "DataComp"   => $g_vencimento,
      "TFPagto"    => $p_tFPagto,
      "TDetPg"     => ValorOuNull( $p_tDetPg, '', false ),
      "FormaPg"    => null,
      "Cheque"     => 0,
      "StRetorno"  => '',
      "Remessa"    => 0,
      "DataRem"    => null,
      "Historico"  => '' ] );
}
//------------------------------------------------------------------

global $g_debugProcesso, $parGeraTransf, $g_compete, $g_emissao, $g_vencimento, $g_valor;
$parGeraTransf = lerParametro( 'parGeraTransf' );
$g_compete     = montarData( 1, dataMes( $parGeraTransf->EMISSAO ), dataAno( $parGeraTransf->EMISSAO ), true );
$g_emissao     = $parGeraTransf->EMISSAO;
$g_vencimento  = $parGeraTransf->VENCIMENTO;
$g_valor = $parGeraTransf->VALOR;

sql_abrirBD( OperacaoAtual() );
sql_iniciarTransacao();

//* débito
CriarContaParcela( $parGeraTransf->CCORDB, 1, $parGeraTransf->FORNEDB, $parGeraTransf->HISTDB,
   $parGeraTransf->TFCOBRADB, $parGeraTransf->SUBPLADB, $parGeraTransf->TFPAGTODB, $parGeraTransf->TDETPGDB );

//* crédito
CriarContaParcela( $parGeraTransf->CCORCR, 2, $parGeraTransf->FORNECR, $parGeraTransf->HISTCR,
   $parGeraTransf->TFCOBRACR, $parGeraTransf->SUBPLACR, $parGeraTransf->TFPAGTOCR, $parGeraTransf->TDETPGCR );

sql_gravarTransacao();
sql_fecharBD();

$teste = false;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
else
   tecleAlgoVolta( "Geradas as contas e parcelas da transferência", true, 1 );
