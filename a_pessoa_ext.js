//----------------------------------------------------------
function sugereApelido( p_nome )
{
   let posicao = p_nome.indexOf( ' ' );
   return posicao == -1 ? p_nome : p_nome.substr(0,posicao);
}

//----------------------------------------------------------
function sugereProntuario()
{
	Lance_ExecutarPhp( 'sugereProntuario(' + g_idRegAtual + ' )', 'a_pessoa_ext', ''  );
	return( false );
}
