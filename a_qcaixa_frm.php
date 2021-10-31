<?php

global $g_debugProcesso;
$op = ultimaLigOpcao();

echo 	"<table class='tabFormulario'>";
//====================================================================

if( in_array( $op, [176,180] ) ) //* 176: criar sa�da Recep��o | 180: Assessor
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

if( in_array( $op, [177,181] ) ) //* 177: criar entrada Recep��o | 181: Assessor
{ 
   echo
   $this->Pedir( "Cl�nica", Clinica ),
   $this->Pedir( "Data" ),
   $this->PedirZerando( "Valor" ),
   $this->PedirZerando( "Fornecedor" ),
   $this->PedirZerando( "Paciente", Pessoa_Nome ),
   $this->PedirZerando( " ",
      [ "Celular ", Pessoa_NumCelular,
      [ "", Pessoa ] ] ),
   $this->PedirZerando( "Hist�rico ", Historico ),
   $this->PedirZerando( "Forma", FormaPg );
}

//==================================================================================
echo 	"</table>";
