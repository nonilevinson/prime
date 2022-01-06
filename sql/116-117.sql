--*
--* 1.16 para 1.17

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

update arqLanceOperacao set Operacao = 'Relatório analítico de medicação prescrita' Where idPrimario = 200223;

insert into arqLanceOperacao values(200230,2,'Relatório resumido de medicação prescrita','',230,50,0,'');
commit;
