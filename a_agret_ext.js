//----------------------------------------------------------
function vijAssessor()
{
   return( 
      ( g_inserindo ? "A.Ativo = 1 and " : "" ) +
      "A.Grupo is not null and (" +
      "Select G.Assessor " +
      "From arqUsuario U " +
         "join arqGrupo G on G.idPrimario=U.Grupo " +
      "Where U.idPrimario = A.idPrimario) = 1" );
}
