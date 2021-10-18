<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Grupo de acesso", Grupo ),
	$this->Pedir( "Call center?",
		[ "", CallCenter, " (os usuários deste Grupo poderão ser selecionados como <b>Call Center</b> nas consultas?)" ] ),
	$this->Pedir( "Call center?",
		[ "", Medico, " (os usuários deste Grupo poderão ser selecionados como <b>Médico</b> nas consultas?)" ] ),
	$this->Pedir( "Call center?",
		[ "", Assessor, " (os usuários deste Grupo poderão ser selecionados como <b>Assessor</b> nas consultas?)" ] ),
"</table>";
