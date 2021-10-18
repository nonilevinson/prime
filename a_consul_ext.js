//----------------------------------------------------------
function vijCallCenter()
{
   return( 
      ( g_inserindo ? "A.Ativo = 1 and " : "" ) +
      "A.Grupo is not null and (" +
      "Select G.CallCenter " +
      "From arqUsuario U " +
         "join arqGrupo G on G.idPrimario=A.Grupo " +
      "Where G.CallCenter = 1) = 1" );
}
