<?php

//======================================================================
function navContaConsulta()
{
	return( "( Select C.idPrimario
		From arqConsulta C
		Where C.ContaCons = A.idPrimario ) = " . navegouDe('arqConsulta') );
}

//======================================================================
function navContaTratamento()
{
	return( "( Select C.idPrimario
		From arqConsulta C
		Where C.ContaPTra = A.idPrimario ) = " . navegouDe('arqConsulta') );
}

//===========================================================
function filtrarSelecao()
{
   $parQSelecao = lerParametro( 'parQSelecao' );

   return( substr(
      ( SQL_VETIDCLINICA ? "A.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
      ( $parQSelecao->CADEIA30 != '' ? filtrarPorUpper( "A.Historico", $parQSelecao->CADEIA30 ) : '' ) .
      filtrarPorLig( "A.TPgRec", $parQSelecao->TPGREC ) .
      filtrarPorLig( "A.Clinica", $parQSelecao->CLINICA ) .
      filtrarPorLig( "A.Fornecedor", $parQSelecao->FORNECEDOR ) .
      filtrarPorLig( "A.Pessoa", $parQSelecao->CLIENTE ), 0, -4 )
   );
}

//===========================================================
function filtrarTodos()
{
   return(
	   ( SQL_VETIDCLINICA ? 'A.Clinica in ' . SQL_VETIDCLINICA : '' ) /*.
      ( SQL_VETIDCLINICA && SQL_VETIDCCOR ? ' and ' : '' ) .
		( SQL_VETIDCCOR ? 'A.CCor in ' . SQL_VETIDCCOR : '' ) */
   );
}
