<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Cl�nica", ComCall_Clinica ),
   $this->Pedir( "M�s",
      [ "", ComCall_Mes,
      [ "", ComCall ] ] ),
   $this->Pedir( "Faixa" ),
   $this->Pedir( "Contato/Comparecido",
      [ "At� ", PercAte, " %<br>(para a faixa mais alta, a �ltima, informe 99,99%)" ] ),
   $this->Pedir( "Comiss�o",
      [ "", Comissao, " %" ] ),
"</table>";
