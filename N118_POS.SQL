alter table arqLanceLogAcesso
alter idPrimario position 1,
alter Status position 2,
alter Master position 3,
alter Login position 4,
alter Acesso position 5,
alter Data position 6,
alter Hora position 7,
alter Perfil position 8,
alter Usuario position 9,
alter IP position 10,
alter Operacao position 11,
alter Quem position 12,
alter IdQuem position 13,
alter OperProc position 14,
alter Observacao position 15,
alter Campo position 16,
alter Antes position 17,
alter Depois position 18;
commit;

alter table arqLanceRegMarca
alter idPrimario position 1,
alter Arquivo position 2,
alter Registro position 3,
alter Tipo position 4,
alter Perfil position 5,
alter Usuario position 6;
commit;
	
alter table arqLanceAssunto
alter idPrimario position 1,
alter Assunto position 2;
commit;

alter table arqLanceOperacao
alter idPrimario position 1,
alter Tipo position 2,
alter Operacao position 3,
alter Arquivo position 4,
alter Numero position 5,
alter Assunto position 6,
alter SoZero position 7,
alter Visivel position 8;
commit;

/************************************************************
	Arquivo Bairro    
************************************************************/

ALTER TABLE arqBairro
alter IDPRIMARIO position 1,
alter BAIRRO position 2;
commit;


/************************************************************
	Arquivo Cidade    
************************************************************/

ALTER TABLE arqCidade
alter IDPRIMARIO position 1,
alter UF position 2,
alter CIDADE position 3,
alter DDD position 4;
commit;


/************************************************************
	Arquivo Grupo     
************************************************************/

ALTER TABLE arqGrupo
alter IDPRIMARIO position 1,
alter GRUPO position 2,
alter CALLCENTER position 3,
alter MEDICO position 4,
alter ASSESSOR position 5;
commit;


/************************************************************
	Arquivo Usuario   
************************************************************/

ALTER TABLE arqUsuario
alter IDPRIMARIO position 1,
alter USUARIO position 2,
alter NOME position 3,
alter SENHA position 4,
alter GRUPO position 5,
alter VERSAO position 6,
alter EMAIL position 7,
alter CRM position 8,
alter PODEAGENDA position 9,
alter ATIVO position 10,
alter NASCIMENTO position 11,
alter FOTO position 12,
alter FOTO_ARQUIVO  position 13,
alter EMAILACES position 14,
alter EMAILACESS position 15,
alter EMAILFINAN position 16,
alter EMCMEDISEP position 17;
commit;


/************************************************************
	Arquivo Pessoa    
************************************************************/

ALTER TABLE arqPessoa
alter IDPRIMARIO position 1,
alter NOME position 2,
alter APELIDO position 3,
alter NUMCELULAR position 4,
alter PRONTUARIO position 5,
alter ENDE_CEP position 6,
alter ENDE_ENDERECO position 7,
alter ENDE_BAIRRO position 8,
alter ENDE_CIDADE position 9,
alter ENDE_DDD position 10,
alter ENDE_TELEFONE position 11,
alter ENDE_DDDCELULAR position 12,
alter ENDE_CELULAR position 13,
alter ENDE_WHATSAPP position 14,
alter NASCIMENTO position 15,
alter IDADE position 16,
alter SEXO position 17,
alter ESTCIVIL position 18,
alter PROFISSAO position 19,
alter CPF position 20,
alter IDENTIDADE position 21,
alter ORGAO position 22,
alter EMISSAO position 23,
alter EMAIL position 24,
alter RECEMAIL position 25,
alter ATIVO position 26,
alter OBS position 27,
alter DESDE position 28,
alter QTODESMAR position 29,
alter MIDIA position 30;
commit;


/************************************************************
	Arquivo Template  
************************************************************/

ALTER TABLE arqTemplate
alter IDPRIMARIO position 1,
alter NOME position 2,
alter TEMPLATE position 3;
commit;


/************************************************************
	Arquivo EmailRemet
************************************************************/

ALTER TABLE arqEmailRemet
alter IDPRIMARIO position 1,
alter EMAIL position 2,
alter NOMEEMAIL position 3,
alter PADRAO position 4,
alter ATIVO position 5;
commit;


/************************************************************
	Arquivo AcaoEmail 
************************************************************/

ALTER TABLE arqAcaoEmail
alter IDPRIMARIO position 1,
alter TITULO position 2,
alter VERSAO position 3,
alter TIPOACAO position 4,
alter TEMPLATE position 5,
alter PADRAOACAO position 6,
alter ATIVO position 7,
alter ARQUIVO position 8,
alter ARQUIVO_ARQUIVO position 9,
alter HTML position 10,
alter IMAGEM position 11,
alter IMAGEM_ARQUIVO  position 12,
alter LINK position 13,
alter IMAGEMALT position 14,
alter QTDTESTE position 15;
commit;


/************************************************************
	Arquivo ImagemCRM 
************************************************************/

ALTER TABLE arqImagemCRM
alter IDPRIMARIO position 1,
alter ACAOEMAIL position 2,
alter NUMIMG position 3,
alter NOME position 4,
alter IMAGEM position 5,
alter IMAGEM_ARQUIVO  position 6,
alter LINK position 7;
commit;


/************************************************************
	Arquivo LogEmail  
************************************************************/

ALTER TABLE arqLogEmail
alter IDPRIMARIO position 1,
alter TITULO position 2,
alter DATA position 3,
alter HORA position 4,
alter USUARIO position 5,
alter ENVIADOS position 6,
alter NENVIADOS position 7,
alter TOTAL position 8,
alter LIDOS position 9,
alter PERCLIDOS position 10,
alter EMAILREMET position 11,
alter HORAINI position 12,
alter HORAFIM position 13,
alter HORAREENV position 14,
alter ENVIOU position 15,
alter OPCAO position 16,
alter CLIENTE position 17;
commit;


/************************************************************
	Arquivo ItLogEmail
************************************************************/

ALTER TABLE arqItLogEmail
alter IDPRIMARIO position 1,
alter LOGEMAIL position 2,
alter CLIENTE position 3,
alter EMAIL position 4,
alter ENVIADO position 5,
alter LIDO position 6,
alter LINKEMP position 7,
alter LINKKM position 8;
commit;


/************************************************************
	Arquivo Avisos    
************************************************************/

ALTER TABLE arqAvisos
alter IDPRIMARIO position 1,
alter NUMERO position 2,
alter DATA position 3,
alter HORA position 4,
alter QUEM position 5,
alter ASSUNTO position 6,
alter PRIORIDADE position 7,
alter TEXTO position 8,
alter IDQUEM position 9,
alter AVISOPAI position 10;
commit;


/************************************************************
	Arquivo ParaGrupo 
************************************************************/

ALTER TABLE arqParaGrupo
alter IDPRIMARIO position 1,
alter AVISOS position 2,
alter GRUPO position 3,
alter USUARIO position 4;
commit;


/************************************************************
	Arquivo Lido      
************************************************************/

ALTER TABLE arqLido
alter IDPRIMARIO position 1,
alter AVISOS position 2,
alter USUARIO position 3,
alter GRUPO position 4,
alter DATA position 5;
commit;


/************************************************************
	Configuração XConfig   
************************************************************/

ALTER TABLE cnfXConfig
alter IDPRIMARIO position 1,
alter CPF position 2,
alter LOGACESSO position 3,
alter LOGACESSOS position 4,
alter QTD position 5,
alter QTD2 position 6,
alter EMPRESA position 7,
alter ENDE_CEP position 8,
alter ENDE_ENDERECO position 9,
alter ENDE_BAIRRO position 10,
alter ENDE_CIDADE position 11,
alter ENDE_DDD position 12,
alter ENDE_TELEFONE position 13,
alter ENDE_DDDCELULAR position 14,
alter ENDE_CELULAR position 15,
alter ENDE_WHATSAPP position 16,
alter CNPJ position 17,
alter EMAIL position 18,
alter SITE position 19,
alter QTASDESMAR position 20,
alter DECLINAR position 21,
alter RECORDIA position 22,
alter CCORREC position 23,
alter CCORASS position 24,
alter SUBPLARREC position 25,
alter SUBPLARASS position 26,
alter FORNREC position 27,
alter BOLETOMIN position 28,
alter DIASSDENTR position 29;
commit;


/************************************************************
	Arquivo Banco     
************************************************************/

ALTER TABLE arqBanco
alter IDPRIMARIO position 1,
alter NUM position 2,
alter BANCO position 3;
commit;


/************************************************************
	Arquivo CCor      
************************************************************/

ALTER TABLE arqCCor
alter IDPRIMARIO position 1,
alter NOME position 2,
alter CLINICA position 3,
alter BANCO position 4,
alter AGENCIA position 5,
alter DVAGENCIA position 6,
alter CONTA position 7,
alter DVCONTA position 8,
alter CARTEIRA position 9,
alter CODCEDENTE position 10,
alter MULTA position 11,
alter JUROS position 12,
alter CBOLETO position 13,
alter INSTRUCOES position 14,
alter ULTREMESSA position 15,
alter CONVENIO position 16,
alter VARIACAO position 17,
alter ATIVO position 18,
alter TPIX1 position 19,
alter PIX1 position 20,
alter TPIX2 position 21,
alter PIX2 position 22,
alter TPIX3 position 23,
alter PIX3 position 24,
alter TPIX4 position 25,
alter PIX4 position 26,
alter TPIX5 position 27,
alter PIX5 position 28;
commit;


/************************************************************
	Arquivo ContPessoa
************************************************************/

ALTER TABLE arqContPessoa
alter IDPRIMARIO position 1,
alter FORNECEDOR position 2,
alter PESSOA position 3,
alter NOME position 4,
alter APELIDO position 5,
alter FUNCAO position 6,
alter CELULAR position 7,
alter TELEFONE position 8,
alter EMAIL position 9,
alter RECEMAIL position 10,
alter NASCIMENTO position 11,
alter SEXO position 12,
alter OBS position 13,
alter ATIVO position 14;
commit;


/************************************************************
	Arquivo DocMod    
************************************************************/

ALTER TABLE arqDocMod
alter IDPRIMARIO position 1,
alter DOCUMENTO position 2,
alter TARQDOC position 3,
alter TORDOC position 4,
alter LOGO position 5,
alter MARCA position 6,
alter NOMEARQ position 7,
alter RODAPE position 8,
alter ALTRODAPE position 9,
alter TEMPLATE position 10,
alter ATIVO position 11,
alter HEADER position 12,
alter HEADER_ARQUIVO position 13,
alter ARQUIVO position 14,
alter ARQUIVO_ARQUIVO position 15,
alter FOOTER position 16,
alter FOOTER_ARQUIVO position 17,
alter HTML position 18,
alter IMAGEM position 19,
alter IMAGEM_ARQUIVO  position 20,
alter LISTA position 21,
alter MARGEMESQ position 22,
alter MARGEMDIR position 23,
alter MARGEMTOP position 24,
alter TPAPEL position 25,
alter TORIENTA position 26;
commit;


/************************************************************
	Configuração Config    
************************************************************/

ALTER TABLE cnfConfig
alter IDPRIMARIO position 1,
alter EMAIL position 2,
alter AVISO position 3,
alter DOCMOD position 4;
commit;


/************************************************************
	Arquivo Plano     
************************************************************/

ALTER TABLE arqPlano
alter IDPRIMARIO position 1,
alter CODPLANO position 2,
alter PLANO position 3,
alter TPGREC position 4;
commit;


/************************************************************
	Arquivo SubPlano  
************************************************************/

ALTER TABLE arqSubPlano
alter IDPRIMARIO position 1,
alter PLANO position 2,
alter CODIGO position 3,
alter NOME position 4;
commit;


/************************************************************
	Arquivo IndexAtua 
************************************************************/

ALTER TABLE arqIndexAtua
alter IDPRIMARIO position 1,
alter INDICE position 2,
alter DATA position 3,
alter DIAS position 4,
alter DATAPROX position 5,
alter ESTATIS position 6;
commit;


/************************************************************
	Arquivo Midia     
************************************************************/

ALTER TABLE arqMidia
alter IDPRIMARIO position 1,
alter MIDIA position 2,
alter ATIVO position 3;
commit;


/************************************************************
	Arquivo Clinica   
************************************************************/

ALTER TABLE arqClinica
alter IDPRIMARIO position 1,
alter CLINICA position 2,
alter RAZAO position 3,
alter EMAIL position 4,
alter CNPJ position 5,
alter ENDE_CEP position 6,
alter ENDE_ENDERECO position 7,
alter ENDE_BAIRRO position 8,
alter ENDE_CIDADE position 9,
alter ENDE_DDD position 10,
alter ENDE_TELEFONE position 11,
alter ENDE_DDDCELULAR position 12,
alter ENDE_CELULAR position 13,
alter ENDE_WHATSAPP position 14,
alter DATAINI position 15,
alter DATAFIM position 16,
alter ATIVO position 17,
alter MAXAGENDA position 18,
alter SIGLA position 19;
commit;


/************************************************************
	Arquivo PTrata    
************************************************************/

ALTER TABLE arqPTrata
alter IDPRIMARIO position 1,
alter PTRATA position 2,
alter APELIDO position 3,
alter VALOR position 4,
alter MRGDESC position 5,
alter VALMINIMO position 6,
alter DESCRICAO position 7,
alter ATIVO position 8,
alter TEMPO position 9;
commit;


/************************************************************
	Arquivo Conta     
************************************************************/

ALTER TABLE arqConta
alter IDPRIMARIO position 1,
alter TRANSACAO position 2,
alter CLINICA position 3,
alter TPGREC position 4,
alter FORNECEDOR position 5,
alter PESSOA position 6,
alter NOME position 7,
alter TRGVALOR position 8,
alter TRGVALLIQ position 9,
alter TRGQTDPARC position 10,
alter TRGQPARCPG position 11,
alter PROXVENC position 12,
alter TRGPAGO position 13,
alter SALDO position 14,
alter DOCUMENTO position 15,
alter EMISSAO position 16,
alter RECENVIA position 17,
alter COMPETE position 18,
alter HISTORICO position 19,
alter ARQ1 position 20,
alter ARQ1_ARQUIVO position 21;
commit;


/************************************************************
	Arquivo Parcela   
************************************************************/

ALTER TABLE arqParcela
alter IDPRIMARIO position 1,
alter CONTA position 2,
alter CLINICACAL position 3,
alter TPGRECCAL position 4,
alter PESSOACAL position 5,
alter PARCELA position 6,
alter VENCIMENTO position 7,
alter VENCEST position 8,
alter VALOR position 9,
alter VALORLIQ position 10,
alter ESTIMADO position 11,
alter TFCOBRA position 12,
alter EMISSAO position 13,
alter NUMBOLETO position 14,
alter LINHADIG position 15,
alter NOMEPDF position 16,
alter CCOR position 17,
alter SUBPLANO position 18,
alter DATAPAGTO position 19,
alter DATACOMP position 20,
alter TFPAGTO position 21,
alter TDETPG position 22,
alter FORMAPG position 23,
alter CHEQUE position 24,
alter ARQ1 position 25,
alter ARQ1_ARQUIVO position 26,
alter STRETORNO position 27,
alter REMESSA position 28,
alter DATAREM position 29;
commit;


/************************************************************
	Arquivo UsuCli    
************************************************************/

ALTER TABLE arqUsuCli
alter IDPRIMARIO position 1,
alter USUARIO position 2,
alter CLINICA position 3;
commit;


/************************************************************
	Arquivo Profissao 
************************************************************/

ALTER TABLE arqProfissao
alter IDPRIMARIO position 1,
alter PROFISSAO position 2,
alter ATIVO position 3;
commit;


/************************************************************
	Arquivo HoraBloq  
************************************************************/

ALTER TABLE arqHoraBloq
alter IDPRIMARIO position 1,
alter CLINICA position 2,
alter NOME position 3,
alter DATAINI position 4,
alter HORAINI position 5,
alter DATAFIM position 6,
alter HORAFIM position 7;
commit;


/************************************************************
	Arquivo Duracao   
************************************************************/

ALTER TABLE arqDuracao
alter IDPRIMARIO position 1,
alter CLINICA position 2,
alter INICIO position 3,
alter HORAINI position 4,
alter HORAFIM position 5,
alter CONSSAB position 6,
alter CONSDOM position 7,
alter DURACAO position 8;
commit;


/************************************************************
	Arquivo Consulta  
************************************************************/

ALTER TABLE arqConsulta
alter IDPRIMARIO position 1,
alter NUM position 2,
alter CLINICA position 3,
alter TSTCON position 4,
alter TIAGENDA position 5,
alter DATA position 6,
alter HORA position 7,
alter HORACHEGA position 8,
alter PESSOA position 9,
alter PRONTUARIO position 10,
alter MEDICO position 11,
alter ASSESSOR position 12,
alter CALLCENTER position 13,
alter MEDICAATUA position 14,
alter TMOTIVO position 15,
alter FORMAPG position 16,
alter VALOR position 17,
alter PTRATA position 18,
alter VALPTRATA position 19,
alter ENTRAFPG position 20,
alter ENTRAVAL position 21,
alter ENTRAPARC position 22,
alter SDENTRFPG position 23,
alter SDVENC1PAR position 24,
alter ENTRAVALP position 25,
alter ENTRATOTP position 26,
alter BOLETOMIN position 27,
alter ENTRAOBS position 28,
alter SALDOPARC position 29,
alter SALDOVAL position 30,
alter SALDOTOTP position 31,
alter SALDOFPG position 32,
alter SALDOOBS position 33,
alter CONDUTA position 34,
alter MEDICACAO position 35,
alter OBS position 36,
alter CONTACONS position 37,
alter CONTAPTRA position 38,
alter TRGQTDM position 39,
alter TRGQTDMENT position 40,
alter SALDO position 41,
alter QUEMAGRET position 42,
alter QDOAGRET position 43,
alter DATARET position 44,
alter DIARET position 45,
alter HORARET position 46,
alter TSTAGRET position 47,
alter ASSESRET position 48,
alter OBSRET position 49;
commit;


/************************************************************
	Arquivo Plantao   
************************************************************/

ALTER TABLE arqPlantao
alter IDPRIMARIO position 1,
alter CLINICA position 2,
alter DATAINI position 3,
alter DATAFIM position 4,
alter TDIASEM position 5,
alter USUARIO position 6;
commit;


/************************************************************
	Arquivo Fornecedor
************************************************************/

ALTER TABLE arqFornecedor
alter IDPRIMARIO position 1,
alter NOME position 2,
alter APELIDO position 3,
alter TPFPJ position 4,
alter ENDE_CEP position 5,
alter ENDE_ENDERECO position 6,
alter ENDE_BAIRRO position 7,
alter ENDE_CIDADE position 8,
alter ENDE_DDD position 9,
alter ENDE_TELEFONE position 10,
alter ENDE_DDDCELULAR position 11,
alter ENDE_CELULAR position 12,
alter ENDE_WHATSAPP position 13,
alter CNPJ position 14,
alter INSCESTAD position 15,
alter INSCMUNIC position 16,
alter CPF position 17,
alter IDENTIDADE position 18,
alter ORGAO position 19,
alter EMISSAO position 20,
alter ATIVO position 21,
alter OBS position 22,
alter DESDE position 23;
commit;


/************************************************************
	Arquivo TiAgenda  
************************************************************/

ALTER TABLE arqTiAgenda
alter IDPRIMARIO position 1,
alter TIAGENDA position 2,
alter ATIVO position 3,
alter DOBROTEMPO position 4,
alter PAGAMENTO position 5,
alter MIDIA position 6;
commit;


/************************************************************
	Arquivo FormaPg   
************************************************************/

ALTER TABLE arqFormaPg
alter IDPRIMARIO position 1,
alter FORMAPG position 2,
alter PODEENTRA position 3,
alter DINHEIRO position 4,
alter BOLETO position 5,
alter CARTAO position 6,
alter DIAS position 7,
alter TAXADEB position 8,
alter TAXA2 position 9,
alter TAXA3 position 10,
alter ATIVO position 11;
commit;


/************************************************************
	Arquivo Recorrente
************************************************************/

ALTER TABLE arqRecorrente
alter IDPRIMARIO position 1,
alter CLINICA position 2,
alter FORNECEDOR position 3,
alter PESSOA position 4,
alter NOME position 5,
alter TPGREC position 6,
alter TCOMPETE position 7,
alter VENC position 8,
alter ANTECIPA position 9,
alter VALOR position 10,
alter ESTIMADO position 11,
alter TFCOBRA position 12,
alter HISTORICO position 13,
alter SUBPLANO position 14,
alter ATIVO position 15;
commit;


/************************************************************
	Arquivo CliMidia  
************************************************************/

ALTER TABLE arqCliMidia
alter IDPRIMARIO position 1,
alter CLINICA position 2,
alter MIDIA position 3,
alter ATIVO position 4;
commit;


/************************************************************
	Arquivo ComCall   
************************************************************/

ALTER TABLE arqComCall
alter IDPRIMARIO position 1,
alter CLINICA position 2,
alter MES position 3,
alter TRGQTOFX position 4;
commit;


/************************************************************
	Arquivo FxComCall 
************************************************************/

ALTER TABLE arqFxComCall
alter IDPRIMARIO position 1,
alter COMCALL position 2,
alter FAIXA position 3,
alter PERCATE position 4,
alter COMISSAO position 5;
commit;


/************************************************************
	Arquivo Unidade   
************************************************************/

ALTER TABLE arqUnidade
alter IDPRIMARIO position 1,
alter UNIDADE position 2,
alter ATIVO position 3;
commit;


/************************************************************
	Arquivo Medicamen 
************************************************************/

ALTER TABLE arqMedicamen
alter IDPRIMARIO position 1,
alter MEDICAMEN position 2,
alter UNIDADE position 3,
alter TRGITLOTE position 4,
alter TRGCMLOTE position 5,
alter ESTOQUE position 6,
alter ATIVO position 7;
commit;


/************************************************************
	Arquivo AgRet     
************************************************************/

ALTER TABLE arqAgRet
alter IDPRIMARIO position 1,
alter CLINICA position 2,
alter DATA position 3,
alter DIA position 4,
alter HORA position 5,
alter CONSULTA position 6,
alter PRONTUARIO position 7,
alter NOME position 8,
alter NUMCELULAR position 9,
alter TSTAGRET position 10,
alter ASSESSOR position 11,
alter OBS position 12;
commit;


/************************************************************
	Arquivo CMedica   
************************************************************/

ALTER TABLE arqCMedica
alter IDPRIMARIO position 1,
alter CONSULTA position 2,
alter MEDICAMEN position 3,
alter UNIDADECAL position 4,
alter QTD position 5,
alter LOTE position 6,
alter DATASEPARA position 7,
alter QTDENTREG position 8,
alter SALDO position 9,
alter OBSENTREG position 10;
commit;


/************************************************************
	Arquivo Lote      
************************************************************/

ALTER TABLE arqLote
alter IDPRIMARIO position 1,
alter MEDICAMEN position 2,
alter LOTE position 3,
alter CLINICA position 4,
alter FORNECEDOR position 5,
alter FABRICA position 6,
alter VALIDADE position 7,
alter TRGITMOV position 8,
alter TRGCMEDICA position 9,
alter ESTOQUE position 10,
alter ATIVO position 11;
commit;


/************************************************************
	Arquivo MovEstoque
************************************************************/

ALTER TABLE arqMovEstoque
alter IDPRIMARIO position 1,
alter NUM position 2,
alter DATA position 3,
alter CLINICA position 4,
alter FORNECEDOR position 5,
alter NUMDOC position 6,
alter OBS position 7,
alter FECHADO position 8;
commit;


/************************************************************
	Arquivo ItemMov   
************************************************************/

ALTER TABLE arqItemMov
alter IDPRIMARIO position 1,
alter MOVESTOQUE position 2,
alter ITEM position 3,
alter LOTE position 4,
alter TMOV position 5,
alter QTD position 6,
alter QTDCALC position 7,
alter CUNIDADE position 8;
commit;

