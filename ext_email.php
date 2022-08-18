<?php

set_time_limit( MAX_TEMPO_EXECUCAO );

require_once( LANCE_PHP_ABSOLUTO . 'lance_enviar_emails_html.php' );

//* Da tabela 
define( ANIVERSARIO_CLIENTE,	"1" );

class EmailPadrao extends Lance_EnviarEmails_HTML
{
	//------------------------------------------------------------------------
	function __construct( $p_nomeArqMala='', $p_txt='', $p_from='', $p_fromName='' )
	{
		parent::__construct( $p_nomeArqMala, $p_txt, $p_from, $p_fromNome );

		$this->echoPrompt				= true;	// para saber se mostra echo do Prompt
		$this->emailTeste       	= '';		// Email do remetente para emails de teste
		$this->envioAutomatico  	= true;	// true = emails enviados pelo sistema sem interferencia do usuario (aniversariantes,etc)
		$this->idEmailProgramado	= 0;		// idLogEmail = id do email que o usuário programou para sair
		$this->reenvioEmail			= false;	// true = estou reenviando algum email programado que deu problema
		$this->opcaoEmail       	= 0;		// ultimaLigOpcao() do email que está sendo executado, para gravar no logEmail, se precisar reenviar
	}
	
	//------------------------------------------------------------------------
	function Inicio()
	{
		global $g_debugProcesso, $g_visualizar, $g_idLogEmail, $g_horaIni;

		$agora = formatarHora( AGORA(), 'hh:mm' );
		if( $agora >= '06:00' && $agora < '12:00' )
		{
			$this->sauda_min = "bom dia";
			$this->sauda_mai = "Bom dia";
		}
		elseif( $agora >= '12:00' && $agora < '18:00' )
		{
			$this->sauda_min = "boa tarde";
			$this->sauda_mai = "Boa tarde";
		}
		else
		{
			$this->sauda_min = "boa noite";
			$this->sauda_mai = "Boa noite";
		}

		if( !$g_visualizar )
		{
			if( !$this->ConectouSMTP( false, $this->regEmailRemetente ) )
				return( false );
//if( $g_debugProcesso ) echo '<br><br><b>GRO this->emailTeste=</b> '.$this->emailTeste.' this->idEmailProgramado= '.$this->idEmailProgramado;
			if( !$this->emailTeste )
			{
				if( !$this->idEmailProgramado )
				{
					// INSERT NO ARQLOGEMAIL
					$this->idEmailProgramado = sql_idPrimario();
					$g_idLogEmail = $this->idEmailProgramado;

					sql_insert( "arqLogEmail", [
						"idPrimario" => $this->idEmailProgramado,
						"Titulo"     => $this->idAcaoEnviar,
						"Data"       => formatarData( HOJE, 'mm/dd/aaaa' ),
						"Hora"       => AGORA,
						"Usuario"    => ( $this->envioAutomatico ? null : USUARIO_ATUAL ),
						"Enviados"   => 0,
						"NEnviados"  => 0,
						"Lidos"      => 0,
						"EmailRemet" => '',
						"HoraIni"    => AGORA(),
						"Enviou"     => 0,
						"Opcao"      => $this->opcaoEmail ] );

					sql_commit();
				}

				$insert = "Insert into arqItLogEmail VALUES ( ?, " . $this->idEmailProgramado . 
					", ?, ?, ?, null, null, null )";
				$this->insertItLog = ibase_prepare( $insert );
			}
		}
	}

	//------------------------------------------------------------------------
	function Fim()
	{
		global $g_debugProcesso, $g_visualizar;

		if( !$g_visualizar )
		{
			if( $this->emailTeste == 'noni@kogumelo.com' )
				$this->comSupervisor = false;
			else
				$this->txtEmailSemRodape .= "<br>USUARIO= ". USUARIO_LOGIN;

			$this->DesconectarSMTP();

			if( $this->enviaDestinatario )
			{
				if( $this->emailTeste )
				{
					//* UPDATE NO ARQUIVO DE CONTAGEM DE TESTES
					sql_update( "arqAcaoEmail", [
							"QtdTeste" => sql_forcarNumerico( "QtdTeste + 1" ) ],
						"idPrimario = " . $this->acaoAtual->IDACAOATUAL );
					sql_commit();
				}
				else
				{
					//* UPDATE NO ARQLOGEMAIL
					$agoraFim = AGORA();
					$update = "Update arqLogEmail set Enviados=" . ( $this->qtdOk ? $this->qtdOk : "0") . 
							", NEnviados=" . ( $this->qtdErro ? $this->qtdErro : "0" ) . 
							", EmailRemet = '" . $this->regEmailRemetente->EMAIL . 
							"', HoraFim = '" . $agoraFim . 
							( $this->reenvioEmail ? "', HoraReenv = '" . $agoraFim . "'" : "'" ) .
						" Where idPrimario=" . $this->idEmailProgramado;
//if( $g_debugProcesso ) echo '<br> UPDATE LOGEMAIL = ' . $update;
					sql_executarComando( $update );
					sql_commit();
				}
			}
		}
if( $g_debugProcesso ) echo '<br><br> FIM ÀS '.formatarHora( AGORA(), 'hh:mm' );		
		if( $this->envioAutomatico )
			$this->idEmailProgramado= 0;
	}

	//------------------------------------------------------------------------
	function EmailParaQuem()
	{
		$regA= &$this->regAtual;
		$this->idCliente = $regA->IDCLIENTE > 0 ? $regA->IDCLIENTE : null;;
		$this->emailPara = '';
	}

	//------------------------------------------------------------------------
	// Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{	
		global $g_debugProcesso, $g_idPadraoAcao, $g_visualizar;
		$regA = &$this->regAtual;
		
		$idItemLogEmail = sql_idPrimario();
		
		//* envia destinatario
$teste = false;
		if( $teste )
		{
			echo '<br><center><b><font size="8">EM TESTE</font></b></center>';
			$ok = 1;
		}
		else
			$ok = $this->Enviar1Email( $idItemLogEmail, tiraBr($regA->EMAIL), $regA->APELIDO, $regA->SEXO ); 
if( $g_debugProcesso ) echo '<br>ext_email BASICO APELIDO= '.$regA->APELIDO.' EMAIL= '.$regA->EMAIL.' ok= '.$ok.' > '.simNao($ok).'<br>';

		/* echo na tela DOS do server, quando envio por uma task
			o $this->comMensagem fica TRUE quando é para dar mensagens na tela do usario final 
			logo, quando é FALSE, é porque é de chamada de BAT */
		if( $this->echoPrompt && ( !$this->comMensagem && !$this->emailTeste && !$g_visualizar ) )
			echo $this->indRegAtual, "/", $this->qtdRegistros, " - ", $regA->EMAIL, " - ", simNao( $ok ), "\n";

		if( $this->enviaDestinatario  &&  !$this->emailTeste )
		{
			$this->EmailParaQuem();
/*
$ok=1;
echo "<br>INSERT INTO arqItLogEmail VALUES ( " . $idItemLogEmail. ", " . $this->idEmailProgramado . 
	", ".$this->idCliente.", '".$regA->EMAIL."', ".$ok.", null, null, null )";
*/
			ibase_execute( $this->insertItLog, $idItemLogEmail, $this->idCliente, $regA->EMAIL, $ok );			
			sql_commit();			
		}
	}

	//------------------------------------------------------------------------
	// Processa o email desejado para todas as empresas
	//		$p_idPadraoAcao - qual dos padrões de email automático deve ser enviado (ainda que manualmente) = idPrimario da tabela TABPADRAOACAO
	//		$p_idAcaoEnviar - se não tiver o padrão, qual o idPrimario da ação que foi selecionada para ser disparada
	//				idPadraoAcao e idAcaoEnviar sao mutuamente exclusivos
	//------------------------------------------------------------------------
	function GerarEmail( $p_idPadraoAcao, $p_idAcaoEnviar, $p_select )
	{
		global $g_debugProcesso, $parQSelecao, $parQBoleto, $g_horaIni, $g_visualizar, $g_idPadraoAcao;
//if( $g_debugProcesso ) echo '<br><br><b>GRO Ext_email p_select=</b> '.$p_select.'<br>';
		$g_idPadraoAcao = $p_idPadraoAcao;
		$g_horaIni = AGORA();

		if( $this->idEmailProgramado ) 
			$this->envioAutomatico = true;

		sql_abrirBD( false );

		$ativo = $g_visualizar ? "" : " and A.Ativo = 1";
		$this->enviaDestinatario = !$g_visualizar;

		if( $g_idPadraoAcao )
		{
			$select = "Select idPrimario 
				From arqAcaoEmail 
				Where Ativo = 1 and PadraoAcao = " . $g_idPadraoAcao;
			$this->idAcaoEnviar = sql_lerUmRegistro( $select )->IDPRIMARIO;
//if( $g_debugProcesso ) echo '<br><b>g_idPadraoAcao >> EMAIL SEL=</b> '.$select.' <b>this->idAcaoEnviar=</b> '.$this->idAcaoEnviar;
		}
		else
			$this->idAcaoEnviar = $p_idAcaoEnviar;
//if( $g_debugProcesso ) echo '<br><b>p_idAcaoEnviar=</b> '.$p_idAcaoEnviar.' <b>this->idAcaoEnviar=</b> '.$this->idAcaoEnviar;
		
		if( $this->idAcaoEnviar )
		{
			$select = "Select idPrimario as idEmailRemet, Email, NomeEmail 
				From arqEmailRemet 
				Where Padrao = 1";
			$regEmailRemet = sql_lerUmRegistro( $select );

			$this->idEmailRemetente = $this->envioAutomatico 
				? $regEmailRemet->IDEMAILREMET 
				: $parQSelecao->EMAILREMET;
//if( $g_debugProcesso ) echo "<br>REMETENTE = ",$regEmailRemet->EMAIL, "<br>", $select.'<br>';
//if( $g_debugProcesso ) echo '<br>envioAutomatico= '.simNao($this->envioAutomatico).' idEmailProgramado= '.$this->idEmailProgramado.' EREMET= '.$parQSelecao->EREMET;
//if( $g_debugProcesso ) echo '<br>this->idEmailRemetente= '.$this->idEmailRemetente.'<br>';
				
			if( !$regEmailRemet->EMAIL )
			{
				sql_fecharBD();
				return;
			}
			
			$this->regEmailRemetente = $regEmailRemet;

			$select = "Select a.idPrimario as idAcaoAtual, A.PadraoAcao as idPadraoAcao,
					T.Chave as PadraoAcao, A.Titulo
				From arqAcaoEmail A 
					left join tabPadraoAcao T on T.idPrimario=A.PadraoAcao
				Where " .
					( $p_idAcaoEnviar ? "A.idPrimario = " . $p_idAcaoEnviar : '' ) .
					( $p_idAcaoEnviar && $g_idPadraoAcao ? " and " : "" ) .
					( $g_idPadraoAcao ? "A.PadraoAcao = " . $g_idPadraoAcao : '' ) .
					" and A.Ativo = 1";
			$regAcoesEnviar = sql_lerRegistros( $select );
//if( $g_debugProcesso ) echo '<br>ACAOEMAIL S= '.$select;			
			foreach( $regAcoesEnviar as $umaAcaoEnviar )
			{
				$this->acaoAtual = $umaAcaoEnviar;

				$this->PrepararEmailPadrao( 
					$umaAcaoEnviar->IDACAOATUAL, 
					"Select A.idPrimario, A.Arquivo, A.Arquivo_Arquivo, 
							case when( A.TipoAcao = 2 ) then ( A.HTML ) else ( '' ) end as HTML, 
							A.Titulo, A.Imagem_Arquivo, A.ImagemAlt as Imagem_Alt, T.Template, A.Link
						From arqAcaoEmail A
							left join arqTemplate 	T on T.idPrimario=A.Template
						Where A.Ativo = 1 and A.idPrimario = " . $umaAcaoEnviar->IDACAOATUAL,
					"Select C.NumImg, C.Imagem_Arquivo, C.Link, C.Nome as Imagem_Alt
						From arqImagemCRM C 
						Where C.AcaoEmail = " . $umaAcaoEnviar->IDACAOATUAL,
					$regEmailRemet->EMAIL, $regEmailRemet->NOMEEMAIL );
//if( $g_debugProcesso ) echo '<br>IDACAO= '.$umaAcaoEnviar->IDACAOATUAL;
//if( $g_debugProcesso ) echo "<br>ENVIO AUTOMATICO? ", simNao($this->envioAutomatico );

//if( $g_debugProcesso ) echo "<br>PROCESSAR ACAO= <b>",$umaAcaoEnviar->TITULO,"</b><br>", str_replace( '?', $umaEmpresa->IDEMPRESAATUAL, $p_select ) . ' ||<<';
				$this->Processar( $p_select, false, true );
			}			
		}
		
		sql_fecharBD();
	}
}
