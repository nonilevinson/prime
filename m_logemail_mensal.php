<?php

include_once( "j:/www.webgestao.com.br/www/ext_criarcobranca.php" );
require_once( 'ext_email_para_usuario.php' );

class EmailUsuario extends EmailParaUsuario {
	//------------------------------------------------------------------------
	function Inicio()
	{
		$this->msgEmail =
			"<tr><td colspan='2' class='centro'>" . $this->tituloEmail . "</td></tr>
			<tr>
				<td class='centro'>Título</td>
				<td class='centro'>Enviados</td>
			</tr>";

		parent::Inicio();
	}

	//------------------------------------------------------------------------
	function Fim()
	{
		global $g_debugProcesso, $cnfConfig;
		$regA = &$this->regAtual;
		$qtos = $this->ValorTotal( "totEnviados" );

		$this->msgEmail .=
			"<tr>
				<td>Total</td>
				<td class='centro'>" . formatarNum( $qtos ) . "</td>
			</tr>";

		$select = "Select CNPJ
			From cnfXConfig";
		$cnpj = sql_lerUmRegistro( $select )->CNPJ;
// if( $g_debugProcesso ) echo '<br><b>GR0 cnfXConfig S=</b> '.$select;

		//* function cobranca( $p_tipo, $p_diaAnterior, $p_emails, $p_qtd=0, $p_loja=5, $p_acessos=0, $p_cnpj='' )
		cobranca( "EMAIL", $this->diaAnterior, $qtos, 0, 5, 0, $cnpj );

		parent::Fim();
	}

	//------------------------------------------------------------------------
	//	Quebra por Acao
	//------------------------------------------------------------------------
	function QuebraPorAcao()
	{
		return( $this->regAtual->TITULO );
	}

	//------------------------------------------------------------------------
	function PeQuebraPorAcao()
	{
		$regA = &$this->regAtual;
		$this->AcumularTotal( "total", $regA->TOTAL );

		$this->msgEmail .=
			"<tr class='" . $this->estilo . "'>
				<td>" . $regA->TITULO . "</td>
				<td class='centro'>" . $this->FormatarTotal( 'totEnviados' ) . "</td>
			</tr>";

		$this->estilo = ( $this->estilo == 'regPar' ? 'regImpar' : 'regPar' );
	}

	//------------------------------------------------------------------------
	// Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{
		$regA           = &$this->regAtual;
		$regA->NOME     = $regA->NOME_CARTAO =  "[[ NOME ]]";
		$regA->APELIDO  = $regA->APELIDO_CARTAO = "[[ APELIDO ]]";
		$regA->CPF      = '[[ CPF ]]';
		$regA->EMAIL    = "[[ EMAIL ]]";
		$regA->FANTASIA = "[[ FANTASIA ]]";
		$regA->DATA     = formatarData( HOJE, 'dd/mm/aaaa' );

		$regA->CONTA      = '[[ CONTA ]]';
		$regA->VALOR      = '[[ VALOR ]]';
		$regA->VENCIMENTO = '[[ VENCIMENTO ]]';

		$this->acumularTotal( 'totEnviados', $regA->ENVIADOS );
	}
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------
$proc = new EmailUsuario();

$proc->diaAnterior = incDia( formatarData( HOJE, 'aaaa/mm/dd' ), -1 );
$proc->mes         = formatarData( $proc->diaAnterior, 'mmm/aaaa' );

$proc->campoHabilitado = "EmailLog";
$proc->tituloEmail     = CLIENTE_NOME . " - Resumo de emails enviados em ". $proc->mes;

$proc->DefinirQuebras(
	[ 'QuebraPorAcao',	NAO, NAO, SIM ] );

$proc->DefinirTotais( 'totEnviados' );

$select = "Select A.Titulo, L.Enviados
	From arqLogEmail L
		join arqAcaoEmail A on A.idPrimario=L.Titulo
	Where L.Data >= '" . dataAno( $proc->diaAnterior ) . "/" . dataMes( $proc->diaAnterior) . "/01' and
		L.Data <= '" . dataUltDiaDoMes( $proc->diaAnterior ) . "'
 	Order by L.Titulo_Titulo";

$proc->Processar( $select );
