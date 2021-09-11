--*
--* 1.07 para 1.08

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(100046,1,'Cadastro de contas recorrentes a pagar e a receber','arqRecorrente',46,10,0,'');
commit;

/************************************************************
	TABELA tabTCompete
************************************************************/

CREATE TABLE tabTCompete
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTCompete_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTCompete_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTCompete VALUES ( 1, '1', 'Anterior' );
INSERT INTO tabTCompete VALUES ( 2, '2', 'Atual' );
INSERT INTO tabTCompete VALUES ( 3, '3', 'Próximo' );
commit;
