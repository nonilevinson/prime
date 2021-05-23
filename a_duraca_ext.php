<?php

function verificarAgendamentos( $p_usuario, $p_data )
{
	sql_abrirBD( false );
	$select = "Select count(*) as Qtd
      From arqHorario
      Where Usuario = " . $p_usuario . " and Data >='" . $p_data . "'";
	$qtd = sql_lerUmRegistro( $select )->QTD;
	sql_fecharBD();
	if( $qtd )
	{
		echo
		javascriptIni(),
		'with( parent ) {',
			'alert( "Já existem agendamentos futuros marcados - Alteração não pode ser feita" );',
			'Inicio.Focalizar();',
		'}',
		javaScriptFim();

	}
}

