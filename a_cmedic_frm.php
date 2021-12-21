<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Consulta" ),
   $this->Pedir( "Medicação", Medicamen ),
   $this->Pedir( "Unidade", UnidadeCal ),
   $this->Pedir( "Quantidade<br>Prescrita", Qtd ),
   $this->Pular1Linha(2),
   $this->Cabecalhos( [ "Estoque", 'FormCab alinhaMeio', '2' ] ),

   $this->NaoPedir( Lote_Medicamen, Medicamen ),
   $this->NaoPedir( Lote_Medicamen_Medicamen, Medicamen_Medicamen ),
   $this->Pedir( "Lote",
      [ "", Lote_Lote,
      [ "", Lote ] ] ),

   $this->Pedir( "Separado em", DataSepara ),
   $this->Pedir( "Quantidades",
      [ "Separado/Entregue", QtdEntreg,
      [ brHtml(4) . "Saldo ", Saldo ] ] ),
   $this->Pedir( "Observação", ObsEntreg ),
"</table>";
