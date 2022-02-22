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

   if( SQL_VETIDCCOR )
   {
      $select = "Select P.Conta as idConta
         From arqParcela P
         Where P.CCor in " . SQL_VETIDCCOR;
      $regParcela =sql_lerRegistros( $select );

      foreach( $regParcela as $umaParcela )
         $vetIdConta[] = $umaParcela->IDCONTA;
   }
   
   return( substr(
      ( SQL_VETIDCLINICA ? "A.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
      ( SQL_VETIDCCOR ? 'A.idPrimario in (' . implode( ",", $vetIdConta ) . ") and " : '' ) .
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
   if( SQL_VETIDCCOR )
   {
      $select = "Select P.Conta as idConta
         From arqParcela P
         Where P.CCor in " . SQL_VETIDCCOR;
      $regParcela =sql_lerRegistros( $select );

      foreach( $regParcela as $umaParcela )
         $vetIdConta[] = $umaParcela->IDCONTA;
   }

   return(
	   ( SQL_VETIDCLINICA ? 'A.Clinica in ' . SQL_VETIDCLINICA : '' ) .
      ( SQL_VETIDCLINICA && SQL_VETIDCCOR ? ' and ' : '' ) .
		( SQL_VETIDCCOR ? 'A.idPrimario in (' . implode( ",", $vetIdConta ) . " )" : '' )
   );
}
