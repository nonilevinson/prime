<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Grupo de acesso", Grupo ),
	$this->Pedir( "Call center?",
		[ "", CallCenter, " (os usu�rios deste Grupo poder�o ser selecionados como <b>Call Center</b> nas consultas?)" ] ),
	$this->Pedir( "Call center?",
		[ "", Medico, " (os usu�rios deste Grupo poder�o ser selecionados como <b>M�dico</b> nas consultas?)" ] ),
	$this->Pedir( "Call center?",
		[ "", Assessor, " (os usu�rios deste Grupo poder�o ser selecionados como <b>Assessor</b> nas consultas?)" ] ),
"</table>";
