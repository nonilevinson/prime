--*
--* 2.05 para 2.06

insert into arqLanceOperacao values(100062,1,'Cadastro de motivos de backup de medicação','arqBkpMotivo',62,2,0,'');
insert into arqLanceOperacao values(200289,2,'Relatório de backup de medicação de consultas','',289,50,0,'');
commit;

/************************************************************
	Arquivo BkpMotivo 
************************************************************/

CREATE TABLE arqBkpMotivo
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	BKPMOTIVO VARCHAR( 50 ) COLLATE PT_BR, /* Máscara = I */
	/*  3*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqBkpMotivo_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqBkpMotivo_UK UNIQUE ( BkpMotivo )
);
commit;

CREATE DESC INDEX arqBkpMotivo_IdPrimario_Desc ON arqBkpMotivo (IDPRIMARIO);
commit;

RECREATE VIEW V_arqBkpMotivo AS 
	SELECT A0.IDPRIMARIO, A0.BKPMOTIVO, A0.ATIVO
	FROM arqBkpMotivo A0;
commit;

/************************************************************
	Trigger para Log de arqBkpMotivo
************************************************************/

set term ^;

recreate trigger arqBkpMotivo_LOG for arqBkpMotivo
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.BkpMotivo,'' );
else
	valorChave = coalesce( NEW.BkpMotivo,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100062 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'BkpMotivo', OLD.BkpMotivo, NEW.BkpMotivo );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
end
end^

set term ;^

commit;

INSERT INTO ARQBKPMOTIVO (IDPRIMARIO, BKPMOTIVO, ATIVO) VALUES (2, 'Cliente faltou', 1);
INSERT INTO ARQBKPMOTIVO (IDPRIMARIO, BKPMOTIVO, ATIVO) VALUES (1, 'Cliente informou que desistiu do tratamento', 1);
COMMIT WORK;

/************************************************************
	Arquivo Consulta  

	Alterados:
	- EntraTotP > calculado para digitado
	
	Excluídos:
	- SdVenc1Par > digitado
	- SdCond > digitado
	- SaldoCond > digitado
	
	Excluídos que não precisamos mexer na API:
	- SaldoVal > calculado
	
	Criados:
	- I1Valor > digitado
	- I1FPg > ligado
	- I1Parc > digitado
	- I2Valor > digitado
	- I2FPg > ligado
	- I2Parc > digitado
	- SaldoValor > digitado
	
	Criados que não precisam entrar na API
	- SubTotal >> calculado
	- SubSaldo >> calculado

************************************************************/
drop trigger arqConsulta_log;
drop view v_arqConsulta;
commit;

--* drop para recriar depois
ALTER TABLE arqConsulta drop EntraTotal, drop EntraTotP;
commit;

ALTER TABLE arqConsulta
add ENTRATOTP NUMERIC( 8, 2 );
commit;

update arqConsulta set EntraTotP = EntraParc * EntraValP;
commit;

ALTER TABLE arqConsulta ADD ENTRATOTAL NUMERIC( 8, 2 ) computed by ( EntraVal + EntraTotP ); 
commit;

ALTER TABLE arqConsulta
add /* 39*/	SALDOVALOR NUMERIC( 8, 2 ); /* Máscara = N */
commit;

update arqConsulta set SaldoValor = SaldoParc * SaldoVal;
commit;

--* drop eterno
ALTER TABLE arqConsulta drop SdVenc1Par, drop SdCond, drop SaldoVal, drop EntraValP, drop SaldoCond;
commit;

ALTER TABLE arqConsulta
add /* 33*/	I1VALOR NUMERIC( 8, 2 ), /* Máscara = N */
add /* 34*/	I1FPG ligadoComArquivo, /* Ligado com o Arquivo FormaPg */
add /* 35*/	I1PARC SMALLINT, /* Máscara = N */
add /* 36*/	I2VALOR NUMERIC( 8, 2 ), /* Máscara = N */
add /* 37*/	I2FPG ligadoComArquivo, /* Ligado com o Arquivo FormaPg */
add /* 38*/	I2PARC SMALLINT; /* Máscara = N */
commit;

update arqConsulta set I1Valor=0, I1Parc=0, I2Valor=0, I2Parc=0;
commit;

ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_I1FPg FOREIGN KEY ( I1FPG ) REFERENCES arqFormaPg ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_I2FPg FOREIGN KEY ( I2FPG ) REFERENCES arqFormaPg ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

ALTER TABLE arqConsulta ADD SUBTOTAL NUMERIC( 8, 2 ) computed by ( EntraVal + EntraTotP +I1Valor + I2Valor ); 
ALTER TABLE arqConsulta ADD SUBSALDO NUMERIC( 8, 2 ) computed by ( ValPTrata - SubTotal ); 
commit;

--? daqui para cima já rodei e tudo certo

ALTER TABLE arqConsulta
add /* 53*/	BKPDATA DATE, /* Máscara = 4ano */
add /* 54*/	BKPASSESS ligadoComArquivo, /* Ligado com o Arquivo Usuario */
add /* 55*/	BKPMOTIVO ligadoComArquivo, /* Ligado com o Arquivo BkpMotivo */
add /* 56*/	BKPOBS VARCHAR( 80 ) COLLATE PT_BR; /* Máscara = I */
commit;

update arqConsulta set BkpObs='';
commit;

ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_BkpAssess FOREIGN KEY ( BKPASSESS ) REFERENCES arqUsuario ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_BkpMotivo FOREIGN KEY ( BKPMOTIVO ) REFERENCES arqBkpMotivo ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqConsulta AS 
	SELECT A0.IDPRIMARIO, A0.NUM, A0.TICONSULTA, A1.TICONSULTA as TICONSULTA_TICONSULTA, A0.CLINICA, A2.CLINICA as CLINICA_CLINICA, A0.TSTCON, A3.STATUS as TSTCON_STATUS, A0.TIAGENDA, A4.TIAGENDA as TIAGENDA_TIAGENDA, A0.DATA, A0.HORA, A0.HORACHEGA, A0.PESSOA, A5.NOME as PESSOA_NOME, A5.NUMCELULAR as PESSOA_NUMCELULAR, A0.PRONTUARIO, A0.MEDICO, A6.USUARIO as MEDICO_USUARIO, A0.ASSESSOR, A7.USUARIO as ASSESSOR_USUARIO, A0.CALLCENTER, A8.USUARIO as CALLCENTER_USUARIO, A0.MEDICAATUA, A0.TMOTIVO, A9.CHAVE as TMotivo_CHAVE, A9.DESCRITOR as TMotivo_DESCRITOR, A0.CORTESIA, A0.VALOR, A0.FORMAPG, A10.FORMAPG as FORMAPG_FORMAPG, A0.VALOR2, A0.FORMAPG2, A11.FORMAPG as FORMAPG2_FORMAPG, A0.PTRATA, A12.PTRATA as PTRATA_PTRATA, A0.VALPTRATA, A0.ENTRAFPG, A13.FORMAPG as ENTRAFPG_FORMAPG, A0.ENTRAVAL, A0.ENTRAPARCE, A0.ENTRATOTP, A0.SDENTRFPG, A14.FORMAPG as SDENTRFPG_FORMAPG, A0.ENTRAPARC, A0.ENTRATOTAL, A0.BOLETOMIN, A0.ENTRAOBS, A0.I1VALOR, A0.I1FPG, A15.FORMAPG as I1FPG_FORMAPG, A0.I1PARC, A0.I2VALOR, A0.I2FPG, A16.FORMAPG as I2FPG_FORMAPG, A0.I2PARC, A0.SUBTOTAL, A0.SUBSALDO, A0.SALDOVALOR, A0.SALDOFPG, A17.FORMAPG as SALDOFPG_FORMAPG, A0.SALDOPARC, A0.SALDOOBS, A0.CONDUTA, A0.MEDICACAO, A0.OBS, A0.CONTACONS, A18.TRANSACAO as CONTACONS_TRANSACAO, A0.CONTAPTRA, A19.TRANSACAO as CONTAPTRA_TRANSACAO, A0.TRGQTDM, A0.TRGQTDMENT, A0.SALDO, A0.BKPDATA, A0.BKPASSESS, A20.USUARIO as BKPASSESS_USUARIO, A0.BKPMOTIVO, A21.BKPMOTIVO as BKPMOTIVO_BKPMOTIVO, A0.BKPOBS
	FROM arqConsulta A0
	left join arqTiConsulta A1 on A1.IDPRIMARIO = A0.TICONSULTA
	left join arqClinica A2 on A2.IDPRIMARIO = A0.CLINICA
	left join arqTStCon A3 on A3.IDPRIMARIO = A0.TSTCON
	left join arqTiAgenda A4 on A4.IDPRIMARIO = A0.TIAGENDA
	left join arqPessoa A5 on A5.IDPRIMARIO = A0.PESSOA
	left join arqUsuario A6 on A6.IDPRIMARIO = A0.MEDICO
	left join arqUsuario A7 on A7.IDPRIMARIO = A0.ASSESSOR
	left join arqUsuario A8 on A8.IDPRIMARIO = A0.CALLCENTER
	left join tabTMotivo A9 on A9.IDPRIMARIO=A0.TMOTIVO
	left join arqFormaPg A10 on A10.IDPRIMARIO = A0.FORMAPG
	left join arqFormaPg A11 on A11.IDPRIMARIO = A0.FORMAPG2
	left join arqPTrata A12 on A12.IDPRIMARIO = A0.PTRATA
	left join arqFormaPg A13 on A13.IDPRIMARIO = A0.ENTRAFPG
	left join arqFormaPg A14 on A14.IDPRIMARIO = A0.SDENTRFPG
	left join arqFormaPg A15 on A15.IDPRIMARIO = A0.I1FPG
	left join arqFormaPg A16 on A16.IDPRIMARIO = A0.I2FPG
	left join arqFormaPg A17 on A17.IDPRIMARIO = A0.SALDOFPG
	left join arqConta A18 on A18.IDPRIMARIO = A0.CONTACONS
	left join arqConta A19 on A19.IDPRIMARIO = A0.CONTAPTRA
	left join arqUsuario A20 on A20.IDPRIMARIO = A0.BKPASSESS
	left join arqBkpMotivo A21 on A21.IDPRIMARIO = A0.BKPMOTIVO;
commit;

/************************************************************
	Trigger para Log de arqConsulta
************************************************************/

set term ^;

recreate trigger arqConsulta_LOG for arqConsulta
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Num,'' );
else
	valorChave = coalesce( NEW.Num,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100039 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Num', OLD.Num, NEW.Num );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'TStCon', OLD.TStCon, NEW.TStCon );
	execute procedure set_log( 12, NEW.idPrimario, 'TiAgenda', OLD.TiAgenda, NEW.TiAgenda );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Hora', OLD.Hora, NEW.Hora );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraChega', OLD.HoraChega, NEW.HoraChega );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'Medico', OLD.Medico, NEW.Medico );
	execute procedure set_log( 12, NEW.idPrimario, 'Assessor', OLD.Assessor, NEW.Assessor );
	execute procedure set_log( 12, NEW.idPrimario, 'CallCenter', OLD.CallCenter, NEW.CallCenter );
	execute procedure set_log( 12, NEW.idPrimario, 'MedicaAtua', substring( OLD.MedicaAtua from 1 for 255 ), substring( NEW.MedicaAtua from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'TMotivo', OLD.TMotivo, NEW.TMotivo );
	execute procedure set_log( 12, NEW.idPrimario, 'Cortesia', OLD.Cortesia, NEW.Cortesia );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg', OLD.FormaPg, NEW.FormaPg );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor2', OLD.Valor2, NEW.Valor2 );
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg2', OLD.FormaPg2, NEW.FormaPg2 );
	execute procedure set_log( 12, NEW.idPrimario, 'PTrata', OLD.PTrata, NEW.PTrata );
	execute procedure set_log( 12, NEW.idPrimario, 'ValPTrata', OLD.ValPTrata, NEW.ValPTrata );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraFPg', OLD.EntraFPg, NEW.EntraFPg );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraVal', OLD.EntraVal, NEW.EntraVal );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraParcE', OLD.EntraParcE, NEW.EntraParcE );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraTotP', OLD.EntraTotP, NEW.EntraTotP );
	execute procedure set_log( 12, NEW.idPrimario, 'SdEntrFPg', OLD.SdEntrFPg, NEW.SdEntrFPg );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraParc', OLD.EntraParc, NEW.EntraParc );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraObs', OLD.EntraObs, NEW.EntraObs );
	execute procedure set_log( 12, NEW.idPrimario, 'I1Valor', OLD.I1Valor, NEW.I1Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'I1FPg', OLD.I1FPg, NEW.I1FPg );
	execute procedure set_log( 12, NEW.idPrimario, 'I1Parc', OLD.I1Parc, NEW.I1Parc );
	execute procedure set_log( 12, NEW.idPrimario, 'I2Valor', OLD.I2Valor, NEW.I2Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'I2FPg', OLD.I2FPg, NEW.I2FPg );
	execute procedure set_log( 12, NEW.idPrimario, 'I2Parc', OLD.I2Parc, NEW.I2Parc );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoValor', OLD.SaldoValor, NEW.SaldoValor );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoFPg', OLD.SaldoFPg, NEW.SaldoFPg );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoParc', OLD.SaldoParc, NEW.SaldoParc );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoObs', OLD.SaldoObs, NEW.SaldoObs );
	execute procedure set_log( 12, NEW.idPrimario, 'Conduta', substring( OLD.Conduta from 1 for 255 ), substring( NEW.Conduta from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Medicacao', substring( OLD.Medicacao from 1 for 255 ), substring( NEW.Medicacao from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'ContaCons', OLD.ContaCons, NEW.ContaCons );
	execute procedure set_log( 12, NEW.idPrimario, 'ContaPTra', OLD.ContaPTra, NEW.ContaPTra );
	execute procedure set_log( 12, NEW.idPrimario, 'BkpData', OLD.BkpData, NEW.BkpData );
	execute procedure set_log( 12, NEW.idPrimario, 'BkpAssess', OLD.BkpAssess, NEW.BkpAssess );
	execute procedure set_log( 12, NEW.idPrimario, 'BkpMotivo', OLD.BkpMotivo, NEW.BkpMotivo );
	execute procedure set_log( 12, NEW.idPrimario, 'BkpObs', OLD.BkpObs, NEW.BkpObs );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.TiConsulta is distinct from OLD.TiConsulta )  OR 
		( NEW.BoletoMin is distinct from OLD.BoletoMin )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

ALTER TABLE arqConsulta
alter IDPRIMARIO position 1,
alter NUM position 2,
alter TICONSULTA position 3,
alter CLINICA position 4,
alter TSTCON position 5,
alter TIAGENDA position 6,
alter DATA position 7,
alter HORA position 8,
alter HORACHEGA position 9,
alter PESSOA position 10,
alter PRONTUARIO position 11,
alter MEDICO position 12,
alter ASSESSOR position 13,
alter CALLCENTER position 14,
alter MEDICAATUA position 15,
alter TMOTIVO position 16,
alter CORTESIA position 17,
alter VALOR position 18,
alter FORMAPG position 19,
alter VALOR2 position 20,
alter FORMAPG2 position 21,
alter PTRATA position 22,
alter VALPTRATA position 23,
alter ENTRAFPG position 24,
alter ENTRAVAL position 25,
alter ENTRAPARCE position 26,
alter ENTRATOTP position 27,
alter SDENTRFPG position 28,
alter ENTRAPARC position 29,
alter ENTRATOTAL position 30,
alter BOLETOMIN position 31,
alter ENTRAOBS position 32,
alter I1VALOR position 33,
alter I1FPG position 34,
alter I1PARC position 35,
alter I2VALOR position 36,
alter I2FPG position 37,
alter I2PARC position 38,
alter SUBTOTAL position 39,
alter SUBSALDO position 40,
alter SALDOVALOR position 41,
alter SALDOFPG position 42,
alter SALDOPARC position 43,
alter SALDOOBS position 44,
alter CONDUTA position 45,
alter MEDICACAO position 46,
alter OBS position 47,
alter CONTACONS position 48,
alter CONTAPTRA position 49,
alter TRGQTDM position 50,
alter TRGQTDMENT position 51,
alter SALDO position 52,
alter BKPDATA position 53,
alter BKPASSESS position 54,
alter BKPMOTIVO position 55,
alter BKPOBS position 56;
commit;
