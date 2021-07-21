<?php

//===========================================================
function ext_filtrarTodos()
{
   return( substr(
		( SQL_VETIDCLINICA ? "A.idPrimario in " . SQL_VETIDCLINICA . ' and ': '' ), 0, -4 ) );
}
