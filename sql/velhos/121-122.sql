--*
--* 1.21 para 1.22

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(200258,2,'Relatório da relação de consultas com valores','',258,50,0,'');
commit;

