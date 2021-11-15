--*
--* 1.12 para 1.13

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(100049,1,'Cadastro de comissionamento do Call Center','arqComCall',49,1,0,'');
insert into arqLanceOperacao values(100050,1,'Cadastro das faixas de comissionamento do Call Center','arqFxComCall',50,1,0,'');
insert into arqLanceOperacao values(200189,2,'Rotina para copiar Comissão do Call Center','',189,1,0,'');
insert into arqLanceOperacao values(200190,2,'Relatório de comissionamento do Call Center','',190,50,0,'');
commit;

/************************************************************
	Arquivo ComCall   
************************************************************/

CREATE TABLE arqComCall
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  3*/	MES DATE, /* Máscara = Mmaa */
	/*  4*/	TRGQTOFX INTEGER, /* Máscara = N */
	CONSTRAINT arqComCall_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqComCall_UK UNIQUE ( Clinica, Mes )
);
commit;

CREATE DESC INDEX arqComCall_IdPrimario_Desc ON arqComCall (IDPRIMARIO);
commit;

ALTER TABLE arqComCall ADD CONSTRAINT arqComCall_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqComCall AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.MES, A0.TRGQTOFX
	FROM arqComCall A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA;
commit;

/************************************************************
	Trigger para Log de arqComCall
************************************************************/

set term ^;

recreate trigger arqComCall_LOG for arqComCall
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Clinica_Clinica, ' ' ) || '-' || coalesce( Mes, ' ' ) from v_arqComCall where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100049 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Mes', OLD.Mes, NEW.Mes );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo FxComCall 
************************************************************/

CREATE TABLE arqFxComCall
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	COMCALL ligadoComArquivo, /* Ligado com o Arquivo ComCall */
	/*  3*/	FAIXA INTEGER, /* Máscara = N */
	/*  4*/	PERCATE NUMERIC( 4, 2 ), /* Máscara = N */
	/*  5*/	COMISSAO NUMERIC( 4, 2 ), /* Máscara = N */
	CONSTRAINT arqFxComCall_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqFxComCall_UK UNIQUE ( ComCall, Faixa )
);
commit;

CREATE DESC INDEX arqFxComCall_IdPrimario_Desc ON arqFxComCall (IDPRIMARIO);
commit;

ALTER TABLE arqFxComCall ADD CONSTRAINT arqFxComCall_FK_ComCall FOREIGN KEY ( COMCALL ) REFERENCES arqComCall ON DELETE CASCADE ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqFxComCall AS 
	SELECT A0.IDPRIMARIO, A0.COMCALL, A1.CLINICA as COMCALL_CLINICA, A2.CLINICA as COMCALL_CLINICA_CLINICA, A1.MES as COMCALL_MES, A0.FAIXA, A0.PERCATE, A0.COMISSAO
	FROM arqFxComCall A0
	left join arqComCall A1 on A1.IDPRIMARIO = A0.COMCALL
	left join arqClinica A2 on A2.IDPRIMARIO = A1.CLINICA;
commit;

/************************************************************
	Trigger para Log de arqFxComCall
************************************************************/

set term ^;

recreate trigger arqFxComCall_LOG for arqFxComCall
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( ComCall_Clinica_Clinica, ' ' ) || '-' || coalesce( ComCall_Mes, ' ' ) || '-' || coalesce( Faixa, ' ' ) from v_arqFxComCall where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100050 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'ComCall', OLD.ComCall, NEW.ComCall );
	execute procedure set_log( 12, NEW.idPrimario, 'Faixa', OLD.Faixa, NEW.Faixa );
	execute procedure set_log( 12, NEW.idPrimario, 'PercAte', OLD.PercAte, NEW.PercAte );
	execute procedure set_log( 12, NEW.idPrimario, 'Comissao', OLD.Comissao, NEW.Comissao );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para arqFxComCall: Quantos - atua em arqComCall.TrgQtoFx
************************************************************/

set term ^;

recreate trigger arqComCall_TrgQtoFx for arqFxComCall
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
update arqComCall set arqComCall.TrgQtoFx = arqComCall.TrgQtoFx + 
1
 where arqComCall.IDPRIMARIO = NEW.ComCall;
end
if( updating or deleting ) then begin
update arqComCall set arqComCall.TrgQtoFx = arqComCall.TrgQtoFx - 
1
 where arqComCall.IDPRIMARIO = OLD.ComCall;
end
end^

set term ;^
commit;

--* Caxias
INSERT INTO ARQCOMCALL (IDPRIMARIO, CLINICA, MES, TRGQTOFX) VALUES (1, 4, '2021-10-01', 0);
COMMIT WORK;
INSERT INTO ARQFXCOMCALL (IDPRIMARIO, COMCALL, FAIXA, PERCATE, COMISSAO) VALUES (1, 1, 1, 45, 5);
INSERT INTO ARQFXCOMCALL (IDPRIMARIO, COMCALL, FAIXA, PERCATE, COMISSAO) VALUES (2, 1, 2, 50, 10);
INSERT INTO ARQFXCOMCALL (IDPRIMARIO, COMCALL, FAIXA, PERCATE, COMISSAO) VALUES (3, 1, 3, 55, 12);
INSERT INTO ARQFXCOMCALL (IDPRIMARIO, COMCALL, FAIXA, PERCATE, COMISSAO) VALUES (4, 1, 4, 60, 15);
INSERT INTO ARQFXCOMCALL (IDPRIMARIO, COMCALL, FAIXA, PERCATE, COMISSAO) VALUES (5, 1, 5, 65, 20);
INSERT INTO ARQFXCOMCALL (IDPRIMARIO, COMCALL, FAIXA, PERCATE, COMISSAO) VALUES (6, 1, 6, 99.99, 25);
COMMIT WORK;
