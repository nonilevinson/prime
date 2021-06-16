--*
--* 1.00 para 1.01

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

update arqLanceOperacao set Operacao= 'Cadastro de horários bloqueados nas clínicas' Where idPrimario=100037;
commit;

/************************************************************
	Arquivo Horario
************************************************************/
drop trigger arqHorario_log;
drop view v_arqHorario;
drop TABLE arqHorario;
commit;

/************************************************************
	Arquivo Duracao
************************************************************/
drop trigger arqDuracao_log;
drop view v_arqDuracao;
commit;

ALTER TABLE arqDuracao drop Usuario;
commit;

ALTER TABLE arqDuracao
add /*  2*/	CLINICA ligadoComArquivo; /* Ligado com o Arquivo Clinica */
commit;

ALTER TABLE arqDuracao ADD CONSTRAINT arqDuracao_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqDuracao AS
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.INICIO, A0.DURACAO, A0.MAXAGENDA
	FROM arqDuracao A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA;
commit;

/************************************************************
	Trigger para Log de arqDuracao
************************************************************/

set term ^;

recreate trigger arqDuracao_LOG for arqDuracao
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
	valorChave='';
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100038 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Inicio', OLD.Inicio, NEW.Inicio );
	execute procedure set_log( 12, NEW.idPrimario, 'Duracao', OLD.Duracao, NEW.Duracao );
	execute procedure set_log( 12, NEW.idPrimario, 'MaxAgenda', OLD.MaxAgenda, NEW.MaxAgenda );
end
end^

set term ;^

commit;

ALTER TABLE arqDuracao
alter IDPRIMARIO position 1,
alter CLINICA position 2,
alter INICIO position 3,
alter DURACAO position 4,
alter MAXAGENDA position 5;
commit;

/************************************************************
	Arquivo Clinica
************************************************************/
drop trigger arqClinica_log;
drop view v_arqClinica;
commit;

ALTER TABLE arqClinica
add /* 16*/	HORAINI TIME, /* Máscara = Hhmm */
add /* 17*/	HORAFIM TIME, /* Máscara = Hhmm */
add /* 18*/	CONSSAB campoLogico, /* Lógico: 0=Não 1=Sim */
add /* 19*/	CONSDOM campoLogico; /* Lógico: 0=Não 1=Sim */
commit;

update arqClinica set HoraIni='08:00:00', HoraFim='20:00:00', ConsSab=0, ConsDom=0;
commit;

RECREATE VIEW V_arqClinica AS
	SELECT A0.IDPRIMARIO, A0.CLINICA, A0.RAZAO, A0.EMAIL, A0.CNPJ, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.ATIVO, A0.HORAINI, A0.HORAFIM, A0.CONSSAB, A0.CONSDOM
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
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraIni', OLD.HoraIni, NEW.HoraIni );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraFim', OLD.HoraFim, NEW.HoraFim );
	execute procedure set_log( 12, NEW.idPrimario, 'ConsSab', OLD.ConsSab, NEW.ConsSab );
	execute procedure set_log( 12, NEW.idPrimario, 'ConsDom', OLD.ConsDom, NEW.ConsDom );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo HoraBloq
************************************************************/

CREATE TABLE arqHoraBloq
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  3*/	NOME VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = I */
	/*  4*/	DATAINI DATE, /* Máscara = 4ano */
	/*  5*/	HORAINI TIME, /* Máscara = Hhmm */
	/*  6*/	DATAFIM DATE, /* Máscara = 4ano */
	/*  7*/	HORAFIM TIME, /* Máscara = Hhmm */
	CONSTRAINT arqHoraBloq_PK PRIMARY KEY ( IDPRIMARIO )
);
commit;

CREATE DESC INDEX arqHoraBloq_IdPrimario_Desc ON arqHoraBloq (IDPRIMARIO);
commit;

ALTER TABLE arqHoraBloq ADD CONSTRAINT arqHoraBloq_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqHoraBloq AS
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.NOME, A0.DATAINI, A0.HORAINI, A0.DATAFIM, A0.HORAFIM
	FROM arqHoraBloq A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA;
commit;

/************************************************************
	Trigger para Log de arqHoraBloq
************************************************************/

set term ^;

recreate trigger arqHoraBloq_LOG for arqHoraBloq
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
	valorChave='';
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100037 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'DataIni', OLD.DataIni, NEW.DataIni );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraIni', OLD.HoraIni, NEW.HoraIni );
	execute procedure set_log( 12, NEW.idPrimario, 'DataFim', OLD.DataFim, NEW.DataFim );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraFim', OLD.HoraFim, NEW.HoraFim );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo Consulta
************************************************************/
drop trigger arqConsulta_log;
drop view v_arqConsulta;
drop TRIGGER ARQCONSULTA_PRONTUARIO;
commit;

ALTER TABLE arqConsulta drop CONSTRAINT arqConsulta_UK;
ALTER TABLE arqConsulta drop Recepcao;
commit;

ALTER TABLE arqConsulta alter Prontuario to Num;
commit;

ALTER TABLE arqConsulta
add /*  4*/	TSTCON ligadoComTabela; /* Ligado com a Tabela TStCon */
commit;

update arqConsulta set TStCon=1;
commit;

ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_TStCon FOREIGN KEY ( TSTCON ) REFERENCES tabTStCon ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqConsulta add CONSTRAINT arqConsulta_UK UNIQUE ( Num );
commit;

RECREATE VIEW V_arqConsulta AS
	SELECT A0.IDPRIMARIO, A0.NUM, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.TSTCON, A2.CHAVE as TStCon_CHAVE, A2.DESCRITOR as TStCon_DESCRITOR, A0.DATA, A0.HORA, A0.HORACHEGA, A0.PESSOA, A3.NOME as PESSOA_NOME, A0.MEDICO, A4.USUARIO as MEDICO_USUARIO, A0.MKT, A5.USUARIO as MKT_USUARIO, A0.ASSESSOR, A6.USUARIO as ASSESSOR_USUARIO, A0.MEDICAATUA, A0.TMOTIVO, A7.CHAVE as TMotivo_CHAVE, A7.DESCRITOR as TMotivo_DESCRITOR, A0.TPROGRAMA, A8.CHAVE as TPrograma_CHAVE, A8.DESCRITOR as TPrograma_DESCRITOR, A0.CONDUTA, A0.MEDICACAO
	FROM arqConsulta A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join tabTStCon A2 on A2.IDPRIMARIO=A0.TSTCON
	left join arqPessoa A3 on A3.IDPRIMARIO = A0.PESSOA
	left join arqUsuario A4 on A4.IDPRIMARIO = A0.MEDICO
	left join arqUsuario A5 on A5.IDPRIMARIO = A0.MKT
	left join arqUsuario A6 on A6.IDPRIMARIO = A0.ASSESSOR
	left join tabTMotivo A7 on A7.IDPRIMARIO=A0.TMOTIVO
	left join tabTPrograma A8 on A8.IDPRIMARIO=A0.TPROGRAMA;
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
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Hora', OLD.Hora, NEW.Hora );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraChega', OLD.HoraChega, NEW.HoraChega );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'Medico', OLD.Medico, NEW.Medico );
	execute procedure set_log( 12, NEW.idPrimario, 'Mkt', OLD.Mkt, NEW.Mkt );
	execute procedure set_log( 12, NEW.idPrimario, 'Assessor', OLD.Assessor, NEW.Assessor );
	execute procedure set_log( 12, NEW.idPrimario, 'MedicaAtua', substring( OLD.MedicaAtua from 1 for 255 ), substring( NEW.MedicaAtua from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'TMotivo', OLD.TMotivo, NEW.TMotivo );
	execute procedure set_log( 12, NEW.idPrimario, 'TPrograma', OLD.TPrograma, NEW.TPrograma );
	execute procedure set_log( 12, NEW.idPrimario, 'Conduta', substring( OLD.Conduta from 1 for 255 ), substring( NEW.Conduta from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Medicacao', substring( OLD.Medicacao from 1 for 255 ), substring( NEW.Medicacao from 1 for 255 ) );
end
end^

set term ;^

commit;

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

/***********************************************
	TRIGGER ARQCONSULTA_NUM
************************************************/

SET TERM ^^ ;
CREATE TRIGGER ARQCONSULTA_NUM FOR ARQCONSULTA ACTIVE BEFORE INSERT POSITION 1 AS

begin
  select coalesce( max( Num ) + 1, 1 ) from ARQCONSULTA into NEW.Num;
end ^^
SET TERM ; ^^

commit;

/************************************************************
	Arquivo Pessoa
************************************************************/
drop trigger arqPessoa_log;
drop view v_arqPessoa;
commit;

ALTER TABLE arqPessoa
add /*  6*/	PRONTUARIO NUMERIC(18,0); /* Máscara = N */
commit;

update arqPessoa set Prontuario = 0;
commit;

RECREATE VIEW V_arqPessoa AS
	SELECT A0.IDPRIMARIO, A0.NOME, A0.APELIDO, A0.TPESSOA, A1.CHAVE as TPessoa_CHAVE, A1.DESCRITOR as TPessoa_DESCRITOR, A0.TPFPJ, A2.CHAVE as TPFPJ_CHAVE, A2.DESCRITOR as TPFPJ_DESCRITOR, A0.PRONTUARIO, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A3.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A4.UF as ENDE_CIDADE_UF, A5.CHAVE as ENDE_CIDADE_UF_CHAVE, A5.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A4.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.CNPJ, A0.INSCESTAD, A0.INSCMUNIC, A0.NASCIMENTO, A0.IDADE, A0.SEXO, A6.CHAVE as Sexo_CHAVE, A6.DESCRITOR as Sexo_DESCRITOR, A0.ESTCIVIL, A7.CHAVE as EstCivil_CHAVE, A7.DESCRITOR as EstCivil_DESCRITOR, A0.PROFISSAO, A8.PROFISSAO as PROFISSAO_PROFISSAO, A0.CPF, A0.IDENTIDADE, A0.ORGAO, A0.EMISSAO, A0.EMAIL, A0.RECEMAIL, A0.ATIVO, A0.OBS, A0.DESDE, A0.QTODESMAR, A0.MIDIA, A9.MIDIA as MIDIA_MIDIA
	FROM arqPessoa A0
	left join tabTPessoa A1 on A1.IDPRIMARIO=A0.TPESSOA
	left join tabTPFPJ A2 on A2.IDPRIMARIO=A0.TPFPJ
	left join arqBairro A3 on A3.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A4 on A4.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A5 on A5.IDPRIMARIO=A4.UF
	left join tabSexo A6 on A6.IDPRIMARIO=A0.SEXO
	left join tabEstCivil A7 on A7.IDPRIMARIO=A0.ESTCIVIL
	left join arqProfissao A8 on A8.IDPRIMARIO = A0.PROFISSAO
	left join arqMidia A9 on A9.IDPRIMARIO = A0.MIDIA;
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
	valorChave = coalesce( OLD.Nome,'' );
else
	valorChave = coalesce( NEW.Nome,'' );
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
	execute procedure set_log( 12, NEW.idPrimario, 'TPessoa', OLD.TPessoa, NEW.TPessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'TPFPJ', OLD.TPFPJ, NEW.TPFPJ );
	execute procedure set_log( 12, NEW.idPrimario, 'Prontuario', OLD.Prontuario, NEW.Prontuario );
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
	Trigger para Log de arqTemplate
************************************************************/

set term ^;

recreate trigger arqTemplate_LOG for arqTemplate
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Nome,'' );
else
	valorChave = coalesce( NEW.Nome,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100008 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Template', substring( OLD.Template from 1 for 255 ), substring( NEW.Template from 1 for 255 ) );
end
end^

set term ;^

commit;

ALTER TABLE arqPessoa
alter IDPRIMARIO position 1,
alter NOME position 2,
alter APELIDO position 3,
alter TPESSOA position 4,
alter TPFPJ position 5,
alter PRONTUARIO position 6,
alter ENDE_CEP position 7,
alter ENDE_ENDERECO position 8,
alter ENDE_BAIRRO position 9,
alter ENDE_CIDADE position 10,
alter ENDE_DDD position 11,
alter ENDE_TELEFONE position 12,
alter ENDE_DDDCELULAR position 13,
alter ENDE_CELULAR position 14,
alter ENDE_WHATSAPP position 15,
alter CNPJ position 16,
alter INSCESTAD position 17,
alter INSCMUNIC position 18,
alter NASCIMENTO position 19,
alter IDADE position 20,
alter SEXO position 21,
alter ESTCIVIL position 22,
alter PROFISSAO position 23,
alter CPF position 24,
alter IDENTIDADE position 25,
alter ORGAO position 26,
alter EMISSAO position 27,
alter EMAIL position 28,
alter RECEMAIL position 29,
alter ATIVO position 30,
alter OBS position 31,
alter DESDE position 32,
alter QTODESMAR position 33,
alter MIDIA position 34;
commit;

--*
create generator genProntuario;
set generator genProntuario to 0;
