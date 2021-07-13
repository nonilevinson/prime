<?php

//=====================================================
function sugereProntuario( $p_idpPrimario )
{
   $select = 'Select gen_id( genProntuario, 1 ) as Prontuario
      From cnfXConfig';
   $prontuario = sql_lerUmRegistro( $select )->PRONTUARIO;

   echo
   javascriptIni(),
      "with( parent ) {
         alt( Prontuario, " . $prontuario . " );
         Apelido.Focalizar(); }",
   javaScriptFim();
}


