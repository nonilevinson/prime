--*
--* 1.15 para 1.16

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(100054,1,'Cadastro as medica��o da consulta','arqCMedica',54,1,0,'');
insert into arqLanceOperacao values(100055,1,'Cadastro de lotes de medicamentos','arqLote',55,2,0,'');
insert into arqLanceOperacao values(100056,1,'Cadastro de movimentos de estoque','arqMovEstoque',56,2,0,'');
insert into arqLanceOperacao values(100057,1,'Cadastro de itens de movimento de estoque','arqItemMov',57,2,0,'');
insert into arqLanceOperacao values(200220,2,'Rotina para fechar um movimento de estoque','',220,2,0,'');
insert into arqLanceOperacao values(200221,2,'Rotina para abrir um movimento de estoque','',221,2,0,'');
commit;

/************************************************************
	Arquivo Medicamen 
************************************************************/
drop trigger arqMedicamen_log;
drop view v_arqMedicamen;
commit;

ALTER TABLE arqMedicamen drop EstoqueMin, drop EstoqueMax;
commit;

RECREATE VIEW V_arqMedicamen AS 
	SELECT A0.IDPRIMARIO, A0.MEDICAMEN, A0.UNIDADE, A1.UNIDADE as UNIDADE_UNIDADE, A0.ATIVO
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
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	TABELA tabTMov
************************************************************/
drop TABLE tabTMov;
commit;

CREATE TABLE tabTMov
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTMov_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTMov_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTMov VALUES ( 1, '1', 'Devolu��o' );
INSERT INTO tabTMov VALUES ( 2, '2', 'Entrada' );
INSERT INTO tabTMov VALUES ( 3, '3', 'Perda Diversa' );
INSERT INTO tabTMov VALUES ( 4, '4', 'Perda pela validade' );
INSERT INTO tabTMov VALUES ( 5, '5', 'Quebra' );
INSERT INTO tabTMov VALUES ( 6, '6', 'Sa�da consulta' );
INSERT INTO tabTMov VALUES ( 7, '7', 'Sa�da diversa' );
commit;

/************************************************************
	Arquivo Lote      
************************************************************/

CREATE TABLE arqLote
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	MEDICAMEN ligadoComArquivo, /* Ligado com o Arquivo Medicamen */
	/*  3*/	LOTE VARCHAR( 15 ) COLLATE PT_BR, /* M�scara = M */
	/*  4*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  5*/	FORNECEDOR ligadoComArquivo, /* Ligado com o Arquivo Fornecedor */
	/*  6*/	FABRICA DATE, /* M�scara = 4ano */
	/*  7*/	VALIDADE DATE, /* M�scara = 4ano */
	/*  8*/	TRGITMOV NUMERIC(18,0), /* M�scara = N */
	/*  9*/	TRGCMEDICA NUMERIC(18,0), /* M�scara = N */
	/* 10*/	/* ESTOQUE */
	/* 11*/	ATIVO campoLogico, /* L�gico: 0=N�o 1=Sim */
	CONSTRAINT arqLote_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqLote_UK UNIQUE ( Medicamen, Lote )
);
commit;

CREATE DESC INDEX arqLote_IdPrimario_Desc ON arqLote (IDPRIMARIO);
commit;

ALTER TABLE arqLote ADD ESTOQUE NUMERIC(18,0) computed by ( TrgItMov - TrgCMedica ); 
ALTER TABLE arqLote ALTER ESTOQUE POSITION 9;
commit;

ALTER TABLE arqLote ADD CONSTRAINT arqLote_FK_Medicamen FOREIGN KEY ( MEDICAMEN ) REFERENCES arqMedicamen ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqLote ADD CONSTRAINT arqLote_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqLote ADD CONSTRAINT arqLote_FK_Fornecedor FOREIGN KEY ( FORNECEDOR ) REFERENCES arqFornecedor ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqLote AS 
	SELECT A0.IDPRIMARIO, A0.MEDICAMEN, A1.MEDICAMEN as MEDICAMEN_MEDICAMEN, A0.LOTE, A0.CLINICA, A2.CLINICA as CLINICA_CLINICA, A0.FORNECEDOR, A3.NOME as FORNECEDOR_NOME, A0.FABRICA, A0.VALIDADE, A0.TRGITMOV, A0.TRGCMEDICA, A0.ESTOQUE, A0.ATIVO
	FROM arqLote A0
	left join arqMedicamen A1 on A1.IDPRIMARIO = A0.MEDICAMEN
	left join arqClinica A2 on A2.IDPRIMARIO = A0.CLINICA
	left join arqFornecedor A3 on A3.IDPRIMARIO = A0.FORNECEDOR;
commit;

/************************************************************
	Trigger para Log de arqLote
************************************************************/

set term ^;

recreate trigger arqLote_LOG for arqLote
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Medicamen_Medicamen, ' ' ) || '-' || coalesce( Lote, ' ' ) from v_arqLote where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100055 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Medicamen', OLD.Medicamen, NEW.Medicamen );
	execute procedure set_log( 12, NEW.idPrimario, 'Lote', OLD.Lote, NEW.Lote );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Fornecedor', OLD.Fornecedor, NEW.Fornecedor );
	execute procedure set_log( 12, NEW.idPrimario, 'Fabrica', OLD.Fabrica, NEW.Fabrica );
	execute procedure set_log( 12, NEW.idPrimario, 'Validade', OLD.Validade, NEW.Validade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo MovEstoque
************************************************************/

CREATE TABLE arqMovEstoque
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	NUM NUMERIC(18,0), /* M�scara = N */
	/*  3*/	DATA DATE, /* M�scara = 4ano */
	/*  4*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  5*/	FORNECEDOR ligadoComArquivo, /* Ligado com o Arquivo Fornecedor */
	/*  6*/	NUMDOC NUMERIC(18,0), /* M�scara = N */
	/*  7*/	OBS BLOB SUB_TYPE 1 COLLATE PT_BR, /* M�scara =  */
	/*  8*/	FECHADO campoLogico, /* L�gico: 0=N�o 1=Sim */
	CONSTRAINT arqMovEstoque_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqMovEstoque_UK UNIQUE ( Num )
);
commit;

CREATE DESC INDEX arqMovEstoque_IdPrimario_Desc ON arqMovEstoque (IDPRIMARIO);
commit;

ALTER TABLE arqMovEstoque ADD CONSTRAINT arqMovEstoque_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqMovEstoque ADD CONSTRAINT arqMovEstoque_FK_Fornecedor FOREIGN KEY ( FORNECEDOR ) REFERENCES arqFornecedor ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqMovEstoque AS 
	SELECT A0.IDPRIMARIO, A0.NUM, A0.DATA, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.FORNECEDOR, A2.NOME as FORNECEDOR_NOME, A0.NUMDOC, A0.OBS, A0.FECHADO
	FROM arqMovEstoque A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqFornecedor A2 on A2.IDPRIMARIO = A0.FORNECEDOR;
commit;

/************************************************************
	Trigger para Log de arqMovEstoque
************************************************************/

set term ^;

recreate trigger arqMovEstoque_LOG for arqMovEstoque
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Num,'' );
else
	valorChave = coalesce( NEW.Num,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100056 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Num', OLD.Num, NEW.Num );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Fornecedor', OLD.Fornecedor, NEW.Fornecedor );
	execute procedure set_log( 12, NEW.idPrimario, 'NumDoc', OLD.NumDoc, NEW.NumDoc );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Fechado', OLD.Fechado, NEW.Fechado );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo ItemMov   
************************************************************/

CREATE TABLE arqItemMov
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	MOVESTOQUE ligadoComArquivo, /* Ligado com o Arquivo MovEstoque */
	/*  3*/	ITEM INTEGER, /* M�scara = N */
	/*  4*/	LOTE ligadoComArquivo, /* Ligado com o Arquivo Lote */
	/*  5*/	TMOV ligadoComTabela, /* Ligado com a Tabela TMov */
	/*  6*/	QTD INTEGER, /* M�scara = N */
	/*  7*/	/* QTDCALC */
	/*  8*/	/* CUNIDADE */
	CONSTRAINT arqItemMov_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqItemMov_UK UNIQUE ( MovEstoque, Item )
);
commit;

CREATE DESC INDEX arqItemMov_IdPrimario_Desc ON arqItemMov (IDPRIMARIO);
commit;

ALTER TABLE arqItemMov ADD QTDCALC NUMERIC(18,0) computed by ( CASE
	WHEN( TMov in( 2 ) ) THEN( Qtd )
	ELSE ( -Qtd )
	END  ); 
ALTER TABLE arqItemMov ALTER QTDCALC POSITION 7;
ALTER TABLE arqItemMov ADD CUNIDADE VARCHAR( 10 ) computed by ( ( COALESCE( ( SELECT Unidade FROM arqUnidade WHERE arqUnidade.IdPrimario=( COALESCE( ( SELECT Unidade FROM arqMedicamen WHERE arqMedicamen.IdPrimario=( COALESCE( ( SELECT Medicamen FROM arqLote WHERE arqLote.IdPrimario=( arqItemMov.Lote ) ), 0 ) ) ), 0 ) )  ), '' ) ) ); 
ALTER TABLE arqItemMov ALTER CUNIDADE POSITION 8;
commit;

ALTER TABLE arqItemMov ADD CONSTRAINT arqItemMov_FK_MovEstoque FOREIGN KEY ( MOVESTOQUE ) REFERENCES arqMovEstoque ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqItemMov ADD CONSTRAINT arqItemMov_FK_Lote FOREIGN KEY ( LOTE ) REFERENCES arqLote ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqItemMov ADD CONSTRAINT arqItemMov_FK_TMov FOREIGN KEY ( TMOV ) REFERENCES tabTMov ON DELETE SET NULL ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqItemMov AS 
	SELECT A0.IDPRIMARIO, A0.MOVESTOQUE, A1.NUM as MOVESTOQUE_NUM, A0.ITEM, A0.LOTE, A2.MEDICAMEN as LOTE_MEDICAMEN, A3.MEDICAMEN as LOTE_MEDICAMEN_MEDICAMEN, A2.LOTE as LOTE_LOTE, A0.TMOV, A4.CHAVE as TMov_CHAVE, A4.DESCRITOR as TMov_DESCRITOR, A0.QTD, A0.QTDCALC, A0.CUNIDADE
	FROM arqItemMov A0
	left join arqMovEstoque A1 on A1.IDPRIMARIO = A0.MOVESTOQUE
	left join arqLote A2 on A2.IDPRIMARIO = A0.LOTE
	left join arqMedicamen A3 on A3.IDPRIMARIO = A2.MEDICAMEN
	left join tabTMov A4 on A4.IDPRIMARIO=A0.TMOV;
commit;

/************************************************************
	Trigger para Log de arqItemMov
************************************************************/

set term ^;

recreate trigger arqItemMov_LOG for arqItemMov
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( MovEstoque_Num, ' ' ) || '-' || coalesce( Item, ' ' ) from v_arqItemMov where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100057 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'MovEstoque', OLD.MovEstoque, NEW.MovEstoque );
	execute procedure set_log( 12, NEW.idPrimario, 'Item', OLD.Item, NEW.Item );
	execute procedure set_log( 12, NEW.idPrimario, 'Lote', OLD.Lote, NEW.Lote );
	execute procedure set_log( 12, NEW.idPrimario, 'TMov', OLD.TMov, NEW.TMov );
	execute procedure set_log( 12, NEW.idPrimario, 'Qtd', OLD.Qtd, NEW.Qtd );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo CMedica   
************************************************************/

CREATE TABLE arqCMedica
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CONSULTA ligadoComArquivo, /* Ligado com o Arquivo Consulta */
	/*  3*/	MEDICAMEN ligadoComArquivo, /* Ligado com o Arquivo Medicamen */
	/*  4*/	/* UNIDADECAL */
	/*  5*/	QTD NUMERIC(18,0), /* M�scara = N */
	/*  6*/	LOTE ligadoComArquivo, /* Ligado com o Arquivo Lote */
	/*  7*/	DATASEPARA DATE, /* M�scara = 4ano */
	/*  8*/	QTDENTREG NUMERIC(18,0), /* M�scara = N */
	/*  9*/	/* SALDO */
	/* 10*/	OBSENTREG VARCHAR( 60 ) COLLATE PT_BR, /* M�scara = M */
	CONSTRAINT arqCMedica_PK PRIMARY KEY ( IDPRIMARIO )
);
commit;

CREATE DESC INDEX arqCMedica_IdPrimario_Desc ON arqCMedica (IDPRIMARIO);
commit;

ALTER TABLE arqCMedica ADD UNIDADECAL VARCHAR( 10 ) computed by ( (Select U.Unidade From arqMedicamen M join arqUnidade U on U.idPrimario=M.Unidade Where M.idPrimario=arqCMedica.Medicamen) ); 
ALTER TABLE arqCMedica ALTER UNIDADECAL POSITION 4;
ALTER TABLE arqCMedica ADD SALDO NUMERIC(18,0) computed by ( Qtd - QtdEntreg ); 
ALTER TABLE arqCMedica ALTER SALDO POSITION 9;
commit;

ALTER TABLE arqCMedica ADD CONSTRAINT arqCMedica_FK_Consulta FOREIGN KEY ( CONSULTA ) REFERENCES arqConsulta ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqCMedica ADD CONSTRAINT arqCMedica_FK_Medicamen FOREIGN KEY ( MEDICAMEN ) REFERENCES arqMedicamen ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqCMedica ADD CONSTRAINT arqCMedica_FK_Lote FOREIGN KEY ( LOTE ) REFERENCES arqLote ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqCMedica AS 
	SELECT A0.IDPRIMARIO, A0.CONSULTA, A1.NUM as CONSULTA_NUM, A0.MEDICAMEN, A2.MEDICAMEN as MEDICAMEN_MEDICAMEN, A0.UNIDADECAL, A0.QTD, A0.LOTE, A3.MEDICAMEN as LOTE_MEDICAMEN, A4.MEDICAMEN as LOTE_MEDICAMEN_MEDICAMEN, A3.LOTE as LOTE_LOTE, A0.DATASEPARA, A0.QTDENTREG, A0.SALDO, A0.OBSENTREG
	FROM arqCMedica A0
	left join arqConsulta A1 on A1.IDPRIMARIO = A0.CONSULTA
	left join arqMedicamen A2 on A2.IDPRIMARIO = A0.MEDICAMEN
	left join arqLote A3 on A3.IDPRIMARIO = A0.LOTE
	left join arqMedicamen A4 on A4.IDPRIMARIO = A3.MEDICAMEN;
commit;

/************************************************************
	Trigger para Log de arqCMedica
************************************************************/

set term ^;

recreate trigger arqCMedica_LOG for arqCMedica
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Consulta_Num, ' ' ) || '-' || coalesce( Medicamen_Medicamen, ' ' ) from v_arqCMedica where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100054 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Consulta', OLD.Consulta, NEW.Consulta );
	execute procedure set_log( 12, NEW.idPrimario, 'Medicamen', OLD.Medicamen, NEW.Medicamen );
	execute procedure set_log( 12, NEW.idPrimario, 'Qtd', OLD.Qtd, NEW.Qtd );
	execute procedure set_log( 12, NEW.idPrimario, 'Lote', OLD.Lote, NEW.Lote );
	execute procedure set_log( 12, NEW.idPrimario, 'DataSepara', OLD.DataSepara, NEW.DataSepara );
	execute procedure set_log( 12, NEW.idPrimario, 'QtdEntreg', OLD.QtdEntreg, NEW.QtdEntreg );
	execute procedure set_log( 12, NEW.idPrimario, 'ObsEntreg', OLD.ObsEntreg, NEW.ObsEntreg );
end
end^

set term ;^

commit;

/************************************************************
	Trigger para arqItemMov: Total - atua em arqLote.TrgItMov
************************************************************/

set term ^;

recreate trigger arqLote_TrgItMov for arqItemMov
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
update arqLote set arqLote.TrgItMov = arqLote.TrgItMov + 
NEW.QtdCalc where arqLote.IDPRIMARIO = NEW.Lote;
end
if( updating or deleting ) then begin
update arqLote set arqLote.TrgItMov = arqLote.TrgItMov - 
OLD.QtdCalc where arqLote.IDPRIMARIO = OLD.Lote;
end
end^

set term ;^
commit;

/************************************************************
	Trigger para arqCMedica: Total - atua em arqLote.TrgCMedica
************************************************************/

set term ^;

recreate trigger arqLote_TrgCMedica for arqCMedica
active after Insert or Update or Delete
as
begin
if( updating or inserting ) then begin
update arqLote set arqLote.TrgCMedica = arqLote.TrgCMedica + 
NEW.QtdEntreg where arqLote.IDPRIMARIO = NEW.Lote;
end
if( updating or deleting ) then begin
update arqLote set arqLote.TrgCMedica = arqLote.TrgCMedica - 
OLD.QtdEntreg where arqLote.IDPRIMARIO = OLD.Lote;
end
end^

set term ;^
commit;

/***********************************************
	TRIGGER ARQMOVESTOQUE_NUM
************************************************/

SET TERM ^^ ;
CREATE TRIGGER ARQMOVESTOQUE_NUM FOR ARQMOVESTOQUE ACTIVE BEFORE INSERT POSITION 1 AS

begin
  select coalesce( max( Num ) + 1, 1 ) from ARQMOVESTOQUE into NEW.Num;
end ^^
SET TERM ; ^^

commit;
