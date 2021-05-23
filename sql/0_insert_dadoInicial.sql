--* select para depois de dar as permiss�es
--? Select * From ARQLANCEPERMISSAO

--* Excliur o assunto fantasma
delete from arqLanceOperacao Where idPrimario in( 200030,200077,200080,200083,200107 );
commit;

--* procedure reindexarIndices
set term ^;
recreate procedure reindexarIndices
as
	declare variable sql varchar(100);
	declare variable nomeIndex varchar(100);
	declare variable estatistica numeric(7,6);
begin
    for
      select r.rdb$index_name, r.rdb$statistics
      from rdb$indices r
      where r.rdb$system_flag = 0
        into :nomeIndex, :estatistica
    do
    begin
      if(not exists(select I.idPrimario
          from arqIndexAtua I
          where I.Indice = :nomeIndex ) ) then
      begin
        insert into arqIndexAtua values( gen_id( GENIDPRIMARIO, 1 ), trim(:nomeIndex), current_date,
          15, :estatistica );
      end

      if (exists(select I.idPrimario from arqIndexAtua I
                where I.Data + I.Dias < current_date)) then
      begin
        sql = 'SET STATISTICS INDEX ' || nomeIndex;
        execute statement :sql;

        update arqIndexAtua I set I.Data=current_date, I.Estatis=:estatistica
          Where I.Indice = :nomeIndex;

        if( ( position('_FK', nomeIndex) = 0 ) and
          ( position('_PK', nomeIndex) = 0 ) and
          ( position('_UK', nomeIndex) = 0 ) ) then
        begin
          sql = 'alter index ' || nomeIndex || ' inactive';
          execute statement :sql;
          sql = 'alter index ' || nomeIndex || ' active';
          execute statement :sql;
        end
      end
    end
end^
set term ;^
commit;

--* Indices para arqLanceLogAcesso
CREATE ASC INDEX arqLanceLogAcesso_Login ON arqLanceLogAcesso(Login);
CREATE ASC INDEX arqLanceLogAcesso_Data ON arqLanceLogAcesso(Data);
CREATE DESC INDEX arqLanceLogAcesso_DataDesc ON arqLanceLogAcesso(Data);
commit;

--* ARQGRUPO
INSERT INTO ARQGRUPO (IDPRIMARIO, GRUPO) VALUES ( 1, 'Diretoria' );
INSERT INTO ARQGRUPO (IDPRIMARIO, GRUPO) VALUES ( 2, 'Call center' );
INSERT INTO ARQGRUPO (IDPRIMARIO, GRUPO) VALUES ( 3, 'Admnistrativo' );
commit;

--*	ARQUSUARIO
INSERT INTO ARQUSUARIO (IDPRIMARIO, USUARIO, NOME, SENHA, GRUPO, VERSAO, ATIVO, EMAIL, EMAILACES, EMAILACESS )
	VALUES (1, 'NONI', 'Noni', 'AOPNG75', NULL, '1.00', 1, 'noni@kogumelo.com', 0, 0);
INSERT INTO ARQUSUARIO (IDPRIMARIO, USUARIO, NOME, SENHA, GRUPO, VERSAO, ATIVO, EMAIL, EMAILACES, EMAILACESS )
	VALUES (2, 'DANIEL', 'Daniel Tomaz Duarte', 'SWSM@153', 1, '1.00', 1, 'danieltduarte01@gmail.com', 1, 1);
INSERT INTO ARQUSUARIO (IDPRIMARIO, USUARIO, NOME, SENHA, GRUPO, VERSAO, ATIVO, EMAIL, EMAILACES, EMAILACESS )
	VALUES (3, 'LEONARDO', 'Leonardo Ribeiro', 'SWSM@153', 1, '1.00', 1, 'administracao@primemedicalcenter.com.br', 1, 1);
INSERT INTO ARQUSUARIO (IDPRIMARIO, USUARIO, NOME, SENHA, GRUPO, VERSAO, ATIVO, EMAIL, EMAILACES, EMAILACESS )
	VALUES (4, 'JACYANI.SILVA', 'Jacyani Silva', 'SWSM@153', 2, '1.00', 1, 'jacyanisilva@hotmail.com', 1, 1);
INSERT INTO ARQUSUARIO (IDPRIMARIO, USUARIO, NOME, SENHA, GRUPO, VERSAO, ATIVO, EMAIL, EMAILACES, EMAILACESS )
	VALUES (5, 'PATRICIA.TRAJANO', 'Patricia Trajano', 'SWSM@153', 1, '1.00', 3, 'patriciatrajano.primemedical@gmail.com', 1, 1);
commit;

--* arqLancePermissao
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (74, 100001, 2, NULL, 1, 1, 1, 1, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (75, 100002, 2, NULL, 1, 1, 1, 1, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (76, 100039, 2, NULL, 1, 1, 1, 1, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (77, 100030, 2, NULL, 1, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (78, 100007, 2, NULL, 1, 1, 1, 1, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (79, 100032, 2, NULL, 1, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (80, 100036, 2, NULL, 1, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (82, 100031, 3, NULL, 1, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (83, 100001, 3, NULL, 1, 1, 1, 1, 1, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (84, 100019, 3, NULL, 1, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (85, 100002, 3, NULL, 1, 1, 1, 1, 1, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (86, 100039, 3, NULL, 1, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (87, 100020, 3, NULL, 1, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (88, 100038, 3, NULL, 1, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (89, 100037, 3, NULL, 1, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (90, 100030, 3, NULL, 1, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (91, 100007, 3, NULL, 1, 1, 1, 1, 1, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (92, 100032, 3, NULL, 1, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (93, 100036, 3, NULL, 1, 1, 1, 1, 1, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (94, 100021, 3, NULL, 1, 1, 1, 1, 1, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (95, 200038, 3, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (96, 200039, 3, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (97, 100014, 3, NULL, 1, 1, 1, 1, 1, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (98, 100016, 3, NULL, 1, 1, 1, 1, 1, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (99, 100015, 3, NULL, 1, 1, 1, 1, 1, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (100, 300001, 3, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (102, 100031, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (103, 100001, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (104, 100019, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (105, 100002, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (106, 100039, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (107, 100020, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (108, 100038, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (109, 100037, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (110, 100030, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (111, 100022, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (112, 100007, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (113, 100032, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (114, 100036, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (115, 100021, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (116, 300003, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (117, 100033, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (118, 100034, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (119, 100027, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (120, 100028, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (121, 200038, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (122, 200039, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (123, 100014, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (124, 100016, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (125, 100015, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (126, 300001, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (127, 100035, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (128, 100004, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (129, 100005, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (130, 100017, 1, NULL, 1, 1, 1, 1, 1, 0, 1, 1);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (131, 200040, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (132, 200073, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (133, 200028, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (134, 200074, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (135, 200068, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (136, 200010, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (137, 200009, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (138, 200011, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (139, 200041, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO ARQLANCEPERMISSAO (IDPRIMARIO, OPERACAO, GRUPO, USUARIO, PODECONSULTAR, PODEVERFRM, PODEINCLUIR, PODEALTERAR, PODEEXCLUIR, PODEMARCAR, PODEIMPRIMIR, PODEEXPORTAR) VALUES (140, 300002, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 0);
COMMIT WORK;

--* Par�metro Config
update cnfConfig set Email=1, Aviso=1, DocMod=0;
commit;

--* Par�metro XConfig
update cnfXConfig set LOGACESSO = 1, LOGACESSOS = 1, CNPJ = '25297392000123', CPF='', Empresa = 'Niter�i Servi�os de Sa�de Ltda',
	ENDE_CEP = '', ENDE_ENDERECO = '', ENDE_TELEFONE = '', ENDE_DDDCELULAR =0, ENDE_CELULAR = '',
  QtasDesmar=3, Declinar=15;
commit;

/***********************************************
	TRIGGER ARQCONTA_TRANSACAO
************************************************/

SET TERM ^^ ;
CREATE TRIGGER ARQCONTA_TRANSACAO FOR ARQCONTA ACTIVE BEFORE INSERT POSITION 1 AS

begin
  select coalesce( max( Transacao ) + 1, 1 ) from ARQCONTA into NEW.Transacao;
end ^^
SET TERM ; ^^

commit;

/***********************************************
	TRIGGER ARQCONSULTA_PROTOCOLO
************************************************/

SET TERM ^^ ;
CREATE TRIGGER ARQCONSULTA_PROTOCOLO FOR ARQCONSULTA ACTIVE BEFORE INSERT POSITION 1 AS

begin
  select coalesce( max( Protocolo ) + 1, 1 ) from ARQCONSULTA into NEW.Protocolo;
end ^^
SET TERM ; ^^

commit;

--* arqMidia
insert into arqMidia values( 1, 'Clovis', 1 );
insert into arqMidia values( 2, 'Heleno', 1 );
insert into arqMidia values( 3, 'Apolinho', 1 );
insert into arqMidia values( 4, 'Nova Brasil', 1 );
insert into arqMidia values( 5, 'Meia Hora', 1 );
insert into arqMidia values( 6, 'Google', 1 );
insert into arqMidia values( 7, 'Banner', 1 );
insert into arqMidia values( 8, 'R�dio', 1 );
insert into arqMidia values( 9, 'TV', 1 );
commit;

--* arqProsissao
insert into arqProfissao values( 1, 'Aposentado' );
insert into arqProfissao values( 2, 'Pedereiro' );
insert into arqProfissao values( 3, 'M�sico' );
insert into arqProfissao values( 4, 'Motorista' );
insert into arqProfissao values( 5, 'Militar' );
commit;

--* ARQPTRATA
INSERT INTO ARQPTRATA (IDPRIMARIO, PTRATA, VALOR, DESCRICAO, ATIVO) VALUES (1, 'Plano 1', 1000, NULL, 1);
INSERT INTO ARQPTRATA (IDPRIMARIO, PTRATA, VALOR, DESCRICAO, ATIVO) VALUES (2, 'Plano 2', 2000, NULL, 1);
COMMIT WORK;

--* ARQBAIRRO
INSERT INTO ARQBAIRRO (IDPRIMARIO, BAIRRO) VALUES (1, 'Centro');
COMMIT WORK;

--* ARQCIDADE
INSERT INTO ARQCIDADE (IDPRIMARIO, UF, CIDADE, DDD) VALUES (1, 19, 'Niter�i', 21);
INSERT INTO ARQCIDADE (IDPRIMARIO, UF, CIDADE, DDD) VALUES (2, 19, 'Rio de Janeiro', 21);
INSERT INTO ARQCIDADE (IDPRIMARIO, UF, CIDADE, DDD) VALUES (3, 11, 'Juiz de Fora', 0);
INSERT INTO ARQCIDADE (IDPRIMARIO, UF, CIDADE, DDD) VALUES (4, 23, 'Caxias do Sul', 0);
COMMIT WORK;

--* ARQCLINICA
INSERT INTO ARQCLINICA (IDPRIMARIO, CLINICA, RAZAO, EMAIL, CNPJ, ENDE_CEP, ENDE_ENDERECO, ENDE_BAIRRO, ENDE_CIDADE, ENDE_TELEFONE, ENDE_DDDCELULAR, ENDE_CELULAR, ENDE_WHATSAPP, ATIVO) VALUES (1, 'Niter�i', '', '', '', '24020320', 'Rua Doutor Borman, 23', 1, 1, '', 0, '', 0, 1);
INSERT INTO ARQCLINICA (IDPRIMARIO, CLINICA, RAZAO, EMAIL, CNPJ, ENDE_CEP, ENDE_ENDERECO, ENDE_BAIRRO, ENDE_CIDADE, ENDE_TELEFONE, ENDE_DDDCELULAR, ENDE_CELULAR, ENDE_WHATSAPP, ATIVO) VALUES (2, 'Rio de Janeiro', '', '', '', '', 'Avenida Treza de Maio, 43', 1, 2, '', 0, '', 0, 0);
INSERT INTO ARQCLINICA (IDPRIMARIO, CLINICA, RAZAO, EMAIL, CNPJ, ENDE_CEP, ENDE_ENDERECO, ENDE_BAIRRO, ENDE_CIDADE, ENDE_TELEFONE, ENDE_DDDCELULAR, ENDE_CELULAR, ENDE_WHATSAPP, ATIVO) VALUES (3, 'Juiz de Fora', '', '', '', '36025320', 'Avenida Presidente Itamar Franco', NULL, 3, '', 0, '', 0, 0);
INSERT INTO ARQCLINICA (IDPRIMARIO, CLINICA, RAZAO, EMAIL, CNPJ, ENDE_CEP, ENDE_ENDERECO, ENDE_BAIRRO, ENDE_CIDADE, ENDE_TELEFONE, ENDE_DDDCELULAR, ENDE_CELULAR, ENDE_WHATSAPP, ATIVO) VALUES (4, 'Caxias do Sul', '', '', '', '', 'Rua Doutor Montaur, 1441', 1, 4, '', 0, '', 0, 0);
COMMIT WORK;

