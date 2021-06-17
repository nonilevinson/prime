<?php

global $g_debugProcesso;
$parQSelecao = lerParametro( 'parQSelecao' );

sql_abrirBD( false );
$msg        = '';
$idConsulta = navegouDe( 'arqConsulta' );

//* op 137 campo HoraChega

sql_update( "arqConsulta", [
      "HoraChega" => $parQSelecao->HORAINI ],
   "idPrimario = " . $idConsulta );

//* verificar se o paciente tem prontuário, se não tiver, atribuir
$select = "Select P.idPrimario as idPessoa, P.Prontuario
   From arqConsulta C
      join arqPessoa P on P.idPrimario=C.Pessoa and P.TPessoa = 2
   Where C.idPrimario = " . $idConsulta;
$umaConsulta = sql_lerUmRegistro( $select );
// if( $g_debugProcesso ) echo '<br><b>GR0 arqConsulta S=</b> '.$select;

if( !$umaConsulta->PRONTUARIO )
{
   //* criar prontuário a partir do generator
   $select = 'Select gen_id( genProntuario, 1 ) as Prontuario
      From cnfXConfig';
   $prontuario = sql_lerUmRegistro( $select )->PRONTUARIO;

   $msg = '\nFoi atribuido o Prontuário Nº ' . formatarNum( $prontuario ) . ' ao paciente.';

   sql_update( "arqPessoa", [
         "Prontuario" => $prontuario ],
      "idPrimario = " . $umaConsulta->IDPESSOA );
}

sql_fecharBD();

$teste = false;
if( $teste )
   echo '<p style="text-align: center; font-weight: bold; font-size:24px">*** EM TESTE ***</p>';
else
   tecleAlgoVolta( 'Chegada registrada.' . $msg . '\nVerifique', true, 2 );