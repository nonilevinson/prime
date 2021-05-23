<?php

//===========================================================
function ext_filtrarSelecao()
{
   $parQSelecao = lerParametro( 'parQSelecao' );

	switch( ultimaLigOpcao() )
	{
		case 150:	// Parcelas Todas
			$filtroData = filtrarPorIntervaloData( "A.Vencimento", $parQSelecao->DATAINI, $parQSelecao->DATAFIM );
         break;

		case 153:	// Parcelas Hoje
			$filtroData = "A.Vencimento = current_date and ";
         break;
	}

   return( substr( $filtroData .
      ( SQL_VETIDCLINICA ? "A.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
      filtrarPorIntervaloData( "A.DataPagto", $parQSelecao->DATAINI1, $parQSelecao->DATAFIM1 ) .
      filtrarPorLig( "A.Conta,arqConta.TPgRec", $parQSelecao->TPGREC ) .
      filtrarPorLig( "A.Conta,arqConta.Centro", $parQSelecao->CENTRO ) .
      filtrarPorLig( "A.Conta,arqConta.Pessoa", $parQSelecao->PESSOA ), 0, -4 )
   );
}
