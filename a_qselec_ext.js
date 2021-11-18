//-------------------------------------------------------------
function verificaSenha1( p_senha1 )
{
//console.log('ext: '+p_senha1+ '= ' +g_nomeUsuario);
	return( !SenhaOk( p_senha1, g_nomeUsuario  ) );
}

//----------------------------------------------------------
function vijCallCenter()
{
   return( 
      "A.Grupo is not null and (" +
      "Select G.CallCenter " +
      "From arqUsuario U " +
         "join arqGrupo G on G.idPrimario=U.Grupo " +
      "Where U.idPrimario = A.idPrimario) = 1" );
}

//----------------------------------------------------------
function vijMedico()
{
   return( 
      "A.Grupo is not null and (" +
      "Select G.Medico " +
      "From arqUsuario U " +
         "join arqGrupo G on G.idPrimario=U.Grupo " +
      "Where U.idPrimario = A.idPrimario) = 1" );
}
//----------------------------------------------------------
function vijAssessor()
{
   return( 
      "A.Grupo is not null and (" +
      "Select G.Assessor " +
      "From arqUsuario U " +
         "join arqGrupo G on G.idPrimario=U.Grupo " +
      "Where U.idPrimario = A.idPrimario) = 1" );
}
