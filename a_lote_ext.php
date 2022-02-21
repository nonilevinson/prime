<?php

//===========================================================
function filtrarSelecao()
{
   $parQSelecao = lerParametro( 'parQSelecao' );

   return( substr(
      ( SQL_VETIDCLINICA ? "A.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
      filtrarPorIntervaloData( "A.Validade", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
      filtrarPorIntervaloData( "A.Fabrica", $parQSelecao->DATAINI1, $parQSelecao->DATAFIM1 ) .
      filtrarPorLig( "A.Clinica", $parQSelecao->CLINICA ) .
      filtrarPorLig( "A.Medicamen", $parQSelecao->MEDICAMEN ) .
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
