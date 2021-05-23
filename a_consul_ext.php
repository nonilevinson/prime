<?php

//===========================================================
function ext_filtrarSelecao()
{
   $parQSelecao = lerParametro( 'parQSelecao' );

   return( substr(
      ( SQL_VETIDCLINICA ? "A.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
      filtrarPorLig( "A.TStCon", $parQSelecao->TSTCON ) .
      filtrarPorLig( "A.Clinica", $parQSelecao->CLINICA ) .
      filtrarPorLig( "A.Medico", $parQSelecao->MEDICO ) .
      filtrarPorLig( "A.Pessoa", $parQSelecao->PESSOA ), 0, -4 )
   );
}

//===========================================================
function ext_filtrarTodas()
{
   return(
	   ( SQL_VETIDCLINICA
         ? substr( 'A.Clinica in ' . SQL_VETIDCLINICA . ' and ', 0, -4 )
         : ''
      )
   );
}
