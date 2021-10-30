<?php

//==================================================================
function sugereCamposTratamento( $p_idConsulta )
{
	$select = "Select L.idPrimario as idClinica, L.Clinica, P.idPrimario as idPessoa, P.Nome, P.NumCelular,
			C.ValPTrata, C.Num, P.Prontuario, T.Apelido
      From arqConsulta C
			join arqClinica	L on L.idPrimario=C.Clinica
			join arqPTrata		T on T.idPrimario=C.PTrata
			join arqPessoa 	P on P.idPrimario=C.Pessoa
      Where C.idPrimario = " . $p_idConsulta;
   $umaConsulta = sql_lerUmRegistro( $select );
	$historico   = "C: " . formatarNum( $umaConsulta->NUM ) . " Pr: " . $umaConsulta->PRONTUARIO .
		" Tr: " . $umaConsulta->APELIDO;
echo '<br><b>GR0 arqConsulta S=</b> '.$select.'<br><b>historico=</b> '.$historico;

  echo
   javaScriptIni(),
      'with( parent ) {
         alt( Clinica_Clinica,\'' . $umaConsulta->CLINICA . '\' );
         alt( Clinica,' . $umaConsulta->IDCLINICA . ' );
         alt( Pessoa_Nome,\'' . $umaConsulta->NOME . '\' );
         alt( Pessoa_NumCelular,\'' . $umaConsulta->NUMCELULAR . '\' );
         alt( Pessoa,' . $umaConsulta->IDPESSOA . ' );
         alt( Valor,' . $umaConsulta->VALPTRATA . ' );
         alt( Historico,\'' . $historico . '\' );
			Parcelas.Focalizar();
      }',
      "/*console.warn( 'idClinica= '+'".$umaConsulta->IDCLINICA."');*/",
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
