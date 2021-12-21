<?php

sql_abrirBD( OperacaoAtual() );
sql_iniciarTransacao();

$opcao = ultimaLigOpcaoEm( 220 ) ? 1 : 0; //* op: 220=Fechar | 221=Abrir

sql_update( "arqMovEstoque", [
      "Fechado" => $opcao ],
   "idPrimario IN ( SELECT MARCADOS.Registro FROM " . FromMarcados( "arqMovEstoque", "X" ) .
      " Where " . WhereMarcados() . " )" );

sql_gravarTransacao();
sql_fecharBD();

$teste = false;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
else
{
   TecleAlgoVolta( '', true, 1 );
   desmarcarMarcados( 'arqMovEstoque' );
}
