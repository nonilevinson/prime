<?php

//----------------------------------------------------------------------------------------
function gerarConta()
{
	global $g_debugProcesso, $parGeraParc, $g_tecleAlgo;

	$g_tecleAlgo = 2;

	switch( ultimaLigOpcao() )
	{
		case 130:	//* menu Financeiro
			$idClinica     = $parGeraParc->CLINICA;
			$tPgRec        = $parGeraParc->TPGREC;
			$idFornecedor  = valorOuNull( $parGeraParc->FORNECEDOR, "", false );
			$idPessoa      = valorOuNull( $parGeraParc->PESSOA, "", false );
			$documento     = valorOuZero( $parGeraParc->DOCUMENTO );
			$emissao       = $parGeraParc->EMISSAO;
			$recEnvia      = valorOuNull( $parGeraParc->RECENVIA, "", false );
			$compete       = valorOuNull( $parGeraParc->COMPETE, "", false );
			$historico     = $parGeraParc->HISTORICO;

			$g_tecleAlgo = 1;

			if( $documento > 0 )
			{
				$select = "
					Select C.idPrimario
					From arqConta C
					Where C.Documento = " . $documento . " and " .
						( $idPessoa ? "C.Pessoa = " . $idPessoa : "C.Fornecedor = " . $idFornecedor );
				$idContaExiste = sql_lerUmRegistro( $select )->IDPRIMARIO;
if( $g_debugProcesso ) echo '<br><b>GR0 arqConta S=</b> '.$select;
				if( $idContaExiste )
				{
					TecleAlgoVolta( "Já existe uma conta com os dados informados e por isso esta não foi criada", true, 1 );
					return;
				}
			}
			break;

//* 21/01/2022 passei a fazer pelo p_conta_parcela_gerar_tratamento
/*
		case 184:	//* gerar Tratamento, menu navegação arqConsulta
			$hoje    = formatarData( HOJE, 'aaaa/mm/dd' );
			$compete = dataAno( $hoje ) . "/" . dataMes( $hoje ) . "/01";
			
			$idClinica     = $parGeraParc->CLINICA;
			$tPgRec        = 2;
			$idFornecedor  = null;
			$idPessoa      = $parGeraParc->PESSOA;
			$documento     = 0;
			$emissao       = $hoje;
			$recEnvia      = $hoje;
			$compete       = $compete;
			$historico     = $parGeraParc->HISTORICO;
			break;
*/
	}

	$idConta = sql_IdPrimario();
   $select = "Select coalesce( max( Transacao ), 0 ) as Transacao
      From arqConta";
   $proxTransacao = sql_lerUmRegistro( $select )->TRANSACAO + 1;

	sql_insert( "arqConta", [
		"idPrimario" => $idConta,
      "Transacao"  => $proxTransacao,
      "Clinica"    => $idClinica,
      "TPgRec"     => $tPgRec,
      "Fornecedor" => $idFornecedor,
		"Pessoa"     => $idPessoa,
      "TrgValor"   => 0,
      "TrgValLiq"  => 0,
      "TrgQtdParc" => 0,
      "TrgQParcPg" => 0,
      "ProxVenc"   => null,
      "TrgPago"    => 0,
      "Documento"  => $documento,
      "Emissao"    => $emissao,
      "RecEnvia"   => $recEnvia,
      "Compete"    => $compete,
      "Historico"  => $historico,
      "Arq1"       => null ] );

		$idConsulta = navegouDe( 'arqConsulta' );
/*
		sql_update( "arqConsulta", [
				"ContaPTra" => $idConta ],
			"idPrimario = " . $idConsulta );
*/
	return( $idConta );
}
//----------------------------------------------------------------------------------------
global $parGeraParc, $g_tecleAlgo;
$parGeraParc = lerParametro( 'parGeraParc' );

sql_abrirBD( OperacaoAtual() );

$idConta = gerarConta();

//* cria as parcelas
include_once( "ext_gerar_parcelas_ate12.php" );
criarParcela( $idConta );

sql_fecharBD();

$teste = false;
if( $teste )
	echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
else
	tecleAlgoVolta( 'Conta e parcelas criadas. Verifique!', true, $g_tecleAlgo );
