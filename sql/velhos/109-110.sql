--*
--* 1.09 para 1.10

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(200170,2,'Relat�rio de consultas dispensadas por m�dicos','',170,50,0,'');
commit;
