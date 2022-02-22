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
		// $vetClinica[]   = $umRegUsuCen->CLINICA;
	}

	//* implode o vetor criado na variável SQL_VETIDCLINICA, assim nos ext.php de cada arqvuivo basta
	//*	criar um return: return( "CAMPO in " . SQL_VETIDCLINICA  );
	define( 'SQL_VETIDCLINICA', "( " . implode( ",", $vetIdClinica ) . " )" );
}
else //* NÃO TEM ESPECÍFICO MONTA VETOR VAZIO
	define( 'SQL_VETIDCLINICA', "" );

//=============================================================================================
//* verificar que contas correntes o usuario pode manipular
$select = "Select C.idPrimario as idCCor, C.Nome
	From arqUsuCCor U
		join arqCCor C on C.idPrimario=U.CCor
	Where U.Usuario = " . USUARIO_ATUAL;
// if( $g_debugProcesso ) echo '<br><b>GR0 lance_executar_sempre arqUsuCCor S=</b> '.$select;
$regUsuCCor = sql_lerRegistros( $select );

if( $regUsuCCor )
{
	foreach( $regUsuCCor as $umRegUsuCCor )
		$vetIdCCor[] = $umRegUsuCCor->IDCCOR;

	//* implode o vetor criado na variável SQL_VETIDCCOR, assim nos ext.php de cada arqvuivo basta
	//*	criar um return: return( "CAMPO in " . $vetIdCCor  );
	define( 'SQL_VETIDCCOR', "( " . implode( ",", $vetIdCCor ) . " )" );
}
else //* NÃO TEM ESPECÍFICO MONTA VETOR VAZIO
	define( 'SQL_VETIDCCOR', "" );

if( $g_debugProcesso )
{
	echo '<br><b>GR0 lance_executar_sempre vetIdClinica Size=</b> '.sizeof( $vetIdClinica ).
		' <b>VETIDCLINICA=</b> '.SQL_VETIDCLINICA.' | <b>vetIdCCor Size=</b> '.
		sizeof( $vetIdCCor ).' <b>VETIDCLINICA=</b> '.SQL_VETIDCCOR;
}

//=============================================================================================
//* sobre desmarcações
$select = "Select X.QtasDesmar
   From cnfXConfig X";
$umXConfig = sql_lerUmRegistro( $select );
$qtasDesmar = $umXConfig->QTASDESMAR;

define( 'G_QTASDESMAR', $qtasDesmar );
// if( $g_debugProcesso ) echo '<br><b>GR0 lance_executar_sempre G_QTASDESMAR=</b> '.G_QTASDESMAR;

//=============================================================================================
echo
javaScriptIni(),
	'var g_vetIdClinica = [', implode( ',', $vetIdClinica ), '];',
	'var g_minhaClinica ="' . $vetIdClinica[0] . '";',
	'var g_temUmaClinica = ', ( sizeof( $vetIdClinica ) == 1 ? 'true' : 'false' ), ';',
	'var g_temMaisDeUmClinica = ', ( sizeof( $vetIdClinica ) > 1 ? 'true' : 'false' ), ';',
	'var g_podeTodasClinica = ', ( sizeof( $vetIdClinica ) == 0 ? 'true' : 'false' ), ';',
	'var g_qtasDesmar = ', $qtasDesmar , ';',
javaScriptFim();
/*	
echo
javaScriptIni(),
	'console.warn(\'MaisDeUmClinica= \'+g_temMaisDeUmClinica );',
	'console.warn(\'UmaClinica= \'+g_temUmaClinica );',
	'console.warn(\'TodasClinica= \'+g_podeTodasClinica );',
javaScriptFim();
*/
sql_fecharBD();
