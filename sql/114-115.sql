--*
--* 1.14 para 1.15

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceAssunto values (2,'Estoque' );
commit;

insert into arqLanceOperacao values(100051,1,'Cadastro de unidades de medidas','arqUnidade',51,2,0,'');
insert into arqLanceOperacao values(100052,1,'Cadastro de medicamentos','arqMedicamen',52,1,0,'');
insert into arqLanceOperacao values(100053,1,'Cadastro das agendas de retirada de medicação','arqAgRet',53,1,0,'');
insert into arqLanceOperacao values(200191,2,'Relatório do contrato de uma consulta','',191,50,0,'');
insert into arqLanceOperacao values(200203,2,'Relatório das agendas de retirada de medicação','',203,50,0,'');
commit;

/************************************************************
	TABELA tabSexo
************************************************************/
update tabSexo set Descritor = 'MASCULINO' Where idPrimario = 1;
update tabSexo set Descritor = 'FEMININO' Where idPrimario = 2;
commit;

/************************************************************
	TABELA tabEstCivil
************************************************************/
update tabEstCivil set Descritor = 'SOLTEIRO(A)' Where idPrimario = 1;
update tabEstCivil set Descritor = 'CASADO(A)' Where idPrimario = 2;
update tabEstCivil set Descritor = 'VIÚVO(A)' Where idPrimario = 3;
update tabEstCivil set Descritor = 'DIVORCIADO(A)' Where idPrimario = 4;
update tabEstCivil set Descritor = 'OUTRO' Where idPrimario = 5;
commit;

/************************************************************
	TABELA tabTStAgRet
************************************************************/

CREATE TABLE tabTStAgRet
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTStAgRet_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTStAgRet_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTStAgRet VALUES ( 1, '1', 'RECEPÇÃO' );
INSERT INTO tabTStAgRet VALUES ( 2, '2', 'EM PROCESSO' );
INSERT INTO tabTStAgRet VALUES ( 3, '3', 'ENTREGUE' );
commit;

/************************************************************
	Arquivo Unidade   
************************************************************/

CREATE TABLE arqUnidade
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	UNIDADE VARCHAR( 10 ) COLLATE PT_BR, /* Máscara = I */
	/*  3*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqUnidade_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqUnidade_UK UNIQUE ( Unidade )
);
commit;

CREATE DESC INDEX arqUnidade_IdPrimario_Desc ON arqUnidade (IDPRIMARIO);
commit;

RECREATE VIEW V_arqUnidade AS 
	SELECT A0.IDPRIMARIO, A0.UNIDADE, A0.ATIVO
	FROM arqUnidade A0;
commit;

/************************************************************
	Trigger para Log de arqUnidade
************************************************************/

set term ^;

recreate trigger arqUnidade_LOG for arqUnidade
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Unidade,'' );
else
	valorChave = coalesce( NEW.Unidade,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100051 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Unidade', OLD.Unidade, NEW.Unidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

insert into arqUnidade values( 1, 'Caixa', 1);
insert into arqUnidade values( 2, 'Cápsula', 1 );
insert into arqUnidade values( 3, 'Frasco', 1 );
commit;

/************************************************************
	Arquivo Clinica   
************************************************************/
drop trigger arqClinica_log;
drop view v_arqClinica;
commit;

ALTER TABLE arqClinica
add /* 19*/	SIGLA VARCHAR( 3 ) COLLATE PT_BR; /* Máscara = M */
commit;

RECREATE VIEW V_arqClinica AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A0.RAZAO, A0.EMAIL, A0.CNPJ, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.DATAINI, A0.DATAFIM, A0.ATIVO, A0.MAXAGENDA, A0.SIGLA
	FROM arqClinica A0
	left join arqBairro A1 on A1.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A2 on A2.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A3 on A3.IDPRIMARIO=A2.UF;
commit;

/************************************************************
	Trigger para Log de arqClinica
************************************************************/

set term ^;

recreate trigger arqClinica_LOG for arqClinica
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Clinica,'' );
else
	valorChave = coalesce( NEW.Clinica,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100031 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Razao', OLD.Razao, NEW.Razao );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'CNPJ', OLD.CNPJ, NEW.CNPJ );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_CEP', OLD.Ende_CEP, NEW.Ende_CEP );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Endereco', OLD.Ende_Endereco, NEW.Ende_Endereco );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Bairro', OLD.Ende_Bairro, NEW.Ende_Bairro );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Cidade', OLD.Ende_Cidade, NEW.Ende_Cidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Telefone', OLD.Ende_Telefone, NEW.Ende_Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_DDDCelular', OLD.Ende_DDDCelular, NEW.Ende_DDDCelular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Celular', OLD.Ende_Celular, NEW.Ende_Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_WhatsApp', OLD.Ende_WhatsApp, NEW.Ende_WhatsApp );
	execute procedure set_log( 12, NEW.idPrimario, 'DataIni', OLD.DataIni, NEW.DataIni );
	execute procedure set_log( 12, NEW.idPrimario, 'DataFim', OLD.DataFim, NEW.DataFim );
	execute procedure set_log( 12, NEW.idPrimario, 'MaxAgenda', OLD.MaxAgenda, NEW.MaxAgenda );
	execute procedure set_log( 12, NEW.idPrimario, 'Sigla', OLD.Sigla, NEW.Sigla );
end
end^

set term ;^

commit;

update arqClinica set Sigla = 'NI' Where idPrimario = 1;
update arqClinica set Sigla = 'RJ' Where idPrimario = 2;
update arqClinica set Sigla = 'JF' Where idPrimario = 3;
update arqClinica set Sigla = 'CX' Where idPrimario = 4;
update arqClinica set Sigla = 'JO' Where idPrimario = 1269;
commit;

/************************************************************
	Arquivo PTrata    
************************************************************/
drop trigger arqPTrata_log;
drop view v_arqPTrata;
commit;

ALTER TABLE arqPTrata
add /*  9*/	TEMPO VARCHAR( 10 ) COLLATE PT_BR; /* Máscara = M */
commit;

RECREATE VIEW V_arqPTrata AS 
	SELECT A0.IDPRIMARIO, A0.PTRATA, A0.APELIDO, A0.VALOR, A0.MRGDESC, A0.VALMINIMO, A0.DESCRICAO, A0.ATIVO, A0.TEMPO
	FROM arqPTrata A0;
commit;

/************************************************************
	Trigger para Log de arqPTrata
************************************************************/

set term ^;

recreate trigger arqPTrata_LOG for arqPTrata
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.PTrata,'' );
else
	valorChave = coalesce( NEW.PTrata,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100032 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'PTrata', OLD.PTrata, NEW.PTrata );
	execute procedure set_log( 12, NEW.idPrimario, 'Apelido', OLD.Apelido, NEW.Apelido );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'MrgDesc', OLD.MrgDesc, NEW.MrgDesc );
	execute procedure set_log( 12, NEW.idPrimario, 'Descricao', substring( OLD.Descricao from 1 for 255 ), substring( NEW.Descricao from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Tempo', OLD.Tempo, NEW.Tempo );
end
end^

set term ;^

commit;

update arqPTrata set Tempo = '';
update arqPTrata set Tempo = '180 DIAS'  where idPrimario = 1;
update arqPTrata set Tempo = '60 DIAS'  where idPrimario = 2;
commit;

/************************************************************
	Arquivo Medicamen 
************************************************************/

CREATE TABLE arqMedicamen
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	MEDICAMEN VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = M */
	/*  3*/	UNIDADE ligadoComArquivo, /* Ligado com o Arquivo Unidade */
	/*  4*/	ESTOQUEMIN INTEGER, /* Máscara = N */
	/*  5*/	ESTOQUEMAX INTEGER, /* Máscara = N */
	/*  6*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqMedicamen_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqMedicamen_UK UNIQUE ( Medicamen )
);
commit;

CREATE DESC INDEX arqMedicamen_IdPrimario_Desc ON arqMedicamen (IDPRIMARIO);
commit;

ALTER TABLE arqMedicamen ADD CONSTRAINT arqMedicamen_FK_Unidade FOREIGN KEY ( UNIDADE ) REFERENCES arqUnidade ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqMedicamen AS 
	SELECT A0.IDPRIMARIO, A0.MEDICAMEN, A0.UNIDADE, A1.UNIDADE as UNIDADE_UNIDADE, A0.ESTOQUEMIN, A0.ESTOQUEMAX, A0.ATIVO
	FROM arqMedicamen A0
	left join arqUnidade A1 on A1.IDPRIMARIO = A0.UNIDADE;
commit;

/************************************************************
	Trigger para Log de arqMedicamen
************************************************************/

set term ^;

recreate trigger arqMedicamen_LOG for arqMedicamen
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Medicamen,'' );
else
	valorChave = coalesce( NEW.Medicamen,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100052 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Medicamen', OLD.Medicamen, NEW.Medicamen );
	execute procedure set_log( 12, NEW.idPrimario, 'Unidade', OLD.Unidade, NEW.Unidade );
	execute procedure set_log( 12, NEW.idPrimario, 'EstoqueMin', OLD.EstoqueMin, NEW.EstoqueMin );
	execute procedure set_log( 12, NEW.idPrimario, 'EstoqueMax', OLD.EstoqueMax, NEW.EstoqueMax );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

insert into arqMedicamen values( 1, 'POWER', 1, 0, 0, 1 );
insert into arqMedicamen values( 2, 'FIC 8', 1, 0, 0, 1 );
commit;

/************************************************************
	Arquivo AgRet     
************************************************************/

CREATE TABLE arqAgRet
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  3*/	DATA DATE, /* Máscara = 4ano */
	/*  4*/	/* DIA */
	/*  5*/	HORA TIME, /* Máscara = Hhmm */
	/*  6*/	CONSULTA ligadoComArquivo, /* Ligado com o Arquivo Consulta */
	/*  7*/	/* PRONTUARIO */
	/*  8*/	/* NOME */
	/*  9*/	/* NUMCELULAR */
	/* 10*/	TSTAGRET ligadoComTabela, /* Ligado com a Tabela TStAgRet */
	/* 11*/	ASSESSOR ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/* 12*/	OBS BLOB SUB_TYPE 1 COLLATE PT_BR, /* Máscara =  */
	CONSTRAINT arqAgRet_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqAgRet_UK UNIQUE ( Clinica, Data, Hora )
);
commit;

CREATE DESC INDEX arqAgRet_IdPrimario_Desc ON arqAgRet (IDPRIMARIO);
commit;

ALTER TABLE arqAgRet ADD DIA VARCHAR( 15 ) computed by ( CASE
	WHEN( extract( weekday from Data ) = 0 ) THEN( 'DOMINGO' )
	WHEN( extract( weekday from Data ) = 1 ) THEN( 'SEGUNDA-FEIRA' )
	WHEN( extract( weekday from Data ) = 2 ) THEN( 'TERÇA-FEIRA' )
	WHEN( extract( weekday from Data ) = 3 ) THEN( 'QUARTA-FEIRA' )
	WHEN( extract( weekday from Data ) = 4 ) THEN( 'QUINTA-FEIRA' )
	WHEN( extract( weekday from Data ) = 5 ) THEN( 'SEXTA-FEIRA' )
	ELSE ( 'SÁBADO' )
	END  ); 
ALTER TABLE arqAgRet ALTER DIA POSITION 4;
ALTER TABLE arqAgRet ADD PRONTUARIO VARCHAR( 9 ) computed by ( ( COALESCE( ( SELECT Prontuario FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( arqAgRet.Consulta ) ), 0 ) )  ), '' ) ) ); 
ALTER TABLE arqAgRet ALTER PRONTUARIO POSITION 6;
ALTER TABLE arqAgRet ADD NOME VARCHAR( 60 ) computed by ( ( COALESCE( ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( arqAgRet.Consulta ) ), 0 ) )  ), '' ) ) ); 
ALTER TABLE arqAgRet ALTER NOME POSITION 7;
ALTER TABLE arqAgRet ADD NUMCELULAR VARCHAR( 11 ) computed by ( ( COALESCE( ( SELECT NumCelular FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( arqAgRet.Consulta ) ), 0 ) )  ), '' ) ) ); 
ALTER TABLE arqAgRet ALTER NUMCELULAR POSITION 8;
commit;

ALTER TABLE arqAgRet ADD CONSTRAINT arqAgRet_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqAgRet ADD CONSTRAINT arqAgRet_FK_Consulta FOREIGN KEY ( CONSULTA ) REFERENCES arqConsulta ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqAgRet ADD CONSTRAINT arqAgRet_FK_TStAgRet FOREIGN KEY ( TSTAGRET ) REFERENCES tabTStAgRet ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqAgRet ADD CONSTRAINT arqAgRet_FK_Assessor FOREIGN KEY ( ASSESSOR ) REFERENCES arqUsuario ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqAgRet AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.DATA, A0.DIA, A0.HORA, A0.CONSULTA, A2.NUM as CONSULTA_NUM, A0.PRONTUARIO, A0.NOME, A0.NUMCELULAR, A0.TSTAGRET, A3.CHAVE as TStAgRet_CHAVE, A3.DESCRITOR as TStAgRet_DESCRITOR, A0.ASSESSOR, A4.USUARIO as ASSESSOR_USUARIO, A0.OBS
	FROM arqAgRet A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqConsulta A2 on A2.IDPRIMARIO = A0.CONSULTA
	left join tabTStAgRet A3 on A3.IDPRIMARIO=A0.TSTAGRET
	left join arqUsuario A4 on A4.IDPRIMARIO = A0.ASSESSOR;
commit;

/************************************************************
	Trigger para Log de arqAgRet
************************************************************/

set term ^;

recreate trigger arqAgRet_LOG for arqAgRet
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Clinica_Clinica, ' ' ) || '-' || coalesce( Data, ' ' ) || '-' || coalesce( Hora, ' ' ) from v_arqAgRet where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100053 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Hora', OLD.Hora, NEW.Hora );
	execute procedure set_log( 12, NEW.idPrimario, 'Consulta', OLD.Consulta, NEW.Consulta );
	execute procedure set_log( 12, NEW.idPrimario, 'TStAgRet', OLD.TStAgRet, NEW.TStAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'Assessor', OLD.Assessor, NEW.Assessor );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo FormaPg   
************************************************************/
drop trigger arqFormaPg_log;
drop view v_arqFormaPg;
commit;

ALTER TABLE arqFormaPg
add /*  4*/	BOLETO campoLogico; /* Lógico: 0=Não 1=Sim */
commit;

update arqFormaPg set Boleto = 0;
commit;

RECREATE VIEW V_arqFormaPg AS 
	SELECT A0.IDPRIMARIO, A0.FORMAPG, A0.DINHEIRO, A0.BOLETO, A0.CARTAO, A0.DIAS, A0.TAXADEB, A0.TAXA2, A0.TAXA3, A0.ATIVO
	FROM arqFormaPg A0;
commit;

/************************************************************
	Trigger para Log de arqFormaPg
************************************************************/

set term ^;

recreate trigger arqFormaPg_LOG for arqFormaPg
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.FormaPg,'' );
else
	valorChave = coalesce( NEW.FormaPg,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100044 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg', OLD.FormaPg, NEW.FormaPg );
	execute procedure set_log( 12, NEW.idPrimario, 'Dinheiro', OLD.Dinheiro, NEW.Dinheiro );
	execute procedure set_log( 12, NEW.idPrimario, 'Boleto', OLD.Boleto, NEW.Boleto );
	execute procedure set_log( 12, NEW.idPrimario, 'Cartao', OLD.Cartao, NEW.Cartao );
	execute procedure set_log( 12, NEW.idPrimario, 'Dias', OLD.Dias, NEW.Dias );
	execute procedure set_log( 12, NEW.idPrimario, 'TaxaDeb', OLD.TaxaDeb, NEW.TaxaDeb );
	execute procedure set_log( 12, NEW.idPrimario, 'Taxa2', OLD.Taxa2, NEW.Taxa2 );
	execute procedure set_log( 12, NEW.idPrimario, 'Taxa3', OLD.Taxa3, NEW.Taxa3 );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

ALTER TABLE arqFormaPg
alter IDPRIMARIO position 1,
alter FORMAPG position 2,
alter DINHEIRO position 3,
alter BOLETO position 4,
alter CARTAO position 5,
alter DIAS position 6,
alter TAXADEB position 7,
alter TAXA2 position 8,
alter TAXA3 position 9,
alter ATIVO position 10;
commit;

INSERT INTO ARQFORMAPG (IDPRIMARIO, FORMAPG, DINHEIRO, BOLETO, CARTAO, DIAS, TAXADEB, TAXA2, TAXA3, ATIVO) VALUES (6, 'BOLETO', 0, 1, 0, 1, 0, 0, 0, 1);
COMMIT WORK;

/************************************************************
	Parâmetro XConfig   
************************************************************/
drop trigger cnfXConfig_log;
drop view v_cnfXConfig;
commit;

ALTER TABLE cnfXConfig
add /* 28*/	BOLETOMIN NUMERIC( 8, 2 ); /* Máscara = N */
commit;

update cnfXConfig set BoletoMin=1500;
commit;

RECREATE VIEW V_cnfXConfig AS 
	SELECT A0.IDPRIMARIO, A0.CPF, A0.LOGACESSO, A0.LOGACESSOS, A0.QTD, A0.QTD2, A0.EMPRESA, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.CNPJ, A0.EMAIL, A0.SITE, A0.QTASDESMAR, A0.DECLINAR, A0.RECORDIA, A0.CCORREC, A4.NOME as CCORREC_NOME, A0.CCORASS, A5.NOME as CCORASS_NOME, A0.SUBPLARREC, A6.PLANO as SUBPLARREC_PLANO, A7.CODPLANO as SUBPLARREC_PLANO_CODPLANO, A7.PLANO as SUBPLARREC_PLANO_PLANO, A6.CODIGO as SUBPLARREC_CODIGO, A6.NOME as SUBPLARREC_NOME, A0.SUBPLARASS, A8.PLANO as SUBPLARASS_PLANO, A9.CODPLANO as SUBPLARASS_PLANO_CODPLANO, A9.PLANO as SUBPLARASS_PLANO_PLANO, A8.CODIGO as SUBPLARASS_CODIGO, A8.NOME as SUBPLARASS_NOME, A0.FORNREC, A10.NOME as FORNREC_NOME, A0.BOLETOMIN
	FROM cnfXConfig A0
	left join arqBairro A1 on A1.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A2 on A2.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A3 on A3.IDPRIMARIO=A2.UF
	left join arqCCor A4 on A4.IDPRIMARIO = A0.CCORREC
	left join arqCCor A5 on A5.IDPRIMARIO = A0.CCORASS
	left join arqSubPlano A6 on A6.IDPRIMARIO = A0.SUBPLARREC
	left join arqPlano A7 on A7.IDPRIMARIO = A6.PLANO
	left join arqSubPlano A8 on A8.IDPRIMARIO = A0.SUBPLARASS
	left join arqPlano A9 on A9.IDPRIMARIO = A8.PLANO
	left join arqFornecedor A10 on A10.IDPRIMARIO = A0.FORNREC;
commit;

/************************************************************
	Trigger para Log de cnfXConfig
************************************************************/

set term ^;

recreate trigger cnfXConfig_LOG for cnfXConfig
active after Insert or Delete or Update
position 999
as
begin
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100017 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', '' );
begin
	execute procedure set_log( 12, NEW.idPrimario, 'Empresa', OLD.Empresa, NEW.Empresa );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_CEP', OLD.Ende_CEP, NEW.Ende_CEP );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Endereco', OLD.Ende_Endereco, NEW.Ende_Endereco );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Bairro', OLD.Ende_Bairro, NEW.Ende_Bairro );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Cidade', OLD.Ende_Cidade, NEW.Ende_Cidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Telefone', OLD.Ende_Telefone, NEW.Ende_Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_DDDCelular', OLD.Ende_DDDCelular, NEW.Ende_DDDCelular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Celular', OLD.Ende_Celular, NEW.Ende_Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_WhatsApp', OLD.Ende_WhatsApp, NEW.Ende_WhatsApp );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'Site', OLD.Site, NEW.Site );
	execute procedure set_log( 12, NEW.idPrimario, 'QtasDesmar', OLD.QtasDesmar, NEW.QtasDesmar );
	execute procedure set_log( 12, NEW.idPrimario, 'Declinar', OLD.Declinar, NEW.Declinar );
	execute procedure set_log( 12, NEW.idPrimario, 'RecorDia', OLD.RecorDia, NEW.RecorDia );
	execute procedure set_log( 12, NEW.idPrimario, 'CCorRec', OLD.CCorRec, NEW.CCorRec );
	execute procedure set_log( 12, NEW.idPrimario, 'CCorAss', OLD.CCorAss, NEW.CCorAss );
	execute procedure set_log( 12, NEW.idPrimario, 'SubPlaRRec', OLD.SubPlaRRec, NEW.SubPlaRRec );
	execute procedure set_log( 12, NEW.idPrimario, 'SubPlaRAss', OLD.SubPlaRAss, NEW.SubPlaRAss );
	execute procedure set_log( 12, NEW.idPrimario, 'FornRec', OLD.FornRec, NEW.FornRec );
	execute procedure set_log( 12, NEW.idPrimario, 'BoletoMin', OLD.BoletoMin, NEW.BoletoMin );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.CPF is distinct from OLD.CPF )  OR 
		( NEW.LogAcesso is distinct from OLD.LogAcesso )  OR 
		( NEW.LogAcessoS is distinct from OLD.LogAcessoS )  OR 
		( NEW.Qtd is distinct from OLD.Qtd )  OR 
		( NEW.Qtd2 is distinct from OLD.Qtd2 )  OR 
		( NEW.CNPJ is distinct from OLD.CNPJ )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo Consulta  
************************************************************/
drop trigger arqConsulta_log;
drop view v_arqConsulta;
commit;

ALTER TABLE arqConsulta drop ObsPTrata;
commit;

ALTER TABLE arqConsulta
add /* 20*/	ENTRAFPG ligadoComArquivo, /* Ligado com o Arquivo FormaPg */
add /* 21*/	ENTRAVAL NUMERIC( 8, 2 ), /* Máscara = N */
add /* 22*/	ENTRAPARC SMALLINT, /* Máscara = N */
add /* 23*/	ENTRAVALP NUMERIC( 8, 2 ), /* Máscara = N */
add /* 25*/	BOLETOMIN NUMERIC( 8, 2 ), /* Máscara = N */
add /* 24*/	ENTRAOBS VARCHAR( 100 ) COLLATE PT_BR, /* Máscara = M */
add /* 25*/	SALDOPARC SMALLINT, /* Máscara = N */
add /* 26*/	SALDOVAL NUMERIC( 8, 2 ), /* Máscara = N */
add /* 27*/	SALDOFPG ligadoComArquivo, /* Ligado com o Arquivo FormaPg */
add /* 28*/	SALDOOBS VARCHAR( 100 ) COLLATE PT_BR; /* Máscara = M */
commit;

ALTER TABLE arqConsulta ADD ENTRATOTP NUMERIC( 8, 2 ) computed by ( EntraParc * EntraValP ); 
ALTER TABLE arqConsulta ADD SALDOTOTP NUMERIC( 8, 2 ) computed by ( SaldoParc * SaldoVal ); 
commit;

update arqConsulta set EntraVal=0, EntraParc=0, EntraValP=0, SaldoParc=0, SaldoVal=0, BoletoMin=0;
commit;

ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_EntraFPg FOREIGN KEY ( ENTRAFPG ) REFERENCES arqFormaPg ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_SaldoFPg FOREIGN KEY ( SALDOFPG ) REFERENCES arqFormaPg ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqConsulta AS 
	SELECT A0.IDPRIMARIO, A0.NUM, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.TSTCON, A2.CHAVE as TStCon_CHAVE, A2.DESCRITOR as TStCon_DESCRITOR, A0.TIAGENDA, A3.TIAGENDA as TIAGENDA_TIAGENDA, A0.DATA, A0.HORA, A0.HORACHEGA, A0.PESSOA, A4.NOME as PESSOA_NOME, A4.NUMCELULAR as PESSOA_NUMCELULAR, A0.PRONTUARIO, A0.MEDICO, A5.USUARIO as MEDICO_USUARIO, A0.ASSESSOR, A6.USUARIO as ASSESSOR_USUARIO, A0.CALLCENTER, A7.USUARIO as CALLCENTER_USUARIO, A0.MEDICAATUA, A0.TMOTIVO, A8.CHAVE as TMotivo_CHAVE, A8.DESCRITOR as TMotivo_DESCRITOR, A0.FORMAPG, A9.FORMAPG as FORMAPG_FORMAPG, A0.VALOR, A0.PTRATA, A10.PTRATA as PTRATA_PTRATA, A0.VALPTRATA, A0.ENTRAFPG, A11.FORMAPG as ENTRAFPG_FORMAPG, A0.ENTRAVAL, A0.ENTRAPARC, A0.ENTRAVALP, A0.ENTRATOTP, A0.BOLETOMIN, A0.ENTRAOBS, A0.SALDOPARC, A0.SALDOVAL, A0.SALDOTOTP, A0.SALDOFPG, A12.FORMAPG as SALDOFPG_FORMAPG, A0.SALDOOBS, A0.CONDUTA, A0.MEDICACAO, A0.OBS, A0.CONTACONS, A13.TRANSACAO as CONTACONS_TRANSACAO, A0.CONTAPTRA, A14.TRANSACAO as CONTAPTRA_TRANSACAO
	FROM arqConsulta A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join tabTStCon A2 on A2.IDPRIMARIO=A0.TSTCON
	left join arqTiAgenda A3 on A3.IDPRIMARIO = A0.TIAGENDA
	left join arqPessoa A4 on A4.IDPRIMARIO = A0.PESSOA
	left join arqUsuario A5 on A5.IDPRIMARIO = A0.MEDICO
	left join arqUsuario A6 on A6.IDPRIMARIO = A0.ASSESSOR
	left join arqUsuario A7 on A7.IDPRIMARIO = A0.CALLCENTER
	left join tabTMotivo A8 on A8.IDPRIMARIO=A0.TMOTIVO
	left join arqFormaPg A9 on A9.IDPRIMARIO = A0.FORMAPG
	left join arqPTrata A10 on A10.IDPRIMARIO = A0.PTRATA
	left join arqFormaPg A11 on A11.IDPRIMARIO = A0.ENTRAFPG
	left join arqFormaPg A12 on A12.IDPRIMARIO = A0.SALDOFPG
	left join arqConta A13 on A13.IDPRIMARIO = A0.CONTACONS
	left join arqConta A14 on A14.IDPRIMARIO = A0.CONTAPTRA;
commit;

/************************************************************
	Trigger para Log de arqConsulta
************************************************************/

set term ^;

recreate trigger arqConsulta_LOG for arqConsulta
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Num,'' );
else
	valorChave = coalesce( NEW.Num,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100039 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Num', OLD.Num, NEW.Num );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'TStCon', OLD.TStCon, NEW.TStCon );
	execute procedure set_log( 12, NEW.idPrimario, 'TiAgenda', OLD.TiAgenda, NEW.TiAgenda );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Hora', OLD.Hora, NEW.Hora );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraChega', OLD.HoraChega, NEW.HoraChega );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'Medico', OLD.Medico, NEW.Medico );
	execute procedure set_log( 12, NEW.idPrimario, 'Assessor', OLD.Assessor, NEW.Assessor );
	execute procedure set_log( 12, NEW.idPrimario, 'CallCenter', OLD.CallCenter, NEW.CallCenter );
	execute procedure set_log( 12, NEW.idPrimario, 'MedicaAtua', substring( OLD.MedicaAtua from 1 for 255 ), substring( NEW.MedicaAtua from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'TMotivo', OLD.TMotivo, NEW.TMotivo );
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg', OLD.FormaPg, NEW.FormaPg );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'PTrata', OLD.PTrata, NEW.PTrata );
	execute procedure set_log( 12, NEW.idPrimario, 'ValPTrata', OLD.ValPTrata, NEW.ValPTrata );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraFPg', OLD.EntraFPg, NEW.EntraFPg );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraVal', OLD.EntraVal, NEW.EntraVal );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraParc', OLD.EntraParc, NEW.EntraParc );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraValP', OLD.EntraValP, NEW.EntraValP );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraObs', OLD.EntraObs, NEW.EntraObs );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoParc', OLD.SaldoParc, NEW.SaldoParc );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoVal', OLD.SaldoVal, NEW.SaldoVal );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoTotP', OLD.SaldoTotP, NEW.SaldoTotP );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoFPg', OLD.SaldoFPg, NEW.SaldoFPg );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoObs', OLD.SaldoObs, NEW.SaldoObs );
	execute procedure set_log( 12, NEW.idPrimario, 'Conduta', substring( OLD.Conduta from 1 for 255 ), substring( NEW.Conduta from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Medicacao', substring( OLD.Medicacao from 1 for 255 ), substring( NEW.Medicacao from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'ContaCons', OLD.ContaCons, NEW.ContaCons );
	execute procedure set_log( 12, NEW.idPrimario, 'ContaPTra', OLD.ContaPTra, NEW.ContaPTra );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.BoletoMin is distinct from OLD.BoletoMin )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

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
alter ENTRAVALP position 23,
alter ENTRATOTP position 24,
alter BOLETOMIN position 25,
alter ENTRAOBS position 26,
alter SALDOPARC position 27,
alter SALDOVAL position 28,
alter SALDOTOTP position 29,
alter SALDOFPG position 30,
alter SALDOOBS position 31,
alter CONDUTA position 32,
alter MEDICACAO position 33,
alter OBS position 34,
alter CONTACONS position 35,
alter CONTAPTRA position 36;
commit;
