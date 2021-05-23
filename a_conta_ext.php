<?php

//===========================================================
function ext_filtrarSelecao()
{
   $parQSelecao = lerParametro( 'parQSelecao' );

   return( substr(
      ( SQL_VETIDCLINICA ? "A.Centro in " . SQL_VETIDCLINICA . ' and ': '' ) .
      ( $parQSelecao->CADEIA30 != '' ? filtrarPorUpper( "A.Historico", $parQSelecao->CADEIA30 ) : '' ) .
      filtrarPorLig( "A.TPgRec", $parQSelecao->TPGREC ) .
      filtrarPorLig( "A.Centro", $parQSelecao->CENTRO ) .
      filtrarPorLig( "A.Pessoa", $parQSelecao->PESSOA ), 0, -4 )
   );
}
