--*
--* 1.19 para 1.20

delete from ARQLANCELOGACESSO where STATUS is null;
delete from ARQLANCELOGACESSO where datediff(year, Data, current_date) > 5;
commit;
execute procedure reindexartudo;
commit;

update arqLanceOperacao set Operacao = 'Relatório de parcelas de contas a pagar e a receber pelo menu Relatórios' Where idPrimario = 200166;
insert into arqLanceOperacao values(200254,2,'Rotina para atualizar o vencimento','',254,99,1,'');

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

ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_ContaCons FOREIGN KEY ( CONTACONS ) REFERENCES arqConta ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_ContaPTra FOREIGN KEY ( CONTAPTRA ) REFERENCES arqConta ON DELETE SET NULL ON UPDATE CASCADE;
commit;

/************************************************************
	Arquivo AcaoEmail 
************************************************************/
drop trigger arqAcaoEmail_log;
drop view v_arqAcaoEmail;
commit;

ALTER TABLE arqAcaoEmail drop ARQUIVO_ARQUIVO, drop IMAGEM_ARQUIVO;

ALTER TABLE arqAcaoEmail
add /*  9*/	ARQUIVO_ARQUIVO VARCHAR(128) computed by ( lower( 'AcaoEmail/' || CASE WHEN ( ARQUIVO IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_ARQUIVO.' || ARQUIVO ) END ) ),
add /* 12*/	IMAGEM_ARQUIVO  VARCHAR(128)computed by ( lower( 'AcaoEmail/' || CASE WHEN ( IMAGEM IS NULL ) THEN ( 'sem_imagem.gif' ) ELSE ( IDPRIMARIO || '_IMAGEM.' || (select TI.CHAVE from tabLanceTipoImg TI where TI.IDPRIMARIO=IMAGEM) ) END ) );
commit;

RECREATE VIEW V_arqAcaoEmail AS 
	SELECT A0.IDPRIMARIO, A0.TITULO, A0.VERSAO, A0.TIPOACAO, A1.CHAVE as TipoAcao_CHAVE, A1.DESCRITOR as TipoAcao_DESCRITOR, A0.TEMPLATE, A2.NOME as TEMPLATE_NOME, A0.PADRAOACAO, A3.CHAVE as PadraoAcao_CHAVE, A3.DESCRITOR as PadraoAcao_DESCRITOR, A0.ATIVO, A0.ARQUIVO, A0.Arquivo_ARQUIVO, A0.HTML, A0.IMAGEM, A4.CHAVE as Imagem_CHAVE, A4.DESCRITOR as Imagem_DESCRITOR, A0.IMAGEM_ARQUIVO, A0.LINK, A0.IMAGEMALT, A0.QTDTESTE
	FROM arqAcaoEmail A0
	left join tabTipoAcao A1 on A1.IDPRIMARIO=A0.TIPOACAO
	left join arqTemplate A2 on A2.IDPRIMARIO = A0.TEMPLATE
	left join tabPadraoAcao A3 on A3.IDPRIMARIO=A0.PADRAOACAO
	left join tabLanceTipoImg A4 on A4.IDPRIMARIO = A0.IMAGEM;
commit;

/************************************************************
	Trigger para Log de arqAcaoEmail
************************************************************/

set term ^;

recreate trigger arqAcaoEmail_LOG for arqAcaoEmail
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Titulo,'' ) || coalesce( OLD.Versao,'' );
else
	valorChave = coalesce( NEW.Titulo,'' ) || coalesce( NEW.Versao,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100010 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Titulo', OLD.Titulo, NEW.Titulo );
	execute procedure set_log( 12, NEW.idPrimario, 'Versao', OLD.Versao, NEW.Versao );
	execute procedure set_log( 12, NEW.idPrimario, 'TipoAcao', OLD.TipoAcao, NEW.TipoAcao );
	execute procedure set_log( 12, NEW.idPrimario, 'Template', OLD.Template, NEW.Template );
	execute procedure set_log( 12, NEW.idPrimario, 'PadraoAcao', OLD.PadraoAcao, NEW.PadraoAcao );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Link', OLD.Link, NEW.Link );
	execute procedure set_log( 12, NEW.idPrimario, 'ImagemAlt', OLD.ImagemAlt, NEW.ImagemAlt );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Arquivo is distinct from OLD.Arquivo )  OR 
		( NEW.Html is distinct from OLD.Html )  OR 
		( NEW.Imagem is distinct from OLD.Imagem )  OR 
		( NEW.QtdTeste is distinct from OLD.QtdTeste )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

ALTER TABLE arqAcaoEmail
alter IDPRIMARIO position 1,
alter TITULO position 2,
alter VERSAO position 3,
alter TIPOACAO position 4,
alter TEMPLATE position 5,
alter PADRAOACAO position 6,
alter ATIVO position 7,
alter ARQUIVO position 8,
alter ARQUIVO_ARQUIVO position 9,
alter HTML position 10,
alter IMAGEM position 11,
alter IMAGEM_ARQUIVO  position 12,
alter LINK position 13,
alter IMAGEMALT position 14,
alter QTDTESTE position 15;
commit;

/************************************************************
	Arquivo Conta     
************************************************************/
drop trigger arqParcela_log;
drop view v_arqParcela;
commit;

drop trigger arqConta_log;
drop view v_arqConta;
commit;

ALTER TABLE arqConta drop ARQ1_ARQUIVO;
commit;

ALTER TABLE arqConta 
add /* 21*/	ARQ1_ARQUIVO VARCHAR(128) computed by ( lower( 'Conta/' || CASE WHEN ( ARQ1 IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_ARQ1.' || ARQ1 ) END ) );
commit;

RECREATE VIEW V_arqConta AS 
	SELECT A0.IDPRIMARIO, A0.TRANSACAO, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.TPGREC, A2.CHAVE as TPgRec_CHAVE, A2.DESCRITOR as TPgRec_DESCRITOR, A0.FORNECEDOR, A3.NOME as FORNECEDOR_NOME, A0.PESSOA, A4.NOME as PESSOA_NOME, A4.NUMCELULAR as PESSOA_NUMCELULAR, A0.NOME, A0.TRGVALOR, A0.TRGVALLIQ, A0.TRGQTDPARC, A0.TRGQPARCPG, A0.PROXVENC, A0.TRGPAGO, A0.SALDO, A0.DOCUMENTO, A0.EMISSAO, A0.RECENVIA, A0.COMPETE, A0.HISTORICO, A0.ARQ1, A0.Arq1_ARQUIVO
	FROM arqConta A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join tabTPgRec A2 on A2.IDPRIMARIO=A0.TPGREC
	left join arqFornecedor A3 on A3.IDPRIMARIO = A0.FORNECEDOR
	left join arqPessoa A4 on A4.IDPRIMARIO = A0.PESSOA;
commit;

/************************************************************
	Trigger para Log de arqConta
************************************************************/

set term ^;

recreate trigger arqConta_LOG for arqConta
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Transacao,'' );
else
	valorChave = coalesce( NEW.Transacao,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100033 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Transacao', OLD.Transacao, NEW.Transacao );
	execute procedure set_log( 12, NEW.idPrimario, 'Clinica', OLD.Clinica, NEW.Clinica );
	execute procedure set_log( 12, NEW.idPrimario, 'TPgRec', OLD.TPgRec, NEW.TPgRec );
	execute procedure set_log( 12, NEW.idPrimario, 'Fornecedor', OLD.Fornecedor, NEW.Fornecedor );
	execute procedure set_log( 12, NEW.idPrimario, 'Pessoa', OLD.Pessoa, NEW.Pessoa );
	execute procedure set_log( 12, NEW.idPrimario, 'Documento', OLD.Documento, NEW.Documento );
	execute procedure set_log( 12, NEW.idPrimario, 'Emissao', OLD.Emissao, NEW.Emissao );
	execute procedure set_log( 12, NEW.idPrimario, 'RecEnvia', OLD.RecEnvia, NEW.RecEnvia );
	execute procedure set_log( 12, NEW.idPrimario, 'Compete', OLD.Compete, NEW.Compete );
	execute procedure set_log( 12, NEW.idPrimario, 'Historico', OLD.Historico, NEW.Historico );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Arq1 is distinct from OLD.Arq1 )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

/************************************************************
	Arquivo Parcela   
************************************************************/
ALTER TABLE arqParcela drop ARQ1_ARQUIVO;
commit;

ALTER TABLE arqParcela
add /* 26*/	ARQ1_ARQUIVO VARCHAR(128) computed by ( lower( 'Parcela/' || CASE WHEN ( ARQ1 IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_ARQ1.' || ARQ1 ) END ) );
commit;

ALTER TABLE arqParcela drop ClinicaCal, drop TPgRecCal, drop PessoaCal;
commit;

RECREATE VIEW V_arqParcela AS 
	SELECT A0.IDPRIMARIO, A0.CONTA, A1.TRANSACAO as CONTA_TRANSACAO, (Select V.Clinica_Clinica From v_arqConta V Where V.idPrimario = A0.Conta) as VCLINICA, (Select V.TPgRec_Descritor From v_arqConta V Where V.idPrimario=A0.Conta) as VTPGREC, CASE
	WHEN( (Select C.Fornecedor From arqConta C Where C.idPrimario=A0.Conta) is not null ) THEN( (Select F.Nome From arqConta C join arqFornecedor F on F.idPrimario=C.Fornecedor Where C.idPrimario=A0.Conta) )
	ELSE ( (Select P.Nome From arqConta C join arqPessoa P on P.idPrimario=C.Pessoa Where C.idPrimario=A0.Conta) )
	END  as VPESSOA, A0.PARCELA, A0.VENCIMENTO, A0.VENCEST, A0.VALOR, A0.VALORLIQ, A0.ESTIMADO, A0.TFCOBRA, A2.CHAVE as TFCobra_CHAVE, A2.DESCRITOR as TFCobra_DESCRITOR, A0.EMISSAO, A0.NUMBOLETO, A0.LINHADIG, A0.NOMEPDF, A0.CCOR, A3.NOME as CCOR_NOME, A0.SUBPLANO, A4.PLANO as SUBPLANO_PLANO, A5.CODPLANO as SUBPLANO_PLANO_CODPLANO, A5.PLANO as SUBPLANO_PLANO_PLANO, A4.CODIGO as SUBPLANO_CODIGO, A4.NOME as SUBPLANO_NOME, A0.DATAPAGTO, A0.DATACOMP, A0.TFPAGTO, A6.CHAVE as TFPagto_CHAVE, A6.DESCRITOR as TFPagto_DESCRITOR, A0.TDETPG, A7.CHAVE as TDetPg_CHAVE, A7.DESCRITOR as TDetPg_DESCRITOR, A0.FORMAPG, A8.FORMAPG as FORMAPG_FORMAPG, A0.CHEQUE, A0.ARQ1, A0.Arq1_ARQUIVO, A0.STRETORNO, A0.REMESSA, A0.DATAREM, (Select C.Historico From arqConta C Where C.idPrimario=A0.Conta) as VHISTCONTA, A0.HISTORICO
	FROM arqParcela A0
	left join arqConta A1 on A1.IDPRIMARIO = A0.CONTA
	left join tabTFCobra A2 on A2.IDPRIMARIO=A0.TFCOBRA
	left join arqCCor A3 on A3.IDPRIMARIO = A0.CCOR
	left join arqSubPlano A4 on A4.IDPRIMARIO = A0.SUBPLANO
	left join arqPlano A5 on A5.IDPRIMARIO = A4.PLANO
	left join tabTFPagto A6 on A6.IDPRIMARIO=A0.TFPAGTO
	left join tabTDetPg A7 on A7.IDPRIMARIO=A0.TDETPG
	left join arqFormaPg A8 on A8.IDPRIMARIO = A0.FORMAPG;
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
	execute procedure set_log( 12, NEW.idPrimario, 'FormaPg', OLD.FormaPg, NEW.FormaPg );
	execute procedure set_log( 12, NEW.idPrimario, 'Cheque', OLD.Cheque, NEW.Cheque );
	execute procedure set_log( 12, NEW.idPrimario, 'Historico', OLD.Historico, NEW.Historico );
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

ALTER TABLE arqParcela
alter IDPRIMARIO position 1,
alter CONTA position 2,
alter PARCELA position 3,
alter VENCIMENTO position 4,
alter VENCEST position 5,
alter VALOR position 6,
alter VALORLIQ position 7,
alter ESTIMADO position 8,
alter TFCOBRA position 9,
alter EMISSAO position 10,
alter NUMBOLETO position 11,
alter LINHADIG position 12,
alter NOMEPDF position 13,
alter CCOR position 14,
alter SUBPLANO position 15,
alter DATAPAGTO position 16,
alter DATACOMP position 17,
alter TFPAGTO position 18,
alter TDETPG position 19,
alter FORMAPG position 20,
alter CHEQUE position 21,
alter ARQ1 position 22,
alter ARQ1_ARQUIVO position 23,
alter STRETORNO position 24,
alter REMESSA position 25,
alter DATAREM position 26,
alter HISTORICO position 27;
commit;

/************************************************************
	Arquivo Usuario   
************************************************************/
drop trigger arqUsuario_log;
drop view v_arqUsuario;
commit;

ALTER TABLE arqUsuario drop FOTO_ARQUIVO;
commit;

ALTER TABLE arqUsuario
add /* 13*/	FOTO_ARQUIVO  VARCHAR(128)computed by ( lower( 'Usuario/' || CASE WHEN ( FOTO IS NULL ) THEN ( 'sem_imagem.gif' ) ELSE ( IDPRIMARIO || '_FOTO.' || (select TI.CHAVE from tabLanceTipoImg TI where TI.IDPRIMARIO=FOTO) ) END ) );
commit;

RECREATE VIEW V_arqUsuario AS 
	SELECT A0.IDPRIMARIO, A0.USUARIO, A0.NOME, A0.SENHA, A0.GRUPO, A1.GRUPO as GRUPO_GRUPO, A0.VERSAO, A0.EMAIL, A0.CRM, A0.PODEAGENDA, A0.ATIVO, A0.NASCIMENTO, A0.FOTO, A2.CHAVE as Foto_CHAVE, A2.DESCRITOR as Foto_DESCRITOR, A0.FOTO_ARQUIVO, A0.EMAILACES, A0.EMAILACESS, A0.EMAILFINAN, A0.EMCMEDISEP
	FROM arqUsuario A0
	left join arqGrupo A1 on A1.IDPRIMARIO = A0.GRUPO
	left join tabLanceTipoImg A2 on A2.IDPRIMARIO = A0.FOTO;
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
		( NEW.Foto is distinct from OLD.Foto )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

ALTER TABLE arqUsuario
alter IDPRIMARIO position 1,
alter USUARIO position 2,
alter NOME position 3,
alter SENHA position 4,
alter GRUPO position 5,
alter VERSAO position 6,
alter EMAIL position 7,
alter CRM position 8,
alter PODEAGENDA position 9,
alter ATIVO position 10,
alter NASCIMENTO position 11,
alter FOTO position 12,
alter FOTO_ARQUIVO  position 13,
alter EMAILACES position 14,
alter EMAILACESS position 15,
alter EMAILFINAN position 16,
alter EMCMEDISEP position 17;
commit;

/************************************************************
	Arquivo DocMod    
************************************************************/
drop trigger arqDocMod_log;
drop view v_arqDocMod;
commit;

ALTER TABLE arqDocMod drop HEADER_ARQUIVO, drop ARQUIVO_ARQUIVO, drop FOOTER_ARQUIVO, drop IMAGEM_ARQUIVO;
commit;

ALTER TABLE arqDocMod
add /* 13*/	HEADER_ARQUIVO VARCHAR(128) computed by ( lower( 'DocMod/' || CASE WHEN ( HEADER IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_HEADER.' || HEADER ) END ) ),
add /* 15*/	ARQUIVO_ARQUIVO VARCHAR(128) computed by ( lower( 'DocMod/' || CASE WHEN ( ARQUIVO IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_ARQUIVO.' || ARQUIVO ) END ) ),
add /* 17*/	FOOTER_ARQUIVO VARCHAR(128) computed by ( lower( 'DocMod/' || CASE WHEN ( FOOTER IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_FOOTER.' || FOOTER ) END ) ),
add /* 20*/	IMAGEM_ARQUIVO  VARCHAR(128)computed by ( lower( 'DocMod/' || CASE WHEN ( IMAGEM IS NULL ) THEN ( 'sem_imagem.gif' ) ELSE ( IDPRIMARIO || '_IMAGEM.' || (select TI.CHAVE from tabLanceTipoImg TI where TI.IDPRIMARIO=IMAGEM) ) END ) );
commit;

RECREATE VIEW V_arqDocMod AS 
	SELECT A0.IDPRIMARIO, A0.DOCUMENTO, A0.TARQDOC, A1.CHAVE as TArqDoc_CHAVE, A1.DESCRITOR as TArqDoc_DESCRITOR, A0.TORDOC, A2.CHAVE as TOrDoc_CHAVE, A2.DESCRITOR as TOrDoc_DESCRITOR, A0.LOGO, A0.MARCA, A0.NOMEARQ, A0.RODAPE, A0.ALTRODAPE, A0.TEMPLATE, A3.NOME as TEMPLATE_NOME, A0.ATIVO, A0.HEADER, A0.Header_ARQUIVO, A0.ARQUIVO, A0.Arquivo_ARQUIVO, A0.FOOTER, A0.Footer_ARQUIVO, A0.HTML, A0.IMAGEM, A4.CHAVE as Imagem_CHAVE, A4.DESCRITOR as Imagem_DESCRITOR, A0.IMAGEM_ARQUIVO, A0.LISTA, A0.MARGEMESQ, A0.MARGEMDIR, A0.MARGEMTOP, A0.TPAPEL, A5.CHAVE as TPapel_CHAVE, A5.DESCRITOR as TPapel_DESCRITOR, A0.TORIENTA, A6.CHAVE as TOrienta_CHAVE, A6.DESCRITOR as TOrienta_DESCRITOR
	FROM arqDocMod A0
	left join tabTArqDoc A1 on A1.IDPRIMARIO=A0.TARQDOC
	left join tabTOrDoc A2 on A2.IDPRIMARIO=A0.TORDOC
	left join arqTemplate A3 on A3.IDPRIMARIO = A0.TEMPLATE
	left join tabLanceTipoImg A4 on A4.IDPRIMARIO = A0.IMAGEM
	left join tabTPapel A5 on A5.IDPRIMARIO=A0.TPAPEL
	left join tabTOrienta A6 on A6.IDPRIMARIO=A0.TORIENTA;
commit;

/************************************************************
	Trigger para Log de arqDocMod
************************************************************/

set term ^;

recreate trigger arqDocMod_LOG for arqDocMod
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
if( deleting ) then
	valorChave = coalesce( OLD.Documento,'' );
else
	valorChave = coalesce( NEW.Documento,'' );
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100022 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'Documento', OLD.Documento, NEW.Documento );
	execute procedure set_log( 12, NEW.idPrimario, 'TArqDoc', OLD.TArqDoc, NEW.TArqDoc );
	execute procedure set_log( 12, NEW.idPrimario, 'TOrDoc', OLD.TOrDoc, NEW.TOrDoc );
	execute procedure set_log( 12, NEW.idPrimario, 'Logo', OLD.Logo, NEW.Logo );
	execute procedure set_log( 12, NEW.idPrimario, 'Marca', OLD.Marca, NEW.Marca );
	execute procedure set_log( 12, NEW.idPrimario, 'NomeArq', OLD.NomeArq, NEW.NomeArq );
	execute procedure set_log( 12, NEW.idPrimario, 'Rodape', OLD.Rodape, NEW.Rodape );
	execute procedure set_log( 12, NEW.idPrimario, 'AltRodape', OLD.AltRodape, NEW.AltRodape );
	execute procedure set_log( 12, NEW.idPrimario, 'Template', OLD.Template, NEW.Template );
	execute procedure set_log( 12, NEW.idPrimario, 'Ativo', OLD.Ativo, NEW.Ativo );
	execute procedure set_log( 12, NEW.idPrimario, 'Html', substring( OLD.Html from 1 for 255 ), substring( NEW.Html from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'Lista', substring( OLD.Lista from 1 for 255 ), substring( NEW.Lista from 1 for 255 ) );
	execute procedure set_log( 12, NEW.idPrimario, 'MargemEsq', OLD.MargemEsq, NEW.MargemEsq );
	execute procedure set_log( 12, NEW.idPrimario, 'MargemDir', OLD.MargemDir, NEW.MargemDir );
	execute procedure set_log( 12, NEW.idPrimario, 'MargemTop', OLD.MargemTop, NEW.MargemTop );
	execute procedure set_log( 12, NEW.idPrimario, 'TPapel', OLD.TPapel, NEW.TPapel );
	execute procedure set_log( 12, NEW.idPrimario, 'TOrienta', OLD.TOrienta, NEW.TOrienta );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Header is distinct from OLD.Header )  OR 
		( NEW.Arquivo is distinct from OLD.Arquivo )  OR 
		( NEW.Footer is distinct from OLD.Footer )  OR 
		( NEW.Imagem is distinct from OLD.Imagem )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

ALTER TABLE arqDocMod
alter IDPRIMARIO position 1,
alter DOCUMENTO position 2,
alter TARQDOC position 3,
alter TORDOC position 4,
alter LOGO position 5,
alter MARCA position 6,
alter NOMEARQ position 7,
alter RODAPE position 8,
alter ALTRODAPE position 9,
alter TEMPLATE position 10,
alter ATIVO position 11,
alter HEADER position 12,
alter HEADER_ARQUIVO position 13,
alter ARQUIVO position 14,
alter ARQUIVO_ARQUIVO position 15,
alter FOOTER position 16,
alter FOOTER_ARQUIVO position 17,
alter HTML position 18,
alter IMAGEM position 19,
alter IMAGEM_ARQUIVO  position 20,
alter LISTA position 21,
alter MARGEMESQ position 22,
alter MARGEMDIR position 23,
alter MARGEMTOP position 24,
alter TPAPEL position 25,
alter TORIENTA position 26;
commit;

/************************************************************
	Arquivo ImagemCRM 
************************************************************/
drop trigger arqImagemCRM_log;
drop view v_arqImagemCRM;
commit;

ALTER TABLE arqImagemCRM drop IMAGEM_ARQUIVO;
commit;

ALTER TABLE arqImagemCRM
add /*  6*/	IMAGEM_ARQUIVO  VARCHAR(128)computed by ( lower( 'ImagemCRM/' || CASE WHEN ( IMAGEM IS NULL ) THEN ( '' ) ELSE ( IDPRIMARIO || '_IMAGEM.' || (select TI.CHAVE from tabLanceTipoImg TI where TI.IDPRIMARIO=IMAGEM) ) END ) );
commit;

RECREATE VIEW V_arqImagemCRM AS 
	SELECT A0.IDPRIMARIO, A0.ACAOEMAIL, A1.TITULO as ACAOEMAIL_TITULO, A1.VERSAO as ACAOEMAIL_VERSAO, A0.NUMIMG, A0.NOME, A0.IMAGEM, A2.CHAVE as Imagem_CHAVE, A2.DESCRITOR as Imagem_DESCRITOR, A0.IMAGEM_ARQUIVO, A0.LINK
	FROM arqImagemCRM A0
	left join arqAcaoEmail A1 on A1.IDPRIMARIO = A0.ACAOEMAIL
	left join tabLanceTipoImg A2 on A2.IDPRIMARIO = A0.IMAGEM;
commit;

/************************************************************
	Trigger para Log de arqImagemCRM
************************************************************/

set term ^;

recreate trigger arqImagemCRM_LOG for arqImagemCRM
active after Insert or Delete or Update
position 999
as
	declare variable valorChave varchar(1000);
begin
select coalesce( AcaoEmail_Titulo, ' ' ) || '-' || coalesce( AcaoEmail_Versao, ' ' ) || '-' || coalesce( NumImg, ' ' ) from v_arqImagemCRM where idPrimario=( case when(deleting) then (OLD.idPrimario) else (NEW.idPrimario) end ) into :valorChave;
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100011 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', substring( valorChave from 1 for 255 ) );
if( inserting ) then
	execute procedure set_log( 13, NEW.idPrimario, null, null, null ); 
else
if( deleting ) then
	execute procedure set_log( 14, OLD.idPrimario, null, null, null ); 
else begin
	execute procedure set_log( 12, NEW.idPrimario, 'AcaoEmail', OLD.AcaoEmail, NEW.AcaoEmail );
	execute procedure set_log( 12, NEW.idPrimario, 'NumImg', OLD.NumImg, NEW.NumImg );
	execute procedure set_log( 12, NEW.idPrimario, 'Nome', OLD.Nome, NEW.Nome );
	execute procedure set_log( 12, NEW.idPrimario, 'Link', OLD.Link, NEW.Link );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.Imagem is distinct from OLD.Imagem )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

ALTER TABLE arqImagemCRM
alter IDPRIMARIO position 1,
alter ACAOEMAIL position 2,
alter NUMIMG position 3,
alter NOME position 4,
alter IMAGEM position 5,
alter IMAGEM_ARQUIVO  position 6,
alter LINK position 7;
commit;

/************************************************************
	TABELA tabTCCor
************************************************************/

CREATE TABLE tabTCCor
(
	IDPRIMARIO chavePrimariaTab,
	CHAVE VARCHAR( 1 ) COLLATE PT_BR,
	DESCRITOR VARCHAR( 75 ) COLLATE PT_BR,
	CONSTRAINT tabTCCor_PK PRIMARY KEY( IDPRIMARIO ),
	CONSTRAINT tabTCCor_UK UNIQUE( CHAVE )
);
commit;

INSERT INTO tabTCCor VALUES ( 1, '1', 'Financeiro' );
INSERT INTO tabTCCor VALUES ( 2, '2', 'Assessor' );
INSERT INTO tabTCCor VALUES ( 3, '3', 'Recepção' );
commit;

/************************************************************
	Arquivo CCor      
************************************************************/
drop trigger arqCCor_log;
drop view v_arqCCor;
commit;

ALTER TABLE arqCCor
add /*  4*/	TCCOR ligadoComTabela; /* Ligado com a Tabela TCCor */
commit;

ALTER TABLE arqCCor ADD CONSTRAINT arqCCor_FK_TCCor FOREIGN KEY ( TCCOR ) REFERENCES tabTCCor ON DELETE SET NULL ON UPDATE CASCADE;
commit;

update arqCCor set TCCor=1;
update arqCCor set TCCor=2 Where idPrimario=3;
update arqCCor set TCCor=3 Where idPrimario=2;
commit;

insert into arqCCor values(5,'CAIXA FINANCEIRO NITERÓI',1,1,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');
insert into arqCCor values(6,'CAIXA ASSESSOR NITERÓI',1,2,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');
insert into arqCCor values(7,'CAIXA RECEPÇÃO NITERÓI',1,3,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');

insert into arqCCor values(8,'CAIXA FINANCEIRO RJ',2,1,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');
insert into arqCCor values(9,'CAIXA ASSESSOR RJ',2,2,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');
insert into arqCCor values(10,'CAIXA RECEPÇÃO RJ',2,3,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');

insert into arqCCor values(11,'CAIXA FINANCEIRO JF',3,1,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');
insert into arqCCor values(12,'CAIXA ASSESSOR JF',3,2,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');
insert into arqCCor values(13,'CAIXA RECEPÇÃO JF',3,3,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');

insert into arqCCor values(14,'CAIXA FINANCEIRO JOINVILLE',5,1,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');
insert into arqCCor values(15,'CAIXA ASSESSOR JOINVILLE',5,2,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');
insert into arqCCor values(16,'CAIXA RECEPÇÃO JOINVILLE',5,3,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');

insert into arqCCor values(17,'CAIXA FINANCEIRO GOIANIA',6,1,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');
insert into arqCCor values(18,'CAIXA ASSESSOR GOIANIA',6,2,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');
insert into arqCCor values(19,'CAIXA RECEPÇÃO GOIANIA',6,3,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');

insert into arqCCor values(20,'CAIXA FINANCEIRO BALNEÁRIO',7,1,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');
insert into arqCCor values(21,'CAIXA ASSESSOR BALNEÁRIO',7,2,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');
insert into arqCCor values(22,'CAIXA RECEPÇÃO BALNEÁRIO',7,3,NULL,'','','','',0,'',0,0,0,null,0,'',0,1,NULL,'',NULL,'',NULL,'',NULL,'',NULL,'');
commit;

RECREATE VIEW V_arqCCor AS 
	SELECT A0.IDPRIMARIO, A0.NOME, A0.CLINICA, A1.CLINICA as CLINICA_CLINICA, A0.TCCOR, A2.CHAVE as TCCor_CHAVE, A2.DESCRITOR as TCCor_DESCRITOR, A0.BANCO, A3.NUM as BANCO_NUM, A3.BANCO as BANCO_BANCO, A0.AGENCIA, A0.DVAGENCIA, A0.CONTA, A0.DVCONTA, A0.CARTEIRA, A0.CODCEDENTE, A0.MULTA, A0.JUROS, A0.CBOLETO, A0.INSTRUCOES, A0.ULTREMESSA, A0.CONVENIO, A0.VARIACAO, A0.ATIVO, A0.TPIX1, A4.CHAVE as TPix1_CHAVE, A4.DESCRITOR as TPix1_DESCRITOR, A0.PIX1, A0.TPIX2, A5.CHAVE as TPix2_CHAVE, A5.DESCRITOR as TPix2_DESCRITOR, A0.PIX2, A0.TPIX3, A6.CHAVE as TPix3_CHAVE, A6.DESCRITOR as TPix3_DESCRITOR, A0.PIX3, A0.TPIX4, A7.CHAVE as TPix4_CHAVE, A7.DESCRITOR as TPix4_DESCRITOR, A0.PIX4, A0.TPIX5, A8.CHAVE as TPix5_CHAVE, A8.DESCRITOR as TPix5_DESCRITOR, A0.PIX5
	FROM arqCCor A0
	left join arqClinica A1 on A1.IDPRIMARIO = A0.CLINICA
	left join tabTCCor A2 on A2.IDPRIMARIO=A0.TCCOR
	left join arqBanco A3 on A3.IDPRIMARIO = A0.BANCO
	left join tabTPix A4 on A4.IDPRIMARIO=A0.TPIX1
	left join tabTPix A5 on A5.IDPRIMARIO=A0.TPIX2
	left join tabTPix A6 on A6.IDPRIMARIO=A0.TPIX3
	left join tabTPix A7 on A7.IDPRIMARIO=A0.TPIX4
	left join tabTPix A8 on A8.IDPRIMARIO=A0.TPIX5;
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
	execute procedure set_log( 12, NEW.idPrimario, 'TCCor', OLD.TCCor, NEW.TCCor );
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
alter TCCOR position 4,
alter BANCO position 5,
alter AGENCIA position 6,
alter DVAGENCIA position 7,
alter CONTA position 8,
alter DVCONTA position 9,
alter CARTEIRA position 10,
alter CODCEDENTE position 11,
alter MULTA position 12,
alter JUROS position 13,
alter CBOLETO position 14,
alter INSTRUCOES position 15,
alter ULTREMESSA position 16,
alter CONVENIO position 17,
alter VARIACAO position 18,
alter ATIVO position 19,
alter TPIX1 position 20,
alter PIX1 position 21,
alter TPIX2 position 22,
alter PIX2 position 23,
alter TPIX3 position 24,
alter PIX3 position 25,
alter TPIX4 position 26,
alter PIX4 position 27,
alter TPIX5 position 28,
alter PIX5 position 29;
commit;

/************************************************************
	Parâmetro XConfig   
************************************************************/
drop trigger cnfXConfig_log;
drop view v_cnfXConfig;
commit;

ALTER TABLE cnfXConfig drop CCorAss;
commit;

RECREATE VIEW V_cnfXConfig AS 
	SELECT A0.IDPRIMARIO, A0.CPF, A0.LOGACESSO, A0.LOGACESSOS, A0.QTD, A0.QTD2, A0.EMPRESA, A0.ENDE_CEP, A0.ENDE_ENDERECO, A0.ENDE_BAIRRO, A1.BAIRRO as ENDE_BAIRRO_BAIRRO, A0.ENDE_CIDADE, A2.UF as ENDE_CIDADE_UF, A3.CHAVE as ENDE_CIDADE_UF_CHAVE, A3.DESCRITOR as ENDE_CIDADE_UF_DESCRITOR, A2.CIDADE as ENDE_CIDADE_CIDADE, A0.ENDE_DDD, A0.ENDE_TELEFONE, A0.ENDE_DDDCELULAR, A0.ENDE_CELULAR, A0.ENDE_WHATSAPP, A0.CNPJ, A0.EMAIL, A0.SITE, A0.QTASDESMAR, A0.DECLINAR, A0.RECORDIA, A0.CCORREC, A4.NOME as CCORREC_NOME, A0.SUBPLARREC, A5.PLANO as SUBPLARREC_PLANO, A6.CODPLANO as SUBPLARREC_PLANO_CODPLANO, A6.PLANO as SUBPLARREC_PLANO_PLANO, A5.CODIGO as SUBPLARREC_CODIGO, A5.NOME as SUBPLARREC_NOME, A0.SUBPLARASS, A7.PLANO as SUBPLARASS_PLANO, A8.CODPLANO as SUBPLARASS_PLANO_CODPLANO, A8.PLANO as SUBPLARASS_PLANO_PLANO, A7.CODIGO as SUBPLARASS_CODIGO, A7.NOME as SUBPLARASS_NOME, A0.FORNREC, A9.NOME as FORNREC_NOME, A0.BOLETOMIN, A0.DIASSDENTR
	FROM cnfXConfig A0
	left join arqBairro A1 on A1.IDPRIMARIO = A0.ENDE_BAIRRO
	left join arqCidade A2 on A2.IDPRIMARIO = A0.ENDE_CIDADE
	left join tabUF A3 on A3.IDPRIMARIO=A2.UF
	left join arqCCor A4 on A4.IDPRIMARIO = A0.CCORREC
	left join arqSubPlano A5 on A5.IDPRIMARIO = A0.SUBPLARREC
	left join arqPlano A6 on A6.IDPRIMARIO = A5.PLANO
	left join arqSubPlano A7 on A7.IDPRIMARIO = A0.SUBPLARASS
	left join arqPlano A8 on A8.IDPRIMARIO = A7.PLANO
	left join arqFornecedor A9 on A9.IDPRIMARIO = A0.FORNREC;
commit;

/************************************************************
	Trigger para Log de cnfXConfig
************************************************************/

set term ^;

recreate trigger cnfXConfig_LOG for cnfXConfig
active after Insert or Delete or Update
position 999
as
begin
rdb$set_context( 'USER_SESSION', 'IDOPERACAO', 100017 );
rdb$set_context( 'USER_SESSION', 'VALORCHAVE', '' );
begin
	execute procedure set_log( 12, NEW.idPrimario, 'Empresa', OLD.Empresa, NEW.Empresa );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_CEP', OLD.Ende_CEP, NEW.Ende_CEP );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Endereco', OLD.Ende_Endereco, NEW.Ende_Endereco );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Bairro', OLD.Ende_Bairro, NEW.Ende_Bairro );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Cidade', OLD.Ende_Cidade, NEW.Ende_Cidade );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Telefone', OLD.Ende_Telefone, NEW.Ende_Telefone );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_DDDCelular', OLD.Ende_DDDCelular, NEW.Ende_DDDCelular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_Celular', OLD.Ende_Celular, NEW.Ende_Celular );
	execute procedure set_log( 12, NEW.idPrimario, 'Ende_WhatsApp', OLD.Ende_WhatsApp, NEW.Ende_WhatsApp );
	execute procedure set_log( 12, NEW.idPrimario, 'Email', OLD.Email, NEW.Email );
	execute procedure set_log( 12, NEW.idPrimario, 'Site', OLD.Site, NEW.Site );
	execute procedure set_log( 12, NEW.idPrimario, 'QtasDesmar', OLD.QtasDesmar, NEW.QtasDesmar );
	execute procedure set_log( 12, NEW.idPrimario, 'Declinar', OLD.Declinar, NEW.Declinar );
	execute procedure set_log( 12, NEW.idPrimario, 'RecorDia', OLD.RecorDia, NEW.RecorDia );
	execute procedure set_log( 12, NEW.idPrimario, 'CCorRec', OLD.CCorRec, NEW.CCorRec );
	execute procedure set_log( 12, NEW.idPrimario, 'SubPlaRRec', OLD.SubPlaRRec, NEW.SubPlaRRec );
	execute procedure set_log( 12, NEW.idPrimario, 'SubPlaRAss', OLD.SubPlaRAss, NEW.SubPlaRAss );
	execute procedure set_log( 12, NEW.idPrimario, 'FornRec', OLD.FornRec, NEW.FornRec );
	execute procedure set_log( 12, NEW.idPrimario, 'BoletoMin', OLD.BoletoMin, NEW.BoletoMin );
	execute procedure set_log( 12, NEW.idPrimario, 'DiasSdEntr', OLD.DiasSdEntr, NEW.DiasSdEntr );
	if( ( RDB$GET_CONTEXT( 'USER_SESSION', 'FEITO' ) = 0 ) and (
		( NEW.CPF is distinct from OLD.CPF )  OR 
		( NEW.LogAcesso is distinct from OLD.LogAcesso )  OR 
		( NEW.LogAcessoS is distinct from OLD.LogAcessoS )  OR 
		( NEW.Qtd is distinct from OLD.Qtd )  OR 
		( NEW.Qtd2 is distinct from OLD.Qtd2 )  OR 
		( NEW.CNPJ is distinct from OLD.CNPJ )  ) ) then
	execute procedure set_log( 16, NEW.idPrimario, null, null, null );
end
end^

set term ;^

commit;

--* Trigger para manipular Conta e Parcela em função do pagamento de uma Consulta (não do Tratamento)
drop trigger ARQCONSULTA_AI_AU;
commit;

--*
--* Trigger para manipular Conta e Parcela em função do pagamento de uma Consulta (não do Tratamento)
--* ARQCONSULTA_AD > Achei melhor ter critério de acionamento na tecla DEL
--* ARQCONSULTA_AI_AU

--* 07/01/2022 A Patricia me informou que somente as consulta de TiAgenda = 1 "NOVO" é que sao cobradas

set term ^;

recreate trigger ARQCONSULTA_AU for ARQCONSULTA
active before Update position 101 as
	declare idConta bigInt;
	declare idParcela bigInt;
	declare vencimento date;
	declare dataPagto date;
	declare dataComp date;
	declare valor numeric(18,2);
	declare valorLiq numeric(18,2);
	declare transacao bigInt;
	declare idCCor bigInt;
	declare idSubPlano bigInt;
	declare idTFCobra bigInt;
	declare idTFPagto bigInt;
	declare dinheiro smallint;
	declare cartao smallint;
	declare dias smallint;
	declare taxaDeb numeric(18,2);
	declare txCartao numeric(18,2);
	declare taxa2 numeric(18,2);
	declare taxa3 numeric(18,2);

	declare vencimento2 date;
	declare dataPagto2 date;
	declare dataComp2 date;
	declare valor2 numeric(18,2);
	declare valorLiq2 numeric(18,2);
	declare idTFCobra2 bigInt;
	declare idTFPagto2 bigInt;
	declare dinheiro2 smallint;
	declare cartao2 smallint;
	declare dias2 smallint;
	declare taxaDeb2 numeric(18,2);
	declare txCartao2 numeric(18,2);
	declare taxa22 numeric(18,2);
	declare taxa23 numeric(18,2);

begin
-- exception TESTE '1 NEWvalor= ' || NEW.Valor || ' OLDvalor= ' || OLD.Valor || ' NEWFormaPg= ' || NEW.FormaPg || ' OLDformaPg= ' || coalesce( OLD.FormaPg, 0 ) || ' NEWFormaPg2= ' || coalesce( NEW.FormaPg2, 0 ) || ' OLDformaPg2= ' || coalesce( OLD.FormaPg2, 0 );
	if( NEW.TiAgenda = 1 and NEW.Cortesia = 0 and 
		( NEW.Valor <> OLD.Valor or coalesce( NEW.FormaPg, 0 ) <> coalesce( OLD.FormaPg, 0 ) or
			NEW.Valor2 <> OLD.Valor2 or coalesce( NEW.FormaPg2, 0 ) <> coalesce( OLD.FormaPg2, 0 ) ) 
		) then
	begin
-- exception TESTE '2 NEWvalor= ' || NEW.Valor || ' OLDvalor= ' || OLD.Valor || ' NEWFormaPg= ' || NEW.FormaPg || ' OLDformaPg= ' || coalesce( OLD.FormaPg, 0 ) || ' NEWFormaPg2= ' || coalesce( NEW.FormaPg2, 0 ) || ' OLDformaPg2= ' || coalesce( OLD.FormaPg2, 0 );
		if( NEW.ContaCons > 0 ) then
		begin
			if( NEW.Valor <> OLD.Valor or coalesce( NEW.FormaPg, 0 ) <> coalesce( OLD.FormaPg, 0 ) ) then
			begin 
				select idPrimario, Valor, ValorLiq, 100 - ( ValorLiq / Valor * 100.0 )
				from arqParcela
				where Parcela = 1 and Conta = OLD.ContaCons
				into :idParcela, :valor, :valorLiq, :txCartao;

				if( :valor <> :valorLiq ) then
				begin
					valorLiq = NEW.Valor * ( 100 - :txCartao ) / 100.0;
				end
				else
				begin
					valorLiq = NEW.Valor;
				end

				update arqParcela set Valor = NEW.Valor, ValorLiq = :valorLiq, FormaPg = NEW.FormaPg
					where idPrimario = :idParcela;
			end

			if( NEW.Valor2 <> OLD.Valor2 or coalesce( NEW.FormaPg2, 0 ) <> coalesce( OLD.FormaPg2, 0 ) ) then
			begin 
				select idPrimario, Valor, ValorLiq, 100 - ( ValorLiq / Valor * 100.0 )
				from arqParcela
				where Parcela = 2 and Conta = OLD.ContaCons
				into :idParcela, :valor, :valorLiq, :txCartao;

				if( :valor <> :valorLiq ) then
				begin
					valorLiq = NEW.Valor2 * ( 100 - :txCartao ) / 100.0;
				end
				else
				begin
					valorLiq = NEW.Valor2;
				end

				update arqParcela set Valor = NEW.Valor2, ValorLiq = :valorLiq, FormaPg = NEW.FormaPg2
					where idPrimario = :idParcela;
			end
		end
		else
		if( OLD.FormaPg is null ) then
		begin
			idConta = gen_id( GENIDPRIMARIO, 1 );

			select coalesce( max( Transacao ), 0 ) + 1
			from arqConta
			into :transacao;

			select SubPlaRRec
			from cnfXConfig
			into :idSubPlano;

			select idPrimario
			from arqCCor
			where Clinica = NEW.Clinica and TCCor = 3
			into :idCCor;

			--* para a primeira parcela que sempre existe
			select Dinheiro, Cartao, Dias, TaxaDeb, Taxa2, Taxa3
			from arqFormaPg
			where idPrimario = NEW.FORMAPG
			into :dinheiro, :cartao, :dias, :taxaDeb, :taxa2, :taxa3;

			--* idTFCobra: 2=Cartão 3=Carteira
			if( cartao = 1 ) then
			begin
				idTFCobra = 2;
			end
			else
			begin
				idTFCobra = 3;
			end

			if( dinheiro = 1 ) then
			begin
				vencimento = current_date;
				dataPagto  = current_date;
				dataComp   = current_date;
				valorLiq   = NEW.Valor;
				idTFPagto  = 2;
			end
			else
			begin
				if( taxaDeb > 0 ) then
				begin
					txCartao = taxaDeb;
				end
				else
            if( taxa2 > 0 ) then
            begin
               txCartao = taxa2;
            end
            else
            begin
               txCartao = taxa3;
            end

				vencimento = dateadd( day, :dias, current_date );
				dataPagto  = null;
				dataComp   = null;
				valorLiq   = NEW.Valor * ( 100 - txCartao ) / 100.0;
				idTFPagto  = 1;
			end

			insert into arqConta (idPrimario, Transacao, Clinica, TPgRec, Fornecedor, Pessoa, TrgValor,
				TrgValLiq, TrgQtdParc, TrgQParcPg, ProxVenc, TrgPago, Documento, Emissao, RecEnvia, Compete,
				Historico, Arq1  )
				values( :idConta, :transacao, NEW.Clinica, 2, null, NEW.Pessoa, 0,
				0, 0, 0, null, 0, 0, current_date, current_date, current_date, 'Consulta ' || NEW.NUM, null );

			--? o Vencimento precisa ser calculado em função de Dias de arqFormaPg
			--? o ValorLiq precisa ser calculado em função da Taxa de arqFormaPg
			--? o TFCobra precisa ser calculado em função dos Logicos de arqFormaPg
			--? o CCor precisa ser calculado em função de CCorRec de cnfXConfig
			--? o SubPlano precisa ser calculado em função de SubPlaRRec de cnfXConfig
			--? o TFPagto precisa ser calculado em função dos Logicos de arqFormaPg

			insert into arqParcela (idPrimario, Conta, Parcela, Vencimento, VencEst, Valor, ValorLiq, Estimado,
				TFCobra, Emissao, LinhaDig, NomePdf, CCor, SubPlano, DataPagto, DataComp, TFPagto, TDetPg, FormaPg,
				Cheque, Arq1, StRetorno, Remessa, DataRem, Historico )
				values( gen_id( GENIDPRIMARIO, 1 ), :idConta, 1, :vencimento, 0, NEW.Valor, :valorLiq, 0,
				:idTFCobra, null, '', '', :idCCor, :idSubPlano, :dataPagto, :dataComp, :idTFPagto, null, NEW.FormaPg,
				0, null, '', null, null, '' );

			--* para a segunda parcela que NEM sempre existe
			if( NEW.Valor2 > 0 ) then
			begin
				select Dinheiro, Cartao, Dias, TaxaDeb, Taxa2, Taxa3
				from arqFormaPg
				where idPrimario = NEW.FORMAPG2
				into :dinheiro2, :cartao2, :dias2, :taxaDeb2, :taxa22, :taxa23;

				--* idTFCobra: 2=Cartão 3=Carteira
				if( cartao2 = 1 ) then
				begin
					idTFCobra2 = 2;
				end
				else
				begin
					idTFCobra2 = 3;
				end

				if( dinheiro2 = 1 ) then
				begin
					vencimento2 = current_date;
					dataPagto2  = current_date;
					dataComp2   = current_date;
					valorLiq2   = NEW.Valor2;
					idTFPagto2  = 2;
				end
				else
				begin
					if( taxaDeb2 > 0 ) then
					begin
						txCartao2 = taxaDeb2;
					end
					else
					if( taxa22 > 0 ) then
					begin
						txCartao2 = taxa22;
					end
					else
					begin
						txCartao2 = taxa23;
					end

					vencimento2 = dateadd( day, :dias2, current_date );
					dataPagto2  = null;
					dataComp2   = null;
					valorLiq2   = NEW.Valor2 * ( 100 - txCartao2 ) / 100.0;
					idTFPagto2  = 1;
				end

				insert into arqParcela (idPrimario, Conta, Parcela, Vencimento, VencEst, Valor, ValorLiq, Estimado,
					TFCobra, Emissao, LinhaDig, NomePdf, CCor, SubPlano, DataPagto, DataComp, TFPagto, TDetPg, FormaPg,
					Cheque, Arq1, StRetorno, Remessa, DataRem, Historico )
					values( gen_id( GENIDPRIMARIO, 1 ), :idConta, 2, :vencimento2, 0, NEW.Valor2, :valorLiq2, 0,
					:idTFCobra2, null, '', '', :idCCor, :idSubPlano, :dataPagto2, :dataComp2, :idTFPagto2, null, NEW.FormaPg,
					0, null, '', null, null, '' );
			end

			NEW.ContaCons = :idConta;
		end
	end
end^

set term ;^

commit;
