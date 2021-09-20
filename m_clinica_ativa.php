<?php

$teste = false;
if( $teste )
{
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
   include_once( "C:\Meus Sistemas\gestao/ext_criarcobranca.php" );
}
else
   include_once( "j:/www.webgestao.com.br/www/ext_criarcobranca.php" );

require_once( 'ext_email_para_usuario.php' );

class EmailUsuario extends EmailParaUsuario {
	//------------------------------------------------------------------------
	function Fim()
	{
      $regA = &$this->regAtual;

		//* function cobranca( $p_tipo, $p_diaAnterior, $p_emails, $p_qtd=0, $p_loja=1, $p_acessos=0, $p_cnpj='' )
		//* o p_loja precisa ser o do sistema em Contatos: SWSM = 1
		cobranca( "CLINICAS", $this->diaAnterior, 0, $regA->QTAS, 1, 0, '');

		parent::Fim();
	}

	//------------------------------------------------------------------------
	// Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;

		$this->msgEmail .= "
         <tr><td colspan='2' align='center'>" . $this->tituloEmail . "</td></tr>
         <tr>
				<td>Clínicas</td>
				<td class='centro'>" . formatarNum( $regA->QTAS ) . "</td>
			</tr>";
	}
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------
global $g_debugProcesso;

$proc = new EmailUsuario();

$proc->diaAnterior = incDia( formatarData( HOJE, 'aaaa/mm/dd' ), -1 );
$proc->mes         = formatarData( $proc->diaAnterior, 'mmm/aaaa' );

$proc->campoHabilitado = "EmailFinan";
$proc->tituloEmail = CLIENTE_NOME . ": Clínicas ativas em ". $proc->mes;

$select = "Select count(*) as Qtas
   From arqClinica C
	Where C.DataFim is null or datediff( day, cast( '" . $proc->diaAnterior . "' as date), C.datafim ) > 0";
/*
$select = "Select C.Clinica,
      (Select count(*) as QtasConsultas
         From arqConsulta C1
         Where C1.Clinica = C.idPrimario)
	From arqClinica C
	Where C.DataFim is null or datediff( day, cast( '" . $proc->diaAnterior . "' as date), C.datafim ) > 0
   Order by C.Clinica";
*/
$proc->Processar( $select );
