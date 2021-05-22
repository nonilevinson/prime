<?php

//======================================================================
function ext_filtrarTodos()
{
	if( GrupoAtualEm() || PodeExecutarOperacao(1) )
		$idAvisos = "";
	else
	{
		sql_abrirBD( false );

		$select = "Select P.Avisos
			From arqParaGrupo P
			Where P.Grupo = " . GRUPO_ATUAL .

			" UNION

			Select L.Avisos
			From arqLido L
			Where L.Usuario = " . USUARIO_ATUAL .

			" Order by 1";
		$reg = sql_lerRegistros( $select );
//echo '<br>S= '.$select.'<br>'; print_r($reg);
		sql_fecharBD();

		foreach( $reg as $umReg )
			$idAvisos .= $umReg->AVISOS . ", ";

		$idAvisos = "A.idPrimario in( " . substr( $idAvisos, 0, -2 ) . " ) and ";
	}
//echo '<br>idAvisos= '.$idAvisos;
		return( $idAvisos . " AvisoPai is null" );
}
