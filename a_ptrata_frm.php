<?php

echo
"<table class='tabFormulario'>",
   $this->Pedir( "Plano", PTrata ),
   $this->Pedir( "Apelido",
      [ "", Apelido, " (será usado em histórico de conta a receber)" ] ),
   $this->Pedir( "Tempo",
      [ "", Tempo, " (será usado no Contrato)" ] ),
   $this->Pedir( "Valor",
      [ "", Valor,
      [ brHtml(4) . "Margem para desconto ", MrgDesc,
      [ " % " . brHtml(4) . "Mínimo ", ValMinimo ] ] ] ),
   $this->Pedir( "Complemento?",
      [ "", Complemen, " (oferece consultas complementares aos pacientes)" ] ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
