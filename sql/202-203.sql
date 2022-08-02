--*
--* 2.02 para 2.03

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;
--* vira e mexe tem prontuario como null
update arqPessoa set Prontuario='' where Prontuario is null;
commit;

insert into arqLanceOperacao values(200281,2,'Relatório de pacientes por assessor','',281,50,0,'');
commit;
