<?php
//--------------------------------------------------
function vijLote( $p_idClinica, $p_idPrimario )
{
   return( "A.Clinica = " . $p_idClinica );   
}

//--------------------------------------------------
function filtrarNavMedica()
{
   return(
	   ( SQL_VETIDCLINICA
         ? "(" . SQL_VETIDCLINICA . "in (
            Select C.Clinica
            From arqConsulta C
            Where C.Idprimario = A.Consulta ) )"
         : ''
      )
   );
}
