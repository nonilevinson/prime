//----------------------------------------------------------
function vijLote()
{
   return( 
      ( g_inserindo ? "A.Ativo = 1 and A.Estoque > 0 and " : "" ) +
      ( g_temMaisDeUmClinica 
         ? "( A.Clinica in (" + g_vetIdClinica + ") ) "
         : "1=1 " )
   );
}
