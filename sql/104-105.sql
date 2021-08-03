--*
--* 1.04 para 1.05

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(100043,1,'Cadastro de tipos de agendas [0]','arqTiAgenda',43,99,1,'');
insert into arqLanceOperacao values(100044,1,'Cadastro de formas de pagamento de consultas','arqFormaPg',44,1,0,'');
commit;

drop PROCEDURE PESSOA_PRONTUARIO;
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
add /* 18*/	FORMAPG ligadoComArquivo; /* Ligado com o Arquivo FormaPg */
commit;

update arqConsulta set TiAgenda=1;
commit;

RECREATE VIEW V_arqConsulta AS
	SELECT A0.IDPRIMARIO, A0.NUM, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.TSTCON, A2.CHAVE as TStCon_CHAVE, A2.DESCRITOR as TStCon_DESCRITOR, A0.TIAGENDA, A3.TIAGENDA as TIAGENDA_TIAGENDA, A0.DATA, A0.HORA, A0.HORACHEGA, A0.PESSOA, A4.NOME as PESSOA_NOME, A4.PRONTUARIO as PESSOA_PRONTUARIO, A0.MEDICO, A5.USUARIO as MEDICO_USUARIO, A0.ASSESSOR, A6.USUARIO as ASSESSOR_USUARIO, A0.MEDICAATUA, A0.TMOTIVO, A7.CHAVE as TMotivo_CHAVE, A7.DESCRITOR as TMotivo_DESCRITOR, A0.TPROGRAMA, A8.CHAVE as TPrograma_CHAVE, A8.DESCRITOR as TPrograma_DESCRITOR, A0.CONDUTA, A0.MEDICACAO, A0.FORMAPG, A9.FORMAPG as FORMAPG_FORMAPG
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
alter MEDICO position 10,
alter MKT position 11,
alter ASSESSOR position 12,
alter MEDICAATUA position 13,
alter TMOTIVO position 14,
alter TPROGRAMA position 15,
alter CONDUTA position 16,
alter MEDICACAO position 17,
alter FORMAPG position 18;
commit;
