--*
--* 1.10 para 1.10A

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

update arqbairro set Bairro = upper( bairro );
update arqcidade set cidade = upper( cidade );
update arqGrupo set Grupo = upper( Grupo );
update arqUsuario set Nome = upper( Nome ), crm = upper(crm);
update arqPessoa set nome = upper( nome ), apelido = upper(apelido);
update arqBanco set Banco = upper( Banco );
update arqCCor set Nome = upper( Nome );
update arqContPessoa set Nome = upper( Nome );
update arqPlano set Plano = upper( Plano );
update arqSubPlano set Nome = upper( Nome );
update arqMidia set Midia = upper( Midia );
update arqClinica set Clinica = upper( Clinica ), razao=upper(razao);
update arqPTrata set PTrata = upper( PTrata );
update arqprofissao p set p.profissao = upper( p.profissao );
update arqFornecedor set Nome = upper( Nome );
update arqTiAgenda set TiAgenda = upper( TiAgenda );
update arqFormaPg set FormaPg = upper( FormaPg );
commit;
