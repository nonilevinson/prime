<?php

//----------------------------------------------------------------------------------------
function gerarConta()
{
	global $g_debugProcesso, $parGeraParc, $g_tecleAlgo;

	$g_tecleAlgo = 2;

	switch( ultimaLigOpcao() )
	{
		case 130:	//* menu Financeiro
			$idPessoa  = $parGeraParc->PESSOA;
			$documento = valorOuZero( $parGeraParc->DOCUMENTO );
			$emissao   = $parGeraParc->EMISSAO;
			$recEnvia  = valorOuNull( $parGeraParc->RECENVIA, "", false );
			$compete   = valorOuNull( $parGeraParc->COMPETE, "", false );
			$historico = $parGeraParc->HISTORICO;

			if( ultimaLigOpcaoEm( 130 )  )
			{
				$g_tecleAlgo = 1;

				if( $documento > 0 )
				{
					$select = "Select C.idPrimario
						From arqConta C
						Where C.Pessoa = " . $idPessoa . " and C.Documento = " . $documento;
					$idContaExiste = sql_lerUmRegistro( $select )->IDPRIMARIO;
//if( $g_debugProcesso ) echo '<br><b>GR0 arqConta S=</b> '.$select;
					if( $idContaExiste )
						TecleAlgoVolta( "Já existe uma conta com os dados informados e por isso esta não foi criada", true, 1 );
				}
			}
			break;
	}

	$idConta = sql_IdPrimario();
   $select = "Select coalesce( max( Transacao ), 0 ) as Transacao
      From arqConta";
   $proxTransacao = sql_lerUmRegistro( $select )->TRANSACAO + 1;

	sql_insert( "arqConta", [
		"idPrimario" => $idConta,
      "Transacao"  => $proxTransacao,
      "Clinica"    => $parGeraParc->CLINICA,
      "TPgRec"     => $parGeraParc->TPGREC,
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

		if( ultimaLigOpcaoEm( 159 ) )
		{
			$idVenda = lerInput( 'idVenda' );

			sql_update( "arqVenda", [
					"Conta" => $idConta ],
				"idPrimario = " . $idVenda );
		}

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
