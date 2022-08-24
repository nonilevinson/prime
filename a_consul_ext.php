<?php

//-----------------------------------------------------------
function sugereBoletoMin()
{
	sql_abrirBD( false );

   $select = "Select X.BoletoMin
		From cnfXConfig X";
	$umXConfig = sql_lerUmRegistro( $select );
// echo '<br><b>cnfXConfig S=</b> '.$select;

   sql_fecharBD();

	echo
		javaScriptIni(),
		'with( parent ) {
			alt( BoletoMin, ' . $umXConfig->BOLETOMIN . ' );
		}',
		javaScriptFim();
}

//-----------------------------------------------------------
function filtrarSelecao()
{
   $parQSelecao = lerParametro( 'parQSelecao' );

   switch( $parQSelecao->TCMEDICA )
   {
      case 1: //* nada separado
         $tCMedica = "( A.TrgQtdM > 0 and A.TrgQtdMEnt = 0 ) and ";
         break;

      case 2: /// parcialmente separado;
         $tCMedica = "( A.TrgQtdM > 0 and A.TrgQtdMEnt > 0 and A.TrgQtdM > A.TrgQtdMEnt ) and ";
         break;

      case 3: /// Totalmente separado e não entregue;
         $tCMedica = "( A.TrgQtdM > 0 and A.TrgQtdM = A.TrgQtdMEnt ) and ";
         break;

      case 4: /// Totalmente separado e entregue;
         $tCMedica = "( A.TrgQtdM > 0 and A.TrgQtdM = A.TrgQtdMEnt ) and ";
         break;
   }

   switch( ultimaLigOpcao() )
   {
      case 109:
      case 110:
         $tiConsulta = 1;
         break;

      case 265:
      case 266:
         $tiConsulta = 2;
         break;

      case 267:
      case 268:
         $tiConsulta = 3;
         break;
   }

   return( $tCMedica .
      ( SQL_VETIDCLINICA ? "A.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
      filtrarPorIntervaloData( "A.Data", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
      filtrarPorLig( "A.TStCon", $parQSelecao->TSTCON ) .
      filtrarPorLig( "A.Clinica", $parQSelecao->CLINICA ) .
      filtrarPorLig( "A.Medico", $parQSelecao->MEDICO ) .
      filtrarPorLig( "A.Pessoa", $parQSelecao->PESSOA ) . "
      A.TiConsulta = " . $tiConsulta
   );
}

//-----------------------------------------------------------
function filtrarTodas()
{
   /* Tratamento:    109 Todas | 110 Seleção
      Nutricionista: 265 Todas | 266 Seleção
      Psicólogo:     267 Todas | 268 Seleção
   */

   switch( ultimaLigOpcao() )
   {
      case 109:
      case 110:
         $tiConsulta = 1;
         break;

      case 265:
      case 266:
         $tiConsulta = 2;
         break;

      case 267:
      case 268:
         $tiConsulta = 3;
         break;
   }

   return(
	   ( SQL_VETIDCLINICA ? 'A.Clinica in ' . SQL_VETIDCLINICA . ' and ' : '' ) . "
      A.TiConsulta = " . $tiConsulta
   );
}
