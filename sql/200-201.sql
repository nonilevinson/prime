--*
--* 2.00 para 2.01

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(200278,2,'Relatório de consultas com medicação separada e sem retirada','',278,50,0,'');
commit;

/************************************************************
	Arquivo Usuario   
************************************************************/
drop trigger arqUsuario_log;
drop view v_arqUsuario;
commit;

ALTER TABLE arqUsuario
add /* 18*/	ASSINATURA campoImagem, /* Imagem = Ligado com a Tabela LanceTipoImg */
add /* 19*/	ASSINATURA_ARQUIVO  VARCHAR(128)computed by ( lower( 'Usuario/' || CASE WHEN ( ASSINATURA IS NULL ) THEN ( 'sem_imagem' ) ELSE ( IDPRIMARIO || '_ASSINATURA.' || (select TI.CHAVE from tabLanceTipoImg TI where TI.IDPRIMARIO=ASSINATURA) ) END ) );
commit;

RECREATE VIEW V_arqUsuario AS 
	SELECT A0.IDPRIMARIO, A0.USUARIO, A0.NOME, A0.SENHA, A0.GRUPO, A1.GRUPO as GRUPO_GRUPO, A0.VERSAO, A0.EMAIL, A0.CRM, A0.PODEAGENDA, A0.ATIVO, A0.NASCIMENTO, A0.FOTO, A2.CHAVE as Foto_CHAVE, A2.DESCRITOR as Foto_DESCRITOR, A0.FOTO_ARQUIVO, A0.EMAILACES, A0.EMAILACESS, A0.EMAILFINAN, A0.EMCMEDISEP, A0.ASSINATURA, A3.CHAVE as Assinatura_CHAVE, A3.DESCRITOR as Assinatura_DESCRITOR, A0.ASSINATURA_ARQUIVO
	FROM arqUsuario A0
	left join arqGrupo A1 on A1.IDPRIMARIO = A0.GRUPO
	left join tabLanceTipoImg A2 on A2.IDPRIMARIO = A0.FOTO
	left join tabLanceTipoImg A3 on A3.IDPRIMARIO = A0.ASSINATURA;
commit;

/************************************************************
	Trigger para Log de arqUsuario
************************************************************/

set term ^;

recreate trigger arqUsuario_LOG for arqUsuario
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Usuario,'' );
else
	valorChave = coalesce( NEW.Usuario,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100005 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Usuario', OLD.Usuario, NEW.Usuario );
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Grupo', OLD.Grupo, NEW.Grupo );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'CRM', OLD.CRM, NEW.CRM );
	execute procedure set_log( 12, NEW.idPrimario, 'PodeAgenda', OLD.PodeAgenda, NEW.PodeAgenda );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Nascimento', OLD.Nascimento, NEW.Nascimento );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailAces', OLD.EmailAces, NEW.EmailAces );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailAcesS', OLD.EmailAcesS, NEW.EmailAcesS );
	execute procedure set_log( 12, NEW.idPrimario, 'EmailFinan', OLD.EmailFinan, NEW.EmailFinan );
	execute procedure set_log( 12, NEW.idPrimario, 'EmCMediSep', OLD.EmCMediSep, NEW.EmCMediSep );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Senha is distinct from OLD.Senha )  OR 
		( NEW.Versao is distinct from OLD.Versao )  OR 
		( NEW.Foto is distinct from OLD.Foto )  OR 
		( NEW.Assinatura is distinct from OLD.Assinatura )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
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

ALTER TABLE arqConsulta drop QuemAgRet, drop QdoAgRet, drop DataRet, drop DiaRet, drop HoraRet, drop TStAgRet,
	drop AssesRet, drop ObsRet;
commit;

RECREATE VIEW V_arqConsulta AS 
	SELECT A0.IDPRIMARIO, A0.NUM, A0.TICONSULTA, A1.TICONSULTA as TICONSULTA_TICONSULTA, A0.CLINICA, A2.CLINICA as CLINICA_CLINICA, A0.TSTCON, A3.STATUS as TSTCON_STATUS, A0.TIAGENDA, A4.TIAGENDA as TIAGENDA_TIAGENDA, A0.DATA, A0.HORA, A0.HORACHEGA, A0.PESSOA, A5.NOME as PESSOA_NOME, A5.NUMCELULAR as PESSOA_NUMCELULAR, A0.PRONTUARIO, A0.MEDICO, A6.USUARIO as MEDICO_USUARIO, A0.ASSESSOR, A7.USUARIO as ASSESSOR_USUARIO, A0.CALLCENTER, A8.USUARIO as CALLCENTER_USUARIO, A0.MEDICAATUA, A0.TMOTIVO, A9.CHAVE as TMotivo_CHAVE, A9.DESCRITOR as TMotivo_DESCRITOR, A0.CORTESIA, A0.VALOR, A0.FORMAPG, A10.FORMAPG as FORMAPG_FORMAPG, A0.VALOR2, A0.FORMAPG2, A11.FORMAPG as FORMAPG2_FORMAPG, A0.PTRATA, A12.PTRATA as PTRATA_PTRATA, A0.VALPTRATA, A0.ENTRAFPG, A13.FORMAPG as ENTRAFPG_FORMAPG, A0.ENTRAVAL, A0.ENTRAPARCE, A0.ENTRAPARC, A0.SDENTRFPG, A14.FORMAPG as SDENTRFPG_FORMAPG, A0.SDVENC1PAR, A0.SDCOND, A0.ENTRAVALP, A0.ENTRATOTP, A0.ENTRATOTAL, A0.BOLETOMIN, A0.ENTRAOBS, A0.SALDOFPG, A15.FORMAPG as SALDOFPG_FORMAPG, A0.SALDOPARC, A0.SALDOCOND, A0.SALDOVAL, A0.SALDOOBS, A0.CONDUTA, A0.MEDICACAO, A0.OBS, A0.CONTACONS, A16.TRANSACAO as CONTACONS_TRANSACAO, A0.CONTAPTRA, A17.TRANSACAO as CONTAPTRA_TRANSACAO, A0.TRGQTDM, A0.TRGQTDMENT, A0.SALDO
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
	left join arqFormaPg A15 on A15.IDPRIMARIO = A0.SALDOFPG
	left join arqConta A16 on A16.IDPRIMARIO = A0.CONTACONS
	left join arqConta A17 on A17.IDPRIMARIO = A0.CONTAPTRA;
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
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.TiConsulta is distinct from OLD.TiConsulta )  OR 
		( NEW.BoletoMin is distinct from OLD.BoletoMin )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;
