--*
--* 2.01 para 2.02

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

--* vira e mexe tem prontuario como null
update arqPessoa set Pontuario= '' where Prontuario is null
commit;

insert into arqLanceOperacao values(200279,2,'Relatório de pacientes por mídia','',279,50,0,'');
commit;
