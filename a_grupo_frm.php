<?php

echo
"<table class='tabFormulario'>",
	$this->Pedir( "Grupo de acesso", Grupo ),
	$this->Pedir( "Call center?",
		[ "", CallCenter, " (os usu�rios deste Grupo poder�o ser selecionados como <b>Call Center</b> nas consultas?)" ] ),
	$this->Pedir( "M�dico?",
		[ "", Medico, " (os usu�rios deste Grupo poder�o ser selecionados como <b>M�dico</b> nas consultas?)" ] ),
	$this->Pedir( "Assessor?",
		[ "", Assessor, " (os usu�rios deste Grupo poder�o ser selecionados como <b>Assessor</b> nas consultas?)" ] ),

	$this->Pular1Linha(2),
	$this->Cabecalhos( [ "Avisos Internos", 'FormCab alinhaMeio', '2' ] ),
	$this->Pedir( "Agendar retirada?", AvRetira ),
"</table>";
