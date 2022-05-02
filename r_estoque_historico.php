<?php

require_once( 'ext_relatorios_colunares.php' );

class RelEstoque extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $g_debugProcesso, $parQSelecao;

      $clinica = $this->idClinica;
      lerRegistroPai( 'arqClinica', $clinica );

      $medicamen = $this->idMedicamen;
      lerRegistroPai( 'arqMedicamen', $medicamen );

      $this->tituloRelatorio = [ 'Relatório de histórico de estoque',
			"Clínica: " . ( $clinica->CLINICA ? $clinica->CLINICA : "Todas" ),
         "Medicamento: " . $medicamen->MEDICAMEN,
			$this->TituloData( '', $this->dataIni, $this->dataFim ),
         ' ' ];

		$this->DefinirCabColunas(
			[ 'Data ', 	20, ALINHA_CEN ],
			[ 'C/M',    19, ALINHA_ESQ ],
			[ 'Nº',    	13, ALINHA_CEN ],
			[ 'Item',	11, ALINHA_CEN ],
			[ 'Tipo',	35, ALINHA_ESQ ],
			[ 'Qtd',		20, ALINHA_DIR ],
			[ 'Saldo',	20, ALINHA_DIR ] );

		$this->DefinirQuebras(
			[ 'QuebraPorData',	   SIM, NAO, NAO ],
			[ 'QuebraPorMovimento',	SIM, NAO, NAO ] );

		$this->cabPaginaTemCabColunas = true;
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	function Inicio()
	{
      global $g_debugProcesso, $g_saldoIni, $g_ehPrimeiro, $g_saldo;
      $g_ehPrimeiro = true;
      $g_saldo = 0;

      $select = "Select (Mov.QtdMov - Mov.QtdCMedica) as SaldoIni
			From(
				Select sum( iif( I.Tmov = 2, I.Qtd, -I.Qtd ) ) as QtdMov,
					(Select sum( C.Qtd ) as QtdCMedica
					From arqCMedica C
					Where C.Medicamen = " . $this->idMedicamen . " and C.DataSepara < '" . $this->dataIni . "')
				From arqItemMov I
					join arqMovEstoque	M on M.idPrimario=I.MovEstoque
					join arqLote			L on L.idPrimario=I.Lote
				Where L.Medicamen = " . $this->idMedicamen . " and M.Data < '" . $this->dataIni . "'
			) Mov";
		$g_saldoIni = sql_lerUmRegistro( $select )->SALDOINI;
// if( $g_debugProcesso ) echo '<br><b>GR0 SALDOINI S=</b> '.$select.'<br><b>SALDOINI=</b> '.$g_saldoIni;

      $this->JuntarColunas( [0,5, ALINHA_ESQ] );
		$this->valores[ 0 ] = "Saldo inicial";
		$this->valores[ 6 ] = formatarNum( $g_saldoIni , 2, 0, 0, ')' );
		$this->ImprimirTotalColunas();
		$this->RestaurarColunas();
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
      $this->valores[ 0 ] = formatarData( $this->regAtual->DATA );
	}

	//------------------------------------------------------------------------
	//	Quebra por MovEstoque
	//------------------------------------------------------------------------
	function QuebraPorMovimento()
	{
		return( $this->regAtual->NUM );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorMovimento()
	{
		$regA = &$this->regAtual;
		$this->valores[ 1 ] = $regA->TIPO;
		$this->valores[ 2 ] = formatarNum( $regA->NUM );
	}

	//------------------------------------------------------------------------
	//	Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{
		global $g_debugProcesso, $g_saldoIni, $g_ehPrimeiro, $g_saldo;
      $regA = &$this->regAtual;

      $qtdCal = $regA->IDTMOV == 2 ? $regA->QTD : -$regA->QTD;

		if( $g_ehPrimeiro )
         $g_saldo = $g_saldo + $g_saldoIni + $qtdCal;
      else
         $g_saldo = $g_saldo + $qtdCal;
// if( $g_debugProcesso ) echo '<br><b>GR0 SALDO=</b> '.$g_saldo;

      $this->valores[ 3 ] = formatarNum( $regA->ITEM );
      $this->valores[ 4 ] = $regA->TMOV;
      $this->valores[ 5 ] = formatarNum( $qtdCal, 2, 0, 0, ')' );
      $this->valores[ 6 ] = formatarNum( $g_saldo, 2, 0, 0, ')' );

		$this->ImprimirValorColunas();
      $g_ehPrimeiro = false;
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelEstoque( RETRATO, A4, 'Estoque_Historico.pdf', '', true );
$proc->dataIni      = $parQSelecao->DATAINI;
$proc->dataFim      = $parQSelecao->DATAFIM;
$proc->idClinica    = $parQSelecao->CLINICA;
$proc->idMedicamen  = $parQSelecao->MEDICAMEN;

$select = "Select M.Data, M.Num, I.Item, I.Qtd, T.idPrimario as idTMov, T.Descritor as TMov,
		'Movimento' as Tipo
	From arqItemMov I
      join tabTMov         T on T.idPrimario=I.TMov
		join arqMovEstoque	M on M.idPrimario=I.MovEstoque
      join arqLote			L on L.idPrimario=I.Lote
		join arqMedicamen    E on E.idPrimario=L.Medicamen
	Where " . substr(
      filtrarPorIntervaloData( 'M.Data', $proc->dataIni, $proc->dataFim ) .
      filtrarPorLig( 'M.Clinica', $proc->idClinica ) .
		filtrarPorLig( 'L.Medicamen', $proc->insumo ), 0, -4 ) .

	" UNION ALL

	Select M.DataSepara, C.Num, '0' as Item, M.Qtd, 6 as idTMov, 'Saída consulta' as TMov,
			'Consulta' as Tipo
		From arqCMedica M
			join arqMedicamen	E on E.idPrimario=M.Medicamen
			join arqConsulta	C on C.idPrimario=M.Consulta
	Where " . substr(
      filtrarPorIntervaloData( 'M.DataSepara', $proc->dataIni, $proc->dataFim ) .
		filtrarPorLig( 'C.Clinica', $proc->idClinica ) .
      filtrarPorLig( 'M.Medicamen', $proc->insumo ), 0, -4 ) .

	" Order by 1,2,3";

$proc->Processar( $select );
