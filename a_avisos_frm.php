<?php

echo
	"<table class='tabFormulario'>",
		$this->Pedir( "Número",
			array( '', Numero,
			array( brHtml(10) . 'Data ', Data,
			array( brHtml(4) . "Hora ", Hora, " (o Aviso só será visto a partir da data e hora informados)" ) ) ) ),
		$this->Pedir( 'Criado por',
			array( '', Quem,
			array( brHtml(6) . 'Prioridade ', Prioridade ) ) ),
		$this->Pedir( 'Assunto' ),
		$this->Pedir( "Em resposta ao Aviso Nº", AvisoPai ),
	"</table>",

	"<br>",
	"<table class='tabFormulario'>",
		$this->Cabecalhos( array( 'Aviso', 'FormCab alinhaMeio' ) ),
		$this->Pedir( '', Texto ),
	"</table>";

global $g_acaoAtual;

//echo "in=",$g_acaoAtual,"=",simNao( $g_acaoAtual );
if( $g_acaoAtual == INSERINDO )
{
	// Número de colunas desejada
	$colunas = 4;

	echo
		javaScriptIni(),
		'function marcarTodos( p_marcar )
		{
			for( var i=0; i<LANCE_FORM.length; i++ )
			{
				var n = LANCE_FORM[i];
				if( n.name.substr( 0, 6 ) == "grupo_" )
					n.checked = p_marcar;
			}
		}',
		javaScriptFim(),

		"<br>",
		"<table class='tabFormulario'>",
			$this->Cabecalhos( array( "Se quiser enviar o Aviso somente para algumas pessoas, deixe Grupos destinatários em branco e grave.
				<br>Depois clique em Para no menu de navegação e informe quantas pessos quiser.", "FormCab alinhaMeio", $colunas*2 ) ),
			$this->Cabecalhos( array( "Grupos destinatários:" . brHtml(5) .
				"<input type='checkbox' manterigual='1' name='todos' onclick='marcarTodos(this.checked)'>Todos",
				'FormCab alinhaMeio', $colunas*2 ) );

	$select = 'select * from arqGrupo';
	$grupos = sql_lerRegistros( $select );

	$indCol = 0;
	foreach( $grupos as $umGrupo )
	{
		if( $indCol == 0 )
			echo "<tr>";
		echo "<td><input type='checkbox' manterigual='1' name='grupo_" . $umGrupo->IDPRIMARIO . "'></td><td>" . $umGrupo->GRUPO . "</td>";
		$indCol++;
		if( $indCol == $colunas )
		{
			echo "</tr>";
			$indCol = 0;
		}
	}
	if( $indCol != 0 )
	{
		for( $i = $indCol; $i < $colunas; $i++ )
			echo "<td>&nbsp;</td><td>&nbsp;</td>";
		echo "</tr>";
	}

	echo "</table>";
}
