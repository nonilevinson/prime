<?php

require_once( LANCE_PHP_ABSOLUTO . 'lance_relatorio_pdf_livre.php' );

class RelConsulta extends Lance_RelatorioPDF_Livre
{
	//------------------------------------------------------------------------
	function valorExtenso( $p_campo )
   {
      return( formatarValor( $p_campo ) . "(" . maiuscula( extensoReal( $p_campo ) ) . ")" );
   }

   //------------------------------------------------------------------------
	function DefinirRelatorio()
	{
		$regA = &$this->regAtual;
      $this->tituloRelatorio = [ 'ANEXO I' ];
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

      $paciente   = $regA->PACIENTE;
      $valPTrata  = $regA->VALPTRATA;
      $entraVal   = $regA->ENTRAVAL;
      $entraParc  = $regA->ENTRAPARC;
      $entraValP  = $regA->ENTRAVALP;
      $entraTotP  = $regA->ENTRATOTP;
      $entraObs   = $regA->ENTRAOBS;
      $saldoParc  = $regA->SALDOPARC;
      $saldoValor = $regA->SALDOVALOR;
      $i1Valor    = $regA->I1VALOR;
      $i2Valor    = $regA->I2VALOR;

      $larg1   = 27;
      $larg2   = 55;
      $larg3   = 15;
      $larg4   = 38;
      $larg5   = 5;
      $altura  = 5;
      $altura2 = $altura + 1;

      //* in�cio dos dados do paciente
		$this->WriteTxt( "1- CONTRATANTE: " . $regA->SIGLA . " " . $regA->PRONTUARIO, 100, [ '', BOLD ] );

      $pdf->Cell( $larg1, $altura, "Nome:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg2, $altura, $paciente, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $pdf->Cell( $larg1, $altura, "CPF:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg2, $altura, formatarCpf( $regA->CPF ), SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg3, $altura, "RG:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_DIR, VAZIO );
      $pdf->Cell( $larg2, $altura, $regA->IDENTIDADE . " " . $regA->ORGAO,
         SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $pdf->Cell( $larg1, $altura, "Sexo:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg2, $altura, $regA->SEXO, SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg3, $altura, "Estado Civil:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_DIR, VAZIO );
      $pdf->Cell( $larg2, $altura, $regA->ESTCIVIL, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $pdf->Cell( $larg1, $altura, "End. Residencial:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg2, $altura, $regA->ENDERECO, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $pdf->Cell( $larg1, $altura, "Bairro:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg2, $altura, $regA->BAIRRO, SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg3, $altura, "Cidade:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_DIR, VAZIO );
      $pdf->Cell( $larg2, $altura, $regA->CIDADE . "/" . $regA->UF, SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg3, $altura, "CEP:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_DIR, VAZIO );
      $pdf->Cell( $larg2, $altura, formatarCep( $regA->CEP ), SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $pdf->Cell( $larg1, $altura, "Nascimento:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg2, $altura, formatarData( $regA->NASCIMENTO ), SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg3, $altura, "Profiss�o:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_DIR, VAZIO );
      $pdf->Cell( $larg2, $altura, $regA->PROFISSAO, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $pdf->Cell( $larg1, $altura, "Celular:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg2, $altura, formatarStr( $regA->NUMCELULAR, '(nn) n.nnnn.nnnn' ), SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg3, $altura, "Telefone:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_DIR, VAZIO );
      $pdf->Cell( $larg2, $altura, $regA->DDD . " " . $regA->TELEFONE, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $pdf->Cell( $larg1, $altura, "Email:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg2, $altura, $regA->EMAIL, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      //* fim dos dados do paciente

      //* in�cio de procedimento e consulta
      $pdf->Cell( $larg2, $altura2, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
		$this->WriteTxt( "2- PROCEDIMENTO E CONSULTA M�DICA", 100, [ '', BOLD ] );
      $pdf->Cell( $larg1, $altura, "Procedimento:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg2, $altura, "TRATAMENTO M�DICO", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $pdf->Cell( $larg1, $altura, "Tempo:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg2, $altura, $regA->TEMPO, SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg3, $altura, "Consulta:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg2, $altura, formatarNum( $regA->NUMCONSULTA ) . "em " .
         formatarData( $regA->DATA ), SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      //* fim de procedimento e consulta

      //* in�cio de pre�os e condi��es
      $pdf->Cell( $larg2, $altura2, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
		$this->WriteTxt( "3- PRE�OS E CONDI��ES A PAGAR", 100, [ '', BOLD ] );

      //? in�cio da entrada
      $pdf->Cell( $larg4, $altura, "Valor total do tratamento: R$" . $this->valorExtenso( $valPTrata ),
         SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $pdf->Cell( $larg2, $altura - 2, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg4, $altura, "Entrada", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg5, $altura, "", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg1, $altura, "Entrada de R$ " . $this->valorExtenso( $entraVal ),
         SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $pdf->Cell( $larg5, $altura, "", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $larg1, $altura, "Forma de pagamento: " . $regA->ENTRAFPG .
         ( $regA->ENTRAPARCE > 0 ? " em " . $regA->ENTRAPARCE . " parcela(s)" : "" ),
         SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      if( $entraTotP )
      {
         $pdf->Cell( $larg5, $altura, "", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
         $pdf->Cell( $larg2, $altura, "Complemento da entrada de R$ " . $this->valorExtenso( $entraTotP ),
            SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

         $pdf->Cell( $larg5, $altura, "", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
         $pdf->Cell( $larg1, $altura, "Forma de pagamento: " . $regA->SDENTRFPG .
            " em " . $entraParc . " parcela(s)",
            SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

         if( $entraObs )
         {
            $pdf->Cell( $larg5, $altura, "", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
            $pdf->Cell( $larg2, $altura, "Observa��es: " . $entraObs,
               SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
         }
      }
      //? fim da entrada

      //? in�cio de intermedi�rias
      if( $i1Valor > 0 )
      {
         $pdf->Cell( $larg2, $altura - 2, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
         $pdf->Cell( $larg4, $altura, "Intermedi�rias", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
         $pdf->Cell( $larg5, $altura, "", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
         $pdf->Cell( $larg1, $altura, "Primeira de R$ " . $this->valorExtenso( $i1Valor ),
            SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
         $pdf->Cell( $larg5, $altura, "", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
         $pdf->Cell( $larg1, $altura, "Forma de pagamento: " . $regA->I1FPG .
            ( $regA->I1PARC > 0 ? " em " . $regA->I1PARC . " parcela(s)" : "" ),
            SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
         
         if( $i2Valor > 0 )
         {
            $pdf->Cell( $larg5, $altura, "", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
            $pdf->Cell( $larg1, $altura, "Segunda de R$ " . $this->valorExtenso( $i2Valor ),
               SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
            $pdf->Cell( $larg5, $altura, "", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
            $pdf->Cell( $larg1, $altura, "Forma de pagamento: " . $regA->I2FPG .
               ( $regA->I2PARC > 0 ? " em " . $regA->I2PARC . " parcela(s)" : "" ),
               SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
         }
      }
      //? fim de intermedi�rias

      //? in�cio do saldo do tratamento
      if( $saldoParc > 0 )
      {
         $pdf->Cell( $larg2, $altura - 2, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
         $pdf->Cell( $larg4, $altura, "Saldo devedor de R$ " . $this->valorExtenso( $saldoValor ) .
            " em " . $saldoParc . " parcela(s)", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

         $pdf->Cell( $larg5, $altura, "", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
         $pdf->Cell( $larg4, $altura, "Forma de pagamento: " . $regA->SALDOFPG,
            SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
         //? fim do saldo do tratamento
         //* fim de pre�os e condi��es
      }

      //* in�cio do recibo
      $pdf->Cell( $larg2, $altura2, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->WriteTxt( "4- RECIBO", 100, [ '', BOLD ] );
      $pdf->Cell( $larg1, $altura, "Recebemos do CONTRATANTE a import�ncia de R$ " .
         $this->valorExtenso( $regA->SUBTOTAL ), SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      if( $entraObs )
         $pdf->Cell( $larg1, $altura, "Observa��es: " . $entraObs, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      //* fim do recibo

      $pdf->Cell( $larg2, $altura2, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
		$this->WriteTxt( "5- DECLARA��O DO CONTRATANTE", 100, [ '', BOLD ] );
		$this->WriteTxt( "Declaro que as informa��es por mim prestadas neste contrato s�o verdadeiras e completas, estando completamente de acordo.", 200 );

      $pdf->Cell( $larg2, $altura2, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
      $this->WriteTxt( "6- ASSINATURAS", 100, [ '', BOLD ] );
      $this->WriteTxt( "Assessor respons�vel: " . $regA->ASSESSOR, 100 );
		$this->WriteTxt( $regA->CIDADECLINICA . ", " . maiuscula( formatarData( HOJE, 'dd de mmm de aaaa' ) ), 100 );

      $largQuem = 14;
      $largSub  = 70;

      $pdf->Cell( $larg2, $altura2 + 5, "", SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
		$pdf->Cell( $largQuem, $altura,  "Paciente:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
		$pdf->Cell( $largSub, $altura,  repete( '_', 35 ), SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
		$pdf->Cell( $largQuem, $altura,  "Cl�nica:", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
		$pdf->Cell( $largSub, $altura,  repete( '_', 47 ), SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );

      $pdf->Cell( $largQuem, $altura, "", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
		$pdf->Cell( $largSub, $altura, " " . $paciente, SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
      $pdf->Cell( $largQuem, $altura, "", SEM_BORDA, NAO_PULA_LINHA, ALINHA_ESQ, VAZIO );
		$pdf->Cell( $largSub, $altura, " " . $regA->RAZAO, SEM_BORDA, PULA_LINHA, ALINHA_ESQ, VAZIO );
		$this->Writeln();
	}
}

//------------------------------------------------------------------------
//	Processamento do relat�rio
//------------------------------------------------------------------------
global $parQSelecao;
$parQSelecao = lerParametro( "parQSelecao" );

$proc = new RelConsulta( RETRATO, A4, 'Contrato.pdf', '' );

$select = "Select L.Sigla, P.Prontuario, P.Nome as Paciente, P.CPF, P.Identidade, P.Orgao, X.Descritor as Sexo,
      V.Descritor as EstCivil, P.Ende_Endereco as Endereco, B.Bairro, I.Cidade, upper( U.Descritor ) as UF,
      P.Ende_CEP as CEP, P.Nascimento, F.Profissao, I.DDD, P.Ende_Telefone as Telefone, P.NumCelular, P.Email,
      C.Data, A.Nome as Assessor, R.PTrata, R.Tempo, FE.FormaPg as EntraFPg, FS.FormaPg as SaldoFPg, C.EntraVal,
      C.EntraParcE, C.EntraParc, C.EntraObs, C.SaldoParc, C.SaldoObs, C.Num as NumConsulta, L.Razao,
      CI.Cidade as CidadeClinica, FD.FormaPg as SdEntrFPg, C.ValPTrata, C.SaldoValor, C.EntraTotP,
      C.I1Valor, C.I1Parc, C.I2Valor, C.I2Parc, F1.FormaPg as I1FPg, F2.FormaPg as I2FPg, C.SubTotal
	From arqConsulta C
		join arqClinica          L on  L.idPrimario=C.Clinica
      join arqPessoa           P on  P.idPrimario=C.Pessoa
      left join tabSexo        X on  X.idPrimario=P.Sexo
      left join tabEstCivil    V on  V.idPrimario=P.EstCivil
      left join arqCidade     CI on CI.idPrimario=L.Ende_Cidade
      left join arqCidade      I on  I.idPrimario=P.Ende_Cidade
      left join tabUF          U on  U.idPrimario=I.UF
      left join arqPTrata      R on  R.idPrimario=C.PTrata
      left join arqUsuario     A on  A.idPrimario=C.Assessor
      left join arqBairro      B on  B.idPrimario=P.Ende_Bairro
      left join arqProfissao   F on  F.idPrimario=P.Profissao
      left join arqFormaPg    FE on FE.idPrimario=C.EntraFPg
      left join arqFormaPg    FD on FD.idPrimario=C.SdEntrFPg
      left join arqFormaPg    FS on FS.idPrimario=C.SaldoFPg
      left join arqFormaPg    F1 on F1.idPrimario=C.I1FPg
      left join arqFormaPg    F2 on F2.idPrimario=C.I2FPg
	Where C.idPrimario = " . navegouDe( 'arqConsulta' );

$proc->Processar( $select );
