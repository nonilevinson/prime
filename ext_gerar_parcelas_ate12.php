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
		$perc 	= "PERC" . $i;
		$est     = "EST" . $i;
		$valor	= "VALOR" . $i;
		$pg		= "PG" . $i;
		$cc		= "CC" . $i;
		$linha	= "LINHA" . $i;

		$valorI = ( $iguais ? $parcIgual : $parGeraParc->$valor );
/*
		switch( ultimaLigOpcao() )
		{
				case 130:	//* menu Financeiro
					$valorLiq = $valorI;
					break;
// if( $g_debugProcesso ) echo '<br><b>GR0 ehCartao S=</b> '.$ehCartao.' <b>txCartao=</b> '.$txCartao.' <b>valorI=</b> '.$valorI;

					if( $ehCartao == 1 ) //* se eh cartao calcula o liquido pela taxa
						$valorLiq = $valorI * ( 100 - $txCartao ) / 100.0;
					else
						$valorLiq = $valorI;
					break;
		}

		$valor = round( ( $iguais ? $parcIgual : $valorI ), 2 );
*/
		$valor = $valorLiq = round( ( $iguais ? $parcIgual : $valorLiq ), 2 );

		//* metodo para ter a ultima parcela com o valor certo - principalmente para não ter dízimo
		if( $i == $parGeraParc->PARCELAS && $iguais )
			$valor = $valorLiq = round( $parGeraParc->VALOR - $totValor, 2 );
		else
			$totValor += $valor;
//echo '<br><b>Valor=</b> '.$parGeraParc->VALOR.' - ' .$totValor.' = '.$valor;

		sql_insert( "arqParcela", [
			"idPrimario" => [ sql_NumeroUnico(), FORCAR_NUMERICO ],
         "Conta"      => $p_idConta,
			"Parcela"    => $numParc++,
         "Vencimento" => $parGeraParc->$venc,
         "Vencest"    => $parGeraParc->$est,
         "Valor"      => $valor,
         "ValorLiq"   => $valorLiq,
         "Estimado"   => ValorOuZero( $parGeraParc->ESTIMADO ),
         "TFCobra"    => ValorOuNull( $parGeraParc->TFCOBRA, "", false ),
         "Emissao"    => null,
         "LinhaDig"   => ( $parGeraParc->$linha != '' ? $parGeraParc->$linha : '' ),
         "NomePdf"    => '',
         "CCor"       => ValorOuNull( $parGeraParc->CCOR, "", false ),
         "SubPlano"   => ValorOuNull( $parGeraParc->$cc, "", false ),
         "DataPagto"  => ValorOuNull( $parGeraParc->$pg, "", false ),
         "DataComp"   => ( in_array( $parGeraParc->TFPAGTO, [2,3] ) || $parGeraParc->TDETPAGTO != 1
					? ValorOuNull( $parGeraParc->$pg, "", false )
					: null ),
         "TFPagto"    => ValorOuNull( $parGeraParc->TFPAGTO, "", false ),
         "TDetPg"     => ValorOuNull( $parGeraParc->TDETPAGTO, "", false ),
         "Cheque"     => ValorOuZero( $parGeraParc->CHEQUE ),
         "Arq1"       => null,
         "StRetorno"  => '',
         "Remessa"    => 0,
         "DataRem"    => null ] );
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
