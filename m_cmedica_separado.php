<?php

require_once( 'ext_email_para_usuario.php' );

class EmailUsuario extends EmailParaUsuario
{
	//------------------------------------------------------------------------
	function Inicio()
	{
		$this->msgEmail = "<tr><td colspan='9' class='centro'>" . $this->tituloEmail . "</td></tr>";

		parent::Inicio();
	}

	//------------------------------------------------------------------------
	function Fim()
	{
		parent::Fim();
	}

	//------------------------------------------------------------------------
	//	Quebra por Clinica
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
				<td class='centro'>Prontu�rio</td>
				<td class='centro'>Celular</td>
			</tr>";

	}

	//------------------------------------------------------------------------
	function PeQuebraPorClinica()
	{
		$this->msgEmail .= "<tr><td colspan='4' align='center'>&nbsp;</td></tr>";
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;

		$this->msgEmail .= "
			<tr>
				<td class='centro'>" . formatarNum( $regA->NUM ) . "</td>
				<td>" . $regA->NOME . "</td>
				<td class='centro'>" . $regA->PRONTUARIO . "</td>
				<td class='centro'>" . formatarStr( $regA->NUMCELULAR, 'xx x.xxxx.xxxx' ) . "</td>
			</tr>";
//echo '<br>M_= '.$this->msgEmail;
	}
}

//------------------------------------------------------------------------
// Declara��o do Relat�rio
//------------------------------------------------------------------------
global $g_debugProcesso;

$proc = new EmailUsuario();
$ontem = incDia( HOJE, -1 );

$proc->comSupervisor   = false;
$proc->campoHabilitado = "EmCMediSep";
$proc->tituloEmail = CLIENTE_NOME . ": Consultas com a medica��o separada em " . formatarData( $ontem );

$proc->DefinirQuebras( [ 'QuebraPorClinica', SIM, NAO, SIM ] );

$select = "Select C.Num, L.Clinica, P.Nome, P.Prontuario, P.NumCelular
	From arqCMedica M
		join arqConsulta 			C on C.idPrimario=M.Consulta
		join arqClinica			L on L.idPrimario=C.Clinica
		left join arqPessoa  	P on P.idPrimario=C.Pessoa
	Where M.DataSepara = dateadd( day, -1, current_date ) and C.TStAgRet is null and
		C.TrgQtdM > 0 and C.TrgQtdM = C.TrgQtdMEnt
	Order by L.Clinica, C.Num";

$proc->Processar( $select );
