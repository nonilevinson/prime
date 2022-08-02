--*
--* 2.02 para 2.03

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;
--* vira e mexe tem prontuario como null
update arqPessoa set Pontuario= '' where Prontuario is null
commit;


commit;
