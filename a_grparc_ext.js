/*=========================================================================*/
function sugereCamposTratamento()
{
	Lance_ExecutarPhp( 'sugereCamposTratamento( ' + navegouDe( 'arqConsulta' ) + ' )', 'a_grparc_ext', '' );
	return( '' );
}

/*=========================================================================*/
function sugereVezes( p_formaPg, p_qualVezes )
{
	Lance_ExecutarPhp( 'sugereVezes( ' + p_formaPg + ', ' + p_qualVezes + ' )', 'a_grparc_ext', '' );
	return( '' );
}
