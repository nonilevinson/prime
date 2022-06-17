--*
--* 1.23 para 2.00

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

insert into arqLanceOperacao values(100060,1,'Cadastro de tipos de consultas','arqTiConsulta',60,99,1,'');

commit;


--* Arquivo TiConsulta
--* Preferi criar como arquivo somente para GR0 do que como tabela. No futuro de precisarmos configurar coisas, bastará criar campos
--* No Portal da Agenda, o AK poderá ordenar os botões das Clínicas por TiConsulta e nome/sigla da clínica

CREATE TABLE arqTiConsulta
(
	/*  1*/	IDPRIMARIO chavePrimaria,
	/*  2*/	TICONSULTA VARCHAR( 15 ) COLLATE PT_BR, /* Máscara = I */
	/*  3*/	ATIVO campoLogico, /* Lógico: 0=Não 1=Sim */
	CONSTRAINT arqTiConsulta_PK PRIMARY KEY ( IDPRIMARIO ),
	CONSTRAINT arqTiConsulta_UK UNIQUE ( TiConsulta )
);
commit;

CREATE DESC INDEX arqTiConsulta_IdPrimario_Desc ON arqTiConsulta (IDPRIMARIO);
commit;


insert into arqTiConsulta values( 1, 'Tratamento', 1 );
insert into arqTiConsulta values( 2, 'Nutricionista', 1 );
insert into arqTiConsulta values( 3, 'Psicólogo', 1 );
commit;

RECREATE VIEW V_arqTiConsulta AS 
	SELECT A0.IDPRIMARIO, A0.TICONSULTA, A0.ATIVO
	FROM arqTiConsulta A0;
commit;

--* Arquivo Consulta  
--* Criado o TiConsulta e todas as existentes passam a ser do tipo Tratamento (idPrimario TiConsulta = 1)
drop trigger arqConsulta_log;
drop view v_arqConsulta;
commit;

ALTER TABLE arqConsulta
add /*  3*/	TICONSULTA ligadoComArquivo; /* Ligado com o Arquivo TiConsulta */
commit;

ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_TiConsulta FOREIGN KEY ( TICONSULTA ) REFERENCES arqTiConsulta ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

update arqConsulta set TiConsulta=1;
commit;

RECREATE VIEW V_arqConsulta AS 
	SELECT A0.IDPRIMARIO, A0.NUM, A0.TICONSULTA, A1.TICONSULTA as TICONSULTA_TICONSULTA, A0.CLINICA, A2.CLINICA as CLINICA_CLINICA, A0.TSTCON, A3.CHAVE as TStCon_CHAVE, A3.DESCRITOR as TStCon_DESCRITOR, A0.TIAGENDA, A4.TIAGENDA as TIAGENDA_TIAGENDA, A0.DATA, A0.HORA, A0.HORACHEGA, A0.PESSOA, A5.NOME as PESSOA_NOME, A5.NUMCELULAR as PESSOA_NUMCELULAR, A0.PRONTUARIO, A0.MEDICO, A6.USUARIO as MEDICO_USUARIO, A0.ASSESSOR, A7.USUARIO as ASSESSOR_USUARIO, A0.CALLCENTER, A8.USUARIO as CALLCENTER_USUARIO, A0.MEDICAATUA, A0.TMOTIVO, A9.CHAVE as TMotivo_CHAVE, A9.DESCRITOR as TMotivo_DESCRITOR, A0.CORTESIA, A0.VALOR, A0.FORMAPG, A10.FORMAPG as FORMAPG_FORMAPG, A0.VALOR2, A0.FORMAPG2, A11.FORMAPG as FORMAPG2_FORMAPG, A0.PTRATA, A12.PTRATA as PTRATA_PTRATA, A0.VALPTRATA, A0.ENTRAFPG, A13.FORMAPG as ENTRAFPG_FORMAPG, A0.ENTRAVAL, A0.ENTRAPARCE, A0.ENTRAPARC, A0.SDENTRFPG, A14.FORMAPG as SDENTRFPG_FORMAPG, A0.SDVENC1PAR, A0.SDCOND, A0.ENTRAVALP, A0.ENTRATOTP, A0.ENTRATOTAL, A0.BOLETOMIN, A0.ENTRAOBS, A0.SALDOFPG, A15.FORMAPG as SALDOFPG_FORMAPG, A0.SALDOPARC, A0.SALDOCOND, A0.SALDOVAL, A0.SALDOOBS, A0.CONDUTA, A0.MEDICACAO, A0.OBS, A0.CONTACONS, A16.TRANSACAO as CONTACONS_TRANSACAO, A0.CONTAPTRA, A17.TRANSACAO as CONTAPTRA_TRANSACAO, A0.TRGQTDM, A0.TRGQTDMENT, A0.SALDO, A0.QUEMAGRET, A18.USUARIO as QUEMAGRET_USUARIO, A0.QDOAGRET, A0.DATARET, A0.DIARET, A0.HORARET, A0.TSTAGRET, A19.CHAVE as TStAgRet_CHAVE, A19.DESCRITOR as TStAgRet_DESCRITOR, A0.ASSESRET, A20.USUARIO as ASSESRET_USUARIO, A0.OBSRET
	FROM arqConsulta A0
	left join arqTiConsulta A1 on A1.IDPRIMARIO = A0.TICONSULTA
	left join arqClinica A2 on A2.IDPRIMARIO = A0.CLINICA
	left join tabTStCon A3 on A3.IDPRIMARIO=A0.TSTCON
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
	left join arqConta A17 on A17.IDPRIMARIO = A0.CONTAPTRA
	left join arqUsuario A18 on A18.IDPRIMARIO = A0.QUEMAGRET
	left join tabTStAgRet A19 on A19.IDPRIMARIO=A0.TSTAGRET
	left join arqUsuario A20 on A20.IDPRIMARIO = A0.ASSESRET;
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
	execute procedure set_log( 12, NEW.idPrimario, 'QuemAgRet', OLD.QuemAgRet, NEW.QuemAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'QdoAgRet', OLD.QdoAgRet, NEW.QdoAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'DataRet', OLD.DataRet, NEW.DataRet );
	execute procedure set_log( 12, NEW.idPrimario, 'HoraRet', OLD.HoraRet, NEW.HoraRet );
	execute procedure set_log( 12, NEW.idPrimario, 'TStAgRet', OLD.TStAgRet, NEW.TStAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'AssesRet', OLD.AssesRet, NEW.AssesRet );
	execute procedure set_log( 12, NEW.idPrimario, 'ObsRet', substring( OLD.ObsRet from 1 for 255 ), substring( NEW.ObsRet from 1 for 255 ) );
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
alter ENTRAPARC position 27,
alter SDENTRFPG position 28,
alter SDVENC1PAR position 29,
alter SDCOND position 30,
alter ENTRAVALP position 31,
alter ENTRATOTP position 32,
alter ENTRATOTAL position 33,
alter BOLETOMIN position 34,
alter ENTRAOBS position 35,
alter SALDOFPG position 36,
alter SALDOPARC position 37,
alter SALDOCOND position 38,
alter SALDOVAL position 39,
alter SALDOOBS position 40,
alter CONDUTA position 41,
alter MEDICACAO position 42,
alter OBS position 43,
alter CONTACONS position 44,
alter CONTAPTRA position 45,
alter TRGQTDM position 46,
alter TRGQTDMENT position 47,
alter SALDO position 48,
alter QUEMAGRET position 49,
alter QDOAGRET position 50,
alter DATARET position 51,
alter DIARET position 52,
alter HORARET position 53,
alter TSTAGRET position 54,
alter ASSESRET position 55,
alter OBSRET position 56;
commit;

--*	Arquivo Clinica   
--* Criando o TiConsulta. Na migração passei as existentes para Tratamento (id=1)

drop trigger arqClinica_log;
drop view v_arqClinica;
commit;

ALTER TABLE arqClinica
add /* 15*/	TICONSULTA ligadoComArquivo; /* Ligado com o Arquivo TiConsulta */
commit;

ALTER TABLE arqClinica ADD CONSTRAINT arqClinica_FK_TiConsulta FOREIGN KEY ( TICONSULTA ) REFERENCES arqTiConsulta ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

update arqClinica set TiConsulta=1;
commit;

RECREATE VIEW V_arqClinica AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A0.RAZAO, A0.EMAIL, A0.CNPJ, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.TICONSULTA, A4.TICONSULTA as TICONSULTA_TICONSULTA, A0.DATAINI, A0.DATAFIM, A0.ATIVO, A0.MAXAGENDA, A0.SIGLA
	FROM arqClinica A0
	left join arqBairro A1 on A1.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A2 on A2.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A3 on A3.IDPRIMARIO=A2.UF
	left join arqTiConsulta A4 on A4.IDPRIMARIO = A0.TICONSULTA;
commit;

/************************************************************
	Trigger para Log de arqClinica
************************************************************/

set term ^;

recreate trigger arqClinica_LOG for arqClinica
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Clinica,'' );
else
	valorChave = coalesce( NEW.Clinica,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100031 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Razao', OLD.Razao, NEW.Razao );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'CNPJ', OLD.CNPJ, NEW.CNPJ );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_CEP', OLD.Ende_CEP, NEW.Ende_CEP );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Endereco', OLD.Ende_Endereco, NEW.Ende_Endereco );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Bairro', OLD.Ende_Bairro, NEW.Ende_Bairro );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Cidade', OLD.Ende_Cidade, NEW.Ende_Cidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Telefone', OLD.Ende_Telefone, NEW.Ende_Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_DDDCelular', OLD.Ende_DDDCelular, NEW.Ende_DDDCelular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Celular', OLD.Ende_Celular, NEW.Ende_Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_WhatsApp', OLD.Ende_WhatsApp, NEW.Ende_WhatsApp );
	execute procedure set_log( 12, NEW.idPrimario, 'TiConsulta', OLD.TiConsulta, NEW.TiConsulta );
	execute procedure set_log( 12, NEW.idPrimario, 'DataIni', OLD.DataIni, NEW.DataIni );
	execute procedure set_log( 12, NEW.idPrimario, 'DataFim', OLD.DataFim, NEW.DataFim );
	execute procedure set_log( 12, NEW.idPrimario, 'MaxAgenda', OLD.MaxAgenda, NEW.MaxAgenda );
	execute procedure set_log( 12, NEW.idPrimario, 'Sigla', OLD.Sigla, NEW.Sigla );
end
end^

set term ;^

commit;

INSERT INTO ARQCLINICA (IDPRIMARIO, CLINICA, RAZAO, EMAIL, CNPJ, ENDE_CEP, ENDE_ENDERECO, ENDE_BAIRRO, ENDE_CIDADE, ENDE_TELEFONE, ENDE_DDDCELULAR, ENDE_CELULAR, ENDE_WHATSAPP, DATAINI, DATAFIM, MAXAGENDA, SIGLA, TICONSULTA) VALUES (10, 'NUTRICIONISTA', '', '', '', '', '', NULL, NULL, '', 0, '', 0, '2022-06-16', NULL, 60, 'NU', 2);
INSERT INTO ARQCLINICA (IDPRIMARIO, CLINICA, RAZAO, EMAIL, CNPJ, ENDE_CEP, ENDE_ENDERECO, ENDE_BAIRRO, ENDE_CIDADE, ENDE_TELEFONE, ENDE_DDDCELULAR, ENDE_CELULAR, ENDE_WHATSAPP, DATAINI, DATAFIM, MAXAGENDA, SIGLA, TICONSULTA) VALUES (11, 'PSICÓLOGO', '', '', '', '', '', NULL, NULL, '', 0, '', 0, '2022-06-16', NULL, 60, 'PSI', 3);
COMMIT WORK;

ALTER TABLE arqClinica
alter IDPRIMARIO position 1,
alter CLINICA position 2,
alter RAZAO position 3,
alter EMAIL position 4,
alter CNPJ position 5,
alter ENDE_CEP position 6,
alter ENDE_ENDERECO position 7,
alter ENDE_BAIRRO position 8,
alter ENDE_CIDADE position 9,
alter ENDE_DDD position 10,
alter ENDE_TELEFONE position 11,
alter ENDE_DDDCELULAR position 12,
alter ENDE_CELULAR position 13,
alter ENDE_WHATSAPP position 14,
alter TICONSULTA position 15,
alter DATAINI position 16,
alter DATAFIM position 17,
alter ATIVO position 18,
alter MAXAGENDA position 19,
alter SIGLA position 20;
commit;

--*	Arquivo PTrata    
--* campo Complemen para saber se oferecem as consultas de nutricionista e psicólogo
--* baseado nele o campo Quantos em arqPessoa liberará o paciente para agendar ou não uma dessas consultas
drop trigger arqPTrata_log;
drop view v_arqPTrata;
commit;

ALTER TABLE arqPTrata drop Descricao;
commit;

ALTER TABLE arqPTrata
add /*  7*/	COMPLEMEN campoLogico; /* Lógico: 0=Não 1=Sim */
commit;

update arqPTrata set Complemen=0;
update arqPTrata set Complemen=1 where idPrimario in( 1,5,6 );
commit;

RECREATE VIEW V_arqPTrata AS 
	SELECT A0.IDPRIMARIO, A0.PTRATA, A0.APELIDO, A0.VALOR, A0.MRGDESC, A0.VALMINIMO, A0.COMPLEMEN, A0.ATIVO, A0.TEMPO
	FROM arqPTrata A0;
commit;

/************************************************************
	Trigger para Log de arqPTrata
************************************************************/

set term ^;

recreate trigger arqPTrata_LOG for arqPTrata
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.PTrata,'' );
else
	valorChave = coalesce( NEW.PTrata,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100032 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'PTrata', OLD.PTrata, NEW.PTrata );
	execute procedure set_log( 12, NEW.idPrimario, 'Apelido', OLD.Apelido, NEW.Apelido );
	execute procedure set_log( 12, NEW.idPrimario, 'Valor', OLD.Valor, NEW.Valor );
	execute procedure set_log( 12, NEW.idPrimario, 'MrgDesc', OLD.MrgDesc, NEW.MrgDesc );
	execute procedure set_log( 12, NEW.idPrimario, 'Complemen', OLD.Complemen, NEW.Complemen );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Tempo', OLD.Tempo, NEW.Tempo );
end
end^

set term ;^

commit;

ALTER TABLE arqPTrata
alter IDPRIMARIO position 1,
alter PTRATA position 2,
alter APELIDO position 3,
alter VALOR position 4,
alter MRGDESC position 5,
alter VALMINIMO position 6,
alter COMPLEMEN position 7,
alter ATIVO position 8,
alter TEMPO position 9;
commit;

/************************************************************
	Arquivo AgRet     >> nada a ver com as consultas complementares
************************************************************/
drop trigger arqAgRet_log;
drop view v_arqAgRet;
commit;

ALTER TABLE arqAgRet drop Prontuario, drop Nome, drop NumCelular;
commit;

ALTER TABLE arqAgRet
add /*  7*/	PESSOA ligadoComArquivo; /* Ligado com o Arquivo Pessoa */
commit;

ALTER TABLE arqAgRet ADD PRONTUARIO VARCHAR( 9 ) computed by ( CASE
	WHEN( Consulta > 0 ) THEN( ( COALESCE( ( SELECT Prontuario FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( arqAgRet.Consulta ) ), 0 ) )  ), '' ) ) )
	ELSE ( ( COALESCE( ( SELECT Prontuario FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqAgRet.Pessoa )  ), '' ) ) )
	END  ); 
ALTER TABLE arqAgRet ADD NOME VARCHAR( 60 ) computed by ( CASE
	WHEN( Consulta > 0 ) THEN( ( COALESCE( ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( arqAgRet.Consulta ) ), 0 ) )  ), '' ) ) )
	ELSE ( ( COALESCE( ( SELECT Nome FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqAgRet.Pessoa )  ), '' ) ) )
	END  ); 
ALTER TABLE arqAgRet ADD NUMCELULAR VARCHAR( 11 ) computed by ( CASE
	WHEN( Consulta > 0 ) THEN( ( COALESCE( ( SELECT NumCelular FROM arqPessoa WHERE arqPessoa.IdPrimario=( COALESCE( ( SELECT Pessoa FROM arqConsulta WHERE arqConsulta.IdPrimario=( arqAgRet.Consulta ) ), 0 ) )  ), '' ) ) )
	ELSE ( ( COALESCE( ( SELECT NumCelular FROM arqPessoa WHERE arqPessoa.IdPrimario=( arqAgRet.Pessoa )  ), '' ) ) )
	END  ); 
commit;

ALTER TABLE arqAgRet ADD CONSTRAINT arqAgRet_FK_Pessoa FOREIGN KEY ( PESSOA ) REFERENCES arqPessoa ON DELETE NO ACTION ON UPDATE CASCADE;
commit;

RECREATE VIEW V_arqAgRet AS 
	SELECT A0.IDPRIMARIO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.DATA, A0.DIA, A0.HORA, A0.CONSULTA, A2.NUM as CONSULTA_NUM, A0.PESSOA, A3.NOME as PESSOA_NOME, A3.NUMCELULAR as PESSOA_NUMCELULAR, A0.PRONTUARIO, A0.NOME, A0.NUMCELULAR, A0.TSTAGRET, A4.CHAVE as TStAgRet_CHAVE, A4.DESCRITOR as TStAgRet_DESCRITOR, A0.ASSESSOR, A5.USUARIO as ASSESSOR_USUARIO, A0.OBS
	FROM arqAgRet A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join arqConsulta A2 on A2.IDPRIMARIO = A0.CONSULTA
	left join arqPessoa A3 on A3.IDPRIMARIO = A0.PESSOA
	left join tabTStAgRet A4 on A4.IDPRIMARIO=A0.TSTAGRET
	left join arqUsuario A5 on A5.IDPRIMARIO = A0.ASSESSOR;
commit;

/************************************************************
	Trigger para Log de arqAgRet
************************************************************/

set term ^;

recreate trigger arqAgRet_LOG for arqAgRet
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( Clinica_Clinica, ' ' ) || '-' || coalesce( Data, ' ' ) || '-' || coalesce( Hora, ' ' ) from v_arqAgRet where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100053 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'Data', OLD.Data, NEW.Data );
	execute procedure set_log( 12, NEW.idPrimario, 'Hora', OLD.Hora, NEW.Hora );
	execute procedure set_log( 12, NEW.idPrimario, 'Consulta', OLD.Consulta, NEW.Consulta );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'TStAgRet', OLD.TStAgRet, NEW.TStAgRet );
	execute procedure set_log( 12, NEW.idPrimario, 'Assessor', OLD.Assessor, NEW.Assessor );
	execute procedure set_log( 12, NEW.idPrimario, 'Obs', substring( OLD.Obs from 1 for 255 ), substring( NEW.Obs from 1 for 255 ) );
end
end^

set term ;^

commit;

ALTER TABLE arqAgRet
alter IDPRIMARIO position 1,
alter CLINICA position 2,
alter DATA position 3,
alter DIA position 4,
alter HORA position 5,
alter CONSULTA position 6,
alter PESSOA position 7,
alter PRONTUARIO position 8,
alter NOME position 9,
alter NUMCELULAR position 10,
alter TSTAGRET position 11,
alter ASSESSOR position 12,
alter OBS position 13;
commit;
