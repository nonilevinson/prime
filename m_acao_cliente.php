<?php

require_once( 'ext_email.php' );

class EmailCliente extends EmailPadrao
{
	//------------------------------------------------------------------------
	function EmailParaQuem()
	{
		$regA = &$this->regAtual;

		$this->idCliente = $regA->IDCLIENTE;
		$this->emailPara = $regA->CLIENTE;
	}
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------
function enviarCRM()
{
	global $g_idCliente, $parQSelecao, $g_idLogEmail;

	$proc = new EmailCliente();
	if( $g_idCliente )
	{
		$proc->comMensagem       = true;
		$proc->envioAutomatico   = false;
		$proc->emailTeste        = $parQSelecao->CADEIA100;
		$proc->idEmailProgramado = $g_idLogEmail;	//* idLogEmail = id do email que o usuário programou para sair
		$filtro                  = "P.idPrimario = " . $g_idCliente;
	}
	else
	{
		$hoje = formatarData( HOJE, 'aaaa/mm/dd' );
		$proc->idEmailProgramado = $g_idLogEmail;	//* idLogEmail = email programado para sair

		$filtro = filtrarPorLig( "P.idPrimario", $g_idCliente ) .
			filtrarPorLig( 'P.IdPrimario', $parQSelecao->CLIENTE ) .
			filtrarPorLig( 'P.Sexo', $parQSelecao->SEXO ) .
			( $parQSelecao->MESPEQ != 0
				? 'extract( month from P.Nascimento ) = ' . $parQSelecao->MESPEQ . ' and '
				: '' ) .
			( $parQSelecao->DIAINI != 0
				? filtrarPorIntervaloData( 'extract( day from P.Nascimento )', $parQSelecao->DIAINI, $parQSelecao->DIAFIM )
				: '' ) .
			( $parQSelecao->NUMPEQINI != 0
				? filtrarPorIntervalo( "( extract( year from '" . $hoje . "' ) - extract( year from P.Nascimento ) )", $parQSelecao->NUMPEQINI, $parQSelecao->NUMPEQFIM )
				: '' ) .
			( $parQSelecao->MESPEQ != 0
				? 'P.Nascimento is not null and '
				: '' ) .
			" P.Email <> '' and P.RecEmail = 1 and P.Ativo = 1";
	}

	$proc->idLogEmail = $g_idLogEmail;
	$proc->paraQuem   = PARA_CLIENTES;

	$select = "Select P.idPrimario as idCliente, P.Email, P.Nome as Cliente, P.Apelido, P.Nascimento, P.Sexo
		From arqPessoa P
		Where ". $filtro .
		" Order by P.Nome";
//echo '<br><b>m_acao_cliente arqPessoa S=</b> '.$select;

	$proc->GerarEmail( '', $parQSelecao->ACAOEMAIL, $select );
}
