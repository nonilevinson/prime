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
   $this->NaoPedir( Lote_Medicamen_Medicamen, Medicamen_Medicamen );
      
   if( PodeExecutarOperacao(5) )
   {
      echo
      $this->Pedir( "Lote",
         [ "", Lote_Lote,
         [ "", Lote ] ] ),
      $this->Pedir( "Separado em", DataSepara ),
      $this->Pedir( "Quantidades",
         [ "Separado/Entregue ", QtdEntreg,
         [ brHtml(4) . "Saldo ", Saldo ] ] ),
      $this->Pedir( "Observação", ObsEntreg );
   }
   else
   {
      echo
      $this->Pedir( "Lote",
         [ "", Lote_Lote,
         [ "", Lote ],'','','','FormCalculado' ] ),
      $this->Pedir( "Separado em",
         [ "", DataSepara, '','','','','FormCalculado' ] ),
      $this->Pedir( "Quantidades",
         [ "Separado/Entregue ", QtdEntreg,
         [ brHtml(4) . "Saldo ", Saldo ],'','','','FormCalculado' ] ),
      $this->Pedir( "Observação",
         [ "", ObsEntreg, '','','','','FormCalculado' ] );
   }
   
echo
"</table>";
