<?php

echo
"<table class='tabFormulario'>",
	//* 23/11/2021 Pelo papo com o Leonardo, entendi que n�o usar�o esse campo e em vez de excluir, o escondi
   $this->NaoPedir( Descricao ),
   
   $this->Pedir( "Plano", PTrata ),
   $this->Pedir( "Apelido",
      [ "", Apelido, " (ser� usado em hist�rico de conta a receber)" ] ),
   $this->Pedir( "Tempo",
      [ "", Tempo, " (ser� usado no Contrato)" ] ),
   $this->Pedir( "Valor",
      [ "", Valor,
      [ brHtml(4) . "Margem para desconto ", MrgDesc,
      [ " % " . brHtml(4) . "M�nimo ", ValMinimo ] ] ] ),
   $this->Pedir( "Ativo?", Ativo ),
/*
"</table>
<br>
<table class='tabFormulario'>",
   $this->Cabecalhos( [ "Descri��o", 'FormCab alinhaMeio', '2' ] ),
   $this->Pedir( "", [ "", Descricao, '', 'FormValor alinhaMeio', '2' ] ),
*/
"</table>";
