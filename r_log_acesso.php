<?php

require_once( 'ext_relatorios_colunares.php' );

class RelLog extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao;

		$this->tituloRelatorio = [ 'Log de acesso',
			$this->TituloData( '', $parQSelecao->DATAINI, $parQSelecao->DATAFIM ),
			( $parQSelecao->NUM11INI ? "Idprimario do registro: " . $parQSelecao->NUM11INI : "" ),
				' ' ];

		$this->DefinirCabColunas(
			[ "Hora",    	 14, ALINHA_CEN ],
			[ 'IP', 		  	 27, ALINHA_CEN ],
			[ "Status", 	 55, ALINHA_ESQ ],
			[ "O Que",   	130, ALINHA_ESQ ],
			[ "Chave", 		 45, ALINHA_ESQ ],
			[ "idPrimario", 25, ALINHA_DIR ],
			[ "Campo",		 30, ALINHA_ESQ ]
			);

		$this->DefinirQuebras(
			[ 'QuebraPorUsuario',	SIM, NAO, SIM ],
			[ 'QuebraPorData',		SIM, NAO, SIM ] );

		$this->cabPaginaTemCabColunas = false;
		$this->comCodigoRel           = false;
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
		$barra  = $regA->OPERACAO && $regA->OBSERVACAO ? " / " : "";
		$obs    = $regA->OBSERVACAO ? $regA->OBSERVACAO : "";
		$acesso = $regA->ACESSO == "(Master)" ? "MASTER => " : "";

		$this->valores = [
			formatarHora( $regA->HORA, "hh:mm:ss" ),
			$regA->IP,
			$regA->STATUS,
			$regA->OPERACAO . $barra . $obs,
			$regA->QUEM,
			$acesso . $regA->IDQUEM,
			$regA->CAMPO
		];

		$this->ImprimirValorColunas();

		$rotina = $regA->ROTINA;
		if( $rotina )
		{
			$this->JuntarColunas( [0,2], [3,6] );
			$this->valores[3] = $rotina;
			$this->ImprimirValorColunas();
			$this->RestaurarColunas();
		}
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelLog( PAISAGEM, A4, 'Log_Sistema.pdf', '', true, .87 );

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

$select = "Select L.Login, L.Data, L.Hora, L.Status_Descritor as Status, L.Observacao, L.Quem, L.idQuem,
		L.IP, L.Acesso, L.Campo, L.Antes, L.Depois, L.OperProc_Operacao as Rotina, L.Operacao_Operacao as Operacao
	From v_arqLanceLogAcesso L
	Where " . $trecho . $statusLog .
		filtrarPorNum( "L.idQuem", $parQSelecao->GRAN13 ) .
		filtrarPorLig( 'L.Usuario', $parQSelecao->USUARIO ) .
		filtrarPorIntervaloData( 'L.Data', $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
		filtrarPorIntervalo( 'L.Hora', $parQSelecao->HORAINI, $parQSelecao->HORAFIM, "'" ) .
		" L.Login != 'null'
	Order by L.Login, L.Data, L.Hora";

$proc->Processar( $select );
