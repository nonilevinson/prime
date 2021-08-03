--*
--* 1.04 para 1.05

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

delete from arqLanceOperacao where idPrimario=200138;
insert into arqLanceOperacao values(100043,1,'Cadastro de tipos de agendas [0]','arqTiAgenda',43,99,1,'');

insert into arqLanceOperacao values(100044,1,'Cadastro de formas de pagamento de consultas','arqFormaPg',44,1,0,'');
commit;

drop generator genProntuario;
commit;

/************************************************************
	Arquivo TiAgenda
************************************************************/

CREATE TABLE arqTiAgenda
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	TIAGENDA VARCHAR( 20 ) COLLATE PT_BR, /* Máscara = I */
	/*  3*/	DOBROTEMPO campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  4*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqTiAgenda_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqTiAgenda_UK UNIQUE ( TiAgenda )
);
commit;

CREATE DESC INDEX arqTiAgenda_IdPrimario_Desc ON arqTiAgenda (IDPRIMARIO);
commit;

RECREATE VIEW V_arqTiAgenda AS
	SELECT A0.IDPRIMARIO, A0.TIAGENDA, A0.DOBROTEMPO, A0.ATIVO
	FROM arqTiAgenda A0;
commit;

insert into arqTiAgenda values( 1, 'Novo',1, 1);
insert into arqTiAgenda values( 2, 'Exames',1, 1);
insert into arqTiAgenda values( 3, 'Teste',1, 1);
insert into arqTiAgenda values( 4, 'Retorno',1, 1);
insert into arqTiAgenda values( 5, 'Retorno OSP',0, 1);
commit;

/************************************************************
	Arquivo FormaPg
************************************************************/

CREATE TABLE arqFormaPg
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	FORMAPG VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = I */
	/*  3*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqFormaPg_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqFormaPg_UK UNIQUE ( FormaPg )
);
commit;

CREATE DESC INDEX arqFormaPg_IdPrimario_Desc ON arqFormaPg (IDPRIMARIO);
commit;

RECREATE VIEW V_arqFormaPg AS
	SELECT A0.IDPRIMARIO, A0.FORMAPG, A0.ATIVO
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
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

insert into arqFormaPg values( 1, 'Dinheiro', 1 );
insert into arqFormaPg values( 2, 'Cartão de débito', 1 );
insert into arqFormaPg values( 3, 'Cartão de crédito', 1 );
insert into arqFormaPg values( 4, 'PIX', 1 );
insert into arqFormaPg values( 5, 'TED', 1 );
commit;

/************************************************************
	Arquivo Consulta
************************************************************/
drop trigger arqConsulta_log;
drop view v_arqConsulta;
commit;

ALTER TABLE arqConsulta drop Mkt;
commit;

ALTER TABLE arqConsulta
add /*  5*/	TIAGENDA ligadoComArquivo, /* Ligado com o Arquivo TiAgenda */
add /* 18*/	FORMAPG ligadoComArquivo, /* Ligado com o Arquivo FormaPg */
add /* 19*/	OBS BLOB SUB_TYPE 1 COLLATE PT_BR; /* Máscara =  */
commit;

/************************************************************
	Arquivo Pessoa
************************************************************/
drop trigger arqConta_log;
drop view v_arqConta;
commit;

drop view v_arqItlogEmail;
commit;

drop trigger arqLogEmail_log;
drop view v_arqLogEmail;
commit;

drop trigger arqContPessoa_log;
drop view v_arqContPessoa;
commit;

drop trigger arqPessoa_log;
drop view v_arqPessoa;
commit;

ALTER TABLE arqPessoa drop CONSTRAINT arqPessoa_UK;
commit;

ALTER TABLE arqPessoa alter Prontuario to Prontu;
commit;

ALTER TABLE arqPessoa
add /*  4*/	NUMCELULAR VARCHAR( 11 ) COLLATE PT_BR, /* Máscara = (nn) n.nnnn.nnn */
add /*  5*/	PRONTUARIO VARCHAR( 9 ) COLLATE PT_BR; /* Máscara = X */
commit;

update arqPessoa set NumCelular=Ende_DDDCelular || Ende_Celular, Prontuario=Prontu;
commit;

update arqPessoa set Ende_DDDCelular=0, Ende_Celular='';
commit;

ALTER TABLE arqPessoa drop Prontu;
commit;

ALTER TABLE arqPessoa add CONSTRAINT arqPessoa_UK UNIQUE ( Nome, NumCelular );
commit;

RECREATE VIEW V_arqPessoa AS
	SELECT A0.IDPRIMARIO, A0.NOME, A0.APELIDO, A0.NUMCELULAR, A0.PRONTUARIO, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.NASCIMENTO, A0.IDADE, A0.SEXO, A4.CHAVE as Sexo_CHAVE, A4.DESCRITOR as Sexo_DESCRITOR, A0.ESTCIVIL, A5.CHAVE as EstCivil_CHAVE, A5.DESCRITOR as EstCivil_DESCRITOR, A0.PROFISSAO, A6.PROFISSAO as PROFISSAO_PROFISSAO, A0.CPF, A0.IDENTIDADE, A0.ORGAO, A0.EMISSAO, A0.EMAIL, A0.RECEMAIL, A0.ATIVO, A0.OBS, A0.DESDE, A0.QTODESMAR, A0.MIDIA, A7.MIDIA as MIDIA_MIDIA
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
	Arquivo Consulta > FINAL
************************************************************/
ALTER TABLE arqConsulta ADD PRONTUARIO VARCHAR( 9 ) computed by ( ( COALESCE( ( SELECT Prontuario FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqConsulta.Pessoa )  ), '' ) ) );
commit;

update arqConsulta set TiAgenda=1;
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
alter MEDICAATUA position 13,
alter TMOTIVO position 14,
alter TPROGRAMA position 15,
alter CONDUTA position 16,
alter MEDICACAO position 17,
alter FORMAPG position 18,
alter OBS position 19;
commit;

RECREATE VIEW V_arqConsulta AS
	SELECT A0.IDPRIMARIO, A0.NUM, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.TSTCON, A2.CHAVE as TStCon_CHAVE, A2.DESCRITOR as TStCon_DESCRITOR, A0.TIAGENDA, A3.TIAGENDA as TIAGENDA_TIAGENDA, A0.DATA, A0.HORA, A0.HORACHEGA, A0.PESSOA, A4.NOME as PESSOA_NOME, A4.NUMCELULAR as PESSOA_NUMCELULAR, A0.PRONTUARIO, A0.MEDICO, A5.USUARIO as MEDICO_USUARIO, A0.ASSESSOR, A6.USUARIO as ASSESSOR_USUARIO, A0.MEDICAATUA, A0.TMOTIVO, A7.CHAVE as TMotivo_CHAVE, A7.DESCRITOR as TMotivo_DESCRITOR, A0.TPROGRAMA, A8.CHAVE as TPrograma_CHAVE, A8.DESCRITOR as TPrograma_DESCRITOR, A0.CONDUTA, A0.MEDICACAO, A0.FORMAPG, A9.FORMAPG as FORMAPG_FORMAPG, A0.OBS
	FROM arqConsulta A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join tabTStCon A2 on A2.IDPRIMARIO=A0.TSTCON
	left join arqTiAgenda A3 on A3.IDPRIMARIO = A0.TIAGENDA
	left join arqPessoa A4 on A4.IDPRIMARIO = A0.PESSOA
	left join arqUsuario A5 on A5.IDPRIMARIO = A0.MEDICO
	left join arqUsuario A6 on A6.IDPRIMARIO = A0.ASSESSOR
	left join tabTMotivo A7 on A7.IDPRIMARIO=A0.TMOTIVO
	left join tabTPrograma A8 on A8.IDPRIMARIO=A0.TPROGRAMA
	left join arqFormaPg A9 on A9.IDPRIMARIO = A0.FORMAPG;
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
	execute procedure set_log( 12, NEW.idPrimario, 'MedicaAtua', substring( OLD.MedicaAtua from 1 for 255 ), substring( NEW.MedicaAtua from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'TMotivo', OLD.TMotivo, NEW.TMotivo );
	execute procedure set_log( 12, NEW.idPrimario, 'TPrograma', OLD.TPrograma, NEW.TPrograma );
	execute procedure set_log( 12, NEW.idPrimario, 'Conduta', substring( OLD.Conduta from 1 for 255 ), substring( NEW.Conduta from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Medicacao', substring( OLD.Medicacao from 1 for 255 ), substring( NEW.Medicacao from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg', OLD.FormaPg, NEW.FormaPg );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
end
end^

set term ;^

commit;

RECREATE VIEW V_arqConta AS
	SELECT A0.IDPRIMARIO, A0.TRANSACAO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.TPGREC, A2.CHAVE as TPgRec_CHAVE, A2.DESCRITOR as TPgRec_DESCRITOR, A0.FORNECEDOR, A3.NOME as FORNECEDOR_NOME, A0.PESSOA, A4.NOME as PESSOA_NOME, A4.NUMCELULAR as PESSOA_NUMCELULAR, A0.NOME, A0.TRGVALOR, A0.TRGVALLIQ, A0.TRGQTDPARC, A0.TRGQPARCPG, A0.PROXVENC, A0.TRGPAGO, A0.SALDO, A0.DOCUMENTO, A0.EMISSAO, A0.RECENVIA, A0.COMPETE, A0.HISTORICO, A0.ARQ1, A0.Arq1_ARQUIVO
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

RECREATE VIEW V_arqItLogEmail AS
	SELECT A0.IDPRIMARIO, A0.LOGEMAIL, A1.TITULO as LOGEMAIL_TITULO, A2.TITULO as LOGEMAIL_TITULO_TITULO, A2.VERSAO as LOGEMAIL_TITULO_VERSAO, A1.DATA as LOGEMAIL_DATA, A1.HORA as LOGEMAIL_HORA, A0.CLIENTE, A3.NOME as CLIENTE_NOME, A3.NUMCELULAR as CLIENTE_NUMCELULAR, A0.EMAIL, A0.ENVIADO, A0.LIDO, A0.LINKEMP, A0.LINKKM
	FROM arqItLogEmail A0
	left join arqLogEmail A1 on A1.IDPRIMARIO = A0.LOGEMAIL
	left join arqAcaoEmail A2 on A2.IDPRIMARIO = A1.TITULO
	left join arqPessoa A3 on A3.IDPRIMARIO = A0.CLIENTE;
commit;

RECREATE VIEW V_arqLogEmail AS
	SELECT A0.IDPRIMARIO, A0.TITULO, A1.TITULO as TITULO_TITULO, A1.VERSAO as TITULO_VERSAO, A0.DATA, A0.HORA, A0.USUARIO, A2.USUARIO as USUARIO_USUARIO, A0.ENVIADOS, A0.NENVIADOS, A0.TOTAL, A0.LIDOS, A0.PERCLIDOS, A0.EMAILREMET, A0.HORAINI, A0.HORAFIM, A0.HORAREENV, A0.ENVIOU, A0.OPCAO, A0.CLIENTE, A3.NOME as CLIENTE_NOME, A3.NUMCELULAR as CLIENTE_NUMCELULAR
	FROM arqLogEmail A0
	left join arqAcaoEmail A1 on A1.IDPRIMARIO = A0.TITULO
	left join arqUsuario A2 on A2.IDPRIMARIO = A0.USUARIO
	left join arqPessoa A3 on A3.IDPRIMARIO = A0.CLIENTE;
commit;

/************************************************************
	Trigger para Log de arqLogEmail
************************************************************/

set term ^;

recreate trigger arqLogEmail_LOG for arqLogEmail
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Titulo_Titulo, ' ' ) || '-' || coalesce( Titulo_Versao, ' ' ) || '-' || coalesce( Data, ' ' ) || '-' || coalesce( Hora, ' ' ) from v_arqLogEmail where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100012 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Titulo', OLD.Titulo, NEW.Titulo );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Hora', OLD.Hora, NEW.Hora );
	execute procedure set_log( 12, NEW.idPrimario, 'Usuario', OLD.Usuario, NEW.Usuario );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailRemet', OLD.EmailRemet, NEW.EmailRemet );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Enviados is distinct from OLD.Enviados )  OR
		( NEW.NEnviados is distinct from OLD.NEnviados )  OR
		( NEW.HoraIni is distinct from OLD.HoraIni )  OR
		( NEW.HoraFim is distinct from OLD.HoraFim )  OR
		( NEW.HoraReenv is distinct from OLD.HoraReenv )  OR
		( NEW.Enviou is distinct from OLD.Enviou )  OR
		( NEW.Opcao is distinct from OLD.Opcao )  OR
		( NEW.Cliente is distinct from OLD.Cliente )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

RECREATE VIEW V_arqContPessoa AS
	SELECT A0.IDPRIMARIO, A0.FORNECEDOR, A1.NOME as FORNECEDOR_NOME, A0.PESSOA, A2.NOME as PESSOA_NOME, A2.NUMCELULAR as PESSOA_NUMCELULAR, A0.NOME, A0.APELIDO, A0.FUNCAO, A0.CELULAR, A0.TELEFONE, A0.EMAIL, A0.RECEMAIL, A0.NASCIMENTO, A0.SEXO, A3.CHAVE as Sexo_CHAVE, A3.DESCRITOR as Sexo_DESCRITOR, A0.OBS, A0.ATIVO
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

RECREATE VIEW V_arqParcela AS
	SELECT A0.IDPRIMARIO, A0.CONTA, A1.TRANSACAO as CONTA_TRANSACAO, A0.CLINICACAL, A0.TPGRECCAL, A0.PESSOACAL, A0.PARCELA, A0.VENCIMENTO, A0.VENCEST, A0.VALOR, A0.VALORLIQ, A0.ESTIMADO, A0.TFCOBRA, A2.CHAVE as TFCobra_CHAVE, A2.DESCRITOR as TFCobra_DESCRITOR, A0.EMISSAO, A0.NUMBOLETO, A0.LINHADIG, A0.NOMEPDF, A0.CCOR, A3.BANCO as CCOR_BANCO, A4.NUM as CCOR_BANCO_NUM, A4.BANCO as CCOR_BANCO_BANCO, A3.AGENCIA as CCOR_AGENCIA, A3.CONTA as CCOR_CONTA, A0.SUBPLANO, A5.PLANO as SUBPLANO_PLANO, A6.CODPLANO as SUBPLANO_PLANO_CODPLANO, A6.PLANO as SUBPLANO_PLANO_PLANO, A5.CODIGO as SUBPLANO_CODIGO, A5.NOME as SUBPLANO_NOME, A0.DATAPAGTO, A0.DATACOMP, A0.TFPAGTO, A7.CHAVE as TFPagto_CHAVE, A7.DESCRITOR as TFPagto_DESCRITOR, A0.TDETPG, A8.CHAVE as TDetPg_CHAVE, A8.DESCRITOR as TDetPg_DESCRITOR, A0.CHEQUE, A0.ARQ1, A0.Arq1_ARQUIVO, A0.STRETORNO, A0.REMESSA, A0.DATAREM
	FROM arqParcela A0
	left join arqConta A1 on A1.IDPRIMARIO = A0.CONTA
	left join tabTFCobra A2 on A2.IDPRIMARIO=A0.TFCOBRA
	left join arqCCor A3 on A3.IDPRIMARIO = A0.CCOR
	left join arqBanco A4 on A4.IDPRIMARIO = A3.BANCO
	left join arqSubPlano A5 on A5.IDPRIMARIO = A0.SUBPLANO
	left join arqPlano A6 on A6.IDPRIMARIO = A5.PLANO
	left join tabTFPagto A7 on A7.IDPRIMARIO=A0.TFPAGTO
	left join tabTDetPg A8 on A8.IDPRIMARIO=A0.TDETPG;
commit;

/************************************************************
	Trigger para Log de arqParcela
************************************************************/

set term ^;

recreate trigger arqParcela_LOG for arqParcela
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Conta_Transacao, ' ' ) || '-' || coalesce( Parcela, ' ' ) from v_arqParcela where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100034 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Conta', OLD.Conta, NEW.Conta );
	execute procedure set_log( 12, NEW.idPrimario, 'Parcela', OLD.Parcela, NEW.Parcela );
	execute procedure set_log( 12, NEW.idPrimario, 'Vencimento', OLD.Vencimento, NEW.Vencimento );
	execute procedure set_log( 12, NEW.idPrimario, 'VencEst', OLD.VencEst, NEW.VencEst );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'ValorLiq', OLD.ValorLiq, NEW.ValorLiq );
	execute procedure set_log( 12, NEW.idPrimario, 'Estimado', OLD.Estimado, NEW.Estimado );
	execute procedure set_log( 12, NEW.idPrimario, 'TFCobra', OLD.TFCobra, NEW.TFCobra );
	execute procedure set_log( 12, NEW.idPrimario, 'Emissao', OLD.Emissao, NEW.Emissao );
	execute procedure set_log( 12, NEW.idPrimario, 'CCor', OLD.CCor, NEW.CCor );
	execute procedure set_log( 12, NEW.idPrimario, 'SubPlano', OLD.SubPlano, NEW.SubPlano );
	execute procedure set_log( 12, NEW.idPrimario, 'DataPagto', OLD.DataPagto, NEW.DataPagto );
	execute procedure set_log( 12, NEW.idPrimario, 'DataComp', OLD.DataComp, NEW.DataComp );
	execute procedure set_log( 12, NEW.idPrimario, 'TFPagto', OLD.TFPagto, NEW.TFPagto );
	execute procedure set_log( 12, NEW.idPrimario, 'TDetPg', OLD.TDetPg, NEW.TDetPg );
	execute procedure set_log( 12, NEW.idPrimario, 'Cheque', OLD.Cheque, NEW.Cheque );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.LinhaDig is distinct from OLD.LinhaDig )  OR
		( NEW.NomePdf is distinct from OLD.NomePdf )  OR
		( NEW.Arq1 is distinct from OLD.Arq1 )  OR
		( NEW.StRetorno is distinct from OLD.StRetorno )  OR
		( NEW.Remessa is distinct from OLD.Remessa )  OR
		( NEW.DataRem is distinct from OLD.DataRem )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo Usuario
************************************************************/
drop trigger arqUsuario_log;
drop view v_arqUsuario;
commit;

ALTER TABLE arqUsuario
add /* 10*/	PODEAGENDA campoLogico; /* Lógico: 0=Não 1=Sim */
commit;

update arqUsuario set PodeAgenda=0 Where Medico=1;
update arqUsuario set PodeAgenda=1 Where Medico=0;
commit;

RECREATE VIEW V_arqUsuario AS
	SELECT A0.IDPRIMARIO, A0.USUARIO, A0.NOME, A0.SENHA, A0.GRUPO, A1.GRUPO as GRUPO_GRUPO, A0.VERSAO, A0.EMAIL, A0.MEDICO, A0.CRM, A0.PODEAGENDA, A0.ATIVO, A0.NASCIMENTO, A0.FOTO, A2.CHAVE as Foto_CHAVE, A2.DESCRITOR as Foto_DESCRITOR, A0.FOTO_ARQUIVO, A0.EMAILACES, A0.EMAILACESS
	FROM arqUsuario A0
	left join arqGrupo A1 on A1.IDPRIMARIO = A0.GRUPO
	left join tabLanceTipoImg A2 on A2.IDPRIMARIO = A0.FOTO;
commit;

/************************************************************
	Trigger para Log de arqUsuario
************************************************************/

set term ^;

recreate trigger arqUsuario_LOG for arqUsuario
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Usuario,'' );
else
	valorChave = coalesce( NEW.Usuario,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100005 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Usuario', OLD.Usuario, NEW.Usuario );
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Grupo', OLD.Grupo, NEW.Grupo );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'Medico', OLD.Medico, NEW.Medico );
	execute procedure set_log( 12, NEW.idPrimario, 'CRM', OLD.CRM, NEW.CRM );
	execute procedure set_log( 12, NEW.idPrimario, 'PodeAgenda', OLD.PodeAgenda, NEW.PodeAgenda );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Nascimento', OLD.Nascimento, NEW.Nascimento );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailAces', OLD.EmailAces, NEW.EmailAces );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailAcesS', OLD.EmailAcesS, NEW.EmailAcesS );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Senha is distinct from OLD.Senha )  OR
		( NEW.Versao is distinct from OLD.Versao )  OR
		( NEW.Foto is distinct from OLD.Foto )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

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
alter PODEAGENDA position 10,
alter ATIVO position 11,
alter NASCIMENTO position 12,
alter FOTO position 13,
alter FOTO_ARQUIVO  position 14,
alter EMAILACES position 15,
alter EMAILACESS position 16;
commit;
