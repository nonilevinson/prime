<?php

require_once( 'ext_relatorios_colunares.php' );

class RelParcela extends Relatorios
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		global $parQSelecao, $parQSelecao;

      lerRegistroPai( 'arqClinica', $parQSelecao->CLINICA );
      $clinica = $parQSelecao->CLINICA->CLINICA;

		$this->tituloRelatorio = [ "Relação de comissão de Call Center",
			"Mês: " . formatarData( $parQSelecao->MESINI, 'mmm/aaaa' ),
         ( $parQSelecao->CLINICA ? "Clínica: " . $clinica : ' ' ),
         ' ' ];

      $this->DefinirCabColunas(
         [ "Nome",         65, ALINHA_ESQ, 2 ],
         [ "Contatos",     18, ALINHA_DIR, 2 ],
         [ "Compareceram", 25, ALINHA_DIR, 2 ],
         [ "Conversão\n%", 20, ALINHA_DIR, 2 ],
         [ "Valor",	      22, ALINHA_DIR, 2 ],
         [ "Faixa",	      12, ALINHA_DIR, 2 ],

         [ "Comissão %",	40, ALINHA_DIR, 1, [
            [ "%",	18, ALINHA_DIR ],
            [ "R$",  22, ALINHA_DIR ] ] ] );

      $this->DefinirQuebras(
         [ 'QuebraPorClinica',   SIM, NAO, SIM ] );

		$this->DefinirTotais( "totContato", "totCompareceram", "totValor", "totComissao" );

		$this->cabPaginaTemCabColunas = false;
		$this->comCodigoRel           = false;
		$this->DefinirAlturas();
	}

	//------------------------------------------------------------------------
	function PeQuebra( $p_cabTotal )
	{
		$this->JuntarColunas( [5,6] );
      $this->valores[ 0 ] = $p_cabTotal;
		$this->valores[ 1 ] = $this->FormatarTotal( "totContato" );
		$this->valores[ 2 ] = $this->FormatarTotal( "totCompareceram" );
		$this->valores[ 4 ] = $this->FormatarTotal( "totValor", 2 );
		$this->valores[ 7 ] = $this->FormatarTotal( "totComissao", 2 );
		$this->ImprimirTotalColunas();
      $this->RestaurarColunas();
	}

	//------------------------------------------------------------------------
	function Total()
	{
		global $g_debugProcesso, $parQSelecao;

		if( !$parQSelecao->CLINICA )
		{
			$this->MarcarPosicao( 'TOTAL GERAL' );
			$this->PeQuebra( 'TOTAL GERAL' );
		}

      $this->deveriaFecharLinhas = 0;
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
		global $g_debugProcesso, $parQSelecao;
      $regA = &$this->regAtual;

		$this->quebraClinica = $regA->CLINICA;
		$this->CabQuebra( $this->quebraClinica );
      $this->ImprimirCabColunas();

      //* Procura arqComCall no mês informado em QSelecao
      $select = "Select C.idPrimario as idComCall
         From arqComCall C
         Where C.Clinica = " . $regA->IDCLINICA . " and C.Mes = '" . $parQSelecao->MESINI . "'";
      $umComCall = sql_lerUmRegistro( $select );
// if( $g_debugProcesso ) echo '<br><b>GR0 cabQuebraPorClinica arqComCall S=</b> '.$select;

      //* Não achou arqComCall no mês informado, procura a última cadastrada
      if( !$umComCall )
      {
         $select = "Select C.idPrimario as idComCall, C.Mes
            From arqComCall C
            Where C.Clinica = " . $regA->IDCLINICA . "
            Order by C.Mes Desc
            rows 1";
         $umComCall = sql_lerUmRegistro( $select );
// if( $g_debugProcesso ) echo '<br><b>GR0 2 arqComCall S=</b> '.$select;

         if( $umComCall )
         {
            $this->ImprimirTotalEmUmaColuna( "O comissionamento configurado é o de " . 
               formatarData( $umComCall->MES, 'mm/aaaa' ) );
         }
      }
      
      if( !$umComCall )
         $this->ImprimirTotalEmUmaColuna( "A clínica está sem comissionamento configurado" );

      $this->idComCall = $umComCall->IDCOMCALL;
	}

	//------------------------------------------------------------------------
	function PeQuebraPorClinica()
	{
		global $g_debugProcesso, $parQSelecao;

   	$this->PeQuebra( "TOTAL DE " . $this->quebraClinica );
		$this->PularLinha( 4 );
	}

	//------------------------------------------------------------------------
	function Basico()
	{
		global $g_debugProcesso, $parQSelecao;
      $regA = &$this->regAtual;

      $todas      = $regA->TODAS;
      $compareceu = $regA->COMPARECEU;
      $conversao = $compareceu / $todas * 100.00;
      $valor     = $regA->VALOR;

      //* ver a faixa da comissão
      $select = "Select F.Faixa, F.PercAte, F.Comissao
         From arqFxComCall F
         Where F.ComCall = " . $this->idComCall . " and F.PercAte >= " . $conversao . "
         Order by F.PercAte
         rows 1";
      $umFxComCall = sql_lerUmRegistro( $select );
// if( $g_debugProcesso ) echo '<br><b>GR0 arqFxComCall S=</b> '.$select;

      $percAte  = $umFxComCall->PERCATE;
      $comissao = $valor * $percAte / 100.0;

      $this->valores = [
         $regA->NOME,
         formatarNum( $todas ),
         formatarNum( $compareceu ),
         formatarValor( $conversao ),
         formatarValor( $valor ),
         $umFxComCall->FAIXA,
         formatarValor( $percAte ),
         formatarValor( $comissao ),
      ];

      $this->ImprimirValorColunas();

		$this->AcumularTotal( "totContato", $todas );
		$this->AcumularTotal( "totCompareceram", $compareceu );
		$this->AcumularTotal( "totValor", $valor );
		$this->AcumularTotal( "totComissao", $comissao );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelParcela( RETRATO, A4, 'Consultas_Relacao.pdf', '', true, .97 );

$filtro = substr(
   ( SQL_VETIDCLINICA ? "C.Clinica in " . SQL_VETIDCLINICA . ' and ': '' ) .
   filtrarPorIntervaloData( 'C.Data', $parQSelecao->MESINI, dataUltDiaDoMes( $parQSelecao->MESINI ) ) .
   filtrarPorLig( 'C.Clinica', $parQSelecao->CLINICA ) .
   filtrarPorLig( 'C.Callcenter', $parQSelecao->USUARIO ), 0, -4 );

$select = "Select distinct L.idPrimario as idClinica, L.Clinica, U.Nome, count(*) as Todas,
      sum( iif( C.HoraChega is not null, 1, 0 ) ) as Compareceu,
      sum( iif( C.horachega is not null, Valor, 0 ) ) as Valor
	From arqConsulta C
      join arqClinica   L on L.idPrimario=C.Clinica
      join arqUsuario   U on U.idPrimario=C.CallCenter
	Where " . $filtro . "
	Group by 1,2,3";

$proc->Processar( $select );
