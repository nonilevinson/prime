--*
--* 1.01 para 1.02

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(200137,2,'Rotina para informar que o paciente chegou','',137,1,0,'');
insert into arqLanceOperacao values(200138,2,'Rotina para alterar o prontuário do paciente','',138,1,0,'');
commit;

insert into arqLancePermissao (idPrimario, Operacao, Grupo, Usuario, Podeconsultar, Podeverfrm, Podeincluir, Podealterar, Podeexcluir, Podemarcar, Podeimprimir, Podeexportar)
	Values (gen_id( genIdPrimario, 1 ), 200137, 1, null,1,0,0,0,0,0,0,0);
insert into arqLancePermissao (idPrimario, Operacao, Grupo, Usuario, Podeconsultar, Podeverfrm, Podeincluir, Podealterar, Podeexcluir, Podemarcar, Podeimprimir, Podeexportar)
	Values (gen_id( genIdPrimario, 1 ), 200137, 3, null,1,0,0,0,0,0,0,0);
insert into arqLancePermissao (idPrimario, Operacao, Grupo, Usuario, Podeconsultar, Podeverfrm, Podeincluir, Podealterar, Podeexcluir, Podemarcar, Podeimprimir, Podeexportar)
	Values (gen_id( genIdPrimario, 1 ), 200138, 1, null,1,0,0,0,0,0,0,0);
insert into arqLancePermissao (idPrimario, Operacao, Grupo, Usuario, Podeconsultar, Podeverfrm, Podeincluir, Podealterar, Podeexcluir, Podemarcar, Podeimprimir, Podeexportar)
	Values (gen_id( genIdPrimario, 1 ), 200138, 3, null,1,0,0,0,0,0,0,0);
commit;


