<?php

global $g_debugProcesso, $g_acaoAtual;

echo
"<table class='tabFormulario'>";

	if( $g_acaoAtual == INSERINDO )
	{
		echo
		"<tr>
			<td class='formCab'>Transação Nº</td>
			<td class='formValor'>" . brHtml(2) . "<b>Será atribuído pelo sistema</b></td>
		</tr>",

		$this->NaoPedir( Transacao );
	}
	else
		echo $this->Pedir( "Transação Nº",
         [ '', Transacao, '', '', '','', 'FormCalculado' ] );

   echo
	$this->Pedir( "Clínica",
      [ "", Clinica,
      [ brHtml(4) . "Tipo ", TPgRec ] ] ),
   $this->Pedir( "Fornecedor" ),
   $this->Pedir( "Paciente", Pessoa_Nome ),
   $this->Pedir( " ",
      [ "Prontuário ", Pessoa_Prontuario,
      [ "", Pessoa ] ] ),
   $this->Pedir( "Emissão",
      [ "", Emissao,
      [ brHtml(4) . "Competência ", Compete,
      [ brHtml(4) . "Recebido/Enviado ", RecEnvia ] ] ] ),
   $this->Pedir( "Documento Nº",
      [ "", Documento, " (informe o número da NFe ou similar que recebeu ou emitiu)" ] ),
   $this->Pedir( "Histórico", Historico ),
   $this->Pedir( "Valor",
      [ "Bruto ", TrgValor,
      [ brHtml(4) . "Líquido ", TrgValLiq,
      [ brHtml(4) . "Pago ", TrgPago,
      [ brHtml(4) . "Saldo ", Saldo ] ] ] ] ),
   $this->Pedir( "Parcelas",
      [ "", TrgQtdParc,
      [ brHtml(4) . "Pagas ", TrgQParcPg,
      [ brHtml(4) . "Próximo vencimento ", ProxVenc ] ] ] ),
"</table>
<br>
<table class='tabFormulario'>",
   $this->Cabecalhos( [ "Arquivo", 'FormCab alinhaMeio', '2' ] ),
   $this->Pedir( "", [ "", Arq1, '', 'FormValor alinhaMeio', '2' ] ),
"</table>";
