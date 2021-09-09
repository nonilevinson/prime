--*
--* 1.06 para 1.07

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(200151,2,'Rotina para gerar plantões médicos','',151,1,0,'');
commit;

/************************************************************
	Arquivo CCor      
************************************************************/
drop trigger arqCCor_log;
drop view v_arqCCor;
commit;

ALTER TABLE arqCCor drop CONSTRAINT arqCCor_UK;
commit;

ALTER TABLE arqCCor
add /*  2*/	NOME VARCHAR( 30 ) COLLATE PT_BR, /* Máscara = I */
add /*  3*/	CLINICA ligadoComArquivo; /* Ligado com o Arquivo Clinica */
commit;

ALTER TABLE arqCCor ADD CONSTRAINT arqCCor_FK_Clinica FOREIGN KEY ( CLINICA ) REFERENCES arqClinica ON DELETE CASCADE ON UPDATE CASCADE;
commit;

update arqCCor set Nome = idPrimario;
commit;

ALTER TABLE arqCCor ADD CONSTRAINT arqCCor_UK UNIQUE ( Nome );
commit;

RECREATE VIEW V_arqCCor AS 
	SELECT A0.IDPRIMARIO, A0.NOME, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.BANCO, A2.NUM as BANCO_NUM, A2.BANCO as BANCO_BANCO, A0.AGENCIA, A0.DVAGENCIA, A0.CONTA, A0.DVCONTA, A0.CARTEIRA, A0.CODCEDENTE, A0.MULTA, A0.JUROS, A0.CBOLETO, A0.INSTRUCOES, A0.ULTREMESSA, A0.CONVENIO, A0.VARIACAO, A0.ATIVO, A0.TPIX1, A3.CHAVE as TPix1_CHAVE, A3.DESCRITOR as TPix1_DESCRITOR, A0.PIX1, A0.TPIX2, A4.CHAVE as TPix2_CHAVE, A4.DESCRITOR as TPix2_DESCRITOR, A0.PIX2, A0.TPIX3, A5.CHAVE as TPix3_CHAVE, A5.DESCRITOR as TPix3_DESCRITOR, A0.PIX3, A0.TPIX4, A6.CHAVE as TPix4_CHAVE, A6.DESCRITOR as TPix4_DESCRITOR, A0.PIX4, A0.TPIX5, A7.CHAVE as TPix5_CHAVE, A7.DESCRITOR as TPix5_DESCRITOR, A0.PIX5
	FROM arqCCor A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqBanco A2 on A2.IDPRIMARIO = A0.BANCO
	left join tabTPix A3 on A3.IDPRIMARIO=A0.TPIX1
	left join tabTPix A4 on A4.IDPRIMARIO=A0.TPIX2
	left join tabTPix A5 on A5.IDPRIMARIO=A0.TPIX3
	left join tabTPix A6 on A6.IDPRIMARIO=A0.TPIX4
	left join tabTPix A7 on A7.IDPRIMARIO=A0.TPIX5;
commit;

/************************************************************
	Trigger para Log de arqCCor
************************************************************/

set term ^;

recreate trigger arqCCor_LOG for arqCCor
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Nome,'' );
else
	valorChave = coalesce( NEW.Nome,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100020 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Banco', OLD.Banco, NEW.Banco );
	execute procedure set_log( 12, NEW.idPrimario, 'Agencia', OLD.Agencia, NEW.Agencia );
	execute procedure set_log( 12, NEW.idPrimario, 'DvAgencia', OLD.DvAgencia, NEW.DvAgencia );
	execute procedure set_log( 12, NEW.idPrimario, 'Conta', OLD.Conta, NEW.Conta );
	execute procedure set_log( 12, NEW.idPrimario, 'DvConta', OLD.DvConta, NEW.DvConta );
	execute procedure set_log( 12, NEW.idPrimario, 'Carteira', OLD.Carteira, NEW.Carteira );
	execute procedure set_log( 12, NEW.idPrimario, 'CodCedente', OLD.CodCedente, NEW.CodCedente );
	execute procedure set_log( 12, NEW.idPrimario, 'Multa', OLD.Multa, NEW.Multa );
	execute procedure set_log( 12, NEW.idPrimario, 'Juros', OLD.Juros, NEW.Juros );
	execute procedure set_log( 12, NEW.idPrimario, 'CBoleto', OLD.CBoleto, NEW.CBoleto );
	execute procedure set_log( 12, NEW.idPrimario, 'Instrucoes', substring( OLD.Instrucoes from 1 for 255 ), substring( NEW.Instrucoes from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'UltRemessa', OLD.UltRemessa, NEW.UltRemessa );
	execute procedure set_log( 12, NEW.idPrimario, 'Convenio', OLD.Convenio, NEW.Convenio );
	execute procedure set_log( 12, NEW.idPrimario, 'Variacao', OLD.Variacao, NEW.Variacao );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'TPix1', OLD.TPix1, NEW.TPix1 );
	execute procedure set_log( 12, NEW.idPrimario, 'Pix1', OLD.Pix1, NEW.Pix1 );
	execute procedure set_log( 12, NEW.idPrimario, 'TPix2', OLD.TPix2, NEW.TPix2 );
	execute procedure set_log( 12, NEW.idPrimario, 'Pix2', OLD.Pix2, NEW.Pix2 );
	execute procedure set_log( 12, NEW.idPrimario, 'TPix3', OLD.TPix3, NEW.TPix3 );
	execute procedure set_log( 12, NEW.idPrimario, 'Pix3', OLD.Pix3, NEW.Pix3 );
	execute procedure set_log( 12, NEW.idPrimario, 'TPix4', OLD.TPix4, NEW.TPix4 );
	execute procedure set_log( 12, NEW.idPrimario, 'Pix4', OLD.Pix4, NEW.Pix4 );
	execute procedure set_log( 12, NEW.idPrimario, 'TPix5', OLD.TPix5, NEW.TPix5 );
	execute procedure set_log( 12, NEW.idPrimario, 'Pix5', OLD.Pix5, NEW.Pix5 );
end
end^

set term ;^

commit;

ALTER TABLE arqCCor
alter IDPRIMARIO position 1,
alter NOME position 2,
alter CLINICA position 3,
alter BANCO position 4,
alter AGENCIA position 5,
alter DVAGENCIA position 6,
alter CONTA position 7,
alter DVCONTA position 8,
alter CARTEIRA position 9,
alter CODCEDENTE position 10,
alter MULTA position 11,
alter JUROS position 12,
alter CBOLETO position 13,
alter INSTRUCOES position 14,
alter ULTREMESSA position 15,
alter CONVENIO position 16,
alter VARIACAO position 17,
alter ATIVO position 18,
alter TPIX1 position 19,
alter PIX1 position 20,
alter TPIX2 position 21,
alter PIX2 position 22,
alter TPIX3 position 23,
alter PIX3 position 24,
alter TPIX4 position 25,
alter PIX4 position 26,
alter TPIX5 position 27,
alter PIX5 position 28;
commit;

/************************************************************
	Arquivo Parcela   
************************************************************/
drop trigger arqParcela_log;
drop view v_arqParcela;
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
