<?php

global $g_debugProcesso, $g_regAtual;

$select = "Select T.Descritor as TPgRec, E.Clinica, P.Nome
   From arqParcela X
      join arqConta     C on C.idPrimario=X.Conta
      join tabTPgRec    T on T.idPrimario=C.TPgRec
      join arqClinica   E on E.idPrimario=C.Clinica
      join arqPessoa    P on P.idPrimario=C.Pessoa
   Where X.idPrimario = " . $g_regAtual->IDPRIMARIO;
$regConta = sql_lerUmRegistro( $select );
// if( $g_debugProcesso ) echo '<br><b>GR0 arqConta S=</b> '.$select;

echo
"<table class='tabFormulario'>",
   $this->Pedir( "N� Transa��o",
      [ '', Conta,
      [ brHtml(4) . "Parcela N� ", Parcela,
      [ brHtml(4) . "Tipo", "", "<b>" . $regConta->TPGREC . "</b>" ] ] ] ),
   $this->Pedir( "Cl�nica",
      [ "", "", "<b>" . $regConta->CLINICA . "</b>" ] ),
   $this->Pedir( "Pessoa",
      [ "", "", "<b>" . $regConta->NOME . "</b>" ] ),
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
      [ brHtml(4) . "L�quido ", ValorLiq,
      [ brHtml(4) . "Estimado? ", Estimado ] ] ] ),
   $this->Pedir( "Forma de Cobran�a",
      [ "", TFCobra,
      [ brHtml(4) . "Forma de Pagamento ", TFPagto,
      [ brHtml(4) . "Detalhe ", TDetPg ] ] ] ),
	$this->Pedir( "Banco",
		[ "", CCor_Banco_Num,
		[ brHtml(2), CCor_Banco ] ] ),
	$this->Pedir( "Ag�ncia",
		[ '', CCor_Agencia,
      [ brHtml(4) . "Conta ", CCor_Conta,
      [ "", CCor ] ] ] ),
   $this->Pedir( "Cheque" ),
   $this->Pedir( "Pagamento",
      [ "", DataPagto,
      [ brHtml(4) . "Compensado ", DataComp ] ] ),

   $this->Pular1Linha(2),
   $this->Cabecalhos( [ "Se conta a Receber", 'FormCab alinhaMeio', '2' ] ),
   $this->Pedir( "Boleto",
      [ "Emiss�o ", Emissao,
      [ brHtml(3) . "Nosso N� ", NumBoleto ] ] ),
   $this->Pedir( "Status retorno",
      [ "", StRetorno, "", "", "", "", "FormCalculado" ] ),
   $this->Pedir( "Remessa",
      [ "", Remessa,
      [ brHtml(4) . "em ", DataRem, "", "", "", "", "FormCalculado" ], "", "", "", "FormCalculado" ] ),
   $this->Pedir( "Linha digit�vel",
      [ "", LinhaDig, "", "", "", "", "FormCalculado" ] ),

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
