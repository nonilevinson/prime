<?php

global $g_debugProcesso, $g_acaoAtual;

echo
"<table class='tabFormulario'>";

	if( $g_acaoAtual == INSERINDO )
	{
		echo
		$this->NaoPedir( Num ),
		$this->Pedir( "N�",
			[ " ", '',
			[ "(ser� atribuido pelo sistema )" . brHtml(2) . "Data ", Data,
         [ brHtml(4) . "Fechado? ", Fechado ] ] ] );
	}
	else
   {
		echo $this->Pedir( "N�",
         [ '', Num,
         [ brHtml(4) . "Data ", Data,
         [ brHtml(4) . "Fechado? ", Fechado ] ] ] );
   }
   
   echo
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Fornecedor",
      [ "", Fornecedor, "<br>(opcional, use se quiser fazer uma entrada de somente um fornecedor)" ] ),
   $this->Pedir( "Documento N�",
      [ "", NumDoc, " (opcional, pode ter o n�mero da NF do fornecedor)" . brHtml(1) ] ),
"</table>
<br>
<table class='tabFormulario'>",
	$this->Cabecalhos( [ "Observa��es", 'FormCab alinhaMeio', '2' ] ),
	$this->Pedir( "", [ "", Obs, '', 'FormValor alinhaMeio', '2' ] ),
"</table>";
