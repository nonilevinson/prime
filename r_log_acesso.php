<?php

require_once( 'ext_relatorios_colunares.php' );

class RelLog extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ 'Log de acesso',
			( $parQSelecao->DATAINI ? 'entre ' . formatarData( $parQSelecao->DATAINI ) . ' e ' .
				formatarData( $parQSelecao->DATAFIM ) : '' ),
			( $parQSelecao->NUM11INI ? "Idprimario do registro: " . $parQSelecao->NUM11INI : "" ),
				' ' ];

		$this->DefinirCabColunas(
			[ "Hora",    	 15, ALINHA_CEN ],
			[ "Status", 	 20, ALINHA_ESQ ],
			[ "O Que",   	100, ALINHA_ESQ ],
			[ "Chave", 		 45, ALINHA_ESQ ],
			[ "idPrimario", 45, ALINHA_DIR ],
			[ 'IP', 		  	 27, ALINHA_CEN ] );

		$this->DefinirQuebras(
			[ 'QuebraPorUsuario',	SIM, NAO, SIM ],
			[ 'QuebraPorData',		SIM, NAO, SIM ] );

		$this->cabPaginaTemCabColunas = false;

		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	//	Quebra por Usuario
	//------------------------------------------------------------------------
	function QuebraPorUsuario()
	{
		return( $this->regAtual->LOGIN );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorUsuario()
	{
		$regA = $this->regAtual;
		$this->quebraUsuario = $regA->LOGIN ;
		$this->CabQuebra( $this->quebraUsuario, $regA->LOGIN );
	}

	//------------------------------------------------------------------------
	function PeQuebraPorUsuario()
	{
		$this->PularLinha(3);
	}

	//------------------------------------------------------------------------
	//	Quebra por Data
	//------------------------------------------------------------------------
	function QuebraPorData()
	{
		return( $this->regAtual->DATA );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorData()
	{
		$regA = $this->regAtual;
		$this->quebraData = formatarData( $regA->DATA );
		$this->CabQuebra( $this->quebraData );
		$this->ImprimirCabColunas();
	}

	//------------------------------------------------------------------------
	function PeQuebraPorData()
	{
		$this->PularLinha(3);
	}

	//------------------------------------------------------------------------
	//	Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{
		$regA   = &$this->regAtual;
		$acesso = $regA->ACESSO == "(Master)" ? "MASTER => " : "";
		$barra  = $regA->OPERACAO && $regA->OBSERVACAO ? " / " : "";
		$obs    = $regA->OBSERVACAO ? $regA->OBSERVACAO : "";

		switch( $regA->STATUS )
		{
			case 11: $status = "Acesso"; break;
			case 12: $status = "Alteração"; break;
			case 13: $status = "Inclusão"; break;
			case 14: $status = "Exclusão"; break;
			case 15: $status = "Processamento"; break;
		}

		$this->valores = [
			formatarHora( $regA->HORA, "hh:mm" ),
			$status,
			$regA->OPERACAO . $barra . $obs,
			$regA->QUEM,
			$acesso . $regA->IDQUEM,
			$regA->IP ];

		$this->ImprimirValorColunas();
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelLog( RETRATO, A4, 'Log_Acesso.pdf', '', true, .8 );

$statusLog = '';

switch( $parQSelecao->STATUSLOG )
{
	case 1:	$statusLog = "L.Status = 11 and "; break;	// Acesso normal
	case 2:	$statusLog = "L.Status = 12 and "; break;	// Alteração
	case 3:	$statusLog = "L.Status = 13 and "; break;	// Inclusão
	case 4:	$statusLog = "L.Status = 14 and "; break;	// Exclusão
	case 5:	$statusLog = "L.Status = 15 and "; break;	// Processamento
}

$trecho = $parQSelecao->TRECHO ? "L.Quem containing '" . $parQSelecao->TRECHO . "' and " : "" ;

$select = "Select L.Login, L.Data, L.Hora, L.Status, L.Quem, L.idQuem, L.Observacao, L.IP,
		L.Usuario, L.Acesso, O.Operacao
	From arqLanceLogAcesso L
		left join arqLanceOperacao	O on O.idPrimario=L.Operacao
	Where " . $trecho . $statusLog .
		filtrarPorNum( "L.idquem", $parQSelecao->GRAN13 ) .
		filtrarPorLig( 'L.Usuario', $parQSelecao->USUARIO ) .
		filtrarPorIntervaloData( 'L.Data', $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
		filtrarPorIntervalo( 'L.Hora', $parQSelecao->HORAINI, $parQSelecao->HORAFIM ) .
		" L.Login != 'null'
	Order by L.Login, L.Data, L.Hora";

$proc->Processar( $select );
