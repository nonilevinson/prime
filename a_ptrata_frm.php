<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Plano", PTrata ),
   $this->Pedir( "Apelido",
      [ "", Apelido, " (será usado em histórico de conta a receber)" ] ),
   $this->Pedir( "Valor",
      [ "", Valor,
      [ brHtml(4) . "Margem para desconto ", MrgDesc,
      [ " % " . brHtml(4) . "Mínimo ", ValMinimo ] ] ] ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>
<br>
<table class='tabFormulario'>",
   $this->Cabecalhos( [ "Descrição", 'FormCab alinhaMeio', '2' ] ),
   $this->Pedir( "", [ "", Descricao, '', 'FormValor alinhaMeio', '2' ] ),
"</table>";
