<?php

//==================================================================
function sugereSdVenc1Par()
{
	sql_abrirBD( false );
   
   $select = "Select X.DiasSdEntr
		From cnfXConfig X";
	$umXConfig = sql_lerUmRegistro( $select );
   $sdVenc1Par = formatarData( incDia( HOJE, $umXConfig->DIASSDENTR ), 'aaaa/mm/dd' );
// echo '<br><b>cnfXConfig S=</b> '.$select.'<br><b>sdVenc1Par=</b> '.$sdVenc1Par;

   sql_fecharBD();
   
	echo
		javaScriptIni(),
		'with( parent ) {
			alt( SdVenc1Par, \'' . $sdVenc1Par . '\' );
		}',
		javaScriptFim();
}

//==================================================================
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

//===========================================================
function ext_filtrarSelecao()
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
         $tCMedica = "( (A.TstAgRet is null or A.TstAgRet < 3) and A.TrgQtdM > 0 and A.TrgQtdM = A.TrgQtdMEnt ) and "; 
         break; 
      
      case 4: /// Totalmente separado e entregue;
         $tCMedica = "( A.TstAgRet = 3 and A.TrgQtdM > 0 and A.TrgQtdM = A.TrgQtdMEnt ) and "; 
         break;       
   }

   return( substr( $tCMedica .
      ( SQL_VETIDCLINICA ? "A.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
      filtrarPorIntervaloData( "A.Data", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
      filtrarPorLig( "A.TStCon", $parQSelecao->TSTCON ) .
      filtrarPorLig( "A.Clinica", $parQSelecao->CLINICA ) .
      filtrarPorLig( "A.Medico", $parQSelecao->MEDICO ) .
      filtrarPorLig( "A.Pessoa", $parQSelecao->PESSOA ) .
      
      filtrarPorIntervaloData( "A.DataRet", $parQSelecao->DATAINI1, $parQSelecao->DATAFIM1 ) .
      filtrarPorIntervalo( 'A.HoraRet', $parQSelecao->HORAINI, $parQSelecao->HORAFIM, "'" ) .
      filtrarPorLig( "A.TStAgRet", $parQSelecao->TSTAGRET ) .
      filtrarPorLig( "A.AssesRet", $parQSelecao->ASSESSOR ), 0, -4 )
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
