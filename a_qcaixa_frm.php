<?php

global $g_debugProcesso;
$op = ultimaLigOpcao();

echo 	"<table class='tabFormulario'>";
//====================================================================

if( in_array( $op, [176] ) ) //* 176: criar sa�da Recep��o
{
   echo
   $this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Data" ),
   $this->PedirZerando( "Valor" ),
   $this->PedirZerando( "Fornecedor" ),
   $this->PedirZerando( "Hist�rico ", Historico ),
   $this->Pedir( "Plano de contas",
      [ "", SubPlano_Plano_CodPlano,
      [ brHtml(2), SubPlano_Plano_Plano,
      [ "", SubPlano_Plano ] ] ] ),
   $this->PedirZerando( " ",
      [ "", SubPlano_Codigo,
      [ brHtml(2), SubPlano_Nome,
      [ "", SubPlano ] ] ] );
}

if( in_array( $op, [177] ) ) //* 177: criar entrada Recep��o
{ 
   echo
   $this->NaoPedir( TPgRec, 2 ),
   $this->NaoPedir( CCor, $cCor ),
   
   $this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Data" ),
   $this->PedirZerando( "Valor" ),
   $this->PedirZerando( "Fornecedor" ),
   $this->PedirZerando( "Paciente", Pessoa_Nome ),
   $this->PedirZerando( " ",
      [ "Celular ", Pessoa_NumCelular,
      [ "", Pessoa ] ] ),
   $this->PedirZerando( "Hist�rico ", Historico );
}

//==================================================================================
echo 	"</table>";
