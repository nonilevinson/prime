--*
--* 1.02 para 1.03

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

/************************************************************
	TABELA tabTStCon
************************************************************/

/* Daniel:
	AGENDADO - RECEPÇÃO - MEDICO - TESTE - AG. ASSESSOR - ASSESSOR - ATENDIDO - LIBERADO
*/

update tabTStCon set Descritor = 'Recepção' Where idPrimario = 2;
delete from tabTStCon where idPrimario = 3;
update tabTStCon set idPrimario = 3, Chave='3' Where idPrimario = 4;
update tabTStCon set idPrimario = 4, Chave='4' Where idPrimario = 5;
commit;

INSERT INTO tabTStCon VALUES ( 5, '5', 'Ag. Assessor' );
update tabTStCon set Descritor = 'Assessor' Where idPrimario = 6;
commit;

update tabTStCon set idPrimario = 6, Chave='6' Where idPrimario = 7;
update tabTStCon set idPrimario = 7, Chave='7' Where idPrimario = 8;
update tabTStCon set idPrimario = 8, Chave='8' Where idPrimario = 9;
update tabTStCon set idPrimario = 9, Chave='9' Where idPrimario = 10;
delete from tabTStCon where idPrimario = 11;
commit;

--*  INSERT INTO tabTStCon VALUES ( 1, '1', 'Agendado' );
--! INSERT INTO tabTStCon VALUES ( 2, '2', 'Chegou' );
--! INSERT INTO tabTStCon VALUES ( 3, '3', 'Preenchendo prontuário' );
--! INSERT INTO tabTStCon VALUES ( 4, '4', 'Médico' );
--! INSERT INTO tabTStCon VALUES ( 5, '5', 'Teste' );
--*INSERT INTO tabTStCon VALUES ( 6, '6', 'Com assessor' );
--*INSERT INTO tabTStCon VALUES ( 7, '7', 'Atendido' );
--*INSERT INTO tabTStCon VALUES ( 8, '8', 'Liberado' );
--*INSERT INTO tabTStCon VALUES ( 9, '9', 'Clínica desmarcou' );
--*INSERT INTO tabTStCon VALUES ( 10, '10', 'Paciente desmarcou' );
--*INSERT INTO tabTStCon VALUES ( 11, '11', 'Médico desmarcou' );
