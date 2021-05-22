<?php

require_once( 'ext_email.php' );

class Email extends EmailPadrao
{
	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;

		$regA->NOME    = "Nome (teste)";
		$regA->APELIDO = "Apelido (teste)";
		$regA->CPF     = '111.111.111-11';
		$regA->EMAIL   = "seuemail@email.com";
		$regA->DATA    = formatarData( HOJE, 'dd/mm/aaaa' );

		$regA->CONTA      = '[[ CONTA ]]';
		$regA->VALOR      = '[[ VALOR ]]';
		$regA->VENCIMENTO = '[[ VENCIMENTO ]]';

		parent::Basico();
	}
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------

global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );
$idAcao = navegouDe( 'arqAcaoEmail' );

$proc = new Email();

$proc->emailTeste  = $parQSelecao->CADEIA100;
$proc->comMensagem = true;

$proc->GerarEmail( '', $idAcao,
	"select A.idPrimario
		from arqAcaoEmail A
		where A.idPrimario = " . $idAcao );
