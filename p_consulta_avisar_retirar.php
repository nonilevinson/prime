<?php

global $g_debugProcesso, $g_regAtual;
include_once( 'ext_aviso_criar.php' );

sql_abrirBD( OperacaoAtual() );

$assunto = "AGENDAMENTO - RETIRADA DE MEDICA��ES";
$texto   = $assunto . "<br>";

$select = "Select distinct C.Clinica
   From " . FromMarcados( "arqConsulta", "C" ) ."
   Where " . WhereMarcados();
$regConsulta = sql_lerRegistros( $select );
$sizeRegConsulta = sizeof( $regConsulta );
if( $g_debugProcesso ) echo '<br><b>GR0 arqConsulta S=</b> '.$select.'<br><b>size=</b> '.$sizeRegConsulta;

if( $sizeRegConsulta > 1 )
{
   tecleAlgoVolta( 'Voc� marcou consultas de mais de uma cl�nica.\nMarque consultas de somente uma cl�nica e refa�a a rotina', true );
   sql_fecharBD();
   return;
}

$select = "Select C.Num, P.Nome, P.NumCelular, P.Prontuario, C.Clinica as idClinica, L.Clinica
   From " . FromMarcados( "arqConsulta", "C" ) ."
      join arqClinica   L on L.idPrimario=C.Clinica
      join arqPessoa    P on P.idPrimario=C.Pessoa
   Where " . WhereMarcados();
$regConsulta = sql_lerRegistros( $select );
// if( $g_debugProcesso ) echo '<br><b>GR0 arqConsulta S=</b> '.$select;

sql_fecharBD();

foreach( $regConsulta as $umaConsulta )
{
   $texto .= "<br>CONSULTA: " . formatarNum( $umaConsulta->NUM ) . " - " . $umaConsulta->NOME . 
      " - " . $umaConsulta->PRONTUARIO . " - " . formatarStr( $umaConsulta->NUMCELULAR, '(nn) n.nnnn.nnnn' ) . 
      " - " . $umaConsulta->CLINICA;
}

//criarAviso( $p_assunto, $p_prioridade, $p_texto, $p_campo='', $p_idClinica=null, $p_idUsuario=null, $p_idGrupo='' )
criarAviso( $assunto, 2, $texto, '', $regConsulta[0]->IDCLINICA, null, 'AvRetira' );

$teste = false;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE - Criou o Aviso ***</p>';
else
{
   desmarcarMarcados( "arqConsulta" );
   tecleAlgoVolta( 'Aviso criado.\nVerifique', true );
}
