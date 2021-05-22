<?php

require_once( 'ext_email.php' );

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------

global $parQSelecao, $g_idCliente;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new EmailPadrao();

$proc->envioAutomatico = ( ultimaLigOpcao() == '' || ultimaLigOpcao() == 107 );

if( $g_idCliente )
{
	$proc->comSupervisor = true;
	$proc->comMensagem   = true;
	$proc->emailTeste    = $parQSelecao->CADEIA100;
	$filtro              = "C.idPrimario = " . $g_idCliente;
}
else
{
	$proc->comSupervisor = false;
	$proc->comMensagem   = false;
	$filtro = "C.Nascimento is not null and C.Email <> '' and C.RecEmail = 1 and
			extract( day from C.Nascimento ) = " . dataDia( HOJE ) . " and
			extract( month from C.Nascimento ) = " . dataMes( HOJE );
}

$proc->GerarEmail( ANIVERSARIO_CLIENTE, '', 
	"Select C.idPrimario as idCliente, C.Email, C.Nome, C.Sexo, extract( day from C.Nascimento ) Nascimento,
		case when( C.Apelido = '' ) then ( C.Nome ) else ( C.Apelido ) end as Apelido
	From arqCliente C
	Where " . $filtro .
	" Order by C.Nome" );
