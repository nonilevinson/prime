<?php

//======================================================================
function MovAberto()
{
	$idMovEstoque = navegouDe( 'arqMovEstoque' );

	if( $idMovEstoque )
	{
		sql_abrirBD( false );
		$select = 'Select Fechado
			From arqMovEstoque
			Where IdPrimario=' . $idMovEstoque;
		$reg = sql_lerUmRegistro( $select );
//echo '<br>arqMovEstoque S= '.$select.' > '.simNao($reg->FECHADA);
		sql_fecharBD();
		return( $reg->FECHADO );
	}

	return( 0 );
}
