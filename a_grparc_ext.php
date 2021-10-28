<?php

//==================================================================
function sugereValor( $p_idConsulta )
{
	$select = "Select C.Clinica, C.Pessoa, C.ValPTrata
      From arqConsulta C
      Where C.idPrimario = " . $p_idConsulta;
   $umaConsulta = sql_lerUmRegistro( $select );
echo '<br><b>GR0 arqConsulta S=</b> '.$select;

  echo
   javaScriptIni(),
      'with( parent ) {
         alt( Valor,' . $umaConsulta->VALPTRATA . ' );
			Historico.Focalizar();
      }',
      "console.warn( 'valPTrata= '+'".$umaConsulta->VALPTRATA."');",
   javaScriptFim();
/*
	echo
		javaScriptIni(),
		'with( parent ) {
			alt( Valor, ' . $valor . ' );
			Historico.Focalizar();
		}',
		javaScriptFim();
*/
}

//==================================================================
function sugereNumConta( $p_loja, $p_fonte, $p_cliente, $p_confere )
{
	sql_abrirBD( false );
	$select = "Select coalesce( max( Conta ), 0 ) + 1 as ProxConta
		From arqConta
		Where Loja = " . $p_loja . " and Origem = " . ( $p_fonte ? 1 : 2 ) .
			" and " . ( $p_fonte ? "Fonte = " . $p_fonte : "Cliente = " . $p_cliente ) .
			" and Confere = " . $p_confere;
	$proxConta = sql_lerUmRegistro( $select )->PROXCONTA;
	sql_fecharBD();
//echo '<br>S= '.$select.' prox= '.$proxConta;
	echo
		javaScriptIni(),
		'with( parent ) {
			alt( NumConta, ' . $proxConta . ' );
			NumConta.Focalizar();
		}',
		javaScriptFim();
}
