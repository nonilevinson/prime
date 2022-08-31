//----------------------------------------------------------
function vijLote( p_idClinica )
{
   return( 
      ( g_inserindo ? "A.Ativo = 1 and A.Estoque > 0 and " : " " ) +
      "A.Clinica = " + p_idClinica );
}
