<?php

global $g_debugProcesso;

sql_abrirBD( false );

//=============================================================================================
//* verificar que clínicas o usuario pode manipular
$select = "Select C.idPrimario as idClinica, C.Clinica
	From arqUsuCli U
		join arqClinica C on C.idPrimario=U.Clinica
	Where U.Usuario = " . USUARIO_ATUAL;
// if( $g_debugProcesso ) echo '<br><b>GR0 lance_executar_sempre arqUsuCen S=</b> '.$select;

$regUsuCen = sql_lerRegistros( $select );

if( $regUsuCen )
{
	foreach( $regUsuCen as $umRegUsuCen )
	{
		$vetIdClinica[] = $umRegUsuCen->IDCLINICA;
		$vetClinica[]   = $umRegUsuCen->CLINICA;
	}

	//* implode o vetor criado na variável SQL_VETIDCLINICA, assim nos ext.php de cada arqvuivo basta
	//*	criar um return: return( "CAMPO in " . SQL_VETIDCLINICA  );
	define( 'SQL_VETIDCLINICA', "( " . implode( ",", $vetIdClinica ) . " )" );
}
else //* NÃO TEM ESPECÍFICO MONTA VETOR VAZIO
{
	define( 'SQL_VETIDCLINICA', "" );
}
if( $g_debugProcesso ) echo '<br><b>GR0 lance_executar_sempre vetIdClinica Size=</b> '.sizeof( $vetIdClinica ).' <b>VETIDCLINICA=</b> '.SQL_VETIDCLINICA;

echo
javaScriptIni(),
	'var g_vetIdClinica = [', implode( ',', $vetIdClinica ), '];',
	'var g_temMaisDeUmClinica = ', ( sizeof( $vetIdClinica ) >= 2 ? 'true' : 'false' ), ';',
javaScriptFim();

sql_fecharBD();
