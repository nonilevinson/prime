/*=========================================================================*/
function sugereValor()
{
	Lance_ExecutarPhp( 'sugereValor( ' + navegouDe( 'arqConsulta' ) + ' )', 'a_grparc_ext', '' );
	return( '' );
}

/*=========================================================================*/
function sugereValorOLD( p_valorParc, p_valorCN )
{
	Lance_ExecutarPhp( 'sugereValor(' + p_valorParc + ', ' + p_valorCN + ' )', 'a_grparc_ext', '' );
	return( '' );
}

/*=========================================================================*/
/*
function sugereNumConta( p_loja, p_fonte, p_cliente, p_confere )
{
	Lance_ExecutarPhp( 'sugereNumConta(' + p_loja + ', ' + p_fonte + ', ' + p_cliente + ', ' +
		p_confere + ' )', 'a_grparc_ext', '' );
	return( '' );
}
*/