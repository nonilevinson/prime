--* select para depois de dar as permiss�es
--? Select * From ARQLANCEPERMISSAO

--* Excliur o assunto fantasma
delete from arqLanceOperacao Where idPrimario in( 200030,200077,200080,200083 );
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
insert into arqProsissao values( 1, 'Aposentado' );
insert into arqProsissao values( 2, 'Pedereiro' );
insert into arqProsissao values( 3, 'M�sico' );
insert into arqProsissao values( 4, 'Motorista' );
insert into arqProsissao values( 5, 'Militar' );
commit;

