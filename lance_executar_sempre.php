<?php

global $g_debugProcesso;

sql_abrirBD( false );

//=============================================================================================
//* verificar que cl�nicas o usuario pode manipular
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

	//* implode o vetor criado na vari�vel SQL_VETIDCLINICA, assim nos ext.php de cada arqvuivo basta
	//*	criar um return: return( "CAMPO in " . SQL_VETIDCLINICA  );
	define( 'SQL_VETIDCLINICA', "( " . implode( ",", $vetIdClinica ) . " )" );
}
else //* N�O TEM ESPEC�FICO MONTA VETOR VAZIO
	define( 'SQL_VETIDCLINICA', "" );

if( $g_debugProcesso ) echo '<br><b>GR0 lance_executar_sempre vetIdClinica Size=</b> '.sizeof( $vetIdClinica ).' <b>VETIDCLINICA=</b> '.SQL_VETIDCLINICA;

//=============================================================================================
//* sobre desmarca��es
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
	'var g_temMaisDeUmClinica = ', ( sizeof( $vetIdClinica ) >= 1 ? 'true' : 'false' ), ';',
	'var g_qtasDesmar = ', $qtasDesmar , ';',
javaScriptFim();

sql_fecharBD();
