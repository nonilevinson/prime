<?php

require_once( 'ext_email.php' );

class Email extends EmailPadrao
{
	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;

		$this->regAtual->SAUDACAO_MIN = $this->sauda_min;
		$this->regAtual->SAUDACAO_MAI = $this->sauda_mai;

		$regA->NOME = $regA->NOME_CARTAO =  "[[ NOME ]]";
		$regA->APELIDO = $regA->APELIDO_CARTAO = "[[ APELIDO ]]";
		$regA->NUMCLI = '[[ NUMCLI ]]';
		$regA->CPF = '[[ CPF ]]';
		$regA->EMAIL = "[[ EMAIL ]]";
		$regA->FANTASIA = "[[ FANTASIA ]]";
		$regA->DATA = formatarData( HOJE, 'dd/mm/aaaa' );
		
		$regA->CONTA = '[[ CONTA ]]';
		$regA->VALOR = '[[ VALOR ]]';
		$regA->VENCIMENTO = '[[ VENCIMENTO ]]';

		parent::Basico();
	}
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------

global $g_visualizar;
$g_visualizar = true;

sql_abrirBD( false );

$proc = new Email();
$proc->envioAutomatico = true; // para no ext_email saber um email remetente

// rotina para verificar a hora e saber a saudação
$agora = formatarHora( AGORA(), 'hh:mm' );
if( $agora >= '06:00' && $agora < '12:00' )
{
	$proc->sauda_min = "bom dia";
	$proc->sauda_mai = "Bom dia";
}
elseif( $agora >= '12:00' && $agora < '18:00' )
{
	$proc->sauda_min = "boa tarde";
	$proc->sauda_mai = "Boa tarde";
}
else
{
	$proc->sauda_min = "boa noite";
	$proc->sauda_mai = "Boa noite";
}
//echo '<br>AGORA= '.$agora.' >> '.$proc->agora;

$proc->GerarEmail( '', navegouDe ('arqAcaoEmail'), '' );

sql_fecharBD();
