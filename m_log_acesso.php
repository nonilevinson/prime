<?php

require_once( 'ext_email_para_usuario.php' );

class EmailUsuario extends EmailParaUsuario
{
	//------------------------------------------------------------------------
	function Inicio()
	{
		$this->msgEmail .= "
			<tr>
				<td colspan='2' class='centro'>" . $this->tituloEmail . " em " .
					formatarData( incDia( HOJE, -1 ) ) . "</td>
			</tr>
			<tr>
				<td class='centro'>Usuário</td>
				<td class='centro'>Interações</td>
			</tr>";

		parent::Inicio();
	}

	//------------------------------------------------------------------------
	function Fim()
	{
		parent::Fim();
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;

		$this->msgEmail .=
			"<tr>
				<td>" . $regA->LOGIN . "</td>
				<td class='centro'>" . $regA->QTD . "</td>
			</tr>";

		parent::Basico();
	}
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------
$proc = new EmailUsuario();

global $g_debugProcesso, $g_horaIni;
$g_horaIni = AGORA();
$hoje      = formatarData( HOJE, 'aaaa/mm/dd' );

$proc->campoHabilitado = "EmailAces";
$proc->tituloEmail     = CLIENTE_NOME . ": Interações no sistema";

sql_abrirBD( false );

$select = "Select LogAcesso
	From cnfXconfig";
$proc->comSupervisor = sql_lerUmRegistro( $select )->LOGACESSO;

$select = "Select L.Login, count(*) as Qtd
	From arqLanceLogAcesso L
	Where datediff (day, L.Data, current_date) = 1
		and ( L.Login not starting 'Noni' and L.Login not starting 'Kogut' and L.Login != 'null' )
	group by 1";
$reg = sql_lerRegistros( $select );

sql_fecharBD();

if( $reg )
	$proc->Processar( $select );
