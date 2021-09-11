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

/************************************************************
	Arquivo Recorrente
************************************************************/

CREATE TABLE arqRecorrente
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CLINICA ligadoComArquivo, /* Ligado com o Arquivo Clinica */
	/*  3*/	FORNECEDOR ligadoComArquivo, /* Ligado com o Arquivo Fornecedor */
	/*  4*/	PESSOA ligadoComArquivo, /* Ligado com o Arquivo Pessoa */
	/*  5*/	/* NOME */
	/*  6*/	TPGREC ligadoComTabela, /* Ligado com a Tabela TPgRec */
	/*  7*/	TCOMPETE ligadoComTabela, /* Ligado com a Tabela TCompete */
	/*  8*/	VENC SMALLINT, /* Máscara = Z */
	/*  9*/	ANTECIPA campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 10*/	VALOR NUMERIC( 8, 2 ), /* Máscara = N */
	/* 11*/	ESTIMADO campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 12*/	TFCOBRA ligadoComTabela, /* Ligado com a Tabela TFCobra */
	/* 13*/	HISTORICO VARCHAR( 60 ) COLLATE PT_BR, /* Máscara = I */
	/* 14*/	SUBPLANO ligadoComArquivo, /* Ligado com o Arquivo SubPlano */
	/* 15*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqRecorrente_PK PRIMARY KEY ( IDPRIMARIO )
);
commit;

CREATE DESC INDEX arqRecorrente_IdPrimario_Desc ON arqRecorrente (IDPRIMARIO);
commit;

ALTER TABLE arqRecorrente ADD NOME VARCHAR( 60 ) computed by ( CASE
	WHEN( Pessoa > 0 ) THEN( ( COALESCE( ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqRecorrente.Pessoa )  ), '' ) ) )
	ELSE ( ( COALESCE( ( SELECT Nome FROM arqFornecedor WHERE arqFornecedor.IdPrimario=( arqRecorrente.Fornecedor )  ), '' ) ) )
	END  ); 
ALTER TABLE arqRecorrente ALTER NOME POSITION 5;
commit;

ALTER TABLE arqRecorrente ADD CONSTRAINT arqRecorrente_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqRecorrente ADD CONSTRAINT arqRecorrente_FK_TPgRec FOREIGN KEY ( TPGREC ) REFERENCES tabTPgRec ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqRecorrente ADD CONSTRAINT arqRecorrente_FK_Fornecedor FOREIGN KEY ( FORNECEDOR ) REFERENCES arqFornecedor ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqRecorrente ADD CONSTRAINT arqRecorrente_FK_Pessoa FOREIGN KEY ( PESSOA ) REFERENCES arqPessoa ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqRecorrente ADD CONSTRAINT arqRecorrente_FK_TCompete FOREIGN KEY ( TCOMPETE ) REFERENCES tabTCompete ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqRecorrente ADD CONSTRAINT arqRecorrente_FK_TFCobra FOREIGN KEY ( TFCOBRA ) REFERENCES tabTFCobra ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqRecorrente ADD CONSTRAINT arqRecorrente_FK_SubPlano FOREIGN KEY ( SUBPLANO ) REFERENCES arqSubPlano ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqRecorrente AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.FORNECEDOR, A2.NOME as FORNECEDOR_NOME, A0.PESSOA, A3.NOME as PESSOA_NOME, A3.NUMCELULAR as PESSOA_NUMCELULAR, A0.NOME, A0.TPGREC, A4.CHAVE as TPgRec_CHAVE, A4.DESCRITOR as TPgRec_DESCRITOR, A0.TCOMPETE, A5.CHAVE as TCompete_CHAVE, A5.DESCRITOR as TCompete_DESCRITOR, A0.VENC, A0.ANTECIPA, A0.VALOR, A0.ESTIMADO, A0.TFCOBRA, A6.CHAVE as TFCobra_CHAVE, A6.DESCRITOR as TFCobra_DESCRITOR, A0.HISTORICO, A0.SUBPLANO, A7.PLANO as SUBPLANO_PLANO, A8.CODPLANO as SUBPLANO_PLANO_CODPLANO, A8.PLANO as SUBPLANO_PLANO_PLANO, A7.CODIGO as SUBPLANO_CODIGO, A7.NOME as SUBPLANO_NOME, A0.ATIVO
	FROM arqRecorrente A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqFornecedor A2 on A2.IDPRIMARIO = A0.FORNECEDOR
	left join arqPessoa A3 on A3.IDPRIMARIO = A0.PESSOA
	left join tabTPgRec A4 on A4.IDPRIMARIO=A0.TPGREC
	left join tabTCompete A5 on A5.IDPRIMARIO=A0.TCOMPETE
	left join tabTFCobra A6 on A6.IDPRIMARIO=A0.TFCOBRA
	left join arqSubPlano A7 on A7.IDPRIMARIO = A0.SUBPLANO
	left join arqPlano A8 on A8.IDPRIMARIO = A7.PLANO;
commit;

/************************************************************
	Trigger para Log de arqRecorrente
************************************************************/

set term ^;

recreate trigger arqRecorrente_LOG for arqRecorrente
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
	valorChave='';
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100046 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Fornecedor', OLD.Fornecedor, NEW.Fornecedor );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'TPgRec', OLD.TPgRec, NEW.TPgRec );
	execute procedure set_log( 12, NEW.idPrimario, 'TCompete', OLD.TCompete, NEW.TCompete );
	execute procedure set_log( 12, NEW.idPrimario, 'Venc', OLD.Venc, NEW.Venc );
	execute procedure set_log( 12, NEW.idPrimario, 'Antecipa', OLD.Antecipa, NEW.Antecipa );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'Estimado', OLD.Estimado, NEW.Estimado );
	execute procedure set_log( 12, NEW.idPrimario, 'TFCobra', OLD.TFCobra, NEW.TFCobra );
	execute procedure set_log( 12, NEW.idPrimario, 'Historico', OLD.Historico, NEW.Historico );
	execute procedure set_log( 12, NEW.idPrimario, 'SubPlano', OLD.SubPlano, NEW.SubPlano );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;
