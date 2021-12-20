<?php

global $g_debugProcesso, $g_acaoAtual;

echo
"<table class='tabFormulario'>";

	if( $g_acaoAtual == INSERINDO )
	{
		echo
		$this->NaoPedir( Num ),
		$this->Pedir( "Nº",
			[ " ", '',
			[ "(será atribuido pelo sistema )" . brHtml(2) . "Data ", Data ] ] );
	}
	else
		echo $this->Pedir( "Nº",
         [ '', Num,
         [ brHtml(4) . "Data ", Data ] ] );

   echo
	$this->Pedir( "Clínica", Clinica ),
   $this->Pedir( "Documento Nº",
      [ "", NumDoc, " (opcional, pode ter o número da NF do fornecedor)" . brHtml(1) ] ),
   $this->Pedir( "Fechado?", Fechado ),
"</table>
<br>
<table class='tabFormulario'>",
	$this->Cabecalhos( [ "Observações", 'FormCab alinhaMeio', '2' ] ),
	$this->Pedir( "", [ "", Obs, '', 'FormValor alinhaMeio', '2' ] ),
"</table>";
