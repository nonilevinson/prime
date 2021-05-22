<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Plano", PTraata ),
   $this->Pedir( "Valor" ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>
<br>
<table class='tabFormulario'>",
   $this->Cabecalhos( [ "Descrição", 'FormCab alinhaMeio', '2' ] ),
   $this->Pedir( "", [ "", Descricao, '', 'FormValor alinhaMeio', '2' ] ),
"</table>";
