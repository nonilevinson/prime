<?php
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
