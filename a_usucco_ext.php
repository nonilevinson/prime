<?php

//========================================================
function exibir_Titulo()
{
   echo
	javaScriptIni(),
	'parent.Lance_CabFolheamento( "<br><br>Só crie um registro nesse cadastro '.
      ' para os usuários que só podem manipular dados de determinadas contas correntes<br>'.
		'Para os usuários que não tem qualquer restrição, deixe esse cadastro sem registros" );',
	javaScriptFim();
}