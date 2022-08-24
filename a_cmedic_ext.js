//----------------------------------------------------------
function vijLote()
{
   return( 
      ( g_inserindo ? "A.Ativo = 1 and A.Estoque > 0 " : "" ) +
      ( g_temMaisDeUmClinica 
         ? "and ( A.Clinica in (" + g_vetIdClinica + ") ) "
         : "" )
   );
}
