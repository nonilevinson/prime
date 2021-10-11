--*
--* 1.10 para 1.11

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(100047,1,'Cadastro da relação de mídias e clínicas','arqCliMidia',47,1,0,'');
commit;

/************************************************************
	TABELA tabTStCon
************************************************************/
update tabTStCon set Descritor = 'AGENDADO' Where idPrimario = 1;
update tabTStCon set Descritor = 'RECEPÇÃO' Where idPrimario = 2;
update tabTStCon set Descritor = 'MÉDICO' Where idPrimario = 3;
update tabTStCon set Descritor = 'TESTE' Where idPrimario = 4;
update tabTStCon set Descritor = 'AG. ASSESSOR' Where idPrimario = 5;
update tabTStCon set Descritor = 'ASSESSOR' Where idPrimario = 6;
update tabTStCon set Descritor = 'ATENDIDO' Where idPrimario = 7;
update tabTStCon set Descritor = 'LIBERADO' Where idPrimario = 8;
update tabTStCon set Descritor = 'CLÍNICA DESMARCOU' Where idPrimario = 9;
update tabTStCon set Descritor = 'PACIENTE DESMARCOU' Where idPrimario = 10;
update tabTStCon set Descritor = 'MÉDICO DESMARCOU' Where idPrimario = 11;
commit;

/************************************************************
	Arquivo Profissao 
************************************************************/
drop trigger arqProfissao_log;
drop view v_arqProfissao;
commit;

ALTER TABLE arqProfissao
add /*  3*/	ATIVO campoLogico; /* Lógico: 0=Não 1=Sim */
commit;

update arqProfissao set Ativo = 1;
commit;

RECREATE VIEW V_arqProfissao AS 
	SELECT A0.IDPRIMARIO, A0.PROFISSAO, A0.ATIVO
	FROM arqProfissao A0;
commit;

/************************************************************
	Trigger para Log de arqProfissao
************************************************************/

set term ^;

recreate trigger arqProfissao_LOG for arqProfissao
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Profissao,'' );
else
	valorChave = coalesce( NEW.Profissao,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100036 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Profissao', OLD.Profissao, NEW.Profissao );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo TiAgenda  
************************************************************/
drop view v_arqTiAgenda;
commit;

ALTER TABLE arqTiAgenda
add /*  5*/	AGTOPO campoLogico, /* Lógico: 0=Não 1=Sim */
add /*  6*/	AGFORM campoLogico, /* Lógico: 0=Não 1=Sim */
add /*  7*/	PAGAMENTO campoLogico, /* Lógico: 0=Não 1=Sim */
add /*  8*/	MIDIA campoLogico; /* Lógico: 0=Não 1=Sim */
commit;

RECREATE VIEW V_arqTiAgenda AS 
	SELECT A0.IDPRIMARIO, A0.TIAGENDA, A0.ATIVO, A0.DOBROTEMPO, A0.AGTOPO, A0.AGFORM, A0.PAGAMENTO, A0.MIDIA
	FROM arqTiAgenda A0;
commit;

ALTER TABLE arqTiAgenda
alter IDPRIMARIO position 1,
alter TIAGENDA position 2,
alter ATIVO position 3,
alter DOBROTEMPO position 4,
alter AGTOPO position 5,
alter AGFORM position 6,
alter PAGAMENTO position 7,
alter MIDIA position 8;
commit;

update arqTiAgenda set AgTopo = 1, AgForm=1, Pagamento=1, Midia=1;

--* retorno
update arqTiAgenda set AgTopo = 1, AgForm=1, Pagamento=0, Midia=0 Where idPrimario = 4;
commit;

INSERT INTO arqTiAgenda VALUES ( 7, 'RETESTE', 1, 1, 1, 1, 1, 1 );
commit;

CREATE TABLE arqCliMidia
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  3*/	MIDIA ligadoComArquivo, /* Ligado com o Arquivo Midia */
	/*  4*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqCliMidia_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqCliMidia_UK UNIQUE ( Clinica, Midia )
);
commit;

CREATE DESC INDEX arqCliMidia_IdPrimario_Desc ON arqCliMidia (IDPRIMARIO);
commit;

ALTER TABLE arqCliMidia ADD CONSTRAINT arqCliMidia_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqCliMidia ADD CONSTRAINT arqCliMidia_FK_Midia FOREIGN KEY ( MIDIA ) REFERENCES arqMidia ON DELETE CASCADE ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqCliMidia AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.MIDIA, A2.MIDIA as MIDIA_MIDIA, A0.ATIVO
	FROM arqCliMidia A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqMidia A2 on A2.IDPRIMARIO = A0.MIDIA;
commit;

/************************************************************
	Trigger para Log de arqCliMidia
************************************************************/

set term ^;

recreate trigger arqCliMidia_LOG for arqCliMidia
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Clinica_Clinica, ' ' ) || '-' || coalesce( Midia_Midia, ' ' ) from v_arqCliMidia where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100047 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Midia', OLD.Midia, NEW.Midia );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;
