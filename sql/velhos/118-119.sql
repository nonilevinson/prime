--*
--* 1.18 para 1.19

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(200242,2,'Envia o m_clinica_consulta_ativa','',242,99,1,'');
commit;

/************************************************************
	Arquivo Consulta  
************************************************************/
drop trigger arqConsulta_log;
drop view v_arqConsulta;
commit;

ALTER TABLE arqConsulta drop SaldoTotP, drop SaldoVal;
commit;

ALTER TABLE arqConsulta
ADD /* 25*/	SDCOND SMALLINT, /* M�scara = N */
ADD /* 33*/	SALDOCOND SMALLINT; /* M�scara = N */
commit;

ALTER TABLE arqConsulta ADD SALDOVAL NUMERIC( 8, 2 ) computed by ( CASE WHEN ( PTrata is not null ) THEN ( ( ValPTrata - EntraVal - ( EntraParc * EntraValP ) ) / SaldoParc ) ELSE ( 0 ) END ); 
commit;

RECREATE VIEW V_arqConsulta AS 
	SELECT A0.IDPRIMARIO, A0.NUM, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.TSTCON, A2.CHAVE as TStCon_CHAVE, A2.DESCRITOR as TStCon_DESCRITOR, A0.TIAGENDA, A3.TIAGENDA as TIAGENDA_TIAGENDA, A0.DATA, A0.HORA, A0.HORACHEGA, A0.PESSOA, A4.NOME as PESSOA_NOME, A4.NUMCELULAR as PESSOA_NUMCELULAR, A0.PRONTUARIO, A0.MEDICO, A5.USUARIO as MEDICO_USUARIO, A0.ASSESSOR, A6.USUARIO as ASSESSOR_USUARIO, A0.CALLCENTER, A7.USUARIO as CALLCENTER_USUARIO, A0.MEDICAATUA, A0.TMOTIVO, A8.CHAVE as TMotivo_CHAVE, A8.DESCRITOR as TMotivo_DESCRITOR, A0.FORMAPG, A9.FORMAPG as FORMAPG_FORMAPG, A0.VALOR, A0.PTRATA, A10.PTRATA as PTRATA_PTRATA, A0.VALPTRATA, A0.ENTRAFPG, A11.FORMAPG as ENTRAFPG_FORMAPG, A0.ENTRAVAL, A0.ENTRAPARC, A0.SDENTRFPG, A12.FORMAPG as SDENTRFPG_FORMAPG, A0.SDVENC1PAR, A0.SDCOND, A0.ENTRAVALP, A0.ENTRATOTP, A0.ENTRATOTAL, A0.BOLETOMIN, A0.ENTRAOBS, A0.SALDOFPG, A13.FORMAPG as SALDOFPG_FORMAPG, A0.SALDOPARC, A0.SALDOCOND, A0.SALDOVAL, A0.SALDOOBS, A0.CONDUTA, A0.MEDICACAO, A0.OBS, A0.CONTACONS, A14.TRANSACAO as CONTACONS_TRANSACAO, A0.CONTAPTRA, A15.TRANSACAO as CONTAPTRA_TRANSACAO, A0.TRGQTDM, A0.TRGQTDMENT, A0.SALDO, A0.QUEMAGRET, A16.USUARIO as QUEMAGRET_USUARIO, A0.QDOAGRET, A0.DATARET, A0.DIARET, A0.HORARET, A0.TSTAGRET, A17.CHAVE as TStAgRet_CHAVE, A17.DESCRITOR as TStAgRet_DESCRITOR, A0.ASSESRET, A18.USUARIO as ASSESRET_USUARIO, A0.OBSRET
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
	left join arqPTrata A10 on A10.IDPRIMARIO = A0.PTRATA
	left join arqFormaPg A11 on A11.IDPRIMARIO = A0.ENTRAFPG
	left join arqFormaPg A12 on A12.IDPRIMARIO = A0.SDENTRFPG
	left join arqFormaPg A13 on A13.IDPRIMARIO = A0.SALDOFPG
	left join arqConta A14 on A14.IDPRIMARIO = A0.CONTACONS
	left join arqConta A15 on A15.IDPRIMARIO = A0.CONTAPTRA
	left join arqUsuario A16 on A16.IDPRIMARIO = A0.QUEMAGRET
	left join tabTStAgRet A17 on A17.IDPRIMARIO=A0.TSTAGRET
	left join arqUsuario A18 on A18.IDPRIMARIO = A0.ASSESRET;
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
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg', OLD.FormaPg, NEW.FormaPg );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
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
alter FORMAPG position 16,
alter VALOR position 17,
alter PTRATA position 18,
alter VALPTRATA position 19,
alter ENTRAFPG position 20,
alter ENTRAVAL position 21,
alter ENTRAPARC position 22,
alter SDENTRFPG position 23,
alter SDVENC1PAR position 24,
alter SDCOND position 25,
alter ENTRAVALP position 26,
alter ENTRATOTP position 27,
alter ENTRATOTAL position 28,
alter BOLETOMIN position 29,
alter ENTRAOBS position 30,
alter SALDOFPG position 31,
alter SALDOPARC position 32,
alter SALDOCOND position 33,
alter SALDOVAL position 34,
alter SALDOOBS position 35,
alter CONDUTA position 36,
alter MEDICACAO position 37,
alter OBS position 38,
alter CONTACONS position 39,
alter CONTAPTRA position 40,
alter TRGQTDM position 41,
alter TRGQTDMENT position 42,
alter SALDO position 43,
alter QUEMAGRET position 44,
alter QDOAGRET position 45,
alter DATARET position 46,
alter DIARET position 47,
alter HORARET position 48,
alter TSTAGRET position 49,
alter ASSESRET position 50,
alter OBSRET position 51;
commit;
