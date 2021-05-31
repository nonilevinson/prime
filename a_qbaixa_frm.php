<?php

$op = ultimaLigOpcao();

echo 	"<table class='tabFormulario'>";
//====================================================================

if( $op == 154 ) //* baixar parcelas
{
	global $g_debugProcesso;

	$select = "Select distinct C.Centro
		From arqParcela P
			join arqConta C on C.idPrimario=P.Conta
		Where P.IdPrimario IN ( SELECT MARCADOS.Registro FROM " . FromMarcados( "arqParcela", "P" ) .
			" where " . WhereMarcados() . " )";
	$regQtos = sql_lerRegistros( $select );
// if( $g_debugProcesso ) echo '<br><b>GR0 arqParcela S=</b> '.$select.' <b>sizeOf=</b> '.sizeOf($regQtos);

	if( sizeOf( $regQtos ) > 1 )
		tecleAlgoVolta( 'Foram marcadas parcelas de mais de um centro de custo.\n Marque parcelas de somente um por vez.', true );

	$select = "Select P.ValorLiq, P.Parcela, C.Transacao, E.Nome, T.Descritor as TPgRec, N.Centro,
				(Select count(*)
					From arqParcela P
					Where P.IdPrimario IN ( SELECT MARCADOS.Registro FROM " . FromMarcados( "arqParcela", "P" ) .
						" where " . WhereMarcados() . " ) and P.DataPagto is null
				) as Qtas
			From arqParcela P
				join arqConta 	C on C.idPrimario=P.Conta
				join tabTPgRec T on T.idPrimario=C.TPgRec
				join arqCentro	N on N.idPrimario=C.Centro
				join arqPessoa	E on E.idPrimario=C.Pessoa
			Where P.idPrimario IN ( SELECT MARCADOS.Registro FROM " . FromMarcados( "arqParcela", "P" ) .
				" where " . WhereMarcados() . " ) and P.DataPagto is null
			Order by C.Centro, T.Descritor, E.Nome";
	$reg = sql_lerRegistros( $select );
// if( $g_debugProcesso ) echo '<br><br><b>GR0 arqParcela S=</b> '.$select;

	echo "<tr><td colspan='2'><center>
	<table class='tabFormulario' width=100%>";

	if( $reg )
	{
		$qtas = $reg[0]->QTAS;

		echo "<tr>
			<td class='formCab'>Centro de custo</td>
			<td class='formCab'>Quem</td>
			<td class='formCab'>Tipo</td>
			<td class='formCab'>Transação</td>
			<td class='formCab'>Parcela</td>
			<td class='formCab'>Valor</td>
			</tr>";

		foreach( $reg as $umReg )
		{
			echo "<tr>
				<td class='FormValor'>" . $umReg->CENTRO . "</td>
				<td class='FormValor'>" . $umReg->NOME . "</td>
				<td class='FormValor'>" . $umReg->TPGREC . "</td>
				<td class='FormValor alinhaDir'>" . formatarNum( $umReg->TRANSACAO ) . "</td>
				<td  class='FormValor alinhaDir'>" . formatarNum( $umReg->PARCELA ) . "</td>
				<td  class='FormValor alinhaDir'>" . formatarValor( $umReg->VALORLIQ ) . "</td>
				</tr>";
		}

		echo "<tr><td class='FormCab' colspan='6'><center>Total de " .
			formatarNum( $qtas) . " parcela" . ( $qtas == 1 ? "" : "s" ) . "</center></td></tr>";
	}

	echo
	"</table></center></td></tr>",
	$this->Pular1Linha(2),
   $this->PedirZerando( "Forma", TFPagto ),
   $this->PedirZerando( "Detalhe", TDetPg ),
   $this->PedirZerando( "Conta corrente",
      [ "Banco ", CCor_Banco_Num ]) ,
   $this->PedirZerando( " ",
      [ "", CCor_Banco_Banco ,
      [ "", CCor_Banco ] ] ),
   $this->PedirZerando( " ",
      [ "Agência ", CCor_Agencia,
      [ brHtml(4) . "Conta ", CCor_Conta,
      [ "", CCor ] ] ] ),
   $this->PedirZerando( "Cheque ", Cheque ),
   $this->PedirZerando( "Pagamento", DataPagto ),
   $this->PedirZerando( "Data compensação", DataComp );
}

//==================================================================================
echo 	"</table>";
