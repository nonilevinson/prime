<?php

function criarParcela( $p_idConta )
{
	global $g_debugProcesso, $parGeraParc;

	$parcIgual = $parGeraParc->VALOR / $parGeraParc->PARCELAS;
	$iguais    = $parGeraParc->PARCELAS == 1  ||  $parGeraParc->IGUAIS;
	$numParc   = 1;
	$totValor  = 0;

	for( $i=1; $i<=$parGeraParc->PARCELAS; $i++ )
	{
		$venc 	= "VENC" . $i;
		$valor	= "VALOR" . $i;
		$valorI = ( $iguais ? $parcIgual : $parGeraParc->$valor );

		switch( ultimaLigOpcao() )
		{
			case 130:	//* menu Financeiro
				$vencimento = formatarData( $parGeraParc->$venc, 'aaaa/mm/dd' );
				$vencEst    = "EST" . $i;
				$pgI        = "PG" . $i;
				$pg         = ValorOuNull( $parGeraParc->$pg, "", false );
				$valorLiq   = $valorI;
				$valorEst   = ValorOuZero( $parGeraParc->ESTIMADO );
				$idTFCobra  = ValorOuNull( $parGeraParc->TFCOBRA, "", false );
				$idFormaPg  = null;
				$idSubPlano = null; //ValorOuNull( $parGeraParc->$idSubPlano, "", false );
				$linhaI     = "LINHA" . $i;
				$linha      = $parGeraParc->$linhaI != '' ? $parGeraParc->$linhaI : '';
				break;

			case 184: //* criar de tratamento de uma consulta no menu de navegação
				$select = "Select X.SubPlaRAss
					From cnfXConfig X";
				$idSubPlano = sql_lerUmRegistro( $select )->SUBPLARASS;

				$vencimento = formatarData( $parGeraParc->$venc, 'aaaa/mm/dd' ); //* se for cartão, depois o altero
				$vencEst   = 0;
				$valorEst  = 0;
				$tFCobra   = "TFCOBRA" . $i;
				$idTFCobra = ValorOuNull( $parGeraParc->$tFCobra, "", false );
				$pg        = null;
				$linha     = '';
				$formaPg   = "FORMAPG" . $i;
				$vezes     = "VEZES" . $i;
// if( $g_debugProcesso ) echo '<br><b>GR0 idTFCobra=</b> '.$idTFCobra;

				if( $idTFCobra == 2 ) //* se eh cartao calcula o liquido pela taxa e o vencimento por Dias
				{
					$idFormaPg = $parGeraParc->$formaPg;
					$qtasVezes = $parGeraParc->$vezes;

					$select = "Select F.TaxaDeb, F.Taxa2, F.Taxa3, F.Dias
						From arqFormaPg F
						Where F.idPrimario = " . $idFormaPg;
					$umaFormaPg = sql_lerUmRegistro( $select );
					$vencimento = incDia( formatarData( HOJE, 'aaaa/mm/dd' ), $umaFormaPg->DIAS );
// if( $g_debugProcesso ) echo '<br><b>GR0 vencimento=</b> '.$vencimento;

					if( $umaFormaPg->TAXADEB > 0 )
						$txCartao = $umaFormaPg->TAXADEB;
					elseif( $vezes <= 2 )
						$txCartao = $umaFormaPg->TAXA2;
					else
						$txCartao = $umaFormaPg->TAXA3;

						$valorLiq = $valorI * ( 100 - $txCartao ) / 100.0;
// if( $g_debugProcesso ) echo '<br><b>GR0 arqFormaPg S=</b> '.$select.'<br><b>vezes=</b> '.$vezes.' <b>txtCartao=</b> '.$txCartao.' <b>valorI=</b> '.$valorI.' <b>valorLiq=</b> '.$valorLiq;
				}
					else
						$valorLiq = $valorI;
				break;
		}

		$valor = round( ( $iguais ? $parcIgual : $valorI ), 2 );

		//* 30/10/2021 comentei pois para Tratamento com cartão dá problema...
		// $valor = $valorLiq = round( ( $iguais ? $parcIgual : $valorLiq ), 2 );

		//* metodo para ter a ultima parcela com o valor certo - principalmente para não ter dízimo
		if( $i == $parGeraParc->PARCELAS && $iguais )
			$valor = round( $parGeraParc->VALOR - $totValor, 2 );
		else
			$totValor += $valor;
//echo '<br><b>Valor=</b> '.$parGeraParc->VALOR.' - ' .$totValor.' = '.$valor;

		sql_insert( "arqParcela", [
			"idPrimario" => [ sql_NumeroUnico(), FORCAR_NUMERICO ],
         "Conta"      => $p_idConta,
			"Parcela"    => $numParc++,
         "Vencimento" => $vencimento,
         "Vencest"    => $parGeraParc->$vencEst,
         "Valor"      => $valor,
         "ValorLiq"   => $valorLiq,
         "Estimado"   => $valorEst,
         "TFCobra"    => $idTFCobra,
         "Emissao"    => null,
         "LinhaDig"   => $linha,
         "NomePdf"    => '',
         "CCor"       => ValorOuNull( $parGeraParc->CCOR, "", false ),
         "SubPlano"   => $idSubPlano,
         "DataPagto"  => $pg,
         "DataComp"   => ( in_array( $parGeraParc->TFPAGTO, [2,3] ) || $parGeraParc->TDETPAGTO != 1
					? ValorOuNull( $pg, "", false )
					: null ),
         "TFPagto"    => ValorOuNull( $parGeraParc->TFPAGTO, "", false ),
         "TDetPg"     => ValorOuNull( $parGeraParc->TDETPAGTO, "", false ),
         "FormaPg"    => $idFormaPg,
			"Cheque"     => ValorOuZero( $parGeraParc->CHEQUE ),
         "Arq1"       => null,
         "StRetorno"  => '',
         "Remessa"    => 0,
         "DataRem"    => null,
			"Historico"  => '' ] );
	}
// tecleAlgo( 'TESTE' );
}

//------------------------------------------------------------------------

if( navegouDe( 'arqConta' ) )
{
	global $parGeraParc;
	$parGeraParc = lerParametro( 'parGeraParc' );

	sql_abrirBD( OperacaoAtual() );
	sql_iniciarTransacao();

	criarParcela( navegouDe( "arqConta" ) );

	sql_gravarTransacao();
	sql_fecharBD();

	tecleAlgoVolta( '', true, 2 );
}
