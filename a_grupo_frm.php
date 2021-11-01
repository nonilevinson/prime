<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Grupo de acesso", Grupo ),
	$this->Pedir( "Call center?",
		[ "", CallCenter, " (os usuários deste Grupo poderão ser selecionados como <b>Call Center</b> nas consultas?)" ] ),
	$this->Pedir( "Médico?",
		[ "", Medico, " (os usuários deste Grupo poderão ser selecionados como <b>Médico</b> nas consultas?)" ] ),
	$this->Pedir( "Assessor?",
		[ "", Assessor, " (os usuários deste Grupo poderão ser selecionados como <b>Assessor</b> nas consultas?)" ] ),
"</table>";
