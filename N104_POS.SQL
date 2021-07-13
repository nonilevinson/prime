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
alter GRUPO position 2;
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
alter MEDICO position 8,
alter CRM position 9,
alter ATIVO position 10,
alter NASCIMENTO position 11,
alter FOTO position 12,
alter FOTO_ARQUIVO  position 13,
alter EMAILACES position 14,
alter EMAILACESS position 15;
commit;


/************************************************************
	Arquivo Pessoa    
************************************************************/

ALTER TABLE arqPessoa
alter IDPRIMARIO position 1,
alter NOME position 2,
alter APELIDO position 3,
alter PRONTUARIO position 4,
alter ENDE_CEP position 5,
alter ENDE_ENDERECO position 6,
alter ENDE_BAIRRO position 7,
alter ENDE_CIDADE position 8,
alter ENDE_DDD position 9,
alter ENDE_TELEFONE position 10,
alter ENDE_DDDCELULAR position 11,
alter ENDE_CELULAR position 12,
alter ENDE_WHATSAPP position 13,
alter NASCIMENTO position 14,
alter IDADE position 15,
alter SEXO position 16,
alter ESTCIVIL position 17,
alter PROFISSAO position 18,
alter CPF position 19,
alter IDENTIDADE position 20,
alter ORGAO position 21,
alter EMISSAO position 22,
alter EMAIL position 23,
alter RECEMAIL position 24,
alter ATIVO position 25,
alter OBS position 26,
alter DESDE position 27,
alter QTODESMAR position 28,
alter MIDIA position 29;
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
alter DECLINAR position 21;
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
alter BANCO position 2,
alter AGENCIA position 3,
alter DVAGENCIA position 4,
alter CONTA position 5,
alter DVCONTA position 6,
alter CARTEIRA position 7,
alter CODCEDENTE position 8,
alter MULTA position 9,
alter JUROS position 10,
alter CBOLETO position 11,
alter INSTRUCOES position 12,
alter ULTREMESSA position 13,
alter CONVENIO position 14,
alter VARIACAO position 15,
alter ATIVO position 16,
alter TPIX1 position 17,
alter PIX1 position 18,
alter TPIX2 position 19,
alter PIX2 position 20,
alter TPIX3 position 21,
alter PIX3 position 22,
alter TPIX4 position 23,
alter PIX4 position 24,
alter TPIX5 position 25,
alter PIX5 position 26;
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
alter MAXAGENDA position 18;
commit;


/************************************************************
	Arquivo PTrata    
************************************************************/

ALTER TABLE arqPTrata
alter IDPRIMARIO position 1,
alter PTRATA position 2,
alter VALOR position 3,
alter DESCRICAO position 4,
alter ATIVO position 5;
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
alter CHEQUE position 23,
alter ARQ1 position 24,
alter ARQ1_ARQUIVO position 25,
alter STRETORNO position 26,
alter REMESSA position 27,
alter DATAREM position 28;
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
alter PROFISSAO position 2;
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
alter DATA position 5,
alter HORA position 6,
alter HORACHEGA position 7,
alter PESSOA position 8,
alter MEDICO position 9,
alter MKT position 10,
alter ASSESSOR position 11,
alter MEDICAATUA position 12,
alter TMOTIVO position 13,
alter TPROGRAMA position 14,
alter CONDUTA position 15,
alter MEDICACAO position 16;
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

