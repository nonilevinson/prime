<?php

require_once( 'ext_email_para_usuario.php' );

class EmailUsuario extends EmailParaUsuario
{
	//------------------------------------------------------------------------
	function Inicio()
	{
		$this->msgEmail = "<tr><td colspan='4' class='centro'>" . $this->tituloEmail . "</td></tr>";

		parent::Inicio();
	}

	//------------------------------------------------------------------------
	function Fim()
	{
		parent::Fim();
	}

	//------------------------------------------------------------------------
	function QuebraPorClinica()
	{
		return( $this->regAtual->CLINICA );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorClinica()
	{
		$regA = &$this->regAtual;

		$this->msgEmail .= "
			<tr><td colspan='4' align='center'> " . $regA->CLINICA  . "</td></tr>
			<tr>
				<td class='centro'>Consulta</td>
				<td class='centro'>Paciente</td>
				<td class='centro'>Prontuário</td>
				<td class='centro'>Celular</td>
			</tr>";
	}

	//------------------------------------------------------------------------
	function PeQuebraPorClinica()
	{
		$this->msgEmail .= "<tr><td colspan='4' align='center'>&nbsp;</td></tr>";
	}

	//------------------------------------------------------------------------
	function QuebraPorConsulta()
	{
		return( $this->regAtual->NUM );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorConsulta()
	{
		$regA = &$this->regAtual;

		$this->msgEmail .= "
			<tr>
				<td class='centro'>" . formatarNum( $regA->NUM ) . "</td>
				<td>" . $regA->NOME . "</td>
				<td class='centro'>" . $regA->PRONTUARIO . "</td>
				<td class='centro'>" . formatarStr( $regA->NUMCELULAR, 'xx x.xxxx.xxxx' ) . "</td>
			</tr>";
	}	
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------
global $g_debugProcesso;

$proc = new EmailUsuario();
$ontem = incDia( HOJE, -1 );

$proc->comSupervisor   = false;
$proc->campoHabilitado = "EmCMediSep";
$proc->tituloEmail = CLIENTE_NOME . ": Consultas com a medicação separada em " . formatarData( $ontem );

$proc->DefinirQuebras( 
	[ 'QuebraPorClinica', 	SIM, NAO, SIM ],
	[ 'QuebraPorConsulta',	SIM, NAO, NAO ]
	 );

$select = "Select C.Num, L.Clinica, P.Nome, P.Prontuario, P.NumCelular
	From( Select M.Consulta
			From arqCMedica M
			Where M.DataSepara = dateadd( day, -1, current_date )
			Group by 1 ) M
		join arqConsulta 	C on C.idPrimario=M.Consulta
		join arqClinica	L on L.idPrimario=C.Clinica
		join arqPessoa  	P on P.idPrimario=C.Pessoa
	Where C.TStAgRet is null and C.TrgQtdM > 0 and C.TrgQtdM = C.TrgQtdMEnt
	Order by L.Clinica, C.Num";

$proc->Processar( $select );
