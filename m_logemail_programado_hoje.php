<?php

require_once( 'ext_email_para_usuario.php' );

class EmailPadrao extends EmailParaUsuario 
{
	//------------------------------------------------------------------------
	function CabPorEmpresa()
	{ 
		$this->msgEmail .= 
			"<tr><td colspan='4' class='centro'>" . $this->regAtual->EMPRESA . ": " . 
				$this->tituloEmail . "</td></tr>
			<tr>
			<td>Hora</td>
			<td>Assunto do email</td>
			<td>Usuário</td>
			<td>Previsão de envio</td>
			</tr>";			
	}

	//------------------------------------------------------------------------
	function PePorEmpresa()
	{
		$regA = &$this->regAtual;
		
		$this->msgEmail .= 
			"<tr><td colspan='4'>&nbsp;</td></tr> 
			</table></center>";
	}

	//------------------------------------------------------------------------
	// Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{
		global $g_debugProcesso;
		$regA = &$this->regAtual;
		$regA->NOME 	= "[[ NOME ]]";
		$regA->APELIDO	= "[[ APELIDO ]]";

		//* CALCULAR QUANTOS EMAISL SERÃO ENVIADOS
		switch( $regA->TIPOSN )
		{
			case 0: $ativo = " "; break;
			case 1: $ativo = "C.Ativo = 1 and "; break;
			case 2: $ativo = "C.Ativo = 0 and "; break;
		}

		switch( $regA->TSIMNAO )
		{
			case 0: $nasc = " "; break;
			case 1: $nasc = "C.Nascimento is not null and "; break;
			case 2: $nasc = "C.Nascimento is null and "; break;
		}

		$select = "select count(*) as QtosEmails
			from arqCliente C
				left join arqPrefer 		P on P.Cliente=C.idPrimario
				left join arqClassifica	A on A.idPrimario=C.Classifica
				left join arqEmpresa		E on E.idPrimario=C.Empresa
			where E.Ativo = 1 and " . $ativo . $nasc .
			filtrarPorLig( 'C.Empresa', $regA->EMPRESA ) .
			filtrarPorLig( 'C.Loja', $regA->LOJA ) .
			filtrarPorLig( 'C.Vendedor', $regA->VENDEDOR ) .
			filtrarPorLig( 'C.TipoPessoa', $regA->TIPOPESSOA ) .
			filtrarPorIntervalo( "C.TrgPontos", $regA->NUMINI4, $regA->NUMFIM4 ) .
			filtrarPorLig( 'C.Classifica', $regA->CLASSIFICA ) .
			filtrarPorLig( 'P.Lazer', $regA->LAZER1 ) .
			filtrarPorLig( 'C.DadosPF_Sexo', $regA->SEXO ) .
			filtrarPorLig( 'C.Ende_BairroLig', $regA->BAIRRO ) .
			filtrarPorLig( 'C.IdPrimario', $regA->CLIENTE ) .
			filtrarPorLig( 'C.ClienteDe', $regA->CLIENTE1 ) .
			( $regA->PEQINI != 0
				? 'extract( month from C.DadosPF_Nascimento ) = ' . $regA->PEQINI . ' and '
				: '' ) .
			( $regA->DIAINI != 0
				? filtrarPorIntervaloData( 'extract( day from C.DadosPF_Nascimento )', $regA->DIAINI, $regA->DIAFIM )
				: '' ) .
			( $regA->PEQINI1 != 0
				? filtrarPorIntervalo( "( extract( year from current_date ) - extract( year from C.DadosPF_NASCIMENTO ) )" , $regA->PEQINI1, $regA->PEQFIM1 )
				: '' ) .
			( $regA->NUMERO
				? filtrarPorIntervaloData( "C.NumCli", $regA->NUMERO, $regA->NUMEROFIM )
				: "" ).
			( $regA->PEQINI != 0
				? 'C.DadosPF_Nascimento is not null and '
				: '' ) .
			" C.Email <> '' and C.RecEmail = 1 ";

		$qtosEmails = sql_lerUmRegistro( $select )->QTOSEMAILS;
if( $g_debugProcesso ) echo '<br>QTDO S= '.$select.' >> '.$qtosEmails;

		$this->msgEmail .= 
			"<tr class='" . $this->estilo . "'>
			<td>" . formatarHora( $regA->HORA ) . "</td>
			<td>" . $regA->TITULO . "</td>
			<td>" . $regA->USUARIO . "</td>
			<td class='direita'>" . formatarNum( $qtosEmails ) . "</td>
			</tr>";

		$this->estilo = ( $this->estilo == 'regPar' ? 'regImpar' : 'regPar' );		
	}	
}

//------------------------------------------------------------------------
// Declaração do Relatório
//------------------------------------------------------------------------

global $g_debugProcesso;
$hoje = formatarData( HOJE, 'aaaa/mm/dd' );

sql_abrirBD( false );

$select = "Select L.Data, L.Hora, A.Titulo, U.Usuario, L.Cliente
		From arqLogEmail L
			inner join arqAcaoEmail	A on A.idPrimario=L.Titulo
			left join arqUsuario 	U ON U.idPrimario=L.Usuario
		Where  L.HoraIni is null and L.Data = '" . $hoje . 
		"' Order by L.Hora";

sql_fecharBD();

$proc = new EmailPadrao();
$proc->campoHabilitado = "EmailAces";
$proc->tituloEmail = "Emails programados para hoje";
$proc->Processar( $select );
