<?PHP

require_once( LANCE_PHP_ABSOLUTO . 'lance_relatorio_pdf_livre.php' );

class RelAvisos extends Lance_RelatorioPDF_Livre
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		$this->tituloRelatorio = [ ' ', ' ' ];

		$this->DefinirXYIniciais( [25, 28] );

		$this->comData = true;

		$this->DefinirQuebras(
			[ 'QuebraPorNumero', SIM, NAO, SIM ] );
	}

	//------------------------------------------------------------------------
	//	Quebra por Numero
	//------------------------------------------------------------------------
	function QuebraPorNumero()
	{
		return( $this->regAtual->NUMERO );
	}

	//------------------------------------------------------------------------
	function CabQuebraPorNumero()
	{
		$regA = &$this->regAtual;
		$this->NovaMargem( 25 );

		$this->ParaGrupo = '';
		$this->SubProcesso( 0, 'Select G.Grupo
			From arqParaGrupo P
				left join arqGrupo G on G.Idprimario = P.Grupo
			Where P.Avisos=' . $regA->IDPRIMARIO,
			'', '', 'SubParaGrupo', '' );

		$this->WriteTxt( "Aviso Nº: ". $regA->NUMERO . " de " . formatarData( $regA->DATA ), 100,
			[ '', BOLD, 0, [0], [155] ] );
		$this->WriteTxt( "De: ". $regA->NOME, 100,
			[ '', BOLD, 0, [0], [155] ] );
		$this->WriteTxt( "Para: " . $this->ParaGrupo, 100,
			[ '', BOLD, 0, [0], [155] ] );
		$this->Writeln();
	}

	//------------------------------------------------------------------------
	function PeQuebraPorNumero()
	{
		$this->MudarPagina();
	}

	//------------------------------------------------------------------------
	function Rodape()
	{
	}

	//------------------------------------------------------------------------
	//	Evento SubPara
	//------------------------------------------------------------------------
	function SubParaGrupo()
	{
		$this->ParaGrupo .= $this->regSub[0]->GRUPO . '  ';
	}

	//------------------------------------------------------------------------
	// Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;
		$pdf = $this->PDF;

		$this->Buffer( false );

		$this->WriteTxt( "Assunto: " . $regA->ASSUNTO, 100, [ '', BOLD, 0, [0], [195] ] );

		$this->Writeln();
		$pdf->WriteHtml( '</p>' . $regA->TEXTO );

		$this->Buffer( true );
		$this->Buffer( false );

		$this->Writeln();
		$this->Writeln();
		$this->Writeln();
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$pdf->Line( $x, $y, $x + 175, $y );
		$this->Writeln();
		$this->WriteTxt( "Assine e devolva a 2ª via deste aviso", 100 );
		$this->Writeln();
		$this->Writeln();
		$this->WriteTxt( "Recebi e li o aviso em ______/ ______/ ______", 100 );
		$this->Writeln();
		$this->Writeln();
		$this->WriteTxt( "Nome legível _____________________________   Assinatura: _____________________________", 100 );

		$this->Buffer( true );
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelAvisos( RETRATO, A4, 'Avisos.pdf', '' );

$filtro = substr(
		filtrarPorIntervaloData( "A.Data", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
		filtrarPorIntervalo( "A.Numero", $parQSelecao->GRAN6, $parQSelecao->GRAN6FIM ), 0, -4 );

$select = "Select A.IdPrimario, A.Numero, A.Data, A.Assunto, A.Texto, U.Nome
	From arqAvisos A
		left join arqUsuario U on U.idPrimario=A.Quem ".
	( $filtro ? ( "Where " . $filtro ) : "" ) .
	"Order by A.Numero";

$proc->Processar( $select );
