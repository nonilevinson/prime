--*
--* 1.20 para 1.21

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;


