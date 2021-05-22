<?php

$parQSelecao = lerParametro( "parQSelecao" );

sql_abrirBD( OperacaoAtual() );

sql_update( "arqUsuario", [
		"Senha" => $parQSelecao->SENHA1 ],
	"idPrimario = " . navegouDe( 'arqUsuario' ) );

sql_fecharBD();

$teste = false;
if( $teste )
	echo "<p style='text-align: center; font-weight: bold; font-size:24px'>*** EM TESTE ***</p>";
else
	tecleAlgoVolta( 'A senha foi alterada', true, 2 );
