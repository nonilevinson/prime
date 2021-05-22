<?php

global $g_debugProcesso, $g_regAtual;

if( $g_regAtual->PADRAO == 1 )
	sql_update( "arqEmailRemet", [
			"Padrao" => 0 ],
		"idPrimario != " . $g_regAtual->IDPRIMARIO );

// function avisarEmailRemet( $p_funcao, $p_emailNovo, $p_emailVelho, $p_empresa )
if( !GrupoAtualEm() )
	avisarEmailRemet( "Inclusão", $g_regAtual->EMAIL, "", "" );
