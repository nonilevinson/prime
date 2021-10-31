<?php

//==================================================================
function sugereFornecedor()
{
	sql_abrirBD( false );
   
   $select = "Select F.idPrimario as idFornecedor, F.Nome
		From cnfXConfig X
         join arqFornecedor F on F.idPrimario=X.FornRec";
	$umXConfig = sql_lerUmRegistro( $select );
echo '<br><b>cnfXConfig S=</b> '.$select;

   sql_fecharBD();
   
	echo
		javaScriptIni(),
		'with( parent ) {
			alt( Fornecedor_Nome, \'' . $umXConfig->NOME . '\' );
			alt( Fornecedor, ' . $umXConfig->IDFORNECEDOR . ' );
         console.warn( \'NOME= \'+\''.$umXConfig->NOME.'\');
		}',
		javaScriptFim();
}
