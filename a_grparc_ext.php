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
// echo '<br><b>GR0 arqConsulta S=</b> '.$select.'<br><b>historico=</b> '.$historico;

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
function sugereVezes( $p_formaPg, $p_qualVezes )
{
	$select = "Select F.TaxaDeb
      From arqFormaPg F
      Where F.idPrimario = " . $p_formaPg;
   $umaFormaPg = sql_lerUmRegistro( $select );
echo '<br><b>GR0 arqFormaPg S=</b> '.$select;

	switch( $p_qualVezes )
	{
		case 1: $campo = 'Vezes1';	break;
		case 2: $campo = 'Vezes2';	break;
		case 3: $campo = 'Vezes3';	break;
	}

	if( $umaFormaPg->TAXADEB > 0 )
	{
		$sugestao = 1;

		switch( $p_qualVezes )
		{
			case 1: $focalizar = 'Venc1'; break;
			case 2: $focalizar = 'Venc2'; break;
			case 3: $focalizar = 'Venc3'; break;
		}
	}
	else
	{
		$sugestao = 0;
		
		switch( $p_qualVezes )
		{
			case 1: $focalizar = 'Vezes1'; break;
			case 2: $focalizar = 'Vezes2'; break;
			case 3: $focalizar = 'Vezes3'; break;
		}
	}
echo '<br><b>focal=</b> '.$focalizar;
	echo
		javaScriptIni(),
			'with( parent ) {
				alt( ' . $campo . ', ' . $sugestao . ' );',
				$focalizar. '.Focalizar();
			}',
			"console.warn( 'campo= '+'".$campo."');",
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
//echo '<br>S= '.$select.' prox= '.$proxConta;

	sql_fecharBD();
	
	echo
		javaScriptIni(),
		'with( parent ) {
			alt( NumConta, ' . $proxConta . ' );
			NumConta.Focalizar();
		}',
		javaScriptFim();
}
