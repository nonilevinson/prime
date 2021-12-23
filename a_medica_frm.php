<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Medicamento", Medicamen ),
   $this->Pedir( "Unidade" );
   
   if( GrupoAtualEm() )
   {
      echo
      $this->Pedir( "Qtd",
         [ "TrgItLote ", TrgItLote,
         [ brHtml(4) . "TrgCMLote ", TrgCMLote,
         [ brHtml(4) . "Estoque ", Estoque ] ] ] );      
   }
   else
   {
      echo
      $this->NaoPedirVarios( TrgItLote, TrgCMLote ),
      $this->Pedir( "Estoque" );
   }
   
   echo
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
