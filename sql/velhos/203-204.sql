--*
--* 2.03 para 2.04

--* 02/08/2022 passei eles para o p_indexatua.php
	/*
	delete from ARQLANCELOGACESSO where STATUS is null;
	delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
	commit;
	execute procedure reindexartudo;
	commit;
	--* vira e mexe tem prontuario como null
	update arqPessoa set Prontuario='' where Prontuario is null;
	commit;
	*/

/************************************************************
	TABELA tabTClinica
************************************************************/

CREATE TABLE tabTClinica
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTClinica_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTClinica_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTClinica VALUES ( 1, '1', 'Normal' );
INSERT INTO tabTClinica VALUES ( 2, '2', 'Complementar' );
INSERT INTO tabTClinica VALUES ( 3, '3', 'Ambos' );
commit;

/************************************************************
	Arquivo TStCon    
************************************************************/
drop view v_arqTStCon;
commit;

ALTER TABLE arqTStCon
add /*  4*/	TCLINICA ligadoComTabela, /* Ligado com a Tabela TClinica */
add /*  4*/	LEGENDA campoLogico, /* Lógico: 0=Não 1=Sim */
add /*  5*/	HORACHE campoLogico, /* Lógico: 0=Não 1=Sim */
add /*  6*/	EHDESMARCA campoLogico, /* Lógico: 0=Não 1=Sim */
add /*  8*/	VALOROBR campoLogico, /* Lógico: 0=Não 1=Sim */
add /*  9*/	PRONTUOBR campoLogico; /* Lógico: 0=Não 1=Sim */
commit;

ALTER TABLE arqTStCon ADD CONSTRAINT arqTStCon_FK_TClinica FOREIGN KEY ( TCLINICA ) REFERENCES tabTClinica ON DELETE SET NULL ON UPDATE CASCADE;
commit;

update arqTStCon set Legenda=1;
update arqTStCon set Legenda=0 Where idPrimario >= 9;
update arqTStCon set Ordem=12 Where idPrimario=11;
update arqTStCon set Ordem=11 Where idPrimario=10;
update arqTStCon set Ordem=10 Where idPrimario=9;
commit;

-- TClinca = 3 > nas complementares só os id=1,3,7,9,10,11
update arqTStCon set TClinica=1;
update arqTStCon set TClinica=3 Where idPrimario in( 1,3,7,9,10,11 );
commit;

update arqTStCon set HoraChe=0;
update arqTStCon set HoraChe=1 Where idPrimario in( 2,3,4,5,6,7,8 );
commit;

update arqTStCon set EhDesmarca=0;
update arqTStCon set EhDesmarca=1 Where idPrimario in( 9,10,11);
commit;

update arqTStCon set ValorObr=0;
update arqTStCon set ValorObr=1 Where idPrimario in( 3,4,5,6,7,8 );
commit;

update arqTStCon set ProntuObr=0;
update arqTStCon set ProntuObr=1 Where idPrimario in( 2,3,4,5,6,7,8 );
commit;

INSERT INTO ARQTSTCON (IDPRIMARIO, STATUS, ORDEM, TCLINICA, LEGENDA, HORACHE, EHDESMARCA, COR, FUNDO, ATIVO) 
	VALUES (12, 'FALTOU', 9, 3, 1, 0, 1, '#ffffff', '#ff4500', 1);
COMMIT WORK;

RECREATE VIEW V_arqTStCon AS 
	SELECT A0.IDPRIMARIO, A0.STATUS, A0.ORDEM, A0.TCLINICA, A1.CHAVE as TClinica_CHAVE, A1.DESCRITOR as TClinica_DESCRITOR, A0.LEGENDA, A0.HORACHE, A0.EHDESMARCA, A0.VALOROBR, A0.PRONTUOBR, A0.COR, A0.FUNDO, A0.ATIVO
	FROM arqTStCon A0
	left join tabTClinica A1 on A1.IDPRIMARIO=A0.TCLINICA;
commit;

ALTER TABLE arqTStCon
alter IDPRIMARIO position 1,
alter STATUS position 2,
alter ORDEM position 3,
alter TCLINICA position 4,
alter LEGENDA position 5,
alter HORACHE position 6,
alter EHDESMARCA position 7,
alter VALOROBR position 8,
alter PRONTUOBR position 9,
alter COR position 10,
alter FUNDO position 11,
alter ATIVO position 12;
commit;