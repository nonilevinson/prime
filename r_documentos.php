<?php

global $g_debugProcesso, $parQDoc, $g_regDocumento, $g_comLogo, $g_comMarca, $g_comRodape;
$parQDoc = lerParametro( 'parQDoc' );

sql_abrirBD( false );

$queDoc = $parQDoc->DOCMOD;

if( !$queDoc )
	tecleAlgoVolta( "Informe um modelo de documento", true );
else
{
	//* Pega o documento
	$select = "Select D.idPrimario, D.Documento, D.TArqDoc, D.TOrDoc, D.Arquivo, D.Arquivo_arquivo, D.Html,
			D.Imagem_Arquivo, D.Lista, T.Template, D.Logo, D.Marca, D.Rodape, D.NomeArq, D.AltRodape,
			D.MargemEsq, D.MargemDir, D.MargemTop, D.TPapel, D.TOrienta, D.Header, D.Header_Arquivo as arqHeader,
			D.Footer, D.Footer_Arquivo as arqFooter
		From arqDocMod D
			left join arqTemplate T on T.idPrimario=D.Template
		Where D.idPrimario = " . $queDoc;
	$g_regDocumento = sql_lerUmRegistro( $select );
	$g_comLogo      = $g_regDocumento->LOGO;
	$g_comMarca     = $g_regDocumento->MARCA;
	$g_comRodape    = $g_regDocumento->RODAPE;

	if( $g_debugProcesso ) echo "<br><b>GR0 arqDocMod S=</b> ",$select;

	sql_fecharBD();

	$posic = ( $g_regDocumento->TORDOC == 3 ? '_posicional' : '' );
	// if( $g_debugProcesso ) echo '<br><b>GR0 posic=</b> '.$posic.' <b>TARQDOC=</b> '.$g_regDocumento->TARQDOC;

	switch( $g_regDocumento->TARQDOC )
	{
		case 1: //* base é arqPessoa
			$select = "Select P.Nome as Nome_Cliente, P.CPF, P.Identidade, P.Orgao, P.Email as Email_Cliente,
					P.Ende_Endereco as Endereco_Cliente, P.Ende_DDD as DDD, P.Ende_Telefone as Telefone, P.Ende_DDDCelular as DDDCelular,
					P.Ende_Celular as Celular
				From v_arqPessoa P
				Where P.idPrimario = " . navegouDe( 'arqPessoa' );
	if( $g_debugProcesso ) echo '<br><b>GR0 arqPessoa S=</b> '.$select;
			include_once( 'h_docmod_pessoa' . $posic . '.php' );
			break;

		case 2: //* base é arqProposta
			$select = "Select P.Num as Num_Proposta, P.Data, T.Descritor as TSubTipo, A.Descritor as TStProp,
					C.Nome as Nome_Contato, C.Telefone as Telefone_Contato, C.Email as Email_Contato, P.Objeto,
					P.Obs as Observacoes, C.DDDCelular as DDDCelContato, C.Celular as Cel_Contato, PE.Nome as Nome_Cliente,
					UF.Chave as UF_Cliente, PE.Ende_Endereco as Endereco_Cliente, B.Bairro as Bairro_Cliente,
					PE.Ende_CEP as CEP_Cliente, CI.Cidade as Cidade_Cliente, U.Nome as Vendedor, P.idPrimario as idProposta,
					P.Objeto, P.Obs as Observacoes, P.Visita, P.PropPrazo, P.PropEntr, P.PropApro, P.TempoExec, P.PrevIni,
					P.PrevTempo, P.DataIni, P.DataFim, P.RealTempo
				From arqProposta P
					join tabTSubTipo 			 T on  T.idPrimario=P.TSubTipo
					join tabTStProp			 A on  A.idPrimario=P.TStProp
					join arqUsuario			 U on  U.idPrimario=P.Usuario
					join arqPessoa				PE on PE.idPrimario=P.Pessoa
					left join arqContPessoa  C on  C.idPrimario=P.ContPessoa
					left join arqCidade		CI on CI.idPrimario=PE.Ende_Cidade
					left join tabUF			UF on UF.idPrimario=CI.UF
					left join arqBairro		 B on  B.idPrimario=PE.Ende_Bairro
				Where P.idPrimario = " . navegouDe( 'arqProposta' );
	// if( $g_debugProcesso ) echo '<br><b>GR0 arqProposta S=</b> '.$select;
			include_once( 'h_docmod_proposta' . $posic . '.php' );
			break;
	}

	//* tem de ficar após o include
	switch( $g_regDocumento->TPAPEL )
	{
		case 1 : $size = A4; break;
		case 2 : $size = OFICIO; break;
		case 3 : $size = CARTA; break;
		default: $size = A4; break;
	}

	switch( $g_regDocumento->TORIENTA )
	{
		case 1 : $orient = RETRATO; break;
		case 2 : $orient = PAISAGEM; break;
		default: $orient = RETRATO; break;
	}

	if( $posic )
	{
	// if( $g_debugProcesso ) echo "<br><b>GR0 POSICIONAL</b>";
		$proc = new RelDocumento( $orient, $size, $g_regDocumento->DOCUMENTO . '.pdf',
			$g_regDocumento->IMAGEM_ARQUIVO, $g_regDocumento->LISTA );
	}
	else
	{
	// if( $g_debugProcesso ) echo "<br><b>GR0 COMUM</b>";

		if( $g_regDocumento->ARQUIVO )
			lerArquivoTxt( $g_regDocumento->ARQUIVO_ARQUIVO, $txt );
		else
		{
			$txt = $g_regDocumento->HTML;
	// if( $g_debugProcesso ) echo '<br><b>GR0 EHHTML =</b> '.$txt;
		}

		$txt = str_replace( '[[ DOCUMENTO ]]', $txt, $g_regDocumento->TEMPLATE ?: '[[ DOCUMENTO ]]' );
	// if( $g_debugProcesso ) echo '<br><b>GR0 txt=</b> '.$txt;
		$proc = new RelDocumento( $orient, $size, $g_regDocumento->DOCUMENTO . '.pdf', '', $txt );
	}


	if( $g_regDocumento->ARQUIVO )
	{
		$proc->htmlRight  = $g_regDocumento->MARGEMDIR;
		$proc->htmlLeft   = $g_regDocumento->MARGEMESQ;
		$proc->htmlTop    = $g_regDocumento->MARGEMTOP;
		$proc->htmlBottom = $g_regDocumento->ALTRODAPE;
		$proc->htmlHeader = $g_regDocumento->HEADER ? CLIENTE_DIR_BANCO . $g_regDocumento->ARQHEADER : "";
		$proc->htmlFooter = $g_regDocumento->FOOTER ? CLIENTE_DIR_BANCO . $g_regDocumento->ARQFOOTER : "";
	if( $g_debugProcesso ) echo '<br><b>GR0 r_ depois footer=</b> '.$proc->htmlFooter. ' <b>BD=</b>'.CLIENTE_DIR_BANCO;
	}

	$proc->comLogotipo  = $g_comLogo;
	$proc->comData      = false;
	$proc->comCodigoRel = false;
	$proc->comNumPagina = false;

	if( $g_regDocumento->ALTRODAPE )
		$proc->margemRodape = $g_regDocumento->ALTRODAPE;

	$proc->Processar( $select );
}
