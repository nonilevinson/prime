--*
--* 1.03 para 1.04

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

update arqLanceOperacao set Operacao= 'Cadastro de pacientes' where idPrimario = 100007;

insert into arqLanceOperacao values(100042,1,'Cadastro de fornecedores','arqFornecedor',42,1,0,'');
commit;

/************************************************************
	Arquivo Fornecedor
************************************************************/

CREATE TABLE arqFornecedor
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	NOME VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = I */
	/*  3*/	APELIDO VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = I */
	/*  4*/	TPFPJ ligadoComTabela, /* Ligado com a Tabela TPFPJ */
	/*  5*/	ENDE_CEP VARCHAR( 8 ) COLLATE PT_BR, /* Máscara = nnnnn-nnn */
	/*  6*/	ENDE_ENDERECO VARCHAR( 80 ) COLLATE PT_BR, /* Máscara = I */
	/*  7*/	ENDE_BAIRRO ligadoComArquivo, /* Ligado com o Arquivo Bairro */
	/*  8*/	ENDE_CIDADE ligadoComArquivo, /* Ligado com o Arquivo Cidade */
	/*  9*/	/* ENDE_DDD */
	/* 10*/	ENDE_TELEFONE VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = X */
	/* 11*/	ENDE_DDDCELULAR SMALLINT, /* Máscara = N */
	/* 12*/	ENDE_CELULAR VARCHAR( 9 ) COLLATE PT_BR, /* Máscara = n.nnnn.nnnn */
	/* 13*/	ENDE_WHATSAPP campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 14*/	CNPJ VARCHAR( 14 ) COLLATE PT_BR, /* Máscara = nn.nnn.nnn/nnnn */
	/* 15*/	INSCESTAD VARCHAR( 25 ) COLLATE PT_BR, /* Máscara = X */
	/* 16*/	INSCMUNIC VARCHAR( 25 ) COLLATE PT_BR, /* Máscara = X */
	/* 17*/	CPF VARCHAR( 11 ) COLLATE PT_BR, /* Máscara = nnn.nnn.nnn-nn */
	/* 18*/	IDENTIDADE VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = X */
	/* 19*/	ORGAO VARCHAR( 20 ) COLLATE PT_BR, /* Máscara = X */
	/* 20*/	EMISSAO DATE, /* Máscara = 4ano */
	/* 21*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 22*/	OBS BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	/* 23*/	DESDE DATE, /* Máscara = 4ano */
	CONSTRAINT arqFornecedor_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqFornecedor_UK UNIQUE ( Nome )
);
commit;

CREATE DESC INDEX arqFornecedor_IdPrimario_Desc ON arqFornecedor (IDPRIMARIO);
commit;

ALTER TABLE arqFornecedor ADD ENDE_DDD SMALLINT computed by ( ( COALESCE( ( SELECT DDD FROM arqCidade WHERE arqCidade.IdPrimario=( arqFornecedor.Ende_Cidade )  ), 0 ) ) );
ALTER TABLE arqFornecedor ALTER ENDE_DDD POSITION 9;
commit;

ALTER TABLE arqFornecedor ADD CONSTRAINT arqFornecedor_FK_Ende_Bairro FOREIGN KEY ( ENDE_BAIRRO ) REFERENCES arqBairro ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqFornecedor ADD CONSTRAINT arqFornecedor_FK_Ende_Cidade FOREIGN KEY ( ENDE_CIDADE ) REFERENCES arqCidade ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqFornecedor ADD CONSTRAINT arqFornecedor_FK_TPFPJ FOREIGN KEY ( TPFPJ ) REFERENCES tabTPFPJ ON DELETE SET NULL ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqFornecedor AS
	SELECT A0.IDPRIMARIO, A0.NOME, A0.APELIDO, A0.TPFPJ, A1.CHAVE as TPFPJ_CHAVE, A1.DESCRITOR as TPFPJ_DESCRITOR, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A2.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A3.UF as ENDE_CIDADE_UF, A4.CHAVE as ENDE_CIDADE_UF_CHAVE, A4.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A3.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.CNPJ, A0.INSCESTAD, A0.INSCMUNIC, A0.CPF, A0.IDENTIDADE, A0.ORGAO, A0.EMISSAO, A0.ATIVO, A0.OBS, A0.DESDE
	FROM arqFornecedor A0
	left join tabTPFPJ A1 on A1.IDPRIMARIO=A0.TPFPJ
	left join arqBairro A2 on A2.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A3 on A3.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A4 on A4.IDPRIMARIO=A3.UF;
commit;

/************************************************************
	Trigger para Log de arqFornecedor
************************************************************/

set term ^;

recreate trigger arqFornecedor_LOG for arqFornecedor
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Nome,'' );
else
	valorChave = coalesce( NEW.Nome,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100042 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Apelido', OLD.Apelido, NEW.Apelido );
	execute procedure set_log( 12, NEW.idPrimario, 'TPFPJ', OLD.TPFPJ, NEW.TPFPJ );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_CEP', OLD.Ende_CEP, NEW.Ende_CEP );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Endereco', OLD.Ende_Endereco, NEW.Ende_Endereco );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Bairro', OLD.Ende_Bairro, NEW.Ende_Bairro );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Cidade', OLD.Ende_Cidade, NEW.Ende_Cidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Telefone', OLD.Ende_Telefone, NEW.Ende_Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_DDDCelular', OLD.Ende_DDDCelular, NEW.Ende_DDDCelular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Celular', OLD.Ende_Celular, NEW.Ende_Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_WhatsApp', OLD.Ende_WhatsApp, NEW.Ende_WhatsApp );
	execute procedure set_log( 12, NEW.idPrimario, 'CNPJ', OLD.CNPJ, NEW.CNPJ );
	execute procedure set_log( 12, NEW.idPrimario, 'InscEstad', OLD.InscEstad, NEW.InscEstad );
	execute procedure set_log( 12, NEW.idPrimario, 'InscMunic', OLD.InscMunic, NEW.InscMunic );
	execute procedure set_log( 12, NEW.idPrimario, 'CPF', OLD.CPF, NEW.CPF );
	execute procedure set_log( 12, NEW.idPrimario, 'Identidade', OLD.Identidade, NEW.Identidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Orgao', OLD.Orgao, NEW.Orgao );
	execute procedure set_log( 12, NEW.idPrimario, 'Emissao', OLD.Emissao, NEW.Emissao );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Desde', OLD.Desde, NEW.Desde );
end
end^

set term ;^

commit;

INSERT INTO ARQFORNECEDOR (IDPRIMARIO, NOME, APELIDO, TPFPJ, ENDE_CEP, ENDE_ENDERECO, ENDE_BAIRRO, ENDE_CIDADE, ENDE_TELEFONE, ENDE_DDDCELULAR, ENDE_CELULAR, ENDE_WHATSAPP, CNPJ, INSCESTAD, INSCMUNIC, CPF, IDENTIDADE, ORGAO, EMISSAO, ATIVO, DESDE) VALUES (1, 'ABC Comércio', 'ABC', 2, '', '', NULL, NULL, '', 0, '', 0, '', '', '', '', '', '', NULL, 1, '2021-05-31');
INSERT INTO ARQFORNECEDOR (IDPRIMARIO, NOME, APELIDO, TPFPJ, ENDE_CEP, ENDE_ENDERECO, ENDE_BAIRRO, ENDE_CIDADE, ENDE_TELEFONE, ENDE_DDDCELULAR, ENDE_CELULAR, ENDE_WHATSAPP, CNPJ, INSCESTAD, INSCMUNIC, CPF, IDENTIDADE, ORGAO, EMISSAO, ATIVO, DESDE) VALUES (2, '123 Industria Ltda', '123', 2, '', '', NULL, NULL, '', 0, '', 0, '', '', '', '', '', '', NULL, 1, '2021-05-31');
INSERT INTO ARQFORNECEDOR (IDPRIMARIO, NOME, APELIDO, TPFPJ, ENDE_CEP, ENDE_ENDERECO, ENDE_BAIRRO, ENDE_CIDADE, ENDE_TELEFONE, ENDE_DDDCELULAR, ENDE_CELULAR, ENDE_WHATSAPP, CNPJ, INSCESTAD, INSCMUNIC, CPF, IDENTIDADE, ORGAO, EMISSAO, ATIVO, DESDE) VALUES (3, 'Amil Assistência Médica Internacional S/A', 'Amil', 2, '', '', NULL, NULL, '', 0, '', 0, '', '', '', '', '', '', NULL, 1, '2021-06-01');
COMMIT WORK;

/************************************************************
	Arquivo Pessoa
************************************************************/
drop trigger arqPessoa_log;
drop view v_arqPessoa;
ALTER TABLE arqPessoa drop CONSTRAINT arqPessoa_UK;
commit;

delete from arqConta;
delete from arqPessoa Where TPessoa != 2;
commit;

ALTER TABLE arqPessoa drop TPessoa, drop TPFPJ, drop CNPJ, drop InscEstad, drop InscMunic;
commit;

ALTER TABLE arqPessoa add CONSTRAINT arqPessoa_UK UNIQUE ( Nome, Prontuario );
commit;

RECREATE VIEW V_arqPessoa AS
	SELECT A0.IDPRIMARIO, A0.NOME, A0.APELIDO, A0.PRONTUARIO, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.NASCIMENTO, A0.IDADE, A0.SEXO, A4.CHAVE as Sexo_CHAVE, A4.DESCRITOR as Sexo_DESCRITOR, A0.ESTCIVIL, A5.CHAVE as EstCivil_CHAVE, A5.DESCRITOR as EstCivil_DESCRITOR, A0.PROFISSAO, A6.PROFISSAO as PROFISSAO_PROFISSAO, A0.CPF, A0.IDENTIDADE, A0.ORGAO, A0.EMISSAO, A0.EMAIL, A0.RECEMAIL, A0.ATIVO, A0.OBS, A0.DESDE, A0.QTODESMAR, A0.MIDIA, A7.MIDIA as MIDIA_MIDIA
	FROM arqPessoa A0
	left join arqBairro A1 on A1.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A2 on A2.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A3 on A3.IDPRIMARIO=A2.UF
	left join tabSexo A4 on A4.IDPRIMARIO=A0.SEXO
	left join tabEstCivil A5 on A5.IDPRIMARIO=A0.ESTCIVIL
	left join arqProfissao A6 on A6.IDPRIMARIO = A0.PROFISSAO
	left join arqMidia A7 on A7.IDPRIMARIO = A0.MIDIA;
commit;

/************************************************************
	Trigger para Log de arqPessoa
************************************************************/

set term ^;

recreate trigger arqPessoa_LOG for arqPessoa
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Nome,'' ) || coalesce( OLD.Prontuario,'' );
else
	valorChave = coalesce( NEW.Nome,'' ) || coalesce( NEW.Prontuario,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100007 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Apelido', OLD.Apelido, NEW.Apelido );
	execute procedure set_log( 12, NEW.idPrimario, 'Prontuario', OLD.Prontuario, NEW.Prontuario );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_CEP', OLD.Ende_CEP, NEW.Ende_CEP );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Endereco', OLD.Ende_Endereco, NEW.Ende_Endereco );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Bairro', OLD.Ende_Bairro, NEW.Ende_Bairro );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Cidade', OLD.Ende_Cidade, NEW.Ende_Cidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Telefone', OLD.Ende_Telefone, NEW.Ende_Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_DDDCelular', OLD.Ende_DDDCelular, NEW.Ende_DDDCelular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Celular', OLD.Ende_Celular, NEW.Ende_Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_WhatsApp', OLD.Ende_WhatsApp, NEW.Ende_WhatsApp );
	execute procedure set_log( 12, NEW.idPrimario, 'Nascimento', OLD.Nascimento, NEW.Nascimento );
	execute procedure set_log( 12, NEW.idPrimario, 'Sexo', OLD.Sexo, NEW.Sexo );
	execute procedure set_log( 12, NEW.idPrimario, 'EstCivil', OLD.EstCivil, NEW.EstCivil );
	execute procedure set_log( 12, NEW.idPrimario, 'Profissao', OLD.Profissao, NEW.Profissao );
	execute procedure set_log( 12, NEW.idPrimario, 'CPF', OLD.CPF, NEW.CPF );
	execute procedure set_log( 12, NEW.idPrimario, 'Identidade', OLD.Identidade, NEW.Identidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Orgao', OLD.Orgao, NEW.Orgao );
	execute procedure set_log( 12, NEW.idPrimario, 'Emissao', OLD.Emissao, NEW.Emissao );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'RecEmail', OLD.RecEmail, NEW.RecEmail );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Desde', OLD.Desde, NEW.Desde );
	execute procedure set_log( 12, NEW.idPrimario, 'QtoDesmar', OLD.QtoDesmar, NEW.QtoDesmar );
	execute procedure set_log( 12, NEW.idPrimario, 'Midia', OLD.Midia, NEW.Midia );
end
end^

set term ;^

commit;

/***********************************************
   PROCEDURE PESSOA_PRONTUARIO
************************************************/

SET TERM ^;
RECREATE PROCEDURE PESSOA_PRONTUARIO
AS
   declare variable idPessoa bigInt;
   declare variable prontuario bigInt;
begin
   for
		Select P.idPrimario as idPessoa, P.Prontuario
      From arqPessoa P
      Where P.Prontuario = 0
      	into :idPessoa, :prontuario
   do begin
      Select gen_id( genProntuario, 1 ) as Prontuario
      From cnfXConfig
      	into :prontuario;

      Update arqPessoa set Prontuario = :prontuario
         Where idPrimario = :idPessoa;
    end
end^

SET TERM ;^

commit;

execute procedure PESSOA_PRONTUARIO;
commit;

drop procedure PESSOA_PRONTUARIO ;
commit;

/************************************************************
	Arquivo ContPessoa
************************************************************/
drop trigger arqContPessoa_log;
drop view v_arqContPessoa;
commit;

ALTER TABLE arqContPessoa drop CONSTRAINT arqContPessoa_UK;
commit;

ALTER TABLE arqContPessoa
add /*  2*/	FORNECEDOR ligadoComArquivo, /* Ligado com o Arquivo Fornecedor */
alter Fornecedor position 2;
commit;

ALTER TABLE arqContPessoa ADD CONSTRAINT arqContPessoa_FK_Fornecedor FOREIGN KEY ( FORNECEDOR ) REFERENCES arqFornecedor ON DELETE CASCADE ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqContPessoa AS
	SELECT A0.IDPRIMARIO, A0.FORNECEDOR, A1.NOME as FORNECEDOR_NOME, A0.PESSOA, A2.NOME as PESSOA_NOME, A2.PRONTUARIO as PESSOA_PRONTUARIO, A0.NOME, A0.APELIDO, A0.FUNCAO, A0.CELULAR, A0.TELEFONE, A0.EMAIL, A0.RECEMAIL, A0.NASCIMENTO, A0.SEXO, A3.CHAVE as Sexo_CHAVE, A3.DESCRITOR as Sexo_DESCRITOR, A0.OBS, A0.ATIVO
	FROM arqContPessoa A0
	left join arqFornecedor A1 on A1.IDPRIMARIO = A0.FORNECEDOR
	left join arqPessoa A2 on A2.IDPRIMARIO = A0.PESSOA
	left join tabSexo A3 on A3.IDPRIMARIO=A0.SEXO;
commit;

/************************************************************
	Trigger para Log de arqContPessoa
************************************************************/

set term ^;

recreate trigger arqContPessoa_LOG for arqContPessoa
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
	valorChave='';
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100021 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Fornecedor', OLD.Fornecedor, NEW.Fornecedor );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Apelido', OLD.Apelido, NEW.Apelido );
	execute procedure set_log( 12, NEW.idPrimario, 'Funcao', OLD.Funcao, NEW.Funcao );
	execute procedure set_log( 12, NEW.idPrimario, 'Celular', OLD.Celular, NEW.Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Telefone', OLD.Telefone, NEW.Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'RecEmail', OLD.RecEmail, NEW.RecEmail );
	execute procedure set_log( 12, NEW.idPrimario, 'Nascimento', OLD.Nascimento, NEW.Nascimento );
	execute procedure set_log( 12, NEW.idPrimario, 'Sexo', OLD.Sexo, NEW.Sexo );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo Conta
************************************************************/
drop trigger arqParcela_log;
drop view v_arqParcela;
commit;

drop trigger arqConta_log;
drop view v_arqConta;
commit;

ALTER TABLE arqConta
add /*  6*/	FORNECEDOR ligadoComArquivo; /* Ligado com o Arquivo Fornecedor */
commit;

ALTER TABLE arqConta ADD NOME VARCHAR( 60 ) computed by ( CASE
	WHEN( Pessoa > 0 )
	THEN( ( COALESCE( ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqConta.Pessoa )  ), '' ) ) )
	ELSE ( ( COALESCE( ( SELECT Nome FROM arqFornecedor WHERE arqFornecedor.IdPrimario=( arqConta.Fornecedor )  ), '' ) ) )
	END  );
commit;

ALTER TABLE arqConta ADD CONSTRAINT arqConta_FK_Fornecedor FOREIGN KEY ( FORNECEDOR ) REFERENCES arqFornecedor ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqConta AS
	SELECT A0.IDPRIMARIO, A0.TRANSACAO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.TPGREC, A2.CHAVE as TPgRec_CHAVE, A2.DESCRITOR as TPgRec_DESCRITOR, A0.FORNECEDOR, A3.NOME as FORNECEDOR_NOME, A0.PESSOA, A4.NOME as PESSOA_NOME, A4.PRONTUARIO as PESSOA_PRONTUARIO, A0.NOME, A0.TRGVALOR, A0.TRGVALLIQ, A0.TRGQTDPARC, A0.TRGQPARCPG, A0.PROXVENC, A0.TRGPAGO, A0.SALDO, A0.DOCUMENTO, A0.EMISSAO, A0.RECENVIA, A0.COMPETE, A0.HISTORICO, A0.ARQ1, A0.Arq1_ARQUIVO
	FROM arqConta A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join tabTPgRec A2 on A2.IDPRIMARIO=A0.TPGREC
	left join arqFornecedor A3 on A3.IDPRIMARIO = A0.FORNECEDOR
	left join arqPessoa A4 on A4.IDPRIMARIO = A0.PESSOA;
commit;

/************************************************************
	Trigger para Log de arqConta
************************************************************/

set term ^;

recreate trigger arqConta_LOG for arqConta
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Transacao,'' );
else
	valorChave = coalesce( NEW.Transacao,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100033 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Transacao', OLD.Transacao, NEW.Transacao );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'TPgRec', OLD.TPgRec, NEW.TPgRec );
	execute procedure set_log( 12, NEW.idPrimario, 'Fornecedor', OLD.Fornecedor, NEW.Fornecedor );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'Documento', OLD.Documento, NEW.Documento );
	execute procedure set_log( 12, NEW.idPrimario, 'Emissao', OLD.Emissao, NEW.Emissao );
	execute procedure set_log( 12, NEW.idPrimario, 'RecEnvia', OLD.RecEnvia, NEW.RecEnvia );
	execute procedure set_log( 12, NEW.idPrimario, 'Compete', OLD.Compete, NEW.Compete );
	execute procedure set_log( 12, NEW.idPrimario, 'Historico', OLD.Historico, NEW.Historico );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Arq1 is distinct from OLD.Arq1 )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

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