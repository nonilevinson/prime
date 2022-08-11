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
	Arquivo TStCon    
************************************************************/
drop view v_arqTStCon;
commit;

ALTER TABLE arqTStCon
add /*  4*/	LEGENDA campoLogico; /* Lógico: 0=Não 1=Sim */
commit;

update arqTStCon set Legenda=1;
update arqTStCon set Legenda=0 Where idPrimario >= 9;
update arqTStCon set Ordem=12 Where idPrimario=11;
update arqTStCon set Ordem=11 Where idPrimario=10;
update arqTStCon set Ordem=10 Where idPrimario=9;
commit;

INSERT INTO ARQTSTCON (IDPRIMARIO, STATUS, ORDEM, LEGENDA, COR, FUNDO, ATIVO) 
	VALUES (gen_id( GENIDPRIMARIO, 1 ), 'FALTOU', 9, 1, '#ffffff', '#ff4500', 1);
COMMIT WORK;

RECREATE VIEW V_arqTStCon AS 
	SELECT A0.IDPRIMARIO, A0.STATUS, A0.ORDEM, A0.LEGENDA, A0.COR, A0.FUNDO, A0.ATIVO
	FROM arqTStCon A0;
commit;

ALTER TABLE arqTStCon
alter IDPRIMARIO position 1,
alter STATUS position 2,
alter ORDEM position 3,
alter LEGENDA position 4,
alter COR position 5,
alter FUNDO position 6,
alter ATIVO position 7;
commit;
