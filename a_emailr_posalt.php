<?php

global $g_debugProcesso, $g_regAtual, $g_regAntes;

if( $g_regAtual->PADRAO == 1 )
	sql_update( "arqEmailRemet", [
			"Padrao" => 0 ],
		"idPrimario != " . $g_regAtual->IDPRIMARIO );

if( $g_regAntes->PADRAO == 1 )
	TecleAlgo( "Pelo menos uma email precisa ser padr�o" );

if( !GrupoAtualEm() )
{
	if ( $g_regAntes->EMAIL != $g_regAtual->EMAIL )
		avisarEmailRemet( "Altera��o", $g_regAtual->EMAIL, $g_regAntes->EMAIL, "" );
}
