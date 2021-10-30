<?php

global $g_debugProcesso;
$op = ultimaLigOpcao();

//=================================================================================
function umaParc( $p_num, $p_data, $p_venc, $p_dia, $p_est, $p_valor, $p_perc, $p_pg, $p_cc, $p_linha )
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
         $g_arquivoAtual->PedirColunaZerando( "", $p_linha ) .
      '</tr>' );
}

//=================================================================================
function umaParcTrata( $p_num, $p_data, $p_venc, $p_dia, $p_tFCobra, $p_formaPg, $p_valor )
{
   global $g_arquivoAtual;
   return(
      '<tr>
         <td class="FormCab alinhaMeio">' . $p_num . '</td>' .
         $g_arquivoAtual->PedirColunaZerando( "", $p_data ) .
         $g_arquivoAtual->PedirColunaZerando( "", $p_venc ) .
         $g_arquivoAtual->PedirColunaZerando( "", $p_dia )  .
         $g_arquivoAtual->PedirColunaZerando( "", $p_tFCobra ) .
         $g_arquivoAtual->PedirColunaZerando( "", $p_formaPg ) .
         $g_arquivoAtual->PedirColunaZerando( "", $p_valor ) .
      '</tr>' );
}
//=================================================================================

echo
"<table class='Formulario' >
   <table class='tabFormulario'>";

if( $op == 130 ) //* menu Finaneiro
{
   echo
   $this->PedirZerando( "Clínica", Clinica ),
   $this->PedirZerando( "Fornecedor" ),
   $this->PedirZerando( "Paciente", Pessoa_Nome ),
   $this->PedirZerando( " ",
      [ "Celular ", Pessoa_NumCelular,
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
   $this->PedirZerando( "Conta corrente", CCor ),
   $this->PedirZerando( "Cheque" ),
   "</table>
   <br>
   <table class='tabFormulario'>",
      $this->Cabecalhos( '&nbsp;', 'Intervalo', 'Vencimento', 'Dia', 'Vencimento<br>Estimado?',
         'Valor', '%', 'Pagamento', 'Plano de contas', 'Linha digitável' ),
      umaParc(  1, Dia1,  Venc1,  Semana1,  Est1,  Valor1,  Perc1,  Pg1,  Cc1, Linha1 ),
      umaParc(  2, Dia2,  Venc2,  Semana2,  Est2,  Valor2,  Perc2,  Pg2,  Cc2, Linha2 ),
      umaParc(  3, Dia3,  Venc3,  Semana3,  Est3,  Valor3,  Perc3,  Pg3,  Cc3, Linha3 ),
      umaParc(  4, Dia4,  Venc4,  Semana4,  Est4,  Valor4,  Perc4,  Pg4,  Cc4, Linha4 ),
      umaParc(  5, Dia5,  Venc5,  Semana5,  Est5,  Valor5,  Perc5,  Pg5,  Cc5, Linha5 ),
      umaParc(  6, Dia6,  Venc6,  Semana6,  Est6,  Valor6,  Perc6,  Pg6,  Cc6, Linha6 ),
      umaParc(  7, Dia7,  Venc7,  Semana7,  Est7,  Valor7,  Perc7,  Pg7,  Cc7, Linha7 ),
      umaParc(  8, Dia8,  Venc8,  Semana8,  Est8,  Valor8,  Perc8,  Pg8,  Cc8, Linha8 ),
      umaParc(  9, Dia9,  Venc9,  Semana9,  Est9,  Valor9,  Perc9,  Pg9,  Cc9, Linha9 ),
      umaParc( 10, Dia10, Venc10, Semana10, Est10, Valor10, Perc10, Pg10, Cc10, Linha10 ),
      umaParc( 11, Dia11, Venc11, Semana11, Est11, Valor11, Perc11, Pg11, Cc11, Linha11 ),
      umaParc( 12, Dia12, Venc12, Semana12, Est12, Valor12, Perc12, Pg12, Cc12, Linha12 ),
      $this->NaoPedir( 'TotValor' ),
   "</table>";

}

if( $op == 184 ) //* criar de tratamento de uma consulta no menu de navegação
{
   echo
   // $this->NaoPedir( Clinica, $umaConsulta->CLINICA ),
   // $this->NaoPedir( Pessoa, $umaConsulta->PESSOA ),
   $this->NaoPedir( TPgRec, 2 ),
   $this->NaoPedir( Emissao, formatarData( HOJE, 'aaaa/mm/dd' ) ),
   $this->NaoPedir( Compete, dataAno( HOJE ) . "/" . dataMes( HOJE ). "/01" ),
   $this->NaoPedir( RecEnvia, formatarData( HOJE, 'aaaa/mm/dd' ) ),

   $this->Pedir( "Clínica",
      [ "", Clinica, '','','','','FormCalculado' ] ),
   $this->Pedir( "Paciente",
      [ "", Pessoa_Nome, '','','','','FormCalculado' ] ),
   $this->Pedir( " ",
      [ "Celular ", Pessoa, '','','','','FormCalculado' ] ),
   $this->Pedir( "Valor",
      [ "", Valor, '','','','','FormCalculado' ] ),
   $this->Pedir( "Histórico",
      [ "", Historico, '','','','','FormCalculado' ] ),

   $this->Pular1Linha(2),
   $this->PedirZerando( "Parcelas",
      [ "Quantas ", Parcelas,
      [ " (obrigatório)" . brHtml(4) . "Iguais (mesmo valor)? ", Iguais ] ] ),
   $this->PedirZerando( "Condição",
      [ "Para a 1ª parcela ", Condicao,
      [ brHtml(4) . "Intervalo entre as demais ", Intervalo ] ] ),
   "</table>
   <br>
   <table class='tabFormulario'>",
      $this->Cabecalhos( '&nbsp;',
         'Intervalo',
         [ 'Vencimento', 'FormCab alinhaMeio' ],
         [ 'Dia', 'FormCab alinhaMeio' ],
         [ 'Cobrança', 'FormCab alinhaMeio' ],
         [ 'Cartão', 'FormCab alinhaMeio' ],
         [ 'Valor (se Não iguais)', 'FormCab alinhaMeio' ] ),
      umaParcTrata(  1, Dia1, Venc1, Semana1, TFCobra1, FormaPg1, Valor1 ),
      umaParcTrata(  2, Dia2, Venc2, Semana2, TFCobra2, FormaPg2, Valor2 ),
      umaParcTrata(  3, Dia3, Venc3, Semana3, TFCobra3, FormaPg3, Valor3 ),
      $this->NaoPedir( 'TotValor' ),
   "</table>";
}

echo
"</table>";
