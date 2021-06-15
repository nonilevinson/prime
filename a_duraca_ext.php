<?php

function verificarAgendamentos( $p_clinica, $p_data )
{
	sql_abrirBD( false );
	$select = "Select count(*) as Qtd
      From arqHorario
      Where Clinica = " . $p_clinica . " and Data >='" . $p_data . "'";
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

