<?php

require_once( 'ext_email.php' );
include_once( 'm_logemail_programado.php' );

global $parQSelecao, $g_debugProcesso, $g_programado, $g_idLogEmail, $g_assunto, $g_reenvio;
$parQSelecao = lerParametro( "parQSelecao" );

sql_abrirBD();

$id = lerInput( 'ID' );

$proc         = new EmailPadrao();
$g_programado = false;
$g_reenvio    = true;
$inicio       = AGORA();

$select = "Select first 1 A.PadraoAcao, L.*
	From arqLogEmail L
		inner join arqAcaoEmail A on A.idPrimario=L.Titulo
	Where A.PadraoAcao is null and L.NEnviados > 0 and L.Total > 0 and " .
		( $id 
			? "L.idPrimario = " . $id 
			: "L.HoraIni is not null and L.HoraFim is not null and L.HoraReenv is null
				and ( ( L.Data < '" . formatarData( HOJE, 'aaaa/mm/dd' ) . "' ) or
				( L.Data = '" . formatarData( HOJE, 'aaaa/mm/dd' ) . "' and L.Hora <= '" . $inicio ."' ) )" ) .
	" Order by L.Data, L.Hora";
$umReg = sql_lerUmRegistro( $select );
//if( $g_debugProcesso ) echo '<br>REENVIAR LOGEMAIL S= '.$select.'<br>';

if( !$umReg )
{
	sql_fecharBD();
	return( false );
}

if( $umReg->IDPRIMARIO )
{
	sql_update( "arqLogEmail", [
			"HoraReenv" => AGORA() ],
		"idPrimario=" . $umReg->IDPRIMARIO );
	sql_commit();
}

$parQSelecao->ACAOEMAIL = $umReg->TITULO;
$parQSelecao->CLIENTE 	= $umReg->CLIENTE;
$parQSelecao->SEXO		= $umReg->SEXO;

$select = "Select idPrimario From arqEmailRemet where Email = '" . $umReg->EMAILREMET . "'";
$parQSelecao->EMAILREMET = sql_lerUmRegistro( $select )->IDPRIMARIO;

$selectQuem = "Select P.idPrimario as idCliente, P.Email, P.Nome, P.Apelido, 
		P.Nascimento, P.Sexo
	from arqItLogEmail I 
		inner join arqLogEmail	O on O.idPrimario=I.LogEmail
		inner join arqPessoa	P on P.idPrimario=I.Cliente
	where I.Enviado = 0 and P.Email <> '' and P.RecEmail = 1
		and O.idPrimario = " . $umReg->IDPRIMARIO . 
	" order by P.Nome";
//echo '<br><b>arqPessoa S=</b> '.$selectQuem;

$proc->comSupervisor = false;

//function ProcessarEmpresas( $p_idEmpresa, $p_idPadraoAcao, $p_idAcaoEnviar, $p_select )
$proc->reenvioEmail = true;
$proc->GerarEmail( '', $umReg->TITULO, $selectQuem );

//echo '<br>CHAMA m_logemail_programado.php para '.$g_idLogEmail." \n";
$g_assunto = "Reenvio de email programado pelo SWSM";
executarAvisoEmailProgramado();

if( $g_debugProcesso ) echo "<br> FIM DO M_REENVIAR_PROGRAMADOS \n";

sql_fecharBD();
