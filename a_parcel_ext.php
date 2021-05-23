<?php

//===========================================================
function ext_filtrarSelecao()
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
      ( SQL_VETIDCLINICA ? "A.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
      filtrarPorIntervaloData( "A.DataPagto", $parQSelecao->DATAINI1, $parQSelecao->DATAFIM1 ) .
      filtrarPorLig( "A.Conta,arqConta.TPgRec", $parQSelecao->TPGREC ) .
      filtrarPorLig( "A.Conta,arqConta.Clinica", $parQSelecao->CLINICA ) .
      filtrarPorLig( "A.Conta,arqConta.Pessoa", $parQSelecao->PESSOA ), 0, -4 )
   );
}

//===========================================================
function ext_filtrarTodas()
{
	return(
		( SQL_VETIDCLINICA
         ? substr( 'Conta.Clinica in ' . SQL_VETIDCLINICA . ' and ', 0, -4 )
         : ''
      )
    );
}
