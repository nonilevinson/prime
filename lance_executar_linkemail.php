<?php

global $pasta_sistema, $pasta_cliente;

$pasta_sistema = 'swsm';
$pasta_cliente = $_REQUEST[ 'lwb1' ];
include_once( $_SERVER['DOCUMENT_ROOT'] . "/lanceweb/index_websites.php" );

function executarSISIMG()
{
	$update = "update arqItLogEmail set Lido ='" .
		formatarData( HOJE, 'aaaa/mm/dd' ) . "' where idPrimario=" . $_REQUEST[ 'lwb3' ];
	sql_executarComando( $update );
}

function executarSISLINK()
{
	$update = "update arqItLogEmail set LinkKM='" .
		formatarData( HOJE, 'aaaa/mm/dd' ) . "' where idPrimario=" . $_REQUEST[ 'lwb3' ];
	sql_executarComando( $update );
}

function executarLINK()
{
	$select = "select Lido from arqItLogEmail where idPrimario = " . $_REQUEST[ 'lwb3' ];
	$lido = sql_lerUmRegistro( $select )->LIDO;

	$update = "update arqItLogEmail set LinkEmp = 'TODAY'" . ( $lido ? "" : ", Lido = 'TODAY'" ) .
		" where idPrimario=" . $_REQUEST[ 'lwb3' ];
	sql_executarComando( $update );
}

function executarRETIRAR()
{
	$update = "update arqCliente set Reside_RecEmail=0 where idPrimario=
		(select cliente from arqItLogEmail where idPrimario=" . $_REQUEST[ 'lwb3' ] . ")";
	sql_executarComando( $update );
}

function executarVISUALIZAR()
{
	executarLINK();
}

//==============================================================================
sql_abrirBD( false );
ValidarLink();
sql_fecharBD();
