<?php

global $g_debugProcesso;
$parQSelecao = lerParametro( 'parQSelecao' );

$idComCall = navegouDe( 'arqComCall' );
$idClinica = $parQSelecao->CLINICA;
$mesIni    = $parQSelecao->MESINI;

sql_abrirBD( OperacaoAtual() );

$select = "Select C.idPrimario
   From arqComCall C
   Where C.Clinica = " . $idClinica . " and C.Mes = '" . $mesIni . "'";
$umComCall = sql_lerUmRegistro( $select );
if( $g_debugProcesso ) echo '<br><b>GR0 arqFxComCall S=</b> '.$select;

if( $umComCall )
   tecleAlgoVolta( 'Já existe um comissionamento para a clínica e o mês informados', true, 2 );
else
{
   $idComCallNovo = sql_idPrimario();

   //* Crio a nova comissão
   $insert = "Insert into arqComCall Select " .
      $idComCallNovo . ", " .
      $idClinica . ", '" .
      $mesIni . "',
      0
   From arqComCall
   Where idPrimario = " . $idComCall;
   sql_executarComando( $insert );
   if( $g_debugProcesso ) echo '<br><b>GR0 arqComCall insert=</b> '.$insert;

   //* preciso saber o mês da comissão original
   $select = "Select C.Clinica as idClinica, C.Mes
      From arqComCall C
      Where C.idPrimario = " . $idComCall;
   $umComCall = sql_lerUmRegistro( $select );
   
   //* Pego as faixas da comissão original
   $select = "Select F.Faixa, F.PercAte, F.Comissao
      From arqFxComCall F
         join arqComCall C on C.idPrimario=F.ComCall
      Where C.Clinica = " . $umComCall->IDCLINICA . " and C.Mes = '" . $umComCall->MES . "'
      Order by F.Faixa";
   $regFxComCall = sql_lerRegistros( $select );
   if( $g_debugProcesso ) echo '<br><b>GR0 arqFxComCall S=</b> '.$select;

   foreach( $regFxComCall as $umFxComCall )
   {
      sql_insert( "arqFxComCall", [
         "idPrimario" => [ sql_NumeroUnico(), FORCAR_NUMERICO ],
         "ComCall"    => $idComCallNovo,
         "Faixa"      => $umFxComCall->FAIXA,
         "PercAte"    => $umFxComCall->PERCATE,
         "Comissao"   => $umFxComCall->COMISSAO ] );
   }

   sql_fecharBD();

$teste = false;
   if( $teste )
      echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
   else
      tecleAlgoVolta( 'Comissão copiada\nVerifique', true, 2 );
}
