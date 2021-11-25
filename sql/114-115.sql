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
