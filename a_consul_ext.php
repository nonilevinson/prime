<?php

//==================================================================
function sugereBoletoMin()
{
	sql_abrirBD( false );
   
   $select = "Select X.BoletoMin
		From cnfXConfig X";
	$umXConfig = sql_lerUmRegistro( $select );
echo '<br><b>cnfXConfig S=</b> '.$select;

   sql_fecharBD();
   
	echo
		javaScriptIni(),
		'with( parent ) {
			alt( BoletoMin, ' . $umXConfig->BOLETOMIN . ' );
         console.warn( \'BOLETOMIN= \'+\''.$umXConfig->BOLETOMIN.'\');
		}',
		javaScriptFim();
}

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
