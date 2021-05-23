<?php

//==================================================================================
function temPermissao( $p_operacao )
{
   global $g_debugProcesso;

   $select = "Select L.PodeConsultar
      From arqLancePermissao L
      Where L.Grupo = " . GRUPO_ATUAL . " and L.Operacao = " . $p_operacao;
// if( $g_debugProcesso ) echo '<br><b>GR0 arqLancePermissao S=</b> '.$select;

   return( sql_lerUmRegistro( $select )->PODECONSULTAR || GrupoAtualEm() );
}
//==================================================================================

global $g_debugProcesso;

sql_abrirBD( false );

$select = 'Select
      sum( iif( P.Vencimento = current_date and C.TPgRec = 1, P.ValorLiq, 0 ) ) as TotPgHoje,
      sum( iif( P.Vencimento = current_date and C.TPgRec = 2, P.ValorLiq, 0 ) ) as TotRecHoje,
      sum( iif( P.Vencimento < current_date and P.DataPagto is null and C.TPgRec = 1, P.ValorLiq, 0 ) ) as TotPgAtrasado,
      sum( iif( P.Vencimento < current_date and P.DataPagto is null and C.TPgRec = 2, P.ValorLiq, 0 ) ) as TotRecAtrasado,
      sum( iif( P.Vencimento > current_date and P.DataPagto is null and C.TPgRec = 1, P.ValorLiq, 0 ) ) as TotPgFuturo,
      sum( iif( P.Vencimento > current_date and P.DataPagto is null and C.TPgRec = 2, P.ValorLiq, 0 ) ) as TotRecFuturo
   From arqParcela P
      join arqConta C on C.idPrimario=P.Conta';
$regBloco  = sql_lerUmRegistro( $select );
if( $g_debugProcesso ) echo '<br><b>*** arqParcela S=</b> '.$select;

$blocos = [];

if( temPermissao( 100034 ) ) //* arqParcela
{
   $aPhp    = "a_parcel";
   $nomeArq = "arqParcela";

   $blocos[] = [
      "cab" => [ "icone" => "", "txt" => "Parcelas a Pagar", "cor" => "white" ],
      "linhas" => [
         [ "a_php" => $aPhp, "nomeArq" => $nomeArq, "filtro" => "PgHoje",
            "txt" => "Hoje", "qtd" => formatarValor( $regBloco->TOTPGHOJE ) ],
         [ "a_php" => $aPhp, "nomeArq" => $nomeArq, "filtro" => "PgAtras",
            "txt" => "Atrasadas", "qtd" => formatarValor( $regBloco->TOTPGATRASADO ) ],
         [ "a_php" => $aPhp, "nomeArq" => $nomeArq, "filtro" => "PgFuturo",
            "txt" => "Futuras", "qtd" => formatarValor( $regBloco->TOTPGFUTURO ) ]
      ]
   ];

   $blocos[] = [
      "cab" => [ "icone" => "", "txt" => "Parcelas a Receber", "cor" => "white" ],
      "linhas" => [
         [ "a_php" => $aPhp, "nomeArq" => $nomeArq, "filtro" => "RecHoje",
            "txt" => "Hoje", "qtd" => formatarValor( $regBloco->TOTRECHOJE ) ],
         [ "a_php" => $aPhp, "nomeArq" => $nomeArq, "filtro" => "RecAtras",
            "txt" => "Atrasadas", "qtd" => formatarValor( $regBloco->TOTRECATRASADO ) ],
         [ "a_php" => $aPhp, "nomeArq" => $nomeArq, "filtro" => "RecFuturo",
            "txt" => "Futuras", "qtd" => formatarValor( $regBloco->TOTRECFUTURO ) ]
      ]
   ];
}

sql_fecharBD();

//=====================================================================================
if( sizeof( $blocos ) > 0 )
{
   require_once( LANCE_PHP_ABSOLUTO . 'lance_dashboard.php' );

   dashboard( [
      "width"      => "23%",
      "height"     => "100px",
      "qtdWidth"   => "80px",
      "background" => "var(--corCliente)" ],
      $blocos );
}
