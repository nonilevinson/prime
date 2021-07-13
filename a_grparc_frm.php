<?php

global $g_debugProcesso, $parGeraParc;

//=================================================================================
function umaParc( $p_num, $p_data, $p_venc, $p_dia, $p_est, $p_valor, $p_perc,
   $p_pg, $p_cc )
{
   global $g_arquivoAtual;
   return(
      '<tr>
         <td class="FormCab alinhaMeio">' . $p_num . '</td>' .
         $g_arquivoAtual->PedirColunaZerando( "", $p_data ) .
         $g_arquivoAtual->PedirColunaZerando( "", $p_venc ) .
         $g_arquivoAtual->PedirColunaZerando( "", $p_dia )  .
         $g_arquivoAtual->PedirColuna( "", $p_est ) .
         $g_arquivoAtual->PedirColunaZerando( "", $p_valor ) .
         $g_arquivoAtual->PedirColunaZerando( "", $p_perc ) .
         $g_arquivoAtual->PedirColunaZerando( "", $p_pg ) .
         $g_arquivoAtual->PedirColuna( "", $p_cc ) .
      '</tr>' );
}
//=================================================================================

echo
"<table class='Formulario' >
   <table class='tabFormulario'>";

//* 31/05/2021 o sistema ainda não tem outra opção
// if( ultimaLigOpcaoEm( 130 ) ) //* menu Finaneiro
{
   echo
   $this->PedirZerando( "Clínica", Clinica ),
   $this->PedirZerando( "Fornecedor" ),
   $this->PedirZerando( "Paciente", Pessoa_Nome ),
   $this->PedirZerando( " ",
      [ "Prontuário ", Pessoa_Prontuario,
      [ "", Pessoa ] ] ),
   $this->PedirZerando( "Tipo",
      [ "", TPgRec,
      [ brHtml(4) . "Valor ", Valor,
      [ brHtml(4) . "Estimado? ", Estimado ] ] ] ),
   $this->PedirZerando( "Documento Nº",
      [ "", Documento, " (informe o número da NFe ou similar que recebeu ou emitiu)" ] ),
   $this->PedirZerando( "Histórico", Historico ),

   $this->Pular1Linha(2),
   $this->PedirZerando( "Emissão ",
      [ "", Emissao,
      [ brHtml(4) . "Competência ", Compete,
      [ brHtml(4) . "Recebido/Enviado ", RecEnvia ] ] ] ),

   $this->PedirZerando( "Condição para a 1ª parcela",
      [ "", Condicao,
      [ brHtml(4) . "Parcelas ", Parcelas,
      [ brHtml(4) . "Iguais (mesmo valor)? ", Iguais,
      [ brHtml(4) . "Intervalo entre as parcelas ", Intervalo ] ] ] ] ),
      $this->PedirZerando( "Forma de cobrança",
         [ "", TFCobra, brHtml(2) . "(sugerimos que só preencha este campo se estiver com o documento em mãos)" ] ),
   $this->Pular1Linha(2),
   $this->Cabecalhos( [ "Se quiser gerar como pagas", "FormCab alinhaMeio", "2" ] ),
   $this->PedirZerando( "Forma de pagamento", TFPagto ),
   $this->PedirZerando( "Detalhe", TDetPg ),
   $this->PedirZerando( "Conta Corrente",
      [ "Banco ", CCor_Banco ] ),
   $this->PedirZerando( " ",
      [ "Agência ", CCor_Agencia,
      [ brHtml(4) . "Conta ", CCor ] ] ),
   $this->PedirZerando( "Cheque" );
}

//* 31/05/2021 o sistema ainda não tem outra opção
/*
else
{
   echo
   $this->Pedir( "Clínica",
      [ "", Clinica, '','','','','FormCalculado' ] ),
   $this->Pedir( "Pessoa",
      [ "", Pessoa, '','','','','FormCalculado' ] ),
   $this->Pedir( "Tipo",
      [ "", TPgRec,
      [ brHtml(4) . "Valor ", Valor,
      [ brHtml(4) . "Documento ", Documento,'','','','','FormCalculado' ],'','','','FormCalculado' ],'','','','FormCalculado' ] ),
   $this->Pedir( "Histórico", Historico ),

   $this->Pular1Linha(2),
   $this->Pedir( "Emissão ",
      [ "", Emissao,
      [ brHtml(4) . "Competência ", Compete,
      [ brHtml(4) . "Recebido/Enviado ", RecEnvia ] ] ] ),

   $this->Pedir( "Condição para a 1ª parcela",
      [ "", Condicao,
      [ brHtml(4) . "Parcelas ", Parcelas,
      [ brHtml(4) . "Iguais (mesmo valor)? ", Iguais,
      [ brHtml(4) . "Intervalo entre as parcelas ", Intervalo ] ],'','','','FormCalculado' ] ] ),
   $this->Pedir( "Forma de cobrança",
      [ "", TFCobra,
      [ brHtml(4) . "Bandeira ", Bandeira, '','','','','FormCalculado' ],'','','','FormCalculado' ] );
}
*/
   echo
   "</table>
   <br>
   <table class='tabFormulario'>",
      $this->Cabecalhos( '&nbsp;', 'Intervalo', 'Vencimento', 'Dia', 'Vencimento<br>Estimado?',
         'Valor', '%', 'Pagamento', 'Plano de contas' ),
      umaParc(  1, Dia1,  Venc1,  Semana1,  Est1,  Valor1,  Perc1,  Pg1,  Cc1 ),
      umaParc(  2, Dia2,  Venc2,  Semana2,  Est2,  Valor2,  Perc2,  Pg2,  Cc2 ),
      umaParc(  3, Dia3,  Venc3,  Semana3,  Est3,  Valor3,  Perc3,  Pg3,  Cc3 ),
      umaParc(  4, Dia4,  Venc4,  Semana4,  Est4,  Valor4,  Perc4,  Pg4,  Cc4 ),
      umaParc(  5, Dia5,  Venc5,  Semana5,  Est5,  Valor5,  Perc5,  Pg5,  Cc5 ),
      umaParc(  6, Dia6,  Venc6,  Semana6,  Est6,  Valor6,  Perc6,  Pg6,  Cc6 ),
      umaParc(  7, Dia7,  Venc7,  Semana7,  Est7,  Valor7,  Perc7,  Pg7,  Cc7 ),
      umaParc(  8, Dia8,  Venc8,  Semana8,  Est8,  Valor8,  Perc8,  Pg8,  Cc8 ),
      umaParc(  9, Dia9,  Venc9,  Semana9,  Est9,  Valor9,  Perc9,  Pg9,  Cc9 ),
      umaParc( 10, Dia10, Venc10, Semana10, Est10, Valor10, Perc10, Pg10, Cc10 ),
      umaParc( 11, Dia11, Venc11, Semana11, Est11, Valor11, Perc11, Pg11, Cc11 ),
      umaParc( 12, Dia12, Venc12, Semana12, Est12, Valor12, Perc12, Pg12, Cc12 ),
      $this->NaoPedir( 'TotValor' ),
   "</table>
</table>";
