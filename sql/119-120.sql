--*
--* 1.19 para 1.20

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

update arqLanceOperacao set Operacao = 'Relatório de parcelas de contas a pagar e a receber pelo menu Relatórios' Where idPrimario = 200166;

insert into arqLanceOperacao values(100059,1,'Cadastro da relação entre usuários e contas correntes','arqUsuCCor',59,90,0,'');
insert into arqLanceOperacao values(200249,2,'Rotina para criar aviso de que pode agendar a retirada da medicação','',249,1,0,'');
insert into arqLanceOperacao values(300005,3,'Pode alterar campos de separação de medicação da consulta - Estoque?','',5,1,0,'');
insert into arqLanceOperacao values(200253,2,'Rotina para excluir pessoas que tenham histórico de atividades - relação','',253,90,0,'');
commit;

/************************************************************
	Arquivo HoraBloq  
************************************************************/
drop trigger arqHoraBloq_log;
drop view v_arqHoraBloq;
commit;

ALTER TABLE arqHoraBloq
add /*  8*/	MEDICO ligadoComArquivo; /* Ligado com o Arquivo Usuario */
commit;

ALTER TABLE arqHoraBloq ADD CONSTRAINT arqHoraBloq_FK_Medico FOREIGN KEY ( MEDICO ) REFERENCES arqUsuario ON DELETE CASCADE ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqHoraBloq AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.NOME, A0.DATAINI, A0.HORAINI, A0.DATAFIM, A0.HORAFIM, A0.MEDICO, A2.USUARIO as MEDICO_USUARIO
	FROM arqHoraBloq A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqUsuario A2 on A2.IDPRIMARIO = A0.MEDICO;
commit;

/************************************************************
	Trigger para Log de arqHoraBloq
************************************************************/

set term ^;

recreate trigger arqHoraBloq_LOG for arqHoraBloq
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
	valorChave='';
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100037 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'DataIni', OLD.DataIni, NEW.DataIni );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraIni', OLD.HoraIni, NEW.HoraIni );
	execute procedure set_log( 12, NEW.idPrimario, 'DataFim', OLD.DataFim, NEW.DataFim );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraFim', OLD.HoraFim, NEW.HoraFim );
	execute procedure set_log( 12, NEW.idPrimario, 'Medico', OLD.Medico, NEW.Medico );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo Consulta  
************************************************************/
drop trigger arqConsulta_log;
drop view v_arqConsulta;
commit;

ALTER TABLE arqConsulta
add /* 16*/	CORTESIA campoLogico, /* Lógico: 0=Não 1=Sim */
add /* 19*/	VALOR2 NUMERIC( 8, 2 ), /* Máscara = N */
add /* 20*/	FORMAPG2 ligadoComArquivo; /* Ligado com o Arquivo FormaPg */
commit;

update arqConsulta set Cortesia=0, Valor2=0;
commit;

ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_FormaPg2 FOREIGN KEY ( FORMAPG2 ) REFERENCES arqFormaPg ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqConsulta AS 
	SELECT A0.IDPRIMARIO, A0.NUM, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.TSTCON, A2.CHAVE as TStCon_CHAVE, A2.DESCRITOR as TStCon_DESCRITOR, A0.TIAGENDA, A3.TIAGENDA as TIAGENDA_TIAGENDA, A0.DATA, A0.HORA, A0.HORACHEGA, A0.PESSOA, A4.NOME as PESSOA_NOME, A4.NUMCELULAR as PESSOA_NUMCELULAR, A0.PRONTUARIO, A0.MEDICO, A5.USUARIO as MEDICO_USUARIO, A0.ASSESSOR, A6.USUARIO as ASSESSOR_USUARIO, A0.CALLCENTER, A7.USUARIO as CALLCENTER_USUARIO, A0.MEDICAATUA, A0.TMOTIVO, A8.CHAVE as TMotivo_CHAVE, A8.DESCRITOR as TMotivo_DESCRITOR, A0.CORTESIA, A0.VALOR, A0.FORMAPG, A9.FORMAPG as FORMAPG_FORMAPG, A0.VALOR2, A0.FORMAPG2, A10.FORMAPG as FORMAPG2_FORMAPG, A0.PTRATA, A11.PTRATA as PTRATA_PTRATA, A0.VALPTRATA, A0.ENTRAFPG, A12.FORMAPG as ENTRAFPG_FORMAPG, A0.ENTRAVAL, A0.ENTRAPARC, A0.SDENTRFPG, A13.FORMAPG as SDENTRFPG_FORMAPG, A0.SDVENC1PAR, A0.SDCOND, A0.ENTRAVALP, A0.ENTRATOTP, A0.ENTRATOTAL, A0.BOLETOMIN, A0.ENTRAOBS, A0.SALDOFPG, A14.FORMAPG as SALDOFPG_FORMAPG, A0.SALDOPARC, A0.SALDOCOND, A0.SALDOVAL, A0.SALDOOBS, A0.CONDUTA, A0.MEDICACAO, A0.OBS, A0.CONTACONS, A15.TRANSACAO as CONTACONS_TRANSACAO, A0.CONTAPTRA, A16.TRANSACAO as CONTAPTRA_TRANSACAO, A0.TRGQTDM, A0.TRGQTDMENT, A0.SALDO, A0.QUEMAGRET, A17.USUARIO as QUEMAGRET_USUARIO, A0.QDOAGRET, A0.DATARET, A0.DIARET, A0.HORARET, A0.TSTAGRET, A18.CHAVE as TStAgRet_CHAVE, A18.DESCRITOR as TStAgRet_DESCRITOR, A0.ASSESRET, A19.USUARIO as ASSESRET_USUARIO, A0.OBSRET
	FROM arqConsulta A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join tabTStCon A2 on A2.IDPRIMARIO=A0.TSTCON
	left join arqTiAgenda A3 on A3.IDPRIMARIO = A0.TIAGENDA
	left join arqPessoa A4 on A4.IDPRIMARIO = A0.PESSOA
	left join arqUsuario A5 on A5.IDPRIMARIO = A0.MEDICO
	left join arqUsuario A6 on A6.IDPRIMARIO = A0.ASSESSOR
	left join arqUsuario A7 on A7.IDPRIMARIO = A0.CALLCENTER
	left join tabTMotivo A8 on A8.IDPRIMARIO=A0.TMOTIVO
	left join arqFormaPg A9 on A9.IDPRIMARIO = A0.FORMAPG
	left join arqFormaPg A10 on A10.IDPRIMARIO = A0.FORMAPG2
	left join arqPTrata A11 on A11.IDPRIMARIO = A0.PTRATA
	left join arqFormaPg A12 on A12.IDPRIMARIO = A0.ENTRAFPG
	left join arqFormaPg A13 on A13.IDPRIMARIO = A0.SDENTRFPG
	left join arqFormaPg A14 on A14.IDPRIMARIO = A0.SALDOFPG
	left join arqConta A15 on A15.IDPRIMARIO = A0.CONTACONS
	left join arqConta A16 on A16.IDPRIMARIO = A0.CONTAPTRA
	left join arqUsuario A17 on A17.IDPRIMARIO = A0.QUEMAGRET
	left join tabTStAgRet A18 on A18.IDPRIMARIO=A0.TSTAGRET
	left join arqUsuario A19 on A19.IDPRIMARIO = A0.ASSESRET;
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
	execute procedure set_log( 12, NEW.idPrimario, 'EntraParc', OLD.EntraParc, NEW.EntraParc );
	execute procedure set_log( 12, NEW.idPrimario, 'SdEntrFPg', OLD.SdEntrFPg, NEW.SdEntrFPg );
	execute procedure set_log( 12, NEW.idPrimario, 'SdVenc1Par', OLD.SdVenc1Par, NEW.SdVenc1Par );
	execute procedure set_log( 12, NEW.idPrimario, 'SdCond', OLD.SdCond, NEW.SdCond );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraValP', OLD.EntraValP, NEW.EntraValP );
	execute procedure set_log( 12, NEW.idPrimario, 'EntraObs', OLD.EntraObs, NEW.EntraObs );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoFPg', OLD.SaldoFPg, NEW.SaldoFPg );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoParc', OLD.SaldoParc, NEW.SaldoParc );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoCond', OLD.SaldoCond, NEW.SaldoCond );
	execute procedure set_log( 12, NEW.idPrimario, 'SaldoObs', OLD.SaldoObs, NEW.SaldoObs );
	execute procedure set_log( 12, NEW.idPrimario, 'Conduta', substring( OLD.Conduta from 1 for 255 ), substring( NEW.Conduta from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Medicacao', substring( OLD.Medicacao from 1 for 255 ), substring( NEW.Medicacao from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'ContaCons', OLD.ContaCons, NEW.ContaCons );
	execute procedure set_log( 12, NEW.idPrimario, 'ContaPTra', OLD.ContaPTra, NEW.ContaPTra );
	execute procedure set_log( 12, NEW.idPrimario, 'QuemAgRet', OLD.QuemAgRet, NEW.QuemAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'QdoAgRet', OLD.QdoAgRet, NEW.QdoAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'DataRet', OLD.DataRet, NEW.DataRet );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraRet', OLD.HoraRet, NEW.HoraRet );
	execute procedure set_log( 12, NEW.idPrimario, 'TStAgRet', OLD.TStAgRet, NEW.TStAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'AssesRet', OLD.AssesRet, NEW.AssesRet );
	execute procedure set_log( 12, NEW.idPrimario, 'ObsRet', substring( OLD.ObsRet from 1 for 255 ), substring( NEW.ObsRet from 1 for 255 ) );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.BoletoMin is distinct from OLD.BoletoMin )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

ALTER TABLE arqConsulta
alter IDPRIMARIO position 1,
alter NUM position 2,
alter CLINICA position 3,
alter TSTCON position 4,
alter TIAGENDA position 5,
alter DATA position 6,
alter HORA position 7,
alter HORACHEGA position 8,
alter PESSOA position 9,
alter PRONTUARIO position 10,
alter MEDICO position 11,
alter ASSESSOR position 12,
alter CALLCENTER position 13,
alter MEDICAATUA position 14,
alter TMOTIVO position 15,
alter CORTESIA position 16,
alter VALOR position 17,
alter FORMAPG position 18,
alter VALOR2 position 19,
alter FORMAPG2 position 20,
alter PTRATA position 21,
alter VALPTRATA position 22,
alter ENTRAFPG position 23,
alter ENTRAVAL position 24,
alter ENTRAPARC position 25,
alter SDENTRFPG position 26,
alter SDVENC1PAR position 27,
alter SDCOND position 28,
alter ENTRAVALP position 29,
alter ENTRATOTP position 30,
alter ENTRATOTAL position 31,
alter BOLETOMIN position 32,
alter ENTRAOBS position 33,
alter SALDOFPG position 34,
alter SALDOPARC position 35,
alter SALDOCOND position 36,
alter SALDOVAL position 37,
alter SALDOOBS position 38,
alter CONDUTA position 39,
alter MEDICACAO position 40,
alter OBS position 41,
alter CONTACONS position 42,
alter CONTAPTRA position 43,
alter TRGQTDM position 44,
alter TRGQTDMENT position 45,
alter SALDO position 46,
alter QUEMAGRET position 47,
alter QDOAGRET position 48,
alter DATARET position 49,
alter DIARET position 50,
alter HORARET position 51,
alter TSTAGRET position 52,
alter ASSESRET position 53,
alter OBSRET position 54;
commit;

/************************************************************
	Arquivo Grupo     
************************************************************/
drop trigger arqGrupo_log;
drop view v_arqGrupo;
commit;

ALTER TABLE arqGrupo
add /*  6*/	AVRETIRA campoLogico; /* Lógico: 0=Não 1=Sim */
commit;

update arqGrupo set AvRetira=0;
update arqGrupo set AvRetira=1 Where idPrimario = 2;
commit;

RECREATE VIEW V_arqGrupo AS 
	SELECT A0.IDPRIMARIO, A0.GRUPO, A0.CALLCENTER, A0.MEDICO, A0.ASSESSOR, A0.AVRETIRA
	FROM arqGrupo A0;
commit;

/************************************************************
	Trigger para Log de arqGrupo
************************************************************/

set term ^;

recreate trigger arqGrupo_LOG for arqGrupo
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Grupo,'' );
else
	valorChave = coalesce( NEW.Grupo,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100004 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Grupo', OLD.Grupo, NEW.Grupo );
	execute procedure set_log( 12, NEW.idPrimario, 'CallCenter', OLD.CallCenter, NEW.CallCenter );
	execute procedure set_log( 12, NEW.idPrimario, 'Medico', OLD.Medico, NEW.Medico );
	execute procedure set_log( 12, NEW.idPrimario, 'Assessor', OLD.Assessor, NEW.Assessor );
	execute procedure set_log( 12, NEW.idPrimario, 'AvRetira', OLD.AvRetira, NEW.AvRetira );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo UsuCCor   
************************************************************/

CREATE TABLE arqUsuCCor
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	USUARIO ligadoComArquivo, /* Ligado com o Arquivo Usuario */
	/*  3*/	CCOR ligadoComArquivo, /* Ligado com o Arquivo CCor */
	CONSTRAINT arqUsuCCor_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqUsuCCor_UK UNIQUE ( Usuario, CCor )
);
commit;

CREATE DESC INDEX arqUsuCCor_IdPrimario_Desc ON arqUsuCCor (IDPRIMARIO);
commit;

ALTER TABLE arqUsuCCor ADD CONSTRAINT arqUsuCCor_FK_Usuario FOREIGN KEY ( USUARIO ) REFERENCES arqUsuario ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqUsuCCor ADD CONSTRAINT arqUsuCCor_FK_CCor FOREIGN KEY ( CCOR ) REFERENCES arqCCor ON DELETE CASCADE ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqUsuCCor AS 
	SELECT A0.IDPRIMARIO, A0.USUARIO, A1.USUARIO as USUARIO_USUARIO, A0.CCOR, A2.NOME as CCOR_NOME
	FROM arqUsuCCor A0
	left join arqUsuario A1 on A1.IDPRIMARIO = A0.USUARIO
	left join arqCCor A2 on A2.IDPRIMARIO = A0.CCOR;
commit;

/************************************************************
	Trigger para Log de arqUsuCCor
************************************************************/

set term ^;

recreate trigger arqUsuCCor_LOG for arqUsuCCor
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Usuario_Usuario, ' ' ) || '-' || coalesce( CCor_Nome, ' ' ) from v_arqUsuCCor where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100059 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Usuario', OLD.Usuario, NEW.Usuario );
	execute procedure set_log( 12, NEW.idPrimario, 'CCor', OLD.CCor, NEW.CCor );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo Consulta  
************************************************************/

ALTER TABLE arqConsulta Drop CONSTRAINT arqConsulta_FK_ContaCons, drop CONSTRAINT arqConsulta_FK_ContaPTra;
commit;

ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_ContaCons FOREIGN KEY ( CONTACONS ) REFERENCES arqConta ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_ContaPTra FOREIGN KEY ( CONTAPTRA ) REFERENCES arqConta ON DELETE CASCADE ON UPDATE CASCADE;
commit;

