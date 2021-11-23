<?php

echo
"<table class='tabFormulario'>",
	//* 23/11/2021 Pelo papo com o Leonardo, entendi que não usarão esse campo e em vez de excluir, o escondi
   $this->NaoPedir( Descricao ),
   
   $this->Pedir( "Plano", PTrata ),
   $this->Pedir( "Apelido",
      [ "", Apelido, " (será usado em histórico de conta a receber)" ] ),
   $this->Pedir( "Tempo",
      [ "", Tempo, " (será usado no Contrato)" ] ),
   $this->Pedir( "Valor",
      [ "", Valor,
      [ brHtml(4) . "Margem para desconto ", MrgDesc,
      [ " % " . brHtml(4) . "Mínimo ", ValMinimo ] ] ] ),
   $this->Pedir( "Ativo?", Ativo ),
/*
"</table>
<br>
<table class='tabFormulario'>",
   $this->Cabecalhos( [ "Descrição", 'FormCab alinhaMeio', '2' ] ),
   $this->Pedir( "", [ "", Descricao, '', 'FormValor alinhaMeio', '2' ] ),
*/
"</table>";
