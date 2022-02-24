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

ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_ContaCons FOREIGN KEY ( CONTACONS ) REFERENCES arqConta ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE arqConsulta ADD CONSTRAINT arqConsulta_FK_ContaPTra FOREIGN KEY ( CONTAPTRA ) REFERENCES arqConta ON DELETE CASCADE ON UPDATE CASCADE;
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

RECREATE VIEW V_arqParcela AS 
	SELECT A0.IDPRIMARIO, A0.CONTA, A1.TRANSACAO as CONTA_TRANSACAO, A0.CLINICACAL, A0.TPGRECCAL, A0.PESSOACAL, A0.PARCELA, A0.VENCIMENTO, A0.VENCEST, A0.VALOR, A0.VALORLIQ, A0.ESTIMADO, A0.TFCOBRA, A2.CHAVE as TFCobra_CHAVE, A2.DESCRITOR as TFCobra_DESCRITOR, A0.EMISSAO, A0.NUMBOLETO, A0.LINHADIG, A0.NOMEPDF, A0.CCOR, A3.NOME as CCOR_NOME, A0.SUBPLANO, A4.PLANO as SUBPLANO_PLANO, A5.CODPLANO as SUBPLANO_PLANO_CODPLANO, A5.PLANO as SUBPLANO_PLANO_PLANO, A4.CODIGO as SUBPLANO_CODIGO, A4.NOME as SUBPLANO_NOME, A0.DATAPAGTO, A0.DATACOMP, A0.TFPAGTO, A6.CHAVE as TFPagto_CHAVE, A6.DESCRITOR as TFPagto_DESCRITOR, A0.TDETPG, A7.CHAVE as TDetPg_CHAVE, A7.DESCRITOR as TDetPg_DESCRITOR, A0.FORMAPG, A8.FORMAPG as FORMAPG_FORMAPG, A0.CHEQUE, A0.ARQ1, A0.Arq1_ARQUIVO, A0.STRETORNO, A0.REMESSA, A0.DATAREM, A0.HISTORICO
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
alter CLINICACAL position 3,
alter TPGRECCAL position 4,
alter PESSOACAL position 5,
alter PARCELA position 6,
alter VENCIMENTO position 7,
alter VENCEST position 8,
alter VALOR position 9,
alter VALORLIQ position 10,
alter ESTIMADO position 11,
alter TFCOBRA position 12,
alter EMISSAO position 13,
alter NUMBOLETO position 14,
alter LINHADIG position 15,
alter NOMEPDF position 16,
alter CCOR position 17,
alter SUBPLANO position 18,
alter DATAPAGTO position 19,
alter DATACOMP position 20,
alter TFPAGTO position 21,
alter TDETPG position 22,
alter FORMAPG position 23,
alter CHEQUE position 24,
alter ARQ1 position 25,
alter ARQ1_ARQUIVO position 26,
alter STRETORNO position 27,
alter REMESSA position 28,
alter DATAREM position 29,
alter HISTORICO position 30;
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