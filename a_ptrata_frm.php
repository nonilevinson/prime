<?php

echo
"<table class='tabFormulario'>",
   $this->Pedir( "Plano", PTrata ),
   $this->Pedir( "Apelido",
      [ "", Apelido, " (ser� usado em hist�rico de conta a receber)" ] ),
   $this->Pedir( "Tempo",
      [ "", Tempo, " (ser� usado no Contrato)" ] ),
   $this->Pedir( "Valor",
      [ "", Valor,
      [ brHtml(4) . "Margem para desconto ", MrgDesc,
      [ " % " . brHtml(4) . "M�nimo ", ValMinimo ] ] ] ),
   $this->Pedir( "Complemento?",
      [ "", Complemen, " (oferece consultas complementares aos pacientes)" ] ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
