<?php

//------------------------------------------------------------------------
function SubstituiDadosGeral( &$p_regA )
{
	global $g_debugProcesso, $parQDoc;

	$p_regA->HOJE         = formatarData( HOJE, 'dd/mm/aaaa' );
	$p_regA->HOJE_EXTENSO = formatarData( HOJE, 'dd de mmm de aaaa' );
	$p_regA->DIA          = dataDia( HOJE );
	$p_regA->MES          = dataMes( HOJE );
	$p_regA->MES_EXTENSO  = formatarData( HOJE, 'mmm'  );
	$p_regA->ANO          = dataAno( HOJE );

	for( $i=1; $i<=20; $i++ )
	{
		$c = "CAD" . $i;
		$p_regA->$c = $parQDoc->$c;
	}

}

//------------------------------------------------------------------------
function SubstituiDadosPessoa( &$p_regA )
{
	global $g_debugProcesso;

	$cpf  = formatarCpf( $p_regA->CPF );
	$cnpj = formatarCnpj( $p_regA->CNPJ );

	$p_regA->CPF      = $cpf;
	$p_regA->CNPJ     = $cnpj;
	$p_regA->CPF_CNPJ = $p_regA->CPF ? $cpf : $cnpj;
	$p_regA->CEP      = formatarCep( $p_regA->CEP );
	$p_regA->CELULAR  = formatarStr( $p_regA->CELULAR, 'n.nnnn.nnnn' );
}
