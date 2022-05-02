<?php

require_once( 'ext_relatorios_colunares.php' );

class RelEstoque extends Relatorios
{	
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $g_debugProcesso, $parQSelecao;
      
      $insumo = $this->insumo;
      lerRegistroPai( 'arqInsumo', $insumo );

      $this->tituloRelatorio = [ 'Relatório de histórico de movimentos e transferências de estoque',
         "Insumo: " . $insumo->INSUMO,
         "De " . formatarData( $this->dataIni, 'dd/mm/aaaa' ) .
            ( $parQSelecao->DATAFIM != "" ? ( " até " . formatarData( $parQSelecao->DATAFIM, 'dd/mm/aaaa' ) ) : "" ),
         ' ' ];

		$this->DefinirCabColunas(
			[ 'Data ', 	   	20, ALINHA_CEN ],
			[ 'M/T',    		10, ALINHA_CEN ],
			[ 'Item',   		10, ALINHA_CEN ],
			[ 'Almoxarifado',	40, ALINHA_ESQ ],
			[ 'Tipo',	   	55, ALINHA_ESQ ],
			[ 'Qtd',		   	20, ALINHA_DIR ],
			[ 'Saldo',	   	20, ALINHA_DIR ] );
		
		$this->DefinirQuebras(
			[ 'QuebraPorData',	      SIM, NAO, NAO ],
			[ 'QuebraPorMovEstoque',   SIM, NAO, NAO ] );

		$this->cabPaginaTemCabColunas = true;
		$this->DefinirAlturas();
	}
	
	//------------------------------------------------------------------------
	function Inicio()
	{
      global $g_debugProcesso, $g_saldoIni, $g_ehPrimeiro, $g_saldo;
      $g_ehPrimeiro = true;
      $g_saldo = 0;

      $select = "Select sum(
         case when( I.Tmov in( 1,7 ) ) then ( I.Qtd ) else ( -I.Qtd ) end ) as Qtd
         From arqItemMov I 
            join arqMovEstoque	M on M.idPrimario=I.MovEstoque
				join arqEstoque		E on E.idPrimario=I.Estoque
         Where E.Insumo = " . $this->insumo . " and M.Data < '" . $this->dataIni . "'";
      $g_saldoIni = sql_lerUmRegistro( $select )->QTD;
// if( $g_debugProcesso ) echo '<br><b>GR0 INI arqItemMov S=</b> '.$select.' <b>SALDOINI=</b> '.$g_saldoIni;

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
	function QuebraPorMovEstoque()
	{
		return( $this->regAtual->NUM );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorMovEstoque()
	{
		$this->valores[ 1 ] = formatarNum( $this->regAtual->NUM );
	}

	//------------------------------------------------------------------------
	//	Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{
		global $g_debugProcesso, $g_saldoIni, $g_ehPrimeiro, $g_saldo;
      $regA = &$this->regAtual;

      $qtdCal = in_array( $regA->IDTMOV, [ 1,7 ] ) ? $regA->QTD : -$regA->QTD;
      
		if( $g_ehPrimeiro )
         $g_saldo = $g_saldo + $g_saldoIni + $qtdCal;
      else
         $g_saldo = $g_saldo + $qtdCal;
// if( $g_debugProcesso ) echo '<br><b>GR0 SALDO=</b> '.$g_saldo;
      
      $this->valores[ 2 ] = formatarNum( $regA->ITEM );
      $this->valores[ 3 ] = $regA->ALMOXARI;
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
$proc->dataIni = $parQSelecao->DATAINI;
$proc->insumo  = $parQSelecao->INSUMO;

$select = "Select M.Data, M.Num, I.Item, A.Almoxari, N.Insumo, I.Qtd, T.idPrimario as idTMov, T.Descritor as TMov
	From arqItemMov I 
		join arqMovEstoque   M on M.idPrimario=I.MovEstoque
		join arqEstoque		E on E.idPrimario=I.Estoque
      join arqInsumo       N on N.idPrimario=E.Insumo
		join arqAlmoxari		A on A.idPrimario=E.Almoxari
      join tabTMov         T on T.idPrimario=I.TMov
	Where " . substr(
      filtrarPorIntervaloData( 'M.Data', $proc->dataIni, $parQSelecao->DATAFIM ) .
      filtrarPorLig( 'E.Insumo', $proc->insumo ), 0, -4 ) .
	
	" UNION ALL

	Select T.Data, T.Num, I.Item, A.Almoxari, N.Insumo, I.Qtd, 2 as idTMov, 'Tr Origem' as TMov
		From arqItTrans I
			join arqTransfere	T on T.idPrimario=I.Transfere
			join arqAlmoxari	A on A.idPrimario=T.AlmoxOr
			join arqEstoque 	E on E.idPrimario=I.EstoqueOr
			join arqInsumo    N on N.idPrimario=E.Insumo
	Where " . substr(
      filtrarPorIntervaloData( 'T.Data', $proc->dataIni, $parQSelecao->DATAFIM ) .
      filtrarPorLig( 'E.Insumo', $proc->insumo ), 0, -4 ) .

	" UNION ALL

	Select T.Data, T.Num, I.Item, A.Almoxari, N.Insumo, I.Qtd, 1 as idTMov, 'Tr Destino' as TMov
		From arqItTrans I
			join arqTransfere	T on T.idPrimario=I.Transfere
			join arqAlmoxari	A on A.idPrimario=T.AlmoxDt
			join arqEstoque 	E on E.idPrimario=I.EstoqueDt
			join arqInsumo    N on N.idPrimario=E.Insumo
	Where " . substr(
      filtrarPorIntervaloData( 'T.Data', $proc->dataIni, $parQSelecao->DATAFIM ) .
      filtrarPorLig( 'E.Insumo', $proc->insumo ), 0, -4 ) .	
	
	" Order by 1,2,3";

$proc->Processar( $select );
