<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Clínica", ComCall_Clinica ),
   $this->Pedir( "Mês",
      [ "", ComCall_Mes,
      [ "", ComCall ] ] ),
   $this->Pedir( "Faixa" ),
   $this->Pedir( "Contato/Comparecido",
      [ "Até ", PercAte, " %<br>(para a faixa mais alta, a última, informe 99,99%)" ] ),
   $this->Pedir( "Comissão",
      [ "", Comissao, " %" ] ),
"</table>";
