<?php

echo
	"<table class='tabFormulario'>",
		$this->Cabecalhos( array( "Dados do envio", "FormCab alinhaMeio", "2" ) ),
		$this->Pedir( "T�tulo", Titulo_Titulo ),
		$this->Pedir( "Vers�o", Titulo ),
		$this->Pedir( "Data",
			array( "", Data,
			array( brHtml(4) . "Hora ", Hora,
			array( brHtml(4) . "In�cio ", HoraIni,
			array( brHtml(4) . "Fim ", HoraFim,
			array( brHtml(4) . "Reenvio ", HoraReenv ) ) ) ) ) ),
		$this->Pedir( "Email remetente", EmailRemet ),
		$this->Pedir( "Usu�rio", Usuario ),
		$this->Pedir( "Enviados",
			array( "", Enviados,
			array( brHtml(4) . "N�o enviados ", NEnviados,
			array( brhtml(4) . "Total ", Total ) ) ) ),
		$this->Pedir( "Lidos",
			array( "", Lidos,
			array( brHtml(4) . "% lidos ", PercLidos ) ) ),

		$this->Pular1Linha(2),
		$this->Cabecalhos( [ "Sele��o para quem", "FormCab alinhaMeio", "2" ] ),
		$this->Pedir( "Paciente", Cliente_Nome ),
		$this->Pedir( " ",
			[ "Celular ", Cliente_NumCelular,
			[ "", Cliente ] ] );
		// $this->Pedir( "Bairro" );

		if( GrupoAtualEm() )
		{
			echo
			$this->Pular1Linha(2),
			$this->Cabecalhos( array( "Para Grupo 0", "FormCab alinhaMeio", "2" ) ),
			$this->Pedir( "Op��o", Opcao ),
			$this->Pedir( "Enviou?", Enviou );
		}
		else
		{
			echo
			$this->NaoPedir( Opcao ),
			$this->NaoPedir( Enviou );
		}

	echo
	"</table>";

?>