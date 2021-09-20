--*
--* 1.08 para 1.09

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

ALTER TABLE arqParcela drop PessoaCal;
commit;

ALTER TABLE arqParcela ADD PESSOACAL VARCHAR( 60 ) computed by ( CASE
	WHEN( (Select C.Fornecedor From arqConta C Where C.idPrimario=arqParcela.Conta) is not null ) THEN( (Select F.Nome From arqConta C join arqFornecedor F on F.idPrimario=C.Fornecedor Where C.idPrimario=arqParcela.Conta) )
	ELSE ( (Select P.Nome From arqConta C join arqPessoa P on P.idPrimario=C.Pessoa Where C.idPrimario=arqParcela.Conta) )
	END  ); 
ALTER TABLE arqParcela ALTER PESSOACAL POSITION 5;
commit;

RECREATE VIEW V_arqParcela AS 
	SELECT A0.IDPRIMARIO, A0.CONTA, A1.TRANSACAO as CONTA_TRANSACAO, A0.CLINICACAL, A0.TPGRECCAL, A0.PESSOACAL, A0.PARCELA, A0.VENCIMENTO, A0.VENCEST, A0.VALOR, A0.VALORLIQ, A0.ESTIMADO, A0.TFCOBRA, A2.CHAVE as TFCobra_CHAVE, A2.DESCRITOR as TFCobra_DESCRITOR, A0.EMISSAO, A0.NUMBOLETO, A0.LINHADIG, A0.NOMEPDF, A0.CCOR, A3.NOME as CCOR_NOME, A0.SUBPLANO, A4.PLANO as SUBPLANO_PLANO, A5.CODPLANO as SUBPLANO_PLANO_CODPLANO, A5.PLANO as SUBPLANO_PLANO_PLANO, A4.CODIGO as SUBPLANO_CODIGO, A4.NOME as SUBPLANO_NOME, A0.DATAPAGTO, A0.DATACOMP, A0.TFPAGTO, A6.CHAVE as TFPagto_CHAVE, A6.DESCRITOR as TFPagto_DESCRITOR, A0.TDETPG, A7.CHAVE as TDetPg_CHAVE, A7.DESCRITOR as TDetPg_DESCRITOR, A0.CHEQUE, A0.ARQ1, A0.Arq1_ARQUIVO, A0.STRETORNO, A0.REMESSA, A0.DATAREM
	FROM arqParcela A0
	left join arqConta A1 on A1.IDPRIMARIO = A0.CONTA
	left join tabTFCobra A2 on A2.IDPRIMARIO=A0.TFCOBRA
	left join arqCCor A3 on A3.IDPRIMARIO = A0.CCOR
	left join arqSubPlano A4 on A4.IDPRIMARIO = A0.SUBPLANO
	left join arqPlano A5 on A5.IDPRIMARIO = A4.PLANO
	left join tabTFPagto A6 on A6.IDPRIMARIO=A0.TFPAGTO
	left join tabTDetPg A7 on A7.IDPRIMARIO=A0.TDETPG;
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
