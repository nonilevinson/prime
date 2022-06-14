<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Medicamento", Medicamen ),
   $this->Pedir( "Unidade" );
   
   if( GrupoAtualEm() )
   {
      echo
      $this->Pedir( "GR0 Qtd",
         [ "TrgItLote ", TrgItLote,
         [ brHtml(4) . "TrgCMLote ", TrgCMLote,
         [ brHtml(4) . "Estoque ", Estoque ] ] ] );      
   }
   else
   {
      echo
      $this->NaoPedirVarios( TrgItLote, TrgCMLote, Estoque );
   }
   
   echo
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
