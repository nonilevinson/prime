<?PHP

require_once( LANCE_PHP_ABSOLUTO . 'lance_relatorio_pdf_livre.php' );

class RelConsulta extends Lance_RelatorioPDF_Livre
{
	//------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		$regA = &$this->regAtual;
      $this->tituloRelatorioDir = [ [ $regA->SIGLA . " " . $regA->PRONTUARIO, '', BOLD, 20 ],
         ' ' ];

		// $this->DefinirXYIniciais( [25, 28] );

		$this->comCodigoRel = false;
      $this->comData      = false;
	}

	//------------------------------------------------------------------------
	// Evento Básico
	//------------------------------------------------------------------------
	function Basico()
	{
		$regA = &$this->regAtual;
		$pdf = $this->PDF;

      $paciente = $regA->PACIENTE;
      $cidade   = $regA->CIDADE;

      $larg1  = 27;
      $larg2  = 55;
      $larg3  = 15;
      $larg4  = 38;
      $altura = 5;

      //* início dos dados do paciente
		// $this->WriteTxt( "CONTRATANTE: " . $regA->SIGLA . " " . $regA->PRONTUARIO, 100, [ '', BOLD, 0, [0], [195] ] );
		$this->WriteTxt( "1- CONTRATANTE: " . $regA->SIGLA . " " . $regA->PRONTUARIO, 100, [ '', BOLD ] );

      $this->PDF->Cell( $larg1, $altura, "Nome:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $paciente, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $this->PDF->Cell( $larg1, $altura, "CPF:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, formatarCpf( $regA->CPF ), SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg3, $altura, "RG:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_DIR, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $regA->IDENTIDADE . " " . $regA->ORGAO,
         SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $this->PDF->Cell( $larg1, $altura, "Sexo:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $regA->SEXO, SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg3, $altura, "Estado Civil:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_DIR, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $regA->ESTCIVIL, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $this->PDF->Cell( $larg1, $altura, "End. Residencial:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $regA->ENDERECO, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $this->PDF->Cell( $larg1, $altura, "Bairro:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $regA->BAIRRO, SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg3, $altura, "Cidade:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_DIR, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $regA->CIDADE . "/" . $regA->UF, SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg3, $altura, "CEP:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_DIR, VAZIO );
      $this->PDF->Cell( $larg2, $altura, formatarCep( $regA->CEP ), SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $this->PDF->Cell( $larg1, $altura, "Nascimento:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, formatarData( $regA->NASCIMENTO ), SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg3, $altura, "Profissão:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_DIR, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $regA->PROFISSAO, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $this->PDF->Cell( $larg1, $altura, "Celular:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, formatarStr( $regA->NUMCELULAR, '(nn) n.nnnn.nnnn' ), SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg3, $altura, "Telefone:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_DIR, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $regA->DDD . " " . $regA->TELEFONE, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $this->PDF->Cell( $larg1, $altura, "Email:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $regA->EMAIL, SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      //* fim dos dados do paciente
       
      //* início de procedimento e consulta
      $this->PDF->Cell( $larg2, $altura * 2, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
		$this->WriteTxt( "2- PROCEDIMENTO E CONSULTA", 100, [ '', BOLD ] );
      $this->PDF->Cell( $larg4, $altura, "Procedimento Contratado:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $regA->PTRATA, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $this->PDF->Cell( $larg1, $altura, "Tempo:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, '$regA->ZZZ', SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg1, $altura, "Consulta Médica:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, formatarData( $regA->DATA ), SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      //* fim de procedimento e consulta
      
      //* início de preços e condições
      $this->PDF->Cell( $larg2, $altura * 2, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );	
		$this->WriteTxt( "3- PREÇOS E CONDIÇÕES A PAGAR", 100, [ '', BOLD ] );
      $this->PDF->Cell( $larg4, $altura, "Entrada / Intermediárias em " . '$regA->XXX',
         SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      
      $this->PDF->Cell( $larg1, $altura, "Assessor:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $regA->ASSESSOR, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      //* fim de preços e condições
      
      $this->PDF->Cell( $larg2, $altura * 2, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
		$this->WriteTxt( "4- DECLARAÇÃO DO CONTRATANTE", 100, [ '', BOLD ] );
		$this->WriteTxt( "Declaro que as informações por mim prestadas neste contrato são verdadeiras e completas, estando completamente de acordo.", 121 );
		
      $this->PDF->Cell( $larg2, $altura * 2, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->WriteTxt( "5- ASSINATURA", 100, [ '', BOLD ] );
		$this->WriteTxt( $cidade . ", " . maiuscula( formatarData( HOJE, 'dd de mmm de aaaa' ) ), 100 );
		$this->Writeln();
		$this->PDF->Cell( $larg1, $altura,  "Assinatura:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
		$this->PDF->Cell( $larg2, $altura,  repete( '_', 40 ), SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
		$this->PDF->Cell( $larg1, $altura,  "", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
		$this->PDF->Cell( $larg2, $altura,  $paciente, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
		$this->Writeln();
	}
}

//------------------------------------------------------------------------
//	Processamento do relatório
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelConsulta( RETRATO, A4, 'Contrato.pdf', '' );

$filtro = substr(
		filtrarPorIntervaloData( "A.Data", $parQSelecao->DATAINI, $parQSelecao->DATAFIM ) .
		filtrarPorIntervalo( "A.Numero", $parQSelecao->GRAN6, $parQSelecao->GRAN6FIM ), 0, -4 );

$select = "Select L.Sigla, P.Prontuario, P.Nome as Paciente, P.CPF, P.Identidade, P.Orgao, X.Descritor as Sexo,
      V.Descritor as EstCivil, P.Ende_Endereco as Endereco, B.Bairro, I.Cidade, upper( U.Descritor ) as UF,
      P.Ende_CEP as CEP, P.Nascimento, F.Profissao, I.DDD, P.Ende_Telefone as Telefone, P.NumCelular, P.Email,
      C.Data, A.Nome as Assessor, R.PTrata
	From arqConsulta C
		join arqClinica         L on L.idPrimario=C.Clinica
      join arqPessoa          P on P.idPrimario=C.Pessoa
      left join tabSexo       X on X.idPrimario=P.Sexo
      left join tabEstCivil   V on V.idPrimario=P.EstCivil
      left join arqCidade     I on I.idPrimario=P.Ende_Cidade
      left join tabUF         U on U.idPrimario=I.UF
      left join arqPTrata     R on R.idPrimario=C.PTrata
      left join arqUsuario    A on A.idPrimario=C.Assessor
      left join arqBairro     B on B.idPrimario=P.Ende_Bairro
      left join arqProfissao  F on F.idPrimario=P.Profissao
	Where C.idPrimario = " . navegouDe( 'arqConsulta' );

$proc->Processar( $select );
