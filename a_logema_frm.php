<?php

echo
	"<table class='tabFormulario'>",
		$this->Cabecalhos( array( "Dados do envio", "FormCab alinhaMeio", "2" ) ),
		$this->Pedir( "Título", Titulo_Titulo ),
		$this->Pedir( "Versão", Titulo ),
		$this->Pedir( "Data",
			array( "", Data,
			array( brHtml(4) . "Hora ", Hora,
			array( brHtml(4) . "Início ", HoraIni,
			array( brHtml(4) . "Fim ", HoraFim,
			array( brHtml(4) . "Reenvio ", HoraReenv ) ) ) ) ) ),
		$this->Pedir( "Email remetente", EmailRemet ),
		$this->Pedir( "Usuário", Usuario ),
		$this->Pedir( "Enviados",
			array( "", Enviados,
			array( brHtml(4) . "Não enviados ", NEnviados,
			array( brhtml(4) . "Total ", Total ) ) ) ),
		$this->Pedir( "Lidos",
			array( "", Lidos,
			array( brHtml(4) . "% lidos ", PercLidos ) ) ),

		$this->Pular1Linha(2),
		$this->Cabecalhos( [ "Seleção para quem", "FormCab alinhaMeio", "2" ] ),
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
			$this->Pedir( "Opção", Opcao ),
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