<?php

global $g_debugProcesso, $g_acaoAtual;

echo
"<table class='tabFormulario'>";

	if( $g_acaoAtual == INSERINDO )
	{
		echo
		"<tr>
			<td class='formCab'>Transa��o N�</td>
			<td class='formValor'>" . brHtml(2) . "<b>Ser� atribu�do pelo sistema</b></td>
		</tr>",

		$this->NaoPedir( Transacao );
	}
	else
		echo $this->Pedir( "Transa��o N�",
         [ '', Transacao, '', '', '','', 'FormCalculado' ] );

   echo
	$this->Pedir( "Cl�nica",
      [ "", Clinica,
      [ brHtml(4) . "Tipo ", TPgRec ] ] ),
   $this->Pedir( "Fornecedor" ),
   $this->Pedir( "Paciente", Pessoa_Nome ),
   $this->Pedir( " ",
      [ "Prontu�rio ", Pessoa_Prontuario,
      [ "", Pessoa ] ] ),
   $this->Pedir( "Emiss�o",
      [ "", Emissao,
      [ brHtml(4) . "Compet�ncia ", Compete,
      [ brHtml(4) . "Recebido/Enviado ", RecEnvia ] ] ] ),
   $this->Pedir( "Documento N�",
      [ "", Documento, " (informe o n�mero da NFe ou similar que recebeu ou emitiu)" ] ),
   $this->Pedir( "Hist�rico", Historico ),
   $this->Pedir( "Valor",
      [ "Bruto ", TrgValor,
      [ brHtml(4) . "L�quido ", TrgValLiq,
      [ brHtml(4) . "Pago ", TrgPago,
      [ brHtml(4) . "Saldo ", Saldo ] ] ] ] ),
   $this->Pedir( "Parcelas",
      [ "", TrgQtdParc,
      [ brHtml(4) . "Pagas ", TrgQParcPg,
      [ brHtml(4) . "Pr�ximo vencimento ", ProxVenc ] ] ] ),
"</table>
<br>
<table class='tabFormulario'>",
   $this->Cabecalhos( [ "Arquivo", 'FormCab alinhaMeio', '2' ] ),
   $this->Pedir( "", [ "", Arq1, '', 'FormValor alinhaMeio', '2' ] ),
"</table>";
