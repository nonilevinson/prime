<?php

//===========================================================
function filtrarSelecao()
{
   $parQSelecao = lerParametro( 'parQSelecao' );

	switch( ultimaLigOpcao() )
	{
		case 94:	//* Parcelas Seleção
			$filtroData = filtrarPorIntervaloData( "A.Vencimento", $parQSelecao->DATAINI, $parQSelecao->DATAFIM );
         break;

		case 95:	//* Parcelas Hoje
			$filtroData = "A.Vencimento = current_date and ";
         break;
	}

   return( substr( $filtroData .
      ( SQL_VETIDCLINICA ? "Conta.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
      ( SQL_VETIDCCOR ? "A.CCor in " . SQL_VETIDCCOR . ' and ': '' ) .
      filtrarPorIntervaloData( "A.DataPagto", $parQSelecao->DATAINI1, $parQSelecao->DATAFIM1 ) .
      filtrarPorLig( "A.Conta,arqConta.TPgRec", $parQSelecao->TPGREC ) .
      filtrarPorLig( "A.Conta,arqConta.Clinica", $parQSelecao->CLINICA ) .
      filtrarPorLig( "A.Conta,arqConta.Fornecedor", $parQSelecao->FORNECEDOR ) .
      filtrarPorLig( "A.Conta,arqConta.Pessoa", $parQSelecao->CLIENTE ), 0, -4 )
   );
}

//===========================================================
function filtrarTodas()
{
	return(
		( SQL_VETIDCLINICA ? 'Conta.Clinica in ' . SQL_VETIDCLINICA : '' ) .
      ( SQL_VETIDCLINICA && SQL_VETIDCCOR ? ' and ' : '' ) .
		( SQL_VETIDCCOR ? 'A.CCor in ' . SQL_VETIDCCOR : '' ) 
   );
}
