<?php

global $g_debugProcesso, $g_regAtual;
include_once( 'ext_aviso_criar.php' );

sql_abrirBD( OperacaoAtual() );

$assunto = "AGENDAMENTO - RETIRADA DE MEDICAÇÕES";
$texto   = $assunto . "<b>";

$select = "Select C.Num, P.Nome, P.NumCelular, P.Prontuario, C.Clinica as idClinica
   From " . FromMarcados( "arqConsulta", "C" ) ."
      join arqPessoa P on P.idPrimario=C.Pessoa
   Where " . WhereMarcados();
$regConsulta = sql_lerRegistros( $select );
// if( $g_debugProcesso ) echo '<br><b>GR0 arqConsulta S=</b> '.$select;

sql_fecharBD();

foreach( $regConsulta as $umaConsulta )
{
   $texto .= "<br>CONSULTA: " . formatarNum( $umaConsulta->NUM ) . " - " . $umaConsulta->NOME . 
      " - " . $umaConsulta->PRONTUARIO . " - " . formatarStr( $umaConsulta->NUMCELULAR, '(nn) n.nnnn.nnnn' );
}

//function criarAviso( $p_assunto, $p_prioridade, $p_texto, $p_campo='', $p_idUsuario=null, $p_idGrupo='' )
criarAviso( $assunto, 2, $texto, '', null, 'AvRetira' );

$teste = true;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE - Criou o Aviso ***</p>';
