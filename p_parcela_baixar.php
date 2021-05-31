<?php

sql_abrirBD( OperacaoAtual() );
sql_iniciarTransacao();

$parQBaixa = lerParametro( 'parQBaixa' );

$select = "Select P.IdPrimario, P.Conta, P.Parcela
		From arqParcela P
		Where P.IdPrimario IN ( SELECT MARCADOS.Registro FROM " . FromMarcados( "arqParcela", "P" ) .
				" WHERE " . WhereMarcados() . " )";
$reg = sql_lerRegistros( $select );
// if( $g_debugProcesso ) echo '<br><b>GR0 arqParcela S=</b> '.$select;

$campos = [];

foreach( $reg as $umReg )
{
	$idParcela = $umReg->IDPRIMARIO;

   $campos[ "TFPagto" ]   = $parQBaixa->TFPAGTO;
   $campos[ "TDetPg" ]    = valorOuNull( $parQBaixa->TDETPG, '', false );;
   $campos[ "CCor" ]      = valorOuNull( $parQBaixa->CCOR, '', false );
   $campos[ "Cheque" ]    = ValorOuZero( $parQBaixa->CHEQUE );
   $campos[ "DataPagto" ] = $parQBaixa->DATAPAGTO;
   $campos[ "DataComp" ]  = valorOuNull( $parQBaixa->DATACOMP, '', false );

   sql_update( "arqParcela",
         $campos,
      "idPrimario = " . $idParcela );
}

sql_gravarTransacao();
sql_fecharBD();

$teste = false;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
else
{
	desmarcarMarcados( 'arqParcela' );
   TecleAlgoVolta( 'Parcelas baixadas. Verifique', true, 2 );
}
