<?php

//========================================================
function exibir_Titulo()
{
   echo
	javaScriptIni(),
	'parent.Lance_CabFolheamento( "<br><br>S� crie um registro nesse cadastro '.
      ' para os usu�rios que s� podem manipular dados de determinadas contas correntes<br>'.
		'Para os usu�rios que n�o tem qualquer restri��o, deixe esse cadastro sem registros" );',
	javaScriptFim();
}