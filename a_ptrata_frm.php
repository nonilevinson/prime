<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Plano", PTrata ),
   $this->Pedir( "Apelido",
      [ "", Apelido, " (ser� usado em hist�rico de conta a receber)" ] ),
   $this->Pedir( "Valor",
      [ "", Valor,
      [ brHtml(4) . "Margem para desconto ", MrgDesc,
      [ " % " . brHtml(4) . "M�nimo ", ValMinimo ] ] ] ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>
<br>
<table class='tabFormulario'>",
   $this->Cabecalhos( [ "Descri��o", 'FormCab alinhaMeio', '2' ] ),
   $this->Pedir( "", [ "", Descricao, '', 'FormValor alinhaMeio', '2' ] ),
"</table>";
