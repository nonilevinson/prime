<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Status" ),
   $this->Pedir( "Ordem" ),
   $this->Pedir( "Tipo",
      [ "", TClinica,
      [ brHtml(4) . "Legenda? ", Legenda, " (Barra no topo da agenda)" ] ] ),
   $this->Pedir( "Obrigatórios",
      [ "Hora da chegada? ", HoraChe,
      [ brHtml(4) . "Valor? ", ValorObr,
      [ brHtml(4) . "Prontuário? ", ProntuObr ] ] ] ),
   $this->Pedir( "É desmarcação?",
      [ "Geral? ", EhDesmarca,
      [ brHtml(4) . "Pelo paciente? ", EhDesmaPac ] ] ),
   $this->Pedir( "É faltou?", EhFaltou ),
   $this->Pedir( "Cor",
      [ "", Cor,
      [ brHtml(4) . "Fundo ", Fundo ] ] ),
   $this->Pedir( "Ativo?", Ativo ),
"</table>";
