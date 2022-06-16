<?php

global $g_debugProcesso, $g_regAtual, $g_regAntes;

if( $g_regAntes->ATIVO == 1 && $g_regAtual->ATIVO == 0 )
{
   $select = "Select G.Medico
      From arqGrupo G
      Where G.idPrimario = " . $g_regAtual->GRUPO;
   $ehMedico = sql_lerUmRegistro( $select )->MEDICO;
   
   if( $ehMedico )
   {
      sql_update( "arqPlantao", [
            "DataFim" => formatarData( HOJE, 'aaaa/mm/dd' )
         ],
         "Usuario = " . $g_regAtual->IDPRIMARIO );    
         
      tecleAlgoVolta( 'Os plantões desse médico foram finalizados.\nVerifique', true );  
   }
}
