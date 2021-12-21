<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Medicamento", Medicamen ),
   $this->Pedir( "Lote" ),
   $this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Fornecedor" ),
   $this->Pedir( "Datas",
      [ "Fabricação ", Fabrica,
      [ brHtml(4) . "Validade ", Validade ] ] );
      
   if( GrupoAtualEm() )
   {
      echo
      $this->Pedir( "Qtd",
         [ "TrgItMov ", TrgItMov,
         [ brHtml(4) . "TrgCMedica ", TrgCMedica,
         [ brHtml(4) . "Estoque ", Estoque ] ] ] );      
   }
   else
   {
      echo
      $this->NaoPedirVarios( TrgItMov, TrgCMedica ),
      $this->Pedir( "Estoque" );
   }
   
   echo
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
