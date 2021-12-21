<?php

//===========================================================
function filtrarSelecao()
{
   $parQSelecao = lerParametro( 'parQSelecao' );

   switch( $parQSelecao->TSIMNAO )
   {
      case 0: $fechados = ""; break;
      case 1: $fechados = "A.Fechado = 0 and "; break;
      case 2: $fechados = "A.Fechado = 1 and "; break;
   }

   return( substr( $fechados .
      ( SQL_VETIDCLINICA ? "A.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
      filtrarPorIntervaloData( "A.Data", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
      filtrarPorIntervalo( "A.Num", $parQSelecao->GRAN9, $parQSelecao->GRAN9FIM ) .
      filtrarPorLig( "A.Clinica", $parQSelecao->CLINICA ) .
      filtrarPorLig( "A.Fornecedor", $parQSelecao->FORNECEDOR ), 0, -4 )
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
