<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Fornecedor" ),
   $this->Pedir( "Paciente", Pessoa_Nome ),
   $this->Pedir( " ",
      [ "Celular ", Pessoa_NumCelular,
      [ "", Pessoa ] ] ),
   $this->Pedir( "Tipo",
      [ "", TPgRec,
      [ brHtml(4) . "Compet�ncia ", TCompete ] ] ),
   $this->Pedir( "Vencimento",
      [ "", Venc,
      [ brHtml(4) . "Antecipa? ", Antecipa ] ] ),
   $this->Pedir( "Valor",
      [ "", Valor,
      [ brHtml(4) . "Estimado? ", Estimado ] ] ),
   $this->Pedir( "Cobran�a", TFCobra ),
   $this->Pedir( "Hist�rico", Historico ),
/*
   $this->Pedir( "Plano de contas",
      [ "", SubPlano_Plano_CodPlano,
      [ brHtml(2), SubPlano_Plano_Plano,
      [ "", SubPlano_Plano ] ] ] ),
   $this->Pedir( " ",
      [ "", SubPlano_Codigo,
      [ brHtml(2), SubPlano_Nome,
      [ "", SubPlano ] ] ] ),
*/
   $this->Pedir( "Ativa?", Ativo ),
"</table>";
