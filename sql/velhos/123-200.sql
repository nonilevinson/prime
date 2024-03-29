--*
--* 1.23 para 2.00

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(100060,1,'Cadastro de tipos de consultas','arqTiConsulta',60,99,1,'');
insert into arqLanceOperacao values(100061,1,'Cadastro de status de consultas','arqTStCon',61,99,1,'');

insert into arqLanceOperacao values(200277,2,'Relat�rio da observa��o de uma consulta','',277,50,0,'ultimaLigOpcaoEm( 265,266,267,268,276 )');
commit;

--* Arquivo TiConsulta
--* Preferi criar como arquivo somente para GR0 do que como tabela. No futuro de precisarmos configurar coisas, bastar� criar campos
--* No Portal da Agenda, o AK poder� ordenar os bot�es das Cl�nicas por TiConsulta e sigla da cl�nica

CREATE TABLE arqTiConsulta
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	TICONSULTA VARCHAR( 15 ) COLLATE PT_BR, /* M�scara = I */
	/*  3*/	ATIVO campoLogico, /* L�gico: 0=N�o 1=Sim */
	CONSTRAINT arqTiConsulta_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqTiConsulta_UK UNIQUE ( TiConsulta )
);
commit;

CREATE DESC INDEX arqTiConsulta_IdPrimario_Desc ON arqTiConsulta (IDPRIMARIO);
commit;


insert into arqTiConsulta values( 1, 'Tratamento', 1 );
insert into arqTiConsulta values( 2, 'Nutricionista', 1 );
insert into arqTiConsulta values( 3, 'Psic�logo', 1 );
commit;

RECREATE VIEW V_arqTiConsulta AS 
	SELECT A0.IDPRIMARIO, A0.TICONSULTA, A0.ATIVO
	FROM arqTiConsulta A0;
commit;

--* Arquivo Consulta  
--* Criado o TiConsulta e todas as existentes passam a ser do tipo Tratamento (idPrimario TiConsulta = 1)
drop trigger arqConsulta_log;
drop view v_arqConsulta;
commit;

ALTER TABLE arqConsulta
add /*  3*/	TICONSULTA ligadoComArquivo; /* Ligado com o Arquivo TiConsulta */
commit;

ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_TiConsulta FOREIGN KEY ( TICONSULTA ) REFERENCES arqTiConsulta ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

update arqConsulta set TiConsulta=1;
commit;

--*	Arquivo Clinica   
--* Criando o TiConsulta. Na migra��o passei as existentes para Tratamento (id=1)

drop trigger arqClinica_log;
drop view v_arqClinica;
commit;

ALTER TABLE arqClinica
add /* 15*/	TICONSULTA ligadoComArquivo; /* Ligado com o Arquivo TiConsulta */
commit;

ALTER TABLE arqClinica ADD CONSTRAINT arqClinica_FK_TiConsulta FOREIGN KEY ( TICONSULTA ) REFERENCES arqTiConsulta ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

update arqClinica set TiConsulta=1;
commit;

RECREATE VIEW V_arqClinica AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A0.RAZAO, A0.EMAIL, A0.CNPJ, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.TICONSULTA, A4.TICONSULTA as TICONSULTA_TICONSULTA, A0.DATAINI, A0.DATAFIM, A0.ATIVO, A0.MAXAGENDA, A0.SIGLA
	FROM arqClinica A0
	left join arqBairro A1 on A1.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A2 on A2.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A3 on A3.IDPRIMARIO=A2.UF
	left join arqTiConsulta A4 on A4.IDPRIMARIO = A0.TICONSULTA;
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
	execute procedure set_log( 12, NEW.idPrimario, 'TiConsulta', OLD.TiConsulta, NEW.TiConsulta );
	execute procedure set_log( 12, NEW.idPrimario, 'DataIni', OLD.DataIni, NEW.DataIni );
	execute procedure set_log( 12, NEW.idPrimario, 'DataFim', OLD.DataFim, NEW.DataFim );
	execute procedure set_log( 12, NEW.idPrimario, 'MaxAgenda', OLD.MaxAgenda, NEW.MaxAgenda );
	execute procedure set_log( 12, NEW.idPrimario, 'Sigla', OLD.Sigla, NEW.Sigla );
end
end^

set term ;^

commit;

INSERT INTO ARQCLINICA (IDPRIMARIO, CLINICA, RAZAO, EMAIL, CNPJ, ENDE_CEP, ENDE_ENDERECO, ENDE_BAIRRO, ENDE_CIDADE, ENDE_TELEFONE, ENDE_DDDCELULAR, ENDE_CELULAR, ENDE_WHATSAPP, DATAINI, DATAFIM, MAXAGENDA, SIGLA, TICONSULTA) VALUES (10, 'NUTRICIONISTA', '', '', '', '', '', NULL, NULL, '', 0, '', 0, '2022-06-16', NULL, 60, 'NU', 2);
INSERT INTO ARQCLINICA (IDPRIMARIO, CLINICA, RAZAO, EMAIL, CNPJ, ENDE_CEP, ENDE_ENDERECO, ENDE_BAIRRO, ENDE_CIDADE, ENDE_TELEFONE, ENDE_DDDCELULAR, ENDE_CELULAR, ENDE_WHATSAPP, DATAINI, DATAFIM, MAXAGENDA, SIGLA, TICONSULTA) VALUES (11, 'PSIC�LOGO', '', '', '', '', '', NULL, NULL, '', 0, '', 0, '2022-06-16', NULL, 60, 'PSI', 3);
COMMIT WORK;

INSERT INTO ARQDURACAO (IDPRIMARIO, CLINICA, INICIO, HORAINI, HORAFIM, CONSSAB, CONSDOM, DURACAO) VALUES (47697, 11, '2022-05-29', '08:00:00', '19:00:00', 0, 0, 15);
INSERT INTO ARQDURACAO (IDPRIMARIO, CLINICA, INICIO, HORAINI, HORAFIM, CONSSAB, CONSDOM, DURACAO) VALUES (47699, 10, '2022-05-29', '08:00:00', '20:00:00', 0, 0, 15);
COMMIT WORK;

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
alter TICONSULTA position 15,
alter DATAINI position 16,
alter DATAFIM position 17,
alter ATIVO position 18,
alter MAXAGENDA position 19,
alter SIGLA position 20;
commit;

--*	Arquivo PTrata    
--* campo Complemen para saber se oferecem as consultas de nutricionista e psic�logo
--* baseado nele o campo Quantos em arqPessoa liberar� o paciente para agendar ou n�o uma dessas consultas
drop trigger arqPTrata_log;
drop view v_arqPTrata;
commit;

ALTER TABLE arqPTrata drop Descricao;
commit;

ALTER TABLE arqPTrata
add /*  7*/	COMPLEMEN campoLogico; /* L�gico: 0=N�o 1=Sim */
commit;

update arqPTrata set Complemen=0;
update arqPTrata set Complemen=1 where idPrimario in( 1,5,6 );
commit;

RECREATE VIEW V_arqPTrata AS 
	SELECT A0.IDPRIMARIO, A0.PTRATA, A0.APELIDO, A0.VALOR, A0.MRGDESC, A0.VALMINIMO, A0.COMPLEMEN, A0.ATIVO, A0.TEMPO
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
	execute procedure set_log( 12, NEW.idPrimario, 'Complemen', OLD.Complemen, NEW.Complemen );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Tempo', OLD.Tempo, NEW.Tempo );
end
end^

set term ;^

commit;

ALTER TABLE arqPTrata
alter IDPRIMARIO position 1,
alter PTRATA position 2,
alter APELIDO position 3,
alter VALOR position 4,
alter MRGDESC position 5,
alter VALMINIMO position 6,
alter COMPLEMEN position 7,
alter ATIVO position 8,
alter TEMPO position 9;
commit;

/************************************************************
	Arquivo AgRet     >> nada a ver com as consultas complementares
************************************************************/
drop trigger arqAgRet_log;
drop view v_arqAgRet;
commit;

ALTER TABLE arqAgRet drop Prontuario, drop Nome, drop NumCelular;
commit;

ALTER TABLE arqAgRet
add /*  7*/	PESSOA ligadoComArquivo; /* Ligado com o Arquivo Pessoa */
commit;

ALTER TABLE arqAgRet ADD PRONTUARIO VARCHAR( 9 ) computed by ( CASE
	WHEN( Consulta > 0 ) THEN( ( COALESCE( ( SELECT Prontuario FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( arqAgRet.Consulta ) ), 0 ) )  ), '' ) ) )
	ELSE ( ( COALESCE( ( SELECT Prontuario FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqAgRet.Pessoa )  ), '' ) ) )
	END  ); 
ALTER TABLE arqAgRet ADD NOME VARCHAR( 60 ) computed by ( CASE
	WHEN( Consulta > 0 ) THEN( ( COALESCE( ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( arqAgRet.Consulta ) ), 0 ) )  ), '' ) ) )
	ELSE ( ( COALESCE( ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqAgRet.Pessoa )  ), '' ) ) )
	END  ); 
ALTER TABLE arqAgRet ADD NUMCELULAR VARCHAR( 11 ) computed by ( CASE
	WHEN( Consulta > 0 ) THEN( ( COALESCE( ( SELECT NumCelular FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( arqAgRet.Consulta ) ), 0 ) )  ), '' ) ) )
	ELSE ( ( COALESCE( ( SELECT NumCelular FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqAgRet.Pessoa )  ), '' ) ) )
	END  ); 
commit;

ALTER TABLE arqAgRet ADD CONSTRAINT arqAgRet_FK_Pessoa FOREIGN KEY ( PESSOA ) REFERENCES arqPessoa ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqAgRet AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.DATA, A0.DIA, A0.HORA, A0.CONSULTA, A2.NUM as CONSULTA_NUM, A0.PESSOA, A3.NOME as PESSOA_NOME, A3.NUMCELULAR as PESSOA_NUMCELULAR, A0.PRONTUARIO, A0.NOME, A0.NUMCELULAR, A0.TSTAGRET, A4.CHAVE as TStAgRet_CHAVE, A4.DESCRITOR as TStAgRet_DESCRITOR, A0.ASSESSOR, A5.USUARIO as ASSESSOR_USUARIO, A0.OBS
	FROM arqAgRet A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqConsulta A2 on A2.IDPRIMARIO = A0.CONSULTA
	left join arqPessoa A3 on A3.IDPRIMARIO = A0.PESSOA
	left join tabTStAgRet A4 on A4.IDPRIMARIO=A0.TSTAGRET
	left join arqUsuario A5 on A5.IDPRIMARIO = A0.ASSESSOR;
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
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'TStAgRet', OLD.TStAgRet, NEW.TStAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'Assessor', OLD.Assessor, NEW.Assessor );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
end
end^

set term ;^

commit;

ALTER TABLE arqAgRet
alter IDPRIMARIO position 1,
alter CLINICA position 2,
alter DATA position 3,
alter DIA position 4,
alter HORA position 5,
alter CONSULTA position 6,
alter PESSOA position 7,
alter PRONTUARIO position 8,
alter NOME position 9,
alter NUMCELULAR position 10,
alter TSTAGRET position 11,
alter ASSESSOR position 12,
alter OBS position 13;
commit;

--*	Arquivo Pessoa    
--* Criado para saber se o cliente tem direito a agendar uma consulta complementar
drop trigger arqPessoa_log;
drop view v_arqPessoa;
commit;

ALTER TABLE arqPessoa
add /* 31*/	QTASCOMPLE INTEGER; /* M�scara = N */
commit;

update arqPessoa set QtasComple=0;
commit;

RECREATE VIEW V_arqPessoa AS 
	SELECT A0.IDPRIMARIO, A0.NOME, A0.APELIDO, A0.NUMCELULAR, A0.PRONTUARIO, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.NASCIMENTO, A0.IDADE, A0.SEXO, A4.CHAVE as Sexo_CHAVE, A4.DESCRITOR as Sexo_DESCRITOR, A0.ESTCIVIL, A5.CHAVE as EstCivil_CHAVE, A5.DESCRITOR as EstCivil_DESCRITOR, A0.PROFISSAO, A6.PROFISSAO as PROFISSAO_PROFISSAO, A0.CPF, A0.IDENTIDADE, A0.ORGAO, A0.EMISSAO, A0.EMAIL, A0.RECEMAIL, A0.ATIVO, A0.OBS, A0.DESDE, A0.QTODESMAR, A0.MIDIA, A7.MIDIA as MIDIA_MIDIA, A0.QTASCOMPLE
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
	valorChave = coalesce( OLD.Nome,'' ) || coalesce( OLD.NumCelular,'' );
else
	valorChave = coalesce( NEW.Nome,'' ) || coalesce( NEW.NumCelular,'' );
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
	execute procedure set_log( 12, NEW.idPrimario, 'NumCelular', OLD.NumCelular, NEW.NumCelular );
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

/************************************************************
	Trigger para arqConsulta: Quantos - atua em arqPessoa.QtasComple
************************************************************/

set term ^;

recreate trigger arqPessoa_QtasComple for arqConsulta
active after Insert or Update or Delete
as
declare variable v1 SMALLINT;
begin
if( updating or inserting ) then begin
Select P.Complemen From arqPtrata P Where P.idPrimario= NEW.PTrata into :v1;
if( ( :v1 = 1 ) ) then begin
update arqPessoa set arqPessoa.QtasComple = arqPessoa.QtasComple + 
1
 where arqPessoa.IDPRIMARIO = NEW.Pessoa;
end
end
if( updating or deleting ) then begin
Select P.Complemen From arqPtrata P Where P.idPrimario= OLD.PTrata into :v1;
if( ( :v1 = 1 ) ) then begin
update arqPessoa set arqPessoa.QtasComple = arqPessoa.QtasComple - 
1
 where arqPessoa.IDPRIMARIO = OLD.Pessoa;
end
end
end^

set term ;^
commit;

alter trigger arqLogEmail_Lidos inactive;
alter trigger arqConta_TrgValor inactive;
alter trigger arqConta_TrgValLiq inactive;
alter trigger arqConta_TrgQtdParc inactive;
alter trigger arqConta_TrgQParcPg inactive;
alter trigger arqConta_ProxVenc inactive;
alter trigger arqConta_TrgPago inactive;
alter trigger arqComCall_TrgQtoFx inactive;
alter trigger arqMedicamen_TrgItLote inactive;
alter trigger arqMedicamen_TrgCMLote inactive;
alter trigger arqLote_TrgItMov inactive;
alter trigger arqLote_TrgCMedica inactive;
alter trigger arqConsulta_TrgQtdM inactive;
alter trigger arqConsulta_TrgQtdMEnt inactive;
alter trigger arqPessoa_QtasComple inactive;
alter trigger arqBairro_log inactive;
alter trigger arqCidade_log inactive;
alter trigger arqGrupo_log inactive;
alter trigger arqUsuario_log inactive;
alter trigger arqPessoa_log inactive;
alter trigger arqTemplate_log inactive;
alter trigger arqEmailRemet_log inactive;
alter trigger arqAcaoEmail_log inactive;
alter trigger arqImagemCRM_log inactive;
alter trigger arqLogEmail_log inactive;
alter trigger arqAvisos_log inactive;
alter trigger arqParaGrupo_log inactive;
alter trigger arqLido_log inactive;
alter trigger cnfXConfig_log inactive;
alter trigger arqBanco_log inactive;
alter trigger arqCCor_log inactive;
alter trigger arqContPessoa_log inactive;
alter trigger arqDocMod_log inactive;
alter trigger arqPlano_log inactive;
alter trigger arqSubPlano_log inactive;
alter trigger arqMidia_log inactive;
alter trigger arqClinica_log inactive;
alter trigger arqPTrata_log inactive;
alter trigger arqConta_log inactive;
alter trigger arqParcela_log inactive;
alter trigger arqUsuCli_log inactive;
alter trigger arqProfissao_log inactive;
alter trigger arqHoraBloq_log inactive;
alter trigger arqDuracao_log inactive;
alter trigger arqPlantao_log inactive;
alter trigger arqFornecedor_log inactive;
alter trigger arqFormaPg_log inactive;
alter trigger arqRecorrente_log inactive;
alter trigger arqCliMidia_log inactive;
alter trigger arqComCall_log inactive;
alter trigger arqFxComCall_log inactive;
alter trigger arqUnidade_log inactive;
alter trigger arqMedicamen_log inactive;
alter trigger arqAgRet_log inactive;
alter trigger arqCMedica_log inactive;
alter trigger arqLote_log inactive;
alter trigger arqMovEstoque_log inactive;
alter trigger arqItemMov_log inactive;
alter trigger arqUsuCCor_log inactive;
commit;

/************************************************************
	Trigger para arqConsulta: Quantos - inicializa��o de arqPessoa.QtasComple
************************************************************/

set term ^;

create trigger arqPessoa_QtasComple_X for arqConsulta
active after Update
as
declare variable v1 SMALLINT;
begin
Select P.Complemen From arqPtrata P Where P.idPrimario= NEW.PTrata into :v1;
if( ( :v1 = 1 ) ) then begin
update arqPessoa set arqPessoa.QtasComple = arqPessoa.QtasComple + 
1
 where arqPessoa.IDPRIMARIO = NEW.Pessoa;
end
end^

set term ;^
commit;
update arqPessoa set QtasComple=0;
update arqConsulta set IDPRIMARIO=IDPRIMARIO;
commit;
drop trigger arqPessoa_QtasComple_X;
commit;

alter trigger arqLogEmail_Lidos active;
alter trigger arqConta_TrgValor active;
alter trigger arqConta_TrgValLiq active;
alter trigger arqConta_TrgQtdParc active;
alter trigger arqConta_TrgQParcPg active;
alter trigger arqConta_ProxVenc active;
alter trigger arqConta_TrgPago active;
alter trigger arqComCall_TrgQtoFx active;
alter trigger arqMedicamen_TrgItLote active;
alter trigger arqMedicamen_TrgCMLote active;
alter trigger arqLote_TrgItMov active;
alter trigger arqLote_TrgCMedica active;
alter trigger arqConsulta_TrgQtdM active;
alter trigger arqConsulta_TrgQtdMEnt active;
alter trigger arqPessoa_QtasComple active;
alter trigger arqBairro_log active;
alter trigger arqCidade_log active;
alter trigger arqGrupo_log active;
alter trigger arqUsuario_log active;
alter trigger arqPessoa_log active;
alter trigger arqTemplate_log active;
alter trigger arqEmailRemet_log active;
alter trigger arqAcaoEmail_log active;
alter trigger arqImagemCRM_log active;
alter trigger arqLogEmail_log active;
alter trigger arqAvisos_log active;
alter trigger arqParaGrupo_log active;
alter trigger arqLido_log active;
alter trigger cnfXConfig_log active;
alter trigger arqBanco_log active;
alter trigger arqCCor_log active;
alter trigger arqContPessoa_log active;
alter trigger arqDocMod_log active;
alter trigger arqPlano_log active;
alter trigger arqSubPlano_log active;
alter trigger arqMidia_log active;
alter trigger arqClinica_log active;
alter trigger arqPTrata_log active;
alter trigger arqConta_log active;
alter trigger arqParcela_log active;
alter trigger arqUsuCli_log active;
alter trigger arqProfissao_log active;
alter trigger arqHoraBloq_log active;
alter trigger arqDuracao_log active;
alter trigger arqPlantao_log active;
alter trigger arqFornecedor_log active;
alter trigger arqFormaPg_log active;
alter trigger arqRecorrente_log active;
alter trigger arqCliMidia_log active;
alter trigger arqComCall_log active;
alter trigger arqFxComCall_log active;
alter trigger arqUnidade_log active;
alter trigger arqMedicamen_log active;
alter trigger arqAgRet_log active;
alter trigger arqCMedica_log active;
alter trigger arqLote_log active;
alter trigger arqMovEstoque_log active;
alter trigger arqItemMov_log active;
alter trigger arqUsuCCor_log active;
commit;

--*	Arquivo TStCon    
--* Criado para substituir a tabTStCon, que deixarei para excluir na pr�xima vers�o
--* Criei os registros com os mesmos idPrimarios e nomes da tabTStCon
--* Peguei as cores da API get_arqStatus.php

CREATE TABLE arqTStCon
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	STATUS VARCHAR( 20 ) COLLATE PT_BR, /* M�scara = I */
	/*  3*/	ORDEM SMALLINT, /* M�scara = N */
	/*  4*/	COR VARCHAR( 7 ) COLLATE PT_BR, /* M�scara = X */
	/*  5*/	FUNDO VARCHAR( 7 ) COLLATE PT_BR, /* M�scara = X */
	/*  6*/	ATIVO campoLogico, /* L�gico: 0=N�o 1=Sim */
	CONSTRAINT arqTStCon_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqTStCon_UK UNIQUE ( Status )
);
commit;

CREATE DESC INDEX arqTStCon_IdPrimario_Desc ON arqTStCon (IDPRIMARIO);
commit;

RECREATE VIEW V_arqTStCon AS 
	SELECT A0.IDPRIMARIO, A0.STATUS, A0.ORDEM, A0.COR, A0.FUNDO, A0.ATIVO
	FROM arqTStCon A0;
commit;

INSERT INTO arqTStCon VALUES (  1, 'AGENDADO', 1, '#ffffff', '#52a3ff', 1 );
INSERT INTO arqTStCon VALUES (  2, 'RECEP��O', 2, '#ffffff', '#004499', 1 );
INSERT INTO arqTStCon VALUES (  3, 'M�DICO', 3, '#ffffff', '#49b13a', 1 );
INSERT INTO arqTStCon VALUES (  4, 'TESTE', 4, '#ffffff', '#ec8f0d', 1 );
INSERT INTO arqTStCon VALUES (  5, 'AG. ASSESSOR', 5, '#ffffff', '#949394', 1 );
INSERT INTO arqTStCon VALUES (  6, 'ASSESSOR', 6, '#ffffff', '#a4bcd4', 1 );
INSERT INTO arqTStCon VALUES (  7, 'ATENDIDO', 7, '#ffffff', 'green', 1 );
INSERT INTO arqTStCon VALUES (  8, 'LIBERADO', 8, '#ffffff', 'red', 1 );
INSERT INTO arqTStCon VALUES (  9, 'CL�NICA DESMARCOU', 9, '#ffffff', '#918600', 1 );
INSERT INTO arqTStCon VALUES ( 10, 'PACIENTE DESMARCOU', 10, '#ffffff', '#00ff88', 1 );
INSERT INTO arqTStCon VALUES ( 11, 'M�DICO DESMARCOU', 11, '#ffffff', '#ff3388', 1 );
commit;

--*	Arquivo Consulta  
--* Trocar do campo TStCon LIG com tabela para LIG com arquivo
ALTER TABLE arqConsulta Drop CONSTRAINT arqConsulta_FK_TStCon;
commit;

ALTER TABLE arqConsulta alter TStCon to TStCon1;
commit;

ALTER TABLE arqConsulta
add /*  5*/	TSTCON ligadoComArquivo; /* Ligado com o Arquivo TStCon */
commit;

ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_TStCon FOREIGN KEY ( TSTCON ) REFERENCES arqTStCon ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

ALTER TABLE arqConsulta Drop CONSTRAINT arqConsulta_FK_TStCon;
commit;
update arqConsulta set TStCon=TStCon1;
commit;

ALTER TABLE arqConsulta drop TStCon1;
commit;

RECREATE VIEW V_arqConsulta AS 
	SELECT A0.IDPRIMARIO, A0.NUM, A0.TICONSULTA, A1.TICONSULTA as TICONSULTA_TICONSULTA, A0.CLINICA, A2.CLINICA as CLINICA_CLINICA, A0.TSTCON, A3.STATUS as TSTCON_STATUS, A0.TIAGENDA, A4.TIAGENDA as TIAGENDA_TIAGENDA, A0.DATA, A0.HORA, A0.HORACHEGA, A0.PESSOA, A5.NOME as PESSOA_NOME, A5.NUMCELULAR as PESSOA_NUMCELULAR, A0.PRONTUARIO, A0.MEDICO, A6.USUARIO as MEDICO_USUARIO, A0.ASSESSOR, A7.USUARIO as ASSESSOR_USUARIO, A0.CALLCENTER, A8.USUARIO as CALLCENTER_USUARIO, A0.MEDICAATUA, A0.TMOTIVO, A9.CHAVE as TMotivo_CHAVE, A9.DESCRITOR as TMotivo_DESCRITOR, A0.CORTESIA, A0.VALOR, A0.FORMAPG, A10.FORMAPG as FORMAPG_FORMAPG, A0.VALOR2, A0.FORMAPG2, A11.FORMAPG as FORMAPG2_FORMAPG, A0.PTRATA, A12.PTRATA as PTRATA_PTRATA, A0.VALPTRATA, A0.ENTRAFPG, A13.FORMAPG as ENTRAFPG_FORMAPG, A0.ENTRAVAL, A0.ENTRAPARCE, A0.ENTRAPARC, A0.SDENTRFPG, A14.FORMAPG as SDENTRFPG_FORMAPG, A0.SDVENC1PAR, A0.SDCOND, A0.ENTRAVALP, A0.ENTRATOTP, A0.ENTRATOTAL, A0.BOLETOMIN, A0.ENTRAOBS, A0.SALDOFPG, A15.FORMAPG as SALDOFPG_FORMAPG, A0.SALDOPARC, A0.SALDOCOND, A0.SALDOVAL, A0.SALDOOBS, A0.CONDUTA, A0.MEDICACAO, A0.OBS, A0.CONTACONS, A16.TRANSACAO as CONTACONS_TRANSACAO, A0.CONTAPTRA, A17.TRANSACAO as CONTAPTRA_TRANSACAO, A0.TRGQTDM, A0.TRGQTDMENT, A0.SALDO, A0.QUEMAGRET, A18.USUARIO as QUEMAGRET_USUARIO, A0.QDOAGRET, A0.DATARET, A0.DIARET, A0.HORARET, A0.TSTAGRET, A19.CHAVE as TStAgRet_CHAVE, A19.DESCRITOR as TStAgRet_DESCRITOR, A0.ASSESRET, A20.USUARIO as ASSESRET_USUARIO, A0.OBSRET
	FROM arqConsulta A0
	left join arqTiConsulta A1 on A1.IDPRIMARIO = A0.TICONSULTA
	left join arqClinica A2 on A2.IDPRIMARIO = A0.CLINICA
	left join arqTStCon A3 on A3.IDPRIMARIO = A0.TSTCON
	left join arqTiAgenda A4 on A4.IDPRIMARIO = A0.TIAGENDA
	left join arqPessoa A5 on A5.IDPRIMARIO = A0.PESSOA
	left join arqUsuario A6 on A6.IDPRIMARIO = A0.MEDICO
	left join arqUsuario A7 on A7.IDPRIMARIO = A0.ASSESSOR
	left join arqUsuario A8 on A8.IDPRIMARIO = A0.CALLCENTER
	left join tabTMotivo A9 on A9.IDPRIMARIO=A0.TMOTIVO
	left join arqFormaPg A10 on A10.IDPRIMARIO = A0.FORMAPG
	left join arqFormaPg A11 on A11.IDPRIMARIO = A0.FORMAPG2
	left join arqPTrata A12 on A12.IDPRIMARIO = A0.PTRATA
	left join arqFormaPg A13 on A13.IDPRIMARIO = A0.ENTRAFPG
	left join arqFormaPg A14 on A14.IDPRIMARIO = A0.SDENTRFPG
	left join arqFormaPg A15 on A15.IDPRIMARIO = A0.SALDOFPG
	left join arqConta A16 on A16.IDPRIMARIO = A0.CONTACONS
	left join arqConta A17 on A17.IDPRIMARIO = A0.CONTAPTRA
	left join arqUsuario A18 on A18.IDPRIMARIO = A0.QUEMAGRET
	left join tabTStAgRet A19 on A19.IDPRIMARIO=A0.TSTAGRET
	left join arqUsuario A20 on A20.IDPRIMARIO = A0.ASSESRET;
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
	execute procedure set_log( 12, NEW.idPrimario, 'Cortesia', OLD.Cortesia, NEW.Cortesia );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg', OLD.FormaPg, NEW.FormaPg );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor2', OLD.Valor2, NEW.Valor2 );
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg2', OLD.FormaPg2, NEW.FormaPg2 );
	execute procedure set_log( 12, NEW.idPrimario, 'PTrata', OLD.PTrata, NEW.PTrata );
	execute procedure set_log( 12, NEW.idPrimario, 'ValPTrata', OLD.ValPTrata, NEW.ValPTrata );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraFPg', OLD.EntraFPg, NEW.EntraFPg );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraVal', OLD.EntraVal, NEW.EntraVal );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraParcE', OLD.EntraParcE, NEW.EntraParcE );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraParc', OLD.EntraParc, NEW.EntraParc );
	execute procedure set_log( 12, NEW.idPrimario, 'SdEntrFPg', OLD.SdEntrFPg, NEW.SdEntrFPg );
	execute procedure set_log( 12, NEW.idPrimario, 'SdVenc1Par', OLD.SdVenc1Par, NEW.SdVenc1Par );
	execute procedure set_log( 12, NEW.idPrimario, 'SdCond', OLD.SdCond, NEW.SdCond );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraValP', OLD.EntraValP, NEW.EntraValP );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraObs', OLD.EntraObs, NEW.EntraObs );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoFPg', OLD.SaldoFPg, NEW.SaldoFPg );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoParc', OLD.SaldoParc, NEW.SaldoParc );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoCond', OLD.SaldoCond, NEW.SaldoCond );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoObs', OLD.SaldoObs, NEW.SaldoObs );
	execute procedure set_log( 12, NEW.idPrimario, 'Conduta', substring( OLD.Conduta from 1 for 255 ), substring( NEW.Conduta from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Medicacao', substring( OLD.Medicacao from 1 for 255 ), substring( NEW.Medicacao from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'ContaCons', OLD.ContaCons, NEW.ContaCons );
	execute procedure set_log( 12, NEW.idPrimario, 'ContaPTra', OLD.ContaPTra, NEW.ContaPTra );
	execute procedure set_log( 12, NEW.idPrimario, 'QuemAgRet', OLD.QuemAgRet, NEW.QuemAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'QdoAgRet', OLD.QdoAgRet, NEW.QdoAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'DataRet', OLD.DataRet, NEW.DataRet );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraRet', OLD.HoraRet, NEW.HoraRet );
	execute procedure set_log( 12, NEW.idPrimario, 'TStAgRet', OLD.TStAgRet, NEW.TStAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'AssesRet', OLD.AssesRet, NEW.AssesRet );
	execute procedure set_log( 12, NEW.idPrimario, 'ObsRet', substring( OLD.ObsRet from 1 for 255 ), substring( NEW.ObsRet from 1 for 255 ) );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.TiConsulta is distinct from OLD.TiConsulta )  OR 
		( NEW.BoletoMin is distinct from OLD.BoletoMin )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

ALTER TABLE arqConsulta
alter IDPRIMARIO position 1,
alter NUM position 2,
alter TICONSULTA position 3,
alter CLINICA position 4,
alter TSTCON position 5,
alter TIAGENDA position 6,
alter DATA position 7,
alter HORA position 8,
alter HORACHEGA position 9,
alter PESSOA position 10,
alter PRONTUARIO position 11,
alter MEDICO position 12,
alter ASSESSOR position 13,
alter CALLCENTER position 14,
alter MEDICAATUA position 15,
alter TMOTIVO position 16,
alter CORTESIA position 17,
alter VALOR position 18,
alter FORMAPG position 19,
alter VALOR2 position 20,
alter FORMAPG2 position 21,
alter PTRATA position 22,
alter VALPTRATA position 23,
alter ENTRAFPG position 24,
alter ENTRAVAL position 25,
alter ENTRAPARCE position 26,
alter ENTRAPARC position 27,
alter SDENTRFPG position 28,
alter SDVENC1PAR position 29,
alter SDCOND position 30,
alter ENTRAVALP position 31,
alter ENTRATOTP position 32,
alter ENTRATOTAL position 33,
alter BOLETOMIN position 34,
alter ENTRAOBS position 35,
alter SALDOFPG position 36,
alter SALDOPARC position 37,
alter SALDOCOND position 38,
alter SALDOVAL position 39,
alter SALDOOBS position 40,
alter CONDUTA position 41,
alter MEDICACAO position 42,
alter OBS position 43,
alter CONTACONS position 44,
alter CONTAPTRA position 45,
alter TRGQTDM position 46,
alter TRGQTDMENT position 47,
alter SALDO position 48,
alter QUEMAGRET position 49,
alter QDOAGRET position 50,
alter DATARET position 51,
alter DIARET position 52,
alter HORARET position 53,
alter TSTAGRET position 54,
alter ASSESRET position 55,
alter OBSRET position 56;
commit;

/************************************************************
	Arquivo TiAgenda  
************************************************************/
drop view v_arqTiAgenda;
commit;

ALTER TABLE arqTiAgenda
add /*  3*/	ORDEM SMALLINT, /* M�scara = N */
add /*  4*/	COMPLEMEN campoLogico; /* L�gico: 0=N�o 1=Sim */
commit;

update arqTiAgenda set Ordem=idPrimario;
update arqTiAgenda set Complemen=0;
update arqTiAgenda set Complemen=1 Where idPrimario=1;
commit;

RECREATE VIEW V_arqTiAgenda AS 
	SELECT A0.IDPRIMARIO, A0.TIAGENDA, A0.ORDEM, A0.ATIVO, A0.COMPLEMEN, A0.DOBROTEMPO, A0.PAGAMENTO, A0.MIDIA
	FROM arqTiAgenda A0;
commit;

ALTER TABLE arqTiAgenda
alter IDPRIMARIO position 1,
alter TIAGENDA position 2,
alter ORDEM position 3,
alter ATIVO position 4,
alter COMPLEMEN position 5,
alter DOBROTEMPO position 6,
alter PAGAMENTO position 7,
alter MIDIA position 8;
commit;

INSERT INTO ARQTIAGENDA (IDPRIMARIO, TIAGENDA, ORDEM, ATIVO, COMPLEMEN, DOBROTEMPO, PAGAMENTO, MIDIA) 
	VALUES (8, 'APLICA��O', 8, 1, 0, 0, 0, 0);
COMMIT WORK;
