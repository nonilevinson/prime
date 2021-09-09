<?php

//===========================================================
function filtrarSelecao()
{
   $parQSelecao = lerParametro( 'parQSelecao' );

   return( substr(
      ( SQL_VETIDCLINICA ? "A.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
      ( $parQSelecao->CADEIA30 != '' ? filtrarPorUpper( "A.Historico", $parQSelecao->CADEIA30 ) : '' ) .
      filtrarPorLig( "A.TPgRec", $parQSelecao->TPGREC ) .
      filtrarPorLig( "A.Clinica", $parQSelecao->CLINICA ) .
      filtrarPorLig( "A.Pessoa", $parQSelecao->PESSOA ), 0, -4 )
   );
}

//===========================================================
function filtrarTodos()
{
   return(
	   ( SQL_VETIDCLINICA
         ? substr( 'A.Clinica in ' . SQL_VETIDCLINICA . ' and ', 0, -4 )
         : ''
      )
   );
}
