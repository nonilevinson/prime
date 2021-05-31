--*
--* 1.00 para 1.00A

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

/************************************************************
	Arquivo Parcela
************************************************************/
drop trigger arqParcela_log;
drop view v_arqParcela;
commit;

drop table arqParcela;
commit;

CREATE TABLE arqParcela
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	CONTA ligadoComArquivo, /* Ligado com o Arquivo Conta */
	/*  3*/	/* CLINICACAL */
	/*  4*/	/* TPGRECCAL */
	/*  5*/	/* PESSOACAL */
	/*  6*/	PARCELA SMALLINT, /* Máscara = N */
	/*  7*/	VENCIMENTO DATE, /* Máscara = 4ano */
	/*  8*/	VENCEST campoLogico, /* Lógico: 0=Não 1=Sim */
	/*  9*/	VALOR NUMERIC( 11, 2 ), /* Máscara = N */
	/* 10*/	VALORLIQ NUMERIC( 11, 2 ), /* Máscara = N */
	/* 11*/	ESTIMADO campoLogico, /* Lógico: 0=Não 1=Sim */
	/* 12*/	TFCOBRA ligadoComTabela, /* Ligado com a Tabela TFCobra */
	/* 13*/	EMISSAO DATE, /* Máscara = 4ano */
	/* 14*/	/* NUMBOLETO */
	/* 15*/	LINHADIG VARCHAR( 54 ) COLLATE PT_BR, /* Máscara = X */
	/* 16*/	NOMEPDF VARCHAR( 80 ) COLLATE PT_BR, /* Máscara = X */
	/* 17*/	CCOR ligadoComArquivo, /* Ligado com o Arquivo CCor */
	/* 18*/	SUBPLANO ligadoComArquivo, /* Ligado com o Arquivo SubPlano */
	/* 19*/	DATAPAGTO DATE, /* Máscara = 4ano */
	/* 20*/	DATACOMP DATE, /* Máscara = 4ano */
	/* 21*/	TFPAGTO ligadoComTabela, /* Ligado com a Tabela TFPagto */
	/* 22*/	TDETPG ligadoComTabela, /* Ligado com a Tabela TDetPg */
	/* 23*/	CHEQUE NUMERIC(18,0), /* Máscara = Z */
	/* 24*/	ARQ1 VARCHAR( 10 ), /* Arquivo = nome da extensão do mesmo */
	/* 25*/	ARQ1_ARQUIVO VARCHAR(128) computed by ( udf_lower( 'Parcela/' || CASE WHEN ( ARQ1 IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_ARQ1.' || ARQ1 ) END ) ),
	/* 26*/	STRETORNO VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = X */
	/* 27*/	REMESSA NUMERIC(18,0), /* Máscara = N */
	/* 28*/	DATAREM DATE, /* Máscara = 4ano */
	CONSTRAINT arqParcela_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqParcela_UK UNIQUE ( Conta, Parcela )
);
commit;

CREATE DESC INDEX arqParcela_IdPrimario_Desc ON arqParcela (IDPRIMARIO);
commit;

ALTER TABLE arqParcela ADD CLINICACAL VARCHAR( 30 ) computed by ( ( COALESCE( ( SELECT Clinica FROM arqClinica WHERE arqClinica.IdPrimario=( COALESCE( ( SELECT Clinica FROM arqConta WHERE arqConta.IdPrimario=( arqParcela.Conta ) ), 0 ) )  ), '' ) ) );
ALTER TABLE arqParcela ALTER CLINICACAL POSITION 3;
ALTER TABLE arqParcela ADD TPGRECCAL VARCHAR( 7 ) computed by ( (Select V.TPgRec_Descritor From v_arqConta V Where V.idPrimario = arqParcela.Conta) );
ALTER TABLE arqParcela ALTER TPGRECCAL POSITION 4;
ALTER TABLE arqParcela ADD PESSOACAL VARCHAR( 60 ) computed by ( ( COALESCE( ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConta WHERE arqConta.IdPrimario=( arqParcela.Conta ) ), 0 ) )  ), '' ) ) );
ALTER TABLE arqParcela ALTER PESSOACAL POSITION 5;
ALTER TABLE arqParcela ADD NUMBOLETO NUMERIC(18,0) computed by ( CASE
	WHEN( Emissao is not null ) THEN( IdPrimario )
	ELSE ( 0 )
	END  );
ALTER TABLE arqParcela ALTER NUMBOLETO POSITION 14;
commit;

ALTER TABLE arqParcela ADD CONSTRAINT arqParcela_FK_Conta FOREIGN KEY ( CONTA ) REFERENCES arqConta ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqParcela ADD CONSTRAINT arqParcela_FK_TFCobra FOREIGN KEY ( TFCOBRA ) REFERENCES tabTFCobra ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqParcela ADD CONSTRAINT arqParcela_FK_CCor FOREIGN KEY ( CCOR ) REFERENCES arqCCor ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqParcela ADD CONSTRAINT arqParcela_FK_SubPlano FOREIGN KEY ( SUBPLANO ) REFERENCES arqSubPlano ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqParcela ADD CONSTRAINT arqParcela_FK_TFPagto FOREIGN KEY ( TFPAGTO ) REFERENCES tabTFPagto ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqParcela ADD CONSTRAINT arqParcela_FK_TDetPg FOREIGN KEY ( TDETPG ) REFERENCES tabTDetPg ON DELETE SET NULL ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqParcela AS
	SELECT A0.IDPRIMARIO, A0.CONTA, A1.TRANSACAO as CONTA_TRANSACAO, A0.CLINICACAL, A0.TPGRECCAL, A0.PESSOACAL, A0.PARCELA, A0.VENCIMENTO, A0.VENCEST, A0.VALOR, A0.VALORLIQ, A0.ESTIMADO, A0.TFCOBRA, A2.CHAVE as TFCobra_CHAVE, A2.DESCRITOR as TFCobra_DESCRITOR, A0.EMISSAO, A0.NUMBOLETO, A0.LINHADIG, A0.NOMEPDF, A0.CCOR, A3.BANCO as CCOR_BANCO, A4.NUM as CCOR_BANCO_NUM, A4.BANCO as CCOR_BANCO_BANCO, A3.AGENCIA as CCOR_AGENCIA, A3.CONTA as CCOR_CONTA, A0.SUBPLANO, A5.PLANO as SUBPLANO_PLANO, A6.CODPLANO as SUBPLANO_PLANO_CODPLANO, A6.PLANO as SUBPLANO_PLANO_PLANO, A5.CODIGO as SUBPLANO_CODIGO, A5.NOME as SUBPLANO_NOME, A0.DATAPAGTO, A0.DATACOMP, A0.TFPAGTO, A7.CHAVE as TFPagto_CHAVE, A7.DESCRITOR as TFPagto_DESCRITOR, A0.TDETPG, A8.CHAVE as TDetPg_CHAVE, A8.DESCRITOR as TDetPg_DESCRITOR, A0.CHEQUE, A0.ARQ1, A0.Arq1_ARQUIVO, A0.STRETORNO, A0.REMESSA, A0.DATAREM
	FROM arqParcela A0
	left join arqConta A1 on A1.IDPRIMARIO = A0.CONTA
	left join tabTFCobra A2 on A2.IDPRIMARIO=A0.TFCOBRA
	left join arqCCor A3 on A3.IDPRIMARIO = A0.CCOR
	left join arqBanco A4 on A4.IDPRIMARIO = A3.BANCO
	left join arqSubPlano A5 on A5.IDPRIMARIO = A0.SUBPLANO
	left join arqPlano A6 on A6.IDPRIMARIO = A5.PLANO
	left join tabTFPagto A7 on A7.IDPRIMARIO=A0.TFPAGTO
	left join tabTDetPg A8 on A8.IDPRIMARIO=A0.TDETPG;
commit;

/************************************************************
	Trigger para Log de arqParcela
************************************************************/

set term ^;

recreate trigger arqParcela_LOG for arqParcela
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Conta_Transacao, ' ' ) || '-' || coalesce( Parcela, ' ' ) from v_arqParcela where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100034 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null );
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null );
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Conta', OLD.Conta, NEW.Conta );
	execute procedure set_log( 12, NEW.idPrimario, 'Parcela', OLD.Parcela, NEW.Parcela );
	execute procedure set_log( 12, NEW.idPrimario, 'Vencimento', OLD.Vencimento, NEW.Vencimento );
	execute procedure set_log( 12, NEW.idPrimario, 'VencEst', OLD.VencEst, NEW.VencEst );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'ValorLiq', OLD.ValorLiq, NEW.ValorLiq );
	execute procedure set_log( 12, NEW.idPrimario, 'Estimado', OLD.Estimado, NEW.Estimado );
	execute procedure set_log( 12, NEW.idPrimario, 'TFCobra', OLD.TFCobra, NEW.TFCobra );
	execute procedure set_log( 12, NEW.idPrimario, 'Emissao', OLD.Emissao, NEW.Emissao );
	execute procedure set_log( 12, NEW.idPrimario, 'CCor', OLD.CCor, NEW.CCor );
	execute procedure set_log( 12, NEW.idPrimario, 'SubPlano', OLD.SubPlano, NEW.SubPlano );
	execute procedure set_log( 12, NEW.idPrimario, 'DataPagto', OLD.DataPagto, NEW.DataPagto );
	execute procedure set_log( 12, NEW.idPrimario, 'DataComp', OLD.DataComp, NEW.DataComp );
	execute procedure set_log( 12, NEW.idPrimario, 'TFPagto', OLD.TFPagto, NEW.TFPagto );
	execute procedure set_log( 12, NEW.idPrimario, 'TDetPg', OLD.TDetPg, NEW.TDetPg );
	execute procedure set_log( 12, NEW.idPrimario, 'Cheque', OLD.Cheque, NEW.Cheque );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.LinhaDig is distinct from OLD.LinhaDig )  OR
		( NEW.NomePdf is distinct from OLD.NomePdf )  OR
		( NEW.Arq1 is distinct from OLD.Arq1 )  OR
		( NEW.StRetorno is distinct from OLD.StRetorno )  OR
		( NEW.Remessa is distinct from OLD.Remessa )  OR
		( NEW.DataRem is distinct from OLD.DataRem )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;
