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
	function Inicio()
	{
      $this->msgEmail = "
         <tr><td colspan='2' align='center'>" . $this->tituloEmail . "</td></tr>
         <tr>
				<td class='centro'>Clínicas</td>
				<td class='centro'>Consultas</td>
			</tr>";
		
      parent::Inicio();
   }
   
	//------------------------------------------------------------------------
	function Fim()
	{
      global $g_debugProcesso;
      $regA = &$this->regAtual;

		$this->msgEmail .= "
         <tr>
				<td class='centro'>" . $this->FormatarTotal( "totClinicas" ) . " clínicas</td>
				<td class='centro'>" . $this->FormatarTotal( "totConsultas" ) . "</td>
			</tr>";

$testeFim = true;
      if( $testeFim )
      {
         if( $g_debugProcesso ) echo '<br><b>GR0 =</b> '.$select;
         echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE FIM - não gera o CobrancaKM ***</p>';
      }
      else
      {   
         //* function cobranca( $p_tipo, $p_diaAnterior, $p_emails, $p_qtd=0, $p_loja=1, $p_acessos=0, $p_cnpj='' )
         //* o p_loja precisa ser o do sistema em Contatos: SWSM = 1
         cobranca( "CLINICAS", $this->diaAnterior, 0, $regA->QTAS, 1, 0, '');
      }
		
      parent::Fim();
	}

	//------------------------------------------------------------------------
	// Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;
      $qtasConsultas = $regA->QTASCONSULTAS;

		$this->msgEmail .= "
         <tr>
				<td>" . $regA->CLINICA . "</td>
				<td class='centro'>" . formatarNum( $qtasConsultas ) . "</td>
			</tr>";
         
      $this->AcumularTotal( "totClinicas", 1 );
      $this->AcumularTotal( "totConsultas", $qtasConsultas );
      
	}
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------
global $g_debugProcesso;

$proc = new EmailUsuario();

$proc->DefinirTotais( "totClinicas", "totConsultas" );

$proc->diaAnterior = incDia( formatarData( HOJE, 'aaaa/mm/dd' ), -1 );
$proc->mes         = formatarData( $proc->diaAnterior, 'mmm/aaaa' );

$proc->campoHabilitado = false; //*"EmailFinan";
$proc->tituloEmail = CLIENTE_NOME . ": Clínicas com Consultas ativas em ". $proc->mes;

$select = "Select C.Clinica,
      (Select count(*) as QtasConsultas
         From arqConsulta C1
         Where C1.Clinica = C.idPrimario)
	From arqClinica C
	Where C.DataFim is null or datediff( day, cast( '" . $proc->diaAnterior . "' as date), C.datafim ) > 0
   Order by C.Clinica";

$proc->Processar( $select );
