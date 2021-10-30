<?php

//==================================================================
function sugereCamposTratamento( $p_idConsulta )
{
	$select = "Select C.Clinica, C.Pessoa, C.ValPTrata, C.Num, P.Prontuario, T.Apelido
      From arqConsulta C
			join arqPTrata	T on T.idPrimario=C.PTrata
			join arqPessoa P on P.idPrimario=C.Pessoa
      Where C.idPrimario = " . $p_idConsulta;
   $umaConsulta = sql_lerUmRegistro( $select );
	$historico = "C: " . formatarNum( $umaConsulta->NUM ) . " Pr: " . $umaConsulta->PRONTUARIO . 
		" Tr: " . $umaConsulta->APELIDO;
// echo '<br><b>GR0 arqConsulta S=</b> '.$select.'<br><b>historico=</b> '.$historico;

  echo
   javaScriptIni(),
      'with( parent ) {
         alt( Valor,' . $umaConsulta->VALPTRATA . ' );
         alt( Historico,\'' . $historico . '\' );
			Parcelas.Focalizar();
      }',
      "/*console.warn( 'valPTrata= '+'".$umaConsulta->VALPTRATA."');*/",
   javaScriptFim();
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
