<?php

require_once( LANCE_PHP_ABSOLUTO . 'lance_relatorio_pdf_livre.php' );

class RelConsulta extends Lance_RelatorioPDF_Livre
{
   //------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		$regA = &$this->regAtual;
      $this->tituloRelatorio = [ 'Observa��o da consulta' ];
      $this->tituloRelatorioDir = [ [ $regA->SIGLA . " " . $regA->PRONTUARIO, '', BOLD, 20 ],
         ' ', ' ' ];

		$this->comCodigoRel = false;
      $this->comData      = false;
	}

	//------------------------------------------------------------------------
	// Evento B�sico
	//------------------------------------------------------------------------
	function Basico()
	{
		global $g_debugProcesso;

      $regA = &$this->regAtual;
		$pdf = $this->PDF;

      $larg1   = 27;
      $larg2   = 55;
      $larg3   = 15;
      $larg4   = 38;
      $larg5   = 5;
      $altura  = 5;

      //* in�cio dos dados do paciente
		$this->WriteTxt( "1- PACIENTE: " . $regA->SIGLA . " " . $regA->PRONTUARIO, 100, [ '', BOLD ] );

      $this->PDF->Cell( $larg1, $altura, "Nome:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $regA->PACIENTE, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

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
      $this->PDF->Cell( $larg3, $altura, "Profiss�o:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_DIR, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $regA->PROFISSAO, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $this->PDF->Cell( $larg1, $altura, "Celular:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, formatarStr( $regA->NUMCELULAR, '(nn) n.nnnn.nnnn' ), SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      
      if( $regA->TELEFONE )
      {
         $this->PDF->Cell( $larg3, $altura, "Telefone:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_DIR, VAZIO );
         $this->PDF->Cell( $larg2, $altura, $regA->DDD . " " . $regA->TELEFONE, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      }
      else
         $this->PDF->Cell( $larg2, $altura, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      
      $this->PDF->Cell( $larg1, $altura, "Email:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, $regA->EMAIL, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      //* fim dos dados do paciente

      //* in�cio de procedimento e consulta
      $this->PDF->Cell( $larg2, $altura, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
		$this->WriteTxt( "2- CONSULTA M�DICA", 100, [ '', BOLD ] );
      $this->PDF->Cell( $larg1, $altura, "Consulta:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->PDF->Cell( $larg2, $altura, formatarNum( $regA->NUMCONSULTA ) . "em " .
         formatarData( $regA->DATA ), SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      //* fim de procedimento e consulta

      //* in�cio de obs
      $this->PDF->Cell( $larg2, $altura, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
		$this->WriteTxt( "3- OBSERVA��ES", 100, [ '', BOLD ] );
      $this->Write( $regA->OBS );
      //* fim de obs
	}
}

//------------------------------------------------------------------------
//	Processamento do relat�rio
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelConsulta( RETRATO, A4, 'Contrato.pdf', '' );

$select = "Select L.Sigla, P.Prontuario, P.Nome as Paciente, P.CPF, X.Descritor as Sexo, P.Email,
      P.Ende_Endereco as Endereco, B.Bairro, I.Cidade, upper( U.Descritor ) as UF,
      P.Ende_CEP as CEP, P.Nascimento, F.Profissao, I.DDD, P.Ende_Telefone as Telefone, P.NumCelular,
      C.Data, C.Obs, C.Num as NumConsulta
	From arqConsulta C
		join arqClinica          L on  L.idPrimario=C.Clinica
      join arqPessoa           P on  P.idPrimario=C.Pessoa
      left join tabSexo        X on  X.idPrimario=P.Sexo
      left join arqCidade      I on  I.idPrimario=P.Ende_Cidade
      left join tabUF          U on  U.idPrimario=I.UF
      left join arqBairro      B on  B.idPrimario=P.Ende_Bairro
      left join arqProfissao   F on  F.idPrimario=P.Profissao
	Where C.idPrimario = " . navegouDe( 'arqConsulta' );

$proc->Processar( $select );
