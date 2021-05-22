<?php

	echo
	"<table class='tabFormulario'>",
		$this->Pedir( "Documento",
			[ "", Documento,
			[ brHtml(4) . "Ativo? ", Ativo ] ] ),
		$this->Pedir( "Arquivo base", TArqDoc ),
		$this->Pedir( "Tipo", TOrDoc ),
		$this->Pedir( "Tamanho do papel",
			[ "", TPapel,
			[ brHtml(4) . "Orientação ", TOrienta ] ] ),
		$this->Pedir( "Imprimir",
			[ "Logo? ", Logo ] ),
		$this->Pedir( " ",
			[ "Marca D`água? ", Marca,
			[ brHtml(4) . "Nome do arquivo ", NomeArq, " (opcional)" ] ] ),
		$this->Pedir( " ",
			[ "Rodape? ", Rodape,
			[ brHtml(4) . "Altura ", AltRodape, " (opcional)" ] ] ),
		$this->Pedir( "Margens",
			[ "Topo ", MargemTop,
			[ brHtml(4) . "Esquerda ", MargemEsq,
			[ brHtml(4) . "Direita ", MargemDir ] ] ] ),
		$this->Pedir( "Template" ),
	"</table>",

		CriarForms(
			[ 'HTML', 'H', true ],
			[ 'Lista', 'L', true ],
			[ 'Imagem', 'I', true ],
			[ 'Arquivo', 'A', true ] ),

	"<table id='H' class='tabFormulario' style='display:none'>",
		$this->Cabecalhos( [ "HTML", "FormCab alinhaMeio" ] ),
		$this->Pedir( "", [ "", Html, "", "FormValor alinhaMeio" ] ),
	"</table>",

	"<table id='L' class='tabFormulario' style='display:none'>",
		$this->Cabecalhos( [ "Lista", "FormCab alinhaMeio" ] ),
		$this->Pedir( "", [ "", Lista, "", "FormValor alinhaMeio" ] ),

		$this->Pular1Linha(2),
		$this->Cabecalhos( [ "Tutorial", "FormCab alinhaMeio" ] ),
		$this->Cabecalhos( [
			'A lista de campos posiciona por sobre a imagem, um campo por linha, no formato:<br><br>
			<center><b>&lt;Dado&gt; | &lt;x&gt; | &lt;y&gt; | &lt;nomeFonte&gt; | &lt;estiloFonte&gt; | &lt;tamanhoFonte&gt; | &lt;corLetra&gt; | &lt;corFundo&gt;</b></center><br>
			onde:<br>
			<style>
				#dado td{ border: 1px solid #777777 }
				#dado th{ background-color:#e7e7e7; text-align:left; border: 1px solid #777777 }
			</style>
			<center>
			<table id="dado" style="font-size:12px; border:1px solid black;" cellpadding="3" csllspacing="3" width="90%">
			<tr><th>Dado</th><td>Obrigatório</td><td>Texto a ser impresso, podendo ser [[NOMECAMPO]] ou um texto livre fixo<br>
			O nome do campo pode ser um dos que compõem a base de dados dos associados ou<br> um adicional criado somente para compor documentos especiais:<br>
			[[CAMPO]] - nome de um dos campos da base de dados<br>
			[[CADn /* Nome */]] - campo para textos curtos, de uma só linha até 100 caracteres<br>
			[[TXTn /* Nome */]] - campo para textos longos, com mais de uma linha<br>
			"n" indica 1 a 20, como CAD1, CAD2, CAD3 ou CAD4, que não podem se repetir no mesmo documento<br>
			/* Nome */ indica o texto conforme o campo será apresentado para o usuário preencher na tela que antecede a emissão
			</td></tr>
			<tr><th>x</th><td>Obrigatório</td><td>posição X (lateral, a partir da esquerda) do texto a ser impresso</td></tr>
			<tr><th>y</th><td>Obrigatório</td><td>posição Y (vertical, a partir do topo) do texto a ser impresso</td></tr>
			<tr><th>nomeFonte</th><td>Opcional</td><td>nome do fonte (Verdana, Arial, etc) em que o texto será impresso ou o texto fixo "HTML", sem os demais campos, indicando que os dados devem ser interpretados seguindo a lógica dos comandos html</td></tr>
			<tr><th>estiloFonte</th><td>Opcional</td><td>BOLD / ITALIC / UNDERLINE</td></tr>
			<tr><th>tamanhoFonte</th><td>Opcional</td><td>tamanho do fonte em pixels</td></tr>
			<tr><th>corLetra</th><td>Opcional</td><td>cor das letras, no formato "( N°Vermelho, N°Verde, N°Azul )" - "N°" varia de 0 (ausência da cor) a 255 (plena cor). Exemplos:
			<br>(255,0,0) = 100% Vermelho;
			<br>(255,255,0) = 100% Vermelho + 100% Verde = Amarelo</td></tr>
			<tr><th>corFundo</th><td>Opcional</td><td>cor de fundo das letras, no mesmo formato de "corLetra"</td></tr>
			</table>
			</center><br>
			Exemplos:<br><br>
			<b>[[NOME]] | 50 | 130</b> -> Escreve o campo NOME na posição (50,130) da imagem<br><br>
			<b>[[TELEFONE]] | 80 | 134 | | BOLD | 20 | (0,0,70) | (255,255,0)</b> -> Escreve o campo TELEFONE na posição (80,134) da imagem, sem mexer no nome da fonte, Negrito, tamanho 20, em Azul/70<br>de cor da letra e Amarelo de cor de fundo<br><br>
			<b>Prezado Sr. &lt;b&gt;[[NOME]]&lt;/b&gt; | 0 | 200 | HTML</b> -> Escreve "Prezado Sr. <b>NOME_DA_PESSOA</b>", substituindo pelo nome real e em negrito, na posição (0,200) da imagem<br>

			<!--b>[[CAD1 /* Placa do veículo */]] | 40 | 80</b> -> Pede para o usuário preencher um campo de até 100 caracteres, sob o nome "Placa do veículo", e o insere na posição (40,80) da imagem<br><br>
			<b>[[CAD2 /* Protocolo */]] | 40 | 85</b> -> Pede para o usuário preencher um outro campo de até 100 caracteres, sob o nome "Protocolo", e o insere na posição (40,85) da imagem<br><br>
			<b>[[TXT1 /* Alegação */]] | 43 | 95</b> -> Pede para o usuário preencher um texto longo, sob o nome "Alegação", e o insere na posição (43,95) da imagem<br--><br>',
			"FormValor alinhaEsq" ] ),
	"</table>",

	"<table id='I' class='tabFormulario' style='display:none'>",
		$this->Cabecalhos( [ "Imagem", "FormCab alinhaMeio" ] ),
		$this->Pedir( "", [ "", Imagem, "", "FormValor alinhaMeio" ] ),
	"</table>",

	"<table id='A' class='tabFormulario' style='display:none'>",
		$this->Cabecalhos(
				[ "Cabecalho", "FormCab alinhaMeio" ],
				[ "Arquivo", "FormCab alinhaMeio" ],
				[ "Rodapé", "FormCab alinhaMeio" ] ),
		$this->Pedir( "",
			[ "", Header, "", "FormValor alinhaMeio" ],
			[ "", Arquivo, "", "FormValor alinhaMeio" ],
			[ "", Footer, "", "FormValor alinhaMeio" ] ),
	"</table>",

SelecionarForm();
