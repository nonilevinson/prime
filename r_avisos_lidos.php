<?PHP

require_once( 'ext_relatorios_colunares.php' );

class RelAvisos extends Relatorios
{	
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{

		$this->tituloRelatorio = [ 'Relatório de avisos lidos', ' ' ];

		$this->DefinirCabColunas(
			[ 'Nome',				60, ALINHA_ESQ ],
			[ 'Data da leitura',	50, ALINHA_CEN ] );
						
		$this->DefinirQuebras( 
			[ 'QuebraPorAviso', SIM, NAO, SIM ] );

		$this->cabPaginaTemCabColunas = false;
		$this->DefinirAlturas();
	}
	
	//------------------------------------------------------------------------
	//	Quebra por Aviso
	//------------------------------------------------------------------------
	function QuebraPorAviso()
	{
		return( $this->regAtual->NUMERO );
	}
		
	//------------------------------------------------------------------------
	function CabQuebraPorAviso()
	{
		$regA = &$this->regAtual;
		$this->Aviso = 'Aviso '. cad0( $regA->NUMERO, 6 ) . ' de ' . 
			formatarData( $regA->DATAAVISO ) . ' - ' . cadEsq( $regA->ASSUNTO, 30 );
		$this->CabQuebra( $this->Aviso );
		$this->ImprimirCabColunas();
	}
			
	//------------------------------------------------------------------------
	function PeQuebraPorAviso()
	{
		$this->FecharLinhas();
		$this->PularLinha( 2 );
	}
	
	//------------------------------------------------------------------------
	//	Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;

		$this->valores = [
			$regA->NOME,
			formatarData( $regA->DATA ) ];
					
		$this->ImprimirValorColunas();
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelAvisos( RETRATO, A4, 'Avisos_Lidos.pdf', '', true );

$filtro = substr(
	filtrarPorLig( "L.Usuario", $parQSelecao->USUARIO ) .
	filtrarPorIntervaloData( "L.Data", $parQSelecao->DATAINI1, $parQSelecao->DATAFIM1 ) .
	filtrarPorIntervaloData( "A.Data", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
	filtrarPorIntervalo( "A.Numero", $parQSelecao->INT6, $parQSelecao->INT62 ), 0, -4 );

$select = "Select L.Data, A.Numero, A.Data as DataAviso, A.Assunto, U.Nome
	From arqLido L
		inner join arqAvisos		A on A.idPrimario=L.Avisos
		inner join arqUsuario	U on U.idPrimario=L.Usuario ".
	( $filtro ? ( 'Where ' . $filtro ) : '' ) .
	"Order by A.Numero, U.Nome";

$proc->Processar( $select );
