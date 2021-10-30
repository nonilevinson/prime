<?php

//----------------------------------------------------------------------------------
function btnCopiar( $p_nome )
{
	return( brHtml(1) . "<button class='btnCopiar' style='vertical-align:top' idCampo='" .
		$p_nome . "'><img src='" . LANCE_GIF . "/copy.png' style='width:13px'></button>" );
}
//----------------------------------------------------------------------------------

echo
"<table class='tabFormulario'>",
   $this->Pedir( "Nº Transação",
      [ '', Conta,
      [ brHtml(4) . "Parcela Nº ", Parcela,
      [ brHtml(4) . "Tipo ", TPgRecCal ] ] ] ),
   $this->Pedir( "Clínica", ClinicaCal ),
   $this->Pedir( "Pessoa", PessoaCal ),
   $this->Pedir( "Plano de contas",
      [ "", SubPlano_Plano_CodPlano,
      [ brHtml(2), SubPlano_Plano_Plano,
      [ "", SubPlano_Plano ] ] ] ),
   $this->Pedir( " ",
      [ "", SubPlano_Codigo,
      [ brHtml(2), SubPlano_Nome,
      [ "", SubPlano ] ] ] ),
   $this->Pedir( "Vencimento",
      [ "", Vencimento,
      [ brHtml(4) . "Estimado? ", VencEst ] ] ),
   $this->Pedir( "Valor",
      [ "Bruto ", Valor,
      [ brHtml(4) . "Líquido ", ValorLiq,
      [ brHtml(4) . "Estimado? ", Estimado ] ] ] ),
   $this->Pedir( "Forma de Cobrança",
      [ "", TFCobra,
      [ brHtml(4) . "Forma de Pagamento ", TFPagto,
      [ brHtml(4) . "Detalhe ", TDetPg ] ] ] ),
   $this->Pedir( "Forma",
      [ "", FormaPg, " (quando a receber)" ] ),
   $this->Pedir( "Linha digitável",
      [ "", LinhaDig, btnCopiar( "LinhaDig" ) ] ),
   $this->Pedir( "Conta corrente", CCor ),
   $this->Pedir( "Cheque" ),
   $this->Pedir( "Pagamento",
      [ "", DataPagto,
      [ brHtml(4) . "Compensado ", DataComp ] ] ),

   $this->Pular1Linha(2),
   $this->Cabecalhos( [ "Se conta a Receber", 'FormCab alinhaMeio', '2' ] ),
   $this->Pedir( "Boleto",
      [ "Emissão ", Emissao,
      [ brHtml(3) . "Nosso Nº ", NumBoleto ] ] ),
   $this->Pedir( "Status retorno",
      [ "", StRetorno, "", "", "", "", "FormCalculado" ] ),
   $this->Pedir( "Remessa",
      [ "", Remessa,
      [ brHtml(4) . "em ", DataRem, "", "", "", "", "FormCalculado" ], "", "", "", "FormCalculado" ] ),

/*   $this->Pedir( "Nome PDF ",
      [ "", NomePdf, "", "", "", "", "FormCalculado" ] ),
*/
   $this->NaoPedir( NomePdf ),
"</table>
<br>
<table class='tabFormulario'>",
   $this->Cabecalhos( [ "Arquivo", 'FormCab alinhaMeio', '2' ] ),
   $this->Pedir( "", [ "", Arq1, '', 'FormValor alinhaMeio', '2' ] ),
"</table>";

echo
javaScriptIni(),  "
	// Os campos View são protegidos contra copia, document.execCommand('copy'),
	// por isso, salvamos o valor REAL de Valor, usamos o Valor para forçar o copy
	// e depois restauramos o valor de Valor

	function copiarDado( p_quem ) {
		let campoCopiado = document.getElementById( p_quem );
		let campoValor = document.getElementById('Valor');
		let valorRealValor = campoValor.value;
		campoValor.value = campoCopiado.value;
		campoValor.select();
		campoValor.setSelectionRange(0, campoCopiado.value.length);
		let result = document.execCommand('copy');
		campoValor.value = valorRealValor;
		campoCopiado.focus();
	}

	const buttons = document.getElementsByClassName( 'btnCopiar' );
	for( let i=0; i<buttons.length; i++ )
	{
		let umButton = buttons[i];
		const idCampo = umButton.getAttribute( 'idCampo' );
		umButton.addEventListener( 'click', (event) => {
			copiarDado( idCampo );
			event.preventDefault();
			event.stopPropagation();

			return( false );
		});
	};
	", 
javaScriptFim();

