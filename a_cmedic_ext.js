//----------------------------------------------------------
function vijLote( p_idClinica )
{
   Lance_ExecutarPhp( 'vijLote(' + p_idClinica + ', ' + g_idRegAtual + ')', 'a_cmedic_ext', '' );
   return( '' );
}

//----------------------------------------------------------
function vijLoteX()
{
   return( 
      ( g_inserindo ? "A.Ativo = 1 and A.Estoque > 0 and " : "" ) +
      ( g_temMaisDeUmClinica 
         ? "( A.Clinica in (" + g_vetIdClinica + ") ) "
         : "1=1 " )
   );
}
